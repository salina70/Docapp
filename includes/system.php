<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

final class System
{
    private PDO $db;
    private string $sessionKey = 'user_id';

    public function __construct(?PDO $db = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $this->db = $db ?? DB::conn();
    }

    public function signup(string $name, string $email, string $password): array
    {
        $name = trim($name);
        $email = strtolower(trim($email));

        if ($name === '' || $email === '' || $password === '') {
            return ['ok' => false, 'error' => 'Missing required fields'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['ok' => false, 'error' => 'Invalid email'];
        }

        if (strlen($password) < 6) {
            return ['ok' => false, 'error' => 'Password must be at least 6 characters'];
        }

        $stmt = $this->db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return ['ok' => false, 'error' => 'Email already exists'];
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Set default role to 'patient' for new signups
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, "patient")');
        $stmt->execute([$name, $email, $hash]);

        $userId = (int)$this->db->lastInsertId();
        $this->setUser($userId);

        return ['ok' => true, 'user_id' => $userId];
    }

    public function login(string $email, string $password): array
    {
        $email = strtolower(trim($email));

        if ($email === '' || $password === '') {
            return ['ok' => false, 'error' => 'Missing required fields'];
        }

        $stmt = $this->db->prepare('SELECT id, password_hash FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if (!$row) {
            return ['ok' => false, 'error' => 'Invalid credentials'];
        }

        if (!password_verify($password, (string)$row['password_hash'])) {
            return ['ok' => false, 'error' => 'Invalid credentials'];
        }

        $this->setUser((int)$row['id']);

        return ['ok' => true, 'user_id' => (int)$row['id']];
    }

    public function logout(): void
    {
        unset($_SESSION[$this->sessionKey]);

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION[$this->sessionKey]) && (int)$_SESSION[$this->sessionKey] > 0;
    }

    public function userId(): ?int
    {
        return $this->isLoggedIn() ? (int)$_SESSION[$this->sessionKey] : null;
    }

    public function getUserRole(): ?string
    {
        if (!$this->isLoggedIn()) {
            return null;
        }
        
        $userId = $this->userId();
        $stmt = $this->db->prepare('SELECT role FROM users WHERE id = ? LIMIT 1');
        $stmt->execute([$userId]);
        $row = $stmt->fetch();
        
        return $row ? $row['role'] : null;
    }

    public function getUserData(): ?array
    {
        if (!$this->isLoggedIn()) {
            return null;
        }
        
        $userId = $this->userId();
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ? LIMIT 1');
        $stmt->execute([$userId]);
        
        return $stmt->fetch() ?: null;
    }

    public function requireLogin(string $redirectTo): void
    {
        if (!$this->isLoggedIn()) {
            $this->redirect($redirectTo);
        }
    }

    public function requireRole(string $role, string $redirectTo): void
    {
        $this->requireLogin($redirectTo);
        
        $userRole = $this->getUserRole();
        if ($userRole !== $role) {
            $this->redirect($redirectTo);
        }
    }

    public function requireAnyRole(array $roles, string $redirectTo): void
    {
        $this->requireLogin($redirectTo);
        
        $userRole = $this->getUserRole();
        if (!in_array($userRole, $roles, true)) {
            $this->redirect($redirectTo);
        }
    }

    public function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }

    public function homeUrl(): string
    {
        
        return "http://localhost/doc-app-half-done";
    }

    public function getDashboardUrl(): string
    {
        $role = $this->getUserRole();
        $baseUrl = $this->homeUrl();
        
        switch ($role) {
            case 'admin':
                return $baseUrl . '/admin/dashboard.php';
            case 'doctor':
                return $baseUrl . '/doctor/dashboard.php';
            case 'patient':
            default:
                return $baseUrl . '/patient/dashboard.php';
        }
    }

    private function setUser(int $userId): void
    {
        $_SESSION[$this->sessionKey] = $userId;
        session_regenerate_id(true);
    }
}
