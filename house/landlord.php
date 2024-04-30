<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Landlord Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    form {
        max-width: 400px;
        margin: 0 auto;
    }
    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .error-message {
        color: red;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<h2>Landlord Form</h2>

<form id="landlordForm">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" required><br>
    <label for="address">Address:</label><br>
    <textarea id="address" name="address" required></textarea><br>
    <input type="submit" id="submitBtn" value="Submit">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#landlordForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'insert_landlord.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    alert(response.message);
                    $('#landlordForm')[0].reset(); // Clear form fields
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
            }
        });
    });
});
</script>

</body>
</html>
