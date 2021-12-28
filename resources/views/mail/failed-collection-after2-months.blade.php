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
    <p>Total Due: RM {{ number_format($mailData['totalOutstandingAmount'], 2) }}</p>
    <br/>
    <p>Due Date: {{ $mailData['dueDate'] }}</p>
    <br/>
    <p>Please be advised that your loan installment is overdue more than 2 months. Please arrange payment to avoid any late charges.</p>
    <br/>
    <p>Should you require any assistance, please Whatsapp {{ $mailData['phoneNumber'] }}.</p>
    
    <br/>
    <p>Regards,</p>
    <p>Celest</p>

</body>
</html>