<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;
$content=Db::name('dh')->where('id',$_GET['id'])->find();
if (!isset($content)) {
    setcookie('status', '导航不存在', time() + 3); // 
    header("Location: /admin/dh.php");
}
$class=Db::name('class')->select();
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
                <!-- 表单开始 -->
                <form method="post" name="edit-form" class="edit-form" action="post.php?type=dh_edit&id=<?php echo $_GET['id'];?>">
                 
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">导航名称</label>
                        <input class="mdui-textfield-input" name="name" type="text" value="<?php echo $content['name']; ?>" />
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label mdui-m-t-2">选择分类</label>
                        <select class="mdui-select" name="classid" style="width: 100%;">
                            <?php foreach ($class as $v): ?>
                            <option value="<?php echo $v['id']; ?>" <?php echo ($v['id'] == $content['classid']) ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">导航url</label>
                        <input class="mdui-textfield-input" name="url" type="text" value="<?php echo $content['url']; ?>" />
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">导航图标</label>
                        <input class="mdui-textfield-input" name="img" type="text" value="<?php echo $content['img']; ?>" />
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">描述</label>
                        <input class="mdui-textfield-input" name="des" type="text" value="<?php echo $content['des']; ?>" />
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">显示顺序</label>
                        <input class="mdui-textfield-input" name="sort_order" type="number" value="<?php echo isset($content['sort_order']) ? $content['sort_order'] : '0'; ?>" />
                        <div class="mdui-textfield-helper">数字越小排序越靠前，默认为0</div>
                    </div>
                    <!-- 提交按钮 -->
                    <div class="mdui-row">
                        <div class="mdui-col-xs-12">
                            <a href="/xysdh/class" class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-ripple">返回</a>
                            <button class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
require_once './footer.php';
?>