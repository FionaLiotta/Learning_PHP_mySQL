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

			// sql to create table
			$sql = "DELETE FROM liotip_users WHERE user_id = $_GET[user_id];";

			if ($conn->query($sql) === TRUE) {
				echo "<h3>User $_GET[user_id] deleted successfully. <a href='final_edit_users.php'>Click here to go back.</a><h3>";
			} else {
				echo "<h3>Error deleting row: " . $conn->error . "</h3>";
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