<?php 

include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

if(isset($_GET['id'])){
           $id = $_GET['id'];
           $table = "tiendomaymoc";
           $dataID = $db->getDataID($table,$id);

        $tablee = 'tiendo';
        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];
        $datatiendo = $db->getDatatiendo($tablee,$tenmay,$ngaybatdau);
       
       }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $table = 'tiendomaymoc';
            $dataID = $db->getDataID($table,$id); 
            $ccc = $dataID['tiendo'];
            $tiendomario = substr($ccc, 0, -1);
        }

$id = $_GET['id'];
$dataID['tiendo'];
$tim = strpos($dataID['tiendo'], '%');
$tiendo = substr($dataID['tiendo'], 0, $tim);
$ngaybatdau = $dataID['ngaybatdau'];
$ngaydukien = $dataID['ngaydukien'];
$catthang = substr($ngaybatdau, 5, -3);
$catthang1 = substr($ngaydukien, 5, -3);
$catnam = substr($ngaybatdau, 0, 4);
$catnam1 = substr($ngaydukien, 0, 4);
$catngay = substr($ngaybatdau, -2, 2);
$catngay1 = substr($ngaydukien, -2, 2);
$nambatdau = $catnam;
$namdukien = $catnam1;
if($catthang==11||$catthang==12||$catthang==10)
{
    $thangbatdau = $catthang;
}else
{
    $thangbatdau = substr($catthang,1);
}
if($catngay==11||$catngay==12||$catngay==10)
{
    $ngay = $catngay;
}
else{
    $ngay = substr($catngay,1);
}
if($catthang1==11||$catthang1==12||$catthang1==10)
{
    $thangdukien = $catthang1;
}else
{
    $thangdukien = substr($catthang1,1);
}
if($catngay1==11||$catngay1==12||$catngay1==10)
{
    $ngay1 = $catngay1;
}
else{
    $ngay1 = substr($catngay1,-2,2);
}
$ngayhientai = date("j");  
$thanghientai = date("n");
$namhientai = date("Y");


        $tablee = 'tiendo';
        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];
        $datatiendo = $db->getDatatiendo($tablee,$tenmay,$ngaybatdau);

        $tablee1 = 'tiendoquydinh';
        $datatiendo1 = $db->getDatatiendo1($tablee1,$tenmay,$ngaybatdau);
        

        $chuoidau = $dataID['tiendo'];
        $chuoi = substr($chuoidau, 0, -1);

        $dau = $datatiendo1['dfm'];
        $ch = substr($dau, 0, -1);
        $chuoidau1 = $datatiendo['dfm'];
        $chuoi1 = substr($chuoidau1, 0, -1);
        $tong1 = (($ch*$chuoi1)/100);

        $dau1 = $datatiendo1['3dto2d'];
        $ch1 = substr($dau1, 0, -1);
        $chuoidau2 = $datatiendo['3dto2d'];
        $chuoi2 = substr($chuoidau2, 0, -1);
        $tong2 = (($ch1*$chuoi2)/100);
        
        $dau2 = $datatiendo1['giacongvadathang'];
        $ch2 = substr($dau2, 0, -1);
        $chuoidau3 = $datatiendo['giacongvadathang'];
        $chuoi3 = substr($chuoidau3, 0, -1);
        $tong3 = (($ch2*$chuoi3)/100);
        
        $dau3 = $datatiendo1['lapdatvachinhmay'];
        $ch3 = substr($dau3, 0, -1);
        $chuoidau4 = $datatiendo['lapdatvachinhmay'];
        $chuoi4 = substr($chuoidau4, 0, -1);
        $tong4 = (($ch3*$chuoi4)/100);
        
        $dau4 = $datatiendo1['buyoff'];
        $ch4 = substr($dau4, 0, -1);
        $chuoidau5 = $datatiendo['buyoff'];
        $chuoi5 = substr($chuoidau5, 0, -1);
        $tong5 = (($ch4*$chuoi5)/100);
        

        $phantram = ($tong1+$tong2+$tong3+$tong4+$tong5);
        $tong = $phantram.'%';
        $db->UpdateTienDo($id,$tong);


           $table = 'tiendomaymoc';
           $id = $_GET['id'];
           $dataID = $db->getDataID($table,$id); 
           $tiendo = $dataID['tiendo'];
           $tiendo1 = substr($tiendo, 0, -1);


           
           $date1 = $ngaybatdau;
           $date2 = $ngaydukien;
           $diff = abs(strtotime($date2) - strtotime($date1));
           $hours = $diff / (60 * 60);

           $ngayhoanthanh =  date("Y-m-d");   
           
           $date3 = $ngaybatdau;
           $date4 = $ngayhoanthanh;
           $diff1 = abs(strtotime($date4) - strtotime($date3));
           $hours1 = $diff1 / (60 * 60);

           $nhanvien = 'nhanvien';
           $hieusuat = floor((100 * $hours) / $hours1).'%';

           
           $mathe = $dataID['mathe'];
           $ten = $dataID['nhomthuchien'];
           $ma = substr($mathe, 0, -8);
           // $length = substr_count($mathe, '-');
           // $length1 = $length+1;
           $str = str_replace( '-', '', $mathe );
           $m = array();
           $m = explode(',', $mathe);


           $m1 = array();
           $m1 = explode(',', $ten);

           $length = count($m);
           

           // echo "<script type='text/javascript'>alert('$m[0]');</script>";
           // $mathe = $db->getDataMaThe($table,$mathe);

          $dfmm = $datatiendo['dfm'];
          $to2dd = $datatiendo['3dto2d'];
          $giacongvadathangg = $datatiendo['giacongvadathang'];
          $lapdatvachinhmayy = $datatiendo['lapdatvachinhmay'];



         if(isset($_POST['submitdfm']))
        {
        $tentiendo = 'dfm';
        $tiendo = $_POST['namedfm'].'%';
        if($db->Updattiendo2($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau)){
            if($tiendo1 == 100)
            { 
              $nhanvien = 'nhanvien';
              $db->Updatehoanthanh($table,$ngayhoanthanh,$id);
              $hieusuat = floor((100 * $hours) / $hours1);
              $xuat = $hieusuat.'%';
              $db->Updatehieusuat($table,$xuat,$id);
    
              for ($i=0; $i < $length; $i++) { 
                    $tablehieusuat = 'hieusuat';
                    $mathe = $m[$i];
                    $db->InsertHieuSuat($tablehieusuat,$mathe,$hieusuat,$tenmay,$ngaybatdau);
                    $sumhieusuat = $db->getSumHieuSuat($tablehieusuat,$mathe);
                    $sum = $sumhieusuat['hieusuat'];
                    $counthieusuat = $db->getCountHieuSuat($tablehieusuat,$mathe);
                    $count1 = $counthieusuat['count'];

                    $tonghieusuat = ($sum/$count1).'%';

                    $db->Updatehieusuat($nhanvien,$tonghieusuat,$mathe);
                }  
            } 

            header('Refresh:0');
        }
        }

        if(isset($_POST['submit3DTo2D']))
        {
            if($dfmm == '100%')
            {
            $tentiendo = '3dto2d';
            $tiendo = $_POST['name3DTo2D'].'%';
            if($db->Updattiendo2($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau)){
                if($tiendo1 == 100)
                { 
                  $nhanvien = 'nhanvien';
                  $db->Updatehoanthanh($table,$ngayhoanthanh,$mathe);
                  $hieusuat = floor((100 * $hours) / $hours1);
                  $xuat = $hieusuat.'%';
                  $db->Updatehieusuat($table,$xuat,$id);
        
                  for ($i=0; $i < $length; $i++) { 
                        $tablehieusuat = 'hieusuat';
                        $mathe = $m[$i];
                        $db->InsertHieuSuat($tablehieusuat,$mathe,$hieusuat,$tenmay,$ngaybatdau);
                        $sumhieusuat = $db->getSumHieuSuat($tablehieusuat,$mathe);
                        $sum = $sumhieusuat['hieusuat'];
                        $counthieusuat = $db->getCountHieuSuat($tablehieusuat,$mathe);
                        $count1 = $counthieusuat['count'];

                        $tonghieusuat = ($sum/$count1).'%';

                        $db->Updatehieusuat($nhanvien,$tonghieusuat,$mathe);
                    }  
                }  
              header('Refresh:0');
        }
        }else{
            $thongbao = 'Tiến Độ DFM Chưa Xong';
            echo "<script type='text/javascript'>alert('$thongbao');</script>";
        }
        }
         
        if(isset($_POST['submitgiacongvadathang']))
        {
        if($to2dd == '100%')
        {
        $tentiendo = 'giacongvadathang';
        $tiendo = $_POST['namegiacongvadathang'].'%';
        if($db->Updattiendo2($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau)){
            if($tiendo1 == 100)
            { 
              $nhanvien = 'nhanvien';
              $db->Updatehoanthanh($table,$ngayhoanthanh,$id);
              $hieusuat = floor((100 * $hours) / $hours1);
              $xuat = $hieusuat.'%';
              $db->Updatehieusuat($table,$xuat,$id);
    
              for ($i=0; $i < $length; $i++) { 
                    $tablehieusuat = 'hieusuat';
                    $mathe = $m[$i];
                    $db->InsertHieuSuat($tablehieusuat,$mathe,$hieusuat,$tenmay,$ngaybatdau);
                    $sumhieusuat = $db->getSumHieuSuat($tablehieusuat,$mathe);
                    $sum = $sumhieusuat['hieusuat'];
                    $counthieusuat = $db->getCountHieuSuat($tablehieusuat,$mathe);
                    $count1 = $counthieusuat['count'];

                    $tonghieusuat = ($sum/$count1).'%';

                    $db->Updatehieusuat($nhanvien,$tonghieusuat,$mathe);
                }  
            }  

            header('Refresh:0');
        }
        }else{
            $thongbao = 'Tiến Độ 3Dto2D Chưa Xong';
            echo "<script type='text/javascript'>alert('$thongbao');</script>";
        }
        }

        if(isset($_POST['submitlapdatvachinhmay']))
        {
        if($giacongvadathangg == '100%')
        {
        $tentiendo = 'lapdatvachinhmay';
        $tiendo = $_POST['namelapdatvachinhmay'].'%';
        if($db->Updattiendo2($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau)){
            if($tiendo1 == 100)
            { 
              $nhanvien = 'nhanvien';
              $db->Updatehoanthanh($table,$ngayhoanthanh,$id);
              $hieusuat = floor((100 * $hours) / $hours1);
              $xuat = $hieusuat.'%';
              $db->Updatehieusuat($table,$xuat,$id);
    
              for ($i=0; $i < $length; $i++) { 
                    $tablehieusuat = 'hieusuat';
                    $mathe = $m[$i];
                    $db->InsertHieuSuat($tablehieusuat,$mathe,$hieusuat,$tenmay,$ngaybatdau);
                    $sumhieusuat = $db->getSumHieuSuat($tablehieusuat,$mathe);
                    $sum = $sumhieusuat['hieusuat'];
                    $counthieusuat = $db->getCountHieuSuat($tablehieusuat,$mathe);
                    $count1 = $counthieusuat['count'];

                    $tonghieusuat = ($sum/$count1).'%';

                    $db->Updatehieusuat($nhanvien,$tonghieusuat,$mathe);
                }  
            }  

            header('Refresh:0');
        }
        }else{
            $thongbao = 'Tiến Độ Gia Công Và Đặt Hàng Chưa Xong';
            echo "<script type='text/javascript'>alert('$thongbao');</script>";
        }
        }
        
        if(isset($_POST['submitbuyoff']))
        {
        if($lapdatvachinhmayy == '100%')
        {
        $tentiendo = 'buyoff';
        $tiendo = $_POST['namebuyoff'].'%';
        if($db->Updattiendo2($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau)){

            if($tiendo1 == 100)
            { 
              $nhanvien = 'nhanvien';
              $db->Updatehoanthanh($table,$ngayhoanthanh,$id);
              $hieusuat = floor((100 * $hours) / $hours1);
              $xuat = $hieusuat.'%';
              $db->Updatehieusuat($table,$xuat,$id);
    
              for ($i=0; $i < $length; $i++) { 
                    $tablehieusuat = 'hieusuat';
                    $mathe = $m[$i];
                    $db->InsertHieuSuat($tablehieusuat,$mathe,$hieusuat,$tenmay,$ngaybatdau);
                    $sumhieusuat = $db->getSumHieuSuat($tablehieusuat,$mathe);
                    $sum = $sumhieusuat['hieusuat'];
                    $counthieusuat = $db->getCountHieuSuat($tablehieusuat,$mathe);
                    $count1 = $counthieusuat['count'];

                    $tonghieusuat = ($sum/$count1).'%';

                    $db->Updatehieusuat($nhanvien,$tonghieusuat,$mathe);
                }  
            }   

            header('Refresh:0');
        }
        }else{
            $thongbao = 'Tiến Độ Lắp Đặt Và Chỉnh Máy Chưa Xong';
            echo "<script type='text/javascript'>alert('$thongbao');</script>";
        }
        }

        $hoanthanh1 = $dataID['ngayhoanthanh'];
        if($tiendo1 == 100&&$hoanthanh1=='')
        {
            $nhanvien = 'nhanvien';
                  $db->Updatehoanthanh($table,$ngayhoanthanh,$id);
                  $hieusuat = floor((100 * $hours) / $hours1);
                  $xuat = $hieusuat.'%';
                  $db->Updatehieusuat($table,$xuat,$id);
        
                  for ($i=0; $i < $length; $i++) { 
                        $tablehieusuat = 'hieusuat';
                        $mathe = $m[$i];
                        $db->InsertHieuSuat($tablehieusuat,$mathe,$hieusuat,$tenmay,$ngaybatdau);
                        $sumhieusuat = $db->getSumHieuSuat($tablehieusuat,$mathe);
                        $sum = $sumhieusuat['hieusuat'];
                        $counthieusuat = $db->getCountHieuSuat($tablehieusuat,$mathe);
                        $count1 = $counthieusuat['count'];

                        $tonghieusuat = ($sum/$count1).'%';

                        $db->Updatehieusuat($nhanvien,$tonghieusuat,$mathe);
                    } 
        }

        if(isset($_POST['submithoanthanh'])){
            $tabletime = 'time';
            $tenmay = $dataID['tenmay'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $ngaybatdau1 = 0;
            $ngaydukien1 = 0;
            $timehoanthanh = $_POST['namehoanthanh'];
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];


            if($db->InsertTime($tabletime,$tenmay,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien)){
                header('Refresh:0');
            }
        }


        if(isset($_POST['submitngaybatdau'])){
            $tabletime = 'time';
            $tenmay = $dataID['tenmay'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $ngaybatdau1 = $_POST['namengaybatdau'];
            $ngaydukien1 = 0;
            $timehoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];

            // echo "<script type='text/javascript'>alert('$tungnguoi');</script>";

            if($db->InsertTime($tabletime,$tenmay,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien)){
                header('Refresh:0');
            }
        }


        if(isset($_POST['submitngaydukien'])){
            $tabletime = 'time';
            $tenmay = $dataID['tenmay'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $ngaybatdau1 = 0;
            $ngaydukien1 = $_POST['namengaydukien'];
            $timehoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];

            // echo "<script type='text/javascript'>alert('$tungnguoi');</script>";

            if($db->InsertTime($tabletime,$tenmay,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien)){
                header('Refresh:0');
            }
        }



