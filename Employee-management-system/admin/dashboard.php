<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style type="text/css">
    #chart-container{   
      width:30%;
      height:30%;
    }
    .input-group{
        margin: auto;
        width:30%;
        height:30%;
    }
    .inputQS{
        float: left;
    }
    #input100{
        width: 50%;
        float: left;
    }
    #filter{
        float: left;
    }
    </style>
</head>
<body>
<?php
        
        include "include/header.php";

        // database connection
        // require_once "../connection.php";

         $currentDay = date( 'Y-m-d', strtotime("today") );
         $tomarrow = date( 'Y-m-d', strtotime("+1 day") );
         $today_leave = 0;
         $tomarrow_leave = 0;
         $this_week = 0;
         $next_week = 0;
            $i = 1;
        // total admin
        $select_admins = "SELECT * FROM admin";
        $total_admins = mysqli_query($conn , $select_admins);

        // total employee
        $select_emp = "SELECT * FROM employee";
        $total_emp = mysqli_query($conn , $select_emp);

        // employee on leave
        $emp_leave  ="SELECT * FROM emp_leave WHERE status = 'Đồng ý' ";
        $total_leaves = mysqli_query($conn , $emp_leave);
        
        if( mysqli_num_rows($total_leaves) > 0 ){
            while( $leave = mysqli_fetch_assoc($total_leaves) ){
                $leave = $leave["start_date"];
                // //daywise
                if($currentDay == $leave ){
                    $today_leave += 1;
                }elseif($tomarrow == $leave){
                   $tomarrow_leave += 1;
                }


            }
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
        }
         
        // Tìm Start
        $start = ($current_page - 1) * $limit;

        // highest paid employee
        $sql_highest_salary =  "SELECT * FROM employee LIMIT $start, $limit";
        $emp_ = mysqli_query($conn , $sql_highest_salary);

        $dt = getdate();
    $day = $dt["mday"];
    $month = date("m");
    $year = $dt["year"];
    $today = "$year"."-"."$month"."-"."$day";

       $date = $today;
       if(isset($_POST['formsubmit'])){
            $date = $_POST['input100'];
        }    

    $query = "SELECT type_leave , COUNT(type_leave) AS type_leave_no FROM attendance WHERE date = '$date' GROUP BY type_leave";
    $result = mysqli_query($conn, $query);
    if(!mysqli_num_rows($result)>0){
        echo "<script>
                $(document).ready( function(){
                    $('#showModal').modal('show');
                    $('#linkBtn').attr('href', 'attendance.php');
                    $('#linkBtn').text('Tới điểm danh');
                    $('#addMsg').text('Chưa có dữ liệu hôm nay, hãy điểm danh trước');
                    $('#closeBtn').text('Ok, đã hiểu');
                })
             </script>
             ";
         }
    $query1 = "SELECT type_leave , COUNT(type_leave) AS sophepnam FROM attendance WHERE type_leave = 'Phép năm' AND date = '$date' GROUP BY type_leave";
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result1)>0) {
        while($rows = mysqli_fetch_array($result1)){
        $phepnam = $rows["sophepnam"];
        }
    }else{  
            $phepnam = 0;
        }

    $query2 = "SELECT type_leave , COUNT(type_leave) AS soviecrieng FROM attendance WHERE type_leave = 'Việc riêng' AND date = '$date' GROUP BY type_leave";
    $result2 = mysqli_query($conn, $query2);
    if (mysqli_num_rows($result2)>0) {
    while($rows = mysqli_fetch_array($result2)){
        $viecrieng = $rows["soviecrieng"];
        }
    }
    else{
          $viecrieng = 0;
            }
    $query3 = "SELECT type_leave , COUNT(type_leave) AS sophepbenh FROM attendance WHERE type_leave = 'Phép bệnh' AND date = '$date' GROUP BY type_leave";
    $result3 = mysqli_query($conn, $query3);
    if (mysqli_num_rows($result3)>0) {
    while($rows = mysqli_fetch_array($result3)){
        $phepbenh = $rows["sophepbenh"];
        }
    }else{
            $phepbenh = 0;
        }
    $query6 = "SELECT type_leave , COUNT(type_leave) AS sotudo FROM attendance WHERE type_leave = 'Tự do' AND date = '$date' GROUP BY type_leave";
    $result6 = mysqli_query($conn, $query6);
    if (mysqli_num_rows($result6)>0) {
    while($rows = mysqli_fetch_array($result6)){
        $tudo = $rows["sotudo"];
        }
    }else{
            $tudo = 0;
        }
    $query4 = "SELECT attendance1 , COUNT(attendance1) AS sodilam FROM attendance WHERE attendance1 = '1' AND date = '$date' GROUP BY attendance1";
    $result4 = mysqli_query($conn, $query4);
    if (mysqli_num_rows($result4)>0) {
    while($rows = mysqli_fetch_array($result4)){
        $dilam = $rows["sodilam"];
        }
    }else{
            $dilam = 0;
        }
    $query5 = "SELECT attendance1 , COUNT(attendance1) AS songhilam FROM attendance WHERE attendance1 = '0' AND date = '$date' GROUP BY attendance1";
    $result5 = mysqli_query($conn, $query5);
    if (mysqli_num_rows($result5)>0) {
    while($rows = mysqli_fetch_array($result5)){
        $nghilam = $rows["songhilam"];
        }
    }else{
            $nghilam = 0;
        } 

    $query6 = "SELECT member_id, employcode,name,type_leave FROM attendance WHERE  date = '$date'";
    $result6 = mysqli_query($conn, $query6);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thống kê</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thống kê</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="" method="POST" id="">
        <!-- Small boxes (Stat box) -->
        <div class="form-group">
          <div class="input-group input-group-lg">
              <input type="date" name="input100" id="input100" class="form-control form-control-lg">
              <div class="input-group-append">
                  <button id="filter" name="formsubmit" type="submit" class="btn btn-lg btn-default">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
        </div>

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card bg-gradient-danger">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Tình trạng đi làm, nghỉ phép hôm nay
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="piechart"
                       style="position: relative; height: 500px;">
                     
                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <!-- solid sales graph -->
            <div class="card bg-gradient-primary">
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Điểm danh quân số
                  </h3>
                </div>
                <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Quân số:</th>
                          <td><?php echo $dilam+$nghilam; ?></td>
                        </tr>
                        <tr>
                          <th>Đi làm:</th>
                          <td><?php echo $dilam; ?></td>
                        </tr>
                        <tr>
                          <th>Nghỉ:</th>
                          <td><?php echo $nghilam; ?></td>
                        </tr>
                      </table>
                </div>
            </div>
            <!-- /.card -->

            <!--Type Leave  -->
            <div class="card bg-gradient-warning">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Nghỉ phép
                </h3>
                <!-- tools card -->
                <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Phép năm</th>
                        <td><?php echo $phepnam; ?></td>
                      </tr>
                      <tr>
                        <th>Việc riêng:</th>
                        <td><?php echo $viecrieng; ?></td>
                      </tr>
                      <tr>
                        <th>Phép bệnh:</th>
                        <td><?php echo $phepbenh; ?></td>
                      </tr>
                      <tr>
                        <th>Tự do:</th>
                        <td><?php echo $tudo; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /. tools -->
              </div>
            <!-- /.card -->
           
          </section>
          <!-- right col -->
        </div>
        </form>
        <!-- /.row (main row) -->
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
          ['Loại phép', 'Thống kê'],
          <?php 
            while($rows = mysqli_fetch_array($result)){
                echo "['".$rows["type_leave"]."', ".$rows["type_leave_no"]."],";
                }
           ?>
        ]);

          // Optional; add a title and set the width and height of the chart
          var options = {chartArea:{width:"420" , height:"350"},
                            legend:{ position: 'bottom'},  
                            slices: { 0: {offset: 0.1},
                                      1: {offset: 0.01},
                                      2: {offset: 0.01},
                                      3: {offset: 0.01},
                                      4: {offset: 0.01},
                            },
                            animation:{
                                        duration: 1000,
                                        easing: 'out',
                                      },
        };

          // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }
    </script>
</body>
</html>

<?php require_once "include/footer.php"; ?>
