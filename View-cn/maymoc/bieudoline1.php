<?php 

include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

if(isset($_GET['id'])){
           $id = $_GET['id'];
           $table = "tiendomaymoc1";
           $dataID = $db->getDataID($table,$id);

        $bophan = $dataID['bophan'];
        $tenline = $dataID['tenline'];
        $tablee = 'tiendo1';
        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];
        $datatiendo = $db->getDatatiendo($tablee,$tenmay,$ngaybatdau);

       }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $table = 'tiendomaymoc1';
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


        $tablee = 'tiendo1';
        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];
        $tenline = $dataID['tenline'];
        $datatiendo = $db->getDatatiendo($tablee,$tenmay,$ngaybatdau);

        $tablee1 = 'tiendoquydinh1';
        $datatiendo1 = $db->getDatatiendo1($tablee1,$tenmay,$ngaybatdau);
        

        $chuoidau = $dataID['tiendo'];
        $chuoi = substr($chuoidau, 0, -1);

        $dau = $datatiendo['dfm'];
        $ch = substr($dau, 0, -1);
        $chuoidau1 = $datatiendo['dfm'];
        $chuoi1 = substr($chuoidau1, 0, -1);
        $tong1 = (($ch*20)/100);

        $dau1 = $datatiendo['3dto2d'];
        $ch1 = substr($dau1, 0, -1);
        $chuoidau2 = $datatiendo['3dto2d'];
        $chuoi2 = substr($chuoidau2, 0, -1);
        $tong2 = (($ch1*20)/100);
        
        $dau2 = $datatiendo['giacongvadathang'];
        $ch2 = substr($dau2, 0, -1);
        $chuoidau3 = $datatiendo['giacongvadathang'];
        $chuoi3 = substr($chuoidau3, 0, -1);
        $tong3 = (($ch2*20)/100);
        
        $dau3 = $datatiendo['lapdatvachinhmay'];
        $ch3 = substr($dau3, 0, -1);
        $chuoidau4 = $datatiendo['lapdatvachinhmay'];
        $chuoi4 = substr($chuoidau4, 0, -1);
        $tong4 = (($ch3*20)/100);
        
        $dau4 = $datatiendo['buyoff'];
        $ch4 = substr($dau4, 0, -1);
        $chuoidau5 = $datatiendo['buyoff'];
        $chuoi5 = substr($chuoidau5, 0, -1);
        $tong5 = (($ch4*20)/100);
        


        $phantram = ($tong1+$tong2+$tong3+$tong4+$tong5);
        $tong = $phantram.'%';
        $tong100 = $phantram/10;
        $tong101 = $tong100.'%';
        $db->UpdateTienDo1($tenmay,$tenline,$tong);
        


        $date1 = $ngaybatdau;
        $date2 = $ngaydukien;
        $diff = abs(strtotime($date2) - strtotime($date1));
        $hours = $diff / (60 * 60);

        $tiendo = $dataID['tiendo'];
        $tiendo1 = substr($tiendo, 0, -1);

        $ngayhoanthanh =  date("Y-m-d");   
           

        $date3 = $ngaybatdau;
        $date4 = $ngayhoanthanh;
        $diff1 = abs(strtotime($date4) - strtotime($date3));
        $hours1 = $diff1 / (60 * 60);

        $mathe = $dataID['mathe'];
        $ma = substr($mathe, 0, -8);
        $length = floor(strlen($mathe)/8);
        $str = str_replace( '-', '', $mathe );
        $m = array();
        $m = explode('-', $mathe);



         if(isset($_POST['submitdfm']))
        {
        $tentiendo = 'dfm';
        $tiendo = $_POST['namedfm'].'%';
        if($db->Updattiendo1($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau,$tenline)){

            $tabledatatiendo = $db->getDataTableTienDo($tenmay,$ngaybatdau,$tenline);
            
                 $dfm = $tabledatatiendo['dfm'];
                $dfm1 = substr($dfm, 0, -1);

                $to2d = $tabledatatiendo['3dto2d'];
                $to2d1 = substr($to2d, 0, -1);

                $giacongvadathang = $tabledatatiendo['giacongvadathang'];
                $giacongvadathang1 = substr($giacongvadathang, 0, -1);

                $lapdatvachinhmay = $tabledatatiendo['lapdatvachinhmay'];
                $lapdatvachinhmay1 = substr($lapdatvachinhmay, 0, -1);

                $buyoff = $tabledatatiendo['buyoff'];
                $buyoff1 = substr($buyoff, 0, -1);
           

            $tongtong = ($dfm1 + $to2d1 + $giacongvadathang1 + $lapdatvachinhmay1 + $buyoff1)/5;

              if($tongtong == 100)
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

                        $tonghieusuat = floor($sum/$count1).'%';

                        $db->UpdatehieusuatMaThe($nhanvien,$tonghieusuat,$mathe);
                    }  
                } 
            header('Refresh:0');
        }
        }
        if(isset($_POST['submit3DTo2D']))
        {
            $tentiendo = '3dto2d';
            $tiendo = $_POST['name3DTo2D'].'%';
            if($db->Updattiendo1($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau,$tenline)){

                $tabledatatiendo = $db->getDataTableTienDo($tenmay,$ngaybatdau,$tenline);
            
                 $dfm = $tabledatatiendo['dfm'];
                $dfm1 = substr($dfm, 0, -1);

                $to2d = $tabledatatiendo['3dto2d'];
                $to2d1 = substr($to2d, 0, -1);

                $giacongvadathang = $tabledatatiendo['giacongvadathang'];
                $giacongvadathang1 = substr($giacongvadathang, 0, -1);

                $lapdatvachinhmay = $tabledatatiendo['lapdatvachinhmay'];
                $lapdatvachinhmay1 = substr($lapdatvachinhmay, 0, -1);

                $buyoff = $tabledatatiendo['buyoff'];
                $buyoff1 = substr($buyoff, 0, -1);
           

            $tongtong = ($dfm1 + $to2d1 + $giacongvadathang1 + $lapdatvachinhmay1 + $buyoff1)/5;

                if($tongtong == 100)
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

                        $tonghieusuat = floor($sum/$count1).'%';

                        $db->UpdatehieusuatMaThe($nhanvien,$tonghieusuat,$mathe);
                    }  
                }            
                header('Refresh:0');
               }

        }

         
        if(isset($_POST['submitgiacongvadathang']))
        {
        $tentiendo = 'giacongvadathang';
        $tiendo = $_POST['namegiacongvadathang'].'%';
        if($db->Updattiendo1($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau,$tenline)){

            $tabledatatiendo = $db->getDataTableTienDo($tenmay,$ngaybatdau,$tenline);
            
                 $dfm = $tabledatatiendo['dfm'];
                $dfm1 = substr($dfm, 0, -1);

                $to2d = $tabledatatiendo['3dto2d'];
                $to2d1 = substr($to2d, 0, -1);

                $giacongvadathang = $tabledatatiendo['giacongvadathang'];
                $giacongvadathang1 = substr($giacongvadathang, 0, -1);

                $lapdatvachinhmay = $tabledatatiendo['lapdatvachinhmay'];
                $lapdatvachinhmay1 = substr($lapdatvachinhmay, 0, -1);

                $buyoff = $tabledatatiendo['buyoff'];
                $buyoff1 = substr($buyoff, 0, -1);
           

            $tongtong = ($dfm1 + $to2d1 + $giacongvadathang1 + $lapdatvachinhmay1 + $buyoff1)/5;

            if($tongtong == 100)
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

                        $tonghieusuat = floor($sum/$count1).'%';

                        $db->UpdatehieusuatMaThe($nhanvien,$tonghieusuat,$mathe);
                    }  
                } 
            header('Refresh:0');
        }
        }

        if(isset($_POST['submitlapdatvachinhmay']))
        {
        $tentiendo = 'lapdatvachinhmay';
        $tiendo = $_POST['namelapdatvachinhmay'].'%';
        if($db->Updattiendo1($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau,$tenline)){

            $tabledatatiendo = $db->getDataTableTienDo($tenmay,$ngaybatdau,$tenline);
            
                 $dfm = $tabledatatiendo['dfm'];
                $dfm1 = substr($dfm, 0, -1);

                $to2d = $tabledatatiendo['3dto2d'];
                $to2d1 = substr($to2d, 0, -1);

                $giacongvadathang = $tabledatatiendo['giacongvadathang'];
                $giacongvadathang1 = substr($giacongvadathang, 0, -1);

                $lapdatvachinhmay = $tabledatatiendo['lapdatvachinhmay'];
                $lapdatvachinhmay1 = substr($lapdatvachinhmay, 0, -1);

                $buyoff = $tabledatatiendo['buyoff'];
                $buyoff1 = substr($buyoff, 0, -1);
           

            $tongtong = ($dfm1 + $to2d1 + $giacongvadathang1 + $lapdatvachinhmay1 + $buyoff1)/5;


            if($tongtong == 100)
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

                        $tonghieusuat = floor($sum/$count1).'%';

                        $db->UpdatehieusuatMaThe($nhanvien,$tonghieusuat,$mathe);
                    }  
                } 
            header('Refresh:0');
        }
        }
        
        if(isset($_POST['submitbuyoff']))
        {
        $tentiendo = 'buyoff';
        $tiendo = $_POST['namebuyoff'].'%';
        if($db->Updattiendo1($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau,$tenline)){

            $tabledatatiendo = $db->getDataTableTienDo($tenmay,$ngaybatdau,$tenline);
            
                 $dfm = $tabledatatiendo['dfm'];
                $dfm1 = substr($dfm, 0, -1);

                $to2d = $tabledatatiendo['3dto2d'];
                $to2d1 = substr($to2d, 0, -1);

                $giacongvadathang = $tabledatatiendo['giacongvadathang'];
                $giacongvadathang1 = substr($giacongvadathang, 0, -1);

                $lapdatvachinhmay = $tabledatatiendo['lapdatvachinhmay'];
                $lapdatvachinhmay1 = substr($lapdatvachinhmay, 0, -1);

                $buyoff = $tabledatatiendo['buyoff'];
                $buyoff1 = substr($buyoff, 0, -1);
           

            $tongtong = ($dfm1 + $to2d1 + $giacongvadathang1 + $lapdatvachinhmay1 + $buyoff1)/5;


            if($tongtong == 100)
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

                        $tonghieusuat = floor($sum/$count1).'%';

                        $db->UpdatehieusuatMaThe($nhanvien,$tonghieusuat,$mathe);
                    }  
                }  
            header('Refresh:0');
        }
        }

        $hoanthanh1 = $dataID['ngayhoanthanh'];
        $tabledatatiendo = $db->getDataTableTienDo($tenmay,$ngaybatdau,$tenline);
            
                 $dfm = $tabledatatiendo['dfm'];
                $dfm1 = substr($dfm, 0, -1);

                $to2d = $tabledatatiendo['3dto2d'];
                $to2d1 = substr($to2d, 0, -1);

                $giacongvadathang = $tabledatatiendo['giacongvadathang'];
                $giacongvadathang1 = substr($giacongvadathang, 0, -1);

                $lapdatvachinhmay = $tabledatatiendo['lapdatvachinhmay'];
                $lapdatvachinhmay1 = substr($lapdatvachinhmay, 0, -1);

                $buyoff = $tabledatatiendo['buyoff'];
                $buyoff1 = substr($buyoff, 0, -1);
           

            $tongtong = ($dfm1 + $to2d1 + $giacongvadathang1 + $lapdatvachinhmay1 + $buyoff1)/5;
        if($tongtong == 100&&$hoanthanh1=='')
        {
            $nhanvien = 'nhanvien';
                  $db->Updatehoanthanh($table,$ngayhoanthanh,$id);
                  $hieusuat = floor((100 * $hours) / $hours1);
                  $xuat = $hieusuat.'%';
                  $db->Updatehieusuat($table,$xuat,$id);
        
                  for ($i=0; $i < $length; $i++) { 
                        $tablehieusuat = 'hieusuat';
                        $mathe = $m[$i];
                        // $db->InsertHieuSuat($tablehieusuat,$mathe,$hieusuat,$tenmay,$ngaybatdau);
                        $sumhieusuat = $db->getSumHieuSuat($tablehieusuat,$mathe);
                        $sum = $sumhieusuat['hieusuat'];
                        $counthieusuat = $db->getCountHieuSuat($tablehieusuat,$mathe);
                        $count1 = $counthieusuat['count'];

                        $tonghieusuat = floor($sum/$count1).'%';

                        $db->UpdatehieusuatMaThe($nhanvien,$tonghieusuat,$mathe);
                    } 
                    header('Refresh:0');
        }


