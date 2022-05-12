<?php 
    include "../Model/DBconfig.php";
    include "../Model/datachart.php";
    $db = new Database();
    $db -> connect();
    session_start();

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
								<span style="">Tài Khoản</span>
							</a>
						</li>

						<li><a href="">Điểm Danh</a></li>
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
			   				<h1 class="logo-title" style="">
							   <span style="">VN Cable <br/> Tự động hóa</span>
							</h1>
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
					<a href="../Controller/index.php?action=test2" class="a1">
						<i class="fas fa-solid fa-house-user a1i"></i>
						<span style="">Trang Chủ <?php echo $thang; ?></span>
					</a>
					<a class="a2" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
						<i style="" class="fas fa-solid fa-user"></i>
						<span style="">Tài Khoản</span>
					</a>
					<a href="../Employee-management-system/admin/dashboard.php" class="a3">
						<i style="" class="fas fa-solid fa-info a3i"></i>
						<span style="" class="">Điểm Danh</span>
					</a>
						      
				</nav>
					
                <footer class="footer">					
					<div class="logof">
						<a href="#" class="a2">
							<form action="" method="POST">
									<input style="" type="submit" name="dangxuat" value="Đăng Xuất" class="">
							</form>
						</a>
					</div>
				</footer>
			</header>
			<div class="app-body-main-content" style="width:82vw">
				<div style=" display: grid;grid-template-columns: repeat(1, 1fr);column-gap: 1.6rem;row-gap: 2rem;margin-top: 1rem;grid-template-columns: %  ;">
					<div style="padding-left:10px;padding-top:10px;left:100px;background: #c7deff;border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
						<button onclick="Foo()" id="change-chart" class="buttont"></button>
						<div id="columnchart" style="padding-top:10px;"></div>
					</div>
					<div style="border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
					<button id="change-chart2" class="buttont"></button>
						<div id="columnchart1" style="padding-top:10px;"></div>
					</div>
					<div style="padding-left:10px;background: #c7deff;border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
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
				<h5 class="modal-title" id="exampleModalLabel">Nhập Mật Khẩu</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="col-form-label">Mật Khẩu:</label>
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
				<button type="button" id="xacnhan" class="btn btn-primary">Xác Nhận</button>
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
		 <?php echo $thang; ?>
		 function Foo(){
			 $thang++;
		 }
	 </script>
     <script type="text/javascript">
		// Load google charts
		google.charts.load('current', {
		packages: ['corechart', 'line']
		});
		google.charts.setOnLoadCallback(drawCurveTypes);

		function drawCurveTypes() {
		var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('columnchart');

		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Năm');
		data.addColumn('number', 'Đi làm');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addColumn('number', 'Nghỉ làm');
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
				title: 'Điểm danh từng ngày trong tháng',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1270" , height:"360"} ,
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
		  button.innerText = 'Tháng <?php echo $thang; ?>';
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
		data.addColumn('string', 'Năm');
		data.addColumn('number', 'Đi làm');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addColumn('number', 'Nghỉ làm');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addRows([
			['1', <?php echo $dilamtuan11; ?>,'<?php echo $dilamtuan11; ?>',<?php echo $nghilamtuan11; ?>,'<?php echo $nghilamtuan11; ?>'],
			['2', <?php echo $dilamtuan21; ?>,'<?php echo $dilamtuan21; ?>',<?php echo $nghilamtuan21; ?>,'<?php echo $nghilamtuan21; ?>'],
			['3', <?php echo $dilamtuan31; ?>,'<?php echo $dilamtuan31; ?>',<?php echo $nghilamtuan31; ?>,'<?php echo $nghilamtuan31; ?>'],
			['4', <?php echo $dilamtuan41; ?>,'<?php echo $dilamtuan41; ?>',<?php echo $nghilamtuan41; ?>,'<?php echo $nghilamtuan41; ?>'],
			['5', <?php echo $dilamtuan12; ?>,'<?php echo $dilamtuan12; ?>',<?php echo $nghilamtuan12; ?>,'<?php echo $nghilamtuan12; ?>'],
			['6', <?php echo $dilamtuan22; ?>,'<?php echo $dilamtuan22; ?>',<?php echo $nghilamtuan22; ?>,'<?php echo $nghilamtuan22; ?>'],
			['7', <?php echo $dilamtuan32; ?>,'<?php echo $dilamtuan32; ?>',<?php echo $nghilamtuan32; ?>,'<?php echo $nghilamtuan32; ?>'],
			['8', <?php echo $dilamtuan42; ?>,'<?php echo $dilamtuan42; ?>',<?php echo $nghilamtuan42; ?>,'<?php echo $nghilamtuan42; ?>'],
			['9', <?php echo $dilamtuan13; ?>,'<?php echo $dilamtuan13; ?>',<?php echo $nghilamtuan13; ?>,'<?php echo $nghilamtuan13; ?>'],
			['10',<?php echo $dilamtuan23; ?>,'<?php echo $dilamtuan23; ?>',<?php echo $nghilamtuan23; ?>,'<?php echo $nghilamtuan23; ?>'],
			['11',<?php echo $dilamtuan33; ?>,'<?php echo $dilamtuan33; ?>',<?php echo $nghilamtuan33; ?>,'<?php echo $nghilamtuan33; ?>'],
			['12',<?php echo $dilamtuan43; ?>,'<?php echo $dilamtuan43; ?>',<?php echo $nghilamtuan43; ?>,'<?php echo $nghilamtuan43; ?>'],
			['13',<?php echo $dilamtuan14; ?>,'<?php echo $dilamtuan14; ?>',<?php echo $nghilamtuan14; ?>,'<?php echo $nghilamtuan14; ?>'],
			['14',<?php echo $dilamtuan24; ?>,'<?php echo $dilamtuan24; ?>',<?php echo $nghilamtuan24; ?>,'<?php echo $nghilamtuan24; ?>'],
			['15',<?php echo $dilamtuan34; ?>,'<?php echo $dilamtuan34; ?>',<?php echo $nghilamtuan34; ?>,'<?php echo $nghilamtuan34; ?>'],
			['16',<?php echo $dilamtuan44; ?>,'<?php echo $dilamtuan44; ?>',<?php echo $nghilamtuan44; ?>,'<?php echo $nghilamtuan44; ?>'],
			['17',<?php echo $dilamtuan15; ?>,'<?php echo $dilamtuan15; ?>',<?php echo $nghilamtuan15; ?>,'<?php echo $nghilamtuan15; ?>'],
			['18',<?php echo $dilamtuan25; ?>,'<?php echo $dilamtuan25; ?>',<?php echo $nghilamtuan25; ?>,'<?php echo $nghilamtuan25; ?>'],
			['19',<?php echo $dilamtuan35; ?>,'<?php echo $dilamtuan35; ?>',<?php echo $nghilamtuan35; ?>,'<?php echo $nghilamtuan35; ?>'],
			['20',<?php echo $dilamtuan45; ?>,'<?php echo $dilamtuan45; ?>',<?php echo $nghilamtuan45; ?>,'<?php echo $nghilamtuan45; ?>'],
			['21',<?php echo $dilamtuan16; ?>,'<?php echo $dilamtuan16; ?>',<?php echo $nghilamtuan16; ?>,'<?php echo $nghilamtuan16; ?>'],
			['22',<?php echo $dilamtuan26; ?>,'<?php echo $dilamtuan26; ?>',<?php echo $nghilamtuan26; ?>,'<?php echo $nghilamtuan26; ?>'],
			['23',<?php echo $dilamtuan36; ?>,'<?php echo $dilamtuan36; ?>',<?php echo $nghilamtuan36; ?>,'<?php echo $nghilamtuan36; ?>'],
			['24',<?php echo $dilamtuan46; ?>,'<?php echo $dilamtuan46; ?>',<?php echo $nghilamtuan46; ?>,'<?php echo $nghilamtuan46; ?>'],
			]);

		var data1 = new google.visualization.DataTable();
		data1.addColumn('string', 'Năm');
		data1.addColumn('number', 'Đi làm');
		data1.addColumn({type: 'string', role: 'annotation'});
		data1.addColumn('number', 'Nghỉ làm');
		data1.addColumn({type: 'string', role: 'annotation'});
		data1.addRows([
			['25',<?php echo $dilamtuan17; ?>,'<?php echo $dilamtuan17; ?>',<?php echo $nghilamtuan17; ?>,'<?php echo $nghilamtuan17; ?>'],
			['26',<?php echo $dilamtuan27; ?>,'<?php echo $dilamtuan27; ?>',<?php echo $nghilamtuan27; ?>,'<?php echo $nghilamtuan27; ?>'],
			['27',<?php echo $dilamtuan37; ?>,'<?php echo $dilamtuan37; ?>',<?php echo $nghilamtuan37; ?>,'<?php echo $nghilamtuan37; ?>'],
			['28',<?php echo $dilamtuan47; ?>,'<?php echo $dilamtuan47; ?>',<?php echo $nghilamtuan47; ?>,'<?php echo $nghilamtuan47; ?>'],
			['29',<?php echo $dilamtuan18; ?>,'<?php echo $dilamtuan18; ?>',<?php echo $nghilamtuan18; ?>,'<?php echo $nghilamtuan18; ?>'],
			['30',<?php echo $dilamtuan28; ?>,'<?php echo $dilamtuan28; ?>',<?php echo $nghilamtuan28; ?>,'<?php echo $nghilamtuan28; ?>'],
			['31',<?php echo $dilamtuan38; ?>,'<?php echo $dilamtuan38; ?>',<?php echo $nghilamtuan38; ?>,'<?php echo $nghilamtuan38; ?>'],
			['32',<?php echo $dilamtuan48; ?>,'<?php echo $dilamtuan48; ?>',<?php echo $nghilamtuan48; ?>,'<?php echo $nghilamtuan48; ?>'],
			['33',<?php echo $dilamtuan19; ?>,'<?php echo $dilamtuan19; ?>',<?php echo $nghilamtuan19; ?>,'<?php echo $nghilamtuan19; ?>'],
			['34',<?php echo $dilamtuan29; ?>,'<?php echo $dilamtuan29; ?>',<?php echo $nghilamtuan29; ?>,'<?php echo $nghilamtuan29; ?>'],
			['35',<?php echo $dilamtuan39; ?>,'<?php echo $dilamtuan39; ?>',<?php echo $nghilamtuan39; ?>,'<?php echo $nghilamtuan39; ?>'],
			['36',<?php echo $dilamtuan49; ?>,'<?php echo $dilamtuan49; ?>',<?php echo $nghilamtuan49; ?>,'<?php echo $nghilamtuan49; ?>'],
			['37',<?php echo $dilamtuan110; ?>,'<?php echo $dilamtuan110; ?>',<?php echo $nghilamtuan110; ?>,'<?php echo $nghilamtuan110; ?>'],
			['38',<?php echo $dilamtuan210; ?>,'<?php echo $dilamtuan210; ?>',<?php echo $nghilamtuan210; ?>,'<?php echo $nghilamtuan210; ?>'],
			['39',<?php echo $dilamtuan310; ?>,'<?php echo $dilamtuan310; ?>',<?php echo $nghilamtuan310; ?>,'<?php echo $nghilamtuan310; ?>'],
			['40',<?php echo $dilamtuan410; ?>,'<?php echo $dilamtuan410; ?>',<?php echo $nghilamtuan410; ?>,'<?php echo $nghilamtuan410; ?>'],
			['41',<?php echo $dilamtuan111; ?>,'<?php echo $dilamtuan111; ?>',<?php echo $nghilamtuan111; ?>,'<?php echo $nghilamtuan111; ?>'],
			['42',<?php echo $dilamtuan211; ?>,'<?php echo $dilamtuan211; ?>',<?php echo $nghilamtuan211; ?>,'<?php echo $nghilamtuan211; ?>'],
			['43',<?php echo $dilamtuan311; ?>,'<?php echo $dilamtuan311; ?>',<?php echo $nghilamtuan311; ?>,'<?php echo $nghilamtuan311; ?>'],
			['44',<?php echo $dilamtuan411; ?>,'<?php echo $dilamtuan411; ?>',<?php echo $nghilamtuan411; ?>,'<?php echo $nghilamtuan411; ?>'],
			['45',<?php echo $dilamtuan112; ?>,'<?php echo $dilamtuan112; ?>',<?php echo $nghilamtuan112; ?>,'<?php echo $nghilamtuan112; ?>'],
			['46',<?php echo $dilamtuan212; ?>,'<?php echo $dilamtuan212; ?>',<?php echo $nghilamtuan212; ?>,'<?php echo $nghilamtuan212; ?>'],
			['47',<?php echo $dilamtuan312; ?>,'<?php echo $dilamtuan312; ?>',<?php echo $nghilamtuan312; ?>,'<?php echo $nghilamtuan312; ?>'],
			['48',<?php echo $dilamtuan412; ?>,'<?php echo $dilamtuan412; ?>',<?php echo $nghilamtuan412; ?>,'<?php echo $nghilamtuan412; ?>'],
			
			]);
		
		// Optional; add a title and set the width and height of the chart
		var materialOptions = {
			legend: {
				position: 'bottom'
				},
				title: 'Điểm danh từng tuần trong năm',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1270" , height:"350"} ,
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
				title: 'Điểm danh từng tuần trong năm',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
							colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1270" , height:"350"} ,
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
          button.innerText = 'Tuần 1-24';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data1, classicOptions);
          button.innerText = 'Tuần 25-48';
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
		data.addColumn('string', 'Năm');
		data.addColumn('number', 'Đi làm');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addColumn('number', 'Nghỉ làm');
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
				title: 'Điểm danh từng tháng trong năm',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1270" , height:"350"} ,
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
    google.visualization.events.addOneTimeListener(chart, 'ready', function () {
        addChartGradient(chart);
    });
		chart.draw(data, options);
		}

		function addChartGradient(chart) {
			var chartDiv = chart.getContainer();
			var svg = chartDiv.getElementsByTagName('svg')[0];
			var properties = {
				id: "chartGradient",
				x1: "0%",
				y1: "0%",
				x2: "0%",
				y2: "100%",
				stops: [
					{ offset: '5%', 'stop-color': '#f60' },
					{ offset: '95%', 'stop-color': '#ff6' }
				]
			};
			

			createGradient(svg, properties);
			var chartPath = svg.getElementsByTagName('path')[1];  //0 path corresponds to legend path
			chartPath.setAttribute('stroke', 'url(#chartGradient)');
		}


		function createGradient(svg, properties) {
			var svgNS = svg.namespaceURI;
			var grad = document.createElementNS(svgNS, 'linearGradient');
			grad.setAttribute('id', properties.id);
			["x1","y1","x2","y2"].forEach(function(name) {
				if (properties.hasOwnProperty(name)) {
					grad.setAttribute(name, properties[name]);
				}
			});
			for (var i = 0; i < properties.stops.length; i++) {
				var attrs = properties.stops[i];
				var stop = document.createElementNS(svgNS, 'stop');
				for (var attr in attrs) {
					if (attrs.hasOwnProperty(attr)) stop.setAttribute(attr, attrs[attr]);
				}
				grad.appendChild(stop);
			}

			var defs = svg.querySelector('defs') ||
				svg.insertBefore(document.createElementNS(svgNS, 'defs'), svg.firstChild);
			return defs.appendChild(grad);
		}
	</script>
	