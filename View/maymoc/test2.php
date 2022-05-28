<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
$thang = date('m', strtotime("now")); 
include "../Model/DBconfig.php";
include "../Model/datachart.php";
$db = new Database();
$db -> connect();
session_start();

$table = 'tiendomaymoc';
$bophan = 'AEC';
$bophan1 = 'TSC';
$bophan2 = 'APS';
if(isset($_POST['dangxuat'])){
    session_destroy();
    header('Location: ../Controller/index.php?action=begin');
}
if(isset($_GET['delete'])){
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$table = "tiendomaymoc";
		if($db->Delete($id,$table))
		{
		header('location: ../Controller/index.php?action=home#divtimkiem');
		}
		else{
			header('location: ../Controller/index.php?action=home#divtimkiem');
		}
	}
}

$table = 'tiendomaymoc';
$table1 = 'tiendomaymoc1';
$data1 = $db->getAllData($table);
$data2 = $db->getAllData($table1);
$num_row = $db->count_row($table);
$databophan = $db->getAllDatabophan($table,$bophan);
$databophan1 = $db->getAllDatabophan($table,$bophan1);
$databophan2 = $db->getAllDatabophan($table,$bophan2);

$databophan3 = $db->getAllDatabophan($table1,$bophan);
$databophan4 = $db->getAllDatabophan($table1,$bophan1);
$databophan5 = $db->getAllDatabophan($table1,$bophan2);

$a = 0;
$b = 0;
if($data1 > 0){
foreach ($data1 as $key) {
    	$datamin = $key['tiendo'];
		$ch = substr($datamin, 0, -1);
		if($ch < 100)
		{
         $a++;
		}
}
}
if($data2 >0)
{
foreach ($data2 as $key) {
    	$datamin = $key['tiendo'];
		$ch = substr($datamin, 0, -1);
		if($ch < 100)
		{
         $b++;
		}
}
}
$ab = $a + $b;



 
$table = 'tiendomaymoc';
$data1 = $db->getAllData($table);
$num_row = $db->count_row($table);

$count_all_data = $db->count_row_alldata($table);

$num = $num_row;
$counthoanthanh = 0;
$countchua = 0;
$counttruocdukien = 0;
$countsaudukien = 0;

if($count_all_data>0)
{
foreach ($data1 as $value) {
   $ngaybatdau = $value['ngaybatdau'];
   $ngaydukien = $value['ngaydukien'];
   $today = date("Y-m-d");
   if(strtotime($ngaydukien) > strtotime($today)&&$value['tiendo']=='100%')
   {
        $counttruocdukien++;
   }
   else if(strtotime($ngaydukien) < strtotime($today)&&$value['tiendo']=='100%'){
        $countsaudukien++;
   }
    if($value['tiendo']=='100%')
    {
        $counthoanthanh++;
    }else{
        $countchua++;
    }

}
}

$tableusersview = 'usersview';
$matkhau = $db->getAllData($tableusersview);


$matkhau2 = array();
$a = 0;
foreach ($matkhau as $keyy) {
    $a++;
    $matkhau1[$a] = $keyy['password'];
}
$tabletiendomaymoc = 'tiendomaymoc';
$tabletiendomaymoc1 = 'tiendomaymoc1';
$count1 = $db->count_row_alldata($tabletiendomaymoc); 
$count2 = $db->count_row_alldata($tabletiendomaymoc1); 
$counttong = $count2 + $count1;







$AEC = 'AEC';
$TSC = 'TSC';
$APS = 'APS';
$table = 'tiendomaymoc';
$tiendomaymoc1 = 'tiendomaymoc1';
$data1 = $db->getAllData($table);
$datatiendomaymoc1 = $db->getAllData($tiendomaymoc1);
$dataAEC = $db->getAllDatabophan($table,$AEC);
$dataTSC = $db->getAllDatabophan($table,$TSC);
$dataAPS = $db->getAllDatabophan($table,$APS);

$dataAEC1 = $db->getAllDatabophan($tiendomaymoc1,$AEC);
$dataTSC1 = $db->getAllDatabophan($tiendomaymoc1,$TSC);
$dataAPS1 = $db->getAllDatabophan($tiendomaymoc1,$APS);

$num_row = $db->count_row($table);
$num_row1 = $db->count_row($tiendomaymoc1);

$count_row_AEC = $db->count_row_bophan($table,$AEC);
$count_row_TSC = $db->count_row_bophan($table,$TSC);
$count_row_APS = $db->count_row_bophan($table,$APS);

$count_row_AEC1 = $db->count_row_bophan($tiendomaymoc1,$AEC);
$count_row_TSC1 = $db->count_row_bophan($tiendomaymoc1,$TSC);
$count_row_APS1 = $db->count_row_bophan($tiendomaymoc1,$APS);

