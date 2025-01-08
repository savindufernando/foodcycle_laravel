<!DOCTYPE html>
<html>
<head>
    <title>Request Rejected</title>
</head>
<body>
    <h1>Consultation Request Update</h1>
    <p>Dear {{ $request->first_name }} {{ $request->last_name }},</p>

    <p>We regret to inform you that your consultation request has been unaccepted by the consultant.</p>
    
    <p><strong>Reason provided by the consultant:</strong> {{ $reason }}</p>

    <p>Your request is now back in the queue and will be processed as soon as possible. We apologize for the inconvenience.</p>

    <p>Thank you for your understanding.</p>

    <p>Best regards,</p>
    <p><strong>FoodCycle Team</strong></p>
</body>
</html>
