<h3 class="page-header">Request</h3>
<!-- OT -->
OVERTIME REQUESTS
<table class="table table-bordered">
	<th>#</th>
	<th>Schedule</th>
	<th>Status</th>
	<th>Date of Request</th>
	<tr>
		<?php 
		$query = mysqli_query($con, "SELECT schedule.scheduleddatetimein, status, date FROM overtime INNER JOIN schedule WHERE schedule.scheduleid = overtime.scheduleid AND overtime.empid = '$id';");
		$ctr = 1;					
		while ($row = mysqli_fetch_array($query)) {?>
			<td><?php echo  $ctr ? $ctr++ : 0 ; ?></td>
			<td><?php echo $row['scheduleddatetimein'] ?></td>
			<td><?php echo $row['status'] ?></td>
			<td><?php echo $row['date'] ?></td><?php							
		}
		?>
	</tr>
</table>
LEAVE REQUESTS
<table class="table table-bordered">
	<th>#</th>
	<th>Schedule</th>
	<th>Status</th>
	<th>Date of Request</th>
	<tr>
		<?php 
		$query = mysqli_query($con, "SELECT schedule.scheduleddatetimein, status, date FROM sickleave INNER JOIN schedule WHERE schedule.scheduleid = sickleave.scheduleid AND sickleave.empid= '$id';");
		$ctr = 1;					
		while ($row = mysqli_fetch_array($query)) {?>
			<td><?php echo  $ctr ? $ctr++ : 0 ; ?></td>
			<td><?php echo $row['scheduleddatetimein'] ?></td>
			<td><?php echo $row['status'] ?></td>
			<td><?php echo $row['date'] ?></td><?php							
		}
		?>
	</tr>
</table>
<button class="btn btn-primary" data-toggle="modal" data-target="#modal">New Request</button>
<div id="modal" class="modal fade" data-role="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">Title</div>
			<div class="modal-body">
				Type of Request:
				<select name="type" class="form-control">
					<option value="" selected disabled>Choose an option...</option>
					<option value="1">Overtime</option>
					<option value="2">Leave</option>
				</select>
				<br>
				Schedule of Time-In:				
				<select name="sched" class="form-control">
					<option value="" selected disabled>Choose an option...</option>
					<?php 
					$date = date('Y-m-d', strtotime('+3 days'));
					$sql = "SELECT scheddatetimein FROM schedule WHERE scheddatetimein>='$date' AND empid=$id";
					$query = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($query)) {
					 	echo '<option value="' . $row['scheddatetimein'] . '">' . date('F d, Y (h:i A)', strtotime($row['scheddatetimein'])) . '</option>';
					 } 
					?>
				</select>
				<div id="hours-block" class="hidden">
					<br>
					Hours:
					<input class="form-control" type="number" name="hours">
				</div>
			</div>;
			<div class="modal-footer text-right">
				<button class="btn btn-success" data-toggle="modal" data-target="#modal">Send</button>
				<?php
					if(isset($_POST['send']))
					{
						echo $type = isset($_POST['type']);
					}
				?>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('select[name="type"]').change(function() {
			if(this.value == '1') {
				$('div#hours-block').removeClass('hidden');
			} else {
				$('div#hours-block').addClass('hidden');
			}
		});
	});
</script>