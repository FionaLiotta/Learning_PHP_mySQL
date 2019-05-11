<?php 
	require('adminOnly.inc');
	$updateMsg = "";
	if(isset($_POST['updateCoffee'])){
		require('SQL_Connect.inc');
		$country = $_POST['country'];
		$variety = $_POST['variety'];
		$roast = $_POST['roast'];
		$quantity = $_POST['quantity'];
		$sql = "INSERT INTO liotip_coffee (country, variety, roast, quantity) VALUES ('$country', '$variety', '$roast', '$quantity')";

		if ($conn->query($sql) === TRUE) {
			$updateMsg .= "Added $country $variety $roast $quantity lbs to DB.<br>";
		} else {
			$updateMsg .= "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
	} //end update coffee
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
		<?php print("<h3>$updateMsg</h3>"); ?>
		<h2>Add coffee product:</h2>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="form-row">
				<div class="col-md-4">
					<label>Country:</label>
					<input type="text" class="form-control" name="country" required>
				</div>
				
				<div class="col-md-4">
					<label>Variety:</label>
					<input type="text" class="form-control" name="variety" required>
				</div>			
				
				<div class="col-md-2">
					<label>Roast Type:</label>
					<select class="form-control" name="roast" required> 
						<option value="Green">Green</option>
						<option value="Blond">Blond</option>
						<option value="City">City</option>
						<option value="CityPlus">City+</option>
						<option value="FullCity">Full City</option>
						<option value="FullCityPlus">Full City+</option>
						<option value="French">French</option>
					</select>
				</div>
				
				<div class="col-md-2">
					<label>Quantity:</label>
					<input type="text" class="form-control" name="quantity" required> <br>
				</div>
				<br>
				<button type="submit" class="btn btn-primary" name="updateCoffee">Submit</button>
			</div>
		</form>
		
		<h3><a href="final_edit_users.php">Edit Users</a></h3>
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