<?php
session_start();
require_once "functions.php";
echo "sessioen destroy";
session_destroy();
echo "You are logged out";
Redirect('login.php', false);
?>