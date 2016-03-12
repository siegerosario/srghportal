<h2 class="page-header">Request<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal">New Request</button></h2>
<!-- OT -->
OVERTIME REQUESTS
<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Schedule</th>
			<th>Status</th>
			<th>Date of Request</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query = mysqli_query($con, "SELECT schedule.scheddatetimein, status, `date` FROM overtime INNER JOIN schedule WHERE schedule.scheduleid=overtime.scheduleid AND overtime.empid='$id'");
		$ctr = 1;					
		while ($row = mysqli_fetch_array($query)) {?>
			<tr>
			<td><?php echo  $ctr ? $ctr++ : 0 ; ?></td>
			<td><?php echo date('F d, Y (h:i A)', strtotime($row['scheddatetimein'])); ?></td>
			<td><?php echo ucfirst(strtolower($row['status'])); ?></td>
			<td><?php echo date('F d, Y', strtotime($row['date'])); ?></td>
			</tr>
		<?php							
		}
		?>
	</tbody>
</table>
LEAVE REQUESTS
<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Schedule</th>
			<th>Status</th>
			<th>Date of Request</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query = mysqli_query($con, "SELECT schedule.scheddatetimein, status, date FROM sickleave INNER JOIN schedule WHERE schedule.scheduleid=sickleave.scheduleid AND sickleave.empid='$id'");
		$ctr = 1;					
		while ($row = mysqli_fetch_array($query)) {?>
			<tr>
			<td><?php echo  $ctr ? $ctr++ : 0 ; ?></td>
			<td><?php echo date('F d, Y (h:i A)', strtotime($row['scheddatetimein'])) ?></td>
			<td><?php echo ucfirst(strtolower($row['status'])); ?></td>
			<td><?php echo date('F d, Y', strtotime($row['date'])) ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<div id="modal" class="modal fade" data-role="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="request-form">
				<div class="modal-header">
					<h4 class="modal-title">Request Status</h4>
				</div>
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
						$sql = "SELECT scheduleid, scheddatetimein FROM schedule WHERE scheddatetimein>='$date' AND empid=$id ORDER BY scheddatetimein";
						$query = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_array($query)) {
						 	echo '<option value="' . $row['scheduleid'] . '">' . date('F d, Y (h:i A)', strtotime($row['scheddatetimein'])) . '</option>';
						 } 
						?>
					</select>
					<div id="hours-block" class="hidden">
						<br>
						Hours:
						<input class="form-control" type="number" min="0" name="hours" value="0">
					</div>
				</div>;
				<div class="modal-footer text-right">
					<input type="submit" class="btn btn-success" value="Send">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="prompt-modal" class="modal fade" data-role="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body"></div>
			<div class="modal-footer"></div>
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

		$('#request-form').submit(function() {
			var data = $(this).serialize();

			closeModal('modal');
			openModal('prompt-modal', 'static');

			$.ajax({
				url: 'requests/new_request.php',
				method: 'POST',
				data: data,
				success: function(response) {
					setModalHtmlContent('prompt-modal', '<h4>Request Status</h4>', '<p>' + response + '</p>', '');

					setTimeout(function() {
						closeModal('prompt-modal');

						window.location = "";
					}, 1500);
				}
			});

			return false;
		});
	});
</script>