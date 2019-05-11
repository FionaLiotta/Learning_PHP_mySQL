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
			$sql = "INSERT INTO liotip_users (user_name, user_email, password, user_status, user_data, reg_date)
			VALUES ('$_POST[user_name]', '$_POST[user_email]', '$_POST[password]', '$_POST[user_status]', '$_POST[user_data]', NOW())";

			if ($conn->query($sql) === TRUE) {
				echo "<h3>New record created successfully</h3>";
			} else {
				echo "<h3>Error: " . $sql . "<br>" . $conn->error . "</h3>";
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