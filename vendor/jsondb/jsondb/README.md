# JsonDb使用文档

## 简介

JsonDb是一款由原生PHP实现的非关系型轻量级JSON文件数据库。如果你需要存储各种基础类的数据，或者一个站点内有多个小项目，那么JsonDb就是你最佳的选择。它包括查询、新增、更新、删除等对数据的基本操作，适合存储数据量不大的数据

[使用帮助文档](https://yepydvmpxo.k.topthink.com/@json-db/)丨[QQ交流群](https://jq.qq.com/?_wv=1027&k=k8ryssaa)：733120686

## 主要特性

- 基于JSON和PHP强类型实现
- 简洁易用的查询功能
- 支持多数据表及动态切换
- 支持JSON查询

## 使用说明

### 使用 composer

```shell
composer require jsondb/jsondb:dev-master
```

或者

### clone 项目到本地

- github地址

```shell
git clone https://github.com/xh8039/JsonDb.git
```

- 码云地址

```shell
git clone https://gitee.com/yh-it/json-db.git
```

### 初始化

```php
use JsonDb\JsonDb\Db;

// composer自动加载
require 'vendor/autoload.php';

// 默认关闭数据压缩、加密并开启调试模式，可使用自定义配置
// 自定义配置项 具体配置请参考文档：https://gitee.com/yh_IT/json-db/wikis
$json_path = $_SERVER['DOCUMENT_ROOT'] . 'content' . DIRECTORY_SEPARATOR . 'JsonDb';
Db::setConfig([
 'path' => $json_path, // 数据存储路径（必须配置）
 'file_suffix' => '.json', // 文件后缀名
 'debug' => true, // 调试模式
 'encode' => null, // 数据加密函数
 'decode' => null, // 数据解密函数
]);
```

## [查看查询构造器](https://yepydvmpxo.k.topthink.com/@json-db/)
