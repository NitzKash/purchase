<?php
	require 'base.php';
	require 'core.php';
	require 'connect.php';
	require 'session.php';
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>NIT Silchar purchase section database</title>
	</head>
	
	<body>
		<div class="container">
			
			<br>

			<div class="row" id="edit">
					<div class="col-md-3" style="background:white;height:98%">
						<div class="list-group">
							<a href="add.php" class="list-group-item">Add</a>
							<a href="$" class="list-group-item">Select</a>
							<a href="$" class="list-group-item">Delete</a>
							<a href="$" class="list-group-item">Add user</a>
							<a href="logout.php" class="list-group-item">Logout</a>
						</div>
					</div>
					<div class="col-md-9" style="background:white ;height:98%">
						<table class="table Table-hover">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Order no and Date</th>
									<th>Date of receipt</th>
									<th>Bill no and Date</th>
									<th>Name of Firm</th>
									<th>Description</th>
									<th>Quantity</th>
									<th>Rate</th>
									<th>Initials of HOD</th>
									<th>Aproval</th>
									<th>Remarks</th>
								</tr>
							</thead>
							<?php
								if ($con->connect_error) 
    								die("Connection failed: " . $con->connect_error);
								$sql = "SELECT * FROM `items`";
								$result = $con->query($sql);
								if ($result->num_rows > 0) 
								{
    								while($row = $result->fetch_assoc()) 
    								{
        							  echo "<tr>
        							  			<td>".$row["sl no"]."</td>
        							  			<td>".$row["order no and date"]."</td>
        							  			<td>".$row["date of receipt"]."</td>
        							  			<td>".$row["build no and date"]."</td> 
        							  			<td>".$row["name of firm"]."</td>
        							  			<td>".$row["description"]."</td>
        							  			<td>".$row["quantity"]."</td>
        							  			<td>".$row["rate"]."</td>
        							  			<td>".$row["initial of hod"]."</td>
        							  			<td>".$row["Aproval"]."</td>
        							  			<td>".$row["remarks"]."</td>
        							  			<td></td>
        							  		</tr>";
    								}
								}
								$con->close();
							?>
						</table>
					</div>
			</div>
					
			
		</div>
	</body>
	
	
</html>