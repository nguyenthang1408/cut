
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

// Tìm Start
$start = ($current_page - 1) * $limit;


$sql = "SELECT B.`id`, B.`employcode`, B.`name` ,A.`date` ,A.`attendance1` , A.`type_leave` 
FROM `attendance`AS A 
INNER JOIN `employee` AS B 
ON B.`id` = A.`member_id` WHERE A.`date`= '$today' LIMIT $start, $limit ";
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
                                <div class="table-responsive">
                                    <table style="width:100%" >
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
                            </div>
                            <div class="pagination" align="right">
                                <?php 
                                // PHẦN HIỂN THỊ PHÂN TRANG
                                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                        
                                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                if ($current_page > 1 && $total_page > 1){
                                    echo '<a href="manage-leave.php?page='.($current_page-1).'">Trước</a> | ';
                                }
                        
                                // Lặp khoảng giữa
                                for ($i = 1; $i <= $total_page; $i++){
                                    // Nếu là trang hiện tại thì hiển thị thẻ span
                                    // ngược lại hiển thị thẻ a
                                    if ($i == $current_page){
                                        echo '<span>'.$i.'</span> | ';
                                    }
                                    else{
                                        echo '<a href="manage-leave.php?page='.$i.'">'.$i.'</a> | ';
                                    }
                                }
                        
                                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                if ($current_page < $total_page && $total_page > 1){
                                    echo '<a href="manage-leave.php?page='.($current_page+1).'">Tiếp</a> | ';
                                }
                                ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php 
    require_once "include/footer.php";
?>
