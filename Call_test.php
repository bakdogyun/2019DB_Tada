<?php
	$Car = $_POST["test"];
	$dstc = $_POST["dstc"];
	$DriPhone = $_POST["DriPhone"];


	$con = new mysqli("localhost", "sryu", "2014101185", "sryu");


	if (mysqli_connect_errno())
	{
		printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
    }
    else
    {
    	$sql = "SELECT LogID FROM LOG ORDER BY LogID DESC limit 1";

	    $result=mysqli_query($con,$sql);

	    $numrow = mysqli_num_rows($result);


	    $row=mysqli_fetch_array($result);

	    $LastID = $row[0];

	    $sql = "SELECT Fee FROM PRICE WHERE DSTC = ".$dstc.";";

	    $result=mysqli_query($con,$sql);
	    $numrow = mysqli_num_rows($result);
	    $row=mysqli_fetch_array($result);

	    $Fee = $row[0];


	    $sql = "UPDATE LOG
	            SET CarPlate = '".$Car."', Fee = ".$Fee.", Phone_Driver = '".$DriPhone."'
	            WHERE LogID = ".$LastID.";";

	    $result = mysqli_query($con, $sql);

	    mysqli_close($con);
	}
?>
