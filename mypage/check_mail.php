<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/8
 * Time: 11:49
 * 向baigoSSO发送请求查询注册邮箱是否可用
 */
if($_GET['user_mail']) {
    $data['mod'] = 'user';
    $data['user_mail'] = $_GET['user_mail'];
    $data['act_get'] = 'check_mail';
    $data['app_id'] = '1';
    $data['app_key'] = 'Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI';

    $api_url = "http://121.41.82.206/baigoSSO/api/api.php";
    $i = 0;
    $get_api_url=$api_url;
    foreach($data as $key=>$value) {
        if($i ==0) $get_api_url = $get_api_url."?".urlencode($key)."=".urlencode($value);
        else $get_api_url = $get_api_url."&".urlencode($key)."=".urlencode($value);
        $i = $i +1;
    }
    $check_mail = curl_init();
    curl_setopt($check_mail,CURLOPT_URL,$get_api_url);
    curl_setopt($check_mail,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($check_mail, CURLOPT_BINARYTRANSFER, true) ;
    $check_mail_result = curl_exec($check_mail);
    $check_mail_result_decode = json_decode($check_mail_result,true);

//    var_dump($check_name_result);
//    echo $check_name_result_decode["str_alert"];
    if($check_mail_result_decode['str_alert'] == 'y010211') { //该邮箱可以注册
        header('http/1.1 200 OK');
        echo $check_mail_result_decode['str_alert'];
    }else {
        header('http/1.1 403 Forbidden');
        echo $check_mail_result_decode['str_alert'];
    }
    var_dump($check_mail_result);
    var_dump($check_mail_result_decode);


}


