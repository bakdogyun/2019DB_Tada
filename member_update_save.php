<?php
$m_name = $_POST["m_name"];
$m_phone = $_POST["m_phone"];
$m_email = $_POST["m_email"];
$m_pw = $_POST["m_pw"];
$p_pw = $_POST["p_pw"];
$p_phone = $_POST["p_phone"];


$mysqli = new mysqli("localhost","sryu","2014101185","sryu");
$check = "select * from USER_INFO where Phone = '$p_phone'";
$result = $mysqli->query($check);

$row = $result -> fetch_array(MYSQLI_ASSOC); // row에는 sql로 찾은 것들이 들어있다.
if($row['PW'] == $p_pw){
		$sql = "UPDATE USER_INFO ";
		$sql .= " SET PW='".$m_pw."', Name='".$m_name."', Phone='".$m_phone."', Email='".$m_email."'";
		$sql .= " WHERE Phone='".$p_phone."'";
		echo $sql;
		$res = mysqli_query($mysqli, $sql);
		if ($res) {

			session_destroy();

			echo ("<script> window.alert('다시 로그인해주세요');
			location.href='./login.html';
					</script>");
		} else {
			echo "<br>fail";
		}

 }
else{
echo '<script>alert(\'비밀번호가 잘못되었습니다\');</script>';
header("Refresh:0; url=member_update.php");
}
?>
