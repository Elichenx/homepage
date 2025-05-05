<?php
ob_start(); // 开始输出缓冲
require_once './common.php';

use JsonDb\JsonDb\Db;

$class = Db::name('class')->select();
if ($_POST) {
    $data = [
        'class' => $_POST['class'],
        'name' => $_POST['name'],
        'img' => $_POST['img'],

    ];
    if (empty($_POST['name'])) {
        setcookie('status', '分类名称不能为空', time() + 3); // 
        header("Location: /admin/class.php");
        exit;
    }
    if (empty($_POST['img'])) {
        setcookie('status', '分类图标不能为空', time() + 3); // 
        header("Location: /admin/class.php");
        exit;
    }
    $rst = Db::name('class')->insert($data);
    if ($rst) {
        setcookie('status', '添加成功！', time() + 3); // 
    } else {
        setcookie('status', '添加失败！', time() + 3); // 
    }
    header("Location: /admin/class.php");
}
ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<div class="mdui-container">
    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">导航分类管理</h1>
        </div>
        <div class="mdui-col-xs-6">
            <button class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple"
                mdui-dialog="{target: '#dialogAdd'}">添加分类</button>
            <!-- 弹窗组件 -->
            <form method="post" name="add-form" class="edit-form">

                <div class="mdui-dialog" id="dialogAdd">
                    <div class="mdui-dialog-title">添加分类</div>
                    <div class="mdui-row mdui-p-x-4">
                        <div class="mdui-row">
                            <div class="mdui-col-xs-9 mdui-col-md-10">
                                <div class="mdui-textfield">
                                    <label class="mdui-textfield-label">分类名称</label>
                                    <input class="mdui-textfield-input" name="name" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">分类图标</label>
                            <input class="mdui-textfield-input" name="img" />
                        </div>
                        <div class="mdui-textfield">
                            <div class="mdui-textfield-helper mdui-typo">图标填写说明:图标请使用svg代码,教程请在首页总览里面查看</div>
                        </div>
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label mdui-m-t-2">类型</label>
                            <select class="mdui-select" name="class" style="width: 100%;">
                                <option value="1">类型1</option>
                                <option value="2">类型2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mdui-dialog-actions">
                        <button class="mdui-btn mdui-ripple" mdui-dialog-close>确定</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- 主体组件 -->
    <div class="mdui-card mdui-p-a-2">
        <div class="mdui-table-fluid mdui-shadow-0 mdui-m-b-1">
            <table class="mdui-table mdui-typo">
                <thead>
                    <tr>
                        <th>分类名称</th>
                        <th>分类类型</th>
                        <th class="mdui-table-col-numeric">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($class as $v): ?> <!-- 假设 $class 是在外部定义的数组 -->
                        <tr>
                            <td><?php echo $v['name']; ?></td>
                            <td><?php echo $v['class']; ?></td>
                            <td>
                                <a href="class_edit.php?id=<?php echo $v['id']; ?>" class="js-Btn-Edit mdui-btn mdui-btn-icon">
                                    <i class="mdui-icon material-icons">edit</i>
                                </a>
                                <a href="post.php?type=class_delete&<?php echo 'id=' . $v['id']; ?>" class="js-Btn-Delete mdui-btn mdui-btn-icon">
                                    <i class="mdui-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- 分页按钮组件 -->

    </div>

</div>
<?php
require_once './footer.php';
?>