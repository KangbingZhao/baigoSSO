<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/13
 * Time: 16:56
 *
 * Description：注销用户，delete数据库中的token记录
 * Method:Post
 * Parameter:
 *      app_id,app_key,token
 * Return:json数据
 *      is_logout(true|false)
 */
setcookie("token","",time()-3600);
require_once("db_connect.php");
require_once("sso_data.php");
if($_POST) {
    if($_POST['app_id'] && $_POST['app_key'] && $_POST['token'] ){
        $token = $_POST['token'];
//        $u_id = $_POST['u_id'];
        if($_POST['app_id']!= $app_id || $_POST['app_key']!= $app_key) {//应用权限验证出错
            $return_data = json_encode(array("is_logout"=>"false"));
            echo $return_data;
            die("Access Deny");
        }
        $query = "SELECT * FROM sso_token WHERE token = '$token'";
        $nums = mysql_num_rows(mysql_query($query));
        if($nums) {//此token对应多条记录,全部删除
            mysql_query("DELETE FROM sso_token WHERE token='$token'");
            if(mysql_affected_rows()<1) {//删除出错，但是不需要做处理
//                die("删除token时出错！");
            }
            $return_data = json_encode(array("is_logout"=>"true"));
            echo $return_data;
            die();
        }else {//token出错或者用户已经处于未登录状态
            $return_data = json_encode(array("is_logout"=>"true"));
            echo $return_data;
            die();
        }
    }else {
        $return_data = json_encode(array("is_logout"=>"false"));
        echo $return_data;
        die("没有必需的参数！");
    }
}else {
    $return_data = json_encode(array("is_logout"=>"false"));
    echo $return_data;
    die("没有必需的参数！");
}