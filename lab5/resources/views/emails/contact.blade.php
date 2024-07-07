<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 50px auto;
            padding: 0;
            max-width: 600px;
        }
        .header {
            background-color: white;
            padding: 20px;
            text-align: center;
        }
        .header img {
            max-width: 100px;
        }
        .img {
            width: 100%;
            height: auto;
        }
        .img-karma {
            width: 100%;
            height: auto;
        }
        h1 {
            color: #F44336;
            margin: 10px 0;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('imgs/karma-master/logo.png')) }}" alt="Karma-Master Logo">
        </div>
        <div class="img">
            <img src="{{ $message->embed(public_path('imgs/karma-master/img-karma.png')) }}" alt="" class="img-karma">
        </div>
        <h1>Contact Us</h1>
        <div class="content">
            <p><strong>Name:</strong> {{ $details['name'] }}</p>
            <p><strong>Email:</strong> {{ $details['email'] }}</p>
            <p><strong>Title:</strong> {{ $details['subject'] }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $details['message'] }}</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Karma-Master. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
