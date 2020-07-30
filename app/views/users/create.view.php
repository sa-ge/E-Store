<?php
$host = '127.0.0.1';
$userName = 'root';
$pass = '';
$db = 'test';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $userName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "coneccted";
} catch (PDOException $e) {
    echo 'error :' . $e->getMessage();
}

class user 
{
    private $_db;

    public function __construct($conn)
    {
        $this->_db= $conn;
    }
    public function create($name)
    {

    }


}
$person = new user($conn);



?>
<div class="div">
    <div class="new-user">New User</div>


    <form action="" method="post">
        <label for="name">الاسـم </label>
        <input type="text" class="input-text" name="name" value="" placeholder="ادخل الاسم هنا">
    </form>

</div>