if(isset($_GET['id'])){
           $id = $_GET['id'];
           $table = "tiendomaymoc";
           $dataID = $db->getDataID($table,$id);

           $ketqua = $dataID['tiendo'];
             $chuoidau = $dataID['tiendo'];
        $chuoi = substr($chuoidau, 0, -1);
       }
        

$tableusersview = 'usersview';
$matkhau = $db->getAllData($tableusersview);


$matkhau2 = array();
$a = 0;
foreach ($matkhau as $keyy) {
    $a++;
    $matkhau1[$a] = $keyy['password'];
}


if($length == 0){
    $length = $length+1;
}


?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../codejavascript/script.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.min.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.react.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <script type="text/javascript" src="../canvasjs/jquery.canvasjs.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudo.css">
     <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudoCN.css">
    <title>VN cable 自動化</title>
<!--  <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
    animationEnabled: true,
    exportEnabled: true,
    zoomEnabled: true,
    theme: "light1", 
      title:{
        text: "Biểu Đồ Tiến Độ Công Việc",
        fontFamily: "Times New Roman",
         fontSize: 50,  
      }, 
    axisX: {
    title: 'Ngày Tháng Năm',
    valueFormatString: "D-MM-YYYY",
    labelAngle: -30
    },
          axisY:{
        title: 'Tiến Độ(%)',
        minimum: 1,
        maximum: 100
    },  
      data: [{ 
        type: "line", //change type to bar, line, area, pie, etc
        indexLabel: "{x}, {y}",//Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        showInLegend: true,
        name: "biểu đồ",
        legendText: "Tiến Độ Dự Kiến",
        indexLabelPlacement: "outside",        
        dataPoints: [
        
        
        ]
      },{        
               
        type: "line",
        showInLegend: true,
        name: "Tiến Độ Hiện Tại",
        // lineDashType: "dash",
        xValueFormatString: "DD-MM-YYYY",
        yValueFormatString: "#,##0.0\"%\"",
        dataPoints: [
        { x: new Date(<?php echo $nambatdau; ?>, <?php echo $thangbatdau-1; ?>, <?php echo $catngay; ?>), y: 0 , indexLabel: "Ngày Bắt Đầu" },
        { x: new Date(<?php echo $namhientai; ?>, <?php echo $thanghientai-1; ?>, <?php echo $ngayhientai; ?>), y: <?php echo $chuoi; ?>, indexLabel: "Ngày Hiện Tại <?php echo $chuoi.'%'; ?>" },
        { x: new Date(<?php echo $namdukien; ?>, <?php echo $thangdukien-1; ?>, <?php echo $ngay1; ?>), y: 100 , indexLabel: "Ngày Dự Kiến Hoàn Thành" }
        ]
      }
      ]
    });

    chart.render();
  }
  </script> -->
  <script src="../codejavascript/jq1.js"></script>
  <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../codejavascript/mario.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <style type="text/css">

      
      .tiendo{
        display: grid;
        width: 99vw;
        height: 170px;
        grid-template-columns: repeat(5, 1fr);
        column-gap: 1.6rem;
        grid-template-columns: 19% 19% 19% 19% 18%;
        row-gap: 2rem;
        margin-top: 0.5rem;
        justify-items: center;
      }
      .dfm{
         cursor: pointer;
      }
      .to2d{
         cursor: pointer; 
      }
      .giacongvadathang{
         cursor: pointer;
      }
      .lapdatvachinhmay{
         cursor: pointer;
      }
      .buyoff{
         cursor: pointer;
      }



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







   </style>
