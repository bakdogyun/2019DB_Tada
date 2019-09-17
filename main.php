<!DOCTYPE html>
<head>
	<title>타다</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<!-- 부트스트랩 -->
	<link href="bootstrap.min.css" rel="stylesheet" media="screen">
	<style type="text/css">

</style>
</head>
	<body>
		<?php
		session_start();
		if(isset($_SESSION['Name'])){
			echo "<div class=\"container\">";
			echo "<h2>{$_SESSION['Name']} 님 환영합니다.</h2>";
			echo "<h3> 전화번호 : {$_SESSION['Phone']} </h3>";
			echo "<h3> 이메일 : {$_SESSION['Email']} </h3>";
			echo " <style type=\"text/css\">
						.container {
							padding-top: 70px;
						}
			</style></div>";
			}
			else{
			echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
		}
		?>

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div calss="navbar-header">
					<a class="navbar-brand" href="main.php">
						<img alt="Brand" src="https://tadatada.com/static/images/btn_home_logo@4x.png" width="80">
					</a>
				</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="main.php">메인</a></li>
					<li><a href="Call_setup.php">호출하기</a></li>
					<li><a href="Log.php">사용내역</a></li>
					<li><a href="show_card.php">카드관리</a></li>
					<li><form method="post" action="member_update.php">
					  <input type="hidden" name = 'Phone' value="<?php echo $_SESSION['Phone']; ?>" />
					  <div class = 'btn'><button type="submit hidden" class="btn btn-link">정보 수정하기</button></div>
						<style type="text/css">
                 .button {
                   padding-top: 15px;
									 button-color : rgb(248, 248, 248);
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


	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap.min.js"></script>
</body>
</html>
