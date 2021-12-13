<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SmartFunding Direct</title>
</head>
<body>
    <h1>Hi {{ $mailData['fullName'] }},</h1>

    <p>Good day! Your loan application has been approved at RM {{ $mailData['loanAmmount'] }}</p>
    <p>We will need you to complete the  E-Mandate process before the cash disbursement.</p>
    <br/>
    <p>Please click on the below url to authorize the e-mandate process: </p>
    <br/>
    <p>{{ $mailData['urlAuthorized'] }}</p>
    <br/>
    <p>You may refer to this link to learn How-To Register E-Mandate:</p>
    <br/>
    <p>{{ $mailData['urlRegister'] }}</p>
    <br/>
    <p>Should you require any assistance, please Whatsapp {{ $mailData['phoneNumber'] }}.</p>
    
    <p>Regards,</p>
    <p>Celest</p>

</body>
</html>