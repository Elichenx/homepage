<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;
$config=Db::name('config')->where('id', 1)->find();
if ($_POST) {
    $data=[
       'title1'=>$_POST['title1'],
       'title2'=>$_POST['title2'],
       'logo'=>$_POST['logo'],
       'time'=>$_POST['time'],
       'skill'=>$_POST['kill'],
       'tag'=>$_POST['tag'],
       'des'=>$_POST['des'],
       'infor'=>$_POST['infor'],
       'music'=>$_POST['music'],
    ];
    $rst=Db::name('config')->where('id', '1')->update($data);
    if ($rst) {
        setcookie('status', '更新成功！', time() + 3); // 
    } else {
        setcookie('status', '更新失败！', time() + 3); // 
    }
    header("Location: /admin/content.php");

}
ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>

<div class="mdui-container">

    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">内容设置</h1>
        </div>
    </div>

    <div class="mdui-card">        
        <div class="mdui-row">
            <div class="mdui-panel" mdui-panel>

                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">图标说明</div>
                    <div class="mdui-panel-item-body">
                        <p>推荐使用svg图标</p>
                        <p>前往 <a href="https://www.iconfont.cn/">iconfont</a> 网站寻找,然后复制svg</p> 
                        <p>复制过来不能直接使用</p>
                        <pre class="language-markup"><code>需要删除svg标签内所有的width="" height="" fill=""属性</code></pre>
                    </div>
                </div>
                
                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">图片外链说明</div>
                    <div class="mdui-panel-item-body">
                        <p>推荐使用外链平台 <a href="http://pan.0330.top">http://pan.0330.top</a></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<br>
    <!-- 主体组件 -->
    <div class="mdui-card">
        <div class="mdui-p-b-2 mdui-p-x-2">
            <div class="mdui-row">
              
                <form method="post" name="edit-form" class="edit-form">
                   
                    <div class="mdui-col-xs-12">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">标题前半段</label>
                            <input class="mdui-textfield-input" name="title1" type="dh1" value="<?php echo $config['title1']; ?>" />
                        </div>
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">标题后半段</label>
                            <input class="mdui-textfield-input" name="title2" type="dh1" value="<?php echo $config['title2']; ?>" />
                        </div>
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">头像|logo</label>
                            <input class="mdui-textfield-input" name="logo" type="dh1" value="<?php echo $config['logo']; ?>" />
                        </div>
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label mdui-m-t-2">是否显示skill</label>
                            <select class="mdui-select" name="skill" style="width: 100%;">
                                <option value="1" <?php if($config['skill'] == 1) echo 'selected'; ?>>显示</option>
                                <option value="2" <?php if($config['skill'] == 2) echo 'selected'; ?>>不显示</option>
                            </select>
                        </div>
                        <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="tag" placeholder="标签设置|一行一个"><?php echo $config['tag']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">标签设置|一行一个</div>
                        </div>
                        <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="time" placeholder="时间轴"><?php echo $config['time']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">时间轴 格式 时间|内容 一行一个</div>
                        </div>
                        <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="des" placeholder="描述"><?php echo $config['des']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">描述</div>
                        </div>
                        <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="infor" placeholder="描述"><?php echo $config['infor']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">侧边栏信息 格式 图标|文字 一行一个</div>
                        </div>
                        <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="music" placeholder="音乐播放器代码"><?php echo $config['music']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">音乐播放器代码 代码推荐平台 <a href="https://musicplayer.xfyun.club/">https://musicplayer.xfyun.club/</a></div>
                        </div>
                        <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="music" placeholder=""><?php echo $config['head']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">自定义底部 </div>
                        </div>
                        <div class="mdui-textfield">
                            <textarea class="mdui-textfield-input" rows="4" name="music" placeholder="音乐播放器代码"><?php echo $config['music']; ?></textarea>
                            <div class="mdui-textfield-helper mdui-typo">音乐播放器代码 代码推荐平台 <a href="https://musicplayer.xfyun.club/">https://musicplayer.xfyun.club/</a></div>
                        </div>
                    </div>
                    <div class="mdui-row">
                        <div class="mdui-col-xs-12">
                            <!--提交按钮-->
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