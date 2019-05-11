<?php require('adminOnly.inc');?>

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
	<!--Main Content-->
	<div class="col-10">
	<?php
		require('SQL_Connect.inc');
		$sql = "SELECT * FROM liotip_users WHERE user_id = ".$_GET["user_id"];
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$user_id = $_GET["user_id"];
			$user_name = $row["user_name"];
			$email = $row["user_email"];
			$password = $row["password"];
			$user_status = $row["user_status"];
			$user_data = $row["user_data"];
			$reg_date = $row["reg_date"];

		echo"
			<div class='container bg_white'>
			<h2>Updating Record #$user_id</h2>
			<form action='update_data.php' method='post'>
			<div class='form-group'>
				<input type='hidden' class='form-control' name='user_id' value='$user_id' readonly><br>
				<label>User Name:</label>
				<input type='text' class='form-control' name='user_name' value='$user_name' required><br>
				<label>E-Mail:</label>
				<input type='text' class='form-control' name='email' value='$email' required><br>
				<label>Password:</label>
				<input type='text' class='form-control' name='password' value='$password' required><br>
				<label>User Status:</label>
				<input type='text' class='form-control' name='user_status' value='$user_status' required><br>
				<label>User Data:</label>
				<input type='text' class='form-control' name='user_data' value='$user_data' required><br>
				<label>Registration Date:</label>
				<input type='text' class='form-control' name='reg_date' value='$reg_date' readonly><br>
				<button type='submit' class='btn btn-primary' name='update'><strong>Update</strong></button>
			</div>
			</form>
		</div>
		";
			
		}
		$conn->close();
		?>
	</div>
	
	<div class="col-2 sidebar">
		<?php require("sidebar.inc");?>
	</div>

</div>
<div class="row">
	<?php require("footer.inc");?>
</div>
   </div>
<script>
	$(document).ready( function () {
		$('#navHome').addClass("active");
	} );
</script>
</body>

</html>