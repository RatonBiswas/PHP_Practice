<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
 }
include_once("Crud.php");
$crud = new Crud();
if(isset($_POST['searchid'])){


    $student_id = $_POST['student_id'];
    $sql ="SELECT * FROM subject_result where student_id='$student_id'";
    $result = $crud->getAllData($sql);
    }
?>
<form action="searchId.php" method="post">
<input type="text" name="student_id" placeholder="Students Id">
<input type="submit" name="searchid" value="Searchid">
</form>
<?php
if(!empty($result)){
?>
<table border=1>
<tr>
<th>Course Name</th>
<th>Course Code</th>
<th>Course Credit</th>
<th>Student Id</th>
<th>GPA</th>
</tr>
<?php
$total_credit = 0;
$total_sum = 0;
foreach($result as $res){
    $total_credit += number_format($res['course_credit'],2);
    $total_sum += number_format($res['course_credit'],2)*number_format($res['gpa'],2);
echo "<tr>";
echo "<td>".$res['course_name']."</td>";
echo "<td>".$res['course_code']."</td>";
echo "<td>".$res['course_credit']."</td>";
echo "<td>".$res['student_id']."</td>";
echo "<td>".$res['gpa']."</td>";
//echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a>|<a href=\"delete.php?id=$res[id]\">Delete</a></td></tr>";
}
$sgpa = $total_sum/$total_credit;

echo "<tr><td colspan='4'>SGPA</td><td>".number_format($sgpa,2)."</td></tr></table>";
}
<a href="signout.php">Log out</a>
?>


