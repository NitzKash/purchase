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
							<a href="add.php" class="list-group-item">Add</a>
							<a href="$" class="list-group-item">Select</a>
							<a href="$" class="list-group-item">Delete</a>
							<a href="$" class="list-group-item">Add user</a>
							<a href="logout.php" class="list-group-item">Logout</a>
						</div>
					</div>
					<div class="col-md-9" style="background:white ;height:98%">
						<?php
							if(isset($_POST['order'])&&isset($_POST['date'])&&isset($_POST['bill'])&&isset($_POST['firm'])&&isset($_POST['description'])&&isset($_POST['quantity'])&&isset($_POST['rate1'])&&isset($_POST['rate2'])&&isset($_POST['hod'])&&isset($_POST['remarks']))
							{
								$order=$_POST['order'];
								$date=$_POST['date'];
								$bill=$_POST['bill'];
								$firm=$_POST['firm'];
								$description=$_POST['description'];
								$quantity=$_POST['quantity'];
								$rate1=$_POST['rate1'];
								$rate2=$_POST['rate2'];
								$hod=$_POST['hod'];
								switch($hod)
								{
									case "Sambhu":			$aprove_status=1;
															break;
									case "Ripon Patgiri": 	$aprove_status=2;
														 	break;
									case "Nidul Sinha": 	$aprove_status=3;
															break;
									case "N.V. Deshpande":  $aprove_status=4;
															break;
								}

								$remarks=$_POST['remarks'];
								
								if(!empty($order)&&!empty($date)&&!empty($bill)&&!empty($firm)&&!empty($description)&&!empty($quantity)&&!empty($rate1)&&!empty($rate2)&&!empty($hod)&&!empty($aprove_status)&&!empty($remarks))
								{
									$rate=$rate1+(0.01*$rate2);	
									switch($aprove_status)
									{	
										case 1: $query="INSERT INTO `purchase`.`items` (`order no and date`,`date of receipt`,`build no and date`,`name of firm`,`description`,`quantity`,`rate`,`initial of hod`,`aprove_status`,`1`,`remarks`) VALUES ('$order','$date','$bill','$firm','$description','$quantity','$rate','$hod','$aprove_status','2','$remarks')";
											break;
										case 2: $query="INSERT INTO `purchase`.`items` (`order no and date`,`date of receipt`,`build no and date`,`name of firm`,`description`,`quantity`,`rate`,`initial of hod`,`aprove_status`,`1`,`2`,`remarks`) VALUES ('$order','$date','$bill','$firm','$description','$quantity','$rate','$hod','$aprove_status','2','1','$remarks')";
											break;
										case 3: $query="INSERT INTO `purchase`.`items` (`order no and date`,`date of receipt`,`build no and date`,`name of firm`,`description`,`quantity`,`rate`,`initial of hod`,`aprove_status`,`1`,`2`,`3`,`remarks`) VALUES ('$order','$date','$bill','$firm','$description','$quantity','$rate','$hod','$aprove_status','2','1','1','$remarks')";
											break;							
										case 4: $query="INSERT INTO `purchase`.`items` (`order no and date`,`date of receipt`,`build no and date`,`name of firm`,`description`,`quantity`,`rate`,`initial of hod`,`aprove_status`,`1`,`2`,`3`,`4`,`remarks`) VALUES ('$order','$date','$bill','$firm','$description','$quantity','$rate','$hod','$aprove_status','2','1','1','1','$remarks')";
											break;
									}
									if($query_run=mysqli_query($con,$query))									
										echo 'Data entry succesful';
									else
										echo 'querry failed';
									
								}
								else
								{
									echo 'please enter values:';
									//header('Location:index.php');
								}
							}
							
						?>
						<form id="add_data" action='add.php' method='POST'>
							<div class='form-group'>
								<table class="table Table-hover">
									<tr>
										<td>Order no and date: </td> 
										<td><input type="text" class="form-control" name="order" class="form-control" > </td>
									</tr>
									<tr>
										<td>Date: </td>
										<td><input type="date" class="form-control" name="date"></td>
									</tr>
									<tr>
										<td>Bill no and date: </td>
										<td><input type="text" class="form-control" name="bill" class="form-control"></td>
									</tr>
									<tr>
										<td>Name of firm: </td>
										<td><input type="text" class="form-control" name="firm" class="form-control"></td>
									</tr>
									<tr>
										<td>Description: </td>
										<td><textarea name="description" class="form-control" col='4' row='3'></textarea></td>
									</tr>
									<tr>
										<td>Quantity: </td>
										<td><input type="number" name="quantity" class="form-control"></td>
									</tr>
									<tr>
										<td>Rate: </td>
										<td>
											<table>
												<tr>
													<td><strong>Rs</strong> </td>
													<td><input type="number"  name="rate1" class="form-inline" style="width:200px;height:35px;"> </td>
													<td><strong>Paise</strong> </td>
													<td><input style="width:200px;height:35px;" type="number" name="rate2" class="form-inline"></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>Initial of HOD: </td>
										<td>
											<select name="hod">
												<option value="Sambhu">Sambhu</option>
			  									<option value="Ripon Patgiri">Ripon Patgiri</option>
			 									<option value="Nidul Sinha">Nidul Sinha</option>
												<option value="N.V. Deshpande">N.V. Deshpande</option>
											</select> 
										</td>
									</tr>
									<tr>
										<td>Remarks: </td>
										<td><input type="text" class="form-control" name="remarks" class="form-control"></td>
									</tr>
								</table>
							</div>
							<button type="submit" id="button">Submit</button>
						</form>
					</div>
			</div>
			
		</div>
	</body>
	
	
</html>