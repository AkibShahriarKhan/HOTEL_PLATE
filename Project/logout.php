<?php 
session_start();//Even when destroying a session we need to use this line;
unset($_SESSION['cartItemsAndQuantity']);
session_destroy();
$_SESSION = NULL;
//setcookie('username', 'logout', time()+86400);//this line is only for testing do not uncomment
header("location:index.php");
?>