$tongaec20 = 0;

if($count_row_AEC1!=0)
{
    $tongaec20 = 0;
foreach ($dataAEC1 as $value) {
      $dau20 = $value['tiendo'];

      $tongaec20 = $tongaec20+$dau20;
}
$phantramAEC20 = round(($tongaec20/$count_row_AEC1),2).'%';
$phantramAEC120 = substr($phantramAEC20, 0, -1);
}else{
    $demAEC=0;
    $phantramAEC20 = 'Không có dữ Liệu';
    $phantramAEC120 = 0;
    $tongaec20 = 0;
}

if($count_row_TSC1!=0)
{
    $tongtsc30 = 0;
foreach ($dataTSC1 as $value2) {
      $dau130 = $value2['tiendo'];

      $tongtsc30 = $tongtsc30+$dau130;
}
$phantramTSC30 = round(($tongtsc30/$count_row_TSC1),2).'%';
$phantramTSC130 = substr($phantramTSC30, 0, -1);
}else{
    $demTSC30=0;
    $phantramTSC30 = 'Không có dữ Liệu';
    $phantramTSC130 = 0;
    $tongtsc30 = 0;
}


if($count_row_APS1!=0)
{
      $tongaps40 = 0;
foreach ($dataAPS1 as $value3) {
      $dau240 = $value3['tiendo'];

      $tongaps40 = $tongaps40+$dau240;
}
$phantramAPS40 = round(($tongaps40/$count_row_APS1),2).'%';
$phantramAPS140 = substr($phantramAPS40, 0, -1);
}else{
    $phantramAPS40 = 'Không có dữ Liệu';
    $phantramAPS140 = 0;
    $tongaps40  = 0;
}


$count_all_data = $db->count_row_alldata($table);

$num = $num_row;
$counthoanthanh = 0;
$countchua = 0;
$counttruocdukien = 0;
$countsaudukien = 0;

if($count_all_data>0)
{

foreach ($data1 as $value) {
   $ngaybatdau = $value['ngaybatdau'];
   $ngaydukien = $value['ngaydukien'];
   $today = date("Y-m-d");
   if(strtotime($ngaydukien) > strtotime($today)&&$value['tiendo']=='100%')
   {
        $counttruocdukien++;
   }
   else if(strtotime($ngaydukien) < strtotime($today)&&$value['tiendo']=='100%'){
        $countsaudukien++;
   }
    if($value['tiendo']=='100%')
    {
        $counthoanthanh++;
    }else{
        $countchua++;
    }

}
}
$demAEC = 0;
$demAEC1 = 0;
$demTSC = 0;
$demTSC1 = 0;
$demAPS = 0;
$demAPS1 = 0;
if($count_row_AEC!=0)
{
    $tongaec = 0;
foreach ($dataAEC as $value) {
      $dau = $value['tiendo'];
      $ch = substr($dau, 0, -1);
      if($ch == ""){
        $ch=0;
      }
      $tongaec = $tongaec+$ch;
}



$phantramAEC = round(($tongaec/$count_row_AEC),2).'%';
$phantramAEC1 = substr($phantramAEC, 0, -1);
}else{
    $demAEC=0;
    $phantramAEC = 'Không có dữ Liệu';
    $phantramAEC1 = 0;
    $tongaec = 0;
}

if($count_row_TSC!=0)
{
    $tongtsc = 0;
foreach ($dataTSC as $value2) {
      $dau1 = $value2['tiendo'];
      $ch1 = substr($dau1, 0, -1);

      $tongtsc = $tongtsc+$ch1;
}
$phantramTSC = round(($tongtsc/$count_row_TSC),2).'%';
$phantramTSC1 = substr($phantramTSC, 0, -1);
}else{
    $demTSC=0;
    $phantramTSC = 'Không có dữ Liệu';
    $phantramTSC1 = 0;
    $tongtsc = 0;
}

if($count_row_APS!=0)
{
      $tongaps = 0;
foreach ($dataAPS as $value3) {
      $dau2 = $value3['tiendo'];
      $ch2 = substr($dau2, 0, -1);
      $tongaps = $tongaps+$ch2;
}
$phantramAPS = round(($tongaps/$count_row_APS),2).'%';
$phantramAPS1 = substr($phantramAPS, 0, -1);
}else{
    $phantramAPS = 'Không có dữ Liệu';
    $phantramAPS1 = 0;
    $tongaps  = 0;
}

if($count_row_AEC==0){
   $count_row_AEC = 0;
}
if($count_row_TSC==0){
    $count_row_TSC = 0;
}
if($count_row_APS==0){
    $count_row_APS = 0;
}



