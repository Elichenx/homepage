<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;
$config=Db::name('config')->where('id', 1)->find();
if ($_POST) {
    $data=[
       'title' =>$_POST['title'],
       'name' =>$_POST['name'],
       'keywords' =>$_POST['keywords'],
       'description' =>$_POST['description'],
       'ico' =>$_POST['ico'],
       'logo' =>$_POST['logo'],
       'beian' =>$_POST['beian'],
       'cdn' =>$_POST['cdn'],
       'copyright' =>$_POST['copyright'],
    ];
    $rst=Db::name('config')->where('id', '1')->update($data);
    if ($rst) {
        setcookie('status', '更新成功！', time() + 3); // 
    } else {
        setcookie('status', '更新失败！', time() + 3); // 
    }
    header("Location: /admin/seat.php");

}
ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<!-- 页体 -->
<div class="mdui-container">

    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">基础信息设置</h1>
        </div>
    </div>

    <!-- 主体组件 -->

    <div class="mdui-card">

        
        <div class="mdui-p-a-2">
            <form  method="post" name="edit-form"  class="edit-form">
               
            <div id="example1-SystemSite">
                <div class="mdui-row">
                    
                   
                    <div class="mdui-col-xs-12 mdui-col-md-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">网站标题</label>
                            <input class="mdui-textfield-input" type="text" name="title" value="<?php echo $config['title'];?>"
                                placeholder="网站标题" maxlength="">
                        </div>
                    </div>
                    <div class="mdui-col-xs-12 mdui-col-md-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">网站名称</label>
                            <input class="mdui-textfield-input" type="text" name="name" value="<?php echo $config['name'];?>"
                                placeholder="网站标题" maxlength="">
                        </div>
                    </div>
                    <div class="mdui-col-xs-12 mdui-col-md-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">站点关键词(Keywords)</label>
                            <input class="mdui-textfield-input" type="text" name="keywords" value="<?php echo $config['keywords'];?>"
                                placeholder="梦云建站" maxlength="">
                        </div>
                    </div>
                    <div class="mdui-col-xs-12 mdui-col-md-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">站点介绍(description)</label>
                            <input class="mdui-textfield-input" type="text" name="description" value="<?php echo $config['description'];?>"
                                placeholder="全自动建站系统" maxlength="">
                        </div>
                    </div>
                    <div class="mdui-col-xs-12 mdui-col-md-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">站点备案信息</label>
                            <input class="mdui-textfield-input" type="text" name="beian" value="<?php echo $config['beian'];?>"
                                placeholder="ICPxxxxxxx" maxlength="">
                        </div>
                    </div>
                    
                    <div class="mdui-col-xs-12 mdui-col-md-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">ico图片</label>
                            <input class="mdui-textfield-input" type="text" name="ico" value="<?php echo $config['ico'];?>"
                                placeholder="ico.png" maxlength="">
                        </div>
                    </div>
                    <div class="mdui-col-xs-12">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">头像</label>
                            <input class="mdui-textfield-input" type="text" name="logo" value="<?php echo $config['logo'];?>"
                                placeholder="https://q1.qlogo.cn/g?b=qq&nk=2324170144&s=640" maxlength="">
                        </div>
                    </div>
                    <div class="mdui-col-xs-12">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">站点版权信息</label>
                            <input class="mdui-textfield-input" type="text" name="copyright" value="<?php echo $config['copyright'];?>"
                                placeholder="www.0330.top梦云博客版权所有" maxlength="">
                        </div>
                    </div>
                    <div class="mdui-col-xs-12">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">静态资源cdn（不懂请勿乱填）</label>
                            <input class="mdui-textfield-input" type="text" name="cdn" value="<?php echo $config['cdn'];?>"
                                placeholder="静态资源cdn（不懂请勿乱填）" maxlength="">
                        </div>
                    </div>

                </div>

                <div class="mdui-row">
                    <div class="mdui-col-xs-12">
                        <!--提交按钮-->
                        <button id="submitSite"
                            class="mdui-m-t-4 mdui-float-right mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple">提交</button>
                    </div>
                </div>
            </div>
        </form>
           
        </div>
        <div class="mdui-dialog" id="example-1">
            <div class="mdui-dialog-title">绑定自定义域名</div>
            <div class="mdui-dialog-content">{!!admin_setting("jxgg")!!}</div>
            <div class="mdui-dialog-actions">
              {{-- <button class="mdui-btn mdui-ripple" mdui-dialog-close>cancel</button> --}}
              <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>我已知晓</button>
            </div>
          </div>

    </div>

</div>

<?php 
require_once './footer.php';
?>



</body>

</html>