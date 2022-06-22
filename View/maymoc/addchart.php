<?php
    $thang = date('m', strtotime("now"));

	if(isset($_POST['up'])){
		$thang = $_POST['input'];
	}
	if(isset($_POST['dangxuat'])){
    session_destroy();
    header('Location: ../Controller/index.php?action=begin');
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
	 <link rel="stylesheet" href="../Employee-management-system/admin/include/dist/css/adminlte.min.css"> 
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="../Employee-management-system/admin/include/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../Employee-management-system/admin/include/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<script src="../Highcharts-10.1.0/code/highcharts.js"></script>
	<script src="../Highcharts-10.1.0/code/highcharts-3d.js"></script>
	<script src="../Highcharts-10.1.0/code/modules/exporting.js"></script>
	<script src="../Highcharts-10.1.0/code/modules/export-data.js"></script>
	<script src="../Highcharts-10.1.0/code/modules/accessibility.js"></script>
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
		#input1
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
		.highcharts-figure,
		.highcharts-data-table table {
		min-width: 360px;
		max-width: 800px;
		margin: 1em auto;
		}

		.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #ebebeb;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
		}

		.highcharts-data-table caption {
		padding: 1em 0;
		font-size: 1.2em;
		color: #555;
		}

		.highcharts-data-table th {
		font-weight: 600;
		padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
		padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
		background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
		background: #f1f7ff;
		} 
	</style>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
	<div class="app" style="height: 165vh;">
		<div class="app-body-main-content" style="width:82vw">
			<div style=" display: grid;grid-template-columns: repeat(1, 1fr);column-gap: 1.6rem;row-gap: 2rem;margin-top: 1rem;grid-template-columns: %  ;">
				<div style="padding-left:10px;padding-top:10px;left:100px;background: #c7deff;border-radius: 20px; box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
					<form action="" method="POST" id="">
						<div class="box1">
							<div class="NextpsBt">
								<input id="input1" name="input1" type="text" placeholder="Nhập tháng muốn xem">
								<button name="up" class="NPB"><i class="fas fa-angle-right"></i></button>
							</div>
						</div>
					</form>
						<div id="container1"></div>
				</div>
				<div style="border-radius: 20px; box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
						<label><input id="rdb1" type="radio" name="toggler" value="divID-1" style="cursor:pointer;" checked/>01-26</label>
            			<label><input id="rdb2" type="radio" name="toggler" value="divID-2" style="cursor:pointer;" />27-52</label>
									</br>
						<div  id="divID-1" class="toHide" style="position:relative; margin-bottom:-500px"></div> 
						<div  id="divID-2" class="toHide" style="position:relative;top:-9999em;opacity:0;"></div> 
				</div>
				<div style="padding-left:10px;background: #c7deff;border-radius: 20px; box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
					<span class="nace">
							<div id="container" style=""></div> 
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
</body>
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
	
	<!-- Diem danh tung thang trong nam -->
	<script>
		Highcharts.chart('container', {
		chart: {
			type: 'line',
			backgroundColor:'#c7deff',
			height: 500,
			width: 1830,
		},
		colors: ['#6495ED', '#DC143C'],
		title: {
			align:'left',
			text: 'Điểm danh từng tháng trong năm',
			style: {
				color: '#1656f0',
				fontWeight: 'bold',
				fontSize: 25
			}
    },
		subtitle: false,
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			labels: {
					style: {
						fontWeight: 'bold',
						color: 'blue',
						fontSize: 15,
					},
				},
		},
		yAxis: {
				labels: {
					style: {
						fontWeight: 'bold',
						color: 'blue',
						fontSize: 15,
					},
					format: '{value}%'
				},
				accessibility: {
					point: {
					valueSuffix: '%'
					}
				},
				title: {
					text: false
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						
					style:{
							fontSize: 15
								},
					enabled: true,
					format: '{y}%'
					},
				}
			},
		series: [{
			name: 'Đi làm',
			data: [	<?php echo $tiledilamthang1; ?>,
					<?php echo $tiledilamthang2; ?>,
					<?php echo $tiledilamthang3; ?>,
					<?php echo $tiledilamthang4; ?>,
					<?php echo $tiledilamthang5; ?>,
					<?php echo $tiledilamthang6; ?>,
					<?php echo $tiledilamthang7; ?>,
					<?php echo $tiledilamthang8; ?>,
					<?php echo $tiledilamthang9; ?>,
					<?php echo $tiledilamthang10; ?>,
					<?php echo $tiledilamthang11; ?>,
					<?php echo $tiledilamthang12; ?>,]
		}, {
			name: 'Nghỉ làm',
			data: [	<?php echo $tilenghilamthang1; ?>,
					<?php echo $tilenghilamthang2; ?>,
					<?php echo $tilenghilamthang3; ?>,
					<?php echo $tilenghilamthang4; ?>,
					<?php echo $tilenghilamthang5; ?>,
					<?php echo $tilenghilamthang6; ?>,
					<?php echo $tilenghilamthang7; ?>,
					<?php echo $tilenghilamthang8; ?>,
					<?php echo $tilenghilamthang9; ?>,
					<?php echo $tilenghilamthang10; ?>,
					<?php echo $tilenghilamthang11; ?>,
					<?php echo $tilenghilamthang12; ?>,]
		}]
		});
	</script>

	<!-- Diem danh tung ngay trong thang -->
	<script>
		Highcharts.chart('container1', {
		chart: {
			type: 'line',
			backgroundColor:'#c7deff',
			height: 500,
			width: 1830,
		},
		colors: ['#6495ED', '#DC143C'],
		title: {
			align:'left',
			text: 'Điểm danh từng ngày trong tháng',
			style: {
				color: '#1656f0',
				fontWeight: 'bold',
				fontSize: 25
			}
    },
		subtitle: false,
		xAxis: {
			categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12',
			'13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31',],
			labels: {
					style: {
						fontWeight: 'bold',
						color: 'blue',
						fontSize: 15,
					},
				},
		},
		yAxis: {
				labels: {
					style: {
						fontWeight: 'bold',
						color: 'blue',
						fontSize: 15,
					},

				},
				accessibility: {
					point: {
					valueSuffix: '%'
					}
				},
				title: {
					text: false
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						style:{
								fontSize: 15
								},
						enabled: true,
					},
				}
			},
		series: [{
			name: 'Đi làm',
			data: [
			[<?php echo $dilamngay1; ?>],
			[<?php echo $dilamngay2; ?>],
			[<?php echo $dilamngay3; ?>],
			[<?php echo $dilamngay4; ?>],
			[<?php echo $dilamngay5; ?>],
			[<?php echo $dilamngay6; ?>],
			[<?php echo $dilamngay7; ?>],
			[<?php echo $dilamngay8; ?>],
			[<?php echo $dilamngay9; ?>],
			[<?php echo $dilamngay10; ?>],
			[<?php echo $dilamngay11; ?>],
			[<?php echo $dilamngay12; ?>],
			[<?php echo $dilamngay13; ?>],
			[<?php echo $dilamngay14; ?>],
			[<?php echo $dilamngay15; ?>],
			[<?php echo $dilamngay16; ?>],
			[<?php echo $dilamngay17; ?>],
			[<?php echo $dilamngay18; ?>],
			[<?php echo $dilamngay19; ?>],
			[<?php echo $dilamngay20; ?>],
			[<?php echo $dilamngay21; ?>],
			[<?php echo $dilamngay22; ?>],
			[<?php echo $dilamngay23; ?>],
			[<?php echo $dilamngay24; ?>],
			[<?php echo $dilamngay25; ?>],
			[<?php echo $dilamngay26; ?>],
			[<?php echo $dilamngay27; ?>],
			[<?php echo $dilamngay28; ?>],
			[<?php echo $dilamngay29; ?>],
			[<?php echo $dilamngay30; ?>],
			[<?php echo $dilamngay31; ?>],
			]
		}, {
			name: 'Nghỉ làm',
			data: [	<?php echo $nghilamngay1; ?>,
					<?php echo $nghilamngay2; ?>,
					<?php echo $nghilamngay3; ?>,
					<?php echo $nghilamngay4; ?>,
					<?php echo $nghilamngay5; ?>,
					<?php echo $nghilamngay6; ?>,
					<?php echo $nghilamngay7; ?>,
					<?php echo $nghilamngay8; ?>,
					<?php echo $nghilamngay9; ?>,
					<?php echo $nghilamngay10; ?>,
					<?php echo $nghilamngay11; ?>,
					<?php echo $nghilamngay12; ?>,
					<?php echo $nghilamngay13; ?>,
					<?php echo $nghilamngay14; ?>,
					<?php echo $nghilamngay15; ?>,
					<?php echo $nghilamngay16; ?>,
					<?php echo $nghilamngay17; ?>,
					<?php echo $nghilamngay18; ?>,
					<?php echo $nghilamngay19; ?>,
					<?php echo $nghilamngay20; ?>,
					<?php echo $nghilamngay21; ?>,
					<?php echo $nghilamngay22; ?>,
					<?php echo $nghilamngay23; ?>,
					<?php echo $nghilamngay24; ?>,
					<?php echo $nghilamngay25; ?>,
					<?php echo $nghilamngay26; ?>,
					<?php echo $nghilamngay27; ?>,
					<?php echo $nghilamngay28; ?>,
					<?php echo $nghilamngay29; ?>,
					<?php echo $nghilamngay30; ?>,
					<?php echo $nghilamngay31; ?>,]
		}]
		});
	</script>

		<!-- Diem danh tung tuan trong nam -->
	<script>
		window.onload=function(){
		$(function() {
			$('[name=toggler]').click(function () {
				$(".toHide").css({
					top: "-9999em",
					opacity: 0,
				});
			var chartToShow = $(this).val();
				$("#" + chartToShow).css({
					top: 0,
					opacity: 1,
				});
			});
			Highcharts.chart('divID-1', {
				chart: {
					type: 'line',
					backgroundColor:'#c7deff',
					height: 500,
					width: 1830,
				},
				colors: ['#6495ED', '#DC143C'],
				title: {
					align:'left',
					text: 'Điểm danh từng tuần trong năm',
					style: {
						color: '#1656f0',
						fontWeight: 'bold',
						fontSize: 25
					}
			},
				subtitle: false,
				xAxis: {
					style: {
					fontWeight: 'bold'
				},
					categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12',
					'13','14','15','16','17','18','19','20','21','22','23','24','25','26'],
					labels: {
						style: {
							fontWeight: 'bold',
							color: 'blue',
							fontSize: 15,
						},
					},
			},
			yAxis: {
					labels: {
						style: {
							fontWeight: 'bold',
							color: 'blue',
							fontSize: 15,
						},
						format: '{value}%'
					},
					accessibility: {
						point: {
						valueSuffix: '%'
						}
					},
					title: {
						text: false
					}
				},
				plotOptions: {
					line: {
						dataLabels: {
							style:{
									fontSize: 15
										},
							enabled: true,
							format: '{y}%'
						},
					}
				},
				series: [{
					name: 'Đi làm',
					data: [
						[<?php echo $tiledilamtuan1; ?>],
						[<?php echo $tiledilamtuan2; ?>],
						[<?php echo $tiledilamtuan3; ?>],
						[<?php echo $tiledilamtuan4; ?>],
						[<?php echo $tiledilamtuan5; ?>],
						[<?php echo $tiledilamtuan6; ?>],
						[<?php echo $tiledilamtuan7; ?>],
						[<?php echo $tiledilamtuan8; ?>],
						[<?php echo $tiledilamtuan9; ?>],
						[<?php echo $tiledilamtuan10; ?>],
						[<?php echo $tiledilamtuan11; ?>],
						[<?php echo $tiledilamtuan12; ?>],
						[<?php echo $tiledilamtuan13; ?>],
						[<?php echo $tiledilamtuan14; ?>],
						[<?php echo $tiledilamtuan15; ?>],
						[<?php echo $tiledilamtuan16; ?>],
						[<?php echo $tiledilamtuan17; ?>],
						[<?php echo $tiledilamtuan18; ?>],
						[<?php echo $tiledilamtuan19; ?>],
						[<?php echo $tiledilamtuan20; ?>],
						[<?php echo $tiledilamtuan21; ?>],
						[<?php echo $tiledilamtuan22; ?>],
						[<?php echo $tiledilamtuan23; ?>],
						[<?php echo $tiledilamtuan24; ?>],
						[<?php echo $tiledilamtuan25; ?>],
						[<?php echo $tiledilamtuan26; ?>],
					]
				}, 
				{
					name: 'Nghỉ làm',
					data: 
					[	<?php echo $tilenghilamtuan1; ?>,
						<?php echo $tilenghilamtuan2; ?>,
						<?php echo $tilenghilamtuan3; ?>,
						<?php echo $tilenghilamtuan4; ?>,
						<?php echo $tilenghilamtuan5; ?>,
						<?php echo $tilenghilamtuan6; ?>,
						<?php echo $tilenghilamtuan7; ?>,
						<?php echo $tilenghilamtuan8; ?>,
						<?php echo $tilenghilamtuan9; ?>,
						<?php echo $tilenghilamtuan10; ?>,
						<?php echo $tilenghilamtuan11; ?>,
						<?php echo $tilenghilamtuan12; ?>,
						<?php echo $tilenghilamtuan13; ?>,
						<?php echo $tilenghilamtuan14; ?>,
						<?php echo $tilenghilamtuan15; ?>,
						<?php echo $tilenghilamtuan16; ?>,
						<?php echo $tilenghilamtuan17; ?>,
						<?php echo $tilenghilamtuan18; ?>,
						<?php echo $tilenghilamtuan19; ?>,
						<?php echo $tilenghilamtuan20; ?>,
						<?php echo $tilenghilamtuan21; ?>,
						<?php echo $tilenghilamtuan22; ?>,
						<?php echo $tilenghilamtuan23; ?>,
						<?php echo $tilenghilamtuan24; ?>,
						<?php echo $tilenghilamtuan25; ?>,
						<?php echo $tilenghilamtuan26; ?>,]
				}]
			});
			Highcharts.chart('divID-2', {
				chart: {
					type: 'line',
					backgroundColor:'#c7deff',
					height: 500,
					width: 1830,
				},
				colors: ['#6495ED', '#DC143C'],
				title: {
					align:'left',
					text: 'Điểm danh từng tuần trong năm',
					style: {
						color: '#1656f0',
						fontWeight: 'bold',
						fontSize: 25
					}
			},
				subtitle: false,
				xAxis: {
					style: {
					fontWeight: 'bold'
				},
					categories: ['27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38',
					'39','40','41','42','43','44','45','46','47','48','49','50','51','52'],
					labels: {
						style: {
							fontWeight: 'bold',
							color: 'blue',
							fontSize: 15,
						},
					},
			},
			yAxis: {
					labels: {
						style: {
							fontWeight: 'bold',
							color: 'blue',
							fontSize: 15,
						},
						format: '{value}%'
					},
					accessibility: {
						point: {
						valueSuffix: '%'
						}
					},
					title: {
						text: false
					}
				},
				plotOptions: {
					line: {
						dataLabels: {
							style:{
									fontSize: 15
										},
							enabled: true,
							format: '{y}%'
						},
					}
				},
				series: [{
					name: 'Đi làm',
					data: [
						<?php echo $tiledilamtuan27; ?>,
						<?php echo $tiledilamtuan28; ?>,
						<?php echo $tiledilamtuan29; ?>,
						<?php echo $tiledilamtuan30; ?>,
						<?php echo $tiledilamtuan31; ?>,
						<?php echo $tiledilamtuan32; ?>,
						<?php echo $tiledilamtuan33; ?>,
						<?php echo $tiledilamtuan34; ?>,
						<?php echo $tiledilamtuan35; ?>,
						<?php echo $tiledilamtuan36; ?>,
						<?php echo $tiledilamtuan37; ?>,
						<?php echo $tiledilamtuan38; ?>,
						<?php echo $tiledilamtuan39; ?>,
						<?php echo $tiledilamtuan40; ?>,
						<?php echo $tiledilamtuan41; ?>,
						<?php echo $tiledilamtuan42; ?>,
						<?php echo $tiledilamtuan43; ?>,
						<?php echo $tiledilamtuan44; ?>,
						<?php echo $tiledilamtuan45; ?>,
						<?php echo $tiledilamtuan46; ?>,
						<?php echo $tiledilamtuan47; ?>,
						<?php echo $tiledilamtuan48; ?>,
						<?php echo $tiledilamtuan49; ?>,
						<?php echo $tiledilamtuan50; ?>,
						<?php echo $tiledilamtuan51; ?>,
						<?php echo $tiledilamtuan52; ?>,
					]
				}, 
				{
					name: 'Nghỉ làm',
					data: [
						<?php echo $tilenghilamtuan27; ?>,
						<?php echo $tilenghilamtuan28; ?>,
						<?php echo $tilenghilamtuan29; ?>,
						<?php echo $tilenghilamtuan30; ?>,
						<?php echo $tilenghilamtuan31; ?>,
						<?php echo $tilenghilamtuan32; ?>,
						<?php echo $tilenghilamtuan33; ?>,
						<?php echo $tilenghilamtuan34; ?>,
						<?php echo $tilenghilamtuan35; ?>,
						<?php echo $tilenghilamtuan36; ?>,
						<?php echo $tilenghilamtuan37; ?>,
						<?php echo $tilenghilamtuan38; ?>,
						<?php echo $tilenghilamtuan39; ?>,
						<?php echo $tilenghilamtuan40; ?>,
						<?php echo $tilenghilamtuan41; ?>,
						<?php echo $tilenghilamtuan42; ?>,
						<?php echo $tilenghilamtuan43; ?>,
						<?php echo $tilenghilamtuan44; ?>,
						<?php echo $tilenghilamtuan45; ?>,
						<?php echo $tilenghilamtuan46; ?>,
						<?php echo $tilenghilamtuan47; ?>,
						<?php echo $tilenghilamtuan48; ?>,
						<?php echo $tilenghilamtuan49; ?>,
						<?php echo $tilenghilamtuan50; ?>,
						<?php echo $tilenghilamtuan51; ?>,
						<?php echo $tilenghilamtuan52; ?>,
					]
				}]
			});
		});
    }
		</script>
	
	