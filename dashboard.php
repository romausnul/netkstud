<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>НЭТК БЛОКЕР</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>НУ ПРИВЕТ, <?php echo $_SESSION['username']; ?>!</p>
        <p>Я ЧЕТ ТАЖЕ И НЕ ПОНЛЯ ХОТЯ ВСЕ ПОНЯЛ.</p>
        <p><a href="logout.php">ОПА</a></p>
    </div>
</body>
</html>