if(isset($_GET['id'])){
           $id = $_GET['id'];
           $table = "tiendomaymoc1";
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

$tableline = 'tiendomaymoc1';
$line = $db->getDataLineMayMoc($tableline,$tenline,$bophan);
$mang = array();
$l = 0;
foreach ($line as $keykey) {
    $l++;
    $mang[$l] = $keykey['tiendo'];
}

$a1 = $mang[1];
$b1 = substr($a1, 0, -1);

$a2 = $mang[2];
$b2 = substr($a2, 0, -1);

$a3 = $mang[3];
$b3 = substr($a3, 0, -1);

$a4 = $mang[4];
$b4 = substr($a4, 0, -1);

$a5 = $mang[5];
$b5 = substr($a5, 0, -1);

$a6 = $mang[6];
$b6 = substr($a6, 0, -1);

$a7 = $mang[7];
$b7 = substr($a7, 0, -1);

$a8 = $mang[8];
$b8 = substr($a8, 0, -1);

$a9 = $mang[9];
$b9 = substr($a9, 0, -1);

$a10 = $mang[10];
$b10 = substr($a10, 0, -1);






$tong102 = $b1 + $b2 + $b3 + $b4 + $b5 + $b6 + $b7 + $b8 + $b9 + $b10;
$tong103 = $tong102/10;
$tong104 = $tong103.'%';



$db->UpdateTienDo2($tenline,$bophan,$tong104);
  

?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../codejavascript/script.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.min.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.react.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <script type="text/javascript" src="../canvasjs/jquery.canvasjs.min.js"></script>
    <title> VN cable 自動化</title>
 <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
    animationEnabled: true,
    exportEnabled: true,
    zoomEnabled: true,
    theme: "light1", 
      title:{
        text: "工作進度表 <?php echo $tenmay; ?> <?php echo '(' ?><?php echo $tenline; ?><?php echo ')' ?>",
        fontFamily: "Times New Roman",
         fontSize: 50,  
      }, 
    axisX: {
    title: '时间',
    valueFormatString: "D-MM-YYYY",
    labelAngle: -30
    },
          axisY:{
        title: '進度(%)',
        minimum: 1,
        maximum: 100
    },  
      data: [{ 
        type: "line", //change type to bar, line, area, pie, etc
        indexLabel: "{x}, {y}",//Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        showInLegend: true,
        name: "图表",
        legendText: "預期日期",
        indexLabelPlacement: "outside",        
        dataPoints: [
        
        
        ]
      },{        
               
        type: "line",
		showInLegend: true,
		name: "今天 <?php echo $tenmay; ?>",
		// lineDashType: "dash",
        xValueFormatString: "DD-MM-YYYY",
		yValueFormatString: "#,##0.0\"%\"",
        dataPoints: [
        { x: new Date(<?php echo $nambatdau; ?>, <?php echo $thangbatdau-1; ?>, <?php echo $catngay; ?>), y: 0 , indexLabel: "结束日" },
        { x: new Date(<?php echo $namhientai; ?>, <?php echo $thanghientai-1; ?>, <?php echo $ngayhientai; ?>), y: <?php echo $chuoi; ?>, indexLabel: "今天 <?php echo $chuoi.'%'; ?>" },
        { x: new Date(<?php echo $namdukien; ?>, <?php echo $thangdukien-1; ?>, <?php echo $ngay1; ?>), y: 100 , indexLabel: "預期日期" }
        ]
      }
      ]
    });

    chart.render();
  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <style type="text/css">
    .progress{
        border-radius: 50px;
        height:5vh;
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
         width: 150px;
         height: 120px;
         border-radius: 50%;
         overflow: hidden;
         text-align: center;
         display: flex;
         cursor: pointer;
         justify-content: center;
         align-items: center;
         border: 3px solid #333;
         background: #add8e6;
         box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -moz-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -webkit-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -o-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  border-radius:100px;
      }
      .to2d{
        width: 150px;
         height: 120px;
         border-radius: 50%;
         overflow: hidden;
         text-align: center;
         display: flex;
         cursor: pointer;
         justify-content: center;
         align-items: center;
         border: 3px solid #333;
         background: #add8e6;
         box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -moz-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -webkit-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -o-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  border-radius:100px;
      }
      .giacongvadathang{
         width: 150px;
         height: 120px;
         border-radius: 50%;
         overflow: hidden;
         text-align: center;
         display: flex;
         justify-content: center;
         cursor: pointer;
         align-items: center;
         border: 3px solid #333;
         background: #add8e6;
         box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -moz-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -webkit-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -o-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  border-radius:100px;
      }
      .lapdatvachinhmay{
         width: 150px;
         height: 120px;
         border-radius: 50%;
         overflow: hidden;
         text-align: center;
         display: flex;
         justify-content: center;
         cursor: pointer;
         align-items: center;
         border: 3px solid #333;
         background: #add8e6;
         box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -moz-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -webkit-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -o-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  border-radius:100px;
      }
      .buyoff{
         width: 150px;
         height: 120px;
         border-radius: 50%;
         overflow: hidden;
         text-align: center;
         display: flex;
         cursor: pointer;
         justify-content: center;
         align-items: center;
         border: 3px solid #333;
         background: #add8e6;
         box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -moz-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -webkit-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  -o-box-shadow: 10px -10px  rgba(0,0,0,0.6);
  border-radius:100px;
      }
