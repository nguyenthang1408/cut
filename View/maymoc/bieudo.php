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
            $tungnguoi = 0;
            $timehoanthanh = $_POST['namehoanthanh'];
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];


            if($db->InsertTime($tabletime,$tenmay,$ngaybatdau,$ngaydukien,$tonggio,$tungnguoi,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien)){
                header('Refresh:0');
            }
        }


        if(isset($_POST['submittungnguoi'])){
            $tabletime = 'time';
            $tenmay = $dataID['tenmay'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $tungnguoi = $_POST['nametungnguoi'];
            $timehoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];

            // echo "<script type='text/javascript'>alert('$tungnguoi');</script>";

            if($db->InsertTime($tabletime,$tenmay,$ngaybatdau,$ngaydukien,$tonggio,$tungnguoi,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien)){
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
    <title>Biểu Đồ Tiến Độ</title>
 <script type="text/javascript">
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
  </script>
  <script src="../codejavascript/jq1.js"></script>
  <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <style type="text/css">

       .progress{
        border-radius: 50px;
        height:3vh;
        box-sizing: content-box;
        position: relative;
        background: #555;
        border-radius: 25px;
        border: 1px solid #333;
        box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.3);
        animation: prog 2s linear forwards;
       }
       @keyframes prog{
        0%{
         background: #f9bcca;
        }
        100%{
         background: white;
         box-shadow: 10px -5px 10px 0px rgba(0,0,0,0.6);
        }
       }
       .progress-bar > span {
          display: block;
          height: 100%;
          line-height: 3vh;
          border-top-right-radius: 8px;
          border-bottom-right-radius: 8px;
          border-top-left-radius: 20px;
          border-bottom-left-radius: 20px;
          background-color: rgb(43, 194, 83);
          background-image: linear-gradient(
            center bottom,
            rgb(43, 194, 83) 37%,
            rgb(84, 240, 84) 69%
          );
          box-shadow: inset 0 2px 9px rgba(255, 255, 255, 0.3),
            inset 0 -2px 6px rgba(0, 0, 0, 0.4);
          position: relative;
          overflow: hidden;
        }
        .progress-bar > span:after {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          background-image: linear-gradient(
            -45deg,
            rgba(255, 255, 255, 0.2) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, 0.2) 50%,
            rgba(255, 255, 255, 0.2) 75%,
            transparent 75%,
            transparent
          );
          z-index: 1;
          background-size: 100px 100px;
          animation: move 2s linear infinite;
          border-top-right-radius: 8px;
          border-bottom-right-radius: 8px;
          border-top-left-radius: 20px;
          border-bottom-left-radius: 20px;
          overflow: hidden;
        }

        @keyframes move {
          0% {
            background-position: 0 0;
          }
          100% {
            background-position: 50px 50px;
          }
        }
       .progress-bar {
       width: 0;
       animation: progress 2s ease-in-out forwards;
      }
       .progress-bar .title {
         opacity: 0;
         animation: show 2s forwards ease-in-out 0.5s;
      }
       @keyframes progress {
         from {
           width: 0;
           background: green;
        }
         to {
           width: 100%;
           background: green;
           color: black;
           font-weight: bold;
        }
      }
       @keyframes show {
         from {
           opacity: 0;
        }
         to {
           opacity: 1;
        }
      }
      #ani{
        animation: animate 1.5s linear forwards;
      }

      @keyframes animate{
        0%{
             transform: translateX(0px);
        }
        100%{
             transform: translateX(var(--g));
        }
      }
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






body {
  background-color: #cce4f0;
  width: 100vw;
  height: 50vh;
  position: relative;
  /*overflow: hidden; */}

.canvas {
  position: relative;
  width: 60vw;
  height: 15vw;
  margin: 0 auto;
  top: 0%;
  overflow: hidden; }

.loading {
  margin: 0 auto;
  position: relative;
  width: 80vw;
  height: 20px;
  top: 0%; }
  .loading h1 {
    width: 100%;
    text-align: center;
    color: red;
    font-family: 'Arvo';
    font-size: 30pt;
    height: 100%;
    letter-spacing: 6px; }

.scrolling-area {
  width: 100%;
  height: 98%;
  position: relative; }

.ground {
  width: 100%;
  height: 2%;
  z-index: 2;
  position: relative;
  background-color: black; }

