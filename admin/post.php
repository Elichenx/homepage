<?php
require_once './common.php';

use JsonDb\JsonDb\Db;
//退出登录
if ($_GET['type'] == 'quit') {
    session_start();

    // 删除 $_SESSION['user']
    unset($_SESSION['user']);
    
    // 现在 $_SESSION['user'] 已经被删除，尝试访问它将返回 null
    if (!isset($_SESSION['user'])) {
        setcookie('status', '注销成功', time() + 3); // 
            header("Location: /admin/login.php");
    } else {
        setcookie('status', '注销失败', time() + 3); // 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    exit;
}
if ($_GET['type'] == 'class_delete') {
    if (isset($_GET['id'])) {
        $rst = DB::name('class')->where('id', $_GET['id'])->deleteAll();
        if ($rst) {
            setcookie('status', '删除成功！', time() + 3); // 
        } else {
            setcookie('status', '删除失败！', time() + 3); // 
        }
        header("Location: /admin/class.php");
        exit();
    }
}
if ($_GET['type'] == 'class_edit') {
    if (isset($_GET['id'])) {
        $data = [
            'class' => $_POST['class'],
            'name' => $_POST['name'],
            'img' => $_POST['img'],
        ];
        if (empty($_POST['name'])) {
            setcookie('status', '分类名称不能为空', time() + 3); // 
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        if (empty($_POST['img'])) {
            setcookie('status', '分类图标不能为空', time() + 3); // 
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $rst=Db::name('class')->where('id', $_GET['id'])->update($data);
        if ($rst) {
            setcookie('status', '更新成功！', time() + 3); // 
        } else {
            setcookie('status', '更新失败！', time() + 3); // 
        }
        header("Location: /admin/class.php");
        exit();
    }
}
//添加导航数据
if ($_GET['type'] == 'dh_add') {
    if ($_POST) {
        $data = [
            'classid' => $_POST['classid'],
            'name' => $_POST['name'],
            'img' => $_POST['img'],
            'url'=>$_POST['url'],
            'des'=>$_POST['des'],
            'sort_order'=>isset($_POST['sort_order']) ? intval($_POST['sort_order']) : 0,
        ];
        if (empty($_POST['classid'])) {
            setcookie('status', '分类id不能为空', time() + 3); // 
            header("Location: /admin/dh.php");
            exit;
        }
        if (empty($_POST['name'])) {
            setcookie('status', '分类名称不能为空', time() + 3); // 
            header("Location: /admin/dh.php");
            exit;
        }
        $rst = Db::name('dh')->insert($data);
        if ($rst) {
            setcookie('status', '添加成功！', time() + 3); // 
        } else {
            setcookie('status', '添加失败！', time() + 3); // 
        }
        header("Location: /admin/dh.php");
    }
}
//导航内容删除
if ($_GET['type'] == 'dh_delete') {
    if (isset($_GET['id'])) {
        $rst = DB::name('dh')->where('id', $_GET['id'])->deleteAll();
        if ($rst) {
            setcookie('status', '删除成功！', time() + 3); // 
        } else {
            setcookie('status', '删除失败！', time() + 3); // 
        }
        header("Location: /admin/dh.php");
        exit();
    }
}
//导航内容修改
if ($_GET['type'] == 'dh_edit') {
    if (isset($_GET['id'])) {
        $data = [
            'classid' => $_POST['classid'],
            'name' => $_POST['name'],
            'img' => $_POST['img'],
            'url'=>$_POST['url'],
            'des'=>$_POST['des'],
            'sort_order'=>isset($_POST['sort_order']) ? intval($_POST['sort_order']) : 0,
        ];
        if (empty($_POST['classid'])) {
            setcookie('status', '分类id不能为空', time() + 3); // 
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        if (empty($_POST['name'])) {
            setcookie('status', '导航名称不能为空', time() + 3); // 
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $rst=Db::name('dh')->where('id', $_GET['id'])->update($data);
        if ($rst) {
            setcookie('status', '更新成功！', time() + 3); // 
        } else {
            setcookie('status', '更新失败！', time() + 3); // 
        }
        header("Location: /admin/dh.php");
        exit();
    }
}
//图标删除
if ($_GET['type'] == 'svg_delete') {
    if (isset($_GET['id'])) {
        $rst = DB::name('svg')->where('id', $_GET['id'])->deleteAll();
        if ($rst) {
            setcookie('status', '删除成功！', time() + 3); // 
        } else {
            setcookie('status', '删除失败！', time() + 3); // 
        }
        header("Location: /admin/svg.php");
        exit();
    }
}
//图标修改
if ($_GET['type'] == 'svg_edit') {
    if (isset($_GET['id'])) {
        $data = [
            'url' => $_POST['url'],
            'name' => $_POST['name'],
            'svg' => $_POST['svg'],
            'onclick'=>$_POST['onclick'],
            
    
        ];
        if (empty($_POST['name'])) {
            setcookie('status', '图标名称不能为空', time() + 3); // 
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        if (empty($_POST['svg'])) {
            setcookie('status', '图标不能为空', time() + 3); // 
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $rst=Db::name('svg')->where('id', $_GET['id'])->update($data);
        if ($rst) {
            setcookie('status', '更新成功！', time() + 3); // 
        } else {
            setcookie('status', '更新失败！', time() + 3); // 
        }
        header("Location: /admin/svg.php");
        exit();
    }
}