</head>
<body>
    <section class="packages" id="packages" style="background: #CCE4F0;">

    <div style="width: 100%;height: 70px;position: fixed;z-index: 61;">
        <h2><a href="../Controller/index.php?action=test2-cn#book" style="font-size: 25px;" class="btn btn-success">菜單</a></h2>   
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




    <div class="chimney" id="chimney1" style="">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style=""data-bs-toggle="modal" data-bs-target="#dfm" class="dfm">DFM</span>
  </div>
  <div class="flower" id="flower1" style="">
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


    <div class="chimney" id="chimney2" style="">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style=""data-bs-toggle="modal" data-bs-target="#id3DTo2D" data-bs-whatever="3DTo2D" class="to2d">3DTO2D</span>
  </div>
  <div class="flower" id="flower2" style="">
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


    <div class="chimney" id="chimney3" style="">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="" data-bs-toggle="modal" data-bs-target="#giacongvadathang" data-bs-whatever="Gia Công Và Đặt Hàng" class="giacongvadathang">加工,訂購</span>
  </div>
  <div class="flower" id="flower3" style="">
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


    <div class="chimney" id="chimney4" style="">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="" data-bs-toggle="modal" data-bs-target="#lapdatvachinhmay" data-bs-whatever="Lắp Đặt Và Chỉnh Máy" class="lapdatvachinhmay">組裝,調整機台</span>
  </div>
  <div class="flower" id="flower4" style="">
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



  <div class="chimney" id="chimney5" style="">
      <img src="../image/castle.gif"height="300"width="300" style="">
         <span style="--p: 30vw;" data-bs-toggle="modal" data-bs-target="#buyoff" data-bs-whatever="Buyoff" id="spanbuyoff"><?php echo $dataID['tiendo']; ?></span>
    </div>


     
     <img src="../image/tree1.png" height="50"width="50" class="img1" style="">
     <img src="../image/nam1.png" height="100"width="100" class="img2" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img3" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img4" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img5" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img6" style="">
      <img src="../image/tree1.png" height="50"width="50" class="img7" style="">
   
      <!--  <div class="progress2 progress-moved" style="margin-top: -16px;--p:30vw">
        <div class="progress-bar2" >
        </div>                       
      </div> --> 
      <img src="../image/anh77.jpg" height="65" style="--p:<?php echo $tiendomario; ?>vw" id="imgimg">


     <div class="container2"style="">
        
    </div>

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






  <!-- <div class="tiendo" > -->

       




     <!--   <div style="" data-bs-toggle="modal" data-bs-target="#dfm" class="dfm">
         <div class="green" id="green1">
            <div class="progress1" id="progress1">
              <div class="inner" id="inner1" 
              >
                <div class="percent" id="percent1"><span><?php echo $chuoi1; ?></span>%</div>
                <div class="water" id="water1"></div>
                <div class="glare" id="glare1"></div>
              </div>
            </div>
          </div>
         <span><input type="hidden" id="percent-box" value="<?php echo $chuoi1; ?>"></span>
         <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:25px;text-align:center;">DFM</span>
         </div>
     </div>

     <div style="" data-bs-toggle="modal" data-bs-target="#id3DTo2D" data-bs-whatever="3DTo2D" class="to2d">
         <div class="green" id="green2">
            <div class="progress1" id="progress2">
              <div class="inner" id="inner2">
                <div class="percent" id="percent2"><span><?php echo $chuoi2; ?></span>%</div>
                <div class="water" id="water2"></div>
                <div class="glare" id="glare2"></div>
              </div>
            </div>
          </div>
          <span><input type="hidden" id="percent-box2" value="<?php echo $chuoi2; ?>"></span>
          <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:25px;text-align:center;">3DTO2D</span>
         </div>
     </div>

     <div style="" data-bs-toggle="modal" data-bs-target="#giacongvadathang" data-bs-whatever="Gia Công Và Đặt Hàng" class="giacongvadathang">
         <div class="green" id="green3">
            <div class="progress1" id="progress3">
              <div class="inner" id="inner3">
                <div class="percent" id="percent3"><span><?php echo $chuoi3; ?></span>%</div>
                <div class="water" id="water3"></div>
                <div class="glare" id="glare3"></div>
              </div>
            </div>
          </div>
          <span><input type="hidden" id="percent-box3" value="<?php echo $chuoi3; ?>"></span>
          <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:23px;text-align:center;">Gia Công,ĐH</span>
         </div>
     </div>

     <div style="" data-bs-toggle="modal" data-bs-target="#lapdatvachinhmay" data-bs-whatever="Lắp Đặt Và Chỉnh Máy" class="lapdatvachinhmay">
         <div class="green" id="green4">
            <div class="progress1" id="progress4">
              <div class="inner">
                <div class="percent" id="percent4"><span><?php echo $chuoi4; ?></span>%</div>
                <div class="water" id="water4"></div>
                <div class="glare" id="glare4"></div>
              </div>
            </div>
          </div>
          <span><input type="hidden" id="percent-box4" value="<?php echo $chuoi4; ?>"></span>
          <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:23px;text-align:center;">Lắp Đặt,CM</span>
         </div>
     </div>

     <div style="" data-bs-toggle="modal" data-bs-target="#buyoff" data-bs-whatever="Buyoff" class="buyoff">
         <div class="green" id="green5">
            <div class="progress1" id="progress5">
              <div class="inner" id="inner5">
                <div class="percent" id="percent5"><span><?php echo $chuoi5; ?></span>%</div>
                <div class="water" id="water5"></div>
                <div class="glare" id="glare5"></div>
              </div>
            </div>
          </div>
          <span><input type="hidden" id="percent-box5" value="<?php echo $chuoi5; ?>"></span>
          <div style="width: 7vw;text-align: center;">
             <span style="font-weight:bold;font-size:25px;text-align:center;">Buyoff</span>
         </div> -->
     <!-- </div> -->