.rabbit-main {
  width: 15%;
  height: 60%;
  margin: 0 auto;
  transform: translate3d(0, 0, 0) !important;
  position: relative;
  z-index: 0; }
  .rabbit-main .rabbit-body-part {
    position: absolute;
    background-color: #c41d1d; }

.rabbit-main.rabbit-floor {
  top: 40%; }
  .rabbit-main.rabbit-floor .rabbit-body {
    width: 60%;
    height: 60%;
    border-radius: 100%;
    top: 35%;
    left: 10%;
    z-index: 2;
    transform: translate3d(0, 0, 0) !important; }
  .rabbit-main.rabbit-floor .rabbit-tail {
    width: 13%;
    height: 13%;
    border-radius: 100%;
    top: 80%;
    left: 9%;
    transform: translate3d(0, 0, 0) !important; }
  .rabbit-main.rabbit-floor .rabbit-foot {
    width: 31%;
    height: 17%;
    border-radius: 100%;
    top: 88%;
    left: 38%;
    position: relative !important;
    transform: translate3d(0, 0, 0) !important; }
    .rabbit-main.rabbit-floor .rabbit-foot .foot-cover {
      background-color: #cce4f0;
      height: 75%;
      width: 110%;
      top: 40%;
      position: relative !important;
      z-index: 0 !important; }
  .rabbit-main.rabbit-floor .rabbit-head {
    width: 32%;
    height: 32%;
    border-radius: 100%;
    top: 21%;
    left: 52%;
    z-index: 2 !important;
    transform: translate3d(0, 0, 0) !important; }
  .rabbit-main.rabbit-floor .rabbit-ear {
    width: 36%;
    height: 25%;
    border-radius: 100%;
    top: 0%;
    left: 0%; }
    .rabbit-main.rabbit-floor .rabbit-ear .ear-cover {
      background-color: #cce4f0;
      height: 65%;
      width: 110%;
      top: 40%;
      position: relative !important;
      z-index: 0 !important; }
  .rabbit-main.rabbit-floor .rabbit-ear-1 {
    transform: rotate(-146deg) translate3d(0, 0, 0);
    left: 38%;
    top: 8%;
    animation: ear-1-twitch;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-floor .rabbit-ear-2 {
    transform: rotate(-130deg) translate3d(0, 0, 0);
    left: 45%;
    top: 5%;
    animation: ear-2-twitch;
    animation-duration: 1s;
    animation-iteration-count: infinite; }

@keyframes ear-1-twitch {
  0% {
    transform: rotate(-146deg); }
  25% {
    transform: rotatate(-120deg); }
  50% {
    transform: rotate(-135deg); }
  75% {
    transform: rotate(-115deg); }
  90% {
    tranform: rotate(-146deg); } }

@keyframes ear-2-twitch {
  0% {
    transform: rotate(-130deg); }
  25% {
    transform: rotatate(-110deg); }
  50% {
    transform: rotate(-120deg); }
  75% {
    transform: rotate(-115deg); }
  90% {
    transform: rotate(-146deg); } }

.egg-outer.egg-1 {
  transform: rotate(-20deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite; }

.egg-outer.egg-2 {
  transform: rotate(35deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite;
  animation-delay: 1s; }

.egg-outer.egg-3 {
  transform: rotate(-15deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite;
  animation-delay: 2s; }

.egg-outer.egg-4 {
  transform: rotate(20deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite;
  animation-delay: 3s; }

.egg-outer {
  width: 5%;
  height: 30%;
  background-color: red;
  position: absolute;
  left: 110%;
  border-radius: 50%/60% 60% 40% 40%;
  top: 70%;
  overflow: hidden; }
  .egg-outer .egg-line {
    width: 120%;
    height: 20%;
    background-color: white; }
  .egg-outer .egg-line-1 {
    background-color: #f16565; }
  .egg-outer .egg-line-2 {
    background-color: #ffab61; }
  .egg-outer .egg-line-3 {
    background-color: #fffe70; }
  .egg-outer .egg-line-4 {
    background-color: #8aff70; }
  .egg-outer .egg-line-5 {
    background-color: #7072ff; }

@keyframes egg-scroll {
  0% {
    left: 110%; }
  40% {
    left: 30%; }
  60% {
    left: 0%; }
  61% {
    left: -1%; }
  65% {
    left: -10%; }
  100% {
    left: -20%; } }

.rabbit-main.rabbit-jump {
  animation: rabbit-jump;
  animation-duration: 1s;
  animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-head {
    animation: rabbit-jump-head;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-foot {
    animation: rabbit-jump-foot;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-body {
    animation: rabbit-jump-body;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-tail {
    animation: rabbit-jump-tail;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-ear-1 {
    animation: rabbit-jump-ear-1;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-ear-2 {
    animation: rabbit-jump-ear-2;
    animation-duration: 1s;
    animation-iteration-count: infinite; }

@keyframes rabbit-jump {
  0% {
    top: 40%; }
  30% {
    top: 0%; }
  100% {
    top: 40%; } }

@keyframes rabbit-jump-foot {
  0% {
    transform: rotate(0deg);
    left: 38%;
    top: 88%; }
  10% {
    transform: rotate(30deg);
    left: 25%;
    top: 94%; }
  100% {
    transform: rotate(0deg);
    left: 38%;
    top: 88%; } }

@keyframes rabbit-jump-tail {
  0% {
    top: 80%;
    left: 9%; }
  5% {
    top: 76%;
    left: 6%; }
  10% {
    top: 73%;
    left: 4.5%; }
  15% {
    top: 68%;
    left: 3%; }
  25% {
    top: 64%;
    left: 2%; }
  40% {
    top: 68%;
    left: 3%; }
  60% {
    top: 73%;
    left: 4.5%; }
  80% {
    top: 77%;
    left: 6%; }
  100% {
    top: 80%;
    left: 9%; } }

@keyframes rabbit-jump-head {
  0% {
    top: 21%;
    left: 52%; }
  20% {
    top: 28%;
    left: 58%; }
  100% {
    top: 21%;
    left: 52%; } }

@keyframes rabbit-jump-ear-1 {
  0% {
    transform: rotate(-146deg) translate3d(0, 0, 0);
    left: 38%;
    top: 8%; }
  10% {
    transform: rotate(-150deg);
    left: 40%;
    top: 10%; }
  100% {
    transform: rotate(-146deg) translate3d(0, 0, 0);
    left: 38%;
    top: 8%; } }

@keyframes rabbit-jump-ear-2 {
  0% {
    transform: rotate(-130deg) translate3d(0, 0, 0);
    left: 45%;
    top: 5%; }
  10% {
    transform: rotate(-140deg);
    left: 43%;
    top: 7%; }
  100% {
    transform: rotate(-130deg) translate3d(0, 0, 0);
    left: 45%;
    top: 5%; } }

.dot-red {
  color: yellow;
  font-family: 'Arvo'; }

.dot-yellow {
  color: #00F020;
  font-family: 'Arvo'; }

.dot-green {
  color: red;
  font-family: 'Arvo'; }
   </style>
</head>
<body>
	<section class="packages" id="packages" style="background: #CCE4F0;">

    <div style="width: 100%;height: 70px;position: fixed;">
        <h2><a href="../Controller/index.php?action=test2#book" style="font-size: 25px;" class="btn btn-success">Trang Chủ</a></h2>   
    </div>


     <div class="canvas">
            <div class="scrolling-area">
                <div class="rabbit-main rabbit-floor rabbit-jump">
                    <div class="rabbit-body-part rabbit-body"></div>
                    <div class="rabbit-body-part rabbit-tail"></div>
                    <div class="rabbit-body-part rabbit-foot">
                        <div class="foot-cover"></div>
                    </div>
                    <div class="rabbit-body-part rabbit-head"></div>
                    <div class="rabbit-body-part rabbit-ear  rabbit-ear-1">
                        <div class="ear-cover"></div>
                    </div>
                    <div class="rabbit-body-part rabbit-ear  rabbit-ear-2">
                        <div class="ear-cover"></div>
                    </div>
                </div>
                <div class="egg-outer egg-1">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
                <div class="egg-outer egg-2">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
                <div class="egg-outer egg-3">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
                <div class="egg-outer egg-4">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
            </div>
            <div class="ground">
            </div>
        </div>
        <div class="loading" id="loading">
            <h1>LOADING</h1>
        </div>


     <!-- <div style="">
      <img src="../image/gif.gif" border="0" alt="Photobucket" height="200" width="250" id="ani" style="position: relative;top:-20px;z-index: -1;
      <?php if($phantram < 80){ ?>
      --g: <?php echo $phantram-4; ?>vw;
      <?php }else{ ?>
        --g: <?php echo $phantram-10; ?>vw;
      <?php } ?>
      "> 
    </div> -->
     
    <div style="width: 99vw;margin-top: 30px;">
      <div class="progress" style="">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $phantram; ?>" aria-valuemin="0" aria-valuemax="100" style="max-width: <?php echo $phantram; ?>%">
        <span class="title" style="font-size:30px"><?php echo $tong; ?></span>
        </div>
      </div>    
    </div>


  <div class="tiendo" >
       <div style="" data-bs-toggle="modal" data-bs-target="#dfm" class="dfm">
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
         </div>
     </div>


     <!-- <div style="" data-bs-toggle="modal" data-bs-target="#dfm" class="dfm">
      <h5 style="font-weight: bold;">DFM <br> <span style="color:red;font-weight:bold;"><?php echo $datatiendo['dfm']; ?></span></h5>
     </div>
     <div style="" data-bs-toggle="modal" data-bs-target="#id3DTo2D" data-bs-whatever="3DTo2D" class="to2d">
      <h5 style="font-weight: bold;">3D To 2D <br> <span style="color:red;font-weight:bold;"><?php echo $datatiendo['3dto2d']; ?></span></h5>
     </div>
     <div style="" data-bs-toggle="modal" data-bs-target="#giacongvadathang" data-bs-whatever="Gia Công Và Đặt Hàng" class="giacongvadathang">
      <h5 style="font-weight: bold;">Đặt Hàng Và Gia Công <br> <span style="color:red;font-weight:bold;"><?php echo $datatiendo['giacongvadathang']; ?></span></h5>
     </div>
     <div style="" data-bs-toggle="modal" data-bs-target="#lapdatvachinhmay" data-bs-whatever="Lắp Đặt Và Chỉnh Máy" class="lapdatvachinhmay">
      <h5 style="font-weight: bold;">Lắp Đặt Và Chỉnh Máy <br> <span style="color:red;font-weight:bold;"><?php echo $datatiendo['lapdatvachinhmay']; ?></span></h5>
     </div>
     <div style="" data-bs-toggle="modal" data-bs-target="#buyoff" data-bs-whatever="Buyoff" class="buyoff">
      <h5 style="font-weight: bold;">Buyoff <br> <span style="color:red;font-weight:bold;"><?php echo $datatiendo['buyoff']; ?></span></h5>
     </div>
 -->
</div>

      <div style="width: 100vw;">
        
          <div style="margin: 0 30px;height: 100vw;height: 49vh; box-shadow:7px 7px 15px rgba(121, 130, 160, 0.747);padding:30px;margin-top: 1.4%;border-radius: 30px;background: white;">
                <table class="table" style="">
              <thead>
                <tr>
                    <th style="" class="col-2">Tên Máy</th>    
                    <th style="" class="col-1">Tiến Độ</th>
                    <th style="" class="col-1">Ngày Bắt Đầu</th>
                    <th style="" class="col-1">Ngày Dự Kiến</th>
                    <th style="" class="col-1">Tổng Giờ</th>
                    <th style="" class="col-1">Giờ Từng Người(H)</th>
                    <th style="" class="col-1">Giờ Hoàn Thành(H)</th>
                    <th style="" class="col-1">Hiệu Suất(%)</th>
                    <th style="" class="col-1">Bộ Phận</th>
                    <th style="" class="col-1">Tăng Ca(H)</th>
                    <th style="" class="col-1">Thành Viên</th>
                </tr>
              </thead>
           <tbody>
            <?php for ($i=0; $i < $length; $i++) { 
                // echo "<script type='text/javascript'>alert('$length1');</script>";
            ?>
            <tr style="background: white;height: 50px;text-align:center;">
                <td style=''> <?php echo $dataID['tenmay']; ?></td>  
                <td style=''><?php echo $dataID['tiendo']; ?></td>
                <td style=''><?php echo $dataID['ngaybatdau']; ?></td>

                <td style=''><?php echo $dataID['ngaydukien']; ?></td>

                <?php if($tiendo1 == 100){ ?>
                <td style=''><?php echo $hours+1; ?></td>
                <?php }else{ ?>
                <td style=''><?php echo $hours+1; ?></td>
                <?php } ?>
                
                <td style=''>
                    <button data-bs-toggle="modal" data-bs-target="#timetungnguoi<?php echo $i; ?>" class="btn btn-primary"><!-- TG Từng Người Tự Điền -->
                    <?php 
                    $table = 'time';
                    $mathe = $m[$i];
                    $nguoithuchien = $m1[$i];
                    $tenmay = $dataID['tenmay'];
                    $ngaybatdau = $dataID['ngaybatdau'];
                    $ngaydukien = $dataID['ngaydukien'];

                       $timetungnguoi = $db->getDataTimeTungNguoi($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);

                      if($timetungnguoi[0] != 0 || $timetungnguoi[0] != null){
                        echo $timetungnguoi[0];
                      }
                      else{
                        echo 0;
                      }
                    ?>
                        
                    </button></td>

                <td style=''><button data-bs-toggle="modal" data-bs-target="#timehoanthanh<?php echo $i; ?>" class="btn btn-primary" style=""><!-- TG Hoàn Thành Tự Điền -->
                     <?php 
                    $table = 'time';
                    $mathe = $m[$i];
                    $nguoithuchien = $m1[$i];
                    $tenmay = $dataID['tenmay'];
                    $ngaybatdau = $dataID['ngaybatdau'];
                    $ngaydukien = $dataID['ngaydukien'];

                       $timehoanthanh = $db->getDataTimeHoanThanh($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);

                      if($timehoanthanh[0] != 0 || $timehoanthanh[0] != null){
                        echo $timehoanthanh[0];
                      }
                      else{
                        echo 0;
                      }
                    ?>
                </button></td>           

                <td style=''><!-- Tg Từng người - TG hoàn thành --> 
                   <?php if($timehoanthanh[0] > 0 && $timetungnguoi[0] > 0){
                       $hieusuat = floor(($timetungnguoi[0] / $timehoanthanh[0])*100);
                       echo $hieusuat.'%';
                   }else{
                    echo 0;
                   }
                   ?>
                </td>


                <td style=''><?php echo $dataID['bophan']; ?></td>
                <td style=''><!-- Tg Từng người - TG hoàn thành -->
                <?php if($timehoanthanh[0] > 0 && $timetungnguoi[0] > 0){
                       $tangca = $timehoanthanh[0] - $timetungnguoi[0];
                       echo $tangca;
                   }else{
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



<!-- THời Gian Hoàn thành 1-->


<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[0]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh" class="col-form-label tieudematkhauhoanthanh">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh" id="idmatkhauhoanthanh">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[0]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[0]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh" class="col-form-label tieudehoanthanh"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[0]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh" class="idinputhoanthanh"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh" id="submitmayhoanthanh" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh" id="submithoanthanh" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>





<!-- THời Gian Hoàn thành 2-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[1]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh2" class="col-form-label tieudematkhauhoanthanh2">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh2" id="idmatkhauhoanthanh2">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[1]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[1]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh2" class="col-form-label tieudehoanthanh2"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[1]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh2"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh2" class="idinputhoanthanh2"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh2" id="submitmayhoanthanh2" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh2" id="submithoanthanh2" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>





<!-- THời Gian Hoàn thành 3-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[2]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh3" class="col-form-label tieudematkhauhoanthanh3">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh3" id="idmatkhauhoanthanh3">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[2]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[2]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh3" class="col-form-label tieudehoanthanh3"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[2]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh3"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh3" class="idinputhoanthanh3"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh3" id="submitmayhoanthanh3" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh3" id="submithoanthanh3" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- THời Gian Hoàn thành 4-->


<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[3]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh4" class="col-form-label tieudematkhauhoanthanh4">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh4" id="idmatkhauhoanthanh4">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[3]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[3]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh4" class="col-form-label tieudehoanthanh4"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[3]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh4"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh4" class="idinputhoanthanh4"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh4" id="submitmayhoanthanh4" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh4" id="submithoanthanh4" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- THời Gian Hoàn thành 5-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[4]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh5" class="col-form-label tieudematkhauhoanthanh5">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh5" id="idmatkhauhoanthanh5">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[4]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[4]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh5" class="col-form-label tieudehoanthanh5"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[4]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh5"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh5" class="idinputhoanthanh5"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh5" id="submitmayhoanthanh5" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh5" id="submithoanthanh5" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- THời Gian Hoàn thành 6-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[5]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh6" class="col-form-label tieudematkhauhoanthanh6">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh6" id="idmatkhauhoanthanh6">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[5]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[5]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh6" class="col-form-label tieudehoanthanh6"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[5]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh6"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh6" class="idinputhoanthanh6"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh6" id="submitmayhoanthanh6" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh6" id="submithoanthanh6" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- THời Gian Hoàn thành 7-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[6]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh7" class="col-form-label tieudematkhauhoanthanh7">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh7" id="idmatkhauhoanthanh7">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[6]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[6]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh7" class="col-form-label tieudehoanthanh7"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[6]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh7"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh7" class="idinputhoanthanh7"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh7" id="submitmayhoanthanh7" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh7" id="submithoanthanh7" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>





<!-- THời Gian Hoàn thành 8-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[7]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh8" class="col-form-label tieudematkhauhoanthanh8">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh8" id="idmatkhauhoanthanh8">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[7]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[7]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh8" class="col-form-label tieudehoanthanh8"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[7]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh8"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh8" class="idinputhoanthanh8"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh8" id="submitmayhoanthanh8" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh8" id="submithoanthanh8" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- THời Gian Hoàn thành 9-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[8]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh9" class="col-form-label tieudematkhauhoanthanh9">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh9" id="idmatkhauhoanthanh9">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[8]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[8]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh9" class="col-form-label tieudehoanthanh9"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[8]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh9"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh9" class="idinputhoanthanh9"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh9" id="submitmayhoanthanh9" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh9" id="submithoanthanh9" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- THời Gian Hoàn thành 10-->

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Hoàn Thành <?php echo $m[9]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhauhoanthanh10" class="col-form-label tieudematkhauhoanthanh10">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhauhoanthanh10" id="idmatkhauhoanthanh10">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[9]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[9]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudehoanthanh10" class="col-form-label tieudehoanthanh10"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[9]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh10"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh10" class="idinputhoanthanh10"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmayhoanthanh10" id="submitmayhoanthanh10" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh10" id="submithoanthanh10" name="submithoanthanh"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- Thời Gian Điền Cho Từng Người -->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[0]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[0]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[0]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[0]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi" name="submitmaytungnguoi">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- Thời Gian Điền Cho Từng Người 2-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[1]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi2" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi2">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[1]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[1]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi2" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[1]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi2"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi2"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi2" name="submitmaytungnguoi2">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi2" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- Thời Gian Điền Cho Từng Người 3-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[2]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi3" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi3">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[2]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[2]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi3" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[2]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi3"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi3"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi3" name="submitmaytungnguoi3">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi3" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- Thời Gian Điền Cho Từng Người 4-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[3]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi4" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi4">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[3]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[3]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi4" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[3]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi4"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi4"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi4" name="submitmaytungnguoi4">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi4" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- Thời Gian Điền Cho Từng Người 5-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[4]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi5" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi5">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[4]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[4]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi5" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[4]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi5"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi5"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi5" name="submitmaytungnguoi5">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi5" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- Thời Gian Điền Cho Từng Người 6-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[5]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi6" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi6">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[5]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[5]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi6" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[5]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi6"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi6"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi6" name="submitmaytungnguoi6">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi6" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Thời Gian Điền Cho Từng Người 7-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[6]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi7" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi7">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[6]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[6]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi7" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[6]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi7"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi7"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi7" name="submitmaytungnguoi7">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi7" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Thời Gian Điền Cho Từng Người 8-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[7]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi8" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi8">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[7]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[7]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi8" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[7]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi8"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi8"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi8" name="submitmaytungnguoi8">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi8" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- Thời Gian Điền Cho Từng Người 9-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[8]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi9" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi9">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[8]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[8]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi9" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[8]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi9"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi9"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi9" name="submitmaytungnguoi9">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi9" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Thời Gian Điền Cho Từng Người 10-->



<form method="POST" action=""> 
<div class="modal fade" id="timetungnguoi9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Từng Người <?php echo $m[9]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautungnguoi10" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhautungnguoi10">


            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[9]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[9]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetungnguoi10" class="col-form-label"style="display:none;">Giờ Từng Người(Giờ) <?php echo $m1[9]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="nametungnguoi" class="form-control" id="idinputtungnguoi10"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantungnguoi10"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaytungnguoi10" name="submitmaytungnguoi10">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submittungnguoi10" name="submittungnguoi"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- edit -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Mật Khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mật Khẩu:</label>
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
        <button type="button" id="xacnhan2" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>


<!-- xóa -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Mật Khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mật Khẩu:</label>
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
        <button type="button" id="xacnhan3" class="btn btn-primary">Xác Nhận</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Tiến Độ DFM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhaudfm" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhaudfm">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudedfm" class="col-form-label"style="display:none;">Tiến Độ(%):</label>
            <input type="number" min="0" max="100" required ="required" name="namedfm" class="form-control" id="idinputdfm"value="<?php echo $chuoi1; ?>"style="display:none;">
          </div>
          <div>
              <span id="idspandfm"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaydfm" name="submitmaydfm">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" id="submitdfm" name="submitdfm"style="display:none;">Xác Nhận</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập 3DTo2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
          <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau3dto2d" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhau3dto2d">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieude3dto2d" class="col-form-label"style="display:none;">Tiến Độ(%):</label>
            <input type="number" min="0" max="100" required ="required" name="name3DTo2D"class="form-control" id="idinput3DTo2D"value="<?php echo $chuoi2; ?>"style="display:none;">
          </div>
          <div>
              <span id="idspan3dto2d"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
         <span class="btn btn-primary" id="submitmay3dto2d" name="submitmaydfm">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

        <button type="submit" class="btn btn-primary" id="submit3dto2d" name="submit3DTo2D"style="display:none;">Xác Nhận</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Gia Công Và Đặt Hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="matkhau">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudedathang" style="display:none;" class="col-form-label">Tiến Độ(%):</label>
            <input type="number" min="0" max="100" required ="required"  style="display:none;" name="namegiacongvadathang" class="form-control" id="idinputgiacongvadathang"value="<?php echo $chuoi3; ?>">
          </div>
           <div>
              <span id="idspandathang"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaydathang" name="submitmaydathang">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
    
        <button type="submit" id="submitdathang" name="submitgiacongvadathang"  style="display: none;" class="btn btn-primary">Xác Nhận</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Lắp Đặt Và Chỉnh Máy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau1" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="matkhau1">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudelapdat" class="col-form-label"style="display: none;">Tiến Độ(%):</label>
            <input type="number" min="0" max="100" required ="required"style="display: none;" name="namelapdatvachinhmay" class="form-control" id="idinputlapdatvachinhmay"value="<?php echo $chuoi4; ?>">
          </div>
          <div>
              <span id="idspanlapdat"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary" id="submitmaylapdat">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

        <button type="submit" id="submitlapdat" name="submitlapdatvachinhmay" class="btn btn-primary"style="display: none;">Xác Nhận</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Buyoff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau2" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="matkhau2">
          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudebuyoff" class="col-form-label"style="display: none;">Tiến Độ(%):</label>
            <input type="number" min="0" max="100" required ="required" name="namebuyoff" class="form-control" id="idinputbuyoff"value="<?php echo $chuoi5; ?>"style="display: none;">
          </div>
           <div>
              <span id="idspanbuyoff"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
         <span class="btn btn-primary" id="submitmaybuyoff">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

        <button type="submit" id="submitbuyoff" name="submitbuyoff" class="btn btn-primary"style="display: none;">Xác Nhận</button>

      </div>
    </div>
  </div>
</div>
</form>




<script type="text/javascript">
    var colorInc = 100 / 3;


$(function()
{
  $("#percent-box").click(function()
  {
    $(this).select();
  });
  
  $("#percent-box").ready(function()
  {
    var val = $("#percent-box").val();

    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box").val(0);
        $("#progress1 #percent1").text(0 + "%");
      }
      else $("#progress1 #percent1").text(valOrig + "%");
      
      $("#progress1").parent().removeClass();
      $("#progress1 #water1").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $("#progress1").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $("#progress1").parent().addClass("orange");
      else
        $("#progress1").parent().addClass("green");
    }
    else
    {
      $("#progress1").parent().removeClass();
      $("#progress1").parent().addClass("green");
      $("#progress1 #water1").css("top", 100 - 67 + "%");
      $("#progress1 #percent1").text(67 + "%");
      $("#percent-box").val("");
    }
  });
});

  </script>

  <script type="text/javascript">
    var colorInc = 100 / 3;


$(function()
{
  $("#percent-box2").click(function()
  {
    $(this).select();
  });
  
  $("#percent-box2").ready(function()
  {
    var val = $("#percent-box2").val();

    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box2").val(0);
        $("#progress2 #percent2").text(0 + "%");
      }
      else $("#progress2 #percent2").text(valOrig + "%");
      
      $("#progress2").parent().removeClass();
      $("#progress2 #water2").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $("#progress2").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $("#progress2").parent().addClass("orange");
      else
        $("#progress2").parent().addClass("green");
    }
    else
    {
      $("#progress2").parent().removeClass();
      $("#progress2").parent().addClass("green");
      $("#progress2 #water2").css("top", 100 - 67 + "%");
      $("#progress2 #percent2").text(67 + "%");
      $("#percent-box2").val("");
    }
  });
});

  </script>


  <script type="text/javascript">
    var colorInc = 100 / 3;


$(function()
{
  $("#percent-box3").click(function()
  {
    $(this).select();
  });
  
  $("#percent-box3").ready(function()
  {
    var val = $("#percent-box3").val();

    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box3").val(0);
        $("#progress3 #percent3").text(0 + "%");
      }
      else $("#progress3 #percent3").text(valOrig + "%");
      
      $("#progress3").parent().removeClass();
      $("#progress3 #water3").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $("#progress3").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $("#progress3").parent().addClass("orange");
      else
        $("#progress3").parent().addClass("green");
    }
    else
    {
      $("#progress3").parent().removeClass();
      $("#progress3").parent().addClass("green");
      $("#progress3 #water3").css("top", 100 - 67 + "%");
      $("#progress3 #percent3").text(67 + "%");
      $("#percent-box3").val("");
    }
  });
});

  </script>


    <script type="text/javascript">
    var colorInc = 100 / 3;


$(function()
{
  $("#percent-box4").click(function()
  {
    $(this).select();
  });
  
  $("#percent-box4").ready(function()
  {
    var val = $("#percent-box4").val();

    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box4").val(0);
        $("#progress4 #percent4").text(0 + "%");
      }
      else $("#progress4 #percent4").text(valOrig + "%");
      
      $("#progress4").parent().removeClass();
      $("#progress4 #water4").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $("#progress4").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $("#progress4").parent().addClass("orange");
      else
        $("#progress4").parent().addClass("green");
    }
    else
    {
      $("#progress4").parent().removeClass();
      $("#progress4").parent().addClass("green");
      $("#progress4 #water4").css("top", 100 - 67 + "%");
      $("#progress4 #percent4").text(67 + "%");
      $("#percent-box4").val("");
    }
  });
});

  </script>
 


   <script type="text/javascript">
    var colorInc = 100 / 3;


$(function()
{
  $("#percent-box5").click(function()
  {
    $(this).select();
  });
  
  $("#percent-box5").ready(function()
  {
    var val = $("#percent-box5").val();

    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box5").val(0);
        $("#progress5 #percent5").text(0 + "%");
      }
      else $("#progress5 #percent5").text(valOrig + "%");
      
      $("#progress5").parent().removeClass();
      $("#progress5 #water5").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $("#progress5").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $("#progress5").parent().addClass("orange");
      else
        $("#progress5").parent().addClass("green");
    }
    else
    {
      $("#progress5").parent().removeClass();
      $("#progress5").parent().addClass("green");
      $("#progress5 #water5").css("top", 100 - 67 + "%");
      $("#progress5 #percent5").text(67 + "%");
      $("#percent-box5").val("");
    }
  });
});

  </script>



<script type="text/javascript">
    var colorInc = 100 / 3;


$(function()
{
  $("#percent-box").click(function()
  {
    $(this).select();
  });
  
  $("#percent-box").ready(function()
  {
    var val = $("#percent-box").val();

    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box").val(0);
        $("#progress1 #percent1").text(0 + "%");
      }
      else $("#progress1 #percent1").text(valOrig + "%");
      
      $("#progress1").parent().removeClass();
      $("#progress1 #water1").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $("#progress1").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $("#progress1").parent().addClass("orange");
      else
        $("#progress1").parent().addClass("green");
    }
    else
    {
      $("#progress1").parent().removeClass();
      $("#progress1").parent().addClass("green");
      $("#progress1 #water1").css("top", 100 - 67 + "%");
      $("#progress1 #percent1").text(67 + "%");
      $("#percent-box").val("");
    }
  });
});

  </script>




<script type="text/javascript">
    document.getElementById("xacnhan2").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau2");
     var y = document.getElementById("span2");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1]; ?>'){
        window.location="../Controller/index.php?action=editt&id=<?php echo $dataID['id']; ?>";
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

<!-- hoan thanh 1-->



<script type="text/javascript">
    var rawList = "<?php echo $length; ?>";
    for (var i = 0; i < rawList; i++) {

    document.getElementById("submitmayhoanthanh").addEventListener("click", myFunction);
function myFunction() {
  var x = document.getElementById("idmatkhauhoanthanh");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmayhoanthanh").style.display = 'none';
      document.getElementById("submithoanthanh").style.display = 'inline';
      document.getElementById("idspanhoanthanh").innerText = ''
      document.getElementById("idspanhoanthanh").style.color = ''
      document.getElementById("idmatkhauhoanthanh").classList.remove("form-control");
    document.getElementById("idmatkhauhoanthanh").classList.remove("is-invalid");
    document.getElementById("idmatkhauhoanthanh").style.display = 'none';
    document.getElementById("idinputhoanthanh").style.display = 'inline';
    document.getElementById("tieudematkhauhoanthanh").style.display = 'none';
    document.getElementById("tieudehoanthanh").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhauhoanthanh").classList.add("form-control");
    document.getElementById("idmatkhauhoanthanh").classList.add("is-invalid");
      document.getElementById("idspanhoanthanh").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanhoanthanh").style.color = 'red'
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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



<!-- Từng Người -->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi").style.display = 'none';
      document.getElementById("submittungnguoi").style.display = 'inline';
      document.getElementById("idspantungnguoi").innerText = ''
      document.getElementById("idspantungnguoi").style.color = ''
      document.getElementById("idmatkhautungnguoi").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi").style.display = 'none';
    document.getElementById("idinputtungnguoi").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi").style.display = 'none';
    document.getElementById("tieudetungnguoi").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi").classList.add("is-invalid");
      document.getElementById("idspantungnguoi").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi").style.color = 'red'
  }
}

</script>



<!-- Từng Người 2-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi2").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi2");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi2").style.display = 'none';
      document.getElementById("submittungnguoi2").style.display = 'inline';
      document.getElementById("idspantungnguoi2").innerText = ''
      document.getElementById("idspantungnguoi2").style.color = ''
      document.getElementById("idmatkhautungnguoi2").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi2").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi2").style.display = 'none';
    document.getElementById("idinputtungnguoi2").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi2").style.display = 'none';
    document.getElementById("tieudetungnguoi2").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi2").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi2").classList.add("is-invalid");
      document.getElementById("idspantungnguoi2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi2").style.color = 'red'
  }
}

</script>


<!-- Từng Người 3-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi3").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi3");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi3").style.display = 'none';
      document.getElementById("submittungnguoi3").style.display = 'inline';
      document.getElementById("idspantungnguoi3").innerText = ''
      document.getElementById("idspantungnguoi3").style.color = ''
      document.getElementById("idmatkhautungnguoi3").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi3").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi3").style.display = 'none';
    document.getElementById("idinputtungnguoi3").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi3").style.display = 'none';
    document.getElementById("tieudetungnguoi3").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi3").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi3").classList.add("is-invalid");
      document.getElementById("idspantungnguoi3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi3").style.color = 'red'
  }
}

