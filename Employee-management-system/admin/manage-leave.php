
<?php
 require_once "include/header.php";
require_once "../connection.php";
$today = date("Y-m-d");
$i = 1;
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
$date = $today;
       if(isset($_POST['formsubmit'])){
            $date = $_POST['input100'];
        } 
// Tìm Start
$start = ($current_page - 1) * $limit;


$sql = "SELECT B.`id`, B.`employcode`, B.`name` ,A.`date` ,A.`attendance1` , A.`type_leave` 
FROM `attendance`AS A 
INNER JOIN `employee` AS B 
ON B.`id` = A.`member_id` WHERE A.`date`= '$date' ";
$result = mysqli_query($conn , $sql);

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
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
            <div class="card">
                <div class="content-wrapper">
                    <div class="container bg-white shadow">
                        <div class="py-7 mt-7"> 
                        <h4 class="text-center pb-3">Quản lý nghỉ</h4>
                            <div class="card-body p-0">
                            <form action="" method="post" >
                                <div class="table-responsive">
                                <input type="date" name="input100" placeholder=""></input>
                                <div class="input-group-append">
                                    <button id="filter" name="formsubmit" type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <div class="card-header border-transparent">
                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm theo mã nhân viên..">
                                </div>
                                    <table style="width:100%" id="myTable">
                                        <tr class="bg-dark" class="table-hover">
                                            <th>STT</th>
                                            <th>Mã nhân viên</th>
                                            <th>Họ tên</th>
                                            <th>Ngày</th>
                                            <th>Trạng thái</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                        <?php 
                                        
                                        if( mysqli_num_rows($result) > 0){
                                            while( $rows = mysqli_fetch_assoc($result) ){
                                                $employcode = $rows["employcode"];
                                                $name = $rows["name"];
                                                $date = $rows["date"];
                                                $type_leave = $rows["type_leave"];
                                                $id = $rows["id"]; 
                                        ?>
                                        <tr>
                                            <td><?php echo "$i."; ?></td>
                                            <td><?php echo $employcode; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $type_leave; ?></td>
                                            <td>  <?php 
                                                            $edit_icon = "<a href='edit-attendance.php?id= {$id}' class='btn-sm btn-primary float-center ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                                                            echo $edit_icon ;
                                                        ?> 
                                            </td>

                                

                                            <?php 
                                                    $i++;
                                                    }
                                                }else{
                                                    echo "<script>
                                                    $(document).ready( function(){
                                                        $('#showModal').modal('show');
                                                        $('#linkBtn').hide();
                                                        $('#addMsg').text('Không có dữ liệu nghỉ');
                                                        $('#closeBtn').text('Ok, đã hiểu');
                                                    })
                                                </script>
                                                ";
                                                }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
<script>
    function myFunction() {
						  // Declare variables
						  var input, filter, table, tr, td, i, txtValue;
						  input = document.getElementById("myInput");
						  filter = input.value.toUpperCase();
						  table = document.getElementById("myTable");
						  tr = table.getElementsByTagName("tr");

						  // Loop through all table rows, and hide those who don't match the search query
						  for (i = 0; i < tr.length; i++) {
						    td = tr[i].getElementsByTagName("td")[1];
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
</script>
<?php 
    require_once "include/footer.php";
?>
