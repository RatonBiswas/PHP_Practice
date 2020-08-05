<form action ="registration.php" method ="POST">
<input type="email" name="email" placeholder="Enter your email">
<input type="password" name="password" placeholder="Enter your password">
<input type="submit" name="reg" placeholder="Sign up">
</form>
<?php
include_once("Crud.php");
$crud = new Crud();
if(isset($_POST['reg'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="INSERT INTO user(email,password) VALUES('$email','$password')";
    if($crud->execute($sql)){
        header('location:login.php');
    }
    // session_start(); method of session
    // session_unset(); method of session
    // session_destroy(); method of session
    // $_SESSION[''] variable name
    // <?php
    //  session_start();
    //  if(!isset($_SESSION['email'])){
    //      header('location:login.php');
    //  }

}
