<?php
	session_start();
	$loginMsg = "";
	if(isset($_POST['logout'])) {
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		unset($_SESSION['role']);
	
		$loginMsg = 'Logged out.';
	} else if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){
			require('SQL_Connect.inc');
			$sql = "SELECT * FROM liotip_users WHERE user_name = '$_POST[username]' AND password = '$_POST[password]';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$_SESSION['username'] = $row['user_name'];
				$_SESSION['role'] = $row['user_status'];
				$loginMsg = "User $_SESSION[username] logged in.";
			} else {
				$loginMsg = "Invalid user.";
			}
	} //if
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
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script type="text/javascript">
/* Fire Validate */
	$(document).ready(function(){
		$("#login").validate({
			errorClass:"error",
			rules: {
				username:{ required:true},
				password:{ required:true}
			},
			messages: {
				username: {required:"Username required."},
				password: {required:"Password required."}
			}
		  });
	});
</script>
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
	<div class="col-10 text-center">
		<h3><?php echo $loginMsg?></h3>
		<form id="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="form-group loginWrapper">
				<label for="username">Username:</label>
				<input type="text" class="form-control" name="username" required><br>
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="password" required><br>
				<button type="submit" class="btn btn-primary" name="login">Login</button>
				</form><br><br>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<button type="submit" class="btn btn-secondary" name="logout">Logout</button>
				</form>
			</div>

		<h3><a href="final_register.php">Register New User</a></h3>
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
		$('#navLogin').addClass("active");
	} );
</script>
</body>

</html>