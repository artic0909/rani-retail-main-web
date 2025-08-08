<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #4facfe;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 1rem auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        h1 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        p {
            color: #666;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .note {
            background: #e8f4ff;
            padding: 0.8rem;
            border-radius: 8px;
            font-size: 0.9rem;
            color: #0066cc;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="loader"></div>
        <h1>Account Under Review</h1>
        <p>Thank you for registering as a <strong>Saler / Stock Manager</strong>.</p>
        <div class="note">
            Your account is currently pending approval.<br>
            We will notify you via email once it is activated. <a href="/" style="color: #0066cc">Back</a>
        </div>
    </div>
</body>
</html>
