<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
<h2>Username: <?php echo $_SESSION["logged_in_user"] ?></h2>
<table>
        <?php
        $orders = unserialize(file_get_contents("private/".$_SESSION['logged_in_user']));
        foreach ($orders as $order) {
            echo "<tr>$order</tr><br>";
        }
        ?>
</table>
<form action="change_password.php">
    <input type="submit" name="submit" value="change_pswd">
</form>
</body>
</html>
