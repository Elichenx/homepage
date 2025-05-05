<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/config.php";
session_start(); 

// 只检查是否登录，移除所有域名验证代码
if (!isset($_SESSION["user"])) {
    setcookie("status", "请先登录", time() + 3);
    header("Location: /admin/login.php");
    exit;
}