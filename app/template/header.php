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