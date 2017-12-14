<?php 
    session_start();//Even when destroying a session we need to use this line;
    session_destroy();
    $_SESSION = NULL;
    echo "loggedout";
?>