</div>

      <div style="width: 100vw;" class="div-table">
        
          <div style="" class="packages-divtable">
              <span class="div-table-span" >進度</span>
                <table class="table" style="">
              <thead>
                <tr style="height: 20px;font-size: 20px;">
                   <th style="" class="col-2">機台名稱</th>    
                    <th style="" class="col-1">進度</th>
                    <th style="" class="col-1">開始日期</th>
                    <th style="" class="col-1">預期日期</th>
                    <th style="" class="col-1">全部小时数</th>
                    <th style="" class="col-1">完成时间(H)</th>
                    <th style="" class="col-1">效率(%)</th>
                    <th style="" class="col-1">随着时间的推移(H)</th>
                    <th style="" class="col-2">成員</th>
                </tr>
              </thead>
          <tbody>
            <?php for ($i=0; $i < $length; $i++) { 
                // echo "<script type='text/javascript'>alert('$length1');</script>";
            ?>
            <tr style="background: white;height: 20px;text-align:center;font-size: 20px;">
                <td style=''> <?php echo $dataID['tenmay']; ?></td>  
                <td style=''><?php echo $dataID['tiendo']; ?></td>

                <td style=''>
                    <button style="font-size: 22px;" data-bs-toggle="modal" data-bs-target="#ngaybatdau<?php echo $i; ?>" class="btn btn-primary">
                         <?php 
                            $table = 'time';
                            $mathe = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $ngaybatdau1 = $db->getDataNgayBatDau($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);

                              if($ngaybatdau1[0] > 0){
                                echo $ngaybatdau1[0];
                              }
                              else{

                                echo 0;
                              }
                            ?>
                    </button>
                        
                </td>

                <td style=''>
                    <button style="font-size: 22px;" data-bs-toggle="modal" data-bs-target="#ngaydukien<?php echo $i; ?>" class="btn btn-primary">
                         <?php 
                            $table = 'time';
                            $mathe = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $ngaydukien1 = $db->getDataNgayDuKien($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);

                              if($ngaydukien1[0] > 0){
                                echo $ngaydukien1[0];
                              }
                              else{

                                echo 0;
                              }
                            ?>
                    </button>
                    
                </td>

                <td style=''>

                    <?php 
                    $hours = 0;
                       if($ngaydukien1[0] > 0 && $ngaybatdau1[0] > 0)
                       {
                           $date1 = $ngaybatdau1[0];
                           $date2 = $ngaydukien1[0];
                           $diff = abs(strtotime($date2) - strtotime($date1));
                           $days = $diff / (60 * 60 * 24);
                           $hours = $days*8;


                           echo $hours;
                       }else{
                           echo 0;
                       }
                     ?>
                        
                </td>
             
                <td style=''>
                    <button data-bs-toggle="modal" data-bs-target="#timehoanthanh<?php echo $i; ?>" class="btn btn-primary" style="">
                     <?php 
                    $table = 'time';
                    $mathe = $m[$i];
                    $nguoithuchien = $m1[$i];
                    $tenmay = $dataID['tenmay'];
                    $ngaybatdau = $dataID['ngaybatdau'];
                    $ngaydukien = $dataID['ngaydukien'];

                       $timehoanthanh = $db->getDataTimeHoanThanh($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);

                      if($timehoanthanh[0] > 0){
                        echo $timehoanthanh[0];
                      }
                      else{
                        echo 0;
                      }
                    ?>
                </button>
            </td>  


            
                <td style='font-weight: bold;'>
                   <?php if($hours > 0 && $timehoanthanh[0] > 0){
                       $hieusuat = floor((100 * $hours)/$timehoanthanh[0]);
                       echo $hieusuat.'%';
                   }else{
                    echo 0;
                   }
                   ?>
                </td>


                <td>
                    <?php 
                          if($hours > 0 && $timehoanthanh[0] > 0)
                         {
                            if(($timehoanthanh[0] - $hours) > 0)
                            {
                                echo $timehoanthanh[0] - $hours;
                            }
                            else
                            {
                                echo 0;
                            }
                         }
                         else
                         {
                            echo 0;
                         }

                     ?>
                </td>


                <td style=''><?php echo $m1[$i]; ?></td>
        


                <!-- <td style='font-size: 20px; border: 1px solid; '>
                    <a style="text-decoration: none;"data-bs-toggle="modal" data-bs-target="#exampleModal" href="" >Sửa</a>
                <?php if($dataID['tiendo']=='100%')
                       {
                     ?> 
                 </br>
                    <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal1" href="" title="xóa">Xóa</a>

                 <?php } ?> 
                </td>    -->    

            </tr>
            <?php } ?>
            </tbody>
        </table>
          </div>
         
            
            </div>
</section>



<!-- THời Gian Hoàn thành -->

