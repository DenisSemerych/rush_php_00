<?php
session_start();
require_once("install.php");
$items = unserialize(file_get_contents("data/items"));
foreach ($cats as $cat) {
    if ($_POST[$cat] != "") {
        $_SESSION["current_category"] = $_POST[$cat];
        break ;
    } elseif ($_POST["all"] == "all") {
        $_SESSION["current_category"] = "";
    }
}
?>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
    <link rel='stylesheet' href='style.css'>
</head >
<body>
<?php
if ($_SESSION["logged_in_user"] == "") {
    echo "<form name=login' action='login.html'>
        <input name='login' formmethod='post' type='submit' value='login'>
        </form>";
} else {
    echo "Hi, ".$_SESSION["logged_in_user"]."!<br />
    <form name='logout' action='logout.php'>
        <input name='logout' formmethod='post' type='submit' value='logout'>
    </form>
    <form name='profile' action='profile.php'>
        <input name='logout' formmethod='post' type='submit' value='profile'>
    </form>";
}
?>
<div id='items'>
<h1>Items</h1>
<table>
        <form action="index.php">
    <input name='1' formmethod='post' type='submit' value='1'>
    <input name='2' formmethod='post' type='submit' value='2'>
    <input name='3' formmethod='post' type='submit' value='3'>
    <input name='4' formmethod='post' type='submit' value='4'>
    <input name='5' formmethod='post' type='submit' value='5'>
    <input name='all' formmethod='post' type='submit' value='all'>
</form>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Cost</th>
    <th>Category</th>
</tr>
<?php
foreach ($items as $key => $item) {
    if ($item["cat"] == $_SESSION["current_category"] || $_SESSION["current_category"] == "") {
echo "<tr>" . "<th>" . $item['id'] . "</th>";
    echo "<th><a href='item.php?action=get&id=" . $item["id"] . "&name=" . $item["name"] . "&cost=" . $item["cost"] . "&cat=" . $item["cat"] . "'" . ">" . $item['name'] . "</a></th>";
    echo "<th>" . $item['cost'] . "</th>";
    echo "<th>" . $item['cat'] . "</th>" . "</tr>";
}
}
?>
</table>
</div>
<div id='basket-container'>
    <?php
//    $_SESSION["basket"] = array(array("id" => 0, "name" => "item0", "cost" => 15, "amount" => 3),
//        array("id" => 1, "name" => "item1", "cost" => 25, "amount" => 1),
//        array("id" => 2, "name" => "item2", "cost" => 10, "amount" => 2),
//    );
//    $sum = 0;
//    unset($_SESSION['basket']);
    foreach ($_SESSION["basket"] as $item) {
        echo $item."<form action='basket_form.php?.id=".$item."'><input name='submit' formmethod='post' type='submit' value='del'></form>";
//        $sum += $item["cost"];
    }
//    echo $sum."<br />";
    if ($_SESSION["basket"])
        echo "<form action='basket_form.php?.id=".$item."'><input name='submit' formmethod='post' type='submit' value='order'></form>";
    ?>
</div>
</body>
</html>

<!--//Часть твоего кода закоментил, кое-что изменил для соединения со своим. Лучше не пробовать соеденить мои файлы измененные с предыдущими твоими и пользоваться этой версией кода-->
<!--//Сделано: корзина нормально функционирует. Есть заготовки для вывода заказов (они и выводятся - просто пока не полные). Завтра, думаю, добавим нормальное считывание с файла предметов и можно тогда будет кое-что доделать-->
<!--//Страничка логина готова (общая форма).-->