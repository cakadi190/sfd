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

    <p>Attached is your loan statement for the period of {{ $mailData['period'] }}. To view, please follow the instructions below: </p>
    <br/>
    <p>Step 1: Open the attachment</p>
    <br/>
    <p>Step 2: Enter your password (last 4 digits of your IC) }</p>
    <br/>
    <p>Thank you.</p>
    
    <br/>
    <p>Regards,</p>
    <p>Celest</p>
    <br/>
    <br/>
    <br/>
    <a href="{{ asset($mailData['attachment']) }}" download="ReminderFile">Download Attachment File</a>
</body>
</html>