<?php for ($i=0; $i < 10; $i++) { 

?>

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[$i]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh<?php echo $i+1; ?>" class="col-form-label tieudematkhauhoanthanh<?php echo $i+1; ?>">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh<?php echo $i+1; ?>" id="idmatkhauhoanthanh<?php echo $i+1; ?>">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[$i]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[$i]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh<?php echo $i+1; ?>" class="col-form-label tieudehoanthanh<?php echo $i+1; ?>"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[$i]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh<?php echo $i+1; ?>"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh<?php echo $i+1; ?>" class="idinputhoanthanh<?php echo $i+1; ?>"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh<?php echo $i+1; ?>" id="submitmayhoanthanh<?php echo $i+1; ?>" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh<?php echo $i+1; ?>" id="submithoanthanh<?php echo $i+1; ?>" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } ?>


<!-- THời Gian Ngày Bắt Đầu -->


<?php for ($i=0; $i < 10; $i++) { 
    
?>
<form method="POST" action=""> 
<div class="modal fade" id="ngaybatdau<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Ngày Bắt Đầu <?php echo $m[$i]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhaungaybatdau<?php echo $i+1; ?>" class="col-form-label tieudematkhaungaybatdau<?php echo $i+1; ?>">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhaungaybatdau<?php echo $i+1; ?>" id="idmatkhaungaybatdau<?php echo $i+1; ?>">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[$i]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[$i]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudengaybatdau<?php echo $i+1; ?>" class="col-form-label tieudengaybatdau<?php echo $i+1; ?>"style="display:none;">Ngày Bắt Đầu <?php echo $m1[$i]; ?> :</label>
            <input type="date" required ="required" name="namengaybatdau" class="form-control idinputngaybatdau" id="idinputngaybatdau<?php echo $i+1; ?>"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanngaybatdau<?php echo $i+1; ?>" class="idinputngaybatdau<?php echo $i+1; ?>"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayngaybatdau<?php echo $i+1; ?>" id="submitmayngaybatdau<?php echo $i+1; ?>" name="submitmayngaybatdau">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submitngaybatdau<?php echo $i+1; ?>" id="submitngaybatdau<?php echo $i+1; ?>" name="submitngaybatdau"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } ?>







<!-- THời Gian Ngày Dự Kiến -->

<?php for ($i=0; $i < 10 ; $i++) { 
    
 ?>

<form method="POST" action=""> 
<div class="modal fade" id="ngaydukien<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Ngày Dự Kiến <?php echo $m[$i]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhaungaydukien<?php echo $i+1; ?>" class="col-form-label tieudematkhaungaydukien<?php echo $i+1; ?>">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhaungaydukien<?php echo $i+1; ?>" id="idmatkhaungaydukien<?php echo $i+1; ?>">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[$i]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[$i]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudengaydukien<?php echo $i+1; ?>" class="col-form-label tieudengaydukien<?php echo $i+1; ?>"style="display:none;">Ngày Dự Kiến <?php echo $m1[$i]; ?> :</label>
            <input type="date" required ="required" name="namengaydukien" class="form-control idinputngaydukien" id="idinputngaydukien<?php echo $i+1; ?>"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanngaydukien<?php echo $i+1; ?>" class="idinputngaydukien<?php echo $i+1; ?>"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayngaydukien<?php echo $i+1; ?>" id="submitmayngaydukien<?php echo $i+1; ?>" name="submitmayngaydukien">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submitngaydukien<?php echo $i+1; ?>" id="submitngaydukien<?php echo $i+1; ?>" name="submitngaydukien"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php } ?>




<!-- edit -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">入密碼</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">號碼:</label>
            <input type="password" class="form-control" id="idmatkhau2">
          </div>
          <div>
              <span id="span2">
                  
              </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="xacnhan2" class="btn btn-primary">確認</button>
      </div>
    </div>
  </div>
</div>


<!-- xóa -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">入密碼</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">號碼:</label>
            <input type="password" class="form-control" id="idmatkhau3">
          </div>
          <div>
              <span id="span3">
                  
              </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="xacnhan3" class="btn btn-primary">確認</button>
      </div>
    </div>
  </div>
</div>

<!-- Sửa DFM -->


<form method="POST" action=""> 
<div class="modal fade" id="dfm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">進度 DFM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhaudfm" class="col-form-label">入密碼:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhaudfm">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudedfm" class="col-form-label"style="display:none;">進度(%):</label>
            <input type="number" min="0" max="100" required ="required" name="namedfm" class="form-control" id="idinputdfm"value="<?php echo $chuoi1; ?>"style="display:none;">
          </div>
          <div>
              <span id="idspandfm"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaydfm" name="submitmaydfm">確認</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
        <button type="submit" class="btn btn-primary" id="submitdfm" name="submitdfm"style="display:none;">確認</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Sửa Xuất 3DTo2D-->
<form method="POST" action=""> 
<div class="modal fade" id="id3DTo2D" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">進度 3DTo2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
          <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau3dto2d" class="col-form-label">入密碼:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhau3dto2d">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieude3dto2d" class="col-form-label"style="display:none;">進度(%):</label>
            <input type="number" min="0" max="100" required ="required" name="name3DTo2D"class="form-control" id="idinput3DTo2D"value="<?php echo $chuoi2; ?>"style="display:none;">
          </div>
          <div>
              <span id="idspan3dto2d"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
         <span class="btn btn-primary" id="submitmay3dto2d" name="submitmaydfm">確認</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

        <button type="submit" class="btn btn-primary" id="submit3dto2d" name="submit3DTo2D"style="display:none;">確認</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Sửa Gia Công Và Đặt Hàng-->
<form method="POST" action=""> 
<div class="modal fade" id="giacongvadathang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">加工，訂購</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau" class="col-form-label">入密碼:</label>
            <input type="password" required ="required" name="" class="form-control" id="matkhau">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudedathang" style="display:none;" class="col-form-label">進度(%):</label>
            <input type="number" min="0" max="100" required ="required"  style="display:none;" name="namegiacongvadathang" class="form-control" id="idinputgiacongvadathang"value="<?php echo $chuoi3; ?>">
          </div>
           <div>
              <span id="idspandathang"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaydathang" name="submitmaydathang">確認</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
    
        <button type="submit" id="submitdathang" name="submitgiacongvadathang"  style="display: none;" class="btn btn-primary">確認</button>

      </div>
    </div>
  </div>
</div>
</form>

<!-- Sửa Lắp Đặt Và Chỉnh Máy-->
<form method="POST" action=""> 
<div class="modal fade" id="lapdatvachinhmay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">組裝，調整機台</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau1" class="col-form-label">入密碼:</label>
            <input type="password" required ="required" name="" class="form-control" id="matkhau1">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudelapdat" class="col-form-label"style="display: none;">進度(%):</label>
            <input type="number" min="0" max="100" required ="required"style="display: none;" name="namelapdatvachinhmay" class="form-control" id="idinputlapdatvachinhmay"value="<?php echo $chuoi4; ?>">
          </div>
          <div>
              <span id="idspanlapdat"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaylapdat">確認</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

        <button type="submit" id="submitlapdat" name="submitlapdatvachinhmay" class="btn btn-primary"style="display: none;">確認</button>

      </div>
    </div>
  </div>
</div>
</form>


<!-- Sửa Buyoff-->
<form method="POST" action=""> 
<div class="modal fade" id="buyoff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">進度 Buyoff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau2" class="col-form-label">入密碼:</label>
            <input type="password" required ="required" name="" class="form-control" id="matkhau2">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudebuyoff" class="col-form-label"style="display: none;">進度(%):</label>
            <input type="number" min="0" max="100" required ="required" name="namebuyoff" class="form-control" id="idinputbuyoff"value="<?php echo $chuoi5; ?>"style="display: none;">
          </div>
           <div>
              <span id="idspanbuyoff"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
         <span class="btn btn-primary" id="submitmaybuyoff">確認</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

        <button type="submit" id="submitbuyoff" name="submitbuyoff" class="btn btn-primary"style="display: none;">確認</button>

      </div>
    </div>
  </div>
</div>
</form>


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
     var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
        window.location="../Controller/index.php?action=editt&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau2").classList.add("is-invalid");
      document.getElementById("span2").innerText = '密碼錯誤'
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
     var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
        window.location="../Controller/index.php?action=delete&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau3").classList.add("is-invalid");
      document.getElementById("span3").innerText = '密碼錯誤'
      document.getElementById("span3").style.color = 'red'
    }
    
}


</script>

<!-- hoan thanh 1-->



<script type="text/javascript">
    var rawList = "<?php echo $length; ?>";
    for (var i = 0; i < rawList; i++) {

    document.getElementById("submitmayhoanthanh1").addEventListener("click", myFunction);
function myFunction() {
  var x = document.getElementById("idmatkhauhoanthanh1");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh1").style.display = 'none';
      document.getElementById("submithoanthanh1").style.display = 'inline';
      document.getElementById("idspanhoanthanh1").innerText = ''
      document.getElementById("idspanhoanthanh1").style.color = ''
      document.getElementById("idmatkhauhoanthanh1").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh1").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh1").style.display = 'none';
    document.getElementById("idinputhoanthanh1").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh1").style.display = 'none';
    document.getElementById("tieudehoanthanh1").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh1").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh1").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh1").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh1").style.color = 'red'
  }
}

}

</script>



