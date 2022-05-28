<?php 

include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

if(isset($_GET['id'])){
           $id = $_GET['id'];
           $table = "tiendomaymoc";
           $dataID = $db->getDataID($table,$id);

        $bophan = $dataID['bophan'];
        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];
        $ngaydukien = $dataID['ngaydukien'];
        $nhomthuchien = $dataID['nhomthuchien'];
        $mathe = $dataID['mathe'];
        $bophan = $dataID['bophan'];

        $tiendo = $dataID['tiendo'];
        $tiendomario = substr($tiendo, 0, -1);

        $oo = $dataID['tiendo'];
        $o = substr($oo, 0, -1);
       
       }


       // thêm máy

       if(isset($_POST['themmay']))
       {
          $tenmay1 = $_POST['tenmay1'];
          $ngaybatdau1 = $_POST['ngaybatdau1'];
          $ngaydukien1 = $_POST['ngaydukien1'];
          $mathe1 = $_POST['mathe1'];
          $nhomthuchien1 = $_POST['nhomthuchien1'];
          $tiendo1 = 0;

          $bophan = $dataID['bophan'];
          $line = $dataID['tenmay'];
          $ngaybatdau = $dataID['ngaybatdau'];
          $ngaydukien = $dataID['ngaydukien'];
          $nhomthuchien = $dataID['nhomthuchien'];
          $mathe = $dataID['mathe'];

          if($db->InsertTienDoMayMocLine($tenmay1,$tiendo1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$bophan,$nhomthuchien,$nhomthuchien1,$line,$mathe,$mathe1))
          {
               header('Refresh:0');
          }
       }



       if(isset($_POST['edit1']))
        {
            $tabletiendomaymoc1 = 'tiendomaymoc1';
            $tenmay1 = $_POST['tenmay1'];
            $ngaybatdau1 = $_POST['ngaybatdau1'];
            $ngaydukien1 = $_POST['ngaydukien1'];
            $nhomthuchien1 = $_POST['nhomthuchien1'];
            $mathe1 = $_POST['mathe1'];
            $id1 = $_POST['idd'];

            if($db->UpdateLine($tabletiendomaymoc1,$id1,$tenmay1,$ngaybatdau1,$ngaydukien1,$mathe1,$nhomthuchien1))
            {
                header('Refresh:0');
            }
        }




         if(isset($_POST['xoa']))
        {
            $tabletiendomaymoc1 = 'tiendomaymoc1';
            $idtiendomaymoc1 = $_POST['id'];
            if($db->Delete($idtiendomaymoc1,$tabletiendomaymoc1))
            {
               header('Refresh:0');
            }
        }





$employee = 'employee';
$mang = array();
$nhanvien = $db->getAllData($employee);
foreach ($nhanvien as $key) {
    $datamanhanvien = $key['employcode'];
    $datatennhanvien = $key['name'];
    $nhanviens = $datatennhanvien.'-'.$datamanhanvien;
    $mang[] = $nhanviens; 
}
$mang2 = count($mang);
      
       



$tableusersview = 'usersview';
$matkhau = $db->getAllData($tableusersview);


