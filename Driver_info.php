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
<?php
			$DriName = $_POST['btn'];

			$con = new mysqli("localhost","sryu","2014101185","sryu");
			mysqli_query ($con, 'SET NAMES utf8');
			if (mysqli_connect_errno())
			{
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			else
			{
				$sql = "SELECT D.Name, D.Company, AVG(L.Rate)
						FROM LOG AS L, DRIVER AS D
						WHERE D.Name = '".$DriName."' AND D.Phone = L.Phone_Driver;";
				$result=mysqli_query($con,$sql);

				if ($result)
				{
					 $numrow = mysqli_num_rows($result);

					 for($i=0; $i<$numrow; $i++)		//행(ROW) 수 만큼
	            {
	            	$row[$i]=mysqli_fetch_array($result);     // mysql_fetch_array를 반복합니다.

	            }

	            echo "<table class=\"table table-hover\">\n";
				echo "<TH>Name</TH>  <TH>Company</TH>  <TH>Rate</TH><TR>\n";

	            for($i = 0; $i < $numrow; $i++)
	            {
	            	$Driver = $row[$i]['Name'];
	            	$Company = $row[$i]['Company'];
	            	$AVG = $row[$i]['AVG(L.Rate)'];

	            	$AVG_round = round($AVG,1);

	            	echo "<TD>".$Driver."</TD>";
					echo "<TD>".$Company."</TD>";
					echo "<TD>".$AVG_round."</TD>";

					echo "<TR>";
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




?>
<a href='Log.php'><button type="button" class="btn btn-primary">돌아가기</button></a>
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