<!-- hoan thanh 2-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh2").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh2");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh2").style.display = 'none';
      document.getElementById("submithoanthanh2").style.display = 'inline';
      document.getElementById("idspanhoanthanh2").innerText = ''
      document.getElementById("idspanhoanthanh2").style.color = ''
      document.getElementById("idmatkhauhoanthanh2").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh2").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh2").style.display = 'none';
    document.getElementById("idinputhoanthanh2").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh2").style.display = 'none';
    document.getElementById("tieudehoanthanh2").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh2").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh2").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh2").style.color = 'red'
  }
}


</script>


<!-- hoan thanh 3-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh3").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh3");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh3").style.display = 'none';
      document.getElementById("submithoanthanh3").style.display = 'inline';
      document.getElementById("idspanhoanthanh3").innerText = ''
      document.getElementById("idspanhoanthanh3").style.color = ''
      document.getElementById("idmatkhauhoanthanh3").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh3").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh3").style.display = 'none';
    document.getElementById("idinputhoanthanh3").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh3").style.display = 'none';
    document.getElementById("tieudehoanthanh3").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh3").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh3").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh3").style.color = 'red'
  }
}


</script>




<!-- hoan thanh 4-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh4").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh4");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh4").style.display = 'none';
      document.getElementById("submithoanthanh4").style.display = 'inline';
      document.getElementById("idspanhoanthanh4").innerText = ''
      document.getElementById("idspanhoanthanh4").style.color = ''
      document.getElementById("idmatkhauhoanthanh4").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh4").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh4").style.display = 'none';
    document.getElementById("idinputhoanthanh4").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh4").style.display = 'none';
    document.getElementById("tieudehoanthanh4").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh4").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh4").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh4").style.color = 'red'
  }
}


</script>



<!-- hoan thanh 5-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh5").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh5");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh5").style.display = 'none';
      document.getElementById("submithoanthanh5").style.display = 'inline';
      document.getElementById("idspanhoanthanh5").innerText = ''
      document.getElementById("idspanhoanthanh5").style.color = ''
      document.getElementById("idmatkhauhoanthanh5").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh5").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh5").style.display = 'none';
    document.getElementById("idinputhoanthanh5").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh5").style.display = 'none';
    document.getElementById("tieudehoanthanh5").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh5").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh5").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh5").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh5").style.color = 'red'
  }
}


</script>



<!-- hoan thanh 6-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh6").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh6");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh6").style.display = 'none';
      document.getElementById("submithoanthanh6").style.display = 'inline';
      document.getElementById("idspanhoanthanh6").innerText = ''
      document.getElementById("idspanhoanthanh6").style.color = ''
      document.getElementById("idmatkhauhoanthanh6").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh6").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh6").style.display = 'none';
    document.getElementById("idinputhoanthanh6").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh6").style.display = 'none';
    document.getElementById("tieudehoanthanh6").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh6").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh6").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh6").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh6").style.color = 'red'
  }
}


</script>



<!-- hoan thanh 7-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh7").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh7");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh7").style.display = 'none';
      document.getElementById("submithoanthanh7").style.display = 'inline';
      document.getElementById("idspanhoanthanh7").innerText = ''
      document.getElementById("idspanhoanthanh7").style.color = ''
      document.getElementById("idmatkhauhoanthanh7").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh7").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh7").style.display = 'none';
    document.getElementById("idinputhoanthanh7").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh7").style.display = 'none';
    document.getElementById("tieudehoanthanh7").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh7").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh7").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh7").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh7").style.color = 'red'
  }
}


</script>


<!-- hoan thanh 8-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh8").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh8");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh8").style.display = 'none';
      document.getElementById("submithoanthanh8").style.display = 'inline';
      document.getElementById("idspanhoanthanh8").innerText = ''
      document.getElementById("idspanhoanthanh8").style.color = ''
      document.getElementById("idmatkhauhoanthanh8").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh8").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh8").style.display = 'none';
    document.getElementById("idinputhoanthanh8").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh8").style.display = 'none';
    document.getElementById("tieudehoanthanh8").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh8").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh8").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh8").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh8").style.color = 'red'
  }
}


</script>



<!-- hoan thanh 9-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh9").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh9");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh9").style.display = 'none';
      document.getElementById("submithoanthanh9").style.display = 'inline';
      document.getElementById("idspanhoanthanh9").innerText = ''
      document.getElementById("idspanhoanthanh9").style.color = ''
      document.getElementById("idmatkhauhoanthanh9").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh9").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh9").style.display = 'none';
    document.getElementById("idinputhoanthanh9").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh9").style.display = 'none';
    document.getElementById("tieudehoanthanh9").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh9").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh9").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh9").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh9").style.color = 'red'
  }
}


</script>


<!-- hoan thanh 10-->



<script type="text/javascript">

    document.getElementById("submitmayhoanthanh10").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhauhoanthanh10");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayhoanthanh10").style.display = 'none';
      document.getElementById("submithoanthanh10").style.display = 'inline';
      document.getElementById("idspanhoanthanh10").innerText = ''
      document.getElementById("idspanhoanthanh10").style.color = ''
      document.getElementById("idmatkhauhoanthanh10").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh10").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh10").style.display = 'none';
    document.getElementById("idinputhoanthanh10").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh10").style.display = 'none';
    document.getElementById("tieudehoanthanh10").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh10").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh10").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh10").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh10").style.color = 'red'
  }
}


</script>



<!-- giờ bắt đầu 1 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau1").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau1");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau1").style.display = 'none';
      document.getElementById("submitngaybatdau1").style.display = 'inline';
      document.getElementById("idspanngaybatdau1").innerText = ''
      document.getElementById("idspanngaybatdau1").style.color = ''
      document.getElementById("idmatkhaungaybatdau1").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau1").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau1").style.display = 'none';
    document.getElementById("idinputngaybatdau1").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau1").style.display = 'none';
    document.getElementById("tieudengaybatdau1").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau1").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau1").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau1").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau1").style.color = 'red'
  }
}


</script>



<!-- giờ bắt đầu 2 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau2").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau2");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau2").style.display = 'none';
      document.getElementById("submitngaybatdau2").style.display = 'inline';
      document.getElementById("idspanngaybatdau2").innerText = ''
      document.getElementById("idspanngaybatdau2").style.color = ''
      document.getElementById("idmatkhaungaybatdau2").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau2").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau2").style.display = 'none';
    document.getElementById("idinputngaybatdau2").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau2").style.display = 'none';
    document.getElementById("tieudengaybatdau2").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau2").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau2").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau2").style.color = 'red'
  }
}


</script>



<!-- giờ bắt đầu 3 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau3").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau3");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau3").style.display = 'none';
      document.getElementById("submitngaybatdau3").style.display = 'inline';
      document.getElementById("idspanngaybatdau3").innerText = ''
      document.getElementById("idspanngaybatdau3").style.color = ''
      document.getElementById("idmatkhaungaybatdau3").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau3").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau3").style.display = 'none';
    document.getElementById("idinputngaybatdau3").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau3").style.display = 'none';
    document.getElementById("tieudengaybatdau3").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau3").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau3").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau3").style.color = 'red'
  }
}


</script>


<!-- giờ bắt đầu 4 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau4").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau4");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau4").style.display = 'none';
      document.getElementById("submitngaybatdau4").style.display = 'inline';
      document.getElementById("idspanngaybatdau4").innerText = ''
      document.getElementById("idspanngaybatdau4").style.color = ''
      document.getElementById("idmatkhaungaybatdau4").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau4").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau4").style.display = 'none';
    document.getElementById("idinputngaybatdau4").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau4").style.display = 'none';
    document.getElementById("tieudengaybatdau4").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau4").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau4").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau4").style.color = 'red'
  }
}


</script>



