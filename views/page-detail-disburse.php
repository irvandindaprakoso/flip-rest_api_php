<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Disburse</title>
</head>
<body>
    <div style="margin:20">
        <h2 style='text-align:center'>Detail Disburse</h2>
        <a href="show-data">Back</a>
        <table style="border:1px solid; border-radius:5px; margin-top:20px; padding:10px;" >
            <tr>
                <td width="30%">Disburse ID</td>
                <td width="5%">:</td>
                <td><?=$rs['disburse_id']?></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td >:</td>
                <td><?=$rs['amount']?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td >:</td>
                <td><?=$rs['status']?></td>
            </tr>
            <tr>
                <td>Time Served</td>
                <td >:</td>
                <td><?=$rs['time_served']?></td>
            </tr>
            <tr>
                <td>Bank Code</td>
                <td >:</td>
                <td><?=$rs['bank_code']?></td>
            </tr>
            <tr>
                <td>Account Number</td>
                <td >:</td>
                <td><?=$rs['account_number']?></td>
            </tr>
            <tr>
                <td>Remark</td>
                <td >:</td>
                <td><?=$rs['remark']?></td>
            </tr>
            <tr>
                <td>Receipt</td>
                <td >:</td>
                <td><?=$rs['receipt']?></td>
            </tr>
        </table>
    </div>
</body>
</html>