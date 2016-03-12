<?php
include_once 'pages/connection.php';

$uname = isset($_POST['uname']) ? addslashes(trim($_POST['uname'])) : '';
$pwd = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';

if (isset($_POST['login'])) {
	$sql = "SELECT * FROM geninfo WHERE empid='$uname' AND password='$pwd'";
	$query = mysqli_query($con, $sql);
	if (mysqli_num_rows($query) == 1) {
		$row = mysqli_fetch_array($query);
		$_SESSION['id'] = $row['empid'];?>
		<script type="text/javascript">
			alert('Login Successful');
			window.location.href='pages/index.php';
		</script><?php
	} else {?>
		<script type="text/javascript">
			alert('Login Failed');
			window.location.href='';
		</script><?php		
	}
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<!-- nav container -->
	<nav class="container">
		
	</nav>
	<!-- main container -->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default"style="margin-top: 80px;">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;Login Page</h3>
					</div>
					<div class="panel-body">
						<form action="" method="post" role="form">
							<fieldset>
								<div class="form-group">
									<input type="text" class="form-control" name="uname" placeholder="User ID" value="<?php echo $uname ?>" autofocus required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox">&nbsp;Remember Me
									</label>
								</div>
								<input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.min.css"></script>
</body>
</html>