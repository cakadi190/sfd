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
    We have received your loan application of RM {{ $mailData['loanAmount'] }} and our team will be in touch with you within {{ $mailData['timeEstimation'] }} should there be any additional documents required.  
    <br/>
    Thank you.
    
    <p>Regards,</p>
    <p>Celest</p>

</body>
</html>