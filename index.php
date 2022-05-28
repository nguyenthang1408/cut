<?php 
include "Model/DBconfig.php";
$db = new Database();
$db -> connect();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="bootstrap-5/css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hệ Thống Quản Lý Tự Động Hóa</title>
    <style>
    body, html {
    height: 100%;
    margin: 0;
    }

.bg {
  background-image: url("image/anhnen1.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}

</style>
  </head>
  <body >
 

  <div class="bg border">
  <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6" style="margin-top: 100px;">
                    <div class="form-input-content" >
                        <div class="card login-form mt-5">
                            <div class="card-body shadow" style="">   

                                    <h2 class="text-center pb-4"><a href="Controller/index.php?action=logindeveloper" style="text-decoration:none">Hệ Thống Quản Lý Tự Động Hóa</a></h2>
                                    <h6 class="text-center pb-4">Mời Bạn Đăng Nhập!</h6>
                
                                <div class="container mt-4">

                                  <div class="row btn-toolbar">
<!--                                         <div class="btn-group col-6" style="width:45%">
                                            <a href="Controller/index.php?action=loginuser" class="btn btn-primary btn-lg col-xs-6">Tài khoản nhân viên</a>
                                        </div> -->

                                        <div class="btn-group col-12" style="width: 100%">
                                        
                                            <a href="Controller/index.php?action=login" class="btn btn-primary btn-lg col-xs-12" >Đăng Nhập Tài Khoản</a>
                                        </div>
                                        <h1 style="position: relative;float: left;margin-top: 10px;"><a style="text-decoration:none" href="Controller/index.php?action=begin-cn">中国</a></h1>
                                    </div>
                                </div>   
                                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./resorce/plugins/common/common.min.js"></script>
    <script src="./resorce/js/custom.min.js"></script>
    <script src="./resorce/js/settings.js"></script>
    <script src="./resorce/js/gleek.js"></script>
    <script src="./resorce/js/styleSwitcher.js"></script>
  </body>
</html>
