<?php

use PHPMVC\LIB\CLASSES\Token;
use PHPMVC\MODELS\Input;
use PHPMVC\LIB\FUNCTIONS\Sanitize;
use PHPMVC\LIB\CLASSES\Session;
if(Session::exists('errors')){
    $x = Session::flash('errors');
    if(is_array($x)){
        var_dump($x);


?>
<p style="background-color: tomato;" class="message t"><a href="" class="closeBtn"><i class="fa fa-times"></i></a><? echo Session::flash('employee_added_success'); ?></p>

<?}
    }
?>

<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded" action="create">
    <fieldset>
        <legend>بيانات المستخدم</legend>
        <div class="input_wrapper n60 border">
        <label <?if(!empty(Input::get('name'))){?> class="floated" <?}?>>الاسم </label>
        <input required type="text" name="name" maxlength="50" value="<?php if(!empty(Input::get('name'))) echo Sanitize::escape(Input::get('name'));?>">
        </div>
        <div class="input_wrapper n40 padding border">
         <label <?if(!empty(Input::get('name'))){?> class="floated" <?}?>>اسم المستخدم</label>
            <input required type="text" name="user_name" maxlength="20" value="<?php if(!empty(Input::get('user_name')))echo Sanitize::escape(Input::get('user_name'));?>">
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
            <select required name="GroupId">
                <option value=""></option>
                    <option value="" selected>آدمن</option>
                    <option value="">المسؤول المالي</option>
            </select>
        </div>
        <input class="hidden"  name="token" value="<?php echo Token::generate();?>">
        <input class="no_float" type="submit" name="submit" value="حفظ">
    </fieldset>
</form>