</script>



<!-- Từng Người 4-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi4").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi4");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi4").style.display = 'none';
      document.getElementById("submittungnguoi4").style.display = 'inline';
      document.getElementById("idspantungnguoi4").innerText = ''
      document.getElementById("idspantungnguoi4").style.color = ''
      document.getElementById("idmatkhautungnguoi4").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi4").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi4").style.display = 'none';
    document.getElementById("idinputtungnguoi4").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi4").style.display = 'none';
    document.getElementById("tieudetungnguoi4").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi4").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi4").classList.add("is-invalid");
      document.getElementById("idspantungnguoi4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi4").style.color = 'red'
  }
}

</script>



<!-- Từng Người 5-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi5").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi5");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi5").style.display = 'none';
      document.getElementById("submittungnguoi5").style.display = 'inline';
      document.getElementById("idspantungnguoi5").innerText = ''
      document.getElementById("idspantungnguoi5").style.color = ''
      document.getElementById("idmatkhautungnguoi5").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi5").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi5").style.display = 'none';
    document.getElementById("idinputtungnguoi5").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi5").style.display = 'none';
    document.getElementById("tieudetungnguoi5").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi5").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi5").classList.add("is-invalid");
      document.getElementById("idspantungnguoi5").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi5").style.color = 'red'
  }
}