$tongtiendomaymoc1 = 0;
if($datatiendomaymoc1 > 0){
	foreach ($datatiendomaymoc1 as $key) {
		$data10 = $key['tiendo'];	
		if($data10 > 0)
		{
			$tongtiendomaymoc1 = $tongtiendomaymoc1 + $data10;
		}
		else
		{
			$tongtiendomaymoc1 = $tongtiendomaymoc1 + 0;
		}
		
	}
}


$tongtiendomaymoc = 0;
if($data1 > 0){
	foreach ($data1 as $key) {

		$data100 = $key['tiendo'];
		$data1000 = substr($data100, 0, -1);
		if($data100 > 0)
		{
			$tongtiendomaymoc = $tongtiendomaymoc + $data1000;
		}
		else
		{
			$tongtiendomaymoc = $tongtiendomaymoc + 0;
		}
		
	}
}

$tongoftongaec = 0;
$tongoftongtsc = 0;
$tongoftongaps = 0;

if($tongaps > 0 || $tongtsc > 0 || $tongaec > 0)
{
		

        $counttiendomaymoc = $count_row_AEC + $count_row_TSC + $count_row_APS;

        $counttiendomaymoc1 = $count_row_AEC1 + $count_row_TSC1 + $count_row_APS1;

        $tongoftongtiendomaymoc = $tongaec + $tongtsc + $tongaps;

        $tongoftongtiendomaymoc1 = $tongaec20 + $tongtsc30 + $tongaps40;




        $tongoftong = floor(($tongoftongtiendomaymoc + $tongoftongtiendomaymoc1) / ($counttiendomaymoc + $counttiendomaymoc1));

        if(($count_row_AEC + $count_row_AEC1) > 0)
		{
			$tongoftongaec = floor(($tongaec + $tongaec20) / ($count_row_AEC + $count_row_AEC1));
		}
		else
		{
			$tongoftongaec = 0;
		}
        
        if(($count_row_TSC + $count_row_TSC1) > 0)
        {
        	$tongoftongtsc = floor(($tongtsc + $tongtsc30) / ($count_row_TSC + $count_row_TSC1));
        }
        else
        {
        	$tongoftongtsc = 0;
        }
        
        if(($count_row_APS + $count_row_APS1) > 0)
        {
        	$tongoftongaps = floor(($tongaps + $tongaps40) / ($count_row_APS + $count_row_APS1));
        }
        else
        {
        	$tongoftongaps = 0;
        }

        

		if($num_row > 0)
		{
			$tongtiendomaymocc = round(($tongtiendomaymoc/$num_row),2);
		}
		else
        {
        	 $tongtiendomaymocc = 0;
        }


    
	


}
?>
<?php	
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
<<<<<<< HEAD
	 <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="../codejavascript/googlechart.js"></script>
	 <script type="text/javascript" src="../codejavascript/googlechartjs.js"></script>
=======
	<script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
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
		
		.wrapper {
			position: absolute;
			width: 400px;
			height: 400px;
			margin: auto;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			display: flex;
			flex-direction: row;
		}

