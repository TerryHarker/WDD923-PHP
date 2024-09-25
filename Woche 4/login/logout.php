<?php
// Logout Script
session_start();

unset( $_SESSION['username'] ); // username aus session löschen

header("Location: login-formular.php");

?>