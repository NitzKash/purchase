<?php
	require 'base.php';
	require 'core.php';
	require 'connect.php';
	require 'session.php';
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>NIT Silchar purchase section database add</title>
	</head>
	
	<body>
		<div class="container">
			
			<br>

			<div class="row" id="edit">
					<div class="col-md-3" style="background:white;height:98%">
						<div class="list-group">
							<a href="logout.php" class="list-group-item">Logout</a>
						</div>
					</div>
					<div class="col-md-9" style="background:white ;height:98%">
						<div>
						<?php
							echo '<table class="table Table-hover">
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
												<th>Aproval</th>
												<th>Remarks</th>
											</tr>
										</thead>';
							if(isset($_POST['bill'])&&isset($_POST['array_search(needle, haystack)']))
							{
								$bill=$_POST['bill'];
								if(!empty($bill))
								{
									$query="SELECT * from `items` WHERE `build no and date`='$bill'";	
									$result=$con->query($query);
									if ($result->num_rows > 0) 
									{
		   								while($row = $result->fetch_assoc())  
		   								{
			      							  echo '<tr>
			       							  			<td><input type="checkbox" name="check[]" value="'.$row['build no and date'].'"/></td>
			       							  			<td>'.$row["sl no"].'</td>
			       							  			<td>'.$row["order no and date"].'</td>
			       							  			<td>'.$row["date of receipt"].'</td>
		       							  				<td>'.$row["build no and date"].'</td> 
		       							  				<td>'.$row["name of firm"].'</td>
		       							  				<td>'.$row["description"].'</td>
		       								  			<td>'.$row["quantity"].'</td>
		       								  			<td>'.$row["rate"].'</td>
		       								  			<td>'.$row["Aproval"].'</td>
		       								  			<td>'.$row["remarks"].'</td>
		       								  		</tr>';
		    							}
									}
								}
								
							}	
							else
							{
								echo 'nothing to display';
								//header('Location:index.php');
							}	
						?>
						</div>
						<form id="add_data" action='search.php' method='POST'>
							<div class='form-group'>
								<table class="table Table-hover">
									<tr>
										<td>Bill no and date: </td> 
										<td><input type="text" class="form-control" name="bill" class="form-control" > </td>
									</tr>
								</table>
							</div>
							<input type="submit" name="search" value="search"></input>
						</form>
					</div>
			</div>
			
		</div>
	</body>
	
	
</html>