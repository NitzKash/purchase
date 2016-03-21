<?php
	require 'base.php';
	require 'core.php';
	require 'connect.php';

	if(isset($_SESSION['user']['user_id'])&&!empty($_SESSION['user']['user_id']))
		header('Location:edit.php');

	if(isset($_SESSION['aprover']['user_id'])&&!empty($_SESSION['aprover']['user_id']))
		header('Location:aprover.php');


?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>NIT Silchar purchase section</title>
	</head>
	
	<body>
		<div class="container">
			
			<div class="row" id="body">
				<div class="col-md-9">
					<img class="img-thumbnail" src="purchase.jpg" height="400px" width="300px" style="margin:10px;float:left;"/>
					<div style="color:#262626;font-size:15px;text-align:justify;font-family:Arial;margin:10px;float:clear;">
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
						Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>

						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
						molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
					</div>
				</div>


				<div class="col-md-3" style="margin-top:10px;border:0.5px solid #999999;border-radius:3px;padding:10px;width:24%;">
					
					<?php
						if(isset($_POST['uName'])&&isset($_POST['uPwd']))
						{
							$username=$_POST['uName'];
							$password=$_POST['uPwd'];
							if(!empty($username)&&!empty($password))
							{
								$pass=md5($password);
								$query="SELECT `id` FROM `users` WHERE `name`='$username' && `password`='$pass'";
								if($query_run=mysqli_query($con,$query))
								{
									$query_run_rows=mysqli_num_rows($query_run);
									if($query_run_rows!=0)
									{
										$row = mysqli_fetch_assoc($query_run);
    									$user_id = $row['id'];
    									
										$_SESSION['user']['user_id']=$user_id;
										header('Location:edit.php');
									}
									else
									{
										echo 'missmatch';
										
									}
							
								}
								else
										echo 'querry failed';
								
							}
							else
							{
								echo 'please enter values:';
								
							}
						}
					?>

					<form role="form" method="POST" action="index.php">
						<div style="background:#262626;font-size:20px;color:white;text-align:center;width:100%;height:35px;margin-bottom:5px;padding:2px;">LOGIN</div>
						<div class="form-group">
					    	<label for="username">Username:</label>
					    	<input type="text" class="form-control" id="uName" name="uName" style="height:30px;">
			            </div>
						<div class="form-group">
						    <label for="pwd">Password:</label>
						    <input type="password" class="form-control" id="uPwd" name="uPwd" style="height:30px;">
						 </div>
						 <button type="submit" id="button" class="btn btn-default">Submit</button>
					</form>
				</div>

				<div class="col-md-3" style="margin-top:10px;border:0.5px solid #999999;border-radius:3px;padding:10px;width:24%;">
					<?php
						if(isset($_POST['aName'])&&isset($_POST['aPwd']))
						{
							$username=$_POST['aName'];
							$password=$_POST['aPwd'];
							if(!empty($username)&&!empty($password))
							{
								$pass=md5($password);
								$query="SELECT `Sl No` FROM `aprover` WHERE `name`='$username' && `password`='$pass'";
								if($query_run=mysqli_query($con,$query))
								{
									$query_run_rows=mysqli_num_rows($query_run);
									if($query_run_rows!=0)
									{
										$row = mysqli_fetch_assoc($query_run);
    									$user_id = $row['Sl No'];
    									
										$_SESSION['aprover']['user_id']=$user_id;							
										header('Location:aprover.php');
									}
									else
									{
										echo 'missmatch';
										
									}
							
								}
								else
										echo 'querry failed';
								
							}
							else
							{
								echo 'please enter values:';
								
							}
						}
					?>

					<form role="form" method="POST" action="index.php">
						<div style="background:#262626;font-size:20px;color:white;text-align:center;width:100%;height:35px;margin-bottom:5px;padding:2px;">Aprover LOGIN</div>
						<div class="form-group">
					    	<label for="username">Username:</label>
					    	<input type="text" class="form-control" id="aName" name="aName" style="height:30px;">
			            </div>
						<div class="form-group">
						    <label for="pwd">Password:</label>
						    <input type="password" class="form-control" id="aPwd" name="aPwd" style="height:30px;">
						 </div>
						 <button type="submit" id="button" class="btn btn-default">Submit</button>
					</form>
				</div>


				<div class="links" style="margin-top:30px;width:25%;float:right;">
						<a href="http:\\www.nits.ac.in" ><div style="margin-top:5px;margin-right:3%;border-radius:2px;height:35px;background:#85adad;padding:3px;color:white;font-size:18px;text-align:center;">NIT SILCHAR</div><a>
						<a href="http://localhost/purchase/edit.php" ><div style="margin-top:5px;margin-right:3%;border-radius:2px;height:35px;background:#E73838;padding:3px;color:white;font-size:18px;text-align:center;">DATABASE</div>
						<div style="margin-top:5px;margin-right:3%;border-radius:2px;height:35px;background:#6699ff;padding:3px;color:white;font-size:18px;text-align:center;">CONTACT US</div>
						<div style="margin-top:5px;margin-right:3%;border-radius:2px;height:35px;background:#85adad;padding:3px;color:white;font-size:18px;text-align:center;">ABOUT US</div>
				</div>

				
			</div>
			
		</div>
	</body>
	
</html>