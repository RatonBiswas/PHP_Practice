<?php
session_start();
if ($_SESSION['usertype'] != 'management') {
  // code...
  echo "<script>window.history.back();</script>";
}

include_once("../classes/Crud.php");
$crud = new Crud();
$sql = "SELECT * FROM proposal ORDER BY id DESC";
$result = $crud->getAllData($sql);
?>


<div>
    <center><h1><p>Welcome <?php echo $_SESSION['u_name']; ?> to Management Page..</p></h1></center>

</div>
<?php
if (!empty($result)) {

    echo "<h1><center><p>List of proposed projects.</p></center></h1><br>";
    echo "<center><table border=1>
    <tr>
    <th>Student ID</th>
    <th>Project Title</th>
    <th>Project Description</th>
    <th>Project Language</th>
    <th>Status</th>
    </tr>";
    foreach ($result as $res) {
        echo "<tr>";
        echo "<td>" . $res['student_id'] . "</td>";
        echo "<td>" . $res['project_title'] . "</td>";
        echo "<td>" . $res['project_des'] . "</td>";
        echo "<td>" . $res['project_lang'] . "</td>";
        echo "<td>" . $res['is_approved'] . "</td>";

        echo "<td><button id='$res[student_id]' class='acceptProposal'>Accept</button> | <button id='$res[student_id]' class='rejectProposal'>Reject</button></td>";
    }
    echo "</table></center>";
} else {
    echo "<center><p>No project proposal submited yet!</p></center><br>";
}
?>

<div id="DataView"></div>
<div id="DataAdd"></div><br> <br>
<center><h1><a href="logout.php">Logout</a></h1></center>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.acceptProposal').click(function() {
            var student_id = $(this).attr('id');
            var Proposalstatus = 'Accepted';
            $.ajax({
                url: './update.php',
                type: 'POST',
                data: {
                    student_id: student_id,
                    is_approved: Proposalstatus
                },
                success: function(response) {
                    if (response == 'successfull') {
                        location.reload();
                        $('#DataView').html(response);
                    }
                }
            });
        });


        $('.rejectProposal').click(function() {
            var student_id = $(this).attr('id');
            var Proposalstatus = 'Rejected';
            $.ajax({
                url: './update.php',
                type: 'POST',
                data: {
                    student_id: student_id,
                    is_approved: Proposalstatus
                },
                success: function(response) {
                    if (response == 'successfull') {
                        location.reload();
                        $('#DataView').html(response);
                    }
                }
            });
        });

    });
</script>