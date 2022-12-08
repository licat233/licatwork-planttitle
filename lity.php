<?php 
$rotateId = '#luckTurntable'; // 旋转对象
$typeNumber = rand(0,5); // 随机指向商品在数组中的索引
$productArr = array("100减99优惠券","谢谢参与","39减10优惠券","谢谢参与","59减15优惠券","谢谢参与");
$productNumber = 6; // 商品总数
$time = 6000; // 旋转时间
$rotate = 10; // 旋转圈数
$res = array($rotateId,$typeNumber,$productArr,$productNumber,$time,$rotate);
 print(json_encode($res,JSON_UNESCAPED_UNICODE));
?>