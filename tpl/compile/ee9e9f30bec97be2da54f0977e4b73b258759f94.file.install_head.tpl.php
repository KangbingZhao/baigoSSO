<?php /* Smarty version Smarty-3.1.13, created on 2015-04-02 11:49:11
         compiled from "D:\phpLight\WWW\baigoSSO\tpl\install\include\install_head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26960551cbc3740c5d2-91874589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee9e9f30bec97be2da54f0977e4b73b258759f94' => 
    array (
      0 => 'D:\\phpLight\\WWW\\baigoSSO\\tpl\\install\\include\\install_head.tpl',
      1 => 1427946471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26960551cbc3740c5d2-91874589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'lang' => 0,
    'cfg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_551cbc37498ff8_61092461',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551cbc37498ff8_61092461')) {function content_551cbc37498ff8_61092461($_smarty_tpl) {?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['config']->value['lang'];?>
">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['install'];?>
</title>

	<!--jQuery 库-->
	<script src="<?php echo @constant('BG_URL_JS');?>
jquery.min.js" type="text/javascript"></script>
	<link href="<?php echo @constant('BG_URL_STATIC_INSTALL');?>
css/install.css" type="text/css" rel="stylesheet">

	<!--bootstrap-->
	<link href="<?php echo @constant('BG_URL_JS');?>
bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<script src="<?php echo @constant('BG_URL_JS');?>
bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<!--表单验证 js-->
	<link href="<?php echo @constant('BG_URL_JS');?>
baigoValidator/baigoValidator.css" type="text/css" rel="stylesheet">
	<script src="<?php echo @constant('BG_URL_JS');?>
baigoValidator/baigoValidator.js" type="text/javascript"></script>

	<!--表单 ajax 提交 js-->
	<link href="<?php echo @constant('BG_URL_JS');?>
baigoSubmit/baigoSubmit.css" type="text/css" rel="stylesheet">
	<script src="<?php echo @constant('BG_URL_JS');?>
baigoSubmit/baigoSubmit.js" type="text/javascript"></script>
</head>

<body>

	<div class="container global">

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo @constant('PRD_SSO_URL');?>
" target="_blank">
						<img alt="baigo SSO" src="<?php echo @constant('BG_URL_STATIC_ADMIN');?>
default/image/admin_logo.png">
					</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo $_smarty_tpl->tpl_vars['lang']->value['btn']['jump'];?>

							<span class="caret"></span>
						</a>
						<?php echo $_smarty_tpl->getSubTemplate ("include/install_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('cfg'=>$_smarty_tpl->tpl_vars['cfg']->value), 0);?>

					</li>
				</ul>
			</div>
		</nav>

		<div class="panel panel-success">
			<div class="panel-heading">
				<h4><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['install'];?>
 <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['sub_title'];?>
</span></h4>
			</div>

			<div class="panel-body">
<?php }} ?>