<<<<<<< HEAD
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
=======
		.container {
			flex: 1;
			padding: 0 20px;
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
		}
	</style>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>

        <div class="app" style="">
     	   	<nav class="navmobile" id="navmobile">
				<div class="spani" id="spani">
					<i class="fas fa-solid fa-bars"></i>
				</div>
				<div  class="ulli" id="ulli">
					<ul style="">
						<li>
							<a data-bs-toggle="modal" data-bs-target="#exampleModal100" href="#">
								<i style="" class="fas fa-solid fa-user"></i>
								<span style="">Tài Khoản</span>
							</a>
						</li>
						<li><a href="../Employee-management-system/admin/attendance.php">Điểm Danh</a></li>
						<li><a href="../Controller/index.php?action=projectloading">Đang Thực Hiện</a></li>
						<li><a href="../Controller/index.php?action=sum">Tổng Tiến Độ</a></li>
						<li><a href="../Controller/index.php?action=projectdone">Hoàn Thành</a></li>
                        <li><a href="../Controller/index.php?action=selectaecdata#divtimkiem">AEC</a></li>
                        <li><a href="../Controller/index.php?action=selecttscdata#divtimkiem">TSC</a></li>
                        <li><a href="../Controller/index.php?action=selectapsdata#divtimkiem">APS</a></li>
						<li><a href="../Controller/index.php?action=test2-cn#divtimkiem">中国</a></li>
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
	       <header id="app-header" class="app-header" style="">
					    <div class="app-header-logo" style="display: inline-block;">
			   				<h2 class="logo-title" style="">
			   					<span style="">VN Cable <br/> Tự động hóa</span>
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
					<a href="#" class="a1">
						<i class="fas fa-solid fa-house-user a1i"></i>
						<span style="">Trang Chủ</span>
					</a>
					<a class="a2" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
						<i style="" class="fas fa-solid fa-user"></i>
						<span style="">Tài Khoản</span>
					</a>
					<a href="../Employee-management-system/admin/attendance.php" class="a3">
						<i style="" class="fas fa-solid fa-info a3i"></i>
						<span style="" class="">Điểm Danh</span>
					</a>
					<ul>
						<li>
							<a href="#" class="a4">
								<i class="fas fa-solid fa-spinner a4i"></i>
								<span>Tiến Độ</span>
							</a>
							<ul style="">
								<li style=""><a href="../Controller/index.php?action=selectaecdata#divtimkiem">AEC</a></li>
								<li style=""><a href="../Controller/index.php?action=selecttscdata#divtimkiem">TSC</a></li>
								<li style=""><a href="../Controller/index.php?action=selectapsdata#divtimkiem">APS</a></li>
							</ul>
						</li>
					</ul>
					<a href="../Controller/index.php?action=test2-cn#divtimkiem" class="a5" style="margin-top: 25vh;">
						<i class="fas fa-solid fa-language"></i>
						<span style="" class="">中国</span>
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
			<div class="app-body-main-content" style="">
				<section class="service-section">
					<div class="tiles" style="">
						<article class="tile" style="">
							<div class="sum" style="">
								<h3>
									<span style="">Dự Án</span>
									<span></span>
								</h3>
							</div>
							<div class="b-skills" style="">
								<div class="container" style="">
									<div class="row" style="">
										<div class="" style="">
											<div class="skill-item center-block" style="">
												<div class="chart-container" style="">
<<<<<<< HEAD
													<div class="chart " data-percent="<?php echo $tongoftong; ?>" data-bar-color="#131685" style="">
														<span class="percent" data-after="%" style=""></span>
