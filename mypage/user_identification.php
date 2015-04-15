<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/13
 * Time: 17:03
 *
 *Description：验证用户的登录状态
 * Method:Post
 * Parameter:
 *      app_id,app_key,token
 * return:json数据
 *          is_login(true|false|deny),u_id,u_name
 *
 */
header("Content-type: text/html; charset=utf-8");

if($_POST){
    if($_POST['app_id'] || $_POST['app_key'] || $_POST['token']) {
        if(file_exists("sso_data.php")) {require_once("./sso_data.php");}
        else echo "文件不存在";
        $token = $_POST['token'];
        if($_POST['app_id'] == $app_id && $_POST['app_key'] == $app_key) {//应用拥有访问权限
            require_once("db_connect.php");
            $query = "SELECT * FROM sso_token WHERE token = '$token'";
            $nums = mysql_num_rows(mysql_query($query));
            if($nums) { //根据token能查询到,
                $query_result = mysql_fetch_array(mysql_query($query));
                if(strtotime(date('Y-m-d H:i:s'))-strtotime($query_result['timestamp']) < 3600*24*2) {//该token仍在有效期
                    $uid = $query_result['u_id'];
                    $u_name = $query_result['u_name'];
                    $return_data = json_encode(array("is_login"=>"true","u_id"=>$uid,"u_name"=>$u_name));
                }else {//token已经过期,删除token并返回结果
                    mysql_query("DELETE FROM sso_token WHERE token='$token'");
                    $return_data = json_encode(array("is_login"=>"false","u_id"=>-1,"u_name"=>"is_expired"));
//                    print_r(mysql_fetch_array(mysql_query("SELECT FROM sso_token WHERE token = '$token'")));
                    if(mysql_affected_rows()<1)  {
//                        die("删除过期token出错!");
                        ;
                    }
                }
            }else {//查询不到对应的token，返回结果
                $return_data = json_encode(array("is_login"=>"false","u_id"=>0,"u_name"=>"token_err"));
            }

        } else {
//            die("Access Deny!");
            $return_data = json_encode(array("is_login"=>"deny","u_id"=>0,"u_name"=>"app_denied"));

        }
        echo $return_data;
    }
}
