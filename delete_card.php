<?php
$CardNum = $_POST['CardNum']; // primary key �� CardNum�� ���� post �������� �޾ƿɴϴ�.

$mysqli = new mysqli("localhost", "sryu", "2014101185", "sryu"); //db�� �����մϴ�.

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit(); //db ������ ������ ��� ���� ������ ����մϴ�.
} else {
	$sql = "DELETE FROM USER_CARD ";
	$sql .= " WHERE CardNum='".$CardNum."'";
	echo $sql;// USER_CARD ���̺��� ī��ѹ��� ���� POST ������ �޾ƿ� ī��ѹ��� ���� ���� ������ �����մϴ�.
	$res = mysqli_query($mysqli, $sql);
 	if ($res) {
 		echo "<br>success";
 	} else {
 		echo "<br>fail";
 	}
}//���� ������ �����ϸ� success �����ϸ� fail�� ����մϴ�.�׷��� ��ũ��Ʈ�� �ٽ� ���ư��� ������ ���� ��� ����ϴ�.
?>
<script>
	location.href='./show_card.php';
</script>
<!-- ��ũ��Ʈ ������ ���� ���� ȭ���� show_card.php�� ���ư��ϴ�.-->
