<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style type="text/css">
    #chart-container{   
    }
    .input-group{
        margin: auto;
        width:30%;
        height:30%; 
    }
    #formTK{
        margin-bottom: 300px    ;
        margin: auto;
    }
    table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

</head>
<body>
    <?php
        $thang = date('m', strtotime("now"));
        require_once "include/header-cn.php";
        //  database connection
        require_once "../connection.php";
        require_once "../datachart.php";
            // database connection
            $i = 1; 
            $query = "SELECT date,SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE attendance1 = '0' OR attendance1 ='1' GROUP BY date ORDER BY date LIMIT 7"; 
            $result = mysqli_query($conn,$query);    

    ?>


<?php
    $today1 = date('Y-m-d');
    $result1 = mysqli_query($conn, 'select count(employcode) as total from employee');
    $row1 = mysqli_fetch_assoc($result1);   
    $total_records = $row1['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 16;
    $total_page = ceil($total_records / $limit);
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
      $current_page = $total_page;
    }
    else if ($current_page < 1){
      $current_page = 1;
    }
      // Tìm Start
    $start = ($current_page - 1) * $limit;

    $sql = "SELECT B.`employcode`, B.`name` ,A.`date` , A.`type_leave` 
    FROM `attendance`AS A 
    INNER JOIN `employee` AS B 
    ON B.`id` = A.`member_id` WHERE A.`type_leave`='Phép năm' OR A.`type_leave`='Việc riêng' OR A.`type_leave`='Phép bệnh' OR A.`type_leave`='Tự do' AND A.`date`= '$today1' LIMIT $start, $limit ";
    $result = mysqli_query($conn , $sql);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thống kê điểm danh</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thống kê điểm danh</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Đi làm trong tuần</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
                <div class="card-body chart" id="columnchart"></div>
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Trong năm <?php echo $year; ?></h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                </div>
                <div class="card-body chart" id="chart_div"></div>
            </div>
            <!-- /.card -->


          </div>

            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Bảng thống kê nghỉ phép</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                </div>
                <!-- /.card-header -->

               <!-- Bảng thống kê -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày</th>
                                 <th>Hình thức</th>
                            </tr>
                        </thead>
                      <tbody>
                        <?php 
                            if( mysqli_num_rows($result) > 0){
                                while( $rows = mysqli_fetch_assoc($result) ){
                                    $employcode = $rows["employcode"];
                                    $name = $rows["name"];
                                    $date = $rows["date"];
                                    $hinhthuc = $rows["type_leave"]; 
                                    ?>
                                <tr>
                                <td><?php echo "$i."; ?></td>
                                <td><?php echo $employcode; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $hinhthuc; ?></td>

                            <?php 
                                    $i++;
                                    }
                                }
                            ?>
                             </tr>
                      </tbody>
                    </table>
                    <!-- Bảng thống kê -->
                    <!-- Phân trang -->
                        <div class="pagination" align="right">
                           <?php 
                            // PHẦN HIỂN THỊ PHÂN TRANG
                            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                 
                            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                            if ($current_page > 1 && $total_page > 1){
                                echo '<a href="char2.php?page='.($current_page-1).'">Trước</a> | ';
                            }
                 
                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<span>'.$i.'</span> | ';
                                }
                                else{
                                    echo '<a href="char2.php?page='.$i.'">'.$i.'</a> | ';
                                }
                            }
                 
                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<a href="char2.php?page='.($current_page+1).'">Tiếp</a> | ';
                            }
                           ?>
                        </div>
                        <!-- Phân trang --> 
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
        ['Ngày', 'Đi làm', 'Nghỉ làm'],
        ['Thứ hai',<?php echo $tiledilamthu2; ?>,<?php echo $tilenghilamthu2; ?>],
        ['Thứ ba',<?php echo $tiledilamthu3; ?>,<?php echo $tilenghilamthu3; ?>],
        ['Thứ tư',<?php echo $tiledilamthu4; ?>,<?php echo $tilenghilamthu4; ?>],
        ['Thứ năm',<?php echo $tiledilamthu5; ?>,<?php echo $tilenghilamthu5; ?>],
        ['Thứ sáu',<?php echo $tiledilamthu6; ?>,<?php echo $tilenghilamthu6; ?>],
        ['Thứ bảy',<?php echo $tiledilamthu7; ?>,<?php echo $tilenghilamthu7; ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {backgroundColor: '#c8dbcd',height:"350",vAxis: {
            minValue: 0,
            maxValue: 100,
            format: '#\'%\''
        } ,  
        animation: {
          duration: 500,
          easing: 'out',
          startup: true
      },
     };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
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
    var options = {backgroundColor: '#c8dbcd',height:"350",vAxis: {
            minValue: 0,
            maxValue: 100,
            format: '#\'%\''
        } , 
      legend: {
				position: 'bottom'
				},
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
</body>
</html>
<?php 
    require_once "include/footer.php";
?>

