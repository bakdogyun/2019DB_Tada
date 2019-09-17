<!DOCTYPE html>
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
					<a class="navbar-brand">
						<img alt="Brand" src="https://tadatada.com/static/images/btn_home_logo@4x.png" width="80">
					</a>
				</div>
			<div>
				<ul class="nav navbar-nav">

						<style type="text/css">
                 .button {
                   padding-top: 15px;
									 button-color : rgb(248, 248, 248);
                 }
           </style>
					</form></li>
				</ul>
			</div>
		</div>
		</nav>

  <div class="container">
    <?php

    	        $con = new mysqli("localhost", "sryu", "2014101185", "sryu");

    	        $forDri = mt_rand(1, 25);





    	        session_start();

    	        if (mysqli_connect_errno()) { 		//SQL로 차량 위치 데이터 받아오고, 가장 가까운 차량 배정
    	        	printf("Connect failed: %s\n", mysqli_connect_error());
    	        	exit();
    	        } else {
    	        	$Phone_user = $_SESSION['Phone'];

    	        	$sql = "SELECT * FROM USER_TRACKER WHERE Phone = '".$Phone_user."';";

	            				$result=mysqli_query($con,$sql);
	            				$numrow = mysqli_num_rows($result);

	            				for($i=0; $i<$numrow; $i++)		//행(ROW) 수 만큼
	            				{
	            					$row[$i]=mysqli_fetch_array($result);     // mysql_fetch_array를 반복합니다.

	            				}

	            				for($i = 0; $i < $numrow; $i++)
	            				{
	            				$userLat = $row[$i]['Lat'];
	            				$userLng = $row[$i]['Lng'];
	            				}

	            				$LatRP = $userLat+"0.05"; //검색범위 제한을 위한 위도 상한
	            				$LngRP = $userLng+"0.05"; //검색범위 제한을 위한 경도 상한

	            				$LatRM = $userLat-"0.05"; //검색범위 제한을 위한 위도 하한
	            				$LngRM = $userLng-"0.05"; //검색범위 제한을 위한 경도 하한

	            		$sql = "SELECT *
	            				FROM TRACKER
	            				WHERE Lat BETWEEN '".$LatRM."' AND '".$LatRP."' AND Longt BETWEEN '.$LngRM.' AND '".$LngRP."';";

	            				$result=mysqli_query($con,$sql);

	            				$numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인합니다.

	            				for($i=0; $i<$numrow; $i++)		//행(ROW) 수 만큼
	            				{
	            					$row[$i]=mysqli_fetch_array($result);     // mysql_fetch_array를 반복합니다.

	            				}

	            				for($i = 0; $i < $numrow; $i++)			// mysql_fetch_array를 실행할 때마다 배열을 생성합니다.
	            				{
	            					$Car[]= $row[$i]['CarPlate']; //차량 번호 저장 어레이
	            					$Lat[] = $row[$i]['Lat'];  //차량 위도 저장 어레이
	            					$Lng[] = $row[$i]['Longt']; //차량 경도 저장 어레이
	            				}

	            				$sql = "SELECT * FROM DRIVER WHERE DriID = '".$forDri."';";

	            				$result=mysqli_query($con,$sql);
	            				$numrow = mysqli_num_rows($result);

	            				for($i=0; $i<$numrow; $i++)		//행(ROW) 수 만큼
	            				{
	            					$row[$i]=mysqli_fetch_array($result);     // mysql_fetch_array를 반복합니다.

	            				}

	            				for($i = 0; $i < $numrow; $i++)
	            				{
	            				$DriName = $row[$i]['Name'];
	            				$DriPhone = $row[$i]['Phone'];
	            				}




	            				mysqli_close($con);




	            				function getDistance($lat1, $lng1, $lat2, $lng2) //좌표를 이용한 두점의 거리 계산 함수
	            				{
	            					$earth_radius = 6371;
	            					$dLat = deg2rad($lat2 - $lat1);
	            					$dLon = deg2rad($lng2 - $lng1);
	            					$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
	            					$c = 2 * asin(sqrt($a));
	            					$d = $earth_radius * $c;
	            					return $d;
	            				}

	            				for($i = 0; $i< $numrow; $i++)  //각 차량과의 위치를 계산하여 $dstc 어레이에 저장
	            				{
	            					$dstc[$i][0] = getDistance($userLat, $userLng, $Lat[$i], $Lng[$i]);
	            					$dstc[$i][1] = $i;
	            				}

	            				sort($dstc);	//최솟값을 위한 어레이 정렬
	            				$st = $dstc[0][1];	//$dstc[0][0]이 거리 최솟값

	            				$hi = $dstc[0][0];

	            				$dstc_round = round($dstc[0][0]);



	            				$GoodCar = $Car[$st];

	            				$a = "15";



	            				if($dstc[0][0] > $a)
	            				{
	            					$Lat[$st] = 0;
	            					$Lng[$st] = 0;


	            					echo "<div class=\"alert alert-danger\" role=\"alert\">매칭되는 차가 없습니다.잠시 후에 시도해주세요.<br><br><input class=\"btn btn-warning\" type=button value=\"새로고침\" onclick=\"JavaScript:window.location.reload()\">&nbsp<a class=\"btn btn-primary\" href=\"Call_setup.php\">돌아가기</a></div>";


	            				}
	            				else
	            				{
	            					echo "<div class=\"alert alert-success\" role=\"alert\"> 차가 매칭되었습니다! <span style=\"font-weight:bold\">기사님  : ".$DriName."</span> <span style=\"font-weight:bold\">번호 : ".$Car[$st]."</span> 거리 : ".$dstc_round."KM</div><a class=\"btn btn-primary\" href=\"Call_after.php\">탑승하기</a><br>"; //가장 가까운 차량 번호와 거리 출력

	            					$_POST["test"] = $GoodCar;
	            					$_POST["dstc"] = $dstc_round;
	            					$_POST["DriPhone"] = $DriPhone;



	            					include "Call_test.php";
	            				}

	            	} //if문의 끝

 	   ?>


        <br>
 	   		<div id="map" style="width:100%;height:350px;">
 	     	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3ed61d066b9864295e57ace8a79ebddb"></script>
 	     	<script>

 	     		var mapContainer = document.getElementById('map'), // 지도를 표시할 div

 	     		mapOption = {
 	     			center: new daum.maps.LatLng(<? echo($userLat);?>, <? echo($userLng);?>), // 지도의 중심좌표
 	     			level: 8 // 지도의 확대 레벨
 	     		};

 	     		var map = new daum.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

 	     		// 마커를 표시할 위치와 title 객체 배열입니다
 	     		var positions = [
 	     			{
 	     				title: '유저',
 	     				latlng: new daum.maps.LatLng(<? echo($userLat);?>, <? echo($userLng);?>),
 	     				srco : "http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png", //마커 이미지 소스
 	     				size : "24, 35" //마커 크기
 	     			},
 	     			{
 	     				title: '타다',
 	     				latlng: new daum.maps.LatLng(<? echo($Lat[$st]);?>, <? echo($Lng[$st]);?>),
 	     				srco : "https://www.greasenergy-shop.com/WebRoot/Store2/Shops/63102114/522B/468A/A139/D4E7/EA37/C0A8/29BB/3872/Safari_xs.png",
 	     				size : "0.1, 0.2"
 	     			}
 	     			];



 	     		for (var i = 0; i < positions.length; i ++) //마커 표시
 	     		{

 	     			var imageSrc = positions[i].srco; //마커 이미지 소스 설정

 	     			// 마커 이미지의 이미지 크기 설정
 	     			var imageSize = new daum.maps.Size(positions[i].size);

 	     			// 마커 이미지를 생성합니다
 	     			var markerImage = new daum.maps.MarkerImage(imageSrc, imageSize);

 	     			// 마커를 생성합니다
 	     			var marker = new daum.maps.Marker({
 	     					map: map, // 마커를 표시할 지도
 	     					position: positions[i].latlng, // 마커를 표시할 위치
 	     					title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
 	     					image : markerImage // 마커 이미지
 	     			});
 	     		}
 	     </script>
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
