<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;
$class=Db::name('svg')->where('id',$_GET['id'])->find();
if (!isset($class)) {
    setcookie('status', '图标不存在', time() + 3); // 
    header("Location: /admin/svg.php");
}

ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<div class="mdui-container">

    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">图标修改</h1>
        </div>
    </div>

    <!-- 主体组件 -->
    <div class="mdui-card">
        <div class="mdui-p-b-2 mdui-p-x-2">
            <div class="mdui-row">
               
                <form method="post" name="edit-form" class="edit-form"  action="post.php?type=svg_edit&id=<?php echo $_GET['id'];?>">
                
                    <div class="mdui-row">
                        <div class="mdui-col-xs-9 mdui-col-md-10">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">图标名称</label>
                                <input class="mdui-textfield-input" value="<?php echo $class['name']; ?>" name="name" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">跳转链接</label>
                        <input class="mdui-textfield-input" value="<?php echo $class['url']; ?>" name="url"  />
                    </div>
                    <div class="mdui-row">
                        <div class="mdui-col-xs-9 mdui-col-md-10">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">点击事件</label>
                                <input class="mdui-textfield-input" value="<?php echo $class['onclick']; ?>" name="onclick" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="mdui-row">
                        <div class="mdui-col-xs-9 mdui-col-md-10">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">图标</label>
                                <input class="mdui-textfield-input" value="<?php echo $class['svg']; ?>" name="svg" type="text" />
                            </div>
                        </div>
                    </div>
            </div>

            <div class="mdui-row">
                <div class="mdui-col-xs-12">
                    <!--提交按钮-->
                    <a href="/xysdh/class" class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-ripple">返回</a>
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