<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Disburse</title>
</head>
<body>
    <div style="margin:20">
        <h2 style='text-align:center'>List Disburse</h2>
        <a href="index.php">Back</a>
        <table style="border:1px solid; margin:10px; padding:10px; border-radius:5px">
            <tr style="text-align:center; color:#d35400;">
                <td width='15%'>Detail</td>
                <td width='10%'>Status</td>
                <td width='10%'>Amount</td>
                <td width='10%'>Remark</td>
                <td width='10%'>Bank Code</td>
                <td>Receipt</td>
            </tr>
            <?php foreach($rs as $disburse => $list): ?>
                <tr>
                    <td><a href="detail-data&<?=$list['disburse_id']?>"><?=$list['disburse_id'] ?></a></td>
                    <td><?=$list['status'] ?></td>
                    <td><?=$list['amount'] ?></td>
                    <td><?=$list['remark'] ?></td>
                    <td><?=$list['bank_code'] ?></td>
                    <td><?=$list['receipt'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>