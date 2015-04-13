<?php /* Smarty version Smarty-3.1.13, created on 2015-04-02 11:49:11
         compiled from "D:\phpLight\WWW\baigoSSO\tpl\install\include\install_foot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13064551cbc375603a4-08747461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2a7291853f3a16a9326766ba76e8fedce81f038' => 
    array (
      0 => 'D:\\phpLight\\WWW\\baigoSSO\\tpl\\install\\include\\install_foot.tpl',
      1 => 1427946471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13064551cbc375603a4-08747461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cfg' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_551cbc3757f7a3_54461027',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551cbc3757f7a3_54461027')) {function content_551cbc3757f7a3_54461027($_smarty_tpl) {?>

			</div>

			<div class="panel-footer">
				<div class="pull-left">
					<a href="<?php echo @constant('PRD_SSO_URL');?>
" target="_blank"><?php echo @constant('PRD_SSO_POWERED');?>
 <?php echo @constant('PRD_SSO_NAME');?>
</a>
				</div>
				<div class="pull-right">
					<a href="<?php echo @constant('BG_URL_HELP');?>
ctl.php?mod=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['mod_help'];?>
&act_get=<?php echo $_smarty_tpl->tpl_vars['cfg']->value['act_help'];?>
" target="_blank">
						<span class="glyphicon glyphicon-question-sign"></span>
						<?php echo $_smarty_tpl->tpl_vars['lang']->value['href']['help'];?>

					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

</body>
<?php }} ?>