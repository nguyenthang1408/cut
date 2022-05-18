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
foreach ($data1 as $key) {
    	$datamin = $key['tiendo'];
		$ch = substr($datamin, 0, -1);
		if($ch < 100)
		{
         $a++;
		}
}
foreach ($data2 as $key) {
    	$datamin = $key['tiendo'];
		$ch = substr($datamin, 0, -1);
		if($ch < 100)
		{
         $b++;
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
$data1 = $db->getAllData($table);
$dataAEC = $db->getAllDatabophan($table,$AEC);
$dataTSC = $db->getAllDatabophan($table,$TSC);
$dataAPS = $db->getAllDatabophan($table,$APS);
$num_row = $db->count_row($table);
$count_row_AEC = $db->count_row_bophan($table,$AEC);
$count_row_TSC = $db->count_row_bophan($table,$TSC);
$count_row_APS = $db->count_row_bophan($table,$APS);
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

$tongg = round(((round(($tongaps/$count_row_APS),2)+round(($tongtsc/$count_row_TSC),2)+round(($tongaec/$count_row_AEC),2))/3),2).'%';

$tonggg = substr($tongg, 0, -1);

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
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<title>VN cable 自動化</title>
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

        <div class="app" style="">
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
	       <header id="app-header" class="app-header" style="">
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
					<a href="#" class="a1">
						<i class="fas fa-solid fa-house-user a1i"></i>
						<span style="">菜單</span>
					</a>
					<a class="a2" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
						<i style="" class="fas fa-solid fa-user"></i>
						<span style="">賬號</span>
					</a>
					<a href="../Employee-management-system/admin-cn/attendance.php" class="a3">
						<i style="margin-left: -5px;" class="fas fa-solid fa-info a3i"></i>
						<span style="margin-left: 10px;" class="">點名</span>
					</a>
					<ul>
						<li>
							<a href="#" class="a4" style="margin-left: 10px;">
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
			<div class="app-body-main-content" style="">
				<section class="service-section">
					<div class="tiles" style="">
						<article class="tile" style="">
							<div class="sum" style="">
								<h3>
									<span style="">專案</span>
									<span></span>
								</h3>
							</div>
							<div class="b-skills" style="">
								<div class="container" style="">
									<div class="row" style="">
										<div class="" style="">
											<div class="skill-item center-block" style="">
												<div class="chart-container" style="">
													<div class="chart " data-percent="<?php echo $tongg; ?>" data-bar-color="#131685" style="">
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
								  <span style="font-weight: bold;"><a href="../Controller/index.php?action=sum-cn">總專案 : <?php echo $counttong; ?></a></span>
							   </h4>
							</div>
							<div class="loading" style="">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=projectloading-cn">在執行 : <?php echo $ab; ?></a></span>
								</h4>
							</div>
							<div class="loading" style="margin-top:27px">
								<h4>
									<span style="font-weight: bold;"><a  href="../Controller/index.php?action=projectdone-cn">已完成 : <?php echo $counttong - $ab; ?></a></span>
								</h4>
							</div>
						</article>
						<article class="tile" id="" style="">
                  			<h2 class="tileh2" id="tileh2" style="height:170px">
				        		<a href="../Controller/index.php?action=selectaecdata-cn#divtimkiem" style="">AEC</a>
				        		<div class="pie animate" style="--p:<?php echo round($phantramAEC1); ?>;--c:orange;z-index: 4;margin-top:10px"><?php echo round($phantramAEC1).'%'; ?></div>
				  			</h2>
							<span style="font-size: 20px;">機台名稱</span>
								<table class="table" style="">
							  		<tbody class="bodytable">
							  			<?php foreach ($databophan as $value) { 
											$pos = strpos(strtoupper($value['tenmay']), 'LINE'); 
											if($pos !== false){ 
							  			?>
							  			<tr>
											<th style="border-bottom: none;" > <div style="width: 110px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a class="mobile" style="color: black;" href="../Controller/index.php?action=bieudoline-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay']; ?> </a></div></th>
											<td style="color: black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
							   			</tr>
							   			<?php }else{ ?>
											<tr>
												<th  style="border-bottom: none;"> <div style="width: 110px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;" href="../Controller/index.php?action=bieudo-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a> </div></th>

												<td style="color: black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
											</tr>
							    		<?php } } ?>
							    		<?php foreach ($databophan3 as $value) { ?>
											<tr>
												<th  style="border-bottom: none;"> <div style="width: 110px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;width: 110px;" href="../Controller/index.php?action=bieudoline1-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay']; ?></a></div> </th>

												<td  style="color: black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
											</tr>
							   			 <?php } ?>
						     	  </tbody>
						
							</table>
					</article>
					<article class="tile" style="">
						<h2 style="">
							<a href="../Controller/index.php?action=selecttscdata-cn#divtimkiem" style="">TSC</a>

                            <div class="pie animate" style="--p:<?php echo round($phantramTSC1); ?>;--c:orange;z-index: 4;margin-top:10px"><?php echo round($phantramTSC1).'%'; ?></div>

						</h2>
							      <span style="font-size: 20px;">機台名稱</span>
							<table class="table" style="overflow: scroll;overflow: hidden;">
							  <tbody class="tbodyy">
							  	<?php foreach ($databophan1 as $value) { 
                                $pos = strpos(strtoupper($value['tenmay']), 'LINE'); 
                              if($pos !== false){ 
							  		?>
							     <tr>
							      <th style="color: red;color: black;border-bottom: none;" scope="row"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a class="mobile" style="color: black;" href="../Controller/index.php?action=bieudoline-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?> </a></div></th>
							      <td style="color: black;border-bottom: none;"><?php
								  $chuoi1 = substr($value['tiendo'], 0, -1);
								   echo floor($chuoi1).'%';
								    ?></td>
							    </tr>


							    <?php }else{ ?>

							    <tr>
							      <th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"> <a style="color: black;" href="../Controller/index.php?action=bieudo-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a></th>
							      <td style="color: black;border-bottom: none;"><?php
								  $chuoi1 = substr($value['tiendo'], 0, -1);
								   echo floor($chuoi1).'%';
								    ?></div></td>
							    </tr>
							    <?php } } ?>

							    	<?php foreach ($databophan4 as $value) { ?>

							    <tr>
							      <th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;" href="../Controller/index.php?action=bieudoline1-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a></div></th>
							      <td style="color: black;border-bottom: none;"><?php
								  $chuoi1 = substr($value['tiendo'], 0, -1);
								   echo floor($chuoi1).'%';
								    ?></td>
							    </tr>
							    <?php } ?>

							  </tbody>
							</table>
					</article>
						<article class="tile" style="">
							<h2 style="">
								<a href="../Controller/index.php?action=selectapsdata-cn#divtimkiem" style="">APS</a>
								<div class="pie animate" style="--p:<?php echo round($phantramAPS1); ?>;--c:orange;z-index: 4;margin-top:10px"><?php echo round($phantramAPS1).'%'; ?></div>

							</h2>
							      <span style="font-size: 20px;">機台名稱</span>
							<table class="table" style="overflow: scroll;overflow: hidden;">
								<tbody>
									<?php foreach ($databophan2 as $value) { 
										$pos = strpos(strtoupper($value['tenmay']), 'LINE'); 
										if($pos !== false){ 
									?>
									<tr>
										<th style="color: black;border-bottom: none;" scope="row"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a class="mobile" style="color: black;" href="../Controller/index.php?action=bieudoline-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?> </a></div></th>
										<td style="color: black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
									</tr>
									<?php }else{ ?>
									<tr>
										<th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;border-bottom: none;" href="../Controller/index.php?action=bieudo-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a></div></th>
										<td style="color:black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
									</tr>
									<?php } } ?>
									<?php foreach ($databophan5 as $value) { ?>
										<tr>
											<th scope="row" style="color: black;border-bottom: none;"><div style="width: 120px;height: 30px;text-overflow: ellipsis;overflow: hidden; text-align: left;white-space: nowrap;"><a style="color: black;width: 120px;" href="../Controller/index.php?action=bieudoline1-cn&id=<?php echo $value['id']; ?>"> <?php echo $value['tenmay'] ?></a></div></th>
											<td style="color:black;border-bottom: none;"><?php echo $value['tiendo']; ?></td>
										</tr>
									<?php } ?>
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

					<div id="piechart" style="padding-top:10px; padding-left:70px;"></div>
				</div>
				<div class="diemdanh2" style="margin-top:20px;background: #c7deff;border-radius: 20px; height: 450px;box-shadow:-7px -7px 15px rgb(255, 255, 255), 7px 7px 15px rgba(121, 130, 160, 0.747);">
					
						<div class="sum" style="text-align: center; color: #1656f0; font-weight: 600;font-weight: bold; ">
						<h3>
							<span style="font-weight: bold; font-size: 40px;">當週點名</span>
						</h3>
					</div>
					<div class="tab-content p-0">
						<div class="chart tab-pane active" id="dilam-chart" style="">
							<button id="change-chart" class="buttont"></button>
							<div onclick="pcsh1()" id="chart_div1" style="padding-top:10px; padding-left:10px;"></div>
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
    if(x.value == '<?php echo $matkhau1[1] ?>'){
window.location="../Controller/index.php?action=usermanager-cn&page=1";
    }else{
      document.getElementById("idmatkhau").classList.add("is-invalid");
      document.getElementById("span").innerText = '號碼号码不正确'
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
	var tong = "<?php echo floor($tonggg); ?>"
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
	
	<script type="text/javascript">
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart1);

		// Draw the chart and set the chart values
		
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../Employee-management-system/admin/include/dist/js/clock.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div1');

        var data = google.visualization.arrayToDataTable([
			['Ngày', '上班', { role: 'annotation'}],
			['周一',<?php echo $tiledilamthu2; ?>,<?php echo $dilamthu2; ?>],
			['周二',<?php echo $tiledilamthu3; ?>,<?php echo $dilamthu3; ?>],
			['周三',<?php echo $tiledilamthu4; ?>,<?php echo $dilamthu4; ?>],
			['周四',<?php echo $tiledilamthu5; ?>,<?php echo $dilamthu5; ?>],
			['星期五',<?php echo $tiledilamthu6; ?>,<?php echo $dilamthu6; ?>],
			['周六',<?php echo $tiledilamthu7; ?>,<?php echo $dilamthu7; ?>],
        ]);
		var data1 = google.visualization.arrayToDataTable([
			['Ngày','請假',{ role: 'annotation'}],
			['周一',	<?php echo $tilenghilamthu2; ?>, <?php echo $nghilamthu2; ?>],
			['周二',	<?php echo $tilenghilamthu3; ?>, <?php echo $nghilamthu3; ?>],
			['周三',	<?php echo $tilenghilamthu4; ?>, <?php echo $nghilamthu4; ?>],
			['周四',	<?php echo $tilenghilamthu5; ?>, <?php echo $nghilamthu5; ?>],
			['星期五',	<?php echo $tilenghilamthu6; ?>, <?php echo $nghilamthu6; ?>],
			['周六',	<?php echo $tilenghilamthu7; ?>, <?php echo $nghilamthu7; ?>],
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
          button.innerText = '转变請假';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data1, classicOptions);
          button.innerText = '转变上班';
          button.onclick = drawMaterialChart;
        }
        drawMaterialChart();
    };
    </script>
</body>
</html>
