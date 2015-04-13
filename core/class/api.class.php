<?php
/*-----------------------------------------------------------------
！！！！警告！！！！
以下为系统文件，请勿修改
-----------------------------------------------------------------*/
error_reporting(E_ALL & ~E_NOTICE);
//不能非法包含或直接执行
if(!defined("IN_BAIGO")) {
	exit("Access Denied");
}


/*-------------API 接口类-------------*/
class CLASS_API {

	private $obj_base; //配置
	private $config; //配置
	public $log; //配置

	function __construct() { //构造函数
		$this->obj_base   = $GLOBALS["obj_base"]; //获取界面类型
		$this->config     = $this->obj_base->config;
		$this->log        = include_once(BG_PATH_LANG . $this->config["lang"] . "/log.php"); //载入日志内容
	}


	/** 验证 app
	 * app_chk function.
	 *
	 * @access public
	 * @param mixed $arr_appGet
	 * @param mixed $arr_appRow
	 * @return void
	 */
	function app_chk($arr_appGet, $arr_appRow) {
		if ($arr_appGet["str_alert"] != "ok") {
			return $arr_appRow;
		}

		if ($arr_appRow["app_status"] != "enable") {
			return array(
				"str_alert" => "x050402",
			);
			exit;
		}

		$_str_ip = fn_getIp(false);

		if ($arr_appRow["app_ip_allow"]) {
			$_str_ipAllow = str_replace(PHP_EOL, "|", $arr_appRow["app_ip_allow"]);
			if (!fn_regChk($_str_ip, $_str_ipAllow, true)) {
				return array(
					"str_alert" => "x050212",
				);
				exit;
			}
		} else if ($arr_appRow["app_ip_bad"]) {
			$_str_ipBad = str_replace(PHP_EOL, "|", $arr_appRow["app_ip_bad"]);
			if (fn_regChk($_str_ip, $_str_ipBad)) {
				return array(
					"str_alert" => "x050213",
				);
				exit;
			}
		}

		if ($arr_appRow["app_key"] != $arr_appGet["app_key"]) {
			return array(
				"str_alert" => "x050217",
			);
			exit;
		}

		return array(
			"str_alert" => "ok",
		);
	}


	/** 读取 app 信息
	 * app_get function.
	 *
	 * @access public
	 * @param bool $chk_token (default: false)
	 * @return void
	 */
	function app_get($str_method = "get", $chk_token = false) {
		if ($str_method == "post") {
			$num_appId       = fn_post("app_id");
			$str_appKey      = fn_post("app_key");
		} else {
			$num_appId       = fn_get("app_id");
			$str_appKey      = fn_get("app_key");
		}

		$_arr_appId = validateStr($num_appId, 1, 0, "str", "int");
		switch ($_arr_appId["status"]) {
			case "too_short":
				return array(
					"str_alert" => "x050203",
				);
				exit;
			break;

			case "format_err":
				return array(
					"str_alert" => "x050204",
				);
				exit;
			break;

			case "ok":
				$_arr_appGet["app_id"] = $_arr_appId["str"];
			break;

		}

		$_arr_appKey = validateStr($str_appKey, 1, 64, "str", "alphabetDigit");
		switch ($_arr_appKey["status"]) {
			case "too_short":
				return array(
					"str_alert" => "x050214",
				);
				exit;
			break;

			case "too_long":
				return array(
					"str_alert" => "x050215",
				);
				exit;
			break;

			case "format_err":
				return array(
					"str_alert" => "x050216",
				);
				exit;
			break;

			case "ok":
				$_arr_appGet["app_key"] = $_arr_appKey["str"];
			break;

		}

		$_arr_appGet["str_alert"] = "ok";

		return $_arr_appGet;
	}


	/** 通知
	 * api_notice function.
	 *
	 * @access public
	 * @param mixed $arr_data
	 * @param mixed $arr_appRows
	 * @return void
	 */
	function api_notice($arr_data, $arr_appRows) {
		foreach ($arr_appRows as $_key=>$_value) {
			$_tm_time    = time();
			$_str_rand   = fn_rand();
			$_str_sign   = fn_baigoSignMk($_tm_time, $_str_rand);

			$_arr_query = array(
				"timestamp" => $_tm_time,
				"random"    => $_str_rand,
				"signature" => $_str_sign,
				"app_id"    => $_value["app_id"],
				"app_key"   => $_value["app_key"],
			);

			$_arr_data = array_merge($arr_data, $_arr_query);

			$_arr_return[$_key] = fn_http($_value["app_notice"], $_arr_data, "post");
		}

		return $_arr_return;
	}


	/** 编码
	 * api_encode function.
	 *
	 * @access public
	 * @param mixed $arr_data
	 * @param mixed $str_key
	 * @return void
	 */
	function api_encode($arr_data, $str_key) {
		unset($arr_data["str_alert"]);

		$_str_src     = fn_jsonEncode($arr_data, "encode");
		$_str_code    = fn_baigoEncode($_str_src, $str_key);

		return $_str_code;
	}

	/** 返回结果
	 * halt_re function.
	 *
	 * @access public
	 * @param mixed $arr_re
	 * @return void
	 */
	function halt_re($arr_re) {
		exit(json_encode($arr_re)); //输出错误信息
	}
}
