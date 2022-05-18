<?php 
    require_once "include/header.php";
?>


<?php  


         $id = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM employee WHERE id = $id ";
        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) > 0 ){
        
            while($rows = mysqli_fetch_assoc($result) ){
                $employcode = $rows["employcode"];
                $name = $rows["name"];
                $email = $rows["email"];
                $dob = $rows["dob"];
                $salary = $rows["salary"];
            }
        }

        $emcErr = $nameErr = $emailErr = $passErr = $salaryErr= "";
        $pass = "";
      

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){


            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }

            if( empty($_REQUEST["employcode"]) ){
                $emcErr = "<p style='color:red'> * Mã nhân viên không được để trống</p>";
                $employcode = "";
            }else {
                $employcode = $_REQUEST["employcode"];
            }
            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Tên không được để trống</p>";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["salary"]) ){
                $salaryErr = "<p style='color:red'> * Bộ phận không được để trống</p>";
                $salary = "";
            }else {
                $salary = $_REQUEST["salary"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email không được để trống</p> ";
                $email = "";
            }else{
                $email = $_REQUEST["email"];
            }

            if( empty($_REQUEST["pass"]) ){
                $passErr = "<p style='color:red'> * Mật khẩu không được để trống</p> ";
            }else{
                $pass = $_REQUEST["pass"];
            }


                    $sql = "UPDATE employee SET employcode = '$employcode' , name = '$name' , email = '$email', password ='$pass' , dob='$dob', salary='$salary' WHERE id = $_GET[id] ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-employee.php');
                            $('#linkBtn').text('Xem nhân viên');
                            $('#addMsg').text('Sủa thành công!');
                            $('#closeBtn').text('Tiếp tục sửa?');
                        })
                     </script>
                     ";
                    }
                    
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
                                    <h4 class="text-center">Chỉnh sửa thông tin nhân viên</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                
                                <div class="form-group">
                                    <label >Mã nhân viên :</label>
                                    <input type="text" class="form-control" value="<?php echo $employcode; ?>"  name="employcode" readonly>
                                   <?php echo $emcErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Họ tên :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Mật khẩu: </label>
                                    <input type="password" class="form-control" value="<?php echo $pass; ?>" name="pass" > 
                                    <?php echo $passErr; ?>           
                                </div>

                                <div class="form-group">
                                    <label >Bộ phận :</label>
                                    <input type="text" class="form-control" value="<?php echo $salary; ?>" name="salary" >  
                                    <?php echo $salaryErr; ?>            
                                </div>

                                <div class="form-group">
                                    <label >Ngày sinh :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" >  
                                   
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
