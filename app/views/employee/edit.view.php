<?php

$id = substr($_SERVER['REQUEST_URI'],-1);

  for($count = 0 ; $count <count($_SESSION['employees']); $count = $count +1)
  {
    if($_SESSION['employees'][$count] ->id == $id )
    {
      $row = $_SESSION['employees'][$count]; 
      break;
    }
    else
    {
      $row = 2;
    }
  }
  if(is_int($row)){

      echo "this page dose not exist";
      die();
  }

$oss = explode(',' , $row->systemsCanUse);
if(!$row){

    die();
}
?>
<form autocomplete="off" class="appForm clearfix" method="POST" action="edit" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend>بيانات الموظف</legend>
        <div class="input_wrapper n40 border">
            <label class="floated">الاسم</label>
            <input required  type="text" aria-selected=""  name="name" id="name" maxlength="40" value="<?= $row->name ?>">
        </div>
        <div class="input_wrapper n40 padding border">
            <label class="floated">العنوان</label>
            <input required type="text" id="address"  name="address" maxlength="100" value="<?= $row->address ?>">
        </div>
        <div class="input_wrapper_other n20 padding">
            <label >الجنس</label>
            <label class="radio">
            <input required type="radio" <? if($row->gender == 1) { ?>  checked=true <?}?>   name="gender"  id="gender" value="1">
                <div class="radio_button"></div>
                <span>ذكـر</span>
            </label>
            <label class="radio">
            <input required type="radio"  <? if($row->gender == 0) { ?>  checked=true <?}?>  name="gender" id="gender" value="2">
                <div class="radio_button"></div>
                <span>انثى</span>
            </label>
        </div>
        <div class="input_wrapper n30 border">
            <label class="floated">العـمر</label>
            <input required type="number" min="22" max="60" name="age"  onselect=""  id="age" value="<?=$row->age?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label class="floated">الراتب</label>
            <input required type="number" id="salary" step="0.01" name="salary"  onselect=""  min="1500" max="9000" value="<?=$row->salary?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label class="floated">الضريبـة</label>
            <input required type="number" id="tax" step="0.01" name="tax" min="1" max="5"  onselect=""  value="<?=$row->taxRate?>">
        </div>
        <div class="input_wrapper_other n30 padding select">
            <select required name="type" value="1" id="type">
                <option value="">اختار نوع الوظيفة</option>
                <option value="1" <? if($row->job_type == 0) {?> selected <?}?> >دوام جزئي</option>
                <option value="2" <? if($row->job_type == 1) {?> selected <?}?> >دوام كلي</option>
            </select>
        </div>
        <div class="input_wrapper_other">
            <label>انظمة التشغيل التي يمكن استخدامها</label>
            <label class="checkbox block">
            <input type="checkbox" name="os[]" id="os" value="1" <?php if(in_array(1,$oss)){  ?> checked <? } ?> >
                <div class="checkbox_button"></div>
                <span>وندوز</span>
            </label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="2"  <?php if(in_array(2,$oss)){  ?> checked <? } ?> >
                <div class="checkbox_button"></div>
                <span>لينكس</span>
            </label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="3"  <?php if(in_array(3,$oss)){  ?> checked <? } ?> >
                <div class="checkbox_button"></div>
                <span>ماك</span>
            </label>
        </div>
        <div class="input_wrapper_other">
            <label>ملاحظات</label>
            <textarea name="notes" id="notes" cols="30" rows="10"><? echo $row->notes; ?></textarea>
        </div>
        <input class="no_float" type="submit" name="submit" value="حفظ">
    </fieldset>
</form>

