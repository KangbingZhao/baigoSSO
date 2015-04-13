<?php /* Smarty version Smarty-3.1.13, created on 2015-04-02 11:49:11
         compiled from "D:\phpLight\WWW\baigoSSO\tpl\install\include\install_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1358551cbc374cfb05-90234502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b6013720b0c977a23144ac912b494e0007f45ff' => 
    array (
      0 => 'D:\\phpLight\\WWW\\baigoSSO\\tpl\\install\\include\\install_menu.tpl',
      1 => 1427946471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1358551cbc374cfb05-90234502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_551cbc37529893_97845576',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551cbc37529893_97845576')) {function content_551cbc37529893_97845576($_smarty_tpl) {?>	<ul class="dropdown-menu">
		<li><a href="<?php echo @constant('BG_URL_INSTALL');?>
ctl.php?mod=install&act_get=db"><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['installDb'];?>
</a></li>
		<li><a href="<?php echo @constant('BG_URL_INSTALL');?>
ctl.php?mod=install&act_get=dbtable"><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['installTable'];?>
</a></li>
		<li class="divider"></li>
		<li><a href="<?php echo @constant('BG_URL_INSTALL');?>
ctl.php?mod=install&act_get=base"><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['installBase'];?>
</a></li>
		<li><a href="<?php echo @constant('BG_URL_INSTALL');?>
ctl.php?mod=install&act_get=reg"><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['installReg'];?>
</a></li>
		<li class="divider"></li>
		<li><a href="<?php echo @constant('BG_URL_INSTALL');?>
ctl.php?mod=install&act_get=admin"><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['installAdmin'];?>
</a></li>
		<li><a href="<?php echo @constant('BG_URL_INSTALL');?>
ctl.php?mod=install&act_get=over"><?php echo $_smarty_tpl->tpl_vars['lang']->value['page']['installOver'];?>
</a></li>
	</ul>
<?php }} ?>