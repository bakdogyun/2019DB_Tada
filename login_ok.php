<?php
session_start();
	$mysqli = new mysqli("localhost","sryu","2014101185","sryu");
	$phone = $_POST["phone"];
	$pw = $_POST['userpw'];

	$check = "select * from USER_INFO where Phone = '$phone'";
	$result = $mysqli->query($check);

	if(!empty($result)){
		$row = $result -> fetch_array(MYSQLI_ASSOC); // row에는 sql로 찾은 것들이 들어있다.
		if($row['PW'] == $pw && $row['Phone'] == $phone){
				 $_SESSION['Phone'] = $phone;
				 $_SESSION['Name'] = $row['Name'];
				 $_SESSION['Email'] = $row['Email'];
				 header('Location: ./main.php');
			 }
			 else{
				echo '<script>alert(\'아이디나 비밀번호가 틀렸습니다\');</script>';
				header("Refresh:0; url=login.html");
			 }
	}


?>
