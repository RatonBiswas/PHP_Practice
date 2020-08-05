<?php
session_start();
 if(!isset($_SESSION['email'])){
     header('location:login.php');
  }
include_once("Crud.php");

$crud = new Crud();
if(isset($_POST['addData'])){
    $course_name =$_POST['course_name'];
    $course_code =$_POST['course_code'];
    $course_credit =$_POST['course_credit'];
    $student_id =$_POST['student_id'];
    $gpa =$_POST['gpa'];

    
    $query = "INSERT INTO subject_result(course_name,course_code,course_credit,student_id,gpa) VALUES('$course_name','$course_code','$course_credit','$student_id','$gpa')";

    if($crud->execute($query)){
        echo "Insert seccessfully";
    }
    else{
        echo "Insert problem";
    }
}

?>
<a href="signout.php">Log out</a>
<form action="add.php" method="post">
<input type="text" name="course_name" placeholder="Course Name">
<input type="text" name="course_code" placeholder="Course code">
    <input type="text" name="course_credit" placeholder="course_credit">
    <input type="text" name="student_id" placeholder="Students Id">
    <input type="text" name="gpa" placeholder="GPA">
    <input type="submit" name="addData" value="Add data to server">
</form>
