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
						<div id="columnchart"></div>
					</div>
					<div style="border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
						<div id="columnchart1"></div>
					</div>
					<div style="padding-left:10px;padding-top:10px;background: #c7deff;border-radius: 20px;width:1500px; height: 500px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
						<div id="columnchart2"></div>
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
		Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Tuần', 'Đi làm', 'Đi làm', 'Nghỉ làm', 'Nghỉ làm'],
		['Tuần 1',<?php echo $tiledilamtuan1; ?>,<?php echo $tiledilamtuan1; ?>,<?php echo $tilenghilamtuan1; ?>,<?php echo $tilenghilamtuan1; ?>],
		['Tuần 2',<?php echo $tiledilamtuan2; ?>,<?php echo $tiledilamtuan2; ?>,<?php echo $tilenghilamtuan2; ?>,<?php echo $tilenghilamtuan2; ?>],
		['Tuần 3',<?php echo $tiledilamtuan3; ?>,<?php echo $tiledilamtuan3; ?>,<?php echo $tilenghilamtuan3; ?>,<?php echo $tilenghilamtuan3; ?>],
		['Tuần 4',<?php echo $tiledilamtuan4; ?>,<?php echo $tiledilamtuan4; ?>,<?php echo $tilenghilamtuan4; ?>,<?php echo $tilenghilamtuan4; ?>],
		]);
		
		// Optional; add a title and set the width and height of the chart
		var options = {	title: 'Điểm danh trong tháng',
						titleTextStyle: {
										color: "#1656f0",
										fontSize: 25,           
										},
						colors: ['#7B68EE','#7B68EE','#FF7F50','#FF7F50'],
						backgroundColor: '#c7deff',
						height:"360",
						width:"720",
						chartArea:{width:"1250" , height:"350"} ,
						vAxis: {
							format: '#\'%\''
						} ,  
                		animation:	{
									duration: 500,
									easing: 'out',
									},
									vAxis: {
							
							minValue: 0, maxValue: 100,format: '#\'%\''},
					series: {
									1: {targetAxisIndex: 1},
									2: {targetAxisIndex: 2}
								},
						
						seriesType: "bars",
						series:{1: {type: "line",pointSize: 1},2: {type: "line",pointSize: 1}},		
						// curveType: 'function',		
						
            };

		// Display the chart inside the <div> element with id="piechart"
		var chart = new google.visualization.ComboChart(document.getElementById(''));
        chart.draw(data, options);
		}
    


	</script>
	
    <script type="text/javascript">
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Tháng', 'Đi làm', 'Nghỉ làm','Đi làm','Nghỉ làm'],
		['1',<?php echo round($tiledilamthang1,2); ?>,<?php echo round($tilenghilamthang1,2); ?>,<?php echo round($tiledilamthang1,2); ?>,<?php echo round($tilenghilamthang1,2); ?>],
		['2',<?php echo round($tiledilamthang2,2); ?>,<?php echo round($tilenghilamthang2,2); ?>,<?php echo round($tiledilamthang2,2); ?>,<?php echo round($tilenghilamthang2,2); ?>],
		['3',<?php echo round($tiledilamthang3,2); ?>,<?php echo round($tilenghilamthang3,2); ?>,<?php echo round($tiledilamthang3,2); ?>,<?php echo round($tilenghilamthang3,2); ?>],
		['4',<?php echo round($tiledilamthang4,2); ?>,<?php echo round($tilenghilamthang4,2); ?>,<?php echo round($tiledilamthang4,2); ?>,<?php echo round($tilenghilamthang4,2); ?>],
		['5',<?php echo round($tiledilamthang5,2); ?>,<?php echo round($tilenghilamthang5,2); ?>,<?php echo round($tiledilamthang5,2); ?>,<?php echo round($tilenghilamthang5,2); ?>],
		['6',<?php echo round($tiledilamthang6,2); ?>,<?php echo round($tilenghilamthang6,2); ?>,<?php echo round($tiledilamthang6,2); ?>,<?php echo round($tilenghilamthang6,2); ?>],
		['7',<?php echo round($tiledilamthang7,2); ?>,<?php echo round($tilenghilamthang7,2); ?>,<?php echo round($tiledilamthang7,2); ?>,<?php echo round($tilenghilamthang7,2); ?>],
		['8',<?php echo round($tiledilamthang8,2); ?>,<?php echo round($tilenghilamthang8,2); ?>,<?php echo round($tiledilamthang8,2); ?>,<?php echo round($tilenghilamthang8,2); ?>],
		['9',<?php echo round($tiledilamthang9,2); ?>,<?php echo round($tilenghilamthang9,2); ?>,<?php echo round($tiledilamthang9,2); ?>,<?php echo round($tilenghilamthang9,2); ?>],
		['10',<?php echo round($tiledilamthang10,2); ?>,<?php echo round($tilenghilamthang10,2); ?>,<?php echo round($tiledilamthang10,2); ?>,<?php echo round($tilenghilamthang10,2); ?>],
		['11',<?php echo round($tiledilamthang11,2); ?>,<?php echo round($tilenghilamthang11,2); ?>,<?php echo round($tiledilamthang11,2); ?>,<?php echo round($tilenghilamthang11,2); ?>],
		['12',<?php echo round($tiledilamthang12,2); ?>,<?php echo round($tilenghilamthang12,2); ?>,<?php echo round($tiledilamthang12,2); ?>,<?php echo round($tilenghilamthang12,2); ?>],
		]);
		// Optional; add a title and set the width and height of the chart
		var options = {	title: 'Điểm danh trong năm',	
						titleTextStyle: {
										color: "#1656f0",
										fontSize: 25,           
										},
						colors: ['#6495ED', '#DC143C'],
						backgroundColor: '#c7deff',
						height:"480",
						width:"1480",
						chartArea:{width:"1200" , height:"350"} ,
						vAxis: {
							format: '#\'%\''
						} ,  
						vAxes: {
						
							0: {textStyle: {color: '#131685', bold: true}},
						},
						animation: {
									duration: 500,
									easing: 'out',
									startup: true
									},
						series:{	
									1: {type: "line",pointSize: 1},2: {type: "line",pointSize: 1}
								},
						// curveType: 'function',			
					};

		// Display the chart inside the <div> element with id="piechart"
		var chart = new google.visualization.ColumnChart(document.getElementById('columnchart2'));
		chart.draw(data, options);
		}
	</script>
     <script type="text/javascript">
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Ngày', 'Đi làm', 'Nghỉ làm','Đi làm','Nghỉ làm'],
		['1',<?php echo round($tiledilamngay1,2); ?>,<?php echo round($tilenghilamngay1,2); ?>,<?php echo round($tiledilamngay1,2); ?>,<?php echo round($tilenghilamngay1,2); ?>],
		['2',<?php echo round($tiledilamngay2,2); ?>,<?php echo round($tilenghilamngay2,2); ?>,<?php echo round($tiledilamngay2,2); ?>,<?php echo round($tilenghilamngay2,2); ?>],
		['3',<?php echo round($tiledilamngay3,2); ?>,<?php echo round($tilenghilamngay3,2); ?>,<?php echo round($tiledilamngay3,2); ?>,<?php echo round($tilenghilamngay3,2); ?>],
		['4',<?php echo round($tiledilamngay4,2); ?>,<?php echo round($tilenghilamngay4,2); ?>,<?php echo round($tiledilamngay4,2); ?>,<?php echo round($tilenghilamngay4,2); ?>],
		['5',<?php echo round($tiledilamngay5,2); ?>,<?php echo round($tilenghilamngay5,2); ?>,<?php echo round($tiledilamngay5,2); ?>,<?php echo round($tilenghilamngay5,2); ?>],
		['6',<?php echo round($tiledilamngay6,2); ?>,<?php echo round($tilenghilamngay6,2); ?>,<?php echo round($tiledilamngay6,2); ?>,<?php echo round($tilenghilamngay6,2); ?>],
		['7',<?php echo round($tiledilamngay7,2); ?>,<?php echo round($tilenghilamngay7,2); ?>,<?php echo round($tiledilamngay7,2); ?>,<?php echo round($tilenghilamngay7,2); ?>],
		['8',<?php echo round($tiledilamngay8,2); ?>,<?php echo round($tilenghilamngay8,2); ?>,<?php echo round($tiledilamngay8,2); ?>,<?php echo round($tilenghilamngay8,2); ?>],
		['9',<?php echo round($tiledilamngay9,2); ?>,<?php echo round($tilenghilamngay9,2); ?>,<?php echo round($tiledilamngay9,2); ?>,<?php echo round($tilenghilamngay9,2); ?>],
		['10',<?php echo round($tiledilamngay10,2); ?>,<?php echo round($tilenghilamngay10,2); ?>,<?php echo round($tiledilamngay10,2); ?>,<?php echo round($tilenghilamngay10,2); ?>],
		['11',<?php echo round($tiledilamngay11,2); ?>,<?php echo round($tilenghilamngay11,2); ?>,<?php echo round($tiledilamngay11,2); ?>,<?php echo round($tilenghilamngay11,2); ?>],
		['12',<?php echo round($tiledilamngay12,2); ?>,<?php echo round($tilenghilamngay12,2); ?>,<?php echo round($tiledilamngay12,2); ?>,<?php echo round($tilenghilamngay12,2); ?>],
        ['13',<?php echo round($tiledilamngay13,2); ?>,<?php echo round($tilenghilamngay13,2); ?>,<?php echo round($tiledilamngay13,2); ?>,<?php echo round($tilenghilamngay13,2); ?>],
		['14',<?php echo round($tiledilamngay14,2); ?>,<?php echo round($tilenghilamngay14,2); ?>,<?php echo round($tiledilamngay14,2); ?>,<?php echo round($tilenghilamngay14,2); ?>],
		['15',<?php echo round($tiledilamngay15,2); ?>,<?php echo round($tilenghilamngay15,2); ?>,<?php echo round($tiledilamngay15,2); ?>,<?php echo round($tilenghilamngay15,2); ?>],
		['16',<?php echo round($tiledilamngay16,2); ?>,<?php echo round($tilenghilamngay16,2); ?>,<?php echo round($tiledilamngay16,2); ?>,<?php echo round($tilenghilamngay16,2); ?>],
		['17',<?php echo round($tiledilamngay17,2); ?>,<?php echo round($tilenghilamngay17,2); ?>,<?php echo round($tiledilamngay17,2); ?>,<?php echo round($tilenghilamngay17,2); ?>],
		['18',<?php echo round($tiledilamngay18,2); ?>,<?php echo round($tilenghilamngay18,2); ?>,<?php echo round($tiledilamngay18,2); ?>,<?php echo round($tilenghilamngay18,2); ?>],
		['19',<?php echo round($tiledilamngay19,2); ?>,<?php echo round($tilenghilamngay19,2); ?>,<?php echo round($tiledilamngay19,2); ?>,<?php echo round($tilenghilamngay19,2); ?>],
		['20',<?php echo round($tiledilamngay20,2); ?>,<?php echo round($tilenghilamngay20,2); ?>,<?php echo round($tiledilamngay20,2); ?>,<?php echo round($tilenghilamngay20,2); ?>],
		['21',<?php echo round($tiledilamngay21,2); ?>,<?php echo round($tilenghilamngay21,2); ?>,<?php echo round($tiledilamngay21,2); ?>,<?php echo round($tilenghilamngay21,2); ?>],
		['22',<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>,<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>],
		['23',<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>,<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>],
		['24',<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>,<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>],
        ['25',<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>,<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>],
		['26',<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>,<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>],
		['27',<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>,<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>],
		['28',<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>,<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>],
		['29',<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>,<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>],
		['30',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['31',<?php echo round($tiledilamngay31,2); ?>,<?php echo round($tilenghilamngay31,2); ?>,<?php echo round($tiledilamngay31,2); ?>,<?php echo round($tilenghilamngay31,2); ?>],
		]);
		
		// Optional; add a title and set the width and height of the chart
		var options = {	title: 'Điểm danh từng ngày trong tháng',	
						titleTextStyle: {
										color: "#1656f0",
										fontSize: 25,           
										},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1200" , height:"350"} ,
						backgroundColor: '#c7deff',
						height:"480",
						width:"1480",
						vAxis: {
							format: '#\'%\''
						} ,  
						vAxes: {
						
						0: {textStyle: {color: '#131685', bold: true}},
					},
						animation: {
									duration: 500,
									easing: 'out',
									startup: true
									},
						seriesType: "bars",
						series: {
									1: {targetAxisIndex: 1},
									2: {targetAxisIndex: 2},
								},
						series:{1: {type: "line",pointSize: 1},2: {type: "line",pointSize: 1}},
						// curveType: 'function',			
					};

		// Display the chart inside the <div> element with id="piechart"
		var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
		chart.draw(data, options);
		}
	</script>
	 <script type="text/javascript">
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Ngày', 'Đi làm', 'Nghỉ làm','Đi làm','Nghỉ làm'],
		['1',<?php echo round($tiledilamngay1,2); ?>,<?php echo round($tilenghilamngay1,2); ?>,<?php echo round($tiledilamngay1,2); ?>,<?php echo round($tilenghilamngay1,2); ?>],
		['2',<?php echo round($tiledilamngay10,2); ?>,<?php echo round($tilenghilamngay10,2); ?>,<?php echo round($tiledilamngay10,2); ?>,<?php echo round($tilenghilamngay10,2); ?>],
		['3',<?php echo round($tiledilamngay11,2); ?>,<?php echo round($tilenghilamngay11,2); ?>,<?php echo round($tiledilamngay11,2); ?>,<?php echo round($tilenghilamngay11,2); ?>],
		['4',<?php echo round($tiledilamngay12,2); ?>,<?php echo round($tilenghilamngay12,2); ?>,<?php echo round($tiledilamngay12,2); ?>,<?php echo round($tilenghilamngay12,2); ?>],
        ['5',<?php echo round($tiledilamngay13,2); ?>,<?php echo round($tilenghilamngay13,2); ?>,<?php echo round($tiledilamngay13,2); ?>,<?php echo round($tilenghilamngay13,2); ?>],
		['6',<?php echo round($tiledilamngay6,2); ?>,<?php echo round($tilenghilamngay6,2); ?>,<?php echo round($tiledilamngay6,2); ?>,<?php echo round($tilenghilamngay6,2); ?>],
		['7',<?php echo round($tiledilamngay7,2); ?>,<?php echo round($tilenghilamngay7,2); ?>,<?php echo round($tiledilamngay7,2); ?>,<?php echo round($tilenghilamngay7,2); ?>],
		['8',<?php echo round($tiledilamngay20,2); ?>,<?php echo round($tilenghilamngay20,2); ?>,<?php echo round($tiledilamngay20,2); ?>,<?php echo round($tilenghilamngay20,2); ?>],
		['9',<?php echo round($tiledilamngay9,2); ?>,<?php echo round($tilenghilamngay9,2); ?>,<?php echo round($tiledilamngay9,2); ?>,<?php echo round($tilenghilamngay9,2); ?>],
		['10',<?php echo round($tiledilamngay10,2); ?>,<?php echo round($tilenghilamngay10,2); ?>,<?php echo round($tiledilamngay10,2); ?>,<?php echo round($tilenghilamngay10,2); ?>],
		['11',<?php echo round($tiledilamngay11,2); ?>,<?php echo round($tilenghilamngay11,2); ?>,<?php echo round($tiledilamngay11,2); ?>,<?php echo round($tilenghilamngay11,2); ?>],
		['12',<?php echo round($tiledilamngay12,2); ?>,<?php echo round($tilenghilamngay12,2); ?>,<?php echo round($tiledilamngay12,2); ?>,<?php echo round($tilenghilamngay12,2); ?>],
		['13',<?php echo round($tiledilamngay1,2); ?>,<?php echo round($tilenghilamngay1,2); ?>,<?php echo round($tiledilamngay1,2); ?>,<?php echo round($tilenghilamngay1,2); ?>],
		['14',<?php echo round($tiledilamngay2,2); ?>,<?php echo round($tilenghilamngay2,2); ?>,<?php echo round($tiledilamngay2,2); ?>,<?php echo round($tilenghilamngay2,2); ?>],
		['15',<?php echo round($tiledilamngay3,2); ?>,<?php echo round($tilenghilamngay3,2); ?>,<?php echo round($tiledilamngay3,2); ?>,<?php echo round($tilenghilamngay3,2); ?>],
		['16',<?php echo round($tiledilamngay4,2); ?>,<?php echo round($tilenghilamngay4,2); ?>,<?php echo round($tiledilamngay4,2); ?>,<?php echo round($tilenghilamngay4,2); ?>],
		['17',<?php echo round($tiledilamngay17,2); ?>,<?php echo round($tilenghilamngay17,2); ?>,<?php echo round($tiledilamngay17,2); ?>,<?php echo round($tilenghilamngay17,2); ?>],
		['18',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['19',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['20',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['21',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['22',<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>,<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>],
		['23',<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>,<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>],
		['24',<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>,<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>],
        ['25',<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>,<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>],
		['26',<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>,<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>],
		['27',<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>,<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>],
		['28',<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>,<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>],
		['29',<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>,<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>],
		['30',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['31',<?php echo round($tiledilamngay31,2); ?>,<?php echo round($tilenghilamngay31,2); ?>,<?php echo round($tiledilamngay31,2); ?>,<?php echo round($tilenghilamngay31,2); ?>],
		['32',<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>,<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>],
		['33',<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>,<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>],
		['34',<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>,<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>],
        ['35',<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>,<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>],
		['36',<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>,<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>],
		['37',<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>,<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>],
		['38',<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>,<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>],
		['39',<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>,<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>],
		['40',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['41',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['42',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['43',<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>,<?php echo round($tiledilamngay22,2); ?>,<?php echo round($tilenghilamngay22,2); ?>],
		['44',<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>,<?php echo round($tiledilamngay23,2); ?>,<?php echo round($tilenghilamngay23,2); ?>],
		['45',<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>,<?php echo round($tiledilamngay24,2); ?>,<?php echo round($tilenghilamngay24,2); ?>],
        ['46',<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>,<?php echo round($tiledilamngay25,2); ?>,<?php echo round($tilenghilamngay25,2); ?>],
		['47',<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>,<?php echo round($tiledilamngay26,2); ?>,<?php echo round($tilenghilamngay26,2); ?>],
		['48',<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>,<?php echo round($tiledilamngay27,2); ?>,<?php echo round($tilenghilamngay27,2); ?>],
		['49',<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>,<?php echo round($tiledilamngay28,2); ?>,<?php echo round($tilenghilamngay28,2); ?>],
		['50',<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>,<?php echo round($tiledilamngay29,2); ?>,<?php echo round($tilenghilamngay29,2); ?>],
		['51',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		['52',<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>,<?php echo round($tiledilamngay30,2); ?>,<?php echo round($tilenghilamngay30,2); ?>],
		]);
		
		// Optional; add a title and set the width and height of the chart
		var options = {	title: 'Điểm danh từng tuần trong năm',	
			titleTextStyle: {
										color: "#1656f0",
										fontSize: 25,           
										},
						colors: ['#6495ED', '#DC143C'],
						chartArea:{width:"1300" , height:"350"} ,
						backgroundColor: '#c7deff',
						height:"480",
						width:"1480",
						vAxis: {
							format: '#\'%\''
						} ,  
						vAxes: {
						
						0: {textStyle: {color: '#131685', bold: true}},
					},
						animation: {
									duration: 500,
									easing: 'out',
									startup: true
									},
						seriesType: "bars",
						series: {
									1: {targetAxisIndex: 1},
									2: {targetAxisIndex: 2},
								},
						series:{1: {type: "line",pointSize: 1},2: {type: "line",pointSize: 1}},
						// curveType: 'function',			
					};

		// Display the chart inside the <div> element with id="piechart"
		var chart = new google.visualization.ColumnChart(document.getElementById('columnchart1'));
		chart.draw(data, options);
		}
	</script>
	