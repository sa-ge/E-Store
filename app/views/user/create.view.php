


<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded" action="check">
    <fieldset>
        <legend>بيانات المستخدم</legend>
        <div class="input_wrapper n60 border">
        <label <?if(isset($_POST['submit'])){?> class="floated" <?}?>>الاسم </label>
            <input required type="text" name="name" maxlength="50" <?if(isset($_POST['submit'])) {?>value="<?=$_POST['name'];};?>">
        </div>
        <div class="input_wrapper n40 padding border">
         <label <?if(isset($_POST['submit'])){?> class="floated" <?}?>>اسم المستخدم</label>
            <input required type="text" name="user_name" maxlength="20" <? if(isset($_POST['submit'])) {?> value="<?=$_POST['user_name'];};?>">
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
                <?php// if (false !== $groups): foreach ($groups as $group): ?>
                    <option value="" selected>آدمن</option>
                    <option value="">المسؤول المالي</option>
                <?php //endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="حفظ">
    </fieldset>
</form>
