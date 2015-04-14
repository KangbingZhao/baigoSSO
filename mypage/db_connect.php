<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/13
 * Time: 14:51
 */
header("Content-type: text/html; charset=utf-8");
$sso_token_con = mysql_connect("localhost","root","root");
if(!$sso_token_con) {
    die("could not connect to sso server database!");
}
mysql_select_db("baigosso",$sso_token_con);

?>