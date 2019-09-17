
<!DOCTYPE html>
<html>
<head>
	<title>타다에 회원가입</title>
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
				<a class="navbar-brand" href="index.html">
					<img alt="Brand" src="https://tadatada.com/static/images/btn_home_logo@4x.png" width="80">
				</a>
			</div>
		<div>

			<ul class="nav navbar-nav navbar-right">
				 <li><a href="login.html">로그인</a></li>
			</ul>
		</div>
	</div>
	</nav>

<div class='container'>
<div class='form-group'>
	<form method="post" action="member_join.php">
		<h1>회원가입</h1>
		<br>
		<label for="inputEmail3" class="col-sm-2 control-label">핸드폰 번호</label>
		<input type="int" style="width:400px;"class= 'form-control' size ="35" name="phone" placeholder="'-'없이 입력">
		<br>
		<br>
		<label for="inputEmail3" class="col-sm-2 control-label">이름</label>
		<input type="text" style="width:400px;"class= 'form-control' size="35" name="name" placeholder="이름">
		<br>
		<br>
		<label for="inputEmail3" class="col-sm-2 control-label">비밀번호</label>
		<input type="password" style="width:400px;"class= 'form-control' size="35" name="userpw" placeholder="비밀번호">
		<br>
		<br>
		<label for="inputEmail3" class="col-sm-2 control-label">이메일</label>
		<input type="email" style="width:400px;"class= 'form-control' name="email">
		<br>
		<br>
		<input type="submit" class='btn btn-primary' value="가입하기" />

	</form>
	</div>
	<style type="text/css">
			 .container{
				 padding-top: 70px;
			 }
 </style>
</div>

</body>
</html>
