<?php 
session_start();
session_unset($_SESSION['id']);
?>
<script>
	alert('Logged Out');
	window.location.href="index.php";
</script>