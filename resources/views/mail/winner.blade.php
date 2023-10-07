<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f3f3f3;
            border: 1px solid #ccc;
        }
        h1 {
            color: #333;
        }
        .message {
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #ff6600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Congratulations!</h1>

        <div class="message">
            <p>You have won {{ $value }} KD!</p>
            <p>Claim your prize by following the instructions provided.</p>
        </div>
    </div>
</body>
</html>