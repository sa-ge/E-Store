<a class="button" href="/employee/add"><i class="fa fa-plus"></i>الموظفين</a>
<table class="data">
    <thead>
        <tr>
            <th>اسم الموظف</th>
            <th>العمر</th>
            <th>العنوان </th>
            <th>المرتب</th>
            <th>الضريبة (%)</th>
            <th>التحكم</th>
        </tr>
    </thead>
    <tbody>
        <?php

        use PHPMVC\Models\Employee;

        $x = 4;/*
    if(false !== $employees) {
        foreach ($employees as $employee) {
        */ ?>
        <?php
        $con = mysqli_connect('127.0.0.1', 'root', '', 'storedb');
        $sql = "select * from app_employees";
        $employees = mysqli_query( $con, $sql);
        if(!$employees){
            die();
        }
        while ($row = mysqli_fetch_array($employees)) { ?>

            <tr>

                <td><?= $row['name']; ?></td>
                <td><?= $row['age']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= $row['salary']; ?>$</td>
                <td><?= $row['taxRate']; ?></td>
                <td>
                    <a name="edit" href="/employee/edit/<?= $row['id']; ?>"><i class="fa fa-edit"></i></a>
                    <a href="/employee/delete/موظف اي دي" onclick="if(!confirm('هل ترغب في حذف الموظف')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

        <?php }    ?>
        <?php $d = 4;/*
        }
    }
    */ ?>
    </tbody>
</table>