<?php
session_start();
$users = unserialize(file_get_contents("./private/test.txt"));
$_POST["login"] = trim($_POST["login"]);
$_POST["newlogin"] = trim($_POST["newlogin"]);
if ($_POST['newlogin'] && $_POST['newpswd'] && $_POST['submit'] == 'Create')
{
	foreach ($users as $user) {
		if ($user['login'] == $_POST['newlogin']) {
            echo "<b>Login already exist</b>
                    <form action='login.html'>
                    <input name='' type='submit' value='Back'>
              </form>";
            exit();
		}
	}
    if ($_POST['rpswd'] == $_POST['newpswd']) {
        $users[$_POST['newlogin']] = array('login' => $_POST['newlogin'], 'passwd' => hash('whirlpool', $_POST['newpswd']));
        file_put_contents("./private/test.txt", serialize($users));
        $_SESSION['logged_in_user'] = $_POST['newlogin'];
        header("Location: index.php");
    }
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'Login')
{
	foreach ($users as $user) {
		if ($user['login'] == $_POST['login']) {
			if ($user['passwd'] == hash('whirlpool', $_POST['passwd'])) {
				$_SESSION['logged_in_user'] = $_POST['login'];
				header("Location: index.php");
			} else {
                echo "<b>Wrong password</b>
            <form action='login.html'>
            <input name='' type='submit' value='Back'>
            </form>";
				exit();
			}
		}
	}
	echo "<b>Login doesnt exist</b>
            <form action='login.html'>
            <input name='' type='submit' value='Back'>
            </form>";
} else {
    echo "<b>Login or user field cant be an empty</b>
            <form action='login.html'>
            <input name='' type='submit' value='Back'>
            </form>";
}
