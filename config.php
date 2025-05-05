<?php
// composer自动加载
require_once __DIR__ . '/vendor/autoload.php';

use JsonDb\JsonDb\Db;
// 默认关闭数据压缩、加密并开启调试模式，可使用自定义配置
// 自定义配置项 具体配置请参考文档：https://yepydvmpxo.k.topthink.com/@json-db/
$json_path = $_SERVER['DOCUMENT_ROOT'] . '\content' . DIRECTORY_SEPARATOR . 'JsonDb';
Db::setConfig([
 'path' => $json_path, // 数据存储路径（必须配置）
 'file_suffix' => '.json', // 文件后缀名
 'debug' => true, // 调试模式
 'encode' => null, // 数据加密函数
 'decode' => null, // 数据解密函数
]);
session_start();
