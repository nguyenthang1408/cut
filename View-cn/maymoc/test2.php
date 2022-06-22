<?php 
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
    header('Location: ../Controller/index.php?action=begin-cn');
}
if(isset($_GET['delete'])){
if(isset($_GET['id'])){
$id = $_GET['id'];
$table = "tiendomaymoc";
if($db->Delete($id,$table))
{
   header('location: ../Controller/index.php?action=home-cn#divtimkiem');
}
else{
     header('location: ../Controller/index.php?action=home-cn#divtimkiem');
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
	<script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
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

        #change
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
			margin-right: 10px;
		} 
		.rdb2
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
			margin-right: 10px;
		}
		#piechart {
			height: 370px;
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
					<a href="../Employee-management-system/admin-cn/attendance.php" class="a3">
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
								<li style=""><a href="../Controller/index.php?action=selectaecdata-cn#divtimkiem">AEC</a></li>
								<li style=""><a href="../Controller/index.php?action=selecttscdata-cn#divtimkiem">TSC</a></li>
								<li style=""><a href="../Controller/index.php?action=selectapsdata-cn#divtimkiem">APS</a></li>
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
													<div class="chart " data-percent="<?php echo $tongoftong; ?>" data-bar-color="#131685" style="">
														<span class="percent" data-after="%" style=""></span>
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
								  <span style="font-weight: bold;"><a href="../Controller/index.php?action=sum1-cn">Tổng Dự Án:<?php echo $counttong; ?></a></span>
							   </h4>
							</div>
							<div class="loading" style="">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=projectloading1-cn">Đang Làm: <?php echo $ab; ?></a></span>
								</h4>
							</div>
							<div class="loading" style="margin-top:27px">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=projectdone1-cn">Hoàn Thành: <?php echo $counttong - $ab; ?></a></span>
								</h4>
							</div>
							<div class="loading" style="margin-top:27px">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=hieusuat-cn">Hiệu Suất</a></span>
								</h4>
							</div>
						</article>
						<article class="tile" id="" style="">
                  			<h2 class="tileh2" id="tileh2" style="">
				        		<a href="../Controller/index.php?action=selectaecdata1-cn#divtimkiem" style="">AEC</a>

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
							<a href="../Controller/index.php?action=selecttscdata1-cn#divtimkiem" style="">TSC</a>

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
								<a href="../Controller/index.php?action=selectapsdata1-cn#divtimkiem" style="">APS</a>
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
										<span style="font-weight: bold;font-weight: 700px; font-size: 40px;">當天點名</span>
										<span></span>
									</h3>
								</div>
					<figure class="highcharts-figure">
					<div id="piechart" style=""></div>
				</div>
				<div class="diemdanh2" style="margin-top:20px;background: #c7deff;border-radius: 20px; height: 450px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
					
						<div class="sum" style="text-align: center; color: #1656f0; font-weight: 600;font-weight: bold; ">
						<h3>
							<span style="font-weight: bold; font-size: 40px;">當週點名</span>
							<span></span>
						</h3>
					</div>
					<div class="tab-content p-0">
						<div class="chart1 tab-pane active" id="dilam-chart" style="">
							<!-- <button id="change" name="button">Chuyển sang nghỉ làm</button> -->
						<label><input id="rdb1" type="radio" name="toggler" value="divID-1" style="cursor:pointer;" checked/>上班</label>
            			<label><input id="rdb2" type="radio" name="toggler" value="divID-2" style="cursor:pointer;" />請假</label>
									</br>
									<div onclick= pcsh1() id="divID-1" class="toHide" style="position:relative;margin-bottom:-400px;"></div> 
         							<div onclick= pcsh1() id="divID-2" class="toHide" style="margin-top: 50px;position:relative;top:-9999em;opacity:0;"></div> 
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
		window.location.href = './index.php?action=addchart-cn#';
	}
</script>
<script type="text/javascript">
	function pcsh2() {
		window.location.href = './index.php?action=table-attendance-cn#';
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
			$('.chart').easyPieChart({
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

	<script type="text/javascript">
		Highcharts.setOptions({
			colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
		});
		Highcharts.chart('piechart', {
			chart: {
				type: 'pie',
				backgroundColor:'#c7deff',
				marginBottom: 100,
				marginLeft:10,
				height: 500,
				width: 600,
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0
					}
			},	
			title: false,
			subtitle: false,
			annotations:[{
				animation: {
					defer: 0
				},
			}],
			accessibility: {
				point: {
				valueSuffix: '%'
				}
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					depth: 35,
					dataLabels: {
						style:{
							fontSize: 15
								},
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %'
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Tỉ lệ',
				data: [
					<?php 
						while($rows = mysqli_fetch_array($result)){
							echo "['".$rows["type_leave"]."', ".$rows["type_leave_no"]."],";
							}
					?>
				]
			}]
		});
	</script>
	
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
				type: 'column',
				backgroundColor:'#c7deff',
				height: 350,
				},
				
				title: false,
				xAxis: {
					categories: ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六']
				},
				yAxis: {
					min: 0,
					title: {
						text: '上班'
						},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: ( // theme
							Highcharts.defaultOptions.title.style &&
							Highcharts.defaultOptions.title.style.color
							) || 'gray'
						}
					}
				},
				legend: {
					align: 'right',
					x: -30,
					verticalAlign: 'top',
					y: 25,
					floating: true,
					shadow: false
				},
				tooltip: {
					headerFormat: '<b>{point.x}</b><br/>',
					pointFormat: '{series.name}: <b>{y}</b>'
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: true
						}
					}
				},
				series: [{
					name: '上班',
					data: [
					<?php echo $dilamthu2; ?>, 
					<?php echo $dilamthu3; ?>, 
					<?php echo $dilamthu4; ?>, 
					<?php echo $dilamthu5; ?>, 
					<?php echo $dilamthu6; ?>, 
					<?php echo $dilamthu7; ?>],
				}],
			});

			Highcharts.chart('divID-2', {
				chart: {
					type: 'column',
					backgroundColor:'#c7deff',
					height: 350,
					},
				title: false,
				colors: ['#DC143C'],
				xAxis: {
					categories: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7']
				},
				yAxis: {
					min: 0,
					title: {
						text: '請假'
						},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: ( 
							Highcharts.defaultOptions.title.style &&
							Highcharts.defaultOptions.title.style.color
							) || 'gray'
						}
					}
				},
				legend: {
					align: 'right',
					x: -30,
					verticalAlign: 'top',
					y: 25,
					floating: true,
					shadow: false
				},
				tooltip: {
					headerFormat: '<b>{point.x}</b><br/>',
					pointFormat: '{series.name}: <b>{point.x}%</b>'
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: true
						}
					}
				},
				series: [{
					name: '請假',
					data: [
					<?php echo $nghilamthu2; ?>, 
					<?php echo $nghilamthu3; ?>, 
					<?php echo $nghilamthu4; ?>, 
					<?php echo $nghilamthu5; ?>,
					<?php echo $nghilamthu6; ?>, 
					<?php echo $nghilamthu7; ?>
					],
				}],
			});
		});
    }
    </script>
</body>
</html>
