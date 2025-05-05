<div style="margin-top: 140px">
</div>
<!-- 依赖库 -->
<script src="/admin/assets/lib/jquery-3.6.0/jquery.min.js"></script>
<script src="/admin/assets/lib/mdui-v1.0.2/js/mdui.min.js"></script>
<script src="/admin/assets/lib/jquery_lazyload-1.9.7/jquery.lazyload.js"></script>
<script src="/admin/assets/lib/jquery-cookie-1.4.1/jquery.cookie.min.js"></script>
<script src="/admin/assets/lib/axios-1.5.0/axios.min.js"></script>
<script src="/admin/assets/js/Base.js"></script>
<script src="/admin/assets/js/AdminCommon.js"></script>
<script src="/admin/assets/js/commonOld.js"></script>

<!-- 全局 -->
<script>
    //实例化通用类
    let AdminCommonEntity = new AdminCommon();

    //通用跳转
    const jumpUrl = (url, time) => AdminCommonEntity.JumpUrl(url, time);

    $(function () {
        //CookieMsg处理
        AdminCommonEntity.CookieMsgHandling();
        //绑定全局账户退出按钮
        AdminCommonEntity.BindLogout('submitLogout');
    })
 

   

   
</script>

   
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