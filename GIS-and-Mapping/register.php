<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styling.css">
    <title>Document</title>
</head>
<body>
<div class="login-container">
<h2>Register Form</h2><br><br>
<form class="login-form" action="registrationValidation.php" method="post">

    <label for="">Firstname</label><input type="text" placeholder="Firstname" name="Firstname" required>
    <label for="">Middlename</label><input type="text" placeholder="Middlename" name="MiddleName">
    <label for="">Lastname</label><input type="text" placeholder="Lastname" name="Lastname" required>
    <label for="">Birthday</label><input type="date"  id='birthday' name='Birthday' required>
    <label for="">Username</label><input type="text" placeholder="Username" name="Username" required>
    <label for="">Password</label><input type="password" placeholder="Password" id='password'name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();'required>
    <label for="">Verify Password</label><input type="password" placeholder="Password" name="Confirm_Password" id='confirm_password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();' required>
    <label for="role">Role:</label>
        <select name="Role" id="role" required>
            <option value="user" >User</option>
            <option value="admin" >Admin</option>
            <option value="lgu" >Lgu</option>
        </select>

    <!--
TODO:    
Add gender for the input
add verification for if the verify password is not  the same you can't register
 -->

  <button type="submit" >Register</button>

</form>
</div>
<?php if (isset($_GET['success'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: 'You registered successfully',
            });
        </script>
    <?php endif; ?>

<script>

    var check = function() {
        if (document.getElementById('password').value==
        document.getElementById('confirm_password').value){
            document.getElementById('confirm_password').style.border = '1px solid green';
        }
        else {
            document.getElementById('confirm_password').style.border = '3px solid red';
        
    }
    
    }
</script>

</body>
</html>