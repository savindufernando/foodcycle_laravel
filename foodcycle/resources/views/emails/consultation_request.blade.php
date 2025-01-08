<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Request Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; line-height: 1.6;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #2d3748; font-size: 24px; text-align: center;">Your Consultation Request Has Been Received</h1>
        <p style="font-size: 16px; color: #4a5568;">Dear <strong>{{ $data['first_name'] }}</strong>,</p>
        <p style="font-size: 16px; color: #4a5568;">Thank you for reaching out to us. We have received your consultation request and will contact you shortly.</p>

        <h3 style="color: #2d3748; font-size: 20px; margin-bottom: 10px;">Request Summary</h3>
        <ul style="list-style-type: none; padding: 0; color: #4a5568;">
            <li><strong>First Name:</strong> {{ $data['first_name'] }}</li>
            <li><strong>Last Name:</strong> {{ $data['last_name'] }}</li>
            <li><strong>Email:</strong> {{ $data['email'] }}</li>
            <li><strong>Phone Number:</strong> {{ $data['phone_number'] }}</li>
            <li><strong>City:</strong> {{ $data['city'] }}</li>
            <li><strong>State:</strong> {{ $data['state'] }}</li>
            <li><strong>Country:</strong> {{ $data['country'] }}</li>
            <li><strong>Company Name:</strong> {{ $data['company_name'] }}</li>
            <li><strong>Services of Interest:</strong> {{ implode(', ', $data['services_of_interest']) }}</li>
            <li><strong>Project Location:</strong> {{ $data['project_location'] }}</li>
            <li><strong>Project Start Date:</strong> {{ $data['project_start_date'] }}</li>
            <li><strong>Project Description:</strong> {{ $data['project_description'] }}</li>
        </ul>

        <p style="font-size: 16px; color: #4a5568;">We look forward to working with you!</p>
        <p style="font-size: 16px; color: #4a5568;">Best Regards,<br><strong>Your Consulting Team</strong></p>
    </div>
</body>
</html>
