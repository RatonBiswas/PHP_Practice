<?php
include_once("../classes/Crud.php");
$crud = new Crud();
$sql = "SELECT * FROM personal_info ORDER BY id DESC";
$resul = $crud->getAllData($sql);
?>

<button id="AddData">Add new data</button> <br>

    <table border=1>
    <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Marital status</th>
    <th>Address</th>
    <th>Degree</th>
    <th>Institute</th>
    <th>Results</th>
    <th>Years</th>
    <th>Skills</th>
    <th>Action</th>
    </tr>
    <?php
        foreach($resul as $res) {
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['phone']."</td>";
            echo "<td>".$res['email']."</td>";
            echo "<td>".$res['gender']."</td>";
            echo "<td>".$res['marital_status']."</td>";
            echo "<td>".$res['address']."</td>";
            echo "<td>".$res['degree']."</td>";
            echo "<td>".$res['institute']."</td>";
            echo "<td>".$res['results']."</td>";
            echo "<td>".$res['years']."</td>";
            echo "<td>".$res['skills']."</td>";


            echo "<td><button id='$res[id]' class='dataEdit'>Edit</button> | <button id='$res[id]' class='dataDelete'>Delete</button></td></tr>";

        }
    ?>


    </table>

    <script type="text/javascript">
        $(document).ready(function () {
                $('#AddData').click(function(){
                $.get('layout/dataAdd.php', function(response) {
                $('#DataAdd').html(response);
                });
            });

            $('.dataDelete').on('click',function(){
                var id = $(this).attr('id');
                $.ajax({
                    url:'functions/delete.php',
                    type:'POST',
                    data:{id:id},
                    success :function(response){
                        if(response=="Successfull"){
                            $.get('functions/index.php',function(data){
                                $('#DataView').html(data);
                            });
                        }
                    }
                });
            });

            $('.dataEdit').on('click', function(){
                var id = $(this).attr('id');
                $.ajax({
                    url:'functions/edit.php',
                    type:'POST',
                    data:{id:id},
                    success :function(response){
                        $('#DataEdit').html(response);
                    }
                });
            });

        });
    </script>