</style>
</head>
<body>
	<section class="packages" id="packages">

    <div style="width: 100%;height: 70px;">
        <h2><a href="../Controller/index.php?action=test2-cn#book" style="font-size: 25px;" class="btn btn-success">菜單</a></h2> 
    </div>
     <div class="box-container" style="">
        <div id="chartContainer" style="height: 400px; width: 100%;">
        </div>
     </div>

     <div>
      <img src="../image/gif.gif" border="0" alt="Photobucket" height="200" width="250" id="ani" style="position: relative;top:-20px;z-index: -1;--g: <?php echo $phantram-10; ?>vw;">
    </div>
     
    <div style="width: 99vw;margin-top: -50px;">
      <div class="progress" style="">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $phantram; ?>" aria-valuemin="0" aria-valuemax="100" style="max-width: <?php echo $phantram; ?>%">
        <span class="title" style="font-size:30px"><?php echo $tong; ?></span>
        </div>
      </div>    
    </div>


  <div class="tiendo" >
     <div style="" data-bs-toggle="modal" data-bs-target="#dfm" class="dfm">
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

</div>


      <div style="width: 100%; height: 600px;overflow-x: auto;overflow-y: 300px; margin-top: 10px;" class="table" id="tableselectdata" style="">
        <div style="">
            <h2 style="text-align: center;">進度</h2>
        </div>
        
         <table style="margin-top: 1%;width: 100%;">
                  <thead>
                    <tr style="text-align:center;background: #ffed86;">
                      <th scope="col" style="border: 1px solid;font-size: 20px;">#</th>
                      <th scope="col" style="border: 1px solid;font-size: 20px;">DFM</th>
                      <th scope="col" style="border: 1px solid;font-size: 20px;">3D To 2D</th>
                      <th scope="col" style="border: 1px solid;font-size: 20px;">加工,訂購</th>
                      <th scope="col" style="border: 1px solid;font-size: 20px;">組裝，調整機台</th>
                      <th scope="col" style="border: 1px solid;font-size: 20px;">Buyoff</th>
                      <th scope="col" style="border: 1px solid;font-size: 20px;">總進度</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="text-align:center;height: 50px;">
                      <th scope="row" style="width: 10%;font-size: 20px;" >進度</th>
                      <td style="border: 1px solid;width: 15%;font-size: 20px;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dfm" data-bs-whatever="DFM"><?php echo $datatiendo['dfm']; ?></button></td>
                      <td style="border: 1px solid;width: 15%;font-size: 20px;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id3DTo2D" data-bs-whatever="3DTo2D"><?php echo $datatiendo['3dto2d']; ?></button></td>
                      <td style="border: 1px solid;width: 15%;font-size: 20px;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#giacongvadathang" data-bs-whatever="Gia Công Và Đặt Hàng"><?php echo $datatiendo['giacongvadathang']; ?></button></td>
                      <td style="border: 1px solid;width: 15%;font-size: 20px;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lapdatvachinhmay" data-bs-whatever="Lắp Đặt Và Chỉnh Máy"><?php echo $datatiendo['lapdatvachinhmay']; ?></button></td>
                      <td style="border: 1px solid;width: 15%;font-size: 20px;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buyoff" data-bs-whatever="Buyoff"><?php echo $datatiendo['buyoff']; ?></button></td>
                      <td style="border: 1px solid;width: 15%;font-size: 20px;"></td>
                      </tr> 

                      <tr style="text-align:center;height: 50px; background: #9BC86A;">
                          <th scope="row" style="font-size: 20px;" >總進度</th>
                          <td style="border: 1px solid;"> <?php echo $tong1.'%'; ?></td>
                          <td style="border: 1px solid;"> <?php echo $tong2.'%'; ?></td>
                          <td style="border: 1px solid;"> <?php echo $tong3.'%'; ?></td>
                          <td style="border: 1px solid;"> <?php echo $tong4.'%'; ?></td>
                          <td style="border: 1px solid;"> <?php echo $tong5.'%'; ?></td>
                          <td style="border: 1px solid;"><button class="btn btn-danger"><?php echo $tong; ?></button></td>
                      </tr>
              
                      
                  </tbody>
                </table> 
        <div>
            <h2 style="text-align:center;margin-top: 1%;">總進度</h2>
        </div>
        
            <table style=" width: 100%; margin-bottom: 20px;margin-top: 1%;" name="tabletable" id="idtable">
                 <thead>
            <tr style=" background: #ffed86;height: 50px;text-align:center;">
                <th style="font-size: 20px;  width: 4px;border: 1px solid;">#</th>
                <th style="font-size: 20px; width: 30px;border: 1px solid;">機台名稱</th>    
                <th style="font-size: 20px; width: 5px;border: 1px solid;">進度</th>
                <th style="font-size: 20px; width: 40px;border: 1px solid;">開始日期</th>
                <th style="font-size: 20px; width: 40px;border: 1px solid;">預期日期</th>
                <th style="font-size: 20px; width: 4px;border: 1px solid;">时间</th>
                <th style="font-size: 20px; width: 5px;border: 1px solid;">结束日</th>
                <th style="font-size: 20px; width: 4px;border: 1px solid;">效率</th>
                <th style="font-size: 20px; width: 5px;border: 1px solid;">部門</th>
                <th style="font-size: 20px; width: 100px;border: 1px solid;">成員</th>
                <th style="font-size: 20px; width: 50px;border: 1px solid;">#</th>
              
            </tr>
        </thead>
           <tbody>
            <tr style="background: white;height: 50px;text-align:center;">
                <td style='font-size: 20px;border: 1px solid;font-size: 20px; '>1</td>
                <td style='font-size: 20px;border: 1px solid;font-size: 20px; '> <?php echo $dataID['tenmay']; ?></td>  
                <td style='font-size: 20px;border: 1px solid;font-size: 20px;'><?php echo$dataID['tiendo']; ?></td>
                <td style='font-size: 20px;border: 1px solid;font-size: 20px;'><?php echo$dataID['ngaybatdau']; ?></td>

                <td style='font-size: 20px;border: 1px solid;font-size: 20px; '><?php echo$dataID['ngaydukien']; ?></td>

                 <?php if($tiendo1 == 100){ ?>
                <td style='border: 1px solid;font-size: 20px; '><?php echo $hours+1; ?></td>
                <?php }else{ ?>
                <td style='border: 1px solid;font-size: 20px; '><?php echo $hours+1; ?></td>
                <?php } ?>

                <?php if($tiendo1 == 100)
                { 
                ?>
                <td style='border: 1px solid;font-size: 20px;'><?php echo $dataID['ngayhoanthanh']; ?></td>           
                <?php
                 }else{
                ?>                
                <td style='border: 1px solid;font-size: 20px;'>没完成</td>
                <?php } ?>

                <?php if($tiendo1 == 100){ ?>
                <td style='border: 1px solid; font-size: 20px;'><?php echo$dataID['hieusuat']; ?></td>
                <?php }else{
                ?>
                <td style='border: 1px solid; font-size: 20px;'>没完成</td>
                <?php } ?>

                <td style='font-size: 20px;border: 1px solid;font-size: 20px; '><?php echo$dataID['bophan']; ?></td>
                <td style='font-size: 20px;border: 1px solid;font-size: 20px; '><?php echo$dataID['nhomthuchien']; ?></td>
                        
            </tr>

            </tbody>
        </table>
         
            
            </div>
