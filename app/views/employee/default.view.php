<?php

use PHPMVC\LIB\CLASSES\Session;
use PHPMVC\LIB\FUNCTIONS\Sanitize;
if(Session::exists('employee_added_success')){
?>
<p style="background-color: darkgreen;" class="message t"><a href="" class="closeBtn"><i class="fa fa-times"></i></a><? echo Session::flash('employee_added_success'); ?></p>
<?}
?>

<a class="button" href="/employee/add"> اضافة<i class="fa fa-plus"> </i></a>
<table class="data">
    <thead>
        <tr>
            <th>اسم الموظف</th>
            <th>العمر</th>
            <th>العنوان </th>
            <th>المرتب</th>
            <th>نوع الوظيفة</th>
            <th>الضريبة (%)</th>
            <th>التحكم</th>
        </tr>
    </thead>
                <?php $emp = Session::putObject('employees'); ?>
    <tbody>
            <? for($count = 0; $count < count($emp); $count++){?>
          <tr>
          <td><?= Sanitize::escape($emp[$count]->name);?></td>
                <td><?= Sanitize::escape($emp[$count]->age);?></td>
                <td><?= Sanitize::escape($emp[$count]->address);?></td>
                <td><?= Sanitize::escape($emp[$count]->salary);?></td>
                <? if(Sanitize::escape($emp[$count]->job_type) == 1){
                    $job_type = "دوام كلي";
                    }else{
                    $job_type = "دوام جزئي";
                    }?>
                    <td><?= Sanitize::escape($job_type);?></td>
                <td><?= Sanitize::escape($emp[$count]->taxRate);?></td>

                <td>
                    <a name="edit" href="/employee/edit/<?= Sanitize::escape($emp[$count]->id); ?>">  <i class="fa fa-edit"></i></a>
                    <a href="/employee/delete/<?= Sanitize::escape($emp[$count]->id);?>" onclick="if(!confirm('هل ترغب في حذف الموظف')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
                <?}?>
    </tbody>
</table>
