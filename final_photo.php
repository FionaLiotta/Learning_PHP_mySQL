<?php 
	$errMsg = "";
if(isset($_POST['upload'])){
	$uploadOK = 1;
	$imgDir = "userPhotos/";
	$imgName = $imgDir . basename($_FILES["fileToUpload"]["name"]);
	$imgFiletype = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
	$isImage = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	
	if($isImage == false){
		$uploadOK = 0;
		$errMsg .= "File is not an image.<br>";
	}
	
	if(file_exists($imgName)){
		$uploadOK = 0;
		$errMsg .= "File exists.<br>";		
	}
	
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		$uploadOk = 0;
		$errMsg .= "File larger than 5MB.<br>";
		
	}
	if($imgFiletype != "jpg" && $imgFiletype != "png" && $imgFiletype != "jpeg" && $imgFiletype != "gif" ){
		$uploadOK = 0;
		$errMsg .= "Only JPG, JPEG, PNG, and GIF images allowed.";
	}
	
	if($uploadOK == 1){
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imgName);
		$errMsg .= "File uploaded.";
	}
}

	
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
	<!--Main Content-->
	<div class="col-10">
		<h2>Upload a Photo</h2>
		<h3><?php echo $errMsg ?></h3>
		<div class="row">
			<div class="col-2">
			</div>
			
			<div class="col-8 text-center">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
					<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
					<button type="submit" class="btn btn-primary" name="upload">Upload Image</button>
				</form>
			</div>
			
			<div class="col-2">
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 text-center">
			<br>
			<?php
				$fileList = scandir("userPhotos/");
				foreach($fileList as $token){
					if(!is_dir($token)){
						echo "<img class=\"col-6 img-fluid img-container\" src=\"userPhotos/$token\">";
					}
				}
			?>
			</div>
		</div>
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
		$('#navPhoto').addClass("active");
	} );
</script>
</body>

</html>