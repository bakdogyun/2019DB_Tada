<!DOCTYPE html>
<head>
	<title>타다 카드 등록하기</title>
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
				<li><a href="Call_setup.php">호출하기</a></li>
				<li><a href="Log.php">사용내역</a></li>
				<li  class="active" ><a href="show_card.php">카드관리</a></li>
				<li ><form method="post" action="member_update.php">
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

<div class="container">
	<?php
	$mysqli = new mysqli("localhost", "sryu", "2014101185", "sryu");

if (mysqli_connect_errno()){
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}
else {
   session_start();
   $Phone_session = $_SESSION['Phone'];

   $sql = "SELECT * FROM USER_CARD WHERE Phone=$Phone_session";
   $res = mysqli_query($mysqli,$sql);
   if($res) {
       ?>
		<h1>카드 등록하기</h1>
    <form action=insert_card.php method=post class="form-inline">
        <label>Card Number(Do not use spacebar) </label>
        <input class= 'form-control' type="number" name=CardNum>
        <label>Month</label>
        <input class= 'form-control' type="text" name=Month>
        <label>Year</label>
        <input class= 'form-control' type="text" name=Year>
        <input type="hidden" name=Phone value="<?php echo $Phone_session;?>">
        <input type ="submit" class="btn btn-primary" value = "insert">
    </form>

		<br>
<h1>등록된 카드보기</h1>
    <TABLE class="table">

        <TH> CardNum </TH>
        <TH> Month </TH>
        <TH> Year </TH>
				<TH> Delete </th>
<?php
    while($newArray = mysqli_fetch_array($res,MYSQLI_ASSOC)){
?>
		<form name = "deleteform" method="post" action="./delete_card.php" >
			<TR>
				<TD><?php echo $newArray['CardNum']?></TD>
				<TD><?php echo $newArray['Month']?></TD>
				<TD><?php echo $newArray['Year']?></TD>
				<TD>
					<input type="hidden" name='CardNum'  value="<?php echo $newArray['CardNum'];?>">
					<input type="submit" value="delete" class ='btn btn-warning'>
				</TD>
			</TR>
		</form>

<?php
    }
?>
    </Table>

<?php
      }
      else {
         printf("Colud not retrieve records: %s\n", mysqli_error($mysqli));
      }
      mysqli_free_result($res);
      mysqli_close($mysqli);
   }

?>
<style type="text/css">
		 .container {
			 padding-top: 70px;
		 }
</style>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>
