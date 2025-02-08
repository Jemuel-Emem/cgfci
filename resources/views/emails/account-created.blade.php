<!DOCTYPE html>
<html>
<head>
    <title>Account Created</title>
</head>
<body>
    <p>Dear {{ $name }},</p>
    <p>Your account has been successfully created.</p>
    <p><strong>Login Credentials:</strong></p>
    <ul>
        <li><strong>Email:</strong> {{ $username }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
    </ul>

    <p>Thank you,<br>GPFCI Team</p>
</body>
</html>
