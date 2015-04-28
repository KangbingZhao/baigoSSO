<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/8
 * Time: 11:49
 * 向baigoSSO发送请求查询用户名是否存在
 */
if($_GET['user_name']) {
    $data['user_name'] = $_GET['user_name'];
    $data['act_get'] = 'check_name';
    $data['app_id'] = '1';
    $data['app_key'] = 'Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI';

    $api_url = "http://121.41.82.206:11111/html/baigoSSO/api/api.php";
    $i = 0;
    $get_api_url=$api_url;
    foreach($data as $key=>$value) {
        if($i ==0) $get_api_url = $get_api_url."?".urlencode($key)."=".urlencode($value);
        else $get_api_url = $get_api_url."&".urlencode($key)."=".urlencode($value);
        $i = $i +1;
    }
    $check_name = curl_init();
    curl_setopt($check_name,CURLOPT_URL,$get_api_url);
    curl_setopt($check_name,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($check_name, CURLOPT_BINARYTRANSFER, true) ;
    $check_name_result = curl_exec($check_name);
    $check_name_result_decode = json_decode($check_name_result,true);

//    var_dump($check_name_result);
    echo $check_name_result_decode["str_alert"];
    require_once('alert_decode.php');
//    $ad = new alert_decode;
//    echo ad.decode($check_name_result_decode['str_alert']);
//    echo ad.decode('y010205');

    if($check_name_result_decode['str_alert'] == 'y010205') { //用户名可以注册
        header('http/1.1 200 OK');
        echo $check_name_result_decode['str_alert'];
    }else {
        header('http/1.1 403 Forbidden');
        echo $check_name_result_decode['str_alert'];
    }


}


