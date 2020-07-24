<?php
session_start();
include_once '../classes/Crud.php';
$crud = new Crud();

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $ins_id = $_POST['var_id'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $type = $_POST['type'];

    $insert_query = "INSERT INTO user (name, ins_Id, email, password, type) VALUES('$name', '$ins_id', '$email', '$pass', '$type')";

    if ($crud->execute($insert_query)) {
        echo "<p>register done!</p>";

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
    } else {
        echo "<p>something wrong!</p>";
    }
}

?>

<center><h1>Registration Form</h1></center> <br>
<center>Select Semester :<select onclick="myFunction()" id="semester" required>
<option>Spring-2018</option>
<option>Summer-2018</option>
<option>Fall-2018</option>
</select></center><br>
<center><form id="regiForm" action="register.php" method="POST">
    Name : <input type="text" id="nam" name="name" required disabled> <br><br>
    Varsity Id : <input type="text"  id="ide" name="var_id" required disabled> <br><br>
    Email: <input type="email"  id="emaile" name="email" required disabled></br><br>
    Password: <input type="password" id="passworde" name="password" required disabled></br><br>
    Type: <input type="text" name="type" id="types" required disabled>
    <p>Courses are allowed to register.Please select course!</p>
    Select Course : <select id="select_course"  onclick="checkingCourse()" required disabled>
    <!-- <option id="courses_allow" value="courses_are_allow">courses are allowed to register</option> -->
    <option id="SE133/SWE231" value="SE133/SWE231">SE133/SWE231</option>
    <option id="SWE233" value="SWE233">SWE233</option>
    <option id="SWE313" value="SWE313">SWE313</option>
    <option id="SWE333" value="SWE333" selected>SWE333</option>
    <option id="SWE331" value="SWE331">SWE331</option>
    <option id="SWE332" value="SWE332">SWE332</option>
    </select><br><br>
    <input id="check" type="submit" name="register" value="Register Now" disabled/>
</form></center>
<center><h1><a href="login.php">👈Back👈</a></h1></center>
<div class="register_res"></div>
<script type="text/javascript">
// function validateForm(){
//     const SE133_SWE231 = document.getElementById('SE133/SWE231').checked;
//     const SWE233 = document.getElementById('SWE233').checked;
//     const SWE313 = document.getElementById('SWE313').checked;
//     const SWE333 = document.getElementById('SWE333').checked;
//     const SWE331 = document.getElementById('SWE331').checked;
//     const SWE332 = document.getElementById('SWE332').checked;
//     if (SE133_SWE231 && SWE233 && SWE313 && SWE333 && SWE331 && SWE332==true) {
//                 document.getElementById('check').disabled = true;
//             }else{
//                 document.getElementById('check').disabled = false;
//             }
// }

function checkingCourse(){
    if(document.getElementById('select_course').checked == true){
        document.getElementById('check').disabled=true;
    }else{
        document.getElementById('check').disabled=false;
        }
}

function myFunction(){
    if(document.getElementById('semester').checked == true){
        document.getElementById('nam').disabled=true;
        document.getElementById('ide').disabled=true;
        document.getElementById('emaile').disabled=true;
        document.getElementById('passworde').disabled=true;
        document.getElementById('types').disabled=true;
        document.getElementById('select_course').disabled=true;
    }else{
        document.getElementById('nam').disabled=false;
        document.getElementById('ide').disabled=false;
        document.getElementById('emaile').disabled=false;
        document.getElementById('passworde').disabled=false;
        document.getElementById('types').disabled=false;
        document.getElementById('select_course').disabled=false;
        
        }

}

</script>