<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/hmac-sha256.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/enc-base64.min.js"></script>
</head>

<body>
    <!-- Navbar --> <?php include "header.php"; ?>
    <!-- Hero Section -->
    <section class="premium-hero">
        <div class="hero-content">
            <h1>Upgrade to Premium</h1>
            <p>Unlock exclusive features and get priority booking with our premium plans.</p>
        </div>
    </section> <!-- Pricing Plans -->
    <section class="pricing-section">
        <h2>Choose Your Plan</h2>
        <div class="pricing-cards">
            <div class="pricing-card">
                <h3>Basic</h3>
                <p class="price">Rs <span class="amount">500</span> / month</p>
                <ul>
                    <li>Access to basic doctors</li>
                    <li>Limited appointments</li>
                    <li>Email support</li>
                </ul> <button class="subscribe-btn">Subscribe</button>
            </div>
            <div class="pricing-card popular">
                <h3>Standard</h3>
                <p class="price">Rs <span class="amount">999</span> / month</p>
                <ul>
                    <li>All features in Basic</li>
                    <li>Unlimited appointments</li>
                    <li>Priority support</li>
                </ul> <button class="subscribe-btn">Subscribe</button>
            </div>
            <div class="pricing-card">
                <h3>Premium</h3>
                <p class="price">Rs <span class="amount">2500</span> / month</p>
                <ul>
                    <li>All features in Standard</li>
                    <li>Exclusive doctors</li>
                    <li>24/7 support</li>
                </ul> <button class="subscribe-btn">Subscribe</button>
            </div>
        </div>
    </section>

    <form id="esewaForm" hidden action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        <input type="text" id="amount" name="amount" value="100" required>
        <input type="text" id="tax_amount" name="tax_amount" value="10" required>
        <input type="text" id="total_amount" name="total_amount" value="110" required>
        <input hidden type="text" id="transaction_uuid" name="transaction_uuid" value="241028" required>
        <input hidden type="text" id="product_code" name="product_code" value="EPAYTEST" required>
        <input hidden type="text" id="product_service_charge" name="product_service_charge" value="0" required>
        <input hidden type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input hidden type="text" id="success_url" name="success_url" value="https://developer.esewa.com.np/success"
            required>
        <input hidden type="text" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure"
            required>
        <input hidden type="text" id="signed_field_names" name="signed_field_names"
            value="total_amount,transaction_uuid,product_code" required>
        <input hidden type="text" id="signature" name="signature" value="i94zsd3oXF6ZsSr/kGqT4sSzYQzjj1W/waxjWyRwaME="
            required>
        <input value="Submit" type="submit">
    </form>
    <script>
        let subscribe = document.querySelectorAll(".subscribe-btn");

        subscribe.forEach(element => {
            element.addEventListener("click", function () {
                let card = element.parentElement;
                let amt = card.querySelector(".amount").textContent;

                let amount = amt;
                let id = Math.floor(Math.random() * 1000);
                amount = parseInt(amount);
                let tax_amount = Math.round(amount * 0.1);
                let total_amount = amount + tax_amount;
                let transaction_uuid = id + "_" + Math.floor(Math.random() * 1000);
                document.getElementById("amount").value = amount;
                document.getElementById("tax_amount").value = tax_amount;
                document.getElementById("total_amount").value = total_amount;
                document.getElementById("transaction_uuid").value = transaction_uuid;
                let Message = "total_amount=" + total_amount + ",transaction_uuid=" + transaction_uuid + ",product_code=EPAYTEST";
                let secret = "8gBm/:&EnhH.1/q";
                var hash = CryptoJS.HmacSHA256(Message, secret);
                var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);
                document.getElementById("signature").value = hashInBase64;
                document.getElementById("esewaForm").submit();

            });
        });


    </script>

</body>

</html>