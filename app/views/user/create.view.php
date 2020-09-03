<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend>بيانات المستخدم</legend>
        <div class="input_wrapper n40 border">
            <label>الاسم الاول</label>
            <input required type="text" name="FirstName" maxlength="10" value="">
        </div>
        <div class="input_wrapper n20 padding border">
            <label>اسم المستخدم</label>
            <input required type="text" name="Username" maxlength="30" value="">
        </div>
        <div class="input_wrapper n20 border padding">
            <label >كلمة المرور</label>
            <input required type="password" name="Password" value="">
        </div>
        <div class="input_wrapper n20 padding">
            <label >تأكيد كلمة المرور</label>
            <input required type="password" name="CPassword" value="">
        </div>
        <div class="input_wrapper n30 border">
            <label >البريد الالكتروني</label>
            <input required type="email" name="Email" maxlength="40" value="">
        </div>
        <div class="input_wrapper n30 border padding">
            <label >تأكيد البريد الالكتروني</label>
            <input required type="email" name="CEmail" maxlength="40" value="">
        </div>
        <div class="input_wrapper n20 padding border">
            <label >رقم الهاتف</label>
            <input required type="text" name="PhoneNumber" value="">
        </div>
        <div class="input_wrapper_other padding n20 select">
            <select required name="GroupId">
                <option value=""></option>
                <?php// if (false !== $groups): foreach ($groups as $group): ?>
                    <option value="" selected>admin</option>
                    <option value="">supervisor</option>
                <?php //endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="حفظ">
    </fieldset>
</form>
