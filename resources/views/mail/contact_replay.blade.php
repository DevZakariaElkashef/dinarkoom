<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form Confirmation</title>
  <style>
    /* Reset styles to ensure consistent rendering across email clients */
    body,
    #wrapper {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      font-size: 14px;
      line-height: 1.6;
      color: #333333;
    }
    
    /* Set a background color for the email */
    body {
      background-color: #f6f6f6;
    }
    
    /* Styles for the main wrapper */
    #wrapper {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
    }
    
    /* Styles for the heading */
    h1 {
      font-size: 24px;
      color: #333333;
      margin-bottom: 20px;
    }
    
    /* Styles for the message content */
    p {
      margin-bottom: 20px;
    }
    
    /* Styles for the button */
    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #ffffff;
      text-decoration: none;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <div id="wrapper">
    <h1>Thank you for contacting us!</h1>
    <p>Dear: {{ $name }}</p>
    <p>We have received your message and will get back to you soon.</p>
    <p>If you have any further questions, feel free to reach out to us.</p>
    <p>Best regards,</p>
    <p>Your Company Name</p>
    
    <p>
      <a href="{{ config('app.url') }}" class="button">Visit our website</a>
    </p>
  </div>
</body>

</html>