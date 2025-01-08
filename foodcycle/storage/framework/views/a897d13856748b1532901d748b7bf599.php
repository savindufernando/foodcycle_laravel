<!DOCTYPE html>
<html>
<head>
    <title>Request Unaccepted</title>
</head>
<body>
    <h1>Consultation Request Update</h1>
    <p>Dear <?php echo e($request->first_name); ?> <?php echo e($request->last_name); ?>,</p>

    <p>We regret to inform you that your consultation request has been unaccepted by the consultant.</p>
    
    <p><strong>Reason provided by the consultant:</strong> <?php echo e($reason); ?></p>

    <p>Your request is now back in the queue and will be processed as soon as possible. We apologize for the inconvenience.</p>

    <p>Thank you for your understanding.</p>

    <p>Best regards,</p>
    <p><strong>FoodCycle Team</strong></p>
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/emails/unaccept_request.blade.php ENDPATH**/ ?>