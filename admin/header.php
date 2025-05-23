<!DOCTYPE html>
<html lang="zh">

<head>
    <title>zyyo后台管理系统</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/admin/assets/img/favicon.ico">
    <link rel="stylesheet" href="/admin/assets/lib/mdui-v1.0.2/css/mdui.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/base.css" />
    <script>
        var _paq = window._paq = window._paq || [];
        _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u = "//matomo.fatda.cn/";
            _paq.push(['setTrackerUrl', u + 'matomo.php']);
            _paq.push(['setSiteId', '9']);
            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];
            g.async = true;
            g.src = u + 'matomo.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <script src="/admin/assets/lib/vue-3.3.4/vue.global.min.js"></script>
</head>

<body
    class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-layout-light mdui-theme-accent-pink">

    <!-- 顶栏 -->
    <header class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                mdui-drawer="{target: '#main-drawer', swipe: true}">
                <i class="mdui-icon material-icons">menu</i>
            </span>
            <a href="#" class="mdui-typo-headline">zyyo后台管理系统</a>
            <div class="mdui-toolbar-spacer"></div>

            <div class="mdui-typo">
                <kbd>管理员</kbd>
            </div>

        </div>
    </header>

    <!-- 侧栏 -->
    <div class="mdui-drawer" id="main-drawer">
        <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
            <div class="mdui-collapse-item ">
                <a href="./">
                    <div class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">dashboard</i>
                        <div class="mdui-list-item-content">总览</div>
                    </div>
                </a>
            </div>
            <div class="mdui-collapse-item ">
                <a href="/admin/seat.php">
                    <div class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">extension</i>
                        <div class="mdui-list-item-content">系统设置</div>
                    </div>
                </a>
            </div>
            <div class="mdui-collapse-item">
                <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">settings</i>
                    <div class="mdui-list-item-content">内容管理</div>
                    <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <a href="content.php" class="mdui-list-item mdui-ripple">内容设置</a>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <a href="class.php" class="mdui-list-item mdui-ripple">导航分类管理</a>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <a href="dh.php" class="mdui-list-item mdui-ripple">导航内容管理</a>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <a href="svg.php" class="mdui-list-item mdui-ripple">图标管理</a>
                </div>

            </div>
            <div class="mdui-collapse-item ">
                <a href="/admin/account.php">
                    <div class="mdui-list-item mdui-ripple">
                    
                        <i class="mdui-list-item-icon mdui-icon material-icons">person</i>
                        <div class="mdui-list-item-content">账号设置</div>
                    </div>
                </a>
            </div>
            <div class="mdui-divider"></div>

            <div class="mdui-collapse-item">
                <a href="/">
                    <div class="mdui-list-item mdui-ripple mdui-color-theme-accent">
                        <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                        <div class="mdui-list-item-content">返回站点</div>
                    </div>
                </a>
            </div>

            <div class="mdui-collapse-item">
                <a href="post.php?type=quit">
                    <div id="" class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">arrow_back</i>
                        <div class="mdui-list-item-content">退出登入</div>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <div id="Component-UpdateNotice" class="mdui-container mdui-p-t-1" style="display: none;">
        <div class="mdui-card mdui-color-theme mdui-shadow-1" style="display: flex;">
            <div class="mdui-p-a-2" style="width: 100%;">
                <span class="mdui-typo">
                    <i class="mdui-icon material-icons">new_releases</i>
                    发现新版本 <kbd class="tag_name">v2.1.1</kbd> 前往更新
                </span>
            </div>
            <div class="mdui-p-y-1 mdui-p-r-2" style="align-self: center;">
                <button onclick="window.open('https://gitee.com/lovesummer/zyyo-backend-version', '_blank');"
                    class="mdui-btn mdui-btn-icon mdui-color-theme-accent mdui-btn-dense mdui-ripple">
                    <i class="mdui-icon material-icons">navigate_next</i>
                </button>
            </div>
        </div>
    </div>