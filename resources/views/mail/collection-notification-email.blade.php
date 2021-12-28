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

    <p>Loan Reference Number: {{ $mailData['loanReferenceNumber'] }}</p>
    <br/>
    <p>Amount Paid: RM {{ number_format($mailData['installationAmount'], 2) }}</p>
    <br/>
    <p>Thank you for the payment!</p>
    
    <br/>
    <p>Regards,</p>
    <p>Celest</p>

</body>
</html>