$matkhau2 = array();
$a = 0;
foreach ($matkhau as $keyy) {
    $a++;
    $matkhau1[$a] = $keyy['password'];
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    <title>Biểu Đồ Tiến Độ</title>


  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../codejavascript/mario.css">
   <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudo.css">
   <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
   <script src="../codejavascript/jq1.js"></script>
   <style type="text/css">



.search-input{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input input{
            height: 55px;
            max-width: 450px;
            width: 100%;
            outline: none;
            border: none;
            border-radius: 5px;
            /*padding: 0 60px 0 20px;*/
            font-size: 18px;
            box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);
        }
        .search-input .autocom-box{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box li:hover{
            background: #efefef;
        }
        .search-input.active .autocom-box{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input.active .autocom-box li{
            display: block;
        }
        .search-input.activee .autocom-box li{
            display: block;
        }



        
          /*sửa công đoạn*/

        .search-input1{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input1 input{
            height: 55px;
            max-width: 450px;
            width: 100%;
            outline: none;
            border: none;
            border-radius: 5px;
            /*padding: 0 60px 0 20px;*/
            font-size: 18px;
            box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);
        }
        .search-input1 .autocom-box1{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box1 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box1 li:hover{
            background: #efefef;
        }
        .search-input1.active .autocom-box1{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input1.active .autocom-box1 li{
            display: block;
        }
        .search-input1.activee .autocom-box1 li{
            display: block;
        }

<<<<<<< HEAD
=======


       @import "nib";



.green {
  margin-top: 15px;
}
.green .progress1,
.red .progress1,
.orange .progress1 {
  position: relative;
  border-radius: 50%;
}
.green .progress1,
.red .progress1,
.orange .progress1 {
  width: 150px;
  height: 150px;
}
.green .progress1 {
  border: 5px solid #53fc53;
}
.green .progress1 {
  box-shadow: 0 0 20px #029502;
}
.green .progress1,
.red .progress1,
.orange .progress1 {
  transition: all 1s ease;
}
.green .progress1 .inner,
.red .progress1 .inner,
.orange .progress1 .inner {
  position: absolute;
  overflow: hidden;
  z-index: 2;
  border-radius: 50%;
  background: #333;
}
.green .progress1 .inner,
.red .progress1 .inner,
.orange .progress1 .inner {
  width: 140px;
  height: 140px;
}
.green .progress1 .inner,
.red .progress1 .inner,
.orange .progress1 .inner {
  border: 5px solid #1a1a1a;
  /*border: 5px solid white;*/
}
.green .progress1 .inner,
.red .progress1 .inner,
.orange .progress1 .inner {
  transition: all 1s ease;
}
.green .progress1 .inner .water,
.red .progress1 .inner .water,
.orange .progress1 .inner .water {
  position: absolute;
  z-index: 1;
  width: 200%;
  height: 200%;
  left: -50%;
  border-radius: 40%;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
  animation-name: spin;
}
.green .progress1 .inner .water {
  top: 25%;
}
.green .progress1 .inner .water {
  /*background: rgba(83,252,83,0.5);*/
  background: #00A2FF;
}
.green .progress1 .inner .water,
.red .progress1 .inner .water,
.orange .progress1 .inner .water {
  transition: all 1s ease;
}
.green .progress1 .inner .water,
.red .progress1 .inner .water,
.orange .progress1 .inner .water {
  animation-duration: 10s;
}
.green .progress1 .inner .water {
  box-shadow: 0 0 20px #03bc03;
}
.green .progress1 .inner .glare,
.red .progress1 .inner .glare,
.orange .progress1 .inner .glare {
  position: absolute;
  top: -120%;
  left: -120%;
  z-index: 5;
  width: 200%;
  height: 200%;
  transform: rotate(45deg);
  border-radius: 50%;
}
.green .progress1 .inner .glare,
.red .progress1 .inner .glare,
.orange .progress1 .inner .glare {
  background-color: rgba(255,255,255,0.15);
}
.green .progress1 .inner .glare,
.red .progress1 .inner .glare,
.orange .progress1 .inner .glare {
  transition: all 1s ease;
}
.green .progress1 .inner .percent,
.red .progress1 .inner .percent,
.orange .progress1 .inner .percent {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  font-weight: bold;
  text-align: center;
}
.green .progress1 .inner .percent,
.red .progress1 .inner .percent,
.orange .progress1 .inner .percent {
  line-height: 140px;
  font-size: 45px;
}
.green .progress1 .inner .percent {
  /*color: #03c603;*/
  color: white;
  z-index: 2;
}
.green .progress1 .inner .percent {
  text-shadow: 0 0 10px #029502;
}
.green .progress1 .inner .percent,
.red .progress1 .inner .percent,
.orange .progress1 .inner .percent {
  transition: all 1s ease;
}
.red {
  margin-top: 15px;
}
.red .progress1 {
  border: 5px solid #ed3b3b;
}
.red .progress1 {
  box-shadow: 0 0 20px #7a0b0b;
}
.red .progress1 .inner .water {
  top: 75%;
}
.red .progress1 .inner .water {
  background: rgba(237,59,59,0.5);
  /*background: #00A2FF;*/
}
.red .progress1 .inner .water {
  box-shadow: 0 0 20px #9b0e0e;
}
.red .progress1 .inner .percent {
  /*color: #a30f0f;*/
  color: white;
}
.red .progress1 .inner .percent {
  text-shadow: 0 0 10px #7a0b0b;
}
.orange {
  margin-top: 15px;
}
.orange .progress1 {
  border: 5px solid #f07c3e;
}
.orange .progress1 {
  box-shadow: 0 0 20px #7e320a;
}
.orange .progress1 .inner .water {
  top: 50%;
}
.orange .progress1 .inner .water {
  background: rgba(240,124,62,0.5);
}
.orange .progress1 .inner .water {
  box-shadow: 0 0 20px #a0400c;
}
.orange .progress1 .inner .percent {
  /*color: #a8430d;*/
  color: white;
}
.orange .progress1 .inner .percent {
  text-shadow: 0 0 10px #7e320a;
}


@-moz-keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}







.dot-red {
  color: yellow;
  font-family: 'Arvo'; }

.dot-yellow {
  color: #00F020;
  font-family: 'Arvo'; }

.dot-green {
  color: red;
  font-family: 'Arvo'; }
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
   </style>
</head>
<body>

<<<<<<< HEAD
    <section class="packages" id="packages"style="">
=======
	<section class="packages" id="packages"style="background: #CCE4F0;">

    <div style="width: 100%;height: 70px;position: fixed;z-index: 61;">
        <h2><a href="../Controller/index.php?action=test2#book" style="font-size: 25px;" class="btn btn-success">Trang Chủ</a></h2>
        
       
    </div>


      <div class="container1">
      <div class="cloud">

          <div class="anim-bar">
      </div>

      <div class="ground" id="ground">
        <div class="mario" id="mario"></div>
        <div class="mario2" id="mario2"></div>
        <div class="goomba"></div>
     <img src="../image/hangrao3.png" height="130"width="130" style="margin-left: 0vw;margin-top: 4vh;">




    <div class="chimney" style="margin-left: 5vw;top:72px">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="position:absolute;font-size: 25px;left: 10px;top: 95px;font-weight: bold;">DFM</span>
  </div>
  <div class="flower" style="margin-left: 5vw;top:72px">
    <div class="top">
      <div class="bud"></div>
      <div class="mouth"></div>
      <div class="shadow"></div>
    </div>
    <div class="bottom">
      <div class="stem"></div>
      <div class="leaf l1"></div>
      <div class="leaf l2"></div>
    </div>
  </div>


    <div class="chimney" style="margin-left: 20vw;top:42px;height: 137px;">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="position:absolute;font-size: 25px;left: 0px;top: 125px;font-weight: bold;">3DTO2D</span>
  </div>
  <div class="flower" style="margin-left: 20vw;top:42px;">
    <div class="top">
      <div class="bud"></div>
      <div class="mouth"></div>
      <div class="shadow"></div>
    </div>
    <div class="bottom">
      <div class="stem"></div>
      <div class="leaf l1"></div>
      <div class="leaf l2"></div>
    </div>
  </div>


    <div class="chimney" style="margin-left: 40vw;top:10px;height: 177px;">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="position:absolute;font-size: 25px;left: -50px;top: 155px;font-weight: bold;">加工,訂購</span>
  </div>
  <div class="flower" style="margin-left: 40vw;top:10px;">
    <div class="top">
      <div class="bud"></div>
      <div class="mouth"></div>
      <div class="shadow"></div>
    </div>
    <div class="bottom">
      <div class="stem"></div>
      <div class="leaf l1"></div>
      <div class="leaf l2"></div>
    </div>
  </div>


    <div class="chimney" style="margin-left: 60vw;top:-22px;height: 217px;">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="position:absolute;font-size: 23px;left:-50px;top: 188px;font-weight: bold;">組裝,調整機台</span>
  </div>
  <div class="flower" style="margin-left: 60vw;top:-22px;">
    <div class="top">
      <div class="bud"></div>
      <div class="mouth"></div>
      <div class="shadow"></div>
    </div>
    <div class="bottom">
      <div class="stem"></div>
      <div class="leaf l1"></div>
      <div class="leaf l2"></div>
    </div>
   
  </div>



  <div class="chimney" style="margin-left: 75vw;top:-130px;height: 217px;">
      <img src="../image/castle.gif"height="300"width="300" style="">
         <span style="position:absolute;font-size: 50px;left: 90px;top: 280px;color: white;--p: 30vw;"><?php echo $dataID['tiendo']; ?></span>
    </div>


     
     <img src="../image/tree1.png" height="50"width="50" style="margin-left: 0vw;margin-top: 8vh;">
     <img src="../image/nam1.png" height="100"width="100" style="margin-left: 0vw;margin-top: 6vh;">
     <img src="../image/tree1.png" height="50"width="50" style="margin-left: 15vw;margin-top: 8vh;">
     <img src="../image/tree1.png" height="50"width="50" style="margin-left: 15vw;margin-top: 8vh;">
     <img src="../image/tree1.png" height="50"width="50" style="margin-left: 15vw;margin-top: 8vh;">
     <img src="../image/tree1.png" height="50"width="50" style="margin-left: 11vw;margin-top: 8vh;">
      <img src="../image/tree1.png" height="50"width="50" style="margin-left: 11vw;margin-top: 8vh;">
   
      <!--  <div class="progress2 progress-moved" style="margin-top: -16px;--p:30vw">
        <div class="progress-bar2" >
        </div>                       
      </div> --> 
      <img src="../image/anh77.jpg" height="65" style="top: -18px;position: relative;width: 80vw;border-radius: 0 40px 40px 0;--p:<?php echo $tiendomario; ?>vw" id="imgimg">


  <div class="mountain">
        <div class="grass2"></div>
        <div class="grass1"></div>
    </div>

      </div>
    

        
      <div class="sun-div">
      <div class="sun"></div>
      </div>

      </div>
  </div>
     
      <!--  <div class="progress2 progress-moved" style="margin-top: -16px;--p:30vw">
        <div class="progress-bar2" >
        </div>                       
      </div> --> 
<!--       <img src="../image/anh77.jpg" height="65" style="top: -18px;position: relative;width: 80vw;border-radius: 0 40px 40px 0;--p:<?php echo $tiendomario; ?>vw" id="imgimg">
-->



<!--      <div class="box-container" style="">
        <div id="chartContainer" style="height: 400px; width: 100%;"></div>
     </div>

    <div>
      <img src="../image/gif.gif" border="0" alt="Photobucket" height="200" width="250" id="ani" style="position: relative;top:-20px;z-index: -1;--g: <?php echo $tong-5; ?>vw;">
    </div> -->
     
<!--     <div style="width: 99vw;margin-top: 30px;">
      <div class="progress" style="">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $tong; ?>" aria-valuemin="0" aria-valuemax="100" style="max-width: <?php echo $tong; ?>%">
        <span class="title" style="font-size:30px"><?php echo $tong; ?>%</span>
        </div>
      </div>    
    </div>

 -->
  <div class="tiendo" >

     <div style="" class="dfm">
      <h5 style="font-weight: bold;">
        <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[1]; ?>" style="text-decoration:none;">
            <div class="green" id="green1">
            <div class="progress1" id="progress1">
              <div class="inner" id="inner1" 
              >
                <div class="percent" id="percent1"><span>23</span>%</div>
                <div class="water" id="water1"></div>
                <div class="glare" id="glare1"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[1], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box" value="<?php 
            echo $ch3; ?>">
        </a>
    </h5>
    <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may1']; ?></span>
         </div>
</div>


        <div style="" class="to2d">
              <h5 style="font-weight: bold;">
                <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[2]; ?>" style="text-decoration:none;">

                    <div class="green" id="green2">
                    <div class="progress1" id="progress2">
                      <div class="inner" id="inner2">
                        <div class="percent" id="percent2"><span><?php echo $chuoi2; ?></span>%</div>
                        <div class="water" id="water2"></div>
                        <div class="glare" id="glare2"></div>
                      </div>
                    </div>
                  </div>
                  <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[2], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box2" value="<?php 
            echo $ch3; ?>">
        </span>
         </a>
                </h5>
                <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may2']; ?></span>
         </div>
        </div>

        <div style="" class="giacongvadathang">
         <h5 style="font-weight: bold;"> 
          <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[3]; ?>" style="text-decoration:none;">
            <div class="green" id="green3">
            <div class="progress1" id="progress3">
              <div class="inner" id="inner3">
                <div class="percent" id="percent3"><span><?php echo $chuoi3; ?></span>%</div>
                <div class="water" id="water3"></div>
                <div class="glare" id="glare3"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[3], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box3" value="<?php 
            echo $ch3; ?>">
          </a>
          </h5>
          <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may3']; ?></span>
         </div>
      </div>
      <div style="" class="lapdatvachinhmay">
      <h5 style="font-weight: bold;"> 
        <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[4]; ?>" style="text-decoration:none;">
            <div class="green" id="green4">
            <div class="progress1" id="progress4">
              <div class="inner">
                <div class="percent" id="percent4"><span><?php echo $chuoi4; ?></span>%</div>
                <div class="water" id="water4"></div>
                <div class="glare" id="glare4"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[4], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box4" value="<?php 
            echo $ch3; ?>">
        </a>
        </h5>
        <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may4']; ?></span>
         </div>
    </div>
    <div style="" class="buyoff">
      <h5 style="font-weight: bold;">
        <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[5]; ?>" style="text-decoration:none;">
            <div class="green" id="green5">
            <div class="progress1" id="progress5">
              <div class="inner" id="inner5">
                <div class="percent" id="percent5"><span><?php echo $chuoi5; ?></span>%</div>
                <div class="water" id="water5"></div>
                <div class="glare" id="glare5"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[5], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box5" value="<?php 
            echo $ch3; ?>">
        </a>
        </h5>
        <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may5']; ?></span>
         </div>
    </div>
    <div style="" class="buyoff">
      <h5 style="font-weight: bold;">
        <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[6]; ?>" style="text-decoration:none;">
            <div class="green" id="green6">
            <div class="progress1" id="progress6">
              <div class="inner" id="inner6">
                <div class="percent" id="percent6"><span><?php echo $chuoi6; ?></span>%</div>
                <div class="water" id="water6"></div>
                <div class="glare" id="glare6"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[6], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box6" value="<?php 
            echo $ch3; ?>">
        </a>
        </h5>
        <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may6']; ?></span>
         </div>
    </div>


    <div style="" class="buyoff">
      <h5 style="font-weight: bold;">
        <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[7]; ?>" style="text-decoration:none;">
            <div class="green" id="green7">
            <div class="progress1" id="progress7">
              <div class="inner" id="inner7">
                <div class="percent" id="percent7"><span><?php echo $chuoi7; ?></span>%</div>
                <div class="water" id="water7"></div>
                <div class="glare" id="glare7"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[7], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box7" value="<?php 
            echo $ch3; ?>">
        </a>
        </h5>
        <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may7']; ?></span>
         </div>
    </div>


    <div style="" class="buyoff">
      <h5 style="font-weight: bold;">
        <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[8]; ?>" style="text-decoration:none;">
            <div class="green" id="green8">
            <div class="progress1" id="progress8">
              <div class="inner" id="inner8">
                <div class="percent" id="percent8"><span><?php echo $chuoi8; ?></span>%</div>
                <div class="water" id="water8"></div>
                <div class="glare" id="glare8"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[8], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box8" value="<?php 
            echo $ch3; ?>">
        </a>
        </h5>
        <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may8']; ?></span>
         </div>
    </div>


    <div style="" class="buyoff">
      <h5 style="font-weight: bold;">
        <a href="../Controller/index.php?action=bieudoline1&id=<?php echo $c[9]; ?>" style="text-decoration:none;">
            <div class="green" id="green9">
            <div class="progress1" id="progress9">
              <div class="inner" id="inner9">
                <div class="percent" id="percent9"><span><?php echo $chuoi9; ?></span>%</div>
                <div class="water" id="water9"></div>
                <div class="glare" id="glare9"></div>
              </div>
            </div>
          </div>
          <?php $arraymay1 = array();
              $a = 0;
              foreach ($bophanline as $key1) {
                $a++;
                $arraymay1[$a] = $key1['tiendo'];

            } 
            $ch3 = substr($arraymay1[9], 0, -1);

            ?>
          <span><input type="hidden" id="percent-box9" value="<?php 
            echo $ch3; ?>">
        </a>
        </h5>
        <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:20px;text-align:center;"><?php echo $datatiendo1['may9']; ?></span>
         </div>
    </div>
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3






      <div style="width: 100vw;">
        <div class="packages-divtable" style="height: 94vh;">
            <a data-bs-toggle="modal" data-bs-target="#addcongdoan" style="float: left;font-size: 50px;cursor: pointer;"><i class="fas fa-solid fa-plus"></i></a>

                <div style="display: inline-flex;height: 50px;margin-bottom: 20px;">
                    <a href="../Controller/index.php?action=test2#book"><img style="align-items: center;line-height: 50px;" height="50" width="50" src="../image/iconhome.png"></a>
                    <span class="div-table-span" style="align-items: center;line-height: 50px;margin-left: 20px;">Bảng Tiến Độ <?php echo $tenmay; ?></span>
                </div>
                <table class="table" style="">
              <thead>
                <tr>
                    <th style="line-height: 100px;" class="col-2">Tên Máy</th>    
                    <th style="line-height: 100px;" class="col-1">Tiến Độ</th>
                    <th style="line-height: 100px;" class="col-1">Ngày Bắt Đầu</th>
                    <th style="line-height: 100px;" class="col-1">Ngày Dự Kiến</th>
                    <th style="line-height: 100px;" class="col-1">Bộ Phận</th>
                    <th style="line-height: 100px;" class="col-2">Nhóm Thực Hiện</th>
                    <th style="line-height: 100px;" class="col-1">#</th>
                </tr>
              </thead>
           <tbody>
          <?php 
              $tabletiendomaymoc1 = 'tiendomaymoc1';
              $bophan = $dataID['bophan'];
              $tenmay = $dataID['tenmay'];
              $ngaybatdau = $dataID['ngaybatdau'];
              $ngaydukien = $dataID['ngaydukien'];
              $nhomthuchien = $dataID['nhomthuchien'];
              $mathe = $dataID['mathe'];
              $bophan = $dataID['bophan'];
              $datatenmayline = $db->getDataTenMayLine($tabletiendomaymoc1,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);


             if($datatenmayline > 0)
             {
             foreach ($datatenmayline as $value) {
                
             ?>
            <tr style="background: white;height: 50px;text-align:center;">
                <td style=''> <a style="text-decoration: none;" href="../Controller/index.php?action=bieudoline1&id=<?php echo $value['id']; ?>"><?php echo $value['tenmay']; ?></a></td>  
                <td style=''><?php echo $value['tiendo']; ?></td>
                <td style=''><?php echo $value['ngaybatdau1']; ?></td>

                <td style=''><?php echo $value['ngaydukien1']; ?></td>
                

                <td style='font-weight: bold;'><?php echo $value['bophan']; ?></td>
                <td style='font-weight: bold;'><?php echo $value['nhomthuchien1']; ?></td>
           




                <td style='font-size: 20px; border: 1px solid; '>
                    <a style="text-decoration: none;margin-right: 30px"data-bs-toggle="modal" data-bs-target="#edit<?php echo $value['id']; ?>" href="" ><i style="font-size: 30px;" class="fa-solid fa-pen-to-square"></i></a>
          
                    <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $value['id']; ?>" href="" title="xóa"><i style="font-size: 30px;" class="fa-solid fa-trash-can"></i></a>
                </td>   

            </tr>
           <?php } } ?>
            </tbody>
        </table>
          </div>
            
            </div>
</section>
</body>







<!-- edit -->

<?php 
if($datatenmayline > 0)
{
foreach ($datatenmayline as $value) {

 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $value['tenmay']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $value['tenmay']; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $value['ngaybatdau1']; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $value['ngaydukien1']; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe1" class="form-control" value="<?php echo $value['mathe1']; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien1" class="form-control" value="<?php echo $value['nhomthuchien1']; ?>">


            <div class="search-input1" style="text-align: center;">
                   <input type="text" id="inputsearch1" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box1">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="idd" value="<?php echo $value['id']; ?>">
              
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="edit1" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } } ?>





<!-- xóa -->

<?php 
if($datatenmayline > 0)
{
foreach ($datatenmayline as $value) {

 ?>
<form method="POST" action="">
<div class="modal fade" id="exampleModal1<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Công Đoạn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
        Bạn Chắc Chắn Muốn Xóa Không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
        <button type="submit" name="xoa" class="btn btn-primary">Đồng Ý</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php } } ?>



    
<!-- thêm May Line -->


<form method="POST" action="">
<div class="modal fade" id="addcongdoan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Máy <?php echo $tenmay; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tên Máy:</label>
            <input type="text" name="tenmay1" class="form-control" id="recipient-name">
          </div>

           <input type="hidden" name="tenmay" value="<?php echo $dataID['tenmay']; ?>">
           <input type="hidden" name="ngaybatdau" value="<?php echo $dataID['ngaybatdau']; ?>">
           <input type="hidden" name="ngaydukien" value="<?php echo $dataID['ngaydukien']; ?>">
           <input type="hidden" name="mathe" value="<?php echo $dataID['mathe']; ?>">
           <input type="hidden" name="bophan" value="<?php echo $dataID['bophan']; ?>">
           <input type="hidden" name="nhomthuchien" value="<?php echo $dataID['nhomthuchien']; ?>">

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Ngày Bắt Đầu:</label>
             <input type="date" name="ngaybatdau1" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">NgàyDự Kiến:</label>
             <input type="date" name="ngaydukien1" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>
            <input type="text" name="mathe1" class="form-control" id="matheId">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nhóm Thực Hiện:</label>
            <input type="text" name="nhomthuchien1" class="form-control" id="nhomthuchienId">
          </div>
          <label for="recipient-name" class="col-form-label">Tìm Kiếm Mã Tên Nhân Viên:</label>
          <div class="search-input" style="text-align: center;">
                   <input type="text" id="inputsearch" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box">
                   </div>
                   <span id="clear"></span>
               </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="themmay" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<<<<<<< HEAD
=======
<script type="text/javascript">

    var a = "<?php echo $tiendomario; ?>";
    var mario = document.getElementById('mario');
    var mario2 = document.getElementById('mario2');


        mario.classList.add("mario5");
        mario2.classList.add("mario25");

</script>



<script type="text/javascript">
    var colorInc = 100 / 3;
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3






<script type="text/javascript">
    let suggettion111 = new Array();
    var length = "<?php $mang2; ?>";

    var a = "<?php
         for ($i=0; $i < $mang2; $i++) { 
             echo $mang[$i].','; 
         }
         
          ?>";
  
  suggettion111.push(...suggettion111,a);

  var suggettion = suggettion111[0].split(","); 
  
</script>



<!-- Thêm Máy Trong Line -->




 <script type="text/javascript">
       let searchWrapper = document.querySelector(".search-input")
       let inputBox = document.querySelector("#inputsearch")
       let suggBox = document.querySelector(".autocom-box")
       let nhomthuchien = document.querySelector('#nhomthuchienId')
       let mathe = document.querySelector('#matheId')
       var numberStore = [];
       var ma = [];

       inputBox.onkeyup = (e) => {
         let userData = e.target.value;
         console.log(userData)
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper.classList.add("active")
            showSuggettions(emptyArray);
            let allList = suggBox.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select(this)")
            }
         }else{
            searchWrapper.classList.remove("active")
         }
       }

       function select(element){
        let selectUserData = element.textContent;
        // inputBox.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore = [...numberStore, cat];
        const cat1 = selectUserData.slice(-8)
        ma = [...ma, cat1];
        mathe.value = ma;
        nhomthuchien.value = numberStore;
        // inputBox.value = ;
       }

       function showSuggettions(list){
        let listData;
        if(!list.length){
             userValue = inputBox.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox.innerHTML = listData;
       }
   </script>




   <!-- sửa công đoạn -->


 <script type="text/javascript">
       let searchWrapper1 = document.querySelector(".search-input1")
       let inputBox1 = document.querySelector("#inputsearch1")
       let suggBox1 = document.querySelector(".autocom-box1")
       let nhomthuchien1 = document.querySelector('#nhomthuchien1')
       let mathe1 = document.querySelector('#mathe1')
       var numberStore1 = [];
       var ma1 = [];

       inputBox1.onkeyup = (e) => {
         let userData = e.target.value;
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper1.classList.add("active")
            showSuggettions1(emptyArray);
            let allList = suggBox1.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select1(this)")
            }
         }else{
            searchWrapper1.classList.remove("active")
         }
       }

       function select1(element){
        let selectUserData1 = element.textContent;
        // inputBox1.value = selectUserData1;
        const cat = selectUserData1.slice(0, -9)
        numberStore1 = [...numberStore1, cat];
        const cat1 = selectUserData1.slice(-8)
        ma1 = [...ma1, cat1];
        mathe1.value = ma1;
        nhomthuchien1.value = numberStore1;
        // inputBox1.value = ;
       }

       function showSuggettions1(list){
        let listData;
        if(!list.length){
             userValue = inputBox1.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox1.innerHTML = listData;
       }
   </script>






<script type="text/javascript">

    var a = "<?php echo $tiendomario; ?>";
    var mario = document.getElementById('mario');
    var mario2 = document.getElementById('mario2');

    if(a > 20 && a <= 40)
    {

        mario.classList.toggle("mario1");
        mario2.classList.toggle("mario22");
    }

    if(a > 40 && a <= 60)
    {
        mario.classList.add("mario3");
        mario2.classList.add("mario23");
    }

    if(a > 60 && a <= 80)
    {
        mario.classList.add("mario4");
        mario2.classList.add("mario24");
    }

    if(a > 80 && a < 100)
    {
        mario.classList.add("mario5");
        mario2.classList.add("mario25");
    }

    if(a <= '20%')
    {

    }
</script>   






<script type="text/javascript">
    document.getElementById("xacnhan2").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau2");
     var y = document.getElementById("span2");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1]; ?>'){
        window.location="../Controller/index.php?action=edit&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau2").classList.add("is-invalid");
      document.getElementById("span2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span2").style.color = 'red'
    }   
    
}


</script>


<script type="text/javascript">
    document.getElementById("xacnhan3").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau3");
     var y = document.getElementById("span3");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1]; ?>'){
        window.location="../Controller/index.php?action=delete&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau3").classList.add("is-invalid");
      document.getElementById("span3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span3").style.color = 'red'
    }
    
}


</script>




<!--         <script type="text/javascript">
          //For adding dots to loading
window.onload = function(){
    var loading = document.getElementById("loading");
    
    function addRedDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span></h1>";
        }
        function addYellowDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span><span class='dot-yellow'>.</span></h1>";
        }
        function addGreenDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span><span class='dot-yellow'>.</span><span class='dot-green'>.</span></h1>";
        }
        function removeDots(i) {
        i.innerHTML = "<h1>LOADING</h1>";
        }
    
    function timedDots(i) {
    
        setTimeout(function(){
            addRedDot(i)
        }, 1000);
        setTimeout(function(){
            addYellowDot(i)
        }, 2000);
        setTimeout(function(){
            addGreenDot(i)
        }, 3000);
        setTimeout(function(){
            removeDots(i)
        }, 4000);
        
        }
    
    setInterval(function(){
        timedDots(loading)
    }, 4000);
}

        </script> -->


</body>
</html>