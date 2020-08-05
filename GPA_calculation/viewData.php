<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
 }
include_once("Crud.php");
$crud = new Crud();
$sql ="SELECT * FROM subject_result ORDER BY id DESC";
$result = $crud->getAllData($sql);
?>
<html>
<head>
<title>Student Information</title>
</head>
<body>
<table border=1>
<tr>
<th>Course Name</th>
<th>Course Code</th>
<th>Course Credit</th>
<th>Student Id</th>
<th>GPA</th>
<th>Action</th>
</tr>
<?php
foreach($result as $res){
echo "<tr>";
echo "<td>".$res['course_name']."</td>";
echo "<td>".$res['course_code']."</td>";
echo "<td>".$res['course_credit']."</td>";
echo "<td>".$res['student_id']."</td>";
echo "<td>".$res['gpa']."</td>";
echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a>|<a href=\"delete.php?id=$res[id]\">Delete</a></td></tr>";
}
?>
</table>
<a href="signout.php">Log out</a>
</body>
</html>