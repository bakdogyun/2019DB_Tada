<?php
$Phone = $_POST["Phone"];

$mysqli = new mysqli("localhost","sryu","2014101185","sryu");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "DELETE FROM USER_INFO ";
	$sql .= " WHERE Phone='".$Phone."'";
	$res = mysqli_query($mysqli, $sql);
 	if ($res) {
 		echo ("<script> window.alert('정상적으로 회원탈퇴 됐습니다.');
			location.href='./login.html';
					</script>");
 	} else {
 		echo "<br>등록된 카드를 먼저 삭제해주세요!";
 	}
}
?>
	