</script>


<!-- Từng Người 6-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi6").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi6");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi6").style.display = 'none';
      document.getElementById("submittungnguoi6").style.display = 'inline';
      document.getElementById("idspantungnguoi6").innerText = ''
      document.getElementById("idspantungnguoi6").style.color = ''
      document.getElementById("idmatkhautungnguoi6").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi6").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi6").style.display = 'none';
    document.getElementById("idinputtungnguoi6").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi6").style.display = 'none';
    document.getElementById("tieudetungnguoi6").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi6").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi6").classList.add("is-invalid");
      document.getElementById("idspantungnguoi6").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi6").style.color = 'red'
  }
}

</script>


<!-- Từng Người 7-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi7").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi7");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi7").style.display = 'none';
      document.getElementById("submittungnguoi7").style.display = 'inline';
      document.getElementById("idspantungnguoi7").innerText = ''
      document.getElementById("idspantungnguoi7").style.color = ''
      document.getElementById("idmatkhautungnguoi7").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi7").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi7").style.display = 'none';
    document.getElementById("idinputtungnguoi7").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi7").style.display = 'none';
    document.getElementById("tieudetungnguoi7").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi7").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi7").classList.add("is-invalid");
      document.getElementById("idspantungnguoi7").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi7").style.color = 'red'
  }
}

