<?php 

use PHPMVC\LIB\FUNCTIONS\Sanitize;
?>

<a class="button" href="/employee/add"><i class="fa fa-plus"></i>الموظفين</a>
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
    <tbody>
        
                <? for($count = 0; $count < count($_SESSION['employees']); $count++){ ?>
          <tr>
          <td><?= Sanitize::escape($_SESSION['employees'][$count]->name);?></td>
                <td><?= Sanitize::escape($_SESSION['employees'][$count]->age);?></td>
                <td><?= Sanitize::escape($_SESSION['employees'][$count]->address);?></td>
                <td><?= Sanitize::escape($_SESSION['employees'][$count]->salary);?></td>
                <? if(Sanitize::escape($_SESSION['employees'][$count]->job_type) == 1){
                    $job_type = "دوام كلي";
                    }else{
                    $job_type = "دوام جزئي";
                    }?>
                    <td><?= Sanitize::escape($job_type);?></td>
                <td><?= Sanitize::escape($_SESSION['employees'][$count]->taxRate);?></td>

                <td>
                    <a name="edit" href="/employee/edit/<?= Sanitize::escape($_SESSION['employees'][$count]->id); ?>"><i class="fa fa-edit"></i></a>
                    <a href="/employee/delete/<?= Sanitize::escape($_SESSION['employees'][$count]->id); ?>" onclick="if(!confirm('هل ترغب في حذف الموظف')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
                <?}?>
    </tbody>
</table>