=======
												<!-- <div class="wrapper">
													<div class="container chart" data-size="400" data-value="<?php echo $tongg; ?>" data-arrow="up">
													</div>
												</div> -->
													<div id="donut" data-percent="<?php echo $tongg; ?>" data-bar-color="#131685" style="">
														<!-- <span class="percent" data-after="%" style=""></span> -->
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
													</div>
												</div>
											</div>
										</div>						
									</div>
								</div>
								<div class="test100" id="test100" style="">
									<img style="" src="../Car/c2.png">
								</div>
							</div>

							<div class="sumcount" style="">
								<h4>
								  <span style="font-weight: bold;"><a href="../Controller/index.php?action=sum1">Tổng Dự Án:<?php echo $counttong; ?></a></span>
							   </h4>
							</div>
							<div class="loading" style="">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=projectloading1">Đang Làm: <?php echo $ab; ?></a></span>
								</h4>
							</div>
							<div class="loading" style="margin-top:27px">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=projectdone1">Hoàn Thành: <?php echo $counttong - $ab; ?></a></span>
								</h4>
							</div>
							<div class="loading" style="margin-top:27px">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=hieusuat">Hiệu Suất</a></span>
								</h4>
							</div>
						</article>
						<article class="tile" id="" style="">
                  			<h2 class="tileh2" id="tileh2" style="">
				        		<a href="../Controller/index.php?action=selectaecdata1#divtimkiem" style="">AEC</a>

				        		<div class="pie animate" style="--p:<?php echo round($tongoftongaec); ?>;--c:orange;z-index: 4;margin-top:10px"><?php echo round($tongoftongaec).'%'; ?></div>
				  			</h2>
							<span style="font-size: 20px;">Tên Máy</span>
								<table class="table" style="height: 260px;">
							  		<tbody class="bodytable">

							  			<?php 
							  			if($databophan >0)
							  			{
							  			foreach ($databophan as $value) { 
											$pos = strpos(strtoupper($value['tenmay']), 'LINE'); 
											if($pos !== false){ 
							  			?>
							  			<tr>
											<th style="border-bottom: none;" > <div style="width: 110px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a class="mobile" style="color: black;" href="../Controller/index.php?action=bieudoline&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay']; ?> </a></div></th>
											<td style="color: black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
							   			</tr>
							   			<?php }else{ ?>
											<tr>
												<th  style="border-bottom: none;"> <div style="width: 110px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;" href="../Controller/index.php?action=bieudo&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a> </div></th>

												<td style="color: black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
											</tr>
							    		<?php } } }?>
							    		<?php 
							    		if($databophan3 > 0)
							    		{
							    		foreach ($databophan3 as $value) { ?>
											<tr>
												<th  style="border-bottom: none;"> <div style="width: 110px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;width: 110px;" href="../Controller/index.php?action=bieudoline1&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay']; ?></a></div> </th>

												<td  style="color: black;border-bottom: none;"><?php echo $value['tiendo'].'%'; ?></td>
											</tr>
							   			 <?php } } ?>
						     	  </tbody>
						
							</table>
					</article>
					<article class="tile" style="">
						<h2 style="">
							<a href="../Controller/index.php?action=selecttscdata1#divtimkiem" style="">TSC</a>

                            <div class="pie animate" style="--p:<?php echo round($tongoftongtsc); ?>;--c:orange;z-index: 4;margin-top:10px"><?php echo round($tongoftongtsc).'%'; ?></div>

						</h2>
							      <span style="font-size: 20px;">Tên Máy</span>
							<table class="table" style="overflow: scroll;overflow: hidden;height: 260px;">
							  <tbody>
							  	<?php 
							  	if($databophan1 > 0)
							  	{
							  	foreach ($databophan1 as $value) { 
                                $pos = strpos(strtoupper($value['tenmay']), 'LINE'); 
                              if($pos !== false){ 
							  		?>
							     <tr>
							      <th style="color: red;color: black;border-bottom: none;" scope="row"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a class="mobile" style="color: black;" href="../Controller/index.php?action=bieudoline&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?> </a></div></th>
							      <td style="color: black;border-bottom: none;">
								  <?php
								  $chuoi1 = substr($value['tiendo'], 0, -1);
								   echo floor($chuoi1).'%';
								    ?></td>
							    </tr>


							    <?php }else{ ?>

							    <tr>
							      <th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"> <a style="color: black;" href="../Controller/index.php?action=bieudo&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a></th>
							      <td style="color: black;border-bottom: none;">
								  <?php $chuoi2 = substr($value['tiendo'], 0, -1);
								   echo floor($chuoi2).'%';
								    ?>
									</div>
									</td>
							    </tr>
							    <?php } } }?>

							    	<?php 
							    	if($databophan4 > 0)
							    	{
							    	foreach ($databophan4 as $value) { ?>

							    <tr>
							      <th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;" href="../Controller/index.php?action=bieudoline1&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a></div></th>
							      <td style="color: black;border-bottom: none;"><?php echo $value['tiendo'].'%'; ?></td>
							    </tr>
							    <?php } } ?>

							  </tbody>
							</table>
					</article>
						<article class="tile" style="">
							<h2 style="">
								<a href="../Controller/index.php?action=selectapsdata1#divtimkiem" style="">APS</a>
								<div class="pie animate" style="--p:<?php echo round($tongoftongaps); ?>;--c:orange;z-index: 4;margin-top:10px"><?php echo round($tongoftongaps).'%'; ?></div>

							</h2>
							      <span style="font-size: 20px;">Tên Máy</span>
							<table class="table" style="overflow: scroll;overflow: hidden;height: 260px;">
								<tbody>
									<?php 
									if($databophan2 > 0)
									{
									foreach ($databophan2 as $value) { 
										$pos = strpos(strtoupper($value['tenmay']), 'LINE'); 
										if($pos !== false){ 
									?>
									<tr>
										<th style="color: black;border-bottom: none;" scope="row"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a class="mobile" style="color: black;" href="../Controller/index.php?action=bieudoline&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?> </a></div></th>
										<td style="color: black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
									</tr>
									<?php }else{ ?>
									<tr>
										<th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;border-bottom: none;" href="../Controller/index.php?action=bieudo&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a></div></th>
										<td style="color:black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
									</tr>
									<?php } } }?>
									<?php 
									if($databophan5 > 0)
									{
									foreach ($databophan5 as $value) { ?>
										<tr>
											<th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;width: 120px;" href="../Controller/index.php?action=bieudoline1&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'].'%'; ?></a></div></th>
											<td style="color:black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
										</tr>
									<?php } } ?>
								</tbody>
							</table>
					</article>
				</div>
			</section>
    
			<div style="" class="diemdanh">
				<div onclick="pcsh2()" style="" class="diemdanh1">
								<div class="sum" style="height:50px; text-align: center; color: #1656f0;  font-weight: bold; ">
									<h3>
										<span style="font-weight: bold;font-weight: 700px; font-size: 40px;">Điểm danh trong ngày</span>
										<span></span>
									</h3>
								</div>

					<div id="piechart" style="padding-top:10px; padding-left:70px;"></div>
				</div>
				<div class="diemdanh2" style="margin-top:20px;background: #c7deff;border-radius: 20px; height: 450px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
					
						<div class="sum" style="text-align: center; color: #1656f0; font-weight: 600;font-weight: bold; ">
						<h3>
							<span style="font-weight: bold; font-size: 40px;">Điểm danh trong tuần</span>
