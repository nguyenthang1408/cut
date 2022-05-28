<?php 
    $thang = date('m', strtotime("now"));

	if(isset($_POST['up'])){
		$thang = $_POST['input'];
	}
    include "../Model/DBconfig.php";
    $db = new Database();
    $db -> connect();
    session_start();
	
    include "../Model/datachart.php";
    $dt = getdate();
    $day = $dt["mday"];
    $month = date("m");
    $year = $dt["year"];
    $today = "$year"."-"."$month"."-"."$day";

    $date = $today;
    include "../Model/connection.php";
    $query = "SELECT type_leave , COUNT(type_leave) AS type_leave_no FROM attendance WHERE date = '$date' GROUP BY type_leave";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../codejavascript/sty3.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
	 <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<title>Quản Lý Tự Đông Hóa</title>
	<style type="text/css">

    :root {
        --dk-gray-100: #F3F4F6;
        --dk-gray-200: #E5E7EB;
        --dk-gray-300: #D1D5DB;
        --dk-gray-400: #9CA3AF;
        --dk-gray-500: #6B7280;
        --dk-gray-600: #4B5563;
        --dk-gray-700: #374151;
        --dk-gray-800: #1F2937;
        --dk-gray-900: #111827;
        --dk-dark-bg: #313348;
        --dk-darker-bg: #2a2b3d;
        --navbar-bg-color: #6f6486;
        --sidebar-bg-color: #252636;
        --sidebar-width: 250px;
    }
        /** --------------------------------
 -- Charts
-------------------------------- */
.charts .chart-container {
            background-color: var(--dk-dark-bg);
        }
        .charts .chart-container h3 {
            color: var(--dk-gray-400)
        }
		.buttont
		{
			color: #1656f0;
			display: block;
			position: relative;
			box-shadow:-4px -4px 12px rgb(255, 255, 255),
			4px 4px 12px rgba(121, 130, 160, 0.747);
			width: 200px;
			height: 40px;
			border-radius: 50px;
			font-size: 15px;
			font-weight:bold;
			outline: none;
			border: none;
			background: #c7deff;
			line-height: 36px;
			cursor:pointer;
			box-sizing: border-box;
    		font-family: 'Poppins', sans-serif;
			text-align: center;
			justify-content: center;
			align-items: center;
		}
		.box1 .NextpsBt
		{
			display:block;
			position: relative;
			justify-content: center;
			align-items: center;
		}
		.NPB  
		{
		background: #c7deff;
		position: relative;
		border-radius: 10px;
		width: 30px;
		height: 30px;
		border: none;
		outline: none;
		margin-left: 14px;
		box-shadow:-2px -2px 6px rgb(255, 255, 255),
			2px 2px 6px rgba(121, 130, 160, 0.747);
			font-size: 18px;
			color: #8a92a5;

		} 
		.NPB:active
		{
		box-shadow:inset -2px -2px 6px rgb(255, 255, 255),
			inset 2px 2px 6px rgba(121, 130, 160, 0.747);
			color: #185ef0;
		}
		input
		{   
			width: 220px;
			height: 45px;
			border-radius: 50px;
			font-size: 20px;
			font-weight:500;
			outline: none;
			border: none;
			padding: 5px 15px;
			background:#c7deff;
			color: #8a92a5;
			box-shadow:inset -4px -4px 8px rgb(255, 255, 255),
			inset 4px 4px 8px rgba(121, 130, 160, 0.747);

		}
		::placeholder
		{
			text-align: center;
			font-weight:bold;
			text-transform: capitalize;
			color: #8a92a5;
			font-size: 15px;
		} 
	</style>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>

    
		<div class="app" style="height: 165vh;">
		<nav class="navmobile" id="navmobile">
				<div class="spani" id="spani">
					<i class="fas fa-solid fa-bars"></i>
				</div>
				<div  class="ulli" id="ulli">
					<ul style="">
						<li>
							<a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
								<i style="" class="fas fa-solid fa-user"></i>
								<span style="">進度</span>
							</a>
						</li>

						<li><a href="">點名</a></li>
						<li>
							<a href="#" class="a2">
								<form action="" method="POST">
								<input style=";" type="submit" name="dangxuat" value="Đăng Xuất" class="">
								</form>
							</a>
						</li>
					</ul>
				</div>
         	 </nav>
	       <header id="app-header" class="app-header" style="width:18vw;height: 165vh;">
		   <div class="app-header-logo" style="display: inline-block;">
			   				<h2 class="logo-title" style="">
			   					<span style="">VN Cable <br/> 自動化</span>
							</h2>
							<div class="username">
								<span class="span" style=""><?php 
						           	if(isset($_SESSION['username'] ))	
										{
											echo $_SESSION['username'];
										}
										?>
						    	</span>
							</div>
						</div>
								
				<nav class="navigation" style="">
					<a href="../Controller/index.php?action=test2-cn#" class="a1">
						<i class="fas fa-solid fa-house-user a1i"></i>
						<span style="">菜單</span>
					</a>
					<a class="a2" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
						<i style="" class="fas fa-solid fa-user"></i>
						<span style="">賬號</span>
					</a>
					<a href="../Employee-management-system/admin-cn/attendance.php" class="a3">
						<i style="" class="fas fa-solid fa-info a3i"></i>
						<span style="" class="">點名</span>
					</a>
					<ul>
						<li>
							<a href="#" class="a4">
								<i class="fas fa-solid fa-spinner a4i"></i>
								<span>進度</span>
							</a>
							<ul style="">
								<li style=""><a href="../Controller/index.php?action=selectaecdata-cn#divtimkiem">AEC</a></li>
								<li style=""><a href="../Controller/index.php?action=selecttscdata-cn#divtimkiem">TSC</a></li>
								<li style=""><a href="../Controller/index.php?action=selectapsdata-cn#divtimkiem">APS</a></li>
							</ul>
						</li>
					</ul>
					<a href="../Controller/index.php?action=test2#divtimkiem" class="a5" style="margin-top: 25vh;">
						<i class="fas fa-solid fa-language"></i>
						<span style="" class="">Tiếng Việt</span>
					</a>		      
				</nav>
					
                <footer class="footer">					
					<div class="logof">
						<a href="#" class="a2">
							<form action="" method="POST">
									<input style="" type="submit" name="dangxuat" value="登出" class="">
							</form>
						</a>
					</div>
				</footer>
			</header>
			<div class="app-body-main-content" style="width:82vw">
					<div style=" display: grid;grid-template-columns: repeat(1, 1fr);column-gap: 1.6rem;row-gap: 2rem;margin-top: 1rem;grid-template-columns: %  ;">
						<div style="padding-left:10px;padding-top:10px;left:100px;background: #c7deff;border-radius: 20px;width:1690px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
							<form action="" method="POST" id="">
								<div class="box1">
									<div class="NextpsBt">
										<input name="input" type="text" placeholder="Nhập tháng muốn xem">
										<button name="up" class="NPB"><i class="fas fa-angle-right"></i></button>
									</div>
								</div>
							</form>
							<div id="columnchart" style="padding-top:10px;"></div>
						</div>
						<div style="border-radius: 20px;width:1690px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
							<button id="change-chart2" class="buttont"></button>
							<div id="columnchart1" style="padding-top:10px;"></div>
						</div>
						<div style="padding-left:10px;background: #c7deff;border-radius: 20px;width:1690px; height: 550px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
							<span class="nace"><br><br>
								<div id="chart_div"></div>
							</span>
						</div>
					</div>
				</div>


