<?php 
    require_once "include/header.php";
?>


<?php
    $today = date("Y-m-d");
    $id = $_GET["id"];
    $query = "SELECT * 
    FROM `attendance` AS A 
    INNER JOIN `employee` AS B 
    ON B.`id` = A.`member_id` WHERE A.`date`= '$today' AND B.`id` = '$id'";
    $data = mysqli_query($conn , $query);

    if(mysqli_num_rows($data) > 0 ){

        while($rows = mysqli_fetch_assoc($data) ){
            $employcode = $rows["employcode"];
            $name = $rows["name"];
            $date = $rows["date"];
            $attendance = $rows["attendance1"];
            $type_leave = $rows["type_leave"];
        }
    }
    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
        if( empty($_REQUEST["employcode"]) ){
            $employcode = "";
        }else {
            $employcode = $_REQUEST["employcode"];
        }
        if( empty($_REQUEST["name"]) ){
            $name = "";
        }else {
            $name = $_REQUEST["name"];
        }
        if( empty($_REQUEST["attendance"]) ){
            $attendance = "";
        }else {
            $attendance = $_REQUEST["attendance"];
        }
        if( empty($_REQUEST["type_leave"]) ){
            $type_leave = "";
        }else {
            $type_leave = $_REQUEST["type_leave"];
        }
       
    }

    $sql = "UPDATE attendance SET attendance1 = '$attendance', type_leave = '$type_leave' WHERE date = '$today' AND member_id = $_GET[id] ";
    $result = mysqli_query($conn , $sql);
    if($result){
        echo "<script>
        $(document).ready( function(){
            $('#showModal').modal('show');
            $('#modalHead').hide();
            $('#linkBtn').attr('href','manage-leave.php');
            $('#linkBtn').text('Xem nhân viên');
            $('#addMsg').text('Sửa thành công!');
            $('#closeBtn').text('Tiếp tục sửa?');
        })
        </script>
        ";
    }
?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Chỉnh sửa điểm danh nhân viên</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                
                                <div class="form-group">
                                    <label >Mã nhân viên :</label>
                                    <input type="text" class="form-control" value="<?php echo $employcode; ?>"  name="employcode" readonly>
                                </div>

                                <div class="form-group">
                                    <label >Họ tên :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" readonly>
                                </div>
                                <div class="form-group">
                                    <label >Đi làm, nghỉ làm :</label>
                                    <select name="attendance">
                                        <option value="1">Đi làm</option>
                                        <option value="0">Nghỉ</option>
									</select>
                                </div>
                                <div class="form-group">
                                    <label >Hình thức :</label>
                                    <select name="type_leave">
                                        <option value="Đi làm">Đi làm</option>
                                        <option value="Phép năm">Phép năm</option>
                                        <option value="Việc riêng">Việc riêng</option>
                                        <option value="Phép bệnh">Phép bệnh</option>
                                        <option value="Tự do">Tự do</option>
									</select>
                                </div>
                               
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Sửa</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>
