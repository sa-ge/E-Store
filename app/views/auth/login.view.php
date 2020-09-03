
<!doctype html>
<html class="no-js" lang="eng">

<head>
    <meta charset="utf-8">
<?
header('Content-Type: text/html; charset=UTF8');
?>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>مرحباً بكم في لوحة التحكم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/fawsome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/googleicons.css">
    <link rel="stylesheet" type="text/css" href="/css/mainar.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script type="text/javascript" src="/js/vendor/modernizr-2.8.3.min.js"></script>
<body>
<div class="action_view login">
    <?php //$messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message): ?>
        <!-- <p class="message t<?//= $message[1] ?>"><?//= $message[0] ?><a href="" class="closeBtn"><i class="fa fa-times"></i></a></p>!-->
    <?php //endforeach;endif; ?>
    <div class="login_box animate">
        <form autocomplete="off" method="post" enctype="application/x-www-form-urlencoded">
            <div class="border"></div>
            <h1><?//= $login_header ?></h1>
            <img src="/img/login-icon.png" width="120">
            <div class="input_wrapper username">
                <input required type="text" name="ucname" id="ucname" maxlength="50" placeholder="<?//= $login_ucname ?> User Name">
            </div>
            <div class="input_wrapper password">
                <input required type="password" id="ucpwd" name="ucpwd" maxlength="100" placeholder="<?//= $login_ucpwd ?> Password">
            </div>
            <input type="submit" name="login" value="<?//= $login_button ?>">
        </form>
    </div>
</div>


			<script type="text/javascript" src="/js/vendor/jquery-1.12.0.min.js"></script>
			<script type="text/javascript" src="/js/helper.js"></script>
			<script type="text/javascript" src="/js/datatablesar.js"></script>
			<script type="text/javascript" src="/js/datatablesen.js"></script>
			<script type="text/javascript" src="/js/main.js"></script>

</body>
</html>
