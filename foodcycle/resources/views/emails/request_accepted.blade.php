<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Accepted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #2d3748;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #4a5568;
            line-height: 1.6;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 8px;
        }
        ul li strong {
            color: #2d3748;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #718096;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Request Has Been Accepted</h1>
        <p>Dear <strong>{{ $requestDetails['first_name'] }} {{ $requestDetails['last_name'] }}</strong>,</p>
        <p>Your request has been accepted by the consultant. Below are the consultant's contact details:</p>

        <h3 style="color: #2d3748; font-size: 20px; margin-bottom: 10px;">Consultant Details:</h3>
        <ul>
            <li><strong>Name:</strong> {{ $consultant->name }}</li>
            <li><strong>Email:</strong> {{ $consultant->email }}</li>
            <li><strong>Phone:</strong> {{ $consultant->contact_no }}</li>
        </ul>

        <p>The consultant will contact you soon. Thank you for using our service!</p>

        <p>Best Regards,</p>
        <p><strong>FoodCycle Team</strong></p>

        <div class="footer">
            © {{ date('Y') }} FoodCycle. All rights reserved.
        </div>
    </div>
</body>
</html>
