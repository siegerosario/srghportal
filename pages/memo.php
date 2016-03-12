<h2 class="page-header">Memo</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Memo ID</th>
			<th>Date</th>
			<th>Subject</th>
			<th>Message</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = mysqli_query($con, "SELECT * FROM memorandum WHERE empid= $id");
		$ctr = 1;					
		while ($row = mysqli_fetch_array($query)) {?>
			<tr>
			<td><?php echo  $ctr ? $ctr++ : 0 ; ?></td>
			<td><?php echo $row['memoid']; ?></td>
			<td><?php echo date('F d, Y', strtotime($row['date'])); ?></td>
			<td><?php echo $row['subject']; ?></td>
			<td><?php echo $row['message']; ?></td>
			</tr>
		<?php							
		}
		?>
	</tbody>
</table>
