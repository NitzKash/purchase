<?php
	require 'base.php';
	require 'core.php';
	require 'connect.php';
	if(!isset($_SESSION['aprover']['user_id']))
		header('Location:index.php');
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>NIT Silchar purchase section aprover</title>
	</head>
	
	<body>
		<div class="row" id="edit">
					<div class="col-md-3" style="background:white;height:98%">
						<div class="list-group">
							<!--<a href="add.php" class="list-group-item">Add</a>
							<a href="$" class="list-group-item">Select</a>
							<a href="$" class="list-group-item">Delete</a>
							<a href="$" class="list-group-item">Add user</a>-->
							<a href="aprover.php" class="list-group-item">View</a>
							<a href="logout.php" class="list-group-item">Logout</a>
						</div>
					</div>
					<div class="col-md-9" style="background:white ;height:98%">
						<form role="form" method="POST" >
							<table class="table Table-hover">
								<thead>
									<tr>
										<th></th>
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
								</thead>
								<?php
									if ($con->connect_error) 
	    								die("Connection failed: " . $con->connect_error);
	    							$aprover_id=$_SESSION['aprover']['user_id'];

	    							if(!isset($_POST['aprove'])||!isset($_POST['check']))
	    							{
		    							$sql = "SELECT * FROM `items` WHERE `$aprover_id`='1' ";
										$result = $con->query($sql);		
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
									
									if(isset($_POST['aprove']) && $_SERVER['REQUEST_METHOD'] == "POST")
 									 {
 									 
										$flag=0;
										if(isset($_POST['check']))
										{
											foreach($_POST['check'] as $c)
											{
												$flag=1;
												$sql = "SELECT * FROM `items` WHERE `build no and date`='$c' ";
												$result = $con->query($sql);
												$row=$result->fetch_assoc();
												//$row1=implode($row);
												//echo $row1.' ';
												$aprove_s=(int)$row["aprove_status"];
												//echo $aprove_s.' ';
												$aprove_s-=1;
												////echo $aprove_s.'\n';
												$sql="UPDATE `items` SET `aprove_status`='$aprove_s', `$aprover_id`='0' WHERE `build no and date`='$c' ";
												
												//$a=0;$b=0;$c=0;
												//if($result=mysqli_query($con,$sql))
												if($con->query($sql));
													//$a=1;
												if($aprove_s==0)
												{
													$sql="UPDATE `items` SET `Aproval`='Aproved' WHERE `build no and date`='$c'";
													if($con->query($sql));
													//if($result=mysqli_query($con,$sql))
														//$b=1;
												}
												//echo $a.$b.$c.' ';
											}
										}

										if($flag==0)
											echo 'nothing selected to aprove';									
 									 }

									$con->close();
								?>
								<tr>
									<td>
										<br>
										<input type="submit" name="aprove" value="aprove" >
									</td>
								</tr>
						</table>
					</form>
				</div>
		</div>
	</body>
</html>