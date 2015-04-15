<?php
header("Content-type: text/html; charset=utf-8");
/*if($_GET) {
    var_dump($_GET);
    if($_GET['refer']) {
        echo $_GET['refer'];
        header("Location:".$_GET['refer']);
    }
//    echo $_GET['refer'];
}*/
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
    }else {
        echo "Login Fail!";

        echo "<script>";
        echo  "window.location.href=window.location.href;";
        echo "</script>";

        exit;
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
//    var_dump($_POST);
    //var_dump($decode_result_array_base64_decode);
    if($login_result['str_alert'] == 'y010401') {

        if($_GET) {
            require_once('db_connect.php');
            $cur_timestamp=date('Y-m-d H:i:s');
            $u_id = $decode_result_array_base64_decode['user_id'];
            $token = md5($u_id+$cur_timestamp+rand(0,1000000)+"");
//            $query_result = mysql_fetch_array(mysql_query("SELECT * FROM sso_token WHERE u_id='$u_id'"));
            $query = "SELECT * FROM sso_token WHERE u_id='$u_id'";
            $nums = mysql_num_rows(mysql_query($query));

/*            if($nums) {
                if($nums == 1) {//已经有了一个token,看是否过期
                    $query_result = mysql_fetch_array(mysql_query($query));

                    if(strtotime(date('Y-m-d H:i:s'))-strtotime($query_result['timestamp']) < 3600*24*2) {
                        //已经登录了且有效
                        mysql_query("DELETE FROM sso_token WHERE u_id='$u_id'");
                        mysql_query("INSERT INTO sso_token(u_id,timestamp,token)VALUES ('$u_id','$cur_timestamp','$token')");
                    }
                    else {//已经登录过但是失效
                        mysql_query("DELETE FROM sso_token WHERE u_id='$u_id'");
                        mysql_query("INSERT INTO sso_token(u_id,timestamp,token)VALUES ('$u_id','$cur_timestamp','$token')");

                    }
                }else {//有多个token，出错,删除所有token
//                    var_dump($query_result);
                    mysql_query("DELETE * FROM sso_token WHERE u_id'='$u_id'");
                    mysql_query("INSERT INTO sso_token(u_id,timestamp,token)VALUES ('$u_id','$cur_timestamp','$token')");
                }
            }*/
            if($nums) {//已经有了此用户的token,删除原来的token
                mysql_query("DELETE FROM sso_token WHERE u_id='$u_id'");
            }
            mysql_query("INSERT INTO sso_token(u_id,timestamp,token)VALUES ('$u_id','$cur_timestamp','$token')");

            setcookie("token","",time()-3600);
            setcookie("token",$token,time()+3600*2,"/");
            setcookie("test","testcookie");
            mysql_close();

            if($_GET['refer']) {
                header("Location:".$_GET['refer']);
$url = $_GET['refer'];
echo "< script language='javascript'
type='text/javascript'>";
echo "window.location.href='$url'";
echo "< /script>";


}
        }
        exit;
    }
//    已登录用户的状态信息
//    var_dump($decode_result_array_base64_decode);
//    $str1 = "Location:".$str;
//    header("Location: $_SERVER['HTTP_REFERER']");
//    header($str1);


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
        <form class="form-signin" name="login-form" id="login-form" role="form" data-togle="validator" method="post" action="./login.php?refer=./test.html">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="user_name" class="sr-only">Username</label>
            <input  id="user_name" name="user_name" class="form-control" placeholder="Username" required data-error="请填写用户名">
            <label for="inputPassword" class="sr-only">Password</label>
            <input  id="inputPassword" name="inputPassword" type="password" class="form-control" required placeholder="Password" data-error="请填写密码">
<!--            <input type="hidden" id="act_post" name="act_post" value="login">-->
<!--            <input type="hidden" id="app_id" name="app_id" value="1">-->
<!--            <input type="hidden" id="app_key" name="app_key" value="Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI">-->
            <input type="hidden" id="user_pass" name="user_pass">
            <input type="hidden" id="user_referer" name="user_referer">
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
            $('#user_referer').val(document.referrer);
            $("#inputPassword").attr("disabled","true");
            return true;
        });
    });
</script>
<script type="text/javascript">
//    js实现的仿PHP获取GET参数
    var $_GET = (function(){
        var url = window.document.location.href.toString();
        var u = url.split("?");
        if(typeof(u[1]) == "string"){
            u = u[1].split("&");
            var get = {};
            for(var i in u){
                var j = u[i].split("=");
                get[j[0]] = j[1];
            }
            return get;
        } else {
            return {};
        }
    })();
    if($_GET['refer'] == "") ;
    else {
//        document.login-form..action = "";
//        document.login-form.action = "";
        document.getElementById("login-form").action = "./login.php?refer="+$_GET['refer'];

    }
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/jquery.md5.js"></script>
<script src="js/validator.min.js"></script>
</body>
</html>
