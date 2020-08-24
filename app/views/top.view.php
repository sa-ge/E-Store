<!doctype html>
<html class="no-js" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Template</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/fawsome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/googleicons.css">
    <link rel="stylesheet" type="text/css" href="../css/mainar.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <header class="main">
            <a href="javascript:;" data-menu-status="<?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'true' : 'false' ?>" class="menu_switch <?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'opened no_animation' : '' ?>"><i class="fa fa-bars"></i></a>
            <h1>لوحدة التحكم</h1>
            <div class="user_menu_container">
                <a href="javascript:;" class="language_switch user">
                    <span>مرحبا محمد</span>
                    <i class="material-icons">keyboard_arrow_down</i>
                </a>
                <ul class="user_menu">
                    <li><a href="/"><i class="fa fa-user"></i>الحساب</a></li>
                    <li><a href="/"><i class="fa fa-key"></i>تغيير كلمة المرور</a></li>
                    <li><a href="/"><i class="fa fa-gear"></i>اعدادات الحساب</a></li>
                    <li><a href="/"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                </ul>
            </div>
            <a href="/messages" class="language_switch"><i class="fa fa-envelope"></i></a>
            <a href="javascript:;" class="language_switch notifications"><i class="fa fa-bell"></i></a>
            <a href="/language" class="language_switch"><span>عربي</span> <i class="fa fa-globe"></i></a>
        </header>

        <nav class="main_navigation <?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'opened no_animation' : '' ?>">
            <div class="employee_info">
                <div class="profile_picture">
                    <img src="img/user.png" alt="User Profile Picture">
                </div>
                <span class="name">محمد يحيى</span>
                <span class="privilege">مدير التطبيق</span>
            </div>
            <ul class="app_navigation">
                <li><a href="/"><i class="fa fa-dashboard"></i> الاحصائيات العامة</a></li>
                <li><a href="/employee"><i class="fa fa-users"></i> الموظفين</a></li>
                <li><a href="/auth/logout"><i class="fa fa-sign-out"></i> تسجيل الخروج</a></li>
            </ul>
        </nav>
        <div class="action_view <?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'collapsed no_animation' : '' ?>">
            <?php if (isset($_SESSION['message'])) { ?>
                <p class="message <?= isset($error) ? 'error' : '' ?>"><?= $_SESSION['message'] ?></p>
            <?php unset($_SESSION['message']);
            } ?>