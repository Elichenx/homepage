<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;
$content=Db::name('dh')->order('sort_order', 'asc')->select();
$class=Db::name('class')->select();
ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<div class="mdui-container">

    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">导航内容管理</h1>
        </div>
        <div class="mdui-col-xs-6">
            <button class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple"
                mdui-dialog="{target: '#dialogAdd'}">添加内容</button>
            <!-- 弹窗组件 -->
            <div class="mdui-dialog" id="dialogAdd">
                <div class="mdui-dialog-title">添加内容</div>
                <div class="mdui-dialog-content">
                    <!-- 表单内容 -->
                    <form method="post" name="add-form" class="edit-form"  action="post.php?type=dh_add">
                      
                        <div class="mdui-row mdui-p-x-4">
                            <label class="mdui-textfield-label mdui-m-t-2">选择分类</label>
                            <select class="mdui-select" name="classid" style="width: 100%;">
                                <?php foreach ($class as $v): ?>
                                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mdui-row mdui-p-x-4">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">导航标题</label>
                                <input class="mdui-textfield-input" type="text" name="name" required />
                            </div>
                        </div>
                        <div class="mdui-row mdui-p-x-4">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">导航URL</label>
                                <input class="mdui-textfield-input" type="text" name="url" required />
                            </div>
                        </div>
                        <div class="mdui-row mdui-p-x-4">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">导航图标</label>
                                <input class="mdui-textfield-input" type="text" name="img" />
                            </div>
                        </div>
                        <div class="mdui-row mdui-p-x-4">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">描述</label>
                                <input class="mdui-textfield-input" type="text" name="des" />
                            </div>
                        </div>
                        <div class="mdui-row mdui-p-x-4">
                            <div class="mdui-textfield">
                                <label class="mdui-textfield-label">显示顺序</label>
                                <input class="mdui-textfield-input" type="number" name="sort_order" value="0" />
                                <div class="mdui-textfield-helper">数字越小排序越靠前，默认为0</div>
                            </div>
                        </div>
                        <!-- 更多输入字段可以在这里添加 -->
                        <div class="mdui-dialog-actions">
                            <button type="submit" class="mdui-btn mdui-btn-raised mdui-ripple">提交</button>
                            <button type="button" class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 主体组件 -->
    <div class="mdui-card mdui-p-a-2">
        <div class="mdui-table-fluid mdui-shadow-0 mdui-m-b-1">
            <table class="mdui-table mdui-typo">
                <thead>
                    <tr>
                        <th>导航名称</th>
                        <th>导航分类id</th>
                        <th>导航图标</th>
                        <th>导航url</th>
                        <th>显示顺序</th>
                        <th class="mdui-table-col-numeric">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($content as $v): ?>
                    <tr>
                        <td><?php echo $v['name']; ?></td>
                        <td><?php echo $v['classid']; ?></td>
                        <td>
                            <div class="mdui-chip">
                                <span class="mdui-chip-title">
                                    <img src="http://pan.0330.top/view.php/3c3f725ac24677b23c54b7c08af91cd6.jpg" width="30"/>
                                </span>
                            </div>
                        </td>
                        <td><?php echo $v['url']; ?></td>
                        <td><?php echo isset($v['sort_order']) ? $v['sort_order'] : '0'; ?></td>
                        <td>
                            <a href="dh_edit.php?id=<?php echo $v['id']; ?>" class="js-Btn-Edit mdui-btn mdui-btn-icon">
                                <i class="mdui-icon material-icons">edit</i>
                            </a>
                            <a href="post.php?type=dh_delete&<?php echo 'id=' . $v['id']; ?>" class="js-Btn-Delete mdui-btn mdui-btn-icon">
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

    <!-- 弹窗组件 -->
    
</div>
<?php 
require_once './footer.php';
?>