<?php
$users = unserialize(file_get_contents("./private/users"));
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'Create')
{
	foreach ($users as $user) {
		if ($user['login'] == $_POST['login']) {
			exit("This login alredy exists, try another one");
		}
	}
    if ($_POST['rpswd'] == $_POST['newpswd']) {
        $users[] = array('login' => $_POST['newlogin'], 'passwd' => hash('whirlpool', $_POST['newpswd']));
        if (file_put_contents("./private/users", serialize($users))) {
            $_SESSION['logged_in_user'] = $users['login'];
            header("Location: index.php");
        }
    }
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'Login')
{
	foreach ($users as $user) {
		if ($user['login'] == $_POST['login']) {
			if ($user['passwd'] == hash('whirlpool', $_POST['passwd'])) {
				$_SESSION['logged_in_user'] = $user['login'];
				header("Location: index.php");
			} else {
				exit("Wrong password\n");
			}
		}
	}
	exit("Login doesn`t exists");
}
?>