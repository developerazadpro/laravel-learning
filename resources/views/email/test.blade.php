<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Email</title>
    <style>
        /* General resets */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 0;
            margin: 0;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        h1 {
            color: #333;
            font-size: 24px;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #ffffff !important;
            padding: 12px 20px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Hello {{ $name }},</h1>

        <p>Welcome to our platform! We're excited to have you on board.</p>

        <p>You can click the button below to verify your account or get started:</p>

        <a href="{{ $actionUrl }}" class="btn">Get Started</a>

        <p>If you didn’t request this email, you can safely ignore it.</p>

        <div class="footer">
            &copy; {{ date('Y') }} learn Without Limit. All rights reserved.
        </div>
    </div>
</body>
</html>
