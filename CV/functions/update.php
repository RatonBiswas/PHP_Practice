<?php
    include_once("../classes/Crud.php");
    
    $crud = new Crud();
 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $institute = $_POST['institute'];
    $results = $_POST['results'];
    $years = $_POST['years'];
    $skills = $_POST['skills'];
 
    $query = "UPDATE personal_info SET name = '$name', phone = '$phone', email = '$email',gender ='$gender', marital_status ='$marital_status' ,address ='$address' ,degree = '$degree', institute = '$institute', results = '$results', years = '$years' , skills = '$skills' where id = '$id'";
    
    if ($crud->execute($query)) {
        echo "successfull";
    } else {
        echo "Update Problem!";
    }
?>