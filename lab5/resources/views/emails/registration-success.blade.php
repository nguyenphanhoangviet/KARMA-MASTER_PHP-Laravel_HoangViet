<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Successful</title>
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
            color: #ffffff;
        }
        .header img {
            max-width: 100px;
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
        .img{
            width: 100%;
            height: 100%;
        }
        .img-karma {
            width: 100%;
            height: 100%;
        }
        h1{
            color: #F44336;
            margin: 10px 0 0;
            font-size: 15px;
            text-align: center;
            font-weight: bold;
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
        <h1>CHÚC MỪNG BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG</h1>
        <div class="content">
            <p>Chào, {{ $user->name }}</p>
            <p>Cảm ơn bạn đã đăng ký tài khoản tại Karma-Master.</p>
            <p>Chúng tôi rất vui mừng chào đón bạn đến với cộng đồng của chúng tôi. Hãy bắt đầu khám phá và trải nghiệm những tiện ích tuyệt vời mà chúng tôi cung cấp.</p>
            <p>Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ, vui lòng liên hệ với chúng tôi qua email này.</p>
            <p>Trân trọng,</p>
            <b>Đội ngũ Karma-Master</b>
        </div>
        <div class="footer">
            <p>&copy; 2024 Karma-Master. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
