<?php
include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();
    $table = 'users';
    if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      if ($username == "" || $password =="") {
             echo "<span style='color:red;margin-left:44%;font-size:100%;'>Vui Lòng Không Để Trống</span>";
          }
          else{
            $query = $db->login($table,$username,$password);
               if ($query==0) {
              echo "<span style='color:red;margin-left:44%;font-size:100%;'>Sai Tài Khoản Mật Khẩu</span>";
              }else{
                $nameid = $db->getDataloginID($table,$username,$password);
                $nameid1 = $nameid['name_admin'];
                $_SESSION['name_admin'] = 1;
                $_SESSION['username'] = $username;
                $_SESSION['dangnhap'] = $query['name_admin'];
                $_SESSION['id'] = $query['id'];
                header('Location: ../Controller/index.php?action=test2');
                
          }
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      background: url('../image/52293.jpg');
      background-size: cover;
      background-position-y: -60px;
    }

    .body form h3{
      /*animation: animate 4s linear infinite;*/
    }
    @keyframes animate{
      0%{
        transform: scale(1.0);
      }
      60%{
        transform: scale(1.5);
      }
      80%{
        transform: scale(1.2);
      }
      100%{
        transform: scale(1.0);
      }
    }
  </style>
</head>

<body class="body" style="">
  <div class="section"></div>
  <main>
    
    <form method="POST" action="" id="formlogin">
    <center>
    <!-- <img class="responsive-img" style="width: 250px;" src="../image/logo.jpg" /> -->
    <h3 style="font-weight:bold;color:white;font-size: 70px;">VN Cable <br> Tự Động Hóa</h3> <br>

      <h5 class="indigo-text" style="color:white !important; !important;font-weight:bold;">Trang Đăng Nhập</h5>
      <div class="section"></div>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 5vw 10vh 5vw 10vh; border: 1px solid #EEE;background: rgba(0, 0, 0, 0.8) !important;">

          <form class="col s12" id="loginn" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class=' col s12' style="">
                <label for='username' style="font-size:25px;text-align:center;color:white;">Tên Tài Khoản</label>
                <input type='text' style="color:white" name='username' />
              </div>
            </div>

            <div class='row'>
              <div class=' col s12'>
                <label for='password' style="font-size:25px;color:white;">Mật Khẩu</label>
                <input class='validate' type='password' name='password' id='password' style="color:white;" />
              </div>
              <label style='float: right;'>
                <!-- <a class='pink-text' href='#!'><b>Quên Mật Khẩu?</b></a> -->
              </label>
            </div>

            <br />
            <center>
              <div class="row">
                <button type="submit" id="submitT" name="submit" style="width: 30vw;font-size: 25px;height: 8vh;" class="col s12 btn btn-large waves-effect indigo">Đăng Nhập</button>
              </div>
            </center>
        </div>
      </div>

    </center>
    <div class="section"></div>
    <div class="section"></div>
  </form>
  </main>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript">

      
$( "#formlogin" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
$.ajax({
  type: "POST",
  url: ../controller=may-moc&action=dangnhap,
  data:  $(this).serializeArray();,
  success: function(response){
    console.log("response: ", response);
  },
  dataType: dataType
});
});
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>