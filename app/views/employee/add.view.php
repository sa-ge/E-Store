<form autocomplete="off" class="appForm clearfix" method="POST" action="store" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend>بيانات الموظف</legend>
        <div class="input_wrapper n40 border">
            <label>الاسم</label>
            <input required type="text" name="name" id="name" maxlength="50">
        </div>
        <div class="input_wrapper n40 padding border">
            <label>العنوان</label>
            <input required type="text" id="address" name="address" maxlength="100">
        </div>
        <div class="input_wrapper_other n20 padding">
            <label>الجنس</label>
            <label class="radio">
                <input required type="radio" name="gender" id="gender" value="1">
                <div class="radio_button"></div>
                <span>ذكـر</span>
            </label>
            <label class="radio">
                <input required type="radio" name="gender" id="gender" value="2">
                <div class="radio_button"></div>
                <span>انثى</span>
            </label>
        </div>
        <div class="input_wrapper n30 border">
            <label>العـمر</label>
            <input required type="number" min="22" max="60" name="age" id="age">
        </div>
        <div class="input_wrapper n20 padding border">
            <label>الراتب</label>
            <input required type="number" id="salary" step="0.01" name="salary" min="1500" max="9000">
        </div>
        <div class="input_wrapper n20 padding border">
            <label>الضريبـة</label>
            <input required type="number" id="tax" step="0.01" name="tax" min="1" max="5">
        </div>
        <div class="input_wrapper_other n30 padding select">
            <select required name="type" id="type">
                <option value="">اختار نوع الوظيفة</option>
                <option value="1">دوام جزئي</option>
                <option value="2">دوام كلي</option>
            </select>
        </div>
        <div class="input_wrapper_other">
            <label>انظمة التشغيل التي يمكن استخدامها</label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="1">
                <div class="checkbox_button"></div>
                <span>وندوز</span>
            </label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="2">
                <div class="checkbox_button"></div>
                <span>لينكس</span>
            </label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="3">
                <div class="checkbox_button"></div>
                <span>ماك</span>
            </label>
        </div>
        <div class="input_wrapper_other">
            <label>ملاحظات</label>
            <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
        </div>
        <input class="no_float" type="submit" name="submit" value="حفظ">
    </fieldset>
</form>
