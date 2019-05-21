<?php
session_start();

unset($_SESSION['userid']);

Header("Location: ../index.php");
 ?>
