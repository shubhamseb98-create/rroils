<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | RR Oil Mill</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.1.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated oil drops background */
        .oil-drops {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .oil-drop {
            position: absolute;
            width: 8px;
            height: 12px;
            background: rgba(252, 183, 0, 0.15);
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .container {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 40px 20px;
            max-width: 800px;
            width: 100%;
        }

        .logo-section {
            margin-bottom: 30px;
        }

        .logo-section img {
            height: 70px;
            filter: brightness(0) invert(1);
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .logo-section img:hover {
            opacity: 1;
        }

        .error-code {
            font-size: clamp(120px, 20vw, 200px);
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(135deg, #fcb700 0%, #ffdb4d 50%, #fcb700 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: none;
            position: relative;
            display: inline-block;
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.2); }
        }

        .error-code::after {
            content: '404';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #fcb700 0%, #ffdb4d 50%, #fcb700 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: blur(30px);
            opacity: 0.4;
            z-index: -1;
        }

        .error-title {
            font-size: clamp(24px, 4vw, 36px);
            font-weight: 600;
            margin: 20px 0 15px;
            color: #ffffff;
        }

        .error-message {
            font-size: clamp(14px, 2vw, 18px);
            color: #adb5bd;
            line-height: 1.7;
            max-width: 500px;
            margin: 0 auto 40px;
        }

        .oil-icon {
            font-size: 48px;
            color: #fcb700;
            margin-bottom: 25px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #fcb700 0%, #e6a600 100%);
            color: #1a1a1a;
            box-shadow: 0 8px 25px rgba(252, 183, 0, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(252, 183, 0, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: #fcb700;
            border: 2px solid #fcb700;
        }

        .btn-outline:hover {
            background: #fcb700;
            color: #1a1a1a;
            transform: translateY(-3px);
        }

        .contact-bar {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 25px 30px;
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            backdrop-filter: blur(10px);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #adb5bd;
            font-size: 14px;
        }

        .contact-item i {
            color: #fcb700;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .contact-item a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-item a:hover {
            color: #fcb700;
        }

        .footer-text {
            margin-top: 40px;
            font-size: 13px;
            color: #6c757d;
        }

        .footer-text a {
            color: #fcb700;
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .contact-bar {
                flex-direction: column;
                gap: 15px;
                padding: 20px;
            }

            .btn-group {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }
        }
    </style>
<base target="_blank">
</head>
<body>
    <!-- Animated oil drops background -->
    <div class="oil-drops" id="oilDrops"></div>

    <div class="container">
        <!-- Logo -->
        <div class="logo-section">
            <a href="/">
                <img src="images/rrlogo.png" alt="RR Oil Mill Logo">
            </a>
        </div>

        <!-- Oil Icon -->
        <div class="oil-icon">
            <i class="fas fa-oil-can"></i>
        </div>

        <!-- 404 Code -->
        <div class="error-code">404</div>

        <!-- Title -->
        <h1 class="error-title">Page Not Found</h1>

        <!-- Message -->
        <p class="error-message">
            Looks like this page slipped through the press! The page you are looking for 
            might have been moved, deleted, or never existed. Let's get you back on track.
        </p>

        <!-- Buttons -->
        <div class="btn-group">
            <a href="/" class="btn btn-primary">
                <i class="fas fa-home"></i>
                Back to Home
            </a>
            <a href="/contact-us" class="btn btn-outline">
                <i class="fas fa-envelope"></i>
                Contact Us
            </a>
        </div>

        <!-- Contact Bar -->
        <div class="contact-bar">
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <a href="tel:+919414216231">+91 94142 16231</a>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:rrm.manish@gmail.com">rrm.manish@gmail.com</a>
            </div>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Khairthal, Rajasthan</span>
            </div>
        </div>

        <!-- Footer -->
        <p class="footer-text">
            &copy; 2026 <a href="/">RR Oil Mill</a>. Pure mustard oil, pressed with care.
        </p>
    </div>

    <script>
        // Generate animated oil drops
        const dropsContainer = document.getElementById('oilDrops');
        const dropCount = 25;

        for (let i = 0; i < dropCount; i++) {
            const drop = document.createElement('div');
            drop.className = 'oil-drop';
            drop.style.left = Math.random() * 100 + '%';
            drop.style.animationDuration = (Math.random() * 8 + 5) + 's';
            drop.style.animationDelay = (Math.random() * 10) + 's';
            drop.style.width = (Math.random() * 6 + 4) + 'px';
            drop.style.height = (Math.random() * 10 + 8) + 'px';
            drop.style.opacity = Math.random() * 0.3 + 0.1;
            dropsContainer.appendChild(drop);
        }
    </script>
</body>
</html>