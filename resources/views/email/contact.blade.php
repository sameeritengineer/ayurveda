<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #4CAF50;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .header img {
            width: 150px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #4CAF50;
        }
        .footer {
            background: #f4f4f4;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
            border-radius: 0 0 10px 10px;
        }
        .footer img {
            width: 100px;
        }
        .details {
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        .details span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Replace the src value with the URL of your logo -->
             @php
             $setting = \App\Models\Setting::first();
             @endphp
             <div style="height: 24px; width: 24px; display: block; background: url('{{ asset($setting->logo ?? 'default-logo.png') }}'); background-size: contain; background-repeat: no-repeat;"></div>
        </div>
        <div class="content">
            <h2>New Contact Submission</h2>
            <p>You have received a new contact submission. Here are the details:</p>
            <div class="details">
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Subject:</strong> {{ $data['msg_subject'] }}</p>
            <p><strong>Phone Number:</strong> {{ $data['phone_number'] }}</p>
            <p><strong>Message:</strong> {{ $data['message'] }}</p>
            </div>
            <p>Please review the submission and respond accordingly.</p>
        </div>
        <div class="footer">
            <!-- Replace the src value with the URL of your footer logo -->
            <img src="your-footer-logo-url-here.png" alt="Your Company Footer Logo">
        </div>
    </div>
</body>
</html>
