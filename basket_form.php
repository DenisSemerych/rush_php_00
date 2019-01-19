<?php
session_start();
include ("basket.php");
if ($_POST['submit'] == 'add') {
    addToBasket($_GET['id']);
} elseif ($_POST['submit'] == 'del') {
    delFromBasket($_GET['_id']);
} elseif ($_POST['submit'] == 'order') {
    addToOrders();
}
header("Location: index.php");
