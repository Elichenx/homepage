<?php 
ob_start(); // 开始输出缓冲
require_once './common.php';
use JsonDb\JsonDb\Db;

$svg=count(Db::name('svg')->select());
$class=count(Db::name('class')->select());
$dh=count(Db::name('dh')->select());
$response = file_get_contents("http://j.0330.top/gg/zyyo");
$data = json_decode($response, true);
ob_end_clean(); // 清除缓冲区内容
require_once './header.php';

?>
<!-- 页体 -->
<div class="mdui-container">
    <!-- 标题组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-6">
            <h1 class="mdui-text-color-theme mdui-p-t-2">总览</h1>
        </div>
    </div>
    <!-- 主体组件 -->
    <div class="mdui-row">
        <div class="mdui-col-xs-12 mdui-col-sm-9 mdui-p-t-2">
            <div class="mdui-card">
                <div class="mdui-p-a-2">
                    <div class="mdui-typo-subheading-opacity">趋势</div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <div class="mdui-col-xs-12 mdui-col-sm-3 mdui-p-t-2">
            <div class="mdui-card">
                <div class="mdui-p-a-2">
                    <div class="mdui-typo-subheading-opacity">总计</div>
                </div>
                <ul class="mdui-list">
                    <li class="mdui-list-item mdui-ripple">
                        <i
                            class="mdui-list-item-avatar mdui-icon material-icons mdui-color-blue mdui-text-color-white">note</i>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title"><?php echo $dh;?></div>
                            <div class="mdui-list-item-text">项目总数</div>
                        </div>
                    </li>
                    <li class="mdui-list-item mdui-ripple">
                        <i
                            class="mdui-list-item-avatar mdui-icon material-icons mdui-color-yellow-600 mdui-text-color-white">insert_comment</i>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title"><?php echo $class;?></div>
                            <div class="mdui-list-item-text">总模板数</div>
                        </div>
                    </li>
                    <li class="mdui-list-item mdui-ripple">
                        <i
                            class="mdui-list-item-avatar mdui-icon material-icons mdui-color-red-600 mdui-text-color-white">favorite</i>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title"><?php echo $svg;?></div>
                            <div class="mdui-list-item-text">图标总数</div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

        <div class="mdui-col-xs-12 mdui-col-sm-4 mdui-p-t-2">
            <div class="mdui-card">
                <div class="mdui-p-a-2">
                    <div class="mdui-row">
                        <div class="mdui-col-xs-2 mdui-col-sm-3 mdui-text-center">
                            <i class="css-icon iconfont icon-heart-pulse mdui-text-color-light-blue-500"></i>
                        </div>
                        <div class="mdui-col-xs-10 mdui-col-sm-9 mdui-p-t-1 mdui-text-color-grey-800">
                            <div class="mdui-typo-title-opacity">zyyo后台版</div>
                            <div class="mdui-typo-subheading-opacity">1.1.0</div>
                        </div>
                    </div>
                </div>
                <div class="mdui-divider"></div>
                <ul class="mdui-list">
                    <a href="http://www.0330.top/archives/zyyo.html" target="_blank">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                            <div class="mdui-list-item-content">项目主页</div>
                        </li>
                    </a>
                    
                </ul>
            </div>
        </div>

        <div class="mdui-col-xs-12 mdui-col-sm-8 mdui-p-t-2">
            <!-- 右侧 -->
            <div class="mdui-card">
                <ul class="js-notice-ul mdui-list">

                                

            <?php foreach ($data as $v): ?>
            <li class="css-list-item mdui-ripple" onclick="window.open('<?php echo $v['url']; ?>');">
                <div class="mdui-list-item-avatar">
                    <img src="/admin/assets/img/lcl.png" />
                </div>
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title"><?php echo $v['title']; ?></div>
                    <div class="mdui-list-item-text">
                    <?php echo $v['content']; ?>
                    </div>
                    <div class="mdui-list-item-text">
                    <?php echo $v['time']; ?>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>

                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>


</div>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/footer.php';
?>
<script src="/admin/assets/js/app/index.js"></script>
<script src="/admin/assets/lib/chart-4.2.0/chart.umd.min.js"></script>
<script>

    // 实例化
    let IndexEntity = new Index();

    $(function () {

        //图表数据传递
        let chartJsonData = JSON.parse('[{"label":"\u5361\u7247","data":{"count":[0,0,0,1,0,0],"date":["2024-09-05","2024-09-06","2024-09-07","2024-09-08","2024-09-09","\u6628\u65e5"]}},{"label":"\u8bc4\u8bba","data":{"count":[0,0,0,0,0,0],"date":["2024-09-05","2024-09-06","2024-09-07","2024-09-08","2024-09-09","\u6628\u65e5"]}},{"label":"\u70b9\u8d5e","data":{"count":[0,0,0,0,0,0],"date":["2024-09-05","2024-09-06","2024-09-07","2024-09-08","2024-09-09","\u6628\u65e5"]}}]');
        //绑定方法
        IndexEntity.BindJsonLineChart('myChart', chartJsonData);

        //待更新 获取LCS-Notice
       

    })
</script>

</body>

</html>