</script>



<!-- Từng Người 8-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi8").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi8");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi8").style.display = 'none';
      document.getElementById("submittungnguoi8").style.display = 'inline';
      document.getElementById("idspantungnguoi8").innerText = ''
      document.getElementById("idspantungnguoi8").style.color = ''
      document.getElementById("idmatkhautungnguoi8").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi8").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi8").style.display = 'none';
    document.getElementById("idinputtungnguoi8").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi8").style.display = 'none';
    document.getElementById("tieudetungnguoi8").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi8").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi8").classList.add("is-invalid");
      document.getElementById("idspantungnguoi8").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi8").style.color = 'red'
  }
}

</script>



<!-- Từng Người 9-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi9").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi9");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi9").style.display = 'none';
      document.getElementById("submittungnguoi9").style.display = 'inline';
      document.getElementById("idspantungnguoi9").innerText = ''
      document.getElementById("idspantungnguoi9").style.color = ''
      document.getElementById("idmatkhautungnguoi9").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi9").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi9").style.display = 'none';
    document.getElementById("idinputtungnguoi9").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi9").style.display = 'none';
    document.getElementById("tieudetungnguoi9").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi9").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi9").classList.add("is-invalid");
      document.getElementById("idspantungnguoi9").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi9").style.color = 'red'
  }
}

