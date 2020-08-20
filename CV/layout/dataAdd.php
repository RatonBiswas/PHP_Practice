<div id="input_form">
    <label for="name">Name : </label>
    <input type="text" id="name"> <br>
    <label for="phone">Phone : </label>
    <input type="text" id="phone"> <br>
    <label for="email">Email : </label>
    <input type="email" id="email"> <br>
    <label for="gender">Gender : </label>
    <input type="text" id="gender"> <br>
    <label for="marital_status">Marital Status : </label>
    <input type="text" id="marital_status"> <br>
    <label for="address">Address : </label>
    <input type="text" id="address"> <br>
    <label for="education">Education : </label><br>
    <input type="text" id="degree" placeholder="degree"> <br>
    <input type="text" id="institute" placeholder="institute"> <br>
    <input type="text" id="results" placeholder="results"> <br>
    <input type="text" id="years" placeholder="years"> <br>
    <label for="skills">Skills : </label>
    <input type="text" name="skills" id="skills"> <br> 
    <input type="button" id="addData" value="Add Data To Server">
    <input type="button" onclick="$('#DataAdd').slideUp(700);" value="Cancel">
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#addData').on('click', function() {
        var name = $('#name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var gender = $('#gender').val();
        var marital_status = $('#marital_status').val();
        var address = $('#address').val();
        var degree = $('#degree').val();
        var institute = $('#institute').val();
        var results = $('#results').val();
        var years = $('#years').val();
        var skills = $('#skills').val();

        $.ajax({
            url: 'functions/add.php',
            type: 'POST',
            data: {name: name, phone: phone, email: email,gender: gender ,marital_status: marital_status, address: address,degree: degree, institute: institute,results: results,years: years,skills: skills },
            success: function(response) {
                $('#name').val("");
                $('#phone').val("");
                $('#email').val("");
                $('#gender').val("");
                $('#marital_status').val("");
                $('#address').val("");
                $('#degree').val("");
                $('#institute').val("");
                $('#results').val("");
                $('#years').val("");
                $('#skills').val("");
                $('#input_form').slideUp(700);
                if (response == 'Successfull') {
                //$.get('functions/index.php', function(response) {
                    $('#DataView').html(response);
                }
            }
        });
    });
})
</script>