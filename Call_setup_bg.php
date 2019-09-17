<?php
	$place = $_POST["place"];
	session_start();

	if(isset($_SESSION['Name']))
	{

		$date =  date("Y-m-d")."<br/>";
		$timein = date("H:i:s")."<br/>";
		$Phone_user = $_SESSION['Phone'];

		$mysqli = new mysqli("localhost","sryu","2014101185","sryu");
		mysqli_query ($mysqli, 'SET NAMES utf8');

		if($place=='')
		{
			printf("<script>alert('목적지를 입력해주세요!');</script>");
			header("Refresh:0; url=Call_setup.php");
			exit();
		}
		else
		{
			if (mysqli_connect_errno())
			{
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			else
			{
				$sql = "INSERT INTO LOG (Date, TimeIn, Phone_user) VALUES ('$date', '$timein', '$Phone_user');";
				$res = mysqli_query($mysqli, $sql);

				mysqli_close($mysqli);
			}
			header("Refresh:0; url=Call_map_bg.php");
		}


	}
	else
	{
		echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
	}



?>

<meta charset="utf-8" />