</script>



<!-- Từng Người 10-->

<script type="text/javascript">
    document.getElementById("submitmaytungnguoi10").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhautungnguoi10");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
      document.getElementById("submitmaytungnguoi10").style.display = 'none';
      document.getElementById("submittungnguoi10").style.display = 'inline';
      document.getElementById("idspantungnguoi10").innerText = ''
      document.getElementById("idspantungnguoi10").style.color = ''
      document.getElementById("idmatkhautungnguoi10").classList.remove("form-control");
    document.getElementById("idmatkhautungnguoi10").classList.remove("is-invalid");
    document.getElementById("idmatkhautungnguoi10").style.display = 'none';
    document.getElementById("idinputtungnguoi10").style.display = 'inline';
    document.getElementById("tieudematkhautungnguoi10").style.display = 'none';
    document.getElementById("tieudetungnguoi10").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautungnguoi10").classList.add("form-control");
    document.getElementById("idmatkhautungnguoi10").classList.add("is-invalid");
      document.getElementById("idspantungnguoi10").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantungnguoi10").style.color = 'red'
  }
}

</script>




<script type="text/javascript">
    document.getElementById("submitmaydfm").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhaudfm");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
      document.getElementById("idspandfm").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm").style.color = 'red'
  }
}

</script>

<script type="text/javascript">
    document.getElementById("submitmay3dto2d").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("idmatkhau3dto2d");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
      document.getElementById("idspan3dto2d").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspan3dto2d").style.color = 'red'
  }
}

</script>

<script type="text/javascript">
    document.getElementById("submitmaydathang").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("matkhau");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
      document.getElementById("idspandathang").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandathang").style.color = 'red'
  }
}

</script>


<script type="text/javascript">
    document.getElementById("submitmaylapdat").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("matkhau1");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
      document.getElementById("idspanlapdat").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanlapdat").style.color = 'red'
  }
}

</script>


<script type="text/javascript">
    document.getElementById("submitmaybuyoff").addEventListener("click", myFunction);

function myFunction() {
  var x = document.getElementById("matkhau2");
  x.value = x.value.toUpperCase();
  if((x.value == '<?php echo $matkhau1[1]; ?>')){
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
      document.getElementById("idspanbuyoff").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanbuyoff").style.color = 'red'
  }
}

</script>



        <script type="text/javascript">
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

        </script>



</body>
</html>