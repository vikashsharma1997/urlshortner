<!DOCTYPE html>
<html>
<body>
    <p>Hi {{ $name }},</p>

    <p>You have been invited to join our company. Please use the following credentials to log in:</p>

    <p>
        <strong>Email:</strong> {{ $email }}<br>
        <strong>Password:</strong> {{ $password }}
    </p>

    <p>
        <a href="{{ $loginUrl }}" style="background: #6f42c1; color: #fff; padding: 10px 15px; text-decoration: none;">
            Click here to login
        </a>
    </p>

    <p>Thank you,<br>Our Company Team</p>
</body>
</html>
