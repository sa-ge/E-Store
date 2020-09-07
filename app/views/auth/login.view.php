



<div class="action_view login">
    <?php //$messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message): ?>
        <!-- <p class="message t<?//= $message[1] ?>"><?//= $message[0] ?><a href="" class="closeBtn"><i class="fa fa-times"></i></a></p>!-->
    <?php //endforeach;endif; ?>
    <div class="login_box animate">
        <form autocomplete="off" method="post" enctype="application/x-www-form-urlencoded" action="/">
            <div class="border"></div>
            <h1><?//= $login_header ?></h1>
            <img src="/img/login-icon.png" width="120">
            <div class="input_wrapper username">
                <input required type="text" name="ucname" id="user_name" maxlength="50" value="u" placeholder="<?//= $login_ucname ?> اسم المستخدم">
            </div>
            <div class="input_wrapper password">
                <input required type="password" id="ucpwd" name="password" maxlength="100" value="p" placeholder="<?//= $login_ucpwd ?> كلمة المرور">
            </div>

            <label style="margin-top:10px" class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="1">
                <span>تذكرني</span>
                <div class="checkbox_button"></div>
            </label>

            <input type="submit" name="login" style="margin-top:10px" value="<?//= $login_button ?> تسجيل الدخول">
        </form>
    </div>
</div>

