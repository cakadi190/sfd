<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ItSolutionStuff.com</title>
</head>
<body>
    <h1>Hi {{ $mailData['fullName'] }},</h1>

    <p>The E-Mandate authentication is not successful.</p>
    <br/>
    <p>Please click on the url below to complete the E-Mandate authorization.: </p>
    <br/>
    <p>{{ $mailData['url'] }}</p>
    <br/>
    <p>Thank you.</p>
    
    <br/>
    <p>Regards,</p>
    <p>Celest</p>

</body>
</html>