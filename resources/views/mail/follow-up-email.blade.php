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

    <p>Thank you for choosing SF Direct! 

    <br/>
    You are actually 1 step away from getting the cash!
    <br/>
    You may click on the below url to continue with the application.  
    <br/>
    {{ $mailData['url'] }}
    <br/>
    Should you require any assistance, please Whatsapp {{ $mailData['phoneNumber'] }}.
    
    <p>Regards,</p>
    <p>Celest</p>

</body>
</html>