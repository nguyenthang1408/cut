<?php 
    require_once "include/header.php";
?>


<?php  

        $emcErr = $nameErr = $emailErr = $passErr = "";
        $employcode = $name = $email = $dob = $pass = $salary = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }
            if( empty($_REQUEST["employcode"]) ){
                $emcErr = "<p style='color:red'> * Mã nhân viên không được để trống </p>";
            }else {
                $employcode = $_REQUEST["employcode"];
            }
            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Tên nhân viên không được để trống </p>";
            }else {
                $name = $_REQUEST["name"];
            }
            $salary = $_REQUEST["salary"];
            $email = $_REQUEST["email"];
            if( empty($_REQUEST["pass"]) ){
                $passErr = "";
            }else{
                $pass = $_REQUEST["pass"];
            }

                // database connection
                require_once "../connection.php";
                    $sql = "INSERT INTO employee(employcode, name , email , password , dob , salary ) VALUES('$employcode' , '$name' , '$email' , '$pass' , '$dob' , '$salary' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                     $employcode = $name = $email = $dob = $pass = $salary = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-employee.php');
                            $('#linkBtn').text('Hiển thị nhân viên');
                            $('#addMsg').text('Đã thêm nhân viên thành công!');
                            $('#closeBtn').text('Tiếp tục thêm?');
                        })
                     </script>
                     ";
                    }
                    
                }
?>



<div class="content-wrapper"> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Thêm nhân viên mới</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <div class="form-group">
                                    <label >Mã nhân viên :</label>
                                    <input type="text" class="form-control" value="<?php echo $employcode; ?>"  name="employcode" >
                                   <?php echo $emcErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Họ tên :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>
                                
                                <div class="form-group">
                                    <label >Ngày sinh :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" >  
                                   
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
                                </div>

                                


                               
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Thêm</button>
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


