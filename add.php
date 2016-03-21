<?php
	require 'base.php';
	require 'core.php';
	require 'connect.php';
	if(!isset($_SESSION['user']['user_id']))
		header('Location:index.php');
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
							<!--<a href="add.php" class="list-group-item">Add</a>
							<a href="$" class="list-group-item">Select</a>
							<a href="$" class="list-group-item">Delete</a>
							<a href="$" class="list-group-item">Add user</a>-->
							<a href="logout.php" class="list-group-item">Logout</a>
						</div>
					</div>
					<div class="col-md-9" style="background:white ;height:98%">
						<?php
							if(isset($_POST['order'])&&isset($_POST['date'])&&isset($_POST['bill'])&&isset($_POST['firm'])&&isset($_POST['description'])&&isset($_POST['quantity'])&&isset($_POST['rate1'])&&isset($_POST['rate2'])&&isset($_POST['remarks']))
							{
								$order=$_POST['order'];
								$date=$_POST['date'];
								$bill=$_POST['bill'];
								$firm=$_POST['firm'];
								$description=$_POST['description'];
								$quantity=$_POST['quantity'];
								$rate1=$_POST['rate1'];
								$rate2=$_POST['rate2'];
								$remarks=$_POST['remarks'];
								
								if(!empty($order)&&!empty($date)&&!empty($bill)&&!empty($firm)&&!empty($description)&&!empty($quantity)&&!empty($rate1)&&!empty($rate2)&&!empty($remarks))
								{
									$rate=$rate1+(0.01*$rate2);
									$query="INSERT INTO `purchase`.`items` (`order no and date`,`date of receipt`,`build no and date`,`name of firm`,`description`,`quantity`,`rate`,`remarks`) VALUES ('$order','$date','$bill','$firm','$description','$quantity','$rate','$remarks')";			
									$flag=0;
									if($result = $con->query($query))									
									{
										$flag=1;
										$aprove_status=0;
										foreach($_POST['hod'] as $c)
										{
											if($c!="none")
											{	
												$query1="UPDATE `items` SET `$c`='1' WHERE `build no and date`='$bill'";
												if($result1 = $con->query($query1))
													$aprove_status++;
												else
													$flag=0;
											}
										}
										if($aprove_status==0)
										{
											$query2="UPDATE `items` SET `Aproval`='Aproved' WHERE `build no and date`='$bill'";
											if($result2=$con->query($query2));
											else
												$flag=0;
										}
										$query3="UPDATE `items` SET `aprove_status`='$aprove_status' WHERE `build no and date`='$bill'";
										if($result3=$con->query($query3));
										else
											$flag=0;
									}	
									if($flag===1)
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
										<td>Comitte: </td>
											<?php
												$sql="SELECT * FROM `aprover`";
												$result = $con->query($sql);		
												if ($result->num_rows > 0) 
												{
					   								while($row = $result->fetch_assoc()) 
					   								{
					   									echo '<td>';
						   									echo '
															<select name="hod[]">
																<option value="none">none</option>';
																$query="SELECT * FROM `aprover`";
																$result1=$con->query($query);
																while($row1 = $result1->fetch_assoc())
																	echo '<option value="'.$row1["Sl No"].'">'.$row1["Name"].'</option>';
															echo '</select>';
														echo '</td>';
													}
												}
											?> 
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