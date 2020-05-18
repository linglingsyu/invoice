<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="/CSS/style.css">
</head>

<body>
    <?php include "./include/header.php"; ?>


    <a href="add_invoice.php"><button>新增獎號</button></a>
<form action="save_num.php">
    <table class="invoice-table">
        <tr>
            <td>年月份</td>
            <td>
                
                <input type="text" name="year" id="">年
                <select name="period" id="">
                    <option value="1">1,2月</option>
                    <option value="2">3,4月</option>
                    <option value="3">5,6月</option>
                    <option value="4">7,8月</option>
                    <option value="5">9,10月</option>
                    <option value="6">11,12月</option>
                </select>


            </td>
        </tr>
        <tr>
            <td>特別獎</td>
            <td><input type="text" name="num"></td>
        </tr>
        <tr>
            <td>特獎</td>
            <td><input type="text" name="num2"></td>
        </tr>
        <tr>
            <td>頭獎</td>
            <td>
                <input type="text" name="num3[]">
                <input type="text" name="num3[]">
                <input type="text" name="num3[]">
            </td>
        </tr>
        <tr>
            <td>二獎</td>
            <td></td>
        </tr>
        <tr>
            <td>參獎</td>
            <td></td>
        </tr>
        <tr>
            <td>四獎</td>
            <td></td>
        </tr>
        <tr>
            <td>五獎</td>
            <td></td>
        </tr>
        <tr>
            <td>六獎</td>
            <td></td>
        </tr>
        <tr>
            <td>增開六獎</td>
            <td>
            <input type="text" name="num4[]">
            <input type="text" name="num4[]">
            </td>
        </tr>
    </table>
    <input type="submit" value="送出">
</form>


</body>

</html>