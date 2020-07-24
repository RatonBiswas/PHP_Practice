<?php
session_start();
include_once '../classes/Crud.php';
$crud = new Crud();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql = "SELECT name,ins_Id,type FROM user WHERE email='$email' AND password='$pass'";

    $result = $crud->getAllData($sql);

    if ($result) {
        // code...
        foreach ($result as $res) {
            // code...
            $_SESSION["usertype"] = $res["type"];
            $_SESSION["student_id"] = $res["ins_Id"];
            $_SESSION["u_name"] = $res["name"];

            if ($_SESSION["usertype"] == 'student') {
                header("location:student.php");
            } else if ($_SESSION["usertype"] == 'management') {
                header("location:management.php");
            }
        }
    }
}

?>
<center><form action="login.php" method="POST">
    Email: <input type="email" name="email" /></br><br>
    Password: <input type="password" name="password" /></br><br>
    <input type="submit" name="login" value="Login" />
</form></center>

<center><h1><a href="register.php">Register Now</a></h1></center>