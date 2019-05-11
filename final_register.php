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
		jQuery.validator.addMethod("letters", function(value, element){
			return /(?=.*[a-zA-Z])/.test(value);
		});
		jQuery.validator.addMethod("numbers", function(value, element){
			return /(?=.*[0-9])/.test(value);
		});
		jQuery.validator.addMethod("special", function(value, element){
			return /(?=.*[!@#$%^&*()_,.?:{}|<>])/.test(value);
		});
		$("#register").validate({
			errorClass:"error",
			rules: {
				user_name:{
					required:true,
					minlength:5,
					remote:{
						url: "validate.php",
						type: "post",
						dataFilter: function(data) {
							if(data == "Username Already Exists") {
								return false;
							} else {
								return true;
							}
						}
					}
				},
				user_email:{
					required:true,
					email:true,
					remote:{
						url: "validate.php",
						type: "post",
						dataFilter: function(data) {
							if(data == "Email Already Exists") {
								return false;
							} else {
								return true;
							}
						}
					}
				},
				password:{
					required:true,
					letters:true,
					numbers:true,
					special:true
				},
				confirm_password:{
					required:true,
					equalTo:'#password'
				}
			},
			messages: {
				user_name:{
					required:"User name required.",
					minlength:"Minimum length 5 characters.",
					remote:"User name already exists."
				},
				user_email:{
					required:"Email required.",
					email:"Must be a valid Email address.",
					remote:"Email already exists."
				},
				password:{
					required:"Password required.",
					letters:"Must contain a letter.",
					numbers:"Must contain a number.",
					special:"Must contain a special character."
				},
				confirm_password:{
					required:"Password confirmation required.",
					equalTo:"Passwords do not match."
				}
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
	<div class="col-10">
		<form id="register" action="submit_registration.php" method="post">
			<div class="form-group">
				<label>Name:</label>
				<input type="text" class="form-control" id="user_name" name="user_name"><span id="name_status"></span><br>
				<label>E-Mail:</label>
				<input type="text" class="form-control" id="user_email" name="user_email"><span id="email_status"></span><br>
				<label>Password:</label>
				<input type="password" class="form-control" id="password" name="password"><span id="password_status"></span><br>
				<label>Confirm Password:</label>
				<input type="password" class="form-control" id="confirm_password" name="confirm_password"><span id="confirm_password_status"></span><br>
				<label>Status:</label>
				<select class="form-control" name="user_status" required>
					<option value="user">User</option>
					<option value="admin">Admin</option>
				</select><br>
				<label>Comment:</label>
				<input type="text" class="form-control" name="user_data"><br>
				<button type="submit" class="btn btn-primary" name="register"><strong>Register</strong></button>
			</div>
		</form>
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