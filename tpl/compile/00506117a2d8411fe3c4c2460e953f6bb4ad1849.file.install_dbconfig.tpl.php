<?php /* Smarty version Smarty-3.1.13, created on 2015-04-02 11:49:11
         compiled from "D:\phpLight\WWW\baigoSSO\tpl\install\install_dbconfig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10159551cbc3722bde3-05801533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00506117a2d8411fe3c4c2460e953f6bb4ad1849' => 
    array (
      0 => 'D:\\phpLight\\WWW\\baigoSSO\\tpl\\install\\install_dbconfig.tpl',
      1 => 1427946471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10159551cbc3722bde3-05801533',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'cfg' => 0,
    'common' => 0,
    'alert' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_551cbc37400a55_83433908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551cbc37400a55_83433908')) {function content_551cbc37400a55_83433908($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['cfg'] = new Smarty_variable(array('sub_title'=>$_smarty_tpl->tpl_vars['lang']->value['page']['installDb'],'mod_help'=>"install",'act_help'=>"dbconfig"), null, 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("include/install_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('cfg'=>$_smarty_tpl->tpl_vars['cfg']->value), 0);?>


	<form name="install_form_dbconfig" id="install_form_dbconfig">
		<input type="hidden" name="token_session" class="token_session" value="<?php echo $_smarty_tpl->tpl_vars['common']->value['token_session'];?>
">
		<input type="hidden" name="act_post" value="dbconfig">

		<div class="form-group">
			<label class="control-label"><?php echo $_smarty_tpl->tpl_vars['lang']->value['label']['dbHost'];?>
<span id="msg_db_host">*</span></label>
			<input type="text" name="db_host" id="db_host" class="validate form-control input-lg" value="<?php if (@constant('BG_DB_HOST')){?><?php echo @constant('BG_DB_HOST');?>
<?php }else{ ?>localhost<?php }?>">
		</div>

		<div class="form-group">
			<label class="control-label"><?php echo $_smarty_tpl->tpl_vars['lang']->value['label']['dbName'];?>
<span id="msg_db_name">*</span></label>
			<input type="text" name="db_name" id="db_name" class="validate form-control input-lg" value="<?php if (@constant('BG_DB_NAME')){?><?php echo @constant('BG_DB_NAME');?>
<?php }else{ ?>baigo_cms<?php }?>">
		</div>

		<div class="form-group">
			<label class="control-label"><?php echo $_smarty_tpl->tpl_vars['lang']->value['label']['dbUser'];?>
<span id="msg_db_user">*</span></label>
			<input type="text" name="db_user" id="db_user" class="validate form-control input-lg" value="<?php if (@constant('BG_DB_USER')){?><?php echo @constant('BG_DB_USER');?>
<?php }else{ ?>baigo_cms<?php }?>">
		</div>

		<div class="form-group">
			<label class="control-label"><?php echo $_smarty_tpl->tpl_vars['lang']->value['label']['dbPass'];?>
<span id="msg_db_pass">*</span></label>
			<input type="text" name="db_pass" id="db_pass" class="validate form-control input-lg" value="<?php if (@constant('BG_DB_PASS')){?><?php echo @constant('BG_DB_PASS');?>
<?php }?>">
		</div>

		<div class="form-group">
			<label class="control-label"><?php echo $_smarty_tpl->tpl_vars['lang']->value['label']['dbCharset'];?>
<span id="msg_db_charset">*</span></label>
			<input type="text" name="db_charset" id="db_charset" class="validate form-control input-lg" value="<?php if (@constant('BG_DB_CHARSET')){?><?php echo @constant('BG_DB_CHARSET');?>
<?php }else{ ?>utf8<?php }?>">
		</div>

		<div class="form-group">
			<label class="control-label"><?php echo $_smarty_tpl->tpl_vars['lang']->value['label']['dbTable'];?>
<span id="msg_db_table">*</span></label>
			<input type="text" name="db_table" id="db_table" class="validate form-control input-lg" value="<?php if (@constant('BG_DB_TABLE')){?><?php echo @constant('BG_DB_TABLE');?>
<?php }else{ ?>bg_<?php }?>">
		</div>

		<div class="form-group">
			<div class="btn-group">
				<button type="button" id="go_next" class="btn btn-primary btn-lg"><?php echo $_smarty_tpl->tpl_vars['lang']->value['btn']['save'];?>
</button>
				<?php echo $_smarty_tpl->getSubTemplate ("include/install_drop.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('cfg'=>$_smarty_tpl->tpl_vars['cfg']->value), 0);?>

			</div>
		</div>
	</form>

<?php echo $_smarty_tpl->getSubTemplate ("include/install_foot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('cfg'=>$_smarty_tpl->tpl_vars['cfg']->value), 0);?>


	<script type="text/javascript">
	var opts_validator_form = {
		db_host: {
			length: { min: 1, max: 0 },
			validate: { type: "str", format: "text" },
			msg: { id: "msg_db_host", too_short: "<?php echo $_smarty_tpl->tpl_vars['alert']->value['x030204'];?>
" }
		},
		db_name: {
			length: { min: 1, max: 0 },
			validate: { type: "str", format: "text" },
			msg: { id: "msg_db_name", too_short: "<?php echo $_smarty_tpl->tpl_vars['alert']->value['x030205'];?>
" }
		},
		db_user: {
			length: { min: 1, max: 0 },
			validate: { type: "str", format: "text" },
			msg: { id: "msg_db_user", too_short: "<?php echo $_smarty_tpl->tpl_vars['alert']->value['x030206'];?>
" }
		},
		db_pass: {
			length: { min: 1, max: 0 },
			validate: { type: "str", format: "text" },
			msg: { id: "msg_db_pass", too_short: "<?php echo $_smarty_tpl->tpl_vars['alert']->value['x030207'];?>
" }
		},
		db_charset: {
			length: { min: 1, max: 0 },
			validate: { type: "str", format: "text" },
			msg: { id: "msg_db_charset", too_short: "<?php echo $_smarty_tpl->tpl_vars['alert']->value['x030208'];?>
" }
		},
		db_table: {
			length: { min: 1, max: 0 },
			validate: { type: "str", format: "text" },
			msg: { id: "msg_db_table", too_short: "<?php echo $_smarty_tpl->tpl_vars['alert']->value['x030209'];?>
" }
		},
		db_debug: {
			length: { min: 1, max: 0 },
			validate: { type: "radio" },
			msg: { id: "msg_db_debug", too_few: "<?php echo $_smarty_tpl->tpl_vars['alert']->value['x030210'];?>
" }
		}
	};
	var opts_submit_form = {
		ajax_url: "<?php echo @constant('BG_URL_INSTALL');?>
ajax.php?mod=install",
		btn_text: "<?php echo $_smarty_tpl->tpl_vars['lang']->value['btn']['stepNext'];?>
",
		btn_close: "<?php echo $_smarty_tpl->tpl_vars['lang']->value['btn']['close'];?>
",
		btn_url: "<?php echo @constant('BG_URL_INSTALL');?>
ctl.php?mod=install&act_get=dbtable"
	};

	$(document).ready(function(){
		var obj_validator_form = $("#install_form_dbconfig").baigoValidator(opts_validator_form);
		var obj_submit_form = $("#install_form_dbconfig").baigoSubmit(opts_submit_form);
		$("#go_next").click(function(){
			if (obj_validator_form.validateSubmit()) {
				obj_submit_form.formSubmit();
			}
		});
	})
	</script>

</html><?php }} ?>