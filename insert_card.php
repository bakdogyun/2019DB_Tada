<?php

$CardNum = $_POST['CardNum'];
$Phone = $_POST['Phone'];
$Month = $_POST['Month'];//show_card.php 에서 입력한 값을 post 방식으로 받아옵니다.
$Year = $_POST['Year'];

$mysqli = new mysqli("localhost", "sryu", "2014101185", "sryu"); //db와 연동시킵니다.
if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit(); //db연동에 문제가 생길경우 위의 문구를 출력하고 exit 합니다.
} else {
if($CardNum==''||$Month==''||$Year=='') {//공란인지 확인합니다.
echo ("<script> window.alert('Please fill in the blank');
			location.href='./show_card.php';
					</script>");
exit();
}else {
If(Strlen($CardNum)!=16||Strlen($Month)!=2||Strlen($Year)!=2) {//자리수가 각각 16자리 2자리 2자리인지 확인합니다.
echo ("<script> window.alert('Please check the number of digits');
			location.href='./show_card.php';
					</script>");
exit();
} else {
   $sql = "INSERT INTO USER_CARD (Phone,CardNum,Month,Year) VALUES('$Phone','$CardNum','$Month','$Year');";//작은 따옴표를 붙여줘야지 0이 인식이 된다(문자열로 인식). 이거 찾느라 밤샐뻔
   $res = mysqli_query($mysqli, $sql);
    if ($res) {
       echo ("<script> window.alert('success');
			location.href='./show_card.php';
					</script>");
    } else {
        echo ("<script> window.alert('This card number has been already registered');
			location.href='./show_card.php';
					</script>");
    }//쿼리를 실행하고 성공하면 success 실패하면 실패문구를 출력합니다.
}
}
}
?>
<a href = "show_card.php">돌아가기</a>
<!--<script>
   location.href='./show_card.php';
</script>--!>
<!-- 위의 스크립트 구문은 명령을 실행한 후 다시 앞의 show_card 창으로 돌아가기 위한 구문입니다.-->
