<?php
session_start();
?>
<html>
<head>
    <title>Item</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Category</th>
    </tr>
    <tr>
        <th><?php echo $_GET["id"]?></th>
        <th><?php echo $_GET["name"]?></th>
        <th><?php echo $_GET["cost"]?></th>
        <th><?php echo $_GET["cat"]?></th>
    </tr>
</table>
<form action="basket_form.php?<?php  echo 'id='.$_GET['id']?>">
    <input name='submit' formmethod='post' type='submit' value='add'>
</form>
</body>
</html>