<<<<<<< HEAD
							<span></span>
=======
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
						</h3>
					</div>
					<div class="tab-content p-0">
						<div class="chart1 tab-pane active" id="dilam-chart" style="">
							<button id="change" class="buttont"></button>
							<div onclick="pcsh1()" id="columnchart1" style="padding-top:10px; padding-left:10px;"></div>
						</div>
                	</div>
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

<!-- mobile -->

<div class="modal fade" id="exampleModal100" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	 var show = document.getElementById('spani')
	 var showul = document.getElementById('ulli')
	 var header = document.getElementById('navmobile')
	 show.onclick = function(){

       showul.classList.toggle('ullishow');

	 }
</script>


<script type="text/javascript">
    document.getElementById("xacnhan").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau");
     var y = document.getElementById("span");
  x.value = x.value.toUpperCase();
     var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
window.location="../Controller/index.php?action=usermanager&page=1";
    }else{
      document.getElementById("idmatkhau").classList.add("is-invalid");
      document.getElementById("span").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span").style.color = 'red'
    }
    
}


</script>

<script type="text/javascript">
	function pcsh1() {
		window.location.href = './index.php?action=addchart#';
	}
</script>
<script type="text/javascript">
	function pcsh2() {
		window.location.href = './index.php?action=table-attendance#';
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
 
/* chart
================================================== */
function _chart ()
{
	$('.b-skills').appear(function() {
		setTimeout(function() {
			$('donut').easyPieChart({
				easing: 'easeOutElastic',
				delay: 3000,
				barColor: '#369670',
				trackColor: '#fff',
				scaleColor: false,
				lineWidth: 21,
				trackWidth: 21,
				size: 250,
				lineCap: 'round',
				onStep: function(from, to, percent) {
					this.el.children[0].innerHTML = Math.round(percent);
				}
			});
		}, 150);
	});
};
 

$(document).ready(function() {
  
	run(_chart);
  
    
});


    
    </script>
 
  

<script type="text/javascript">

	window.onload = function()
{
	var tong = "<?php echo floor($tongoftong); ?>"
	if(tong < 10)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test100");
	}
	if(tong < 20&&tong > 10)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test40");
	}
	if(tong < 30&&tong >= 20)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test80");
	}
	if(tong < 40&&tong >= 30)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test120");
	}
	if(tong < 50&&tong >= 40)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test160");
	}
	if(tong < 60&&tong >= 50)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test200");
	}
	if(tong < 70&&tong >= 60)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test240");
	}
	if(tong < 80&&tong >= 70)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test280");
	}
	if(tong < 90&&tong >= 80)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test320");
	}
	if(tong < 100&&tong >= 90)
	{
    var car = document.getElementById('test100')
	  car.classList.add("test360");
	}
} 

</script>
<<<<<<< HEAD
<script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
				['Loại phép', 'Thống kê'],
				<?php 
					while($rows = mysqli_fetch_array($result)){
echo "['".$rows["type_leave"]."', ".$rows["type_leave_no"]."],";
						}
				?>

        ]);

          // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            var counter = 0;

            var handler = setInterval(function(){ 
                counter = counter + 0.02,
                options = {
							backgroundColor: '#c7deff' ,
							chartArea:{width:"580" , height:"250", top:"80", right:"30"} ,
							width :"100%",
							height :"380",
							
                            animation: {
                                    duration: 100,
                                    easing: 'in',
                                    startup: true
                            },
                            slices: { 0: {offset: 0},
                                      1: {offset: counter},
                                      2: {offset: counter},
                                      3: {offset: counter},
                                      4: {offset: counter},
                            },
							legend: {textStyle: {fontSize: 22}, position: 'right',alignment: 'center'},
                            is3D: true
        };
                chart.draw(data, options);

                if (counter > 0.3) clearInterval(handler);
            }, 80);        
          
      }
    </script>
	<!-- <script type="text/javascript">
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Ngày', 'Đi làm', { role: 'annotation'} ,'Nghỉ làm',{ role: 'annotation'}],
		['Thứ hai',<?php echo $tiledilamthu2; ?>,<?php echo $dilamthu2; ?>,<?php echo $tilenghilamthu2; ?>,<?php echo $nghilamthu2; ?>],
		['Thứ ba',<?php echo $tiledilamthu3; ?>,<?php echo $dilamthu3; ?>,<?php echo $tilenghilamthu3; ?>,<?php echo $nghilamthu3; ?>],
		['Thứ tư',<?php echo $tiledilamthu4; ?>,<?php echo $dilamthu4; ?>,<?php echo $tilenghilamthu4; ?>,<?php echo $nghilamthu4; ?>],
        ['Thứ năm',<?php echo $tiledilamthu5; ?>,<?php echo $dilamthu5; ?>,<?php echo $tilenghilamthu5; ?>,<?php echo $nghilamthu5; ?>],
        ['Thứ sáu',<?php echo $tiledilamthu6; ?>,<?php echo $dilamthu6; ?>,<?php echo $tilenghilamthu6; ?>,<?php echo $nghilamthu6; ?>],
        ['Thứ bảy',<?php echo $tiledilamthu7; ?>,<?php echo $dilamthu7; ?>,<?php echo $tilenghilamthu7; ?>,<?php echo $nghilamthu7; ?>],
		]);
		

		var options = {	
							colors: ['#131685', '#34C79F'] ,backgroundColor: '#c7deff',chartArea:{height:"280",width:"680"},height:"380",width:"870",vAxis: {
							format: '#\'%\''
						} ,  animation: {
						duration: 500,
						easing: 'out',
						startup: true
						},
						legend: {position: 'bottom',alignment: 'center'},
						series: {
									0: {targetAxisIndex: 0},
									1: {targetAxisIndex: 1}
								},
						vAxes: {
						
							0: {title: 'Đi làm', textStyle: {color: '#131685', bold: true}},
							1: {title: 'Nghỉ làm', textStyle: {color: '#34C79F', bold: true}, minValue :0 , maxValue: 15}
						},
					}

		// Display the chart inside the <div> element with id="piechart"
		var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
		chart.draw(data, options);
