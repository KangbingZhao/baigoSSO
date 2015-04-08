<?php
header("Content-type: text/html; charset=utf-8");
if($_POST) {
    $api_url = "http://121.41.82.206/baigoSSO/api/api.php";
//    var_dump($_POST);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$api_url);
    curl_setopt ($ch, CURLOPT_POST, 1);

    $da = $_POST;
    $da['act_post'] = 'login';
    $da['app_id'] = '1';
    $da['app_key'] = 'Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI';
    curl_setopt($ch,CURLOPT_POSTFIELDS,$da);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $file_contents = curl_exec($ch);
    curl_close($ch);

    $login_result = json_decode($file_contents,true);

    if($login_result['str_alert'] == 'y010401') {
        echo 'Login Seccess!';
    }
    // 对密文进行解码
    $decode_postdate = array();
    $decode_postdate['mod'] = 'code';
    $decode_postdate['act_get'] = 'decode';
    $decode_postdate['app_id'] = '1';
    $decode_postdate['app_key'] = 'Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI';
    $decode_postdate['code'] = $login_result['code'];
    $decode_postdate['key'] = $login_result['key'];

    //构造get请求的url
    $i = 0;
    $get_api_url = $api_url;
/*    foreach($decode_postdate as $key => $value) {
        if($i ==0)   $get_api_url = $get_api_url."?".$key."=".$value;
        else  $get_api_url = $get_api_url."&".$key."=".$value;
        $i = $i + 1;
    }*/
    foreach($decode_postdate as $key => $value) {
        if($i ==0)   $get_api_url = $get_api_url."?".urlencode($key)."=".urlencode($value);
        else  $get_api_url = $get_api_url."&".urlencode($key)."=".urlencode($value);
        $i = $i + 1;
    }
//    for($i=0;$i<count($decode_postdate);$i++) {
//        if($i == 0) $get_api_url = $get_api_url."?".$decode_postdate[$i]."=".$value;
//    }
//    echo $get_api_url;
//    $get_api_url = urlencode($get_api_url);
    $de_ch = curl_init();
    curl_setopt($de_ch,CURLOPT_URL,$get_api_url);
    curl_setopt($de_ch,CURLOPT_RETURNTRANSFER,true);
//    curl_setopt($de_ch,CURLOPT_HEADER,0);
    curl_setopt($de_ch, CURLOPT_BINARYTRANSFER, true) ;
//    curl_setopt($de_ch,CURLOPT_REFERER,'http://localhost/baigosso/mypage/login.html');
    $decode_result = curl_exec($de_ch);

    $decode_result_array =json_decode($decode_result,true);
    foreach($decode_result_array as $key=>$value) {
        $decode_result_array_base64_decode[$key] = base64_decode($value);
    }
//    var_dump($login_result);
//    var_dump($decode_result_array);
//    var_dump($decode_postdate);
//    echo "\r\t 第二个";

//    已登录用户的状态信息
    var_dump($decode_result_array_base64_decode);

//    var_dump($decode_result_array);
//    echo "\r\t 第二个";
//    var_dump($get_api_url);
//    var_dump($decode_result_array);
//    var_dump($get_api_url);
//    echo "\r\t";
//    var_dump($file_contents);





//    var_dump($decode_postdate);
}

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>统一认证页面</title>

    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<div class="container">
        <form class="form-signin" method="post" action="">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="user_name" class="sr-only">Username</label>
            <input  id="user_name" name="user_name" class="form-control" placeholder="Username" >
            <label for="inputPassword" class="sr-only">Password</label>
            <input  id="inputPassword" name="inputPassword" class="form-control" placeholder="Password">
<!--            <input type="hidden" id="act_post" name="act_post" value="login">-->
<!--            <input type="hidden" id="app_id" name="app_id" value="1">-->
<!--            <input type="hidden" id="app_key" name="app_key" value="Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI">-->
            <input type="hidden" id="user_pass" name="user_pass">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

</div>  <!-- container -->

<script type="text/javascript">
    $(function(){
        $("form").submit(function(){
            var v= $.md5($("#inputPassword").val());
            $("#user_pass").val(v);
            $("#inputPassword").attr("disabled","true");
            return true;
        });
    });
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/jquery.md5.js"></script>
</body>
</html>