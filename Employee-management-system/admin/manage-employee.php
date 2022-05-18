<?php 
    require_once "include/header.php";
    //  database connection
    require_once "../connection.php";
    $i = 1;
    $you = "";
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

    $sql = "SELECT * FROM employee LIMIT $start, $limit ";
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
            <div class="content-wrapper">
                <div class="container bg-white shadow">
                    <div class="py-4 mt-5"> 
                        <div class='text-center pb-2'>
                                <h4>Quản lý nhân viên</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-header border-transparent">
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm theo mã nhân viên..">
                            </div>
							<div class="table-responsive">
                                <table style="width:100%" class="table-hover text-center" id="myTable">
                                    <tr class="bg-dark">
                                        <th>STT</th>
                                        <th>Mã nhân viên</th>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Email</th> 
                                        <th>Bộ phận</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                <?php 
                                
                                if( mysqli_num_rows($result) > 0)
                                {
                                    while( $rows = mysqli_fetch_assoc($result) ){
                                        $name= $rows["name"];
                                        $employcode= $rows["employcode"];
                                        $email= $rows["email"];
                                        $dob = $rows["dob"];
                                        $id = $rows["id"];
                                        $salary = $rows["salary"];

                                        if($salary== "" ){
                                            $salary= "Not Defined";
                                        }   
                                        
                                        ?>
                                    <tr>
                                    <td><?php echo "{$i}."; ?></td>
                                    <td><?php echo $employcode; ?></td>
                                    <td> <?php echo $name ; ?></td>
                                    <td><?php echo $dob; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $salary; ?></td>

                                    <td>  <?php 
                                            $edit_icon = "<a href='edit-employee.php?id= {$id}' class='btn-sm btn-primary float-right ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                                            $delete_icon = " <a href='delete-employee.php?id={$id}' id='bin' class='btn-sm btn-primary float-right'> <span ><i class='fa fa-trash '></i></span> </a>";
                                            echo $edit_icon . $delete_icon;
                                        ?> 
                                    </td>

                                
                                    

                                <?php 
                                        $i++;
                                        }
                                    }else{
                                        echo "<script>
                                        $(document).ready( function(){
                                            $('#showModal').modal('show');
                                            $('#linkBtn').attr('href', 'add-employee.php');
                                            $('#linkBtn').text('Thêm nhân viên');
                                            $('#addMsg').text('Không tìm thấy nhân viên!');
                                            $('#closeBtn').text('Nhắc tôi sau!');
                                        })
                                    </script>
                                    ";
                                    }
                                ?>
                                </tr>
                                </table>
                            </div>
                        </div>
                        <div class="pagination">
                                            <?php 
                                                // PHẦN HIỂN THỊ PHÂN TRANG
                                                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                                    
                                                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                                if ($current_page > 1 && $total_page > 1){
                                                    echo '<a href="manage-employee.php?page='.($current_page-1).'">Trước</a> | ';
                                                }
                                    
                                                // Lặp khoảng giữa
                                                for ($i = 1; $i <= $total_page; $i++){
                                                    // Nếu là trang hiện tại thì hiển thị thẻ span
                                                    // ngược lại hiển thị thẻ a
                                                    if ($i == $current_page){
                                                        echo '<span>'.$i.'</span> | ';
                                                    }
                                                    else{
                                                        echo '<a href="manage-employee.php?page='.$i.'">'.$i.'</a> | ';
                                                    }
                                                }
                                    
                                                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                                if ($current_page < $total_page && $total_page > 1){
                                                    echo '<a href="manage-employee.php?page='.($current_page+1).'">Tiếp</a> | ';
                                                }
                                            ?>
                                            </div> 
                        </div>
                </div>
            </div>
        </body>
    </html>
<?php 
    require_once "include/footer.php";
?>
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
