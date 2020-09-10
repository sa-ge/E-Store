<?php

use PHPMVC\LIB\CLASSES\Session;
use PHPMVC\LIB\FUNCTIONS\Sanitize;

if(Session::exists('user_added_success')){
?>
<p style="background-color: darkgreen;" class="message t"><a href="" class="closeBtn"><i class="fa fa-times"></i></a><? echo Session::flash('employee_added_success'); ?></p>
<?}
?>

<div class="container">
    <a href="/user/create" class="button"> إضافة <i class="fa fa-plus"></i></a>
    <table class="data">
        <thead>
            <tr>
                <th>م</th>
                <th>الاســـــــــــم</th>
                <th>المستخدم</th>
                <th>تاريخ الاضـافة</th>
                <th>التحكم</th>
            </tr>
        </thead>
            <?php $emp = Session::putObject('users'); ?>
        <tbody>
            <? for($count = 0; $count <count($emp); $count++){?>
            <tr>
            <td><?php echo Sanitize::escape($emp[$count]->id); ?></td>
                <td><?php echo Sanitize::escape($emp[$count]->name); ?></td>
                <td><?php echo Sanitize::escape($emp[$count]->user_name); ?></td>
                <td><?php echo Sanitize::escape($emp[$count]->joined); ?></td>
                <td>
                <a href="/user/edit/<?= Sanitize::escape($emp[$count]->id);?>"><i class="fa fa-edit"></i></a>
                <a href="/user/delete/<?= Sanitize::escape($emp[$count]->id);?>" onclick="if(!confirm('')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?}?>
        </tbody>
    </table>
</div>
