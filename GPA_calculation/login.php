<form action ="login.php" method ="POST">
<input type="email" name="email" placeholder="Enter your email">
<input type="password" name="password" placeholder="Enter your password">
<input type="submit" name="log" placeholder="Sign In">
</form>
<?php
   session_start();
   include_once("Crud.php");
   $crud = new Crud();
   if(isset($_POST['log'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM user where  email='$email' AND password='$password'";
    $result = $crud->getAllData($sql);
    if($result){
        foreach($result as $res){
            $_SESSION['email']=$res['email'];
        }
        header('location:viewData.php');
    }else{
        echo "login error";
    }
}
?>