<?php

include_once "com/base.php";
//快速新增資料到資料庫(就不用自己KEY惹!)

    $num = 1000;
    $char = ["A","B","C","D","E","F","G","H","I","J","K","L"];
    for($i = 0;$i < $num;$i++){
        //從上列char陣列中隨機挑兩個字母(陣列索引值為0~11共12個)
        $code = $char[rand(0,11)].$char[rand(0,11)];
        $data=[
        'code'=> $code,
        'period'=>rand(1,6),
        'year'=>2020,
        'number'=>rand(10000000,77777777),
        'expend'=>rand(100,10000),
        ];
        echo "已新增" . $data["code"]. $data['number']."<br>";
        save("invoice",$data);
    }







?>