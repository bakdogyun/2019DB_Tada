<?php
	$rate = $_POST["rate"];
	$timeout = date("H:i:s")."<br/>";

	$con = new mysqli("localhost", "sryu", "2014101185", "sryu");

	if($rate=='')
	{
		printf("<script>alert('점수를 입력해주세요!');</script>");
		header("Refresh:0; url=Call_after.php");
		exit();
	}
	else
	{
		if(mysqli_connect_errno())
		{
			printf("Connect failed: %s\n", mysqli_connect_error());
    	    exit();
    	}
    	else
    	{
    		$sql = "SELECT LogID FROM LOG ORDER BY LogID DESC limit 1";
    		$result=mysqli_query($con,$sql);
	       	$numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인합니다.

	        $row=mysqli_fetch_array($result);

	        $LastID = $row[0];

	        $sql = "UPDATE LOG
	            	SET Rate = '".$rate."' , TimeOut = '".$timeout."'
	            	WHERE LogID = ".$LastID.";
	            	";

	        $result = mysqli_query($con, $sql);

	        mysqli_close($con);
	    }

	    header("Refresh:0; url=main.php");
	}
?>

<meta charset="utf-8" />
