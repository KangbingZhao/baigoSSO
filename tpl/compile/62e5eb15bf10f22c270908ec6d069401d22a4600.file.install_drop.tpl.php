<?php /* Smarty version Smarty-3.1.13, created on 2015-04-02 11:49:11
         compiled from "D:\phpLight\WWW\baigoSSO\tpl\install\include\install_drop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11165551cbc37535415-88546569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e5eb15bf10f22c270908ec6d069401d22a4600' => 
    array (
      0 => 'D:\\phpLight\\WWW\\baigoSSO\\tpl\\install\\include\\install_drop.tpl',
      1 => 1427946471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11165551cbc37535415-88546569',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'cfg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_551cbc375509a0_80867588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551cbc375509a0_80867588')) {function content_551cbc375509a0_80867588($_smarty_tpl) {?>					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle btn-lg" data-toggle="dropdown">
							<?php echo $_smarty_tpl->tpl_vars['lang']->value['btn']['jump'];?>

							<span class="caret"></span>
						</button>

						<?php echo $_smarty_tpl->getSubTemplate ("include/install_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('cfg'=>$_smarty_tpl->tpl_vars['cfg']->value), 0);?>

					</div>
<?php }} ?>