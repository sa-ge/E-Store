<?php

use PHPMVC\LIB\CLASSES\Token;
use PHPMVC\LIB\CLASSES\Session;
use PHPMVC\LIB\FUNCTIONS\Sanitize;
$row = null;
if(!Session::exists('errors')){
if(Session::exists('user')){
  $row = Session::putObject('user')[0];
}
}else{
        $message = Session::flash('errors');
        foreach ($message as $value) {

?>
<p style="background-color: darkgreen;" class="message t"><a href="" class="closeBtn"><i class="fa fa-times"></i></a><? echo $value; ?></p>
<?
        }
        $row = (object) Session::putObject('post');
}
if(!$row){
    die();
}
?>


  <form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded" action="/user/edited/<? echo Sanitize::escape($row->id); ?>">
    <fieldset>
        <legend>بيانات المستخدم</legend>
        <div class="input_wrapper n60 border">
        <label class="floated">الاسم </label>
        <input required type="text" name="name" maxlength="50" value="<?php echo Sanitize::escape($row->name);?>">
        </div>
        <div class="input_wrapper n40 padding border">
         <label  class="floated" >اسم المستخدم</label>
            <input required type="text" name="user_name" maxlength="20" value="<?php echo Sanitize::escape($row->user_name);?>">
        </div>
        <div class="input_wrapper n40 border padding">
            <label >كلمة المرور</label>
            <input required type="password" name="password" value=""maxlength="40">
        </div>
        <div class="input_wrapper n40 padding border">
            <label >تأكيد كلمة المرور</label>
            <input required type="password" name="password_again" value="" maxlength="40">
        </div>
        <div class="input_wrapper_other padding n20 select">
            <select required name="group">
                <option value=""></option>
                    <option value="1" selected>آدمن</option>
                    <option value="2">المسؤول المالي</option>
            </select>
        </div>
        <input class="hidden"  name="token" value="<?php echo Token::generate();?>">
        <input class="no_float" type="submit" name="submit" value="حفظ">
    </fieldset>
</form>
