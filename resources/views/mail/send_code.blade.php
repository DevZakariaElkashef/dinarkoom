<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        /* Add your custom styles here */

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .message {
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ Storage::url($app->logo) }}" alt="Logo">
        </div>
        <h2 class="heading">{{ __("Reset Password") }}</h2>
        <p class="message">{{ __("You have requested to reset your password. Please use the following code:") }} <strong>{{ $code }}</strong></p>
        <p class="footer">
            {{ __("If you did not request a password reset, no further action is required.") }}
        </p>
    </div>
</body>
</html>