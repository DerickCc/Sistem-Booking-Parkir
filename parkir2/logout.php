<?php
require "function.php";

session_destroy();
header('location: login.php');
?>