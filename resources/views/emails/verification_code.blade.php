<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #2b7ae0;
            padding: 20px;
            text-align: center;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.5;
        }
        .verification-code {
            display: block;
            text-align: center;
            background-color: #f9f9f9;
            padding: 15px;
            font-size: 24px;
            letter-spacing: 4px;
            font-weight: bold;
            color: #2b7ae0;
            margin: 20px 0;
        }
        .email-footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #666666;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Email Header -->
        <div class="email-header">
            <h1>Verification Code</h1>
        </div>

        <!-- Email Body -->
        <div class="email-body">
            <p>Hello,</p>
            <p>Thank you for registering with us! To complete your registration, please use the verification code below:</p>
            <span class="verification-code">{{ $code }}</span>
            <p>If you didn’t request this, you can safely ignore this email.</p>
            <p>Best regards,<br>Magic Store Team</p>
        </div>

        <!-- Email Footer -->
        <div class="email-footer">
            <p>© 2024 Magic Store. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
