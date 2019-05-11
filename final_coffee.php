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
			$sql = "SELECT * FROM liotip_coffee";
			#var_dump($sql);
			$result = $conn->query($sql);
			#var_dump($result);
			
			if ($result->num_rows > 0) {
				echo "<table id='coffeeTable' class='table' style='width:100%'>";
				echo "<thead>
					<tr class='table-header'>
						<th>Country</th>
						<th>Variety</th>
						<th>Roast</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
				";
				
				while($row = $result->fetch_assoc()){
					echo "
					<tr class='table-row'>
					<td>$row[country]</td>
					<td>$row[variety]</td>
					<td>$row[roast]</td>
					<td>$row[quantity]</td>
					</tr>
					";
				}
				echo "</tbody>";
				echo "</table>";
			} else {
				echo "<div class='row table-header'>No Data Found</div>";
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
		$('#navCoffee').addClass("active");
		$('#coffeeTable').DataTable();
	} );
</script>
</body>

</html>