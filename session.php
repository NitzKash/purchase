<?php
	if((!isset($_SESSION['user']['user_id'])||empty($_SESSION['user']['user_id']))&&(!isset($_SESSION['aprover']['user_id'])||empty($_SESSION['aprover']['user_id']))&&(!isset($_SESSION['displayer']['user_id'])||empty($_SESSION['displayer']['user_id'])))
	{
		header('Location:index.php');
	}
?>