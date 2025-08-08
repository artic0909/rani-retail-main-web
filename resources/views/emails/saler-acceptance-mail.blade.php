<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Rani Store Seller Program</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .email-container {
            max-width: 650px;
            background-color: #ffffff;
            margin: 0 auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: linear-gradient(135deg, #4b6cb7, #182848);
            padding: 35px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: "";
            position: absolute;
            top: -50px;
            left: -50px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .header::after {
            content: "";
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }

        .header p {
            font-size: 18px;
            margin-top: 15px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .body {
            padding: 40px;
            line-height: 1.7;
            color: #444;
        }

        .welcome-section {
            margin-bottom: 30px;
        }

        .welcome-section h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .welcome-section p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .credentials {
            background: #f8f9ff;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            border-left: 4px solid #4b6cb7;
        }

        .credentials h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .detail-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            width: 120px;
            color: #555;
        }

        .detail-value {
            flex: 1;
            color: #182848;
            font-weight: 500;
        }

        .cta-section {
            text-align: center;
            margin: 35px 0;
        }

        .btn {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(135deg, #4b6cb7, #182848);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(75, 108, 183, 0.25);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(75, 108, 183, 0.35);
        }

        .next-steps {
            margin-top: 40px;
            background: #f8f9ff;
            border-radius: 12px;
            padding: 25px;
            border-top: 3px solid #4b6cb7;
        }

        .next-steps h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 20px;
            text-align: center;
        }

        .steps {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .step {
            flex: 1;
            min-width: 200px;
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .step-icon {
            font-size: 32px;
            margin-bottom: 15px;
            color: #4b6cb7;
        }

        .step h4 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 17px;
        }

        .step p {
            font-size: 14px;
            color: #666;
        }

        .footer {
            background: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 30px 20px;
            font-size: 14px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px 0;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 25px 0;
        }

        .social-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            line-height: 40px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: #4b6cb7;
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 20px;
            color: #bdc3c7;
            font-size: 13px;
        }

        .highlight {
            color: #4b6cb7;
            font-weight: 600;
        }

        @media (max-width: 600px) {
            .body {
                padding: 25px 20px;
            }

            .header {
                padding: 25px 15px;
            }

            .header h1 {
                font-size: 26px;
            }

            .steps {
                flex-direction: column;
            }

            .contact-info {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Welcome to Rani Store!</h1>
            <p>Your Seller Account Has Been Approved</p>
        </div>

        <!-- Body -->
        <div class="body">
            <div class="welcome-section">
                <h2>Congratulations, <span class="highlight" style="text-transform:capitalize">{{ $saler->name }}</span>!</h2>
                <p>We're thrilled to inform you that your application to become a seller on <strong>Rani Store</strong> has been accepted. Welcome to our growing community of trusted sellers!</p>
                <p>At Rani Store, we're committed to providing you with the best platform to showcase your products and grow your business. Our team is here to support you every step of the way.</p>
            </div>

            <div class="credentials">
                <h3>Your Account Details</h3>
                <div class="detail-row">
                    <div class="detail-label">Full Name:</div>
                    <div class="detail-value">{{ $saler->name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value">{{ $saler->email }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Password:</div>
                    <div class="detail-value">Same as registration pass****</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Account Type:</div>
                    <div class="detail-value">Seller Account</div>
                </div>
            </div>

            <div class="cta-section">
                <p>Access your seller dashboard to start selling products and managing your store:</p>
                <br>
                <a href="/saler-login" class="btn" style="text-decoration:none; color: white;">Go to Seller Dashboard</a>
            </div>


        </div>

    </div>
</body>

</html>