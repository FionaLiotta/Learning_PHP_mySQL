<?php require('adminOnly.inc') ?>
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
		
		$user_id = $_POST["user_id"];
		$user_name = $_POST["user_name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$user_status = $_POST["user_status"];
		$user_data = $_POST["user_data"];
		$reg_date = $_POST["reg_date"];

		$sql = "UPDATE liotip_users SET user_name='$user_name', user_email='$email', password='$password', user_status='$user_status', user_data='$user_data', reg_date='$reg_date' WHERE user_id='$user_id'";

		if ($conn->query($sql) === TRUE) {
			echo "<h3>Record number $user_id updated successfully. <a href='final_edit_users.php'>Click here to go back.</a></h3>";
		} else {
			echo "Error updating record: " . $conn->error;
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
		$('#navAdmin').addClass("active");
	} );
</script>
</body>

</html>