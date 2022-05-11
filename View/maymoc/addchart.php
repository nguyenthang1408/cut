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
						<span style="">Trang Chủ</span>
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
						<button id="change-chart" class="buttont"></button>
						<div id="columnchart" style="padding-top:10px;"></div>
					</div>
					<div style="border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
						<div id="columnchart1"></div>
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
			['1',<?php echo round($dilamngay1,2); ?>,'<?php echo round($dilamngay1,2); ?>',<?php echo round($nghilamngay1,2); ?>,'<?php echo round($nghilamngay1,2); ?>'],
			['2',<?php echo round($dilamngay2,2); ?>,'<?php echo round($dilamngay2,2); ?>',<?php echo round($nghilamngay2,2); ?>,'<?php echo round($nghilamngay2,2); ?>'],
			['3',<?php echo round($dilamngay3,2); ?>,'<?php echo round($dilamngay3,2); ?>',<?php echo round($nghilamngay3,2); ?>,'<?php echo round($nghilamngay3,2); ?>'],
			['4',<?php echo round($dilamngay4,2); ?>,'<?php echo round($dilamngay4,2); ?>',<?php echo round($nghilamngay4,2); ?>,'<?php echo round($nghilamngay4,2); ?>'],
			['5',<?php echo round($dilamngay5,2); ?>,'<?php echo round($dilamngay5,2); ?>',<?php echo round($nghilamngay5,2); ?>,'<?php echo round($nghilamngay5,2); ?>'],
			['6',<?php echo round($dilamngay6,2); ?>,'<?php echo round($dilamngay6,2); ?>',<?php echo round($nghilamngay6,2); ?>,'<?php echo round($nghilamngay6,2); ?>'],
			['7',<?php echo round($dilamngay7,2); ?>,'<?php echo round($dilamngay7,2); ?>',<?php echo round($nghilamngay7,2); ?>,'<?php echo round($nghilamngay7,2); ?>'],
			['8',<?php echo round($dilamngay8,2); ?>,'<?php echo round($dilamngay8,2); ?>',<?php echo round($nghilamngay8,2); ?>,'<?php echo round($nghilamngay8,2); ?>'],
			['9',<?php echo round($dilamngay9,2); ?>,'<?php echo round($dilamngay9,2); ?>',<?php echo round($nghilamngay9,2); ?>,'<?php echo round($nghilamngay9,2); ?>'],
			]);

			var data1 = new google.visualization.DataTable();
			data1.addColumn('string', 'Năm');
			data1.addColumn('number', 'Đi làm');
			data1.addColumn({type: 'string', role: 'annotation'});
			data1.addColumn('number', 'Nghỉ làm');
			data1.addColumn({type: 'string', role: 'annotation'});
			data1.addRows([
				['10',<?php echo round($dilamngay10,2); ?>,'<?php echo round($dilamngay10,2); ?>',<?php echo round($nghilamngay10,2); ?>,'<?php echo round($nghilamngay10,2); ?>'],
				['11',<?php echo round($dilamngay11,2); ?>,'<?php echo round($dilamngay11,2); ?>',<?php echo round($nghilamngay11,2); ?>,'<?php echo round($nghilamngay11,2); ?>'],
				['12',<?php echo round($dilamngay12,2); ?>,'<?php echo round($dilamngay12,2); ?>',<?php echo round($nghilamngay12,2); ?>,'<?php echo round($nghilamngay12,2); ?>'],
				['13',<?php echo round($dilamngay13,2); ?>,'<?php echo round($dilamngay13,2); ?>',<?php echo round($nghilamngay13,2); ?>,'<?php echo round($nghilamngay13,2); ?>'],
				['14',<?php echo round($dilamngay14,2); ?>,'<?php echo round($dilamngay14,2); ?>',<?php echo round($nghilamngay14,2); ?>,'<?php echo round($nghilamngay14,2); ?>'],
				['15',<?php echo round($dilamngay15,2); ?>,'<?php echo round($dilamngay15,2); ?>',<?php echo round($nghilamngay15,2); ?>,'<?php echo round($nghilamngay15,2); ?>'],
				['16',<?php echo round($dilamngay16,2); ?>,'<?php echo round($dilamngay16,2); ?>',<?php echo round($nghilamngay16,2); ?>,'<?php echo round($nghilamngay16,2); ?>'],
				['17',<?php echo round($dilamngay17,2); ?>,'<?php echo round($dilamngay17,2); ?>',<?php echo round($nghilamngay17,2); ?>,'<?php echo round($nghilamngay17,2); ?>'],
				['18',<?php echo round($dilamngay18,2); ?>,'<?php echo round($dilamngay18,2); ?>',<?php echo round($nghilamngay18,2); ?>,'<?php echo round($nghilamngay18,2); ?>'],
				['19',<?php echo round($dilamngay19,2); ?>,'<?php echo round($dilamngay19,2); ?>',<?php echo round($nghilamngay19,2); ?>,'<?php echo round($nghilamngay19,2); ?>'],
				['20',<?php echo round($dilamngay20,2); ?>,'<?php echo round($dilamngay20,2); ?>',<?php echo round($nghilamngay20,2); ?>,'<?php echo round($nghilamngay20,2); ?>'],
				]);
			var data2 = new google.visualization.DataTable();
			data2.addColumn('string', 'Năm');
			data2.addColumn('number', 'Đi làm');
			data2.addColumn({type: 'string', role: 'annotation'});
			data2.addColumn('number', 'Nghỉ làm');
			data2.addColumn({type: 'string', role: 'annotation'});
			data2.addRows([
				
				['21',<?php echo round($dilamngay21,2); ?>,'<?php echo round($dilamngay21,2); ?>',<?php echo round($nghilamngay21,2); ?>,'<?php echo round($nghilamngay21,2); ?>'],
				['22',<?php echo round($dilamngay22,2); ?>,'<?php echo round($dilamngay22,2); ?>',<?php echo round($nghilamngay22,2); ?>,'<?php echo round($nghilamngay22,2); ?>'],
				['23',<?php echo round($dilamngay23,2); ?>,'<?php echo round($dilamngay23,2); ?>',<?php echo round($nghilamngay23,2); ?>,'<?php echo round($nghilamngay23,2); ?>'],
				['24',<?php echo round($dilamngay24,2); ?>,'<?php echo round($dilamngay24,2); ?>',<?php echo round($nghilamngay24,2); ?>,'<?php echo round($nghilamngay24,2); ?>'],
				['25',<?php echo round($dilamngay25,2); ?>,'<?php echo round($dilamngay25,2); ?>',<?php echo round($nghilamngay25,2); ?>,'<?php echo round($nghilamngay25,2); ?>'],
				['26',<?php echo round($dilamngay26,2); ?>,'<?php echo round($dilamngay26,2); ?>',<?php echo round($nghilamngay26,2); ?>,'<?php echo round($nghilamngay26,2); ?>'],
				['27',<?php echo round($dilamngay27,2); ?>,'<?php echo round($dilamngay27,2); ?>',<?php echo round($nghilamngay27,2); ?>,'<?php echo round($nghilamngay27,2); ?>'],
				['28',<?php echo round($dilamngay28,2); ?>,'<?php echo round($dilamngay28,2); ?>',<?php echo round($nghilamngay28,2); ?>,'<?php echo round($nghilamngay28,2); ?>'],
				['29',<?php echo round($dilamngay29,2); ?>,'<?php echo round($dilamngay29,2); ?>',<?php echo round($nghilamngay29,2); ?>,'<?php echo round($nghilamngay29,2); ?>'],
				['30',<?php echo round($dilamngay30,2); ?>,'<?php echo round($dilamngay30,2); ?>',<?php echo round($nghilamngay30,2); ?>,'<?php echo round($nghilamngay30,2); ?>'],
				['31',<?php echo round($dilamngay31,2); ?>,'<?php echo round($dilamngay31,2); ?>',<?php echo round($nghilamngay31,2); ?>,'<?php echo round($nghilamngay31,2); ?>'],
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
						chartArea:{width:"1270" , height:"320"} ,
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
				title: 'Điểm danh từng ngày trong tháng',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
							colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1270" , height:"320"} ,
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
		var classic1Options = {
			legend: {
				position: 'bottom'
				},
				title: 'Điểm danh từng ngày trong tháng',	
						titleTextStyle: {
							color: "#1656f0",
							fontSize: 25,           
							},
							colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1270" , height:"320"} ,
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
          button.innerText = 'Ngày 1-9';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data1, classicOptions);
          button.innerText = 'Ngày 10-20';
          button.onclick = drawClassic1Chart;
        }

		function drawClassic1Chart() {
			var classic1Chart = new google.visualization.ColumnChart(chartDiv);
			classic1Chart.draw(data2, classic1Options);
			button.innerText = 'Ngày 21-31';
			button.onclick = drawMaterialChart;
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
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Năm');
		data.addColumn('number', 'Đi làm');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addColumn('number', 'Nghỉ làm');
		data.addColumn({type: 'string', role: 'annotation'});
		data.addRows([

		['1',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['2',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['3',<?php echo round($tiledilamngay22,2); ?>,'<?php echo round($tiledilamngay22,2); ?>',<?php echo round($tilenghilamngay22,2); ?>,'<?php echo round($tilenghilamngay22,2); ?>'],
		['4',<?php echo round($tiledilamngay23,2); ?>,'<?php echo round($tiledilamngay23,2); ?>',<?php echo round($tilenghilamngay23,2); ?>,'<?php echo round($tilenghilamngay23,2); ?>'],
		['5',<?php echo round($tiledilamngay24,2); ?>,'<?php echo round($tiledilamngay24,2); ?>',<?php echo round($tilenghilamngay24,2); ?>,'<?php echo round($tilenghilamngay24,2); ?>'],
        ['6',<?php echo round($tiledilamngay25,2); ?>,'<?php echo round($tiledilamngay25,2); ?>',<?php echo round($tilenghilamngay25,2); ?>,'<?php echo round($tilenghilamngay25,2); ?>'],
		['7',<?php echo round($tiledilamngay26,2); ?>,'<?php echo round($tiledilamngay26,2); ?>',<?php echo round($tilenghilamngay26,2); ?>,'<?php echo round($tilenghilamngay26,2); ?>'],
		['8',<?php echo round($tiledilamngay27,2); ?>,'<?php echo round($tiledilamngay27,2); ?>',<?php echo round($tilenghilamngay27,2); ?>,'<?php echo round($tilenghilamngay27,2); ?>'],
		['9',<?php echo round($tiledilamngay28,2); ?>,'<?php echo round($tiledilamngay28,2); ?>',<?php echo round($tilenghilamngay28,2); ?>,'<?php echo round($tilenghilamngay28,2); ?>'],
		['10',<?php echo round($tiledilamngay29,2); ?>,'<?php echo round($tiledilamngay29,2); ?>',<?php echo round($tilenghilamngay29,2); ?>,'<?php echo round($tilenghilamngay29,2); ?>'],
		['11',<?php echo round($tiledilamngay11,2); ?>,'<?php echo round($tiledilamngay11,2); ?>',<?php echo round($tilenghilamngay11,2); ?>,'<?php echo round($tilenghilamngay11,2); ?>'],
		['12',<?php echo round($tiledilamngay12,2); ?>,'<?php echo round($tiledilamngay12,2); ?>',<?php echo round($tilenghilamngay12,2); ?>,'<?php echo round($tilenghilamngay12,2); ?>'],
		['13',<?php echo round($tiledilamngay29,2); ?>,'<?php echo round($tiledilamngay29,2); ?>',<?php echo round($tilenghilamngay29,2); ?>,'<?php echo round($tilenghilamngay29,2); ?>'],
		['14',<?php echo round($tiledilamngay11,2); ?>,'<?php echo round($tiledilamngay11,2); ?>',<?php echo round($tilenghilamngay11,2); ?>,'<?php echo round($tilenghilamngay11,2); ?>'],
		['15',<?php echo round($tiledilamngay12,2); ?>,'<?php echo round($tiledilamngay12,2); ?>',<?php echo round($tilenghilamngay12,2); ?>,'<?php echo round($tilenghilamngay12,2); ?>'],
		['16',<?php echo round($tiledilamngay1,2); ?>,'<?php echo round($tiledilamngay1,2); ?>',<?php echo round($tilenghilamngay1,2); ?>,'<?php echo round($tilenghilamngay1,2); ?>'],
		['17',<?php echo round($tiledilamngay2,2); ?>,'<?php echo round($tiledilamngay2,2); ?>',<?php echo round($tilenghilamngay2,2); ?>,'<?php echo round($tilenghilamngay2,2); ?>'],
		['18',<?php echo round($tiledilamngay3,2); ?>,'<?php echo round($tiledilamngay3,2); ?>',<?php echo round($tilenghilamngay3,2); ?>,'<?php echo round($tilenghilamngay3,2); ?>'],
		['19',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['20',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['21',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['22',<?php echo round($tiledilamngay22,2); ?>,'<?php echo round($tiledilamngay22,2); ?>',<?php echo round($tilenghilamngay22,2); ?>,'<?php echo round($tilenghilamngay22,2); ?>'],
		['23',<?php echo round($tiledilamngay23,2); ?>,'<?php echo round($tiledilamngay23,2); ?>',<?php echo round($tilenghilamngay23,2); ?>,'<?php echo round($tilenghilamngay23,2); ?>'],
		['24',<?php echo round($tiledilamngay24,2); ?>,'<?php echo round($tiledilamngay24,2); ?>',<?php echo round($tilenghilamngay24,2); ?>,'<?php echo round($tilenghilamngay24,2); ?>'],
        ['25',<?php echo round($tiledilamngay25,2); ?>,'<?php echo round($tiledilamngay25,2); ?>',<?php echo round($tilenghilamngay25,2); ?>,'<?php echo round($tilenghilamngay25,2); ?>'],
		['26',<?php echo round($tiledilamngay26,2); ?>,'<?php echo round($tiledilamngay26,2); ?>',<?php echo round($tilenghilamngay26,2); ?>,'<?php echo round($tilenghilamngay26,2); ?>'],
		['27',<?php echo round($tiledilamngay27,2); ?>,'<?php echo round($tiledilamngay27,2); ?>',<?php echo round($tilenghilamngay27,2); ?>,'<?php echo round($tilenghilamngay27,2); ?>'],
		['28',<?php echo round($tiledilamngay28,2); ?>,'<?php echo round($tiledilamngay28,2); ?>',<?php echo round($tilenghilamngay28,2); ?>,'<?php echo round($tilenghilamngay28,2); ?>'],
		['29',<?php echo round($tiledilamngay29,2); ?>,'<?php echo round($tiledilamngay29,2); ?>',<?php echo round($tilenghilamngay29,2); ?>,'<?php echo round($tilenghilamngay29,2); ?>'],
		['30',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['31',<?php echo round($tiledilamngay31,2); ?>,'<?php echo round($tiledilamngay31,2); ?>',<?php echo round($tilenghilamngay31,2); ?>,'<?php echo round($tilenghilamngay31,2); ?>'],
		['32',<?php echo round($tiledilamngay22,2); ?>,'<?php echo round($tiledilamngay22,2); ?>',<?php echo round($tilenghilamngay22,2); ?>,'<?php echo round($tilenghilamngay22,2); ?>'],
		['33',<?php echo round($tiledilamngay23,2); ?>,'<?php echo round($tiledilamngay23,2); ?>',<?php echo round($tilenghilamngay23,2); ?>,'<?php echo round($tilenghilamngay23,2); ?>'],
		['34',<?php echo round($tiledilamngay24,2); ?>,'<?php echo round($tiledilamngay24,2); ?>',<?php echo round($tilenghilamngay24,2); ?>,'<?php echo round($tilenghilamngay24,2); ?>'],
        ['35',<?php echo round($tiledilamngay25,2); ?>,'<?php echo round($tiledilamngay25,2); ?>',<?php echo round($tilenghilamngay25,2); ?>,'<?php echo round($tilenghilamngay25,2); ?>'],
		['36',<?php echo round($tiledilamngay26,2); ?>,'<?php echo round($tiledilamngay26,2); ?>',<?php echo round($tilenghilamngay26,2); ?>,'<?php echo round($tilenghilamngay26,2); ?>'],
		['37',<?php echo round($tiledilamngay27,2); ?>,'<?php echo round($tiledilamngay27,2); ?>',<?php echo round($tilenghilamngay27,2); ?>,'<?php echo round($tilenghilamngay27,2); ?>'],
		['38',<?php echo round($tiledilamngay28,2); ?>,'<?php echo round($tiledilamngay28,2); ?>',<?php echo round($tilenghilamngay28,2); ?>,'<?php echo round($tilenghilamngay28,2); ?>'],
		['39',<?php echo round($tiledilamngay29,2); ?>,'<?php echo round($tiledilamngay29,2); ?>',<?php echo round($tilenghilamngay29,2); ?>,'<?php echo round($tilenghilamngay29,2); ?>'],
		['40',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['41',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['42',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['43',<?php echo round($tiledilamngay22,2); ?>,'<?php echo round($tiledilamngay22,2); ?>',<?php echo round($tilenghilamngay22,2); ?>,'<?php echo round($tilenghilamngay22,2); ?>'],
		['44',<?php echo round($tiledilamngay23,2); ?>,'<?php echo round($tiledilamngay23,2); ?>',<?php echo round($tilenghilamngay23,2); ?>,'<?php echo round($tilenghilamngay23,2); ?>'],
		['45',<?php echo round($tiledilamngay24,2); ?>,'<?php echo round($tiledilamngay24,2); ?>',<?php echo round($tilenghilamngay24,2); ?>,'<?php echo round($tilenghilamngay24,2); ?>'],
        ['46',<?php echo round($tiledilamngay25,2); ?>,'<?php echo round($tiledilamngay25,2); ?>',<?php echo round($tilenghilamngay25,2); ?>,'<?php echo round($tilenghilamngay25,2); ?>'],
		['47',<?php echo round($tiledilamngay26,2); ?>,'<?php echo round($tiledilamngay26,2); ?>',<?php echo round($tilenghilamngay26,2); ?>,'<?php echo round($tilenghilamngay26,2); ?>'],
		['48',<?php echo round($tiledilamngay27,2); ?>,'<?php echo round($tiledilamngay27,2); ?>',<?php echo round($tilenghilamngay27,2); ?>,'<?php echo round($tilenghilamngay27,2); ?>'],
		['49',<?php echo round($tiledilamngay28,2); ?>,'<?php echo round($tiledilamngay28,2); ?>',<?php echo round($tilenghilamngay28,2); ?>,'<?php echo round($tilenghilamngay28,2); ?>'],
		['50',<?php echo round($tiledilamngay29,2); ?>,'<?php echo round($tiledilamngay29,2); ?>',<?php echo round($tilenghilamngay29,2); ?>,'<?php echo round($tilenghilamngay29,2); ?>'],
		['51',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		['52',<?php echo round($tiledilamngay30,2); ?>,'<?php echo round($tiledilamngay30,2); ?>',<?php echo round($tilenghilamngay30,2); ?>,'<?php echo round($tilenghilamngay30,2); ?>'],
		]);
		
		// Optional; add a title and set the width and height of the chart
		var options = {
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
						
						series:{1: {type: "line",pointSize: 5},0: {type: "line",pointSize: 5}},
		};
		var chart = new google.visualization.LineChart(document.getElementById('columnchart1'));
		chart.draw(data, options);
		}
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