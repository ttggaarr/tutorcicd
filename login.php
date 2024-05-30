<!DOCTYPE html>
<html>
<head>
    <title>Login/Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function showForm(formId) {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById(formId).style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="kotak">
        <div class="tab">
            <button onclick="showForm('loginForm')" class="tablinks" id="defaultOpen">Login</button>
            <button onclick="showForm('registerForm')" class="tablinks">Register</button>
        </div>

        <div id="loginForm" class="form-container">
            <p class="tulisan_login">Silahkan Login</p>
            <form action="ceklogin.php" method="post" role="form"> 
                <label>Username</label>
                <input type="text" name="username" class="form_login" placeholder="Username" autocomplete="off"> 
                <label>Password</label>
                <input type="password" name="password" class="form_login" placeholder="Password" autocomplete="off"> 
                <input type="submit" class="tombol_login" value="Login">
            </form>
        </div>

        <div id="registerForm" class="form-container" style="display:none;">
            <p class="tulisan_register">Silahkan Register</p>
            <form action="prosesregister.php" method="post" role="form"> 
                <label>Username</label>
                <input type="text" name="username" class="form_register" placeholder="Username" autocomplete="off"> 
                <label>Password</label>
                <input type="password" name="password" class="form_register" placeholder="Password" autocomplete="off">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form_register" placeholder="Confirm Password" autocomplete="off">
                <input type="submit" class="tombol_register" value="Register">
            </form>
        </div>
    </div>

    <script>
        document.getElementById("defaultOpen").click();
    </script>
</body>
</html>
