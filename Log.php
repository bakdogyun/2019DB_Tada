<!DOCTYPE html>
<html>
  <head>
    <title>타다</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <!-- 부트스트랩 -->
    <link href="bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css"></style>
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
        <li class="active"><a href="Log.php">사용내역</a></li>
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
<br>

<div class='container'>
<?php
	session_start();

	if(isset($_SESSION['Name'])){

			$Phone_user = $_SESSION['Phone'];

			$con = new mysqli("localhost","sryu","2014101185","sryu");
			mysqli_query ($con, 'SET NAMES utf8');

			if (mysqli_connect_errno())
			{
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			else
			{
				$sql = "SELECT L.LogID, L.Date, L.TimeIn, L.TimeOut, L.Fee, D.Name, L.CarPlate
						FROM LOG AS L, DRIVER AS D
						WHERE Phone_User = ".$Phone_user." AND D.Phone = L.Phone_Driver
						ORDER BY L.LogID;";
				$result=mysqli_query($con,$sql);

				if ($result)
				{

					echo "<table class=\"table table-hover\">\n";
					echo "<TH>LogID</TH>  <TH>Date</TH>  <TH>TimeIN</TH>  <TH>TimeOUT</TH> <TH>Fee</TH> <TH>Car Plate</TH> <TH>Driver Name</TH> <TR>\n";

					while ($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC))
					{

						$LogID = $newArray['LogID'];
						$Date = $newArray['Date'];
						$TimeIn = $newArray['TimeIn'];
						$TimeOut = $newArray['TimeOut'];
						$Fee = $newArray['Fee'];
						$CarPlate = $newArray['CarPlate'];
						$DriName = $newArray['Name'];


						if($Fee != NULL )
						{

							echo "<TD>".$LogID."</TD>";
							echo "<TD>".$Date."</TD>";
							echo "<TD>".$TimeIn."</TD>";
							echo "<TD>".$TimeOut."</TD>";
							echo "<TD>".$Fee."</TD>";
							echo "<TD>".$CarPlate."</TD>";
							echo "<TD><form action=\"Driver_info.php\" method=\"POST\"><input type=\"submit\" name = 'btn' class='btn btn-primary' value='".$DriName."'/></form></TD>";

							echo "<TR>";



						}



						$_POST["test"] = $DriName;


					}

					echo "</table>\n";


				}
				else
				{
					printf("Could not retrieve records: %s\n", mysqli_error($con));
				}

				mysqli_free_result($result);
				mysqli_close($con);

			}
 		}
 		else
 		{
			echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
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
