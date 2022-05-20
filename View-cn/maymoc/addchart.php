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
						<div style="padding-left:10px;padding-top:10px;left:100px;background: #c7deff;border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
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
						<div style="border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
							<button id="change-chart2" class="buttont"></button>
							<div id="columnchart1" style="padding-top:10px;"></div>
						</div>
						<div style="padding-left:10px;background: #c7deff;border-radius: 20px;width:1500px; height: 550px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
							<span class="nace"><br><br>
								<div id="chart_div"></div>
							</span>
						</div>
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
						chartArea:{width:"1270" , height:"350"} ,
						backgroundColor: '#c7deff',
						height:"430",
						width:"1480",
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
			['1', <?php echo $dilamtuan1; ?>,'<?php echo $dilamtuan1; ?>',<?php echo $nghilamtuan1; ?>,'<?php echo $nghilamtuan1; ?>'],
			['2', <?php echo $dilamtuan2; ?>,'<?php echo $dilamtuan2; ?>',<?php echo $nghilamtuan2; ?>,'<?php echo $nghilamtuan2; ?>'],
			['3', <?php echo $dilamtuan3; ?>,'<?php echo $dilamtuan3; ?>',<?php echo $nghilamtuan3; ?>,'<?php echo $nghilamtuan3; ?>'],
			['4', <?php echo $dilamtuan4; ?>,'<?php echo $dilamtuan4; ?>',<?php echo $nghilamtuan4; ?>,'<?php echo $nghilamtuan4; ?>'],
			['5', <?php echo $dilamtuan5; ?>,'<?php echo $dilamtuan5; ?>',<?php echo $nghilamtuan5; ?>,'<?php echo $nghilamtuan5; ?>'],
			['6', <?php echo $dilamtuan6; ?>,'<?php echo $dilamtuan6; ?>',<?php echo $nghilamtuan6; ?>,'<?php echo $nghilamtuan6; ?>'],
			['7', <?php echo $dilamtuan7; ?>,'<?php echo $dilamtuan7; ?>',<?php echo $nghilamtuan7; ?>,'<?php echo $nghilamtuan7; ?>'],
			['8', <?php echo $dilamtuan8; ?>,'<?php echo $dilamtuan8; ?>',<?php echo $nghilamtuan8; ?>,'<?php echo $nghilamtuan8; ?>'],
			['9', <?php echo $dilamtuan9; ?>,'<?php echo $dilamtuan9; ?>',<?php echo $nghilamtuan9; ?>,'<?php echo $nghilamtuan9; ?>'],
			['10',<?php echo $dilamtuan10; ?>,'<?php echo $dilamtuan10; ?>',<?php echo $nghilamtuan10; ?>,'<?php echo $nghilamtuan10; ?>'],
			['11',<?php echo $dilamtuan11; ?>,'<?php echo $dilamtuan11; ?>',<?php echo $nghilamtuan11; ?>,'<?php echo $nghilamtuan11; ?>'],
			['12',<?php echo $dilamtuan12; ?>,'<?php echo $dilamtuan12; ?>',<?php echo $nghilamtuan12; ?>,'<?php echo $nghilamtuan12; ?>'],
			['13',<?php echo $dilamtuan13; ?>,'<?php echo $dilamtuan13; ?>',<?php echo $nghilamtuan13; ?>,'<?php echo $nghilamtuan13; ?>'],
			['14',<?php echo $dilamtuan14; ?>,'<?php echo $dilamtuan14; ?>',<?php echo $nghilamtuan14; ?>,'<?php echo $nghilamtuan14; ?>'],
			['15',<?php echo $dilamtuan15; ?>,'<?php echo $dilamtuan15; ?>',<?php echo $nghilamtuan15; ?>,'<?php echo $nghilamtuan15; ?>'],
			['16',<?php echo $dilamtuan16; ?>,'<?php echo $dilamtuan16; ?>',<?php echo $nghilamtuan16; ?>,'<?php echo $nghilamtuan16; ?>'],
			['17',<?php echo $dilamtuan17; ?>,'<?php echo $dilamtuan17; ?>',<?php echo $nghilamtuan17; ?>,'<?php echo $nghilamtuan17; ?>'],
			['18',<?php echo $dilamtuan18; ?>,'<?php echo $dilamtuan18; ?>',<?php echo $nghilamtuan18; ?>,'<?php echo $nghilamtuan18; ?>'],
			['19',<?php echo $dilamtuan19; ?>,'<?php echo $dilamtuan19; ?>',<?php echo $nghilamtuan19; ?>,'<?php echo $nghilamtuan19; ?>'],
			['20',<?php echo $dilamtuan20; ?>,'<?php echo $dilamtuan20; ?>',<?php echo $nghilamtuan20; ?>,'<?php echo $nghilamtuan20; ?>'],
			['21',<?php echo $dilamtuan21; ?>,'<?php echo $dilamtuan21; ?>',<?php echo $nghilamtuan21; ?>,'<?php echo $nghilamtuan21; ?>'],
			['22',<?php echo $dilamtuan22; ?>,'<?php echo $dilamtuan22; ?>',<?php echo $nghilamtuan22; ?>,'<?php echo $nghilamtuan22; ?>'],
			['23',<?php echo $dilamtuan23; ?>,'<?php echo $dilamtuan23; ?>',<?php echo $nghilamtuan23; ?>,'<?php echo $nghilamtuan23; ?>'],
			['24',<?php echo $dilamtuan24; ?>,'<?php echo $dilamtuan24; ?>',<?php echo $nghilamtuan24; ?>,'<?php echo $nghilamtuan24; ?>'],
			['25',<?php echo $dilamtuan25; ?>,'<?php echo $dilamtuan25; ?>',<?php echo $nghilamtuan25; ?>,'<?php echo $nghilamtuan25; ?>'],
			['26',<?php echo $dilamtuan26; ?>,'<?php echo $dilamtuan26; ?>',<?php echo $nghilamtuan26; ?>,'<?php echo $nghilamtuan26; ?>'],
			]);

		var data1 = new google.visualization.DataTable();
		data1.addColumn('string', '');
		data1.addColumn('number', '上班');
		data1.addColumn({type: 'string', role: 'annotation'});
		data1.addColumn('number', '請假');
		data1.addColumn({type: 'string', role: 'annotation'});
		data1.addRows([
			['27',<?php echo $dilamtuan27; ?>,'<?php echo $dilamtuan27; ?>',<?php echo $nghilamtuan27; ?>,'<?php echo $nghilamtuan27; ?>'],
			['28',<?php echo $dilamtuan28; ?>,'<?php echo $dilamtuan28; ?>',<?php echo $nghilamtuan28; ?>,'<?php echo $nghilamtuan28; ?>'],
			['29',<?php echo $dilamtuan29; ?>,'<?php echo $dilamtuan29; ?>',<?php echo $nghilamtuan29; ?>,'<?php echo $nghilamtuan29; ?>'],
			['30',<?php echo $dilamtuan30; ?>,'<?php echo $dilamtuan30; ?>',<?php echo $nghilamtuan30; ?>,'<?php echo $nghilamtuan30; ?>'],
			['31',<?php echo $dilamtuan31; ?>,'<?php echo $dilamtuan31; ?>',<?php echo $nghilamtuan31; ?>,'<?php echo $nghilamtuan31; ?>'],
			['32',<?php echo $dilamtuan32; ?>,'<?php echo $dilamtuan32; ?>',<?php echo $nghilamtuan32; ?>,'<?php echo $nghilamtuan32; ?>'],
			['33',<?php echo $dilamtuan33; ?>,'<?php echo $dilamtuan33; ?>',<?php echo $nghilamtuan33; ?>,'<?php echo $nghilamtuan33; ?>'],
			['34',<?php echo $dilamtuan34; ?>,'<?php echo $dilamtuan34; ?>',<?php echo $nghilamtuan34; ?>,'<?php echo $nghilamtuan34; ?>'],
			['35',<?php echo $dilamtuan35; ?>,'<?php echo $dilamtuan35; ?>',<?php echo $nghilamtuan35; ?>,'<?php echo $nghilamtuan35; ?>'],
			['36',<?php echo $dilamtuan36; ?>,'<?php echo $dilamtuan36; ?>',<?php echo $nghilamtuan36; ?>,'<?php echo $nghilamtuan36; ?>'],
			['37',<?php echo $dilamtuan37; ?>,'<?php echo $dilamtuan37; ?>',<?php echo $nghilamtuan37; ?>,'<?php echo $nghilamtuan37; ?>'],
			['38',<?php echo $dilamtuan38; ?>,'<?php echo $dilamtuan38; ?>',<?php echo $nghilamtuan38; ?>,'<?php echo $nghilamtuan38; ?>'],
			['39',<?php echo $dilamtuan39; ?>,'<?php echo $dilamtuan39; ?>',<?php echo $nghilamtuan39; ?>,'<?php echo $nghilamtuan39; ?>'],
			['40',<?php echo $dilamtuan40; ?>,'<?php echo $dilamtuan40; ?>',<?php echo $nghilamtuan40; ?>,'<?php echo $nghilamtuan40; ?>'],
			['41',<?php echo $dilamtuan41; ?>,'<?php echo $dilamtuan41; ?>',<?php echo $nghilamtuan41; ?>,'<?php echo $nghilamtuan41; ?>'],
			['42',<?php echo $dilamtuan42; ?>,'<?php echo $dilamtuan42; ?>',<?php echo $nghilamtuan42; ?>,'<?php echo $nghilamtuan42; ?>'],
			['43',<?php echo $dilamtuan43; ?>,'<?php echo $dilamtuan43; ?>',<?php echo $nghilamtuan43; ?>,'<?php echo $nghilamtuan43; ?>'],
			['44',<?php echo $dilamtuan44; ?>,'<?php echo $dilamtuan44; ?>',<?php echo $nghilamtuan44; ?>,'<?php echo $nghilamtuan44; ?>'],
			['45',<?php echo $dilamtuan45; ?>,'<?php echo $dilamtuan45; ?>',<?php echo $nghilamtuan45; ?>,'<?php echo $nghilamtuan45; ?>'],
			['46',<?php echo $dilamtuan46; ?>,'<?php echo $dilamtuan46; ?>',<?php echo $nghilamtuan46; ?>,'<?php echo $nghilamtuan46; ?>'],
			['47',<?php echo $dilamtuan47; ?>,'<?php echo $dilamtuan47; ?>',<?php echo $nghilamtuan47; ?>,'<?php echo $nghilamtuan47; ?>'],
			['48',<?php echo $dilamtuan48; ?>,'<?php echo $dilamtuan48; ?>',<?php echo $nghilamtuan48; ?>,'<?php echo $nghilamtuan48; ?>'],
			['49',<?php echo $dilamtuan49; ?>,'<?php echo $dilamtuan49; ?>',<?php echo $nghilamtuan49; ?>,'<?php echo $nghilamtuan49; ?>'],
			['50',<?php echo $dilamtuan50; ?>,'<?php echo $dilamtuan50; ?>',<?php echo $nghilamtuan50; ?>,'<?php echo $nghilamtuan50; ?>'],
			['51',<?php echo $dilamtuan51; ?>,'<?php echo $dilamtuan51; ?>',<?php echo $nghilamtuan51; ?>,'<?php echo $nghilamtuan51; ?>'],
			['52',<?php echo $dilamtuan52; ?>,'<?php echo $dilamtuan52; ?>',<?php echo $nghilamtuan52; ?>,'<?php echo $nghilamtuan52; ?>'],
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
						chartArea:{width:"1270" , height:"300"} ,
						backgroundColor: '#c7deff',
						height:"400",
						width:"1480",
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
						chartArea:{width:"1270" , height:"300"} ,
						backgroundColor: '#c7deff',
						height:"400",
						width:"1480",
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

			['1',<?php echo round($tiledilamthang1,2); ?>,'<?php echo round($tiledilamthang1,2); ?>%',<?php echo round($tilenghilamthang1,2); ?>,'<?php echo round($tilenghilamthang1,2); ?>%'],
			['2',<?php echo round($tiledilamthang2,2); ?>,'<?php echo round($tiledilamthang2,2); ?>%',<?php echo round($tilenghilamthang2,2); ?>,'<?php echo round($tilenghilamthang2,2); ?>%'],
			['3',<?php echo round($tiledilamthang3,2); ?>,'<?php echo round($tiledilamthang3,2); ?>%',<?php echo round($tilenghilamthang3,2); ?>,'<?php echo round($tilenghilamthang3,2); ?>%'],
			['4',<?php echo round($tiledilamthang4,2); ?>,'<?php echo round($tiledilamthang4,2); ?>%',<?php echo round($tilenghilamthang4,2); ?>,'<?php echo round($tilenghilamthang4,2); ?>%'],
			['5',<?php echo round($tiledilamthang5,2); ?>,'<?php echo round($tiledilamthang5,2); ?>%',<?php echo round($tilenghilamthang5,2); ?>,'<?php echo round($tilenghilamthang5,2); ?>%'],
			['6',<?php echo round($tiledilamthang6,2); ?>,'<?php echo round($tiledilamthang6,2); ?>%',<?php echo round($tilenghilamthang6,2); ?>,'<?php echo round($tilenghilamthang6,2); ?>%'],
			['7',<?php echo round($tiledilamthang7,2); ?>,'<?php echo round($tiledilamthang7,2); ?>%',<?php echo round($tilenghilamthang7,2); ?>,'<?php echo round($tilenghilamthang7,2); ?>%'],
			['8',<?php echo round($tiledilamthang8,2); ?>,'<?php echo round($tiledilamthang8,2); ?>%',<?php echo round($tilenghilamthang8,2); ?>,'<?php echo round($tilenghilamthang8,2); ?>%'],
			['9',<?php echo round($tiledilamthang9,2); ?>,'<?php echo round($tiledilamthang9,2); ?>%',<?php echo round($tilenghilamthang9,2); ?>,'<?php echo round($tilenghilamthang9,2); ?>%'],
			['10',<?php echo round($tiledilamthang10,2); ?>,'<?php echo round($tiledilamthang10,2); ?>%',<?php echo round($tilenghilamthang10,2); ?>,'<?php echo round($tilenghilamthang10,2); ?>%'],
			['11',<?php echo round($tiledilamthang11,2); ?>,'<?php echo round($tiledilamthang11,2); ?>%',<?php echo round($tilenghilamthang11,2); ?>,'<?php echo round($tilenghilamthang11,2); ?>%'],
			['12',<?php echo round($tiledilamthang12,2); ?>,'<?php echo round($tiledilamthang12,2); ?>%',<?php echo round($tilenghilamthang12,2); ?>,'<?php echo round($tilenghilamthang12,2); ?>%'],

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
						chartArea:{width:"1270" , height:"400"} ,
						backgroundColor: '#c7deff',
						height:"480",
						width:"1480",
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
	