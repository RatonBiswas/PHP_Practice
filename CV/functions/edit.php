<?php
    include_once("../classes/Crud.php");
    $crud = new Crud();
    $id = $_POST['id'];
    $sql = "SELECT * FROM personal_info where id = $id";
    $result = $crud->getAllData($sql);

    foreach($result as $res) {
        $name = $res['name'];
        $phone = $res['phone'];
        $email = $res['email'];
        $gender = $res['gender'];
        $marital_status = $res['marital_status'];
        $address = $res['address'];
        $degree = $res['degree'];
        $institute = $res['institute'];
        $results = $res['results'];
        $years = $res['years'];
        $skills = $res['skills'];
       
    }
?>


<div id="updateForm">
<input type="number" name="uid" id="uid" value="<?php echo $id; ?>" hidden>

<label>Name:</label> <br>
<input type="text" id="uname" value="<?php echo $name; ?>"> <br>

<label>Phone:</label> <br>
<input type="number" id="uphone" value="<?php echo $phone; ?>"> <br>

<label>Email:</label> <br>
<input type="email" id="uemail" value="<?php echo $email; ?>"> <br>

<label>Gender:</label> <br>
<input type="text" id="ugender" value="<?php echo $gender; ?>"> <br>

<label>Marital Status:</label> <br>
<input type="text" id="umarital_status" value="<?php echo $marital_status; ?>"> <br>

<label>Address:</label> <br>
<input type="text" id="uaddress" value="<?php echo $address; ?>"> <br>

<label for="education">Education : </label>
<input type="text" id="udegree" placeholder="degree" value="<?php echo $degree; ?>"> <br>
<input type="text" id="uinstitute" placeholder="institute" value="<?php echo $institute; ?>"> <br>
<input type="number" id="uresults" placeholder="results" value="<?php echo $results; ?>"> <br>
<input type="number" id="uyears" placeholder="years" value="<?php echo $years; ?>"> <br> <br>

<label for="skills">Skills : </label>
<input type="text" name="uskills" id="uskills" value="<?php echo $skills; ?>"> <br>

<input id="updateBtn" type="button" value="Update" name="update">
</div>


<script type="text/javascript">
        $('#updateBtn').on('click', function() {
            var id = $('#uid').val();
            var name = $('#uname').val();
            var phone = $('#uphone').val();
            var email = $('#uemail').val();
            var gender = $('#ugender').val();
            var marital_status = $('#umarital_status').val();
            var address = $('#uaddress').val();
            var degree = $('#udegree').val();
            var institute = $('#uinstitute').val();
            var results = $('#uresults').val();
            var years = $('#uyears').val();
            var skills = $('#uskills').val();
    
            $.ajax({
                url: 'functions/update.php',
                type: 'POST',
                data: { id: id, name: name, phone: phone, email: email,gender: gender ,marital_status: marital_status, address: address,degree: degree, institute: institute,results: results,years: years,skills: skills},
                success: function(response) {
                    //if (response == 'successfull') {
                        $('#updateForm').slideUp(700);
                        $.get('functions/index.php', function(response) {
                            $('#DataView').html(response);
                        });
                    //}
                }
            });
        });
</script>