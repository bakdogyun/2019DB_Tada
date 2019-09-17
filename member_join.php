<?php
	$phone = $_POST['phone'];
	$userpw = $_POST['userpw'];
	$username = $_POST['name'];
	$email = $_POST['email'];
	$userpw = $_POST['userpw'];
	$mysqli = new mysqli("localhost","sryu","2014101185","sryu");




mysqli_query ($mysqli, 'SET NAMES utf8');

if($phone=='')
	{
		printf("<script>alert('번호를 입력해주세요!');</script>");
		header("Refresh:0; url=member.php");
		exit();
	}
	else{
		if($userpw=='')
	{
		printf("<script>alert('비밀번호를 입력해주세요!');</script>");
		header("Refresh:0; url=member.php");
		exit();
	}
	else{

		if($username=='')
	{
		printf("<script>alert('이름을 입력해주세요!');</script>");
		header("Refresh:0; url=member.php");
		exit();
	}
	else{
if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
} else {



		$check =  "select * from USER_INFO where Phone = '$phone'";

		$result = $mysqli->query($check);
		$row = $result -> fetch_array(MYSQLI_ASSOC);
		  if($row >= 1){
		  	  echo ("<script> window.alert('이미 등록된 전화번호 입니다.');
			location.href='./member.php';
					</script>");

		  }
		  else{


			$sql = "INSERT INTO USER_INFO (Phone, Name, PW, Email)
				VALUES ('$phone', '$username', '$userpw' ,'$email');";
			$res = mysqli_query($mysqli, $sql);

			echo ("<script> window.alert('회원가입이 완료됐습니다. 로그인해주세요.');
			location.href='./login.html';
					</script>");

		  }
}
	}
	}
	}
	?>
