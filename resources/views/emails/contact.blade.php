<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسالة اتصال جديدة</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            direction: rtl;
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
        .contact-info {
            display: block;
            margin: 20px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
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
            <h1>رسالة اتصال جديدة</h1>
        </div>

        <!-- Email Body -->
        <div class="email-body">
            <p>مرحباً،</p>
            <p>لقد تلقيت رسالة جديدة من:</p>
            <div class="contact-info">
                <p><strong>الاسم:</strong> {{ $contact->name }}</p>
                <p><strong>البريد الإلكتروني:</strong> {{ $contact->email }}</p>
                <p><strong>رقم الهاتف:</strong> {{ $contact->phone }}</p>
                <p><strong>الرسالة:</strong></p>
                <p>{{ $contact->message }}</p>
            </div>
        </div>

        <!-- Email Footer -->
        <div class="email-footer">
            <p>© 2024 متجر ماجيك. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</body>
</html>
