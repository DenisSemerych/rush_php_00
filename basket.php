<?php
session_start();
function addToBasket($id){
    if ($_SESSION['basket'][$id]) {
        $_SESSION['basket'][$id]['count'] += 1;
    } else {
        $_SESSION['basket'][$id] = $id;
    }
}
function delFromBasket($id) {
   unset($_SESSION['basket'][$id]);
}
function addToOrders() {
    if ($_SESSION['logged_in_user']) {
        $orders = unserialize("./private/".$_SESSION['logged_in_user']);
        foreach ($_SESSION['basket'] as $item) {
            $orders[] = $item;
        }
        file_put_contents("./private/".$_SESSION['logged_in_user'], serialize($orders));
        unset($_SESSION['basket']);
    } else {
        header("Location: login.html");
    }
}

//Read from item file;