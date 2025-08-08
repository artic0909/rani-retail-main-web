<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration Request - Rani Store</title>
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
            background: linear-gradient(135deg, #ff6b6b, #ff8e53);
            padding: 35px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::before,
        .header::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .header::before {
            top: -50px;
            left: -50px;
            width: 150px;
            height: 150px;
        }

        .header::after {
            bottom: -30px;
            right: -30px;
            width: 100px;
            height: 100px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }

        .header p {
            font-size: 16px;
            margin-top: 10px;
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
            font-size: 22px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .welcome-section p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .credentials {
            background: #fff7f7;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            border-left: 4px solid #ff6b6b;
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

        .notice {
            margin-top: 25px;
            font-weight: bold;
            color: #ff6b6b;
            text-align: center;
        }

        .footer {
            background: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 25px 20px;
            font-size: 14px;
        }

        .copyright {
            margin-top: 15px;
            color: #bdc3c7;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .body {
                padding: 25px 20px;
            }

            .header {
                padding: 25px 15px;
            }

            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Seller Registration Received</h1>
            <p>We’ve received your request to join Rani Store</p>
        </div>

        <!-- Body -->
        <div class="body">
            <div class="welcome-section">
                <h2>Hello, <span style="color:#ff6b6b; text-transform:capitalize">{{ $user->name }}</span>!</h2>
                <p>Thank you for applying to become a seller on <strong>Rani Store</strong>. Your request has been successfully submitted and is currently under review.</p>
                <p>Once our team verifies your information, you will receive an approval email with your account activation details.</p>
            </div>

            <div class="credentials">
                <h3>Your Submitted Details</h3>
                <div class="detail-row">
                    <div class="detail-label">Full Name:</div>
                    <div class="detail-value">{{ $user->name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value">{{ $user->email }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Role:</div>
                    <div class="detail-value">Seller</div>
                </div>
            </div>

            <p class="notice">
                Please wait for our approval email to activate your seller account.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Rani Store. All rights reserved.<br>
            This is an automated message. Please do not reply.
        </div>
    </div>
</body>

</html>