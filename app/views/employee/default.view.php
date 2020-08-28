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
          <?
          if(!is_null($_SESSION['employees'])) {
              for($count = 0 ; $count < count($_SESSION['employees']) ; $count = $count + 1) 
              {  
                 $row = $_SESSION['employees'][$count];
                 $name = $row->name; 
                 $age = $row->age;
                 $address = $row->address ; 
                 $salary = $row->salary;
                 $taxRate = $row->taxRate;
                 
               /*  $_SESSION['id'] = $row->id;  
                 $_SESSION['name'] = $row->name; 
                 $_SESSION['age'] = $row->age; 
                 $_SESSION['gender'] = $row->gender; 
                 $_SESSION['address']  = $row->address; 
                 $_SESSION['systemsCanUse']  = $row->systemsCanUse; 
                 $_SESSION['salary']  = $row->salary ;
                 $_SESSION['taxRate']  = $row->taxRate ;
                 $_SESSION['notes']= $row->notes; 
                */  
                 
              
 
                    ?>
          <tr>

                <td><?= $name; ?></td>
                <td><?= $age; ?></td>
                <td><?= $address;?></td>
                <td><?= $salary; ?> </td>
                <td><?= $taxRate ; ?></td>

                <td>
                    <a name="edit" href="/employee/edit/<?= $row->id; ?>"><i class="fa fa-edit"></i></a>
                    <a href="/employee/delete/موظف اي دي" onclick="if(!confirm('هل ترغب في حذف الموظف')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?  }}
            
 ?>

        <?php $d = 4;/*
        }
    }
    */ ?>
    </tbody>
</table>
