<!--
     Project made by Alkado Heneliko
     GitHub @alkado1
     Twitter @alkadoHs

     Contact: alkadosichone@gmail.com
     -->

<?php 
 require "connect.php";
 session_start();

 $emputyErr = "";
 if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if(empty($username) || empty($pass)) {
       $emputyErr = "Janza sehemu zote";
    } else {
        $sql = $conn->query("SELECT * FROM users WHERE username= '$username' AND password= '$pass'");
        if ($sql->num_rows === 1) {
            $row = $sql->fetch_assoc();
            $_SESSION['user_id'] = $row['username'];
            $_SESSION['cheo'] = $row['cheo'];
            header('location: ./admin/dashboard.php');
        } else {
            header('location: login.php');
        }
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="globals.css">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Essam-digital | login</title>
</head>
<body>

    <div class="login">
        <div class="logo">
            <img src="./assets/images/logo.jpg" alt="logo">
        </div>
        <div class="head">
            <h1>Essam Digital Record Management System</h1>
        </div>
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <span class="error"><?= $emputyErr ?></span>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">

                <label for="pass">Password</label>
                <input type="text" name="pass" id="pass">

                <input class="btn-grad" type="submit" name="submit" value="Login">
            </form>
        </div>
    </div>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }   
</script>
</body>
</html>