=======
	<script type="text/javascript">
			// Load google charts
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);

			// Draw the chart and set the chart values
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Loại phép', 'Thống kê'],
					<?php 
						while($rows = mysqli_fetch_array($result)){
							echo "['".$rows["type_leave"]."', ".$rows["type_leave_no"]."],";
							}
					?>

			]);

			// Display the chart inside the <div> element with id="piechart"
				var chart = new google.visualization.PieChart(document.getElementById('piechart'));
				var counter = 0;

				var handler = setInterval(function(){ 
					counter = counter + 0.02,
					options = {
								backgroundColor: '#c7deff' ,
								chartArea:{width:"580" , height:"250", top:"80", right:"30"} ,
								width :"100%",
								height :"380",
								
								animation: {
										duration: 100,
										easing: 'in',
										startup: true
								},
								slices: { 0: {offset: 0},
										1: {offset: counter},
										2: {offset: counter},
										3: {offset: counter},
										4: {offset: counter},
								},
								legend: {textStyle: {fontSize: 22}, position: 'right',alignment: 'center'},
								is3D: true
			};
					chart.draw(data, options);

					if (counter > 0.3) clearInterval(handler);
				}, 80);        
			
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
		}
	</script> -->
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawStuff);

		function drawStuff() {

			var button = document.getElementById('change');
			var chartDiv = document.getElementById('columnchart1');

			var data = google.visualization.arrayToDataTable([
				['Ngày', 'Đi làm', { role: 'annotation'}],
				['Thứ hai',<?php echo $tiledilamthu2; ?>,<?php echo $dilamthu2; ?>],
				['Thứ ba',<?php echo $tiledilamthu3; ?>,<?php echo $dilamthu3; ?>],
				['Thứ tư',<?php echo $tiledilamthu4; ?>,<?php echo $dilamthu4; ?>],
				['Thứ năm',<?php echo $tiledilamthu5; ?>,<?php echo $dilamthu5; ?>],
				['Thứ sáu',<?php echo $tiledilamthu6; ?>,<?php echo $dilamthu6; ?>],
				['Thứ bảy',<?php echo $tiledilamthu7; ?>,<?php echo $dilamthu7; ?>],
			]);
			var data1 = google.visualization.arrayToDataTable([
				['Ngày','Nghỉ làm',{ role: 'annotation'}],
				['Thứ hai',	<?php echo $tilenghilamthu2; ?>, <?php echo $nghilamthu2; ?>],
				['Thứ ba',	<?php echo $tilenghilamthu3; ?>, <?php echo $nghilamthu3; ?>],
				['Thứ tư',	<?php echo $tilenghilamthu4; ?>, <?php echo $nghilamthu4; ?>],
				['Thứ năm',	<?php echo $tilenghilamthu5; ?>, <?php echo $nghilamthu5; ?>],
				['Thứ sáu',	<?php echo $tilenghilamthu6; ?>, <?php echo $nghilamthu6; ?>],
				['Thứ bảy',	<?php echo $tilenghilamthu7; ?>, <?php echo $nghilamthu7; ?>],
			]);

			var materialOptions = {
				colors: ['#131685'] ,backgroundColor: '#c7deff',chartArea:{height:"230",width:"750"},height:"330",width:"920",
				vAxis: {
							format: '#\'%\''
							} ,  
							animation: {
								duration: 500,
								easing: 'out',
								startup: true
								},
			};

			var classicOptions = {
				colors: ['#34C79F'] ,backgroundColor: '#c7deff',chartArea:{height:"230",width:"700"},height:"330",width:"920",
				vAxis: {
							format: '#\'%\''
							} ,  
							animation: {
								duration: 500,
								easing: 'out',
								startup: true
								},
			};

			function drawMaterialChart() {
			var materialChart = new google.visualization.ColumnChart(chartDiv);
			materialChart.draw(data,materialOptions);
			button.innerText = 'Chuyển sang nghỉ làm';
			button.onclick = drawClassicChart;
			}

			function drawClassicChart() {
			var classicChart = new google.visualization.ColumnChart(chartDiv);
			classicChart.draw(data1, classicOptions);
			button.innerText = 'Chuyển sang đi làm';
			button.onclick = drawMaterialChart;
			}
			drawMaterialChart();
		};
	</script>

	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawStuff);

		function drawStuff() {

			var button = document.getElementById('change');
			var chartDiv = document.getElementById('columnchart1');

			var data = google.visualization.arrayToDataTable([
				['Ngày', 'Đi làm', { role: 'annotation'}],
				['Thứ hai',<?php echo $tiledilamthu2; ?>,<?php echo $dilamthu2; ?>],
				['Thứ ba',<?php echo $tiledilamthu3; ?>,<?php echo $dilamthu3; ?>],
				['Thứ tư',<?php echo $tiledilamthu4; ?>,<?php echo $dilamthu4; ?>],
				['Thứ năm',<?php echo $tiledilamthu5; ?>,<?php echo $dilamthu5; ?>],
				['Thứ sáu',<?php echo $tiledilamthu6; ?>,<?php echo $dilamthu6; ?>],
				['Thứ bảy',<?php echo $tiledilamthu7; ?>,<?php echo $dilamthu7; ?>],
			]);
			var data1 = google.visualization.arrayToDataTable([
				['Ngày','Nghỉ làm',{ role: 'annotation'}],
				['Thứ hai',	<?php echo $tilenghilamthu2; ?>, <?php echo $nghilamthu2; ?>],
				['Thứ ba',	<?php echo $tilenghilamthu3; ?>, <?php echo $nghilamthu3; ?>],
				['Thứ tư',	<?php echo $tilenghilamthu4; ?>, <?php echo $nghilamthu4; ?>],
				['Thứ năm',	<?php echo $tilenghilamthu5; ?>, <?php echo $nghilamthu5; ?>],
				['Thứ sáu',	<?php echo $tilenghilamthu6; ?>, <?php echo $nghilamthu6; ?>],
				['Thứ bảy',	<?php echo $tilenghilamthu7; ?>, <?php echo $nghilamthu7; ?>],
			]);

			var materialOptions = {
				colors: ['#131685'] ,backgroundColor: '#c7deff',chartArea:{height:"230",width:"650"},height:"330",width:"830",
				vAxis: {
							format: '#\'%\''
							} ,  
							animation: {
								duration: 500,
								easing: 'out',
								startup: true
								},
			};

			var classicOptions = {
				colors: ['#34C79F'] ,backgroundColor: '#c7deff',chartArea:{height:"230",width:"650"},height:"330",width:"830",
				vAxis: {
							format: '#\'%\''
							} ,  
							animation: {
								duration: 500,
								easing: 'out',
								startup: true
								},
			};

			function drawMaterialChart() {
			var materialChart = new google.visualization.ColumnChart(chartDiv);
			materialChart.draw(data,materialOptions);
			button.innerText = 'Chuyển sang nghỉ làm';
			button.onclick = drawClassicChart;
			}

			function drawClassicChart() {
			var classicChart = new google.visualization.ColumnChart(chartDiv);
			classicChart.draw(data1, classicOptions);
			button.innerText = 'Chuyển sang đi làm';
			button.onclick = drawMaterialChart;
			}
			drawMaterialChart();
		};
	</script>


<!-- jQuery -->
<script src="../Employee-management-system/admin/include/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../Employee-management-system/admin/include/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../Employee-management-system/admin/include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../Employee-management-system/admin/include/plugins/chart.js/Chart.min.js"></script>
<!-- overlayScrollbars -->
<script src="../Employee-management-system/admin/include/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../Employee-management-system/admin/include/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../Employee-management-system/admin/include/dist/js/pages/dashboard.js"></script>
<script  src="../Employee-management-system/admin/include/dist/js/script.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="../Employee-management-system/admin/include/dist/js/clock.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script src="../View/maymoc/chart-round.js"></script>
</body>
</html>
 