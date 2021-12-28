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
    <p>You have a total of RM {{ number_format($mailData['loanAmmount'], 2) }} overdue amount, which is accumulated over three months.</p>
    <br/>
    <p>We strongly urge you to make immediate payment. Otherwise, other collection methods will take effect including uploading the records to CCRIS & CTOS. </p>
    <br/>
    <p>Should you require any assistance, please Whatsapp {{ $mailData['phoneNumber'] }}.</p>
    <br/>
    
    <br/>
    <p>Regards,</p>
    <p>Celest</p>

</body>
</html>