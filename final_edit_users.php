<?php 
	require('adminOnly.inc');
?>
<!doctype html>
<html>
<head>
<!--
    BCS350 Final Project
    Fiona Liotta
-->
   <meta charset="utf-8" />
   <title>Chiaroscuro Coffee</title> 
	<?php require('final_scripts.inc');?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	
</head>

<body>
<div class="container">
<div class="row">
	<div>
      <?php require('navbar.inc');?>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<?php
			require("SQL_Connect.inc");

			$sql = "SELECT * FROM liotip_users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

			echo "<table id='userTable' class='table' style='width:100%'>";
			echo "<thead class='table-header'>
					<tr>
					<th>ID</th>
					<th>Username</th>
					<th>E-mail</th>
					<th>Password</th>
					<th>Status</th>
					<th>Data</th>
					<th>Reg Date</th>
					<th></th>
					<th></th>
					<th></th>
					</tr>
				</thead>
				<tbody>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr class='table-row'>
					";
					echo "<td>". $row["user_id"] . "</td>
					";
					echo "<td>". $row["user_name"]."</td>
					";
					echo "<td>". $row["user_email"]."</td>
					";
					echo "<td>". $row["password"] . "</td>
					";
					echo "<td>". $row["user_status"] . "</td>
					";
					echo "<td>". $row["user_data"] . "</td>
					";
					echo "<td>". $row["reg_date"] . "</td>
					";
					echo "<td> <a href='edit_user.php?user_id=".$row["user_id"]."'><i class=\"fas fa-user-edit\"></i></a> </td>
					";
					echo "<td> <a href='final_register.html'><i class=\"fas fa-user-plus\"></i></a> </td>
					";
					echo "<td> <a href='delete_user.php?user_id=".$row["user_id"]."'><i class=\"fas fa-user-times\"></i></a> </td>
					";
					echo "</tr>
					";
				}
			echo "</tbody></table>";
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</div>

</div>
<div class="row">
	<?php require("footer.inc");?>
</div>
   </div>
<script>
	$(document).ready( function () {
		$('#navAdmin').addClass('active');
		$('#userTable').DataTable();
	} );
</script>
</body>

</html>