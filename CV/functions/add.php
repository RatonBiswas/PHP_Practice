<?php
    include_once("../classes/Crud.php");
 
    $crud = new Crud();

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
 
    $query = "INSERT INTO personal_info(name,phone,email,gender,marital_status,address,degree,institute,results,years,skills) VALUES('$name','$phone','$email','$gender','$marital_status','$address','$degree','$institute','$results','$years','$skills')";
 
    if ($crud->execute($query)) {
        echo "Successfull";
    } else {
        echo "Problem";
    }

?>