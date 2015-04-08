<?php
header("Content-type: text/html; charset=utf-8");
if($_POST) {
    $api_url = "http://121.41.82.206/baigoSSO/api/api.php";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$api_url);
    curl_setopt ($ch, CURLOPT_POST, 1);

    $da = $_POST;
    $da['act_post'] = 'reg';
    $da['app_id'] = '1';
    $da['app_key'] = 'Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI';

/*    $da['act_post'] =urlencode('reg') ;
    $da['app_id'] = urlencode('1');
    $da['app_key'] = urlencode('Ei1F4LeTIUmJeFdO1MfbdkGQpZMeQ0CUX3aQD4kMOMVsRz7IAbjeBpurD6LTvNoI');*/
    curl_setopt($ch,CURLOPT_POSTFIELDS,$da);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $file_contents = curl_exec($ch);
    curl_close($ch);

    $reg_result = json_decode($file_contents,true);
    if($reg_result['str_alert'] == "y010101")
        echo "注册成功";
    else echo $reg_result['str_alert'];
//    var_dump($da);
//    var_dump($file_contents);
//
//    var_dump($reg_result);

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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div  class="jumbotron">
            <h3 style="margin-top:-10px;">用户注册</h3>
            <form id="user_signon" class="form-horizontal" role="form" data-toggle="validator" method="post" action="">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user_name">用户名</label>
                    <div class="col-md-8 controls">
                        <input id="user_name" name="user_name" class="form-control" type="text"
                               placeholder="数字字母下划线，5-20个字符" maxlength="20" data-minlength="5"
                               data-remote="check_name.php" data-error="无效的用户名" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user_mail">邮箱</label>
                    <div class="col-md-8 controls">
                        <input id="user_mail" name="user_mail" class="form-control" type="email"
                               data-error="无效的邮箱地址" data-remote="check_mail.php" required placeholder="请输入注册邮箱">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="reg_password">密码</label>
                    <div class="col-md-8 controls">
                        <input id="reg_password" name="reg_password" class="form-control" type="password"
                               placeholder="请输入注册密码" data-minlength="8" maxlength="9" data-error="密码长度8-20个字符" required>
                        <input type="hidden" id="user_pass" name="user_pass">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cfm_password">验证密码</label>
                    <div class="col-md-8 controls">
                        <input id="cfm_password" name="cfm_password" class="form-control" type="password"
                               data-match="#reg_password" data-error="两次密码不一致" placeholder="请确认密码" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user_nick">昵称</label>
                    <div class="col-md-8 controls">
                        <input id="user_nicke" name="user_nick" class="form-control" type="text"
                               placeholder="请输入昵称" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
            </form>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(function(){
        $("form").submit(function(){
            var v= $.md5($("#reg_password").val());
            $("#user_pass").val(v);
            $("#reg_password").attr("disabled","true");
            $("#cfm_password").attr("disabled","true");
            return true;
        });
    });
</script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
<script src="js/jquery.md5.js"></script>
</body>
</html>