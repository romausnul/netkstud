<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>ВОЙТИ</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']); 
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <form name="upload" action="download_img.php" method="POST" ENCTYPE="multipart/form-data"> 
        Выберите файл для авы: 
        <input type="file" name="userfile">
        <input type="submit" name="upload" value="Загрузить"> 
</form>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">У тебя уже есть акк? <a href="registration.php">ТУТ МОЖНО ПОЗНАТЬ ПРОЕКЦИЮ</a></p>
  </form>
<?php
    }
?>
</body>
</html>
