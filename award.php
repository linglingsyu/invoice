<?php include_once "com/base.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/sttle.css">
</head>
<body>
<?php include "./include/header.php" ?>

<?php

if(empty($_GET)){
    echo "請選擇要對獎的項目<a href='invoice.php'>各期獎號</a>";
    exit();
}
//獎項,獎類,對幾個號碼
$award_type=[
    1=>["特別獎",1,8],
    2=>["特獎",2,8],
    3=>["頭獎",3,8],
    4=>["二獎",3,7],
    5=>["三獎",3,6],
    6=>["四獎",3,5],
    7=>["五獎",3,4],
    8=>["六獎",3,3],
    9=>["增開六獎",4,3]
];
$aw = $_GET['aw'];
echo "獎別:".$award_type[$aw][0]."<br>";
echo "年分:".$_GET['year']."<br>";
echo "期別:".$_GET['period']."<br>";

$award_nums=nums("award_number", [
    "year"=>$_GET['year'],
    "period"=>$_GET['period'],
    "type"=>$award_type[$aw][1]

    ]);
echo "獎號數量:".$award_nums;

// if($award_nums>1){
//     $award_numbers=all("award_number", [
//         "year"=>$_GET['year'],
//         "period"=>$_GET['period'],
//         "type"=>$award_type[$aw][1]  
//         ]);
// }else{
//     $award_numbers=find("award_number", [
//         "year"=>$_GET['year'],
//         "period"=>$_GET['period'],
//         "type"=>$award_type[$aw][1]  
//         ]);
// }

$award_nums=all("award_number", [
    "year"=>$_GET['year'],
    "period"=>$_GET['period'],
    "type"=>$award_type[$aw][1]

    ]);

echo "<h4>對獎獎號</h4>";
$t_num=[];
foreach($award_nums as $num){
    echo $num["number"]."<br>";
    $t_num[]=$num['number'];
}

// echo "<pre>";
// print_r($award_numbers);
// echo "</pre>";

echo "<h4>該期發票號碼</h4>";

$invoices=all("invoice",[
    "year"=>$_GET['year'],
    "period"=>$_GET['period'],]);

foreach($invoices as $ins){

    foreach($t_num as $tn){
        $len = $award_type[$aw][2];
        $start = 8-$len;
        //針對增開六獎號特別處理(因為只要對3碼)
        if($aw!=9){
            //不是增開六獎,看取幾碼對
            $target_num=mb_substr($tn,$start,$len);
        }else{
            //是增開六獎,全部數字下去對
            $target_num=$tn;
        }
        if(mb_substr($ins["number"],$start,$len) == $target_num ){
            echo $ins["number"]. "<span style='color:red';font-size'20px'>中獎了</span>" . "<br>";
        }else{
            echo $ins["number"]. "沒中獎". "<br>";
        }
    }
}    

?>



</body>
</html>