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
        $ten = $dataID['nhomthuchien'];
        $ma = substr($mathe, 0, -8);
        // $length = floor(strlen($mathe)/8);
        // $length1 = $length+1;
        $str = str_replace( '-', '', $mathe );
        $m = array();
        $m = explode(',', $mathe);

        $m1 = array();
        $m1 = explode(',', $ten);

        $length = count($m);

        
        $dfmm = $datatiendo['buyoff'];
        $to2dd = $datatiendo['3dto2d'];
        $giacongvadathangg = $datatiendo['giacongvadathang'];
        $lapdatvachinhmayy = $datatiendo['lapdatvachinhmay'];


         if(isset($_POST['submitdfm']))
        {
        $tentiendo = 'dfm';
        $tiendo = $_POST['namedfm'].'%';
        if($db->Updattiendo1($tablee,$tentiendo,$tiendo,$tenmay,$ngaybatdau,$tenline)){
            if(0)

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
            if($dfm == '100%')
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
        }else{
            $thongbao = 'Tiến Độ Lắp Đặt Và Chỉnh Máy Chưa Xong';
            echo "<script type='text/javascript'>alert('$thongbao');</script>";
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



if($length == 0){
    $length = $length+1;
}



$db->UpdateTienDo2($tenline,$bophan,$tong104);
  

?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../codejavascript/script.js"></script>
    <script src="../codejavascript/jq1.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.min.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.react.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <script type="text/javascript" src="../canvasjs/jquery.canvasjs.min.js"></script>
       <link rel="stylesheet" type="text/css" href="../codejavascript/mario.css">
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
        text: "Biểu Đồ Tiến Độ <?php echo $tenmay; ?> <?php echo '(' ?><?php echo $tenline; ?><?php echo ')' ?>",
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
		name: "Tiến Độ Hiện Tại <?php echo $tenmay; ?>",
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
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudo.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
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
<body>
	<section class="packages" id="packages" style="background: #CCE4F0;">

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
    <span style="position:absolute;font-size: 25px;left: 10px;top: 90px;font-weight: bold;"data-bs-toggle="modal" data-bs-target="#dfm" class="dfm">DFM</span>
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
    <span style="position:absolute;font-size: 25px;left: 0px;top: 120px;font-weight: bold;" data-bs-toggle="modal" data-bs-target="#id3DTo2D" data-bs-whatever="3DTo2D" class="to2d">3DTO2D</span>
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
    <span style="position:absolute;font-size: 25px;left: -50px;top: 150px;font-weight: bold;" data-bs-toggle="modal" data-bs-target="#giacongvadathang" data-bs-whatever="Gia Công Và Đặt Hàng" class="giacongvadathang">GiaCôngĐặtHàng</span>
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
    <span style="position:absolute;font-size: 25px;left:-50px;top: 180px;font-weight: bold;" data-bs-toggle="modal" data-bs-target="#lapdatvachinhmay" data-bs-whatever="Lắp Đặt Và Chỉnh Máy" class="lapdatvachinhmay">LắpĐặtChỉnhMáy</span>
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
         <span style="position:absolute;font-size: 50px;left: 90px;top: 280px;color: white;--p: 30vw;" data-bs-toggle="modal" data-bs-target="#buyoff" data-bs-whatever="Buyoff" class="buyoff"><?php echo $dataID['tiendo']; ?></span>
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


     <div class="container2"style="margin-left: 77vw;">
        
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




<!--      <div class="box-container" style="">
        <div id="chartContainer" style="height: 400px; width: 100%;">
        </div>
     </div> -->

    <!-- <div>
      <img src="../image/gif.gif" border="0" alt="Photobucket" height="200" width="250" id="ani" style="position: relative;top:-20px;z-index: -1;--g: <?php echo $phantram-5; ?>vw;">
    </div> -->
     
<!--     <div style="width: 99vw;margin-top: 30px;">
      <div class="progress" style="">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $phantram; ?>" aria-valuemin="0" aria-valuemax="100" style="max-width: <?php echo $phantram; ?>%">
        <span class="title" style="font-size:30px"><?php echo $tong; ?></span>
        </div>
      </div>    
    </div> -->


 <!--  <div class="tiendo" >
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
             <span style="font-weight:bold;font-size:22px;text-align:center;">DFM</span>
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
             <span style="font-weight:bold;font-size:22px;text-align:center;">3DTO2D</span>
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
             <span style="font-weight:bold;font-size:20px;text-align:center;">Gia Công,ĐH</span>
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
             <span style="font-weight:bold;font-size:20px;text-align:center;">Lắp Đặt,CM</span>
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
             <span style="font-weight:bold;font-size:22px;text-align:center;">Buyoff</span>
         </div>
     </div>

</div>
 -->
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
                // echo "<script type='text/javascript'>alert('$m.length');</script>";
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
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
        <h5 class="modal-title" id="exampleModalLabel">3DTo2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
          <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau3dto2d" class="col-form-label">Cập Nhập Tiến Độ :</label>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

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
            <label for="recipient-name" id="tieudematkhau" class="col-form-label">Cập Nhập Tiến Độ :</label>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
    
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
            <label for="recipient-name" id="tieudematkhau1" class="col-form-label">Cập Nhập Tiến Độ :</label>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Buyoff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau2" class="col-form-label">Cập Nhập Tiến Độ :</label>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

        <button type="submit" id="submitbuyoff" name="submitbuyoff" class="btn btn-primary"style="display: none;">Xác Nhận</button>

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
        window.location="../Controller/index.php?action=edit1&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau2").classList.add("is-invalid");
      document.getElementById("span2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span2").style.color = 'red'
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