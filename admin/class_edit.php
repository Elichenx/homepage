<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;
if (!isset($_GET['id'])) {
    setcookie('status', '分类不存在', time() + 3); // 
    header("Location: /admin/class.php");
}
$config=Db::name('class')->where('id',$_GET['id'])->find();

ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<div class="mdui-container">

    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">分类修改</h1>
        </div>
    </div>

    <!-- 主体组件 -->
    <div class="mdui-card">
        <div class="mdui-p-b-2 mdui-p-x-2">
            <div class="mdui-row">
               
                <form  method="post" name="edit-form"  action="post.php?type=class_edit&id=<?php echo $_GET['id'];?>" class="edit-form">
                  
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">分类名称</label>
                        <input class="mdui-textfield-input" name="name" type="text" value="<?php echo $config['name']; ?>" />
                      </div>
                      <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="img" placeholder="分类svg代码"><?php echo $config['img']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">分类svg代码不会填看总览页公告</div>
                        </div>
                      
                    
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label mdui-m-t-2">类型</label>
                        <select class="mdui-select" name="class" style="width: 100%;">
                            <option value="1" <?php echo ($config['class'] == 1) ? 'selected' : ''; ?>>类型1</option>
                            <option value="2" <?php echo ($config['class'] == 2) ? 'selected' : ''; ?>>类型2</option>
                        </select>
                    </div>
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