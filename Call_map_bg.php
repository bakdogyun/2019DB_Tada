<?php
	$forLat = mt_rand(426766, 688812); //랜덤으로 유저의 위도설정
	$forLng = mt_rand(0, 408870); //랜덤으로 유저의 경도 설정

	$DecimalLat = "0.".$forLat; //위도 소수점 변환
	$DecimalLng = "0.".$forLng; //경도 소수점 변환

	$userLat = "37"+$DecimalLat; //유저 위도
    $userLng = "126.766875"+$DecimalLng; //유저 경도

    session_start();

	if(isset($_SESSION['Name'])){

		$Phone_user = $_SESSION['Phone'];

		$con = new mysqli("localhost","sryu","2014101185","sryu");
		mysqli_query ($con, 'SET NAMES utf8');


		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$sql = "SELECT * FROM USER_TRACKER WHERE Phone = '".$Phone_user."';";

	        $result=mysqli_query($con,$sql);
	        $numrow = mysqli_num_rows($result);

	        	for($i=0; $i<$numrow; $i++)		//행(ROW) 수 만큼
	            {
	            	$row[$i]=mysqli_fetch_array($result);     // mysql_fetch_array를 반복합니다.

	            }

	            for($i = 0; $i < $numrow; $i++)
	            {
	            	$userLAT = $row[$i]['Lat'];
	            	$userLNG = $row[$i]['Lng'];
	            }


			if($userLAT > "0"){




			$sql = "UPDATE USER_TRACKER
			SET Lat = '".$userLat."', Lng = '".$userLng."'
	        WHERE Phone = ".$Phone_user.";
	            						";
			$res = mysqli_query($con, $sql);

			mysqli_close($con);
			}else{

				$sql = "INSERT INTO USER_TRACKER
						VALUES ('$Phone_user','$userLat', '$userLng');";
			$res = mysqli_query($con, $sql);

			mysqli_close($con);
			}
		}

	}else{
		echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
	}
?>

<meta charset="utf-8" />
<meta http-equiv="refresh" content="0 url=./Call_map.php">
