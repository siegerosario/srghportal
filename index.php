<?php 
session_start();
if (!isset($_SESSION['payrolluser'])) {
	include_once 'login.php';
} else {
	header('location: pages/index.php');
}
?>