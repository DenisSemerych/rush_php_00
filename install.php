<?php
$test_items = [];
for ($i = 0; $i < 15; $i++) {
    $test_items[] = array("id" => $i, "name" => "item" . $i, "cost" => rand(1, 15), "cat" => rand(1, 5));
}
$cats = array("1", "2", "3", "4", "5");
session_start();
//mkdir("private", 0755);
file_put_contents("data/items", serialize($test_items));
//file_put_contents("data/user_cache", "");
file_put_contents("private/users", "");