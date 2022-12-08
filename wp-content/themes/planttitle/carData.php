<?php
$con = mysqli_connect('localhost','www_plant_com','SnHsawHF2Cc2w4yf','www_plant_com');

$sql = "SELECT `product_id`, `min_price`, pro_name, `url` FROM `wp_wc_product_meta_lookup` WHERE 1";

$res = mysqli_query($con,$sql);

if(!$res){
    die('数据库链接错误' . mysqli_error($con));
}

    $arr = array();

    $row = mysqli_fetch_assoc($res);

    while($row){
        array_push($arr,$row);
        $row = mysqli_fetch_assoc($res);
    }

    print(json_encode($arr,JSON_UNESCAPED_UNICODE));

    mysqli_close($con);
?>