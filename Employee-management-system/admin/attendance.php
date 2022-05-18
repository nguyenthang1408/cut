	
<?php 
	include "include/header.php";
	// database connection
	require_once "../connection.php";
    $query = "SELECT * FROM employee ";
    $result = mysqli_query($conn,$query);
    $s=0;
    while ($rows = mysqli_fetch_array($result)) {
    $s = $s + 1;
    }
	$result1 = mysqli_query($conn, 'select count(id) as total from employee');
	$row1 = mysqli_fetch_assoc($result1); 	
	$total_records = $row1['total'];

	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 10;
	$total_page = ceil($total_records / $limit);
	// Giới hạn current_page trong khoảng 1 đến total_page
	if ($current_page > $total_page){
		$current_page = $total_page;
	}
	else if ($current_page < 1){
		$current_page = 1;
		// Tìm Start
		$start = ($current_page - 1) * $limit;
	}
?>
	<style type="text/css">
		.button_scroll2top
			{
				display:none;
				width:80px;
				height:70px;
				padding-top:20px;
				padding-left:10px;
				position:fixed;
				z-index:999;
				right:-45px;
				top:45%;
				background:#fb3;
				border-radius:999px;
				cursor:pointer;
				opacity:0.6;
				color:#fff;
				font-size:2.0em;
			}

		.button_scroll2top:hover
			{
				opacity:1.0;
			}

		.back-to-top {
		    position: fixed;
		    top: auto;
		    left: auto;
		    right: 15px;
		    bottom: 15px;
		    font-size: 32px;
		    opacity: 0.8;
		    z-index: 9999;
		    cursor: pointer;
		}

		.back-to-top:hover {
		    opacity: 1;
		}
	
		table, th, td {
		border: 1px solid black;
		padding: 15px;
		}
		table {
		border-spacing: 10px;
		text-align: center;
		}
		input {
			text-align: center;
		}
		#getinput{
			float: none;

		}
		#myInput{
			float: right;
		}
		#mylist {
		float: none;
		}

	</style>
	 <script type="text/javascript">
	function getatt(value)
	{
		if(value == false)
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
		}
		else
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
		}
	}
	$(window).scroll(function(){
		if($(window).scrollTop() >= 10) {
			$('.button_scroll2top').show();
		} else {
			$('.button_scroll2top').hide();
		}
	});
	function page_scroll2top(){
		$('html,body').animate({
			scrollTop: 0
	    }, 'fast');
	}
	function myFunction() {
						  // Declare variables
						  var input, filter, table, tr, td, i, txtValue;
						  input = document.getElementById("myInput");
						  filter = input.value.toUpperCase();
						  table = document.getElementById("myTable");
						  tr = table.getElementsByTagName("tr");

						  // Loop through all table rows, and hide those who don't match the search query
						  for (i = 0; i < tr.length; i++) {
						    td = tr[i].getElementsByTagName("td")[0];
						    if (td) {
						      txtValue = td.textContent || td.innerText;
						      if (txtValue.toUpperCase().indexOf(filter) > -1) {
						        tr[i].style.display = "";
						      } else {
						        tr[i].style.display = "none";
						      }
						    }
						  }
						}
		function filter() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("mylist");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[2];
		    if (td) {
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }
		}
