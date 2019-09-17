<?php
$mysqli = new mysqli("localhost","sryu","2014101185","sryu");
$phone = $_POST["Phone"];
session_start();
$Phone_user = $_SESSION['Phone'];

mysqli_query ($mysqli, 'SET NAMES utf8');


if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
} else {
 		$check =  "select * from USER_INFO where Phone = '$Phone_user'";
 		//if(!empty($check)){
 		//echo "에러발생";
 		//}

		$result = $mysqli->query($check);
		$row = $result -> fetch_array(MYSQLI_ASSOC);
		//echo $row['Name']; // echo 자체가 안되고 있음
}
?>


<html>
<head>
	<title>타다</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<!-- 부트스트랩 -->
	<link href="bootstrap.min.css" rel="stylesheet" media="screen">
	<style type="text/css">

</style>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div calss="navbar-header">
				<a class="navbar-brand" href="main.php">
					<img alt="Brand" src="https://tadatada.com/static/images/btn_home_logo@4x.png" width="80">
				</a>
			</div>
		<div>
			<ul class="nav navbar-nav">
				<li><a href="main.php">메인</a></li>
				<li><a href="Call_setup.php">호출하기</a></li>
				<li><a href="Log.php">사용내역</a></li>
				<li><a href="show_card.php">카드관리</a></li>
				<li><form method="post" action="member_update.php">
					<input type="hidden" name = 'Phone' value="<?php echo $_SESSION['Phone']; ?>" />
					<div class = 'btn'><button type="submit hidden" class="btn">정보 수정하기</button></div>
					<style type="text/css">
							 .button {
								 padding-top: 15px;
							 }
				 </style>
				</form></li>
			</ul>
		</div>
		<div>
        <ul class="nav navbar-nav navbar-right">
           <li><a href="index.html">로그아웃</a></li>
        </ul>
      </div>
	</div>
	</nav>

	<div class='container'>

			<br/>

			<form class = 'form-horizontal' name="modifyForm" method="post" action="./member_update_save.php" style="margin:0px;" >
			<div class='form-group'>


				 <label for="inputEmail3" class="col-sm-2 control-label">회원이름</label>
				<input type="text" class= 'form-control' style="width:780px;" name="m_name"  value="<?php echo $row['Name']; ?>">
				<br>

				<label for="inputEmail3" class="col-sm-2 control-label">전화번호</label>
				<input type="text" class= 'form-control' style="width:780px;" name="m_phone"  value="<?php echo $row['Phone']; ?>">
				<br>

				 <label for="inputEmail3" class="col-sm-2 control-label">이메일</label>
					<input type="text"class= 'form-control' name="m_email" style="width:780px;" value="<?php echo $row['Email']?>">
					<br>

					 <label for="inputEmail3" class="col-sm-2 control-label">현재 비밀번호</label>
					<input class= 'form-control' name="p_pw" style="width:780px;"    >
					<br>

					 <label for="inputEmail3" class="col-sm-2 control-label">변경 비밀번호</label>
					<input class= 'form-control' name="m_pw" style="width:780px;" placeholder='변경을 원하지 않으면 원래 비밀번호 입력' >

						<input type="hidden" name = 'p_phone' value="<?php echo $Phone_user; ?>" />



						</br>
				<div class = 'container1'>
				<input type="submit"  class="btn btn-primary mt-3" value="수정하기" />
				<style type="text/css">
                .container1 {
                  padding-left: 190px;
                }
         </style>

				</div>
				<br>

			</form>

			<div class='container2'>
			<form class = 'form-horizontal' name="modifyForm" method="post" action="./member_delete.php" style="margin:0px;">
					  <input type="hidden" name = 'Phone' value="<?php echo $row['Phone']; ?>" />
					<input type="submit"  class="btn btn-warning mt-3" value="회원탈퇴" />


			</form>
			<style type="text/css">
                .container2 {
                  padding-left: 190px;
                }
         </style>
			</div>
		</div>

		<style type="text/css">
                .container {
                  padding-top: 70px;
                }
         </style>
	</div>
</body>
</html>