<!-- mật Khẩu -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">入密碼</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">密碼:</label>
            <input type="password" class="form-control" id="idmatkhau">
          </div>
          <div>
              <span id="span">
                  
              </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="xacnhan" class="btn btn-primary">確認</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    document.getElementById("xacnhan").addEventListener("click", myFunction);
	function myFunction() {
		var x = document.getElementById("idmatkhau");
		var y = document.getElementById("span");
		x.value = x.value.toUpperCase();
		if(x.value == '<?php echo $matkhau1[1] ?>'){
			window.location="../Controller/index.php?action=usermanager&page=1";
		}else{
		document.getElementById("idmatkhau").classList.add("is-invalid");
		document.getElementById("span").innerText = 'Mật Khẩu Không Đúng'
		document.getElementById("span").style.color = 'red'
		}
		
	}
</script>

<script src="../plugins/jquery-2.2.4.min.js"></script>
	<script src="../plugins/jquery.appear.min.js"></script>
	<script src="../plugins/jquery.easypiechart.min.js"></script> 
	<script>
		'use strict';
		var $window = $(window);
		function run()
		{
			var fName = arguments[0],
				aArgs = Array.prototype.slice.call(arguments, 1);
			try {
				fName.apply(window, aArgs);
			} catch(err) {
				
			}
		};
 	</script>
	
	
     <script type="text/javascript">
		// Load google charts
		google.charts.load('current', {
		packages: ['corechart', 'line']
		});
		google.charts.setOnLoadCallback(drawCurveTypes);

		function drawCurveTypes() {
        var chartDiv = document.getElementById('columnchart');

		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Ngày');
		data.addColumn('number', '上班');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addColumn('number', '請假');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addRows([
			['1',<?php echo $dilamngay1; ?>,'<?php echo $dilamngay1; ?>',<?php echo $nghilamngay1; ?>,'<?php echo $nghilamngay1; ?>'],
			['2',<?php echo $dilamngay2; ?>,'<?php echo $dilamngay2; ?>',<?php echo $nghilamngay2; ?>,'<?php echo $nghilamngay2; ?>'],
			['3',<?php echo $dilamngay3; ?>,'<?php echo $dilamngay3; ?>',<?php echo $nghilamngay3; ?>,'<?php echo $nghilamngay3; ?>'],
			['4',<?php echo $dilamngay4; ?>,'<?php echo $dilamngay4; ?>',<?php echo $nghilamngay4; ?>,'<?php echo $nghilamngay4; ?>'],
			['5',<?php echo $dilamngay5; ?>,'<?php echo $dilamngay5; ?>',<?php echo $nghilamngay5; ?>,'<?php echo $nghilamngay5; ?>'],
			['6',<?php echo $dilamngay6; ?>,'<?php echo $dilamngay6; ?>',<?php echo $nghilamngay6; ?>,'<?php echo $nghilamngay6; ?>'],
			['7',<?php echo $dilamngay7; ?>,'<?php echo $dilamngay7; ?>',<?php echo $nghilamngay7; ?>,'<?php echo $nghilamngay7; ?>'],
			['8',<?php echo $dilamngay8; ?>,'<?php echo $dilamngay8; ?>',<?php echo $nghilamngay8; ?>,'<?php echo $nghilamngay8; ?>'],
			['9',<?php echo $dilamngay9; ?>,'<?php echo $dilamngay9; ?>',<?php echo $nghilamngay9; ?>,'<?php echo $nghilamngay9; ?>'],
			['10',<?php echo $dilamngay10; ?>,'<?php echo $dilamngay10; ?>',<?php echo $nghilamngay10; ?>,'<?php echo $nghilamngay10; ?>'],
			['11',<?php echo $dilamngay11; ?>,'<?php echo $dilamngay11; ?>',<?php echo $nghilamngay11; ?>,'<?php echo $nghilamngay11; ?>'],
			['12',<?php echo $dilamngay12; ?>,'<?php echo $dilamngay12; ?>',<?php echo $nghilamngay12; ?>,'<?php echo $nghilamngay12; ?>'],
			['13',<?php echo $dilamngay13; ?>,'<?php echo $dilamngay13; ?>',<?php echo $nghilamngay13; ?>,'<?php echo $nghilamngay13; ?>'],
			['14',<?php echo $dilamngay14; ?>,'<?php echo $dilamngay14; ?>',<?php echo $nghilamngay14; ?>,'<?php echo $nghilamngay14; ?>'],
			['15',<?php echo $dilamngay15; ?>,'<?php echo $dilamngay15; ?>',<?php echo $nghilamngay15; ?>,'<?php echo $nghilamngay15; ?>'],
			['16',<?php echo $dilamngay16; ?>,'<?php echo $dilamngay16; ?>',<?php echo $nghilamngay16; ?>,'<?php echo $nghilamngay16; ?>'],
			['17',<?php echo $dilamngay17; ?>,'<?php echo $dilamngay17; ?>',<?php echo $nghilamngay17; ?>,'<?php echo $nghilamngay17; ?>'],
			['18',<?php echo $dilamngay18; ?>,'<?php echo $dilamngay18; ?>',<?php echo $nghilamngay18; ?>,'<?php echo $nghilamngay18; ?>'],
			['19',<?php echo $dilamngay19; ?>,'<?php echo $dilamngay19; ?>',<?php echo $nghilamngay19; ?>,'<?php echo $nghilamngay19; ?>'],
			['20',<?php echo $dilamngay20; ?>,'<?php echo $dilamngay20; ?>',<?php echo $nghilamngay20; ?>,'<?php echo $nghilamngay20; ?>'],
			['21',<?php echo $dilamngay21; ?>,'<?php echo $dilamngay21; ?>',<?php echo $nghilamngay21; ?>,'<?php echo $nghilamngay21; ?>'],
			['22',<?php echo $dilamngay22; ?>,'<?php echo $dilamngay22; ?>',<?php echo $nghilamngay22; ?>,'<?php echo $nghilamngay22; ?>'],
			['23',<?php echo $dilamngay23; ?>,'<?php echo $dilamngay23; ?>',<?php echo $nghilamngay23; ?>,'<?php echo $nghilamngay23; ?>'],
			['24',<?php echo $dilamngay24; ?>,'<?php echo $dilamngay24; ?>',<?php echo $nghilamngay24; ?>,'<?php echo $nghilamngay24; ?>'],
			['25',<?php echo $dilamngay25; ?>,'<?php echo $dilamngay25; ?>',<?php echo $nghilamngay25; ?>,'<?php echo $nghilamngay25; ?>'],
			['26',<?php echo $dilamngay26; ?>,'<?php echo $dilamngay26; ?>',<?php echo $nghilamngay26; ?>,'<?php echo $nghilamngay26; ?>'],
			['27',<?php echo $dilamngay27; ?>,'<?php echo $dilamngay27; ?>',<?php echo $nghilamngay27; ?>,'<?php echo $nghilamngay27; ?>'],
			['28',<?php echo $dilamngay28; ?>,'<?php echo $dilamngay28; ?>',<?php echo $nghilamngay28; ?>,'<?php echo $nghilamngay28; ?>'],
			['29',<?php echo $dilamngay29; ?>,'<?php echo $dilamngay29; ?>',<?php echo $nghilamngay29; ?>,'<?php echo $nghilamngay29; ?>'],
			['30',<?php echo $dilamngay30; ?>,'<?php echo $dilamngay30; ?>',<?php echo $nghilamngay30; ?>,'<?php echo $nghilamngay30; ?>'],
			['31',<?php echo $dilamngay31; ?>,'<?php echo $dilamngay31; ?>',<?php echo $nghilamngay31; ?>,'<?php echo $nghilamngay31; ?>'],
			]);
		// Optional; add a title and set the width and height of the chart
		var materialOptions = {
			legend: {
				position: 'bottom'
				},
				title: '本月每天 點名 <?php echo $thang; ?>',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1530" , height:"350"} ,
						backgroundColor: '#c7deff',
						height:"430",
						width:"1620",
						vAxis: {
							minValue: 150,
							maxValue: 200,
						} ,  
						vAxes: {
							0: {textStyle: {color: '#131685', bold: true}},
							1: {textStyle: {color: '#DC143C', bold: true}},
						},
						animation: {
									duration: 500,
									easing: 'out',
									startup: true
									},
						
						series:{1: {type: "line",pointSize: 5},0: {type: "line",pointSize: 5}},
						curveType: 'function',
		};
		
		 function drawMaterialChart() {
          var materialChart = new google.visualization.ColumnChart(chartDiv);
          materialChart.draw(data,materialOptions);
        }

        drawMaterialChart();
		
		};
	</script>
	<script type="text/javascript">
		// Load google charts
		google.charts.load('current', {
		packages: ['corechart', 'line']
		});
		google.charts.setOnLoadCallback(drawCurveTypes);

		function drawCurveTypes() {
		var button = document.getElementById('change-chart2');
        var chartDiv = document.getElementById('columnchart1');

		var data = new google.visualization.DataTable();
		data.addColumn('string', '');
		data.addColumn('number', '上班');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addColumn('number', '請假');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addRows([
			['1', <?php echo $tiledilamtuan1; ?>,'<?php echo $tiledilamtuan1; ?>',<?php echo $tilenghilamtuan1; ?>,'<?php echo $tilenghilamtuan1; ?>'],
			['2', <?php echo $tiledilamtuan2; ?>,'<?php echo $tiledilamtuan2; ?>',<?php echo $tilenghilamtuan2; ?>,'<?php echo $tilenghilamtuan2; ?>'],
			['3', <?php echo $tiledilamtuan3; ?>,'<?php echo $tiledilamtuan3; ?>',<?php echo $tilenghilamtuan3; ?>,'<?php echo $tilenghilamtuan3; ?>'],
			['4', <?php echo $tiledilamtuan4; ?>,'<?php echo $tiledilamtuan4; ?>',<?php echo $tilenghilamtuan4; ?>,'<?php echo $tilenghilamtuan4; ?>'],
			['5', <?php echo $tiledilamtuan5; ?>,'<?php echo $tiledilamtuan5; ?>',<?php echo $tilenghilamtuan5; ?>,'<?php echo $tilenghilamtuan5; ?>'],
			['6', <?php echo $tiledilamtuan6; ?>,'<?php echo $tiledilamtuan6; ?>',<?php echo $tilenghilamtuan6; ?>,'<?php echo $tilenghilamtuan6; ?>'],
			['7', <?php echo $tiledilamtuan7; ?>,'<?php echo $tiledilamtuan7; ?>',<?php echo $tilenghilamtuan7; ?>,'<?php echo $tilenghilamtuan7; ?>'],
			['8', <?php echo $tiledilamtuan8; ?>,'<?php echo $tiledilamtuan8; ?>',<?php echo $tilenghilamtuan8; ?>,'<?php echo $tilenghilamtuan8; ?>'],
			['9', <?php echo $tiledilamtuan9; ?>,'<?php echo $tiledilamtuan9; ?>',<?php echo $tilenghilamtuan9; ?>,'<?php echo $tilenghilamtuan9; ?>'],
			['10',<?php echo $tiledilamtuan10; ?>,'<?php echo $tiledilamtuan10; ?>',<?php echo $tilenghilamtuan10; ?>,'<?php echo $tilenghilamtuan10; ?>'],
			['11',<?php echo $tiledilamtuan11; ?>,'<?php echo $tiledilamtuan11; ?>',<?php echo $tilenghilamtuan11; ?>,'<?php echo $tilenghilamtuan11; ?>'],
			['12',<?php echo $tiledilamtuan12; ?>,'<?php echo $tiledilamtuan12; ?>',<?php echo $tilenghilamtuan12; ?>,'<?php echo $tilenghilamtuan12; ?>'],
			['13',<?php echo $tiledilamtuan13; ?>,'<?php echo $tiledilamtuan13; ?>',<?php echo $tilenghilamtuan13; ?>,'<?php echo $tilenghilamtuan13; ?>'],
			['14',<?php echo $tiledilamtuan14; ?>,'<?php echo $tiledilamtuan14; ?>',<?php echo $tilenghilamtuan14; ?>,'<?php echo $tilenghilamtuan14; ?>'],
			['15',<?php echo $tiledilamtuan15; ?>,'<?php echo $tiledilamtuan15; ?>',<?php echo $tilenghilamtuan15; ?>,'<?php echo $tilenghilamtuan15; ?>'],
			['16',<?php echo $tiledilamtuan16; ?>,'<?php echo $tiledilamtuan16; ?>',<?php echo $tilenghilamtuan16; ?>,'<?php echo $tilenghilamtuan16; ?>'],
			['17',<?php echo $tiledilamtuan17; ?>,'<?php echo $tiledilamtuan17; ?>',<?php echo $tilenghilamtuan17; ?>,'<?php echo $tilenghilamtuan17; ?>'],
			['18',<?php echo $tiledilamtuan18; ?>,'<?php echo $tiledilamtuan18; ?>',<?php echo $tilenghilamtuan18; ?>,'<?php echo $tilenghilamtuan18; ?>'],
			['19',<?php echo $tiledilamtuan19; ?>,'<?php echo $tiledilamtuan19; ?>',<?php echo $tilenghilamtuan19; ?>,'<?php echo $tilenghilamtuan19; ?>'],
			['20',<?php echo $tiledilamtuan20; ?>,'<?php echo $tiledilamtuan20; ?>',<?php echo $tilenghilamtuan20; ?>,'<?php echo $tilenghilamtuan20; ?>'],
			['21',<?php echo $tiledilamtuan21; ?>,'<?php echo $tiledilamtuan21; ?>',<?php echo $tilenghilamtuan21; ?>,'<?php echo $tilenghilamtuan21; ?>'],
			['22',<?php echo $tiledilamtuan22; ?>,'<?php echo $tiledilamtuan22; ?>',<?php echo $tilenghilamtuan22; ?>,'<?php echo $tilenghilamtuan22; ?>'],
			['23',<?php echo $tiledilamtuan23; ?>,'<?php echo $tiledilamtuan23; ?>',<?php echo $tilenghilamtuan23; ?>,'<?php echo $tilenghilamtuan23; ?>'],
			['24',<?php echo $tiledilamtuan24; ?>,'<?php echo $tiledilamtuan24; ?>',<?php echo $tilenghilamtuan24; ?>,'<?php echo $tilenghilamtuan24; ?>'],
			['25',<?php echo $tiledilamtuan25; ?>,'<?php echo $tiledilamtuan25; ?>',<?php echo $tilenghilamtuan25; ?>,'<?php echo $tilenghilamtuan25; ?>'],
			['26',<?php echo $tiledilamtuan26; ?>,'<?php echo $tiledilamtuan26; ?>',<?php echo $tilenghilamtuan26; ?>,'<?php echo $tilenghilamtuan26; ?>'],
			]);

		var data1 = new google.visualization.DataTable();
		data1.addColumn('string', '');
		data1.addColumn('number', '上班');
		data1.addColumn({type: 'string', role: 'annotation'});
		data1.addColumn('number', '請假');
		data1.addColumn({type: 'string', role: 'annotation'});
		data1.addRows([
			['27',<?php echo $tiledilamtuan27; ?>,'<?php echo $tiledilamtuan27; ?>',<?php echo $tilenghilamtuan27; ?>,'<?php echo $tilenghilamtuan27; ?>'],
			['28',<?php echo $tiledilamtuan28; ?>,'<?php echo $tiledilamtuan28; ?>',<?php echo $tilenghilamtuan28; ?>,'<?php echo $tilenghilamtuan28; ?>'],
			['29',<?php echo $tiledilamtuan29; ?>,'<?php echo $tiledilamtuan29; ?>',<?php echo $tilenghilamtuan29; ?>,'<?php echo $tilenghilamtuan29; ?>'],
			['30',<?php echo $tiledilamtuan30; ?>,'<?php echo $tiledilamtuan30; ?>',<?php echo $tilenghilamtuan30; ?>,'<?php echo $tilenghilamtuan30; ?>'],
			['31',<?php echo $tiledilamtuan31; ?>,'<?php echo $tiledilamtuan31; ?>',<?php echo $tilenghilamtuan31; ?>,'<?php echo $tilenghilamtuan31; ?>'],
			['32',<?php echo $tiledilamtuan32; ?>,'<?php echo $tiledilamtuan32; ?>',<?php echo $tilenghilamtuan32; ?>,'<?php echo $tilenghilamtuan32; ?>'],
			['33',<?php echo $tiledilamtuan33; ?>,'<?php echo $tiledilamtuan33; ?>',<?php echo $tilenghilamtuan33; ?>,'<?php echo $tilenghilamtuan33; ?>'],
			['34',<?php echo $tiledilamtuan34; ?>,'<?php echo $tiledilamtuan34; ?>',<?php echo $tilenghilamtuan34; ?>,'<?php echo $tilenghilamtuan34; ?>'],
			['35',<?php echo $tiledilamtuan35; ?>,'<?php echo $tiledilamtuan35; ?>',<?php echo $tilenghilamtuan35; ?>,'<?php echo $tilenghilamtuan35; ?>'],
			['36',<?php echo $tiledilamtuan36; ?>,'<?php echo $tiledilamtuan36; ?>',<?php echo $tilenghilamtuan36; ?>,'<?php echo $tilenghilamtuan36; ?>'],
			['37',<?php echo $tiledilamtuan37; ?>,'<?php echo $tiledilamtuan37; ?>',<?php echo $tilenghilamtuan37; ?>,'<?php echo $tilenghilamtuan37; ?>'],
			['38',<?php echo $tiledilamtuan38; ?>,'<?php echo $tiledilamtuan38; ?>',<?php echo $tilenghilamtuan38; ?>,'<?php echo $tilenghilamtuan38; ?>'],
			['39',<?php echo $tiledilamtuan39; ?>,'<?php echo $tiledilamtuan39; ?>',<?php echo $tilenghilamtuan39; ?>,'<?php echo $tilenghilamtuan39; ?>'],
			['40',<?php echo $tiledilamtuan40; ?>,'<?php echo $tiledilamtuan40; ?>',<?php echo $tilenghilamtuan40; ?>,'<?php echo $tilenghilamtuan40; ?>'],
			['41',<?php echo $tiledilamtuan41; ?>,'<?php echo $tiledilamtuan41; ?>',<?php echo $tilenghilamtuan41; ?>,'<?php echo $tilenghilamtuan41; ?>'],
			['42',<?php echo $tiledilamtuan42; ?>,'<?php echo $tiledilamtuan42; ?>',<?php echo $tilenghilamtuan42; ?>,'<?php echo $tilenghilamtuan42; ?>'],
			['43',<?php echo $tiledilamtuan43; ?>,'<?php echo $tiledilamtuan43; ?>',<?php echo $tilenghilamtuan43; ?>,'<?php echo $tilenghilamtuan43; ?>'],
			['44',<?php echo $tiledilamtuan44; ?>,'<?php echo $tiledilamtuan44; ?>',<?php echo $tilenghilamtuan44; ?>,'<?php echo $tilenghilamtuan44; ?>'],
			['45',<?php echo $tiledilamtuan45; ?>,'<?php echo $tiledilamtuan45; ?>',<?php echo $tilenghilamtuan45; ?>,'<?php echo $tilenghilamtuan45; ?>'],
			['46',<?php echo $tiledilamtuan46; ?>,'<?php echo $tiledilamtuan46; ?>',<?php echo $tilenghilamtuan46; ?>,'<?php echo $tilenghilamtuan46; ?>'],
			['47',<?php echo $tiledilamtuan47; ?>,'<?php echo $tiledilamtuan47; ?>',<?php echo $tilenghilamtuan47; ?>,'<?php echo $tilenghilamtuan47; ?>'],
			['48',<?php echo $tiledilamtuan48; ?>,'<?php echo $tiledilamtuan48; ?>',<?php echo $tilenghilamtuan48; ?>,'<?php echo $tilenghilamtuan48; ?>'],
			['49',<?php echo $tiledilamtuan49; ?>,'<?php echo $tiledilamtuan49; ?>',<?php echo $tilenghilamtuan49; ?>,'<?php echo $tilenghilamtuan49; ?>'],
			['50',<?php echo $tiledilamtuan50; ?>,'<?php echo $tiledilamtuan50; ?>',<?php echo $tilenghilamtuan50; ?>,'<?php echo $tilenghilamtuan50; ?>'],
			['51',<?php echo $tiledilamtuan51; ?>,'<?php echo $tiledilamtuan51; ?>',<?php echo $tilenghilamtuan51; ?>,'<?php echo $tilenghilamtuan51; ?>'],
			['52',<?php echo $tiledilamtuan52; ?>,'<?php echo $tiledilamtuan52; ?>',<?php echo $tilenghilamtuan52; ?>,'<?php echo $tilenghilamtuan52; ?>'],
			
			]);
		
		// Optional; add a title and set the width and height of the chart
		var materialOptions = {
			legend: {
				position: 'bottom'
				},
				title: '本月每週點名',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1530" , height:"350"} ,
						backgroundColor: '#c7deff',
						height:"430",
						width:"1620",
						vAxis: {
							format: '#\'%\'',	
							maxValue: 100,
						} ,   
						vAxes: {
							0: {textStyle: {color: '#131685', bold: true}},
							1: {textStyle: {color: '#DC143C', bold: true}},
						},
						animation: {
									duration: 500,
									easing: 'out',
									startup: true
									},
						
						series:{1: {type: "line",pointSize: 5},0: {type: "line",pointSize: 5}},
						curveType: 'function',
		};
		var classicOptions = {
			legend: {
				position: 'bottom'
				},
				title: '本月每週點名',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
							colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1530" , height:"350"} ,
						backgroundColor: '#c7deff',
						height:"430",
						width:"1620",
						vAxes: {
							0: {textStyle: {color: '#131685', bold: true}},
							1: {textStyle: {color: '#DC143C', bold: true}},
						},
						animation: {
									duration: 500,
									easing: 'out',
									startup: true
									},
						
						series:{1: {type: "line",pointSize: 5},0: {type: "line",pointSize: 5}},
						curveType: 'function',
		};
		
		 function drawMaterialChart() {
          var materialChart = new google.visualization.ColumnChart(chartDiv);
          materialChart.draw(data,materialOptions);
          button.innerText = '星期 1-26';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data1, classicOptions);
          button.innerText = '星期 27-52';
          button.onclick = drawMaterialChart;
        }
        drawMaterialChart();
		
		};
	</script>
	
	<script>
		google.load('visualization', '1', { packages: ['corechart', 'line'] });
		google.charts.setOnLoadCallback(drawBackgroundColor);

		function drawBackgroundColor() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', '');
		data.addColumn('number', '上班');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addColumn('number', '請假');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addRows([

			['1',<?php echo $tiledilamthang1; ?>,'<?php echo $tiledilamthang1; ?>%',<?php echo $tilenghilamthang1; ?>,'<?php echo $tilenghilamthang1; ?>%'],
			['2',<?php echo $tiledilamthang2; ?>,'<?php echo $tiledilamthang2; ?>%',<?php echo $tilenghilamthang2; ?>,'<?php echo $tilenghilamthang2; ?>%'],
			['3',<?php echo $tiledilamthang3; ?>,'<?php echo $tiledilamthang3; ?>%',<?php echo $tilenghilamthang3; ?>,'<?php echo $tilenghilamthang3; ?>%'],
			['4',<?php echo $tiledilamthang4; ?>,'<?php echo $tiledilamthang4; ?>%',<?php echo $tilenghilamthang4; ?>,'<?php echo $tilenghilamthang4; ?>%'],
			['5',<?php echo $tiledilamthang5; ?>,'<?php echo $tiledilamthang5; ?>%',<?php echo $tilenghilamthang5; ?>,'<?php echo $tilenghilamthang5; ?>%'],
			['6',<?php echo $tiledilamthang6; ?>,'<?php echo $tiledilamthang6; ?>%',<?php echo $tilenghilamthang6; ?>,'<?php echo $tilenghilamthang6; ?>%'],
			['7',<?php echo $tiledilamthang7; ?>,'<?php echo $tiledilamthang7; ?>%',<?php echo $tilenghilamthang7; ?>,'<?php echo $tilenghilamthang7; ?>%'],
			['8',<?php echo $tiledilamthang8; ?>,'<?php echo $tiledilamthang8; ?>%',<?php echo $tilenghilamthang8; ?>,'<?php echo $tilenghilamthang8; ?>%'],
			['9',<?php echo $tiledilamthang9; ?>,'<?php echo $tiledilamthang9; ?>%',<?php echo $tilenghilamthang9; ?>,'<?php echo $tilenghilamthang9; ?>%'],
			['10',<?php echo $tiledilamthang10; ?>,'<?php echo $tiledilamthang10; ?>%',<?php echo $tilenghilamthang10; ?>,'<?php echo $tilenghilamthang10; ?>%'],
			['11',<?php echo $tiledilamthang11; ?>,'<?php echo $tiledilamthang11; ?>%',<?php echo $tilenghilamthang11; ?>,'<?php echo $tilenghilamthang11; ?>%'],
			['12',<?php echo $tiledilamthang12; ?>,'<?php echo $tiledilamthang12; ?>%',<?php echo $tilenghilamthang12; ?>,'<?php echo $tilenghilamthang12; ?>%'],

		]);

		var options = {
			legend: {
				position: 'bottom'
				},
				title: '年每月點名',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1530" , height:"350"} ,
						backgroundColor: '#c7deff',
						height:"430",
						width:"1620",
						vAxis: {
							format: '#\'%\''
						} ,  
						vAxes: {
							0: {textStyle: {color: '#131685', bold: true}},
							1: {textStyle: {color: '#DC143C', bold: true}},
						},
						animation: {
									duration: 500,
									easing: 'out',
									startup: true
									},
						curveType: 'function',
						series:{1: {type: "line",pointSize: 5},0: {type: "line",pointSize: 5}},
		};

		var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		chart.draw(data, options);
		}
	</script>
	