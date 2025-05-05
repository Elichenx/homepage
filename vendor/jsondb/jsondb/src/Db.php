<?php

namespace JsonDb\JsonDb;

/**
 * @package JsonDb
 * @author  易航
 * @version dev
 * @link    https://gitee.com/yh_IT/json-db
 * 易航天地
 * http://bri6.cn
 */
class Db
{

	private static array $options = [];

	public static array $log = [];

	/**
	 * 初始化配置参数
	 * @access public
	 * @param array $options 连接配置
	 * @return void
	 */
	public static function setConfig($options)
	{
		self::$options = $options;
	}

	/**
	 * 指定当前操作的数据表(不带前缀)
	 * @access public
	 * @param string $table 表名
	 * @return JsonDb
	 */
	public static function table($table_name)
	{
		return (new JsonDb(self::$options))->table($table_name);
	}

	/**
	 * 指定当前操作的数据表
	 * @access public
	 * @param string $table 表名
	 * @return JsonDb
	 */
	public static function name($table_name)
	{
		$table_name = isset(self::$options['prefix']) ? self::$options['prefix'] . $table_name : $table_name;
		return self::table($table_name);
	}

	public static function getDbLog()
	{
		return self::$log;
	}
}