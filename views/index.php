<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flip</title>
</head>
<body>
    <div style=" margin:10px; padding:10px; text-align:center;">
        <form action="store" method="post">
            <div >
                <label for="bank_code" >Bank Code</label><br>
                <input type="text" name="bank_code" >
            </div>
            <div>
                <label for="account_number">Account Number</label><br>
                <input type="text" name="account_number" >
            </div>
            <div>
                <label for="amount">Amount</label><br>
                <input type="text" name="amount" >
            </div>
            <div>
                <label for="remark">Remark</label><br>
                <input type="text" name="remark" >
            </div>
            <button type="submit" style="margin:10px;">Submit</button>  <br>  
            <a  href="show-data">List disburs</a>
        </form>
    </div>
</body>
</html>