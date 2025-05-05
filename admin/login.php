<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
session_start();
use JsonDb\JsonDb\Db;
$config=Db::name('config')->where('id', 2)->find();
 if ($_POST) {
    if ($config['user']==$_POST['user'] && $config['pwd']==$_POST['pass'] ) {
        $_SESSION['user'] = $config;
        setcookie('status', '登录成功', time() + 3); // 
        header("Location: /admin/index.php");
        exit;
    }else{
        setcookie('status', '账号或者密码错误', time() + 3); // 
        header("Location: /admin/login.php");
        exit;
    }
  
}
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <title>自助网页管理系统</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="./assets/img/favicon.ico">
    <link rel="stylesheet" href="./assets/lib/mdui-v1.0.2/css/mdui.min.css" />
    <link rel="stylesheet" href="./assets/css/base.css" />
</head>

<body class="mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-layout-light mdui-theme-accent-pink">

    <!-- 顶栏 -->
    <header class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">
            <a href="#" class="mdui-typo-headline">自助网页管理系统</a>
            <div class="mdui-toolbar-spacer"></div>

        </div>
    </header>

    <!-- 侧栏 -->


    <!-- 页体 -->
    <div class="mdui-container">
        <h1 class="mdui-text-color-theme mdui-p-t-2">登录管理</h1>

        <!-- 框架层 -->
        <div class="mdui-col-offset-md-3">
            <div class="mdui-card 
                        mdui-col-xs-12
                        mdui-col-md-8
                        mdui-p-y-3
                        mdui-p-x-3
                        mdui-m-b-2">

                <!-- 组件层 -->
                <form  method="post" name="edit-form" class="edit-form">
                   
                <div class="mdui-p-b-5">
                    <!--"账号"输入框-->
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <i class="mdui-icon material-icons">&#xe853;</i>
                        <label class="mdui-textfield-label">账号</label>
                        <input class="mdui-textfield-input" type="text" name="user" />
                    </div>
                    <!--"密码"输入框-->
                    <div class="mdui-textfield mdui-textfield-floating-label">

                        <i class="mdui-icon material-icons">&#xe898;</i>
                        <label class="mdui-textfield-label">密码</label>
                        <input class="mdui-textfield-input" type="password" name="pass" />
                    </div>
                </div>

                <!-- 组件层 -->
                <div class="mdui-p-b-3">
                    <button id="submitLogin" 
                        class="mdui-btn-block mdui-color-theme-accent mdui-btn mdui-ripple">
                        登 录
                    </button>
                </div>
            </form>
                <!-- 组件层 -->
                <div class="mdui-divider"></div>

                <!-- 组件层 -->
                <div class="mdui-typo-caption mdui-text-color-black-disabled mdui-p-t-1 mdui-typo">
                    <!--废话 <kbd>Ver-{$LCVersionInfo['VerS']}-{$LCVersionInfo['Ver']}</kbd> -->
                    <p>本站由<a href="http://host.0330.top" target="_blank"
                            class="mdui-text-color-pink">SibHost</a>强力驱动</p>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 140px">
    </div>
    <script src="./assets/lib/jquery-3.6.0/jquery.min.js"></script>
<script src="./assets/lib/mdui-v1.0.2/js/mdui.min.js"></script>
<script src="./assets/lib/jquery_lazyload-1.9.7/jquery.lazyload.js"></script>
<script src="./assets/lib/jquery-cookie-1.4.1/jquery.cookie.min.js"></script>
<script src="./assets/lib/axios-1.5.0/axios.min.js"></script>
<script src="./assets/js/Base.js"></script>
<script src="./assets/js/AdminCommon.js"></script>
<script src="./assets/js/commonOld.js"></script>
<?php

// 检查是否存在名为 'status' 的 cookie
if (isset($_COOKIE['status'])) {
    $status = $_COOKIE['status'];
    echo "<script>
        mdui.snackbar({
            message: '" . addslashes($status) . "', // 确保消息中的特殊字符被转义
            position: 'top', // 设置 Snackbar 显示在左上角
            timeout: 3000 // 3秒后自动关闭
        });
    </script>";
    // 删除 cookie
   // 将 cookie 过期时间设置为过去的时间，以删除 cookie
}

?>
</body>

</html>