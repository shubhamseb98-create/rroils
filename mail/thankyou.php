<?php
define("BASE_URL", "https://rroils.com/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You | RR Oil Mill</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f8f9fa;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .ty-card {
        background: #ffffff;
        max-width: 520px;
        width: 100%;
        border: 1px solid #e6e6e6;
        border-radius: 12px;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }

    .ty-logo {
        padding: 30px 20px 10px;
    }

    .ty-logo img {
        max-width: 130px;
        width: 100%;
    }

    .ty-icon {
        width: 72px;
        height: 72px;
        margin: 10px auto 5px;
        border-radius: 50%;
        background: rgb(240, 107, 30);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ty-icon svg {
        width: 36px;
        height: 36px;
    }

    .ty-body {
        padding: 10px 30px 35px;
    }

    .ty-body h1 {
        font-size: 22px;
        color: #222;
        margin-bottom: 12px;
    }

    .ty-body p {
        font-size: 15px;
        color: #666;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .ty-btn {
        display: inline-block;
        background-color: rgb(240, 107, 30);
        color: #ffffff !important;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        padding: 12px 32px;
        border-radius: 50px;
        transition: opacity 0.2s ease;
    }

    .ty-btn:hover {
        opacity: 0.9;
    }

    .ty-footer {
        background: rgb(240, 107, 30);
        padding: 15px 0;
    }

    .ty-footer a {
        color: #ffffff;
        text-decoration: none;
        font-size: 13px;
    }

    .ty-redirect-note {
        font-size: 12px;
        color: #999;
        margin-top: 18px;
    }
</style>
</head>
<body>

    <div class="ty-card">

        <div class="ty-logo">
            <img src="<?= BASE_URL ?>uploads/logo.png" alt="RR Oil Mill">
        </div>

        <div class="ty-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 13l4 4L19 7" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <div class="ty-body">
            <h1>Thank You!</h1>
            <p>
                Your requirement has been submitted successfully. Our team will
                review your details and get back to you shortly to discuss the
                next steps.
            </p>

            <a href="<?= BASE_URL ?>" class="ty-btn">Back to Home</a>

            <p class="ty-redirect-note">You'll be redirected to the homepage in <span id="ty-countdown">8</span> seconds.</p>
        </div>

        <div class="ty-footer">
            <a href="<?= BASE_URL ?>" target="_blank">&copy; 2026 RR OIL MILL</a>
        </div>

    </div>

    <script>
        (function () {
            var seconds = 8;
            var el = document.getElementById('ty-countdown');
            var timer = setInterval(function () {
                seconds--;
                if (el) el.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(timer);
                    window.location.href = "<?= BASE_URL ?>";
                }
            }, 1000);
        })();
    </script>

</body>
</html>