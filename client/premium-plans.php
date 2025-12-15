<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Premium - DocApp</title>
    <?php include("commonfile.php"); ?>
<style>
/* PREMIUM PAGE STYLING */
.premium-hero {
    padding: 80px 20px;
    background: linear-gradient(120deg, var(--primary-color), var(--primary-dark));
    color: var(--text-light);
    text-align: center;
}

.premium-hero h1 {
    font-size: 42px;
    margin-bottom: 15px;
}
.premium-hero p {
    font-size: 18px;
    opacity: 0.9;
}


/* Pricing Section */
.pricing-section {
    padding: 50px 20px;
    text-align: center;
    background: #f5f7fa;
}

.pricing-section h2 {
    font-size: 36px;
    margin-bottom: 40px;
    color: var(--primary-dark);
}

.pricing-cards {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.pricing-card {
    background: #fff;
    padding: 30px 20px;
    border-radius: var(--radius);
    box-shadow: var(--shadow-medium);
    text-align: center;
    flex: 1 1 280px;
    max-width: 300px;
    transition: transform 0.3s;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.pricing-card h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: var(--primary-color);
}

.pricing-card .price {
    font-size: 28px;
    margin-bottom: 20px;
    font-weight: 700;
}

.pricing-card ul {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
}

.pricing-card ul li {
    margin: 10px 0;
    font-size: 16px;
}

.pricing-card.popular {
    border: 2px solid var(--primary-color);
}

.subscribe-btn {
    padding: 12px 25px;
    border: none;
    border-radius: var(--radius);
    background: var(--primary-gradient);
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.subscribe-btn:hover {
    background: var(--primary-dark);
}

/* Responsive */
@media (max-width: 1024px) {
    .pricing-cards {
        gap: 15px;
    }
}

@media (max-width: 768px) {
    .premium-hero h1 {
        font-size: 28px;
    }

    .pricing-cards {
        flex-direction: column;
        align-items: center;
    }
}

/* PREMIUM PLAN RESPONSIVE */
@media(max-width:768px){
        .pricing-card{
        width: 100%; 
    }
    .premium-hero{
        padding: 30px;
    }
    .premium-cta .premium-hero{
        padding: 30px;
    }
    .premium-hero p{
        font-size: small;
    }
}
</style>
</head>
<body>

    <!-- Navbar -->
<?php include("header.php"); ?>
    <!-- Hero Section -->
    <section class="premium-hero">
        <div class="hero-content">
            <h1>Upgrade to Premium</h1>
            <p>Unlock exclusive features and get priority booking with our premium plans.</p>
        </div>
    </section>

    <!-- Pricing Plans -->
    <section class="pricing-section">
        <h2>Choose Your Plan</h2>
        <div class="pricing-cards">
            
            <div class="pricing-card">
                <h3>Basic</h3>
                <p class="price">$9 / month</p>
            
                <ul>
                    <li>Access to basic doctors</li>
                    <li>Limited appointments</li>
                    <li>Email support</li>
                </ul>
                <button class="subscribe-btn">Subscribe</button>
            </div>

            <div class="pricing-card popular">
                <h3>Standard</h3>
                <p class="price">$19 / month</p>
                <ul>
                    <li>All features in Basic</li>
                    <li>Unlimited appointments</li>
                    <li>Priority support</li>
                </ul>
                <button class="subscribe-btn">Subscribe</button>
            </div>

            <div class="pricing-card">
                <h3>Premium</h3>
                <p class="price">$29 / month</p>
                <ul>
                    <li>All features in Standard</li>
                    <li>Exclusive doctors</li>
                    <li>24/7 support</li>
                </ul>
                <button class="subscribe-btn">Subscribe</button>
            </div>

        </div>
    </section>
</body>
</html>
