<?php

declare(strict_types=1);

final class Validation
{
    /**
     * Validate email address
     */
    public static function validateEmail(string $email): array
    {
        $email = trim($email);
        
        if (empty($email)) {
            return ['valid' => false, 'error' => 'Email is required'];
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['valid' => false, 'error' => 'Invalid email format'];
        }
        
        if (strlen($email) > 255) {
            return ['valid' => false, 'error' => 'Email is too long'];
        }
        
        return ['valid' => true];
    }

    /**
     * Validate password
     */
    public static function validatePassword(string $password, int $minLength = 6): array
    {
        if (empty($password)) {
            return ['valid' => false, 'error' => 'Password is required'];
        }
        
        if (strlen($password) < $minLength) {
            return ['valid' => false, 'error' => "Password must be at least {$minLength} characters"];
        }
        
        if (strlen($password) > 255) {
            return ['valid' => false, 'error' => 'Password is too long'];
        }
        
        return ['valid' => true];
    }

    /**
     * Validate name
     */
    public static function validateName(string $name, int $minLength = 2, int $maxLength = 255): array
    {
        $name = trim($name);
        
        if (empty($name)) {
            return ['valid' => false, 'error' => 'Name is required'];
        }
        
        if (strlen($name) < $minLength) {
            return ['valid' => false, 'error' => "Name must be at least {$minLength} characters"];
        }
        
        if (strlen($name) > $maxLength) {
            return ['valid' => false, 'error' => "Name must not exceed {$maxLength} characters"];
        }
        
        if (!preg_match('/^[a-zA-Z\s\-\'\.]+$/', $name)) {
            return ['valid' => false, 'error' => 'Name contains invalid characters'];
        }
        
        return ['valid' => true];
    }

    /**
     * Validate phone number (Nepal format)
     */
    public static function validatePhone(string $phone): array
    {
        $phone = preg_replace('/[^0-9+]/', '', trim($phone));
        
        if (empty($phone)) {
            return ['valid' => false, 'error' => 'Phone number is required'];
        }
        
        // Nepal phone format: 98XXXXXXXX or +97798XXXXXXXX
        if (!preg_match('/^(\+977)?9[6-8]\d{8}$/', $phone)) {
            return ['valid' => false, 'error' => 'Invalid phone number format'];
        }
        
        return ['valid' => true, 'cleaned' => $phone];
    }

    /**
     * Validate NIC number (Nepal format)
     */
    public static function validateNIC(string $nic): array
    {
        $nic = strtoupper(trim($nic));
        
        if (empty($nic)) {
            return ['valid' => false, 'error' => 'NIC number is required'];
        }
        
        // Old format: 9 digits + V/X (e.g., 123456789V)
        // New format: 12 digits (e.g., 123456789012)
        if (!preg_match('/^(\d{9}[VX]|\d{12})$/', $nic)) {
            return ['valid' => false, 'error' => 'Invalid NIC number format'];
        }
        
        return ['valid' => true, 'cleaned' => $nic];
    }

    /**
     * Validate date
     */
    public static function validateDate(string $date, bool $futureOnly = false): array
    {
        if (empty($date)) {
            return ['valid' => false, 'error' => 'Date is required'];
        }
        
        $timestamp = strtotime($date);
        if ($timestamp === false) {
            return ['valid' => false, 'error' => 'Invalid date format'];
        }
        
        $dateObj = new DateTime($date);
        $today = new DateTime();
        
        if ($futureOnly && $dateObj < $today) {
            return ['valid' => false, 'error' => 'Date must be in the future'];
        }
        
        return ['valid' => true, 'date' => $dateObj];
    }

    /**
     * Validate time
     */
    public static function validateTime(string $time): array
    {
        if (empty($time)) {
            return ['valid' => false, 'error' => 'Time is required'];
        }
        
        if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $time)) {
            return ['valid' => false, 'error' => 'Invalid time format'];
        }
        
        return ['valid' => true];
    }

    /**
     * Validate appointment date and time combination
     */
    public static function validateAppointmentDateTime(string $date, string $time): array
    {
        $dateValidation = self::validateDate($date, true);
        if (!$dateValidation['valid']) {
            return $dateValidation;
        }
        
        $timeValidation = self::validateTime($time);
        if (!$timeValidation['valid']) {
            return $timeValidation;
        }
        
        $appointmentDateTime = new DateTime($date . ' ' . $time);
        $now = new DateTime();
        
        if ($appointmentDateTime < $now) {
            return ['valid' => false, 'error' => 'Appointment date and time must be in the future'];
        }
        
        return ['valid' => true, 'datetime' => $appointmentDateTime];
    }

    /**
     * Validate amount/price
     */
    public static function validateAmount(string $amount, float $min = 0): array
    {
        if (empty($amount)) {
            return ['valid' => false, 'error' => 'Amount is required'];
        }
        
        if (!is_numeric($amount)) {
            return ['valid' => false, 'error' => 'Amount must be a number'];
        }
        
        $amountFloat = (float)$amount;
        
        if ($amountFloat < $min) {
            return ['valid' => false, 'error' => "Amount must be at least {$min}"];
        }
        
        return ['valid' => true, 'amount' => $amountFloat];
    }

    /**
     * Validate year
     */
    public static function validateYear(string $year, int $minYear = 1900): array
    {
        if (empty($year)) {
            return ['valid' => false, 'error' => 'Year is required'];
        }
        
        if (!is_numeric($year) || strlen($year) !== 4) {
            return ['valid' => false, 'error' => 'Invalid year format'];
        }
        
        $yearInt = (int)$year;
        $currentYear = (int)date('Y');
        
        if ($yearInt < $minYear || $yearInt > $currentYear) {
            return ['valid' => false, 'error' => "Year must be between {$minYear} and {$currentYear}"];
        }
        
        return ['valid' => true, 'year' => $yearInt];
    }

    /**
     * Sanitize string input
     */
    public static function sanitizeString(string $input, int $maxLength = 1000): string
    {
        $input = trim($input);
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        
        if (strlen($input) > $maxLength) {
            $input = substr($input, 0, $maxLength);
        }
        
        return $input;
    }

    /**
     * Validate file upload
     */
    public static function validateFileUpload(array $file, array $allowedTypes = ['pdf', 'jpg', 'jpeg', 'png'], int $maxSize = 5242880): array
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return ['valid' => false, 'error' => 'File upload error'];
        }
        
        if ($file['size'] > $maxSize) {
            return ['valid' => false, 'error' => 'File size exceeds maximum allowed size'];
        }
        
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (!in_array($ext, $allowedTypes)) {
            return ['valid' => false, 'error' => 'Invalid file type. Allowed: ' . implode(', ', $allowedTypes)];
        }
        
        return ['valid' => true, 'extension' => $ext];
    }

    /**
     * Validate required fields
     */
    public static function validateRequired(array $data, array $requiredFields): array
    {
        $errors = [];
        
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty(trim($data[$field]))) {
                $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
            }
        }
        
        if (!empty($errors)) {
            return ['valid' => false, 'errors' => $errors];
        }
        
        return ['valid' => true];
    }
}

