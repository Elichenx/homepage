<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
use JsonDb\JsonDb\Db;

$data = Db::name('config')->where('id', 1)->find();
$oss = $data['cdn'];
$svg = Db::name('svg')->select();
$class = Db::name('class')->select();
$xysdhcontent = Db::name('dh')->order('sort_order', 'asc')->select();
?>
<!DOCTYPE html>
<html class="www.0330.top">

<head class="www.0330.top">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if ($data['title'] == null): ?>
        <title><?php echo $data['name']; ?></title>
    <?php else: ?>
        <title><?php echo $data['name'] . "-" . $data['title']; ?></title>
    <?php endif; ?>

    <meta name="keywords" content="<?php echo $data['keywords']; ?>">
    <meta name="description" content="<?php echo $data['description']; ?>">
    <link rel="shortcut icon" href="<?php echo $data['ico']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="<?php echo $oss; ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo $oss; ?>/static/css/root.css">
</head>

<body>
    <div id="zyyo-loading">
        <div id="zyyo-loading-center">
        </div>
    </div>
    <div class="zyyo-filter"></div>

    <div class="zyyo-main">
        <div class="zyyo-left">
            <div class="logo" style="background-image: url(<?php echo $data['logo']; ?>);">
                <img style="position: absolute;top:-15%;left:-10%;width: 120%; aspect-ratio: 1/1;"
                    src="<?php echo $oss; ?>/static/img/logokuang.png">
            </div>
            <div class="left-div left-des">
                <?php

                ?>
                <?php if ($data['infor'] != NULL): ?>
                    <?php foreach (explode("\n", $data['infor']) as $line): ?>
                        <div class="left-des-item">
                            <?php
                            $parts = explode('|', $line);
                            echo $parts[0];
                            echo $parts[1];
                            ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="left-div left-tag">
                <?php

                ?>
                <?php if ($data['tag'] != NULL): ?>
                    <?php foreach (explode("\n", $data['tag']) as $line): ?>
                        <div class="left-tag-item"><?php echo explode('|', $line)[0]; ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="left-div left-time">
                <ul id="line">
                    <?php
                    // 假设 $data 已经被正确定义并包含了相应的数据
                    ?>
                    <?php if ($data['tag'] != NULL): ?>
                        <?php foreach (explode("\n", $data['time']) as $line): ?>
                            <li>
                                <div class="focus"></div>
                                <div><?php echo explode('|', $line)[1]; ?></div>
                                <div><?php echo explode('|', $line)[0]; ?></div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
        <div class="zyyo-right">
            <header>
                <div class="index-logo" style="background-image: url(<?php echo $data['logo']; ?>);">
                    <img style="position: absolute;top:-15%;left:-10%;width: 120%; aspect-ratio: 1/1;"
                        src="<?php echo $oss; ?>/static/img/logokuang.png">
                </div>
                <div class="welcome">
                    <?php echo $data['title1']; ?> <span class="gradientText">
                        <?php echo $data['title2']; ?> </span>
                </div>
                <?php echo $data['des']; ?>

                <div class="iconContainer">
                    <?php foreach ($svg as $v): ?>
                        <a class="iconItem" onclick="<?php echo $v['onclick']; ?>" href="<?php echo $v['url']; ?>">
                            <?php echo $v['svg']; ?>
                            <div class="iconTip"><?php echo $v['name']; ?></div>
                        </a>
                    <?php endforeach; ?>
                    <a class="switch" href="javascript:void(0)">
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"
                                checked>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </a>
                </div>

                <div class="tanChiShe">
                    <img id="tanChiShe" src="<?php echo $oss; ?>/static/svg/snake-Light.svg" alt="">
                </div>
            </header>






            <content>
            <?php foreach ($class as $v): ?>
    <div class="title">
        <?php echo $v['img']; ?><?php echo $v['name']; ?>
    </div>
    <div class="projectList">
        <?php
            // 假设这是你要筛选的classid值
            $filteredData = array_filter($xysdhcontent, function($item) use ($v) {
                return $item['classid'] == $v['id'];
            });
            $lx = $v['class'] == 1 ? 'a' : 'b';
        ?>
        <?php foreach ($filteredData as $k): ?>
            <a class="projectItem <?php echo $lx; ?>" target="_blank" href="<?php echo $k['url']; ?>">
                <div class="projectItemLeft">
                    <h1><?php echo $k['name']; ?></h1>
                    <p><?php echo $k['des']; ?></p>
                </div>
                <div class="projectItemRight">
                    <img src="<?php echo $k['img']; ?>" alt="">
                </div>
            </a>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>


<?php if($data['skill'] == 1): ?>
    <div class="title">
        <svg t="1705257823317" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7833">
            <path d="M395.765333 586.570667h-171.733333c-22.421333 0-37.888-22.442667-29.909333-43.381334L364.768 95.274667A32 32 0 0 1 394.666667 74.666667h287.957333c22.72 0 38.208 23.018667 29.632 44.064l-99.36 243.882666h187.050667c27.509333 0 42.186667 32.426667 24.042666 53.098667l-458.602666 522.56c-22.293333 25.408-63.626667 3.392-54.976-29.28l85.354666-322.421333zM416.714667 138.666667L270.453333 522.581333h166.869334a32 32 0 0 1 30.933333 40.181334l-61.130667 230.954666 322.176-367.114666H565.312c-22.72 0-38.208-23.018667-29.632-44.064l99.36-243.882667H416.714667z" p-id="7834"></path>
        </svg>
        skills
    </div>
    <div class="skill">
        <img id="skillPc" src="<?php echo $oss; ?>/static/svg/skillPc.svg" alt="" srcset="">
        <img id="skillWap" src="<?php echo $oss; ?>/static/svg/skillWap.svg" alt="" srcset="">
    </div>
<?php endif; ?>
            </content>
        </div>
    </div>
    <footer>
       
        <?php echo $data['copyright'];?>
    </footer>
    <div class="tc">
        <div onclick="" class="tc-main">
            <img class="tc-img" src="" alt="" srcset="">
        </div>

    </div>
</body>
<script src="<?php echo $oss; ?>/static/js/script.js"> </script>





<?php echo $data['music'];?>

</html>