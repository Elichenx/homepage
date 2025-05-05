<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;

$config=Db::name('config')->where('id',2)->find();
if ($_POST) {
    $data = [
        'user' => $_POST['user'],
        'pwd' => $_POST['newpaw'],
    ];
    if (empty($_POST['user'])) {
        setcookie('status', '账号不能为空', time() + 3); // 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    if (empty($_POST['oedpaw'])) {
        setcookie('status', '旧密码不能为空', time() + 3); // 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    if ($_POST['oedpaw']!=$config['pwd']) {
        setcookie('status', '老密码错误', time() + 3); // 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    if (empty($_POST['newpaw'])) {
        setcookie('status', '新密码不能为空', time() + 3); // 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    $rst=Db::name('config')->where('id',2)->update($data);
    if ($rst) {
        setcookie('status', '更新成功！', time() + 3); // 
    } else {
        setcookie('status', '更新失败！', time() + 3); // 
    }
    header("Location: /admin/account.php");
    exit();
}
ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<div class="mdui-container">

    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">账号设置</h1>
        </div>
    </div>

    <!-- 主体组件 -->
    <div class="mdui-card">
        <div class="mdui-p-b-2 mdui-p-x-2">
            <div class="mdui-row">
               
                <form  method="post" name="edit-form"  class="edit-form">
                  
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">账号</label>
                        <input class="mdui-textfield-input" name="user" type="text" value="<?php echo $config['user']; ?>" />
                      </div>
                      <div class="mdui-textfield">
                        <label class="mdui-textfield-label">旧密码</label>
                        <input class="mdui-textfield-input" name="oedpaw" type="text" value="" />
                      </div>
                      <div class="mdui-textfield">
                        <label class="mdui-textfield-label">新密码</label>
                        <input class="mdui-textfield-input" name="newpaw" type="text" value="" />
                      </div>
                      <div class="mdui-textfield">
                      
                    </div>
                    
                    

            <div class="mdui-row">
                <div class="mdui-col-xs-12">
                    <!--提交按钮-->
                    <a href="class.php" class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-ripple">返回</a>
                    <button class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple">提交</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php 
require_once './footer.php';
?>