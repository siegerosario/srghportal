<?php 
	session_start();
	require_once 'connection.php';
	$sql = "SELECT * FROM geninfo INNER JOIN departments ON geninfo.deptid=departments.deptid WHERE empid='$_SESSION[id]'";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	$page = isset($_GET['page']) ? $_GET['page'] : 'index';
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web Portal</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fa/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/script.js" type="text/javascript"></script>
</head>
<body>
	<!-- nav container -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;Salve Regina General Hospital</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>&nbsp;Account&nbsp;<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#"><span class="glyphicon glyphicon-lock"></span>&nbsp;Change Password</a></li>
	            <li class="divider"></li>
	            <li><a href="../logout.php"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<!-- main container -->
	<div class="container" style="margin-top: 75px; margin-bottom: 50px;">
		<div class="row">
			<div class="col-md-3">
				<div class="sidebar">
					<!--
					<img src="../img/1.jpg" class="img-responsive img-thumbnail" alt=""><br>
					<strong>Name:</strong> <?php echo $row['surname'].', '.$row['given'].' '.$row['initial'] ?><br>
					<strong>Department:</strong> <?php echo $row['deptname'] ?><br>
					<strong>Sex:</strong> <?php echo $row['sex'] = 1 ? 'Male' : 'Female' ?><br>
					<strong>Tel No:</strong> <?php echo $row['telno'] ?><br>
					<strong>Date of Birth:</strong> <?php echo $row['dob'] ?><br>
					<strong>Age:</strong> <?php echo $row['age'] ?><br>
					<strong>Status:</strong> <?php echo $row['status'] ?><br>
					<strong>Dependents:</strong> <?php echo $row['dependents'] ?><br>
					<strong>Address:</strong> <?php echo $row['address'] ?><br>
					<strong>PAG-IBIG:</strong> <?php echo $row['pagibigno'] ?><br>
					<strong>PHILHEALTH:</strong> <?php echo $row['philhealthno'] ?><br>
					<strong>SSS:</strong> <?php echo $row['sssno'] ?><br>
					<strong>TIN:</strong> <?php echo $row['tinno'] ?><br>
					-->
					<img src="../img/1.jpg" class="img-responsive img-thumbnail" alt=""><br>
					<h3 class="no-margin-bottom"><?php echo $row['surname'].', '.$row['given'].' '.$row['initial'] ?></h3>
					<h5 class="no-margin-top"><?php echo $row['deptname'] ?> Department</h5>
					<table class="table table-no-border">
						<tbody>
							<tr>
								<td class="text-right"><strong>Gender:</strong></td>
								<td><?php echo $row['sex'] = 1 ? 'Male' : 'Female'; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>Tel. No:</strong></td>
								<td><?php echo $row['telno']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>Date of Birth:</strong></td>
								<td><?php echo date('F d, Y', strtotime($row['dob'])); ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>Age:</strong></td>
								<td><?php echo $row['age']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>Status:</strong></td>
								<td><?php echo $row['status']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>Dependents:</strong></td>
								<td><?php echo $row['dependents']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>Address:</strong></td>
								<td><?php echo $row['address']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>PAG-IBIG:</strong></td>
								<td><?php echo $row['pagibigno']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>PHILHEALTH:</strong></td>
								<td><?php echo $row['philhealthno']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>SSS:</strong></td>
								<td><?php echo $row['sssno']; ?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>TIN:</strong></td>
								<td><?php echo $row['tinno']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-9">
				<ul class="nav nav-tabs" role="tablist">
					<li class="<?php gen_active($page, 'index'); ?>"><a href="?page=index"><span class="glyphicon glyphicon-calendar"></span> Schedule</a></li>
					<li class="<?php gen_active($page, 'memo'); ?>"><a href="?page=memo"><span class="glyphicon glyphicon-file"></span>&nbsp;Memo</a></li>
					<li class="<?php gen_active($page, 'request'); ?>"><a href="?page=request"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Request</a></li>
					<!-- <li class="<?php gen_active($page, 'payslip'); ?>"><a href="?page=payslip"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Payslip</a></li> -->
				</ul>
				<?php 
					if ($page == 'index') {
				?>
					<h2 class="page-header">Schedule</h2>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Schedule ID</th>
								<th>Time In</th>
								<th>Time Out</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM schedule WHERE empid=$id";
							$query = mysqli_query($con, $sql);
							$ctr = 1;		
							$row = mysqli_fetch_array($query);
							if($row > 1)	
							{
								while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
								<td><?php echo  $ctr ? $ctr++ : 0 ; ?></td>
								<td><?php echo $row['scheduleid']; ?></td>
								<td><?php echo date('F d, Y (h:i A)', strtotime($row['scheddatetimein'])); ?></td>
								<td><?php echo date('F d, Y (h:i A)', strtotime($row['scheddatetimeout'])); ?></td>
								<?php if($row['restday'] == 1){ ?>
										<td><?php echo 'RestDay'; ?></td><?php
									  }else{ ?>
									  	<td></td>
								</tr>
								<?php }
								}
							}		

							?>
						</tbody>
					</table>
				<?php
					} else {
						$filename = "$page.php";
						if (is_readable($filename)) {
							@include_once "$filename";
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
	function gen_active($page, $link){
	    if ($page == $link){
	        echo "active";
	    } else {
	        echo "";
	    }
	}
	mysqli_close($con);
?>