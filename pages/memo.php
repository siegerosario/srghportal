<h3 class="page-header">Memo</h3>

<table class="table table-bordered">
	<th>#</th>
	<th>Memo ID</th>
	<th>Date</th>
	<th>Subject</th>
	<th>Message</th>
	<tr>
		<?php
		$query = mysqli_query($con, "SELECT * FROM memorandum WHERE empid= $id");
		$ctr = 1;					
		while ($row = mysqli_fetch_array($query)) {?>
			<td><?php echo  $ctr ? $ctr++ : 0 ; ?></td>
			<td><?php echo $row['memoid']; ?></td>
			<td><?php echo date('F d, Y', strtotime($row['date'])); ?></td>
			<td><?php echo $row['subject']; ?></td>
			<td><?php echo $row['message']; ?></td><?php							
		}
		?>
	</tr>
</table>