</section>

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
        <h5 class="modal-title" id="exampleModalLabel">DFM</h5>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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
        <h5 class="modal-title" id="exampleModalLabel">3DTo2D</h5>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
    
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Buyoff</h5>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

        <button type="submit" id="submitbuyoff" name="submitbuyoff" class="btn btn-primary"style="display: none;">確認</button>

      </div>
    </div>
  </div>
</div>
</form>




<script type="text/javascript">
    document.getElementById("xacnhan2").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau2");
     var y = document.getElementById("span2");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1]; ?>'){
        window.location="../Controller/index.php?action=edit1-cn&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau2").classList.add("is-invalid");
      document.getElementById("span2").innerText = '號碼号码不正确'
      document.getElementById("span2").style.color = 'red'
    }
    
}


</script>


<!-- <script type="text/javascript">
    document.getElementById("xacnhan3").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau3");
     var y = document.getElementById("span3");
  x.value = x.value.toUpperCase();
    if(x.value == '1997'){
        window.location="../Controller/index.php?action=delete&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau3").classList.add("is-invalid");
      document.getElementById("span3").innerText = '號碼号码不正确'
      document.getElementById("span3").style.color = 'red'
    }
    
}


</script> -->

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
      document.getElementById("idspandfm").innerText = '號碼号码不正确'
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
      document.getElementById("idspan3dto2d").innerText = '號碼号码不正确'
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
      document.getElementById("idspandathang").innerText = '號碼号码不正确'
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
      document.getElementById("idspanlapdat").innerText = '號碼号码不正确'
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
      document.getElementById("idspanbuyoff").innerText = '號碼号码不正确'
      document.getElementById("idspanbuyoff").style.color = 'red'
  }
}

</script>


</body>
</html>