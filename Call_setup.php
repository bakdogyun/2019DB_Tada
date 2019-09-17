<!DOCTYPE html>
<html>
<head>
  <title>타다 호출하기</title>
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
					<li ><a href="main.php">메인</a></li>
					<li class="active"><a href="Call_setup.php">호출하기</a></li>
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
			<div >
        <ul class="nav navbar-nav navbar-right">
           <li><a href="index.html">로그아웃</a></li>
        </ul>
      </div>
		</div>
		</nav>


    <nav class='container'>
    	<form class="form-search" action = "Call_setup_bg.php" method = "POST"  >
    		<input type="text" style="width:400px;" class= 'form-control'name = "place" class="input-medium search-query" placeholder="목적지를 입력해주세요.">
    		<br>
    		<br>
    		<input type="submit" class="btn btn-lg btn-primary" value="호출하기" />
    	</form>
    	<style type="text/css">
                .container {
                  padding-top: 70px;
                }
         </style>
    </nav>

    <script src="http://code.jquery.com/jquery.js"></script>
  	<script src="bootstrap.min.js"></script>

  </body>
</html>
