<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Dear {{ $order->name }},</p>
    <p>We are pleased to inform you that your order (ID: {{ $order->id }}) has been confirmed.</p>
    <p>Thank you for shopping with us!</p>
</body>
</html>
