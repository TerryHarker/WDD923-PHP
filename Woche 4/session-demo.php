<?php
/**
 * SESSION DEMO SCRIPT
 */
session_start(); // Sessionzugriff eröffnen

$_SESSION['username'] = 'Terry';

print_r($_SESSION);
?>