</script>
  <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<form action="getattendance.php" method="post" >
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Điểm danh</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Điểm danh</li>
						</ol>
					</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
				<!-- main codes clock calendar -->
					<div class="signboard outer" style = "top:50px;">
						<div class="signboard front inner anim04c">
							<li class="year anim04c">
								<span></span>
							</li>
							<ul class="calendarMain anim04c">
								<li class="month anim04c">
									<span></span>
								</li>
								<li class="date anim04c">
									<span></span>
								</li>
								<li class="day anim04c">
									<span></span>
								</li>
							</ul>
							<li class="clock minute anim04c">
								<span></span>
							</li>
							<li class="calendarNormal date2 anim04c">
								<span></span>
							</li>
						</div>
						<div class="signboard left inner anim04c">
							<li class="clock hour anim04c">
								<span></span>
							</li>
							<li class="calendarNormal day2 anim04c">
								<span></span>
							</li>
						</div>
						<div class="signboard right inner anim04c">
							<li class="clock second anim04c">
								<span></span>
							</li>
							<li class="calendarNormal month2 anim04c">
								<span></span>
							</li>
						</div>
					</div>
					<br/>
					<!-- Card attendance -->
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-sm-4 col-6">
									<div class="description-block border-right">
										<h5 class="description-header"><input type="text" id="txtStrength" value="<?php print $s; ?>" size="10" disable="disabled"></h5>
										<span class="description-text">Quân số</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4 col-6">
									<div class="description-block border-right">
										<h5 class="description-header"><input type="text" id="txtAbsent" value="<?php print $s; ?>" size="10" disable="disabled"></h5>
										<span class="description-text">Có mặt</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4 col-6">
									<div class="description-block">
										<h5 class="description-header"><input type="text" id="txtPresent" value="0" size="10" disable="disabled"></h5>
										<span class="description-text">Vắng mặt</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- card -->
					<br/>
					<!-- TABLE: LATEST ORDERS -->
					<div class="card">
						<div class="card-header border-transparent">
							<h3 class="card-title">Điểm danh</h3>
							<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm theo mã nhân viên..">
							<div class="card-tools">
							<input type="text" id="mylist" onkeyup="filter()" placeholder="Tìm theo bộ phận..">
							</div>
						</div>
					<!-- /.card-header -->
						<div class="card-body p-0">
							<input type="date" name="date"></input>
							<div class="table-responsive">
								<table class="table m-0" id="myTable">
									<thead>
									<tr>
									<th style="background: #3fe219; color: white;">Mã nhân viên</th>
									<th style="background: #2bcece; color: white;">Họ tên</th>
									<th style="background: #ff9378; color: white;">Bộ phận</th>
									<th style="background: #edc045; color: white;">Trạng thái</th>
									<th style="background: #dafa28; color: white;">Loại phép (Nếu vắng)</th>
									</tr>
									</thead>
									<tbody>
										<?php 
										// database connection
										require_once "../connection.php";
										$query = "SELECT * FROM employee";
										$result = mysqli_query($conn,$query);
										while ($rows = mysqli_fetch_array($result)) {
											$s = $s + 1;
											$employcode = $rows["employcode"];
											$name = $rows["name"];
											$salary = $rows["salary"];
										?>
										<tr>
											<td> <?php echo $employcode; ?> </td>
											<td> <?php echo $name; ?> </td>
											<td> <?php echo $salary; ?> </td>
											<td><input checked="checked" type=checkbox name= "<?php echo $rows["id"] ?>" onclick="getatt(this.checked)"/></td>
											<td><select name="hinhthuc<?php echo $rows["id"] ?>">
													<option value="Phép năm">Phép năm</option>
													<option value="Việc riêng">Việc riêng</option>
													<option value="Phép bệnh">Phép bệnh</option>
													<option value="Tự do">Tự do</option>
												</select>
											</td>
										</tr>
											<?php } ?>
									</tbody>
								</table>
							</div>
						<!-- /.table-responsive -->
						</div>
					<!-- /.card-body -->
					<div class="card-footer clearfix">
						<input class="btn btn-primary btn-lg" id="save" type="submit" value="Lưu Điểm danh" name="btnsubmit">
					</div>
					<!-- /.card-footer -->
				</div>
			<!-- /.card -->
				</div>
    		</section>
    <!-- /.content -->
  			</div>
  		</form>
	</div>
  <!-- /.content-wrapper -->
<div
    class="button_scroll2top" 
    onclick="page_scroll2top()"
>
    <i class="fa fa-chevron-up">
</div>
 
<?php require_once "include/footer.php"; ?>


