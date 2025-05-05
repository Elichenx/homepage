<?php
ob_start(); // 开始输出缓冲
require_once './common.php';

use JsonDb\JsonDb\Db;

$class = Db::name('svg')->select();
if ($_POST) {
    $data = [
        'url' => $_POST['url'],
        'name' => $_POST['name'],
        'svg' => $_POST['svg'],
        'onclick'=>$_POST['onclick'],
        

    ];
    if (empty($_POST['name'])) {
        setcookie('status', '图标名称不能为空', time() + 3); // 
        header("Location: /admin/svg.php");
        exit;
    }
    if (empty($_POST['svg'])) {
        setcookie('status', '图标不能为空', time() + 3); // 
        header("Location: /admin/svg.php");
        exit;
    }
    $rst = Db::name('svg')->insert($data);
    if ($rst) {
        setcookie('status', '添加成功！', time() + 3); // 
    } else {
        setcookie('status', '添加失败！', time() + 3); // 
    }
    header("Location: /admin/svg.php");
}
ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<div class="mdui-container">

    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">图标管理</h1>
        </div>
        <div class="mdui-col-xs-6">
            <button class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple"
                mdui-dialog="{target: '#dialogAdd'}">添加图标</button>
            <!-- 弹窗组件 -->
           
                <form method="post" name="add-form" class="edit-form">
                <div class="mdui-dialog" id="dialogAdd">
                    <div class="mdui-dialog-title">添加图标</div>
                    <div class="mdui-row mdui-p-x-4">
                        <div class="mdui-row">
                            <div class="mdui-col-xs-9 mdui-col-md-10">
                                <div class="mdui-textfield">
                                    <label class="mdui-textfield-label">图标名称</label>
                                    <input class="mdui-textfield-input" name="name" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">跳转链接</label>
                            <input class="mdui-textfield-input" name="url" type="text" />
                        </div>
                        <div class="mdui-row">
                            <div class="mdui-col-xs-9 mdui-col-md-10">
                                <div class="mdui-textfield">
                                    <label class="mdui-textfield-label">点击事件(可留空)</label>
                                    <input class="mdui-textfield-input" name="onclick" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="mdui-row">
                            <div class="mdui-col-xs-9 mdui-col-md-10">
                                <div class="mdui-textfield">
                                    <label class="mdui-textfield-label">图标</label>
                                    <input class="mdui-textfield-input" name="svg" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdui-dialog-actions">
                        <button class="mdui-btn mdui-ripple" type="submit" mdui-dialog-close>确定</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 主体组件 -->
    <div class="mdui-card mdui-p-a-2">
        <div class="mdui-table-fluid mdui-shadow-0 mdui-m-b-1">
            <table class="mdui-table mdui-typo">
                <thead>
                    <tr>
                        <th>图标名称</th>
                        <th>跳转链接</th>
                        <th>点击事件</th>
                        <th class="mdui-table-col-numeric">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($class as $v): ?>
                    <tr>
                        <td><?php echo $v['name']; ?></td>
                        <td><?php echo $v['url']; ?></td>
                        <td><?php echo $v['onclick']; ?></td>
                        <td>
                            <a href="svg_edit.php?id=<?php echo $v['id']; ?>" class="js-Btn-Edit mdui-btn mdui-btn-icon">
                                <i class="mdui-icon material-icons">edit</i>
                            </a>
                            <a href="post.php?type=svg_delete&<?php echo 'id=' . $v['id']; ?>" class="js-Btn-Delete mdui-btn mdui-btn-icon">
                                <i class="mdui-icon material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>
<?php
require_once './footer.php';
?>