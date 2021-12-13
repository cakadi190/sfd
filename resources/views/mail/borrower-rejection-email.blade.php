<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SmartFunding Direct</title>
</head>
<body>
    <h1>Hi {{ $mailData['fullname'] }}</h1>
    <h2>{{ $mailData['body_email'] }}</h2>

    <br/>
    <p>Regards,</p>
    <p>Celest.</p>
</body>
</html>