<!-- giờ bắt đầu 5 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau5").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau5");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau5").style.display = 'none';
      document.getElementById("submitngaybatdau5").style.display = 'inline';
      document.getElementById("idspanngaybatdau5").innerText = ''
      document.getElementById("idspanngaybatdau5").style.color = ''
      document.getElementById("idmatkhaungaybatdau5").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau5").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau5").style.display = 'none';
    document.getElementById("idinputngaybatdau5").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau5").style.display = 'none';
    document.getElementById("tieudengaybatdau5").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau5").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau5").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau5").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau5").style.color = 'red'
  }
}


</script>


<!-- giờ bắt đầu 6 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau6").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau6");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau6").style.display = 'none';
      document.getElementById("submitngaybatdau6").style.display = 'inline';
      document.getElementById("idspanngaybatdau6").innerText = ''
      document.getElementById("idspanngaybatdau6").style.color = ''
      document.getElementById("idmatkhaungaybatdau6").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau6").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau6").style.display = 'none';
    document.getElementById("idinputngaybatdau6").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau6").style.display = 'none';
    document.getElementById("tieudengaybatdau6").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau6").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau6").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau6").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau6").style.color = 'red'
  }
}


</script>



<!-- giờ bắt đầu 7 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau7").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau7");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau7").style.display = 'none';
      document.getElementById("submitngaybatdau7").style.display = 'inline';
      document.getElementById("idspanngaybatdau7").innerText = ''
      document.getElementById("idspanngaybatdau7").style.color = ''
      document.getElementById("idmatkhaungaybatdau7").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau7").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau7").style.display = 'none';
    document.getElementById("idinputngaybatdau7").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau7").style.display = 'none';
    document.getElementById("tieudengaybatdau7").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau7").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau7").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau7").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau7").style.color = 'red'
  }
}


</script>



<!-- giờ bắt đầu 8 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau8").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau8");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau8").style.display = 'none';
      document.getElementById("submitngaybatdau8").style.display = 'inline';
      document.getElementById("idspanngaybatdau8").innerText = ''
      document.getElementById("idspanngaybatdau8").style.color = ''
      document.getElementById("idmatkhaungaybatdau8").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau8").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau8").style.display = 'none';
    document.getElementById("idinputngaybatdau8").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau8").style.display = 'none';
    document.getElementById("tieudengaybatdau8").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau8").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau8").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau8").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau8").style.color = 'red'
  }
}


</script>


<!-- giờ bắt đầu 9 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau9").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau9");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau9").style.display = 'none';
      document.getElementById("submitngaybatdau9").style.display = 'inline';
      document.getElementById("idspanngaybatdau9").innerText = ''
      document.getElementById("idspanngaybatdau9").style.color = ''
      document.getElementById("idmatkhaungaybatdau9").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau9").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau9").style.display = 'none';
    document.getElementById("idinputngaybatdau9").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau9").style.display = 'none';
    document.getElementById("tieudengaybatdau9").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau9").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau9").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau9").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau9").style.color = 'red'
  }
}


</script>



<!-- giờ bắt đầu 10 -->

<script type="text/javascript">

    document.getElementById("submitmayngaybatdau10").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaybatdau10");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaybatdau10").style.display = 'none';
      document.getElementById("submitngaybatdau10").style.display = 'inline';
      document.getElementById("idspanngaybatdau10").innerText = ''
      document.getElementById("idspanngaybatdau10").style.color = ''
      document.getElementById("idmatkhaungaybatdau10").classList.remove("form-control");
    document.getElementById("idmatkhaungaybatdau10").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaybatdau10").style.display = 'none';
    document.getElementById("idinputngaybatdau10").style.display = 'inline';
    document.getElementById("tieudematkhaungaybatdau10").style.display = 'none';
    document.getElementById("tieudengaybatdau10").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaybatdau10").classList.add("form-control");
    document.getElementById("idmatkhaungaybatdau10").classList.add("is-invalid");
      document.getElementById("idspanngaybatdau10").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaybatdau10").style.color = 'red'
  }
}


</script>




<!-- giờ Dự Kiến 1 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien1").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien1");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien1").style.display = 'none';
      document.getElementById("submitngaydukien1").style.display = 'inline';
      document.getElementById("idspanngaydukien1").innerText = ''
      document.getElementById("idspanngaydukien1").style.color = ''
      document.getElementById("idmatkhaungaydukien1").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien1").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien1").style.display = 'none';
    document.getElementById("idinputngaydukien1").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien1").style.display = 'none';
    document.getElementById("tieudengaydukien1").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien1").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien1").classList.add("is-invalid");
      document.getElementById("idspanngaydukien1").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien1").style.color = 'red'
  }
}


</script>




<!-- giờ Dự Kiến 2 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien2").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien2");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien2").style.display = 'none';
      document.getElementById("submitngaydukien2").style.display = 'inline';
      document.getElementById("idspanngaydukien2").innerText = ''
      document.getElementById("idspanngaydukien2").style.color = ''
      document.getElementById("idmatkhaungaydukien2").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien2").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien2").style.display = 'none';
    document.getElementById("idinputngaydukien2").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien2").style.display = 'none';
    document.getElementById("tieudengaydukien2").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien2").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien2").classList.add("is-invalid");
      document.getElementById("idspanngaydukien2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien2").style.color = 'red'
  }
}


</script>




<!-- giờ Dự Kiến 3 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien3").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien3");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien3").style.display = 'none';
      document.getElementById("submitngaydukien3").style.display = 'inline';
      document.getElementById("idspanngaydukien3").innerText = ''
      document.getElementById("idspanngaydukien3").style.color = ''
      document.getElementById("idmatkhaungaydukien3").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien3").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien3").style.display = 'none';
    document.getElementById("idinputngaydukien3").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien3").style.display = 'none';
    document.getElementById("tieudengaydukien3").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien3").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien3").classList.add("is-invalid");
      document.getElementById("idspanngaydukien3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien3").style.color = 'red'
  }
}


</script>




<!-- giờ Dự Kiến 4 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien4").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien4");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien4").style.display = 'none';
      document.getElementById("submitngaydukien4").style.display = 'inline';
      document.getElementById("idspanngaydukien4").innerText = ''
      document.getElementById("idspanngaydukien4").style.color = ''
      document.getElementById("idmatkhaungaydukien4").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien4").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien4").style.display = 'none';
    document.getElementById("idinputngaydukien4").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien4").style.display = 'none';
    document.getElementById("tieudengaydukien4").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien4").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien4").classList.add("is-invalid");
      document.getElementById("idspanngaydukien4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien4").style.color = 'red'
  }
}


</script>



<!-- giờ Dự Kiến 5 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien5").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien5");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien5").style.display = 'none';
      document.getElementById("submitngaydukien5").style.display = 'inline';
      document.getElementById("idspanngaydukien5").innerText = ''
      document.getElementById("idspanngaydukien5").style.color = ''
      document.getElementById("idmatkhaungaydukien5").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien5").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien5").style.display = 'none';
    document.getElementById("idinputngaydukien5").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien5").style.display = 'none';
    document.getElementById("tieudengaydukien5").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien5").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien5").classList.add("is-invalid");
      document.getElementById("idspanngaydukien5").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien5").style.color = 'red'
  }
}


</script>



<!-- giờ Dự Kiến 6 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien6").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien6");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien6").style.display = 'none';
      document.getElementById("submitngaydukien6").style.display = 'inline';
      document.getElementById("idspanngaydukien6").innerText = ''
      document.getElementById("idspanngaydukien6").style.color = ''
      document.getElementById("idmatkhaungaydukien6").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien6").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien6").style.display = 'none';
    document.getElementById("idinputngaydukien6").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien6").style.display = 'none';
    document.getElementById("tieudengaydukien6").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien6").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien6").classList.add("is-invalid");
      document.getElementById("idspanngaydukien6").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien6").style.color = 'red'
  }
}


</script>



<!-- giờ Dự Kiến 7 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien7").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien7");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien7").style.display = 'none';
      document.getElementById("submitngaydukien7").style.display = 'inline';
      document.getElementById("idspanngaydukien7").innerText = ''
      document.getElementById("idspanngaydukien7").style.color = ''
      document.getElementById("idmatkhaungaydukien7").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien7").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien7").style.display = 'none';
    document.getElementById("idinputngaydukien7").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien7").style.display = 'none';
    document.getElementById("tieudengaydukien7").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien7").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien7").classList.add("is-invalid");
      document.getElementById("idspanngaydukien7").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien7").style.color = 'red'
  }
}


</script>




<!-- giờ Dự Kiến 8 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien8").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien8");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien8").style.display = 'none';
      document.getElementById("submitngaydukien8").style.display = 'inline';
      document.getElementById("idspanngaydukien8").innerText = ''
      document.getElementById("idspanngaydukien8").style.color = ''
      document.getElementById("idmatkhaungaydukien8").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien8").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien8").style.display = 'none';
    document.getElementById("idinputngaydukien8").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien8").style.display = 'none';
    document.getElementById("tieudengaydukien8").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien8").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien8").classList.add("is-invalid");
      document.getElementById("idspanngaydukien8").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien8").style.color = 'red'
  }
}


</script>



<!-- giờ Dự Kiến 9 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien9").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien9");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien9").style.display = 'none';
      document.getElementById("submitngaydukien9").style.display = 'inline';
      document.getElementById("idspanngaydukien9").innerText = ''
      document.getElementById("idspanngaydukien9").style.color = ''
      document.getElementById("idmatkhaungaydukien9").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien9").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien9").style.display = 'none';
    document.getElementById("idinputngaydukien9").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien9").style.display = 'none';
    document.getElementById("tieudengaydukien9").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien9").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien9").classList.add("is-invalid");
      document.getElementById("idspanngaydukien9").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien9").style.color = 'red'
  }
}


</script>




<!-- giờ Dự Kiến 10 -->  

<script type="text/javascript">

    document.getElementById("submitmayngaydukien10").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaungaydukien10");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmayngaydukien10").style.display = 'none';
      document.getElementById("submitngaydukien10").style.display = 'inline';
      document.getElementById("idspanngaydukien10").innerText = ''
      document.getElementById("idspanngaydukien10").style.color = ''
      document.getElementById("idmatkhaungaydukien10").classList.remove("form-control");
    document.getElementById("idmatkhaungaydukien10").classList.remove("is-invalid");
    document.getElementById("idmatkhaungaydukien10").style.display = 'none';
    document.getElementById("idinputngaydukien10").style.display = 'inline';
    document.getElementById("tieudematkhaungaydukien10").style.display = 'none';
    document.getElementById("tieudengaydukien10").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaungaydukien10").classList.add("form-control");
    document.getElementById("idmatkhaungaydukien10").classList.add("is-invalid");
      document.getElementById("idspanngaydukien10").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanngaydukien10").style.color = 'red'
  }
}


</script>



<script type="text/javascript">
    document.getElementById("submitmaydfm").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhaudfm");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm").style.display = 'none';
      document.getElementById("submitdfm").style.display = 'inline';
      document.getElementById("idspandfm").innerText = ''
      document.getElementById("idspandfm").style.color = ''
      document.getElementById("idmatkhaudfm").classList.remove("form-control");
    document.getElementById("idmatkhaudfm").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm").style.display = 'none';
    document.getElementById("idinputdfm").style.display = 'inline';
    document.getElementById("tieudematkhaudfm").style.display = 'none';
    document.getElementById("tieudedfm").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm").classList.add("form-control");
    document.getElementById("idmatkhaudfm").classList.add("is-invalid");
      document.getElementById("idspandfm").innerText = '密碼錯誤'
      document.getElementById("idspandfm").style.color = 'red'
  }
}

</script>

<script type="text/javascript">
    document.getElementById("submitmay3dto2d").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhau3dto2d");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmay3dto2d").style.display = 'none';
      document.getElementById("submit3dto2d").style.display = 'inline';
      document.getElementById("idspan3dto2d").innerText = ''
      document.getElementById("idspan3dto2d").style.color = ''
      document.getElementById("idmatkhau3dto2d").classList.remove("form-control");
    document.getElementById("idmatkhau3dto2d").classList.remove("is-invalid");
    document.getElementById("idmatkhau3dto2d").style.display = 'none';
    document.getElementById("idinput3DTo2D").style.display = 'inline';
    document.getElementById("tieudematkhau3dto2d").style.display = 'none';
    document.getElementById("tieude3dto2d").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhau3dto2d").classList.add("form-control");
    document.getElementById("idmatkhau3dto2d").classList.add("is-invalid");
      document.getElementById("idspan3dto2d").innerText = '密碼錯誤'
      document.getElementById("idspan3dto2d").style.color = 'red'
  }
}

</script>

<script type="text/javascript">
    document.getElementById("submitmaydathang").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("matkhau");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydathang").style.display = 'none';
      document.getElementById("submitdathang").style.display = 'inline';
      document.getElementById("idspandathang").innerText = ''
      document.getElementById("idspandathang").style.color = ''
      document.getElementById("matkhau").classList.remove("form-control");
    document.getElementById("matkhau").classList.remove("is-invalid");
    document.getElementById("matkhau").style.display = 'none';
    document.getElementById("idinputgiacongvadathang").style.display = 'inline';
    document.getElementById("tieudematkhau").style.display = 'none';
    document.getElementById("tieudedathang").style.display = 'inline';
  }else{
     
    document.getElementById("matkhau").classList.add("form-control");
    document.getElementById("matkhau").classList.add("is-invalid");
      document.getElementById("idspandathang").innerText = '密碼錯誤'
      document.getElementById("idspandathang").style.color = 'red'
  }
}

</script>


<script type="text/javascript">
    document.getElementById("submitmaylapdat").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("matkhau1");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaylapdat").style.display = 'none';
      document.getElementById("submitlapdat").style.display = 'inline';
      document.getElementById("idspanlapdat").innerText = ''
      document.getElementById("idspanlapdat").style.color = ''
      document.getElementById("matkhau1").classList.remove("form-control");
    document.getElementById("matkhau1").classList.remove("is-invalid");
    document.getElementById("matkhau1").style.display = 'none';
    document.getElementById("idinputlapdatvachinhmay").style.display = 'inline';
    document.getElementById("tieudematkhau1").style.display = 'none';
    document.getElementById("tieudelapdat").style.display = 'inline';
  }else{
     
    document.getElementById("matkhau1").classList.add("form-control");
    document.getElementById("matkhau1").classList.add("is-invalid");
      document.getElementById("idspanlapdat").innerText = '密碼錯誤'
      document.getElementById("idspanlapdat").style.color = 'red'
  }
}

</script>


<script type="text/javascript">
    document.getElementById("submitmaybuyoff").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("matkhau2");
  x.value = x.value.toUpperCase();
  var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaybuyoff").style.display = 'none';
      document.getElementById("submitbuyoff").style.display = 'inline';
      document.getElementById("idspanbuyoff").innerText = ''
      document.getElementById("idspanbuyoff").style.color = ''
      document.getElementById("matkhau2").classList.remove("form-control");
    document.getElementById("matkhau2").classList.remove("is-invalid");
    document.getElementById("matkhau2").style.display = 'none';
    document.getElementById("idinputbuyoff").style.display = 'inline';
    document.getElementById("tieudematkhau2").style.display = 'none';
    document.getElementById("tieudebuyoff").style.display = 'inline';
  }else{
     
    document.getElementById("matkhau2").classList.add("form-control");
    document.getElementById("matkhau2").classList.add("is-invalid");
      document.getElementById("idspanbuyoff").innerText = '密碼錯誤'
      document.getElementById("idspanbuyoff").style.color = 'red'
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