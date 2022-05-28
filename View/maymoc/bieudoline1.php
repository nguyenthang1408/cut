<?php 

include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

if(isset($_GET['id'])){
           $id = $_GET['id'];
           $table = "tiendomaymoc1";
           $dataID = $db->getDataID($table,$id);

        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];
       
       }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $table = 'tiendomaymoc1';
            $dataID = $db->getDataID($table,$id); 
            $ccc = $dataID['tiendo'];
<<<<<<< HEAD
=======
            $tiendomario = substr($ccc, 0, -1);
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
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


        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];



        


           $table = 'tiendomaymoc1';
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


           $tongtiendo = 0;

           
            

         // Công Đoạn 1

         if(isset($_POST['submitdfm1']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }  



         // Công Đoạn 2

         if(isset($_POST['submitdfm2']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];
 
             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                       $n = $mangtiendodfm[1];
                   }
           if($mangtiendodfm[1] == 100 ) 
           {      

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





         // Công Đoạn 3

         if(isset($_POST['submitdfm3']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[2] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }




         // Công Đoạn 4

         if(isset($_POST['submitdfm4']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[3] == 100 ) 
           {   

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }   
             



        // Công Đoạn 5

         if(isset($_POST['submitdfm5']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[4] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





         // Công Đoạn 6

         if(isset($_POST['submitdfm6']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[5] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         } 







         // Công Đoạn 7

         if(isset($_POST['submitdfm7']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[6] == 100 ) 
           {    

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }   






        // Công Đoạn 8

         if(isset($_POST['submitdfm8']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[7] == 100 ) 
           { 

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





         // Công Đoạn 9

         if(isset($_POST['submitdfm9']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[8] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                  $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





         // Công Đoạn 10

         if(isset($_POST['submitdfm10']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[9] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

          }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  






         // Công Đoạn 11

         if(isset($_POST['submitdfm11']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[10] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





         // Công Đoạn 12

         if(isset($_POST['submitdfm12']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[11] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  






          // Công Đoạn 13

         if(isset($_POST['submitdfm13']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[12] == 100 ) 
           { 

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  




         // Công Đoạn 14

         if(isset($_POST['submitdfm14']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[13] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                  $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         } 

           




           // Công Đoạn 15

         if(isset($_POST['submitdfm15']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[14] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }   



<<<<<<< HEAD

         // Công Đoạn 16

         if(isset($_POST['submitdfm16']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[15] == 100 ) 
           { 

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

          }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  




         // Công Đoạn 17

         if(isset($_POST['submitdfm17']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[16] == 100 ) 
           { 

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

          }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





         // Công Đoạn 18

         if(isset($_POST['submitdfm18']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[17] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  




         // Công Đoạn 19

         if(isset($_POST['submitdfm19']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

             $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[18] == 100 ) 
           {  

         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  






         // Công Đoạn 20

         if(isset($_POST['submitdfm20']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[19] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





        if(isset($_POST['edit1']))
        {
            $tablecongdoan = 'congdoan1';
            $tenmay1 = $_POST['tenmay1'];
            $ngaybatdau1 = $_POST['ngaybatdau1'];
            $ngaydukien1 = $_POST['ngaydukien1'];
            $nhomthuchien1 = $_POST['nhomthuchien1'];
            $mathe1 = $_POST['mathe1'];
            $id1 = $_POST['id'];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());
            if($db->UpdateCongDoan($tablecongdoan,$id1,$tenmay1,$ngaybatdau1,$ngaydukien1,$mathe1,$nhomthuchien1,$thoigian))
            {
=======
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
                header('Refresh:0');
            }
        }


<<<<<<< HEAD
=======
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3


<<<<<<< HEAD

           // Công Đoạn 21

         if(isset($_POST['submitdfm21']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[20] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  




            // Công Đoạn 22

         if(isset($_POST['submitdfm22']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[21] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  



            // Công Đoạn 23

         if(isset($_POST['submitdfm23']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[22] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  




            // Công Đoạn 24

         if(isset($_POST['submitdfm24']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[23] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





            // Công Đoạn 25

         if(isset($_POST['submitdfm25']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[24] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





            // Công Đoạn 26

         if(isset($_POST['submitdfm26']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[25] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  




            // Công Đoạn 27

         if(isset($_POST['submitdfm27']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[26] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





            // Công Đoạn 28

         if(isset($_POST['submitdfm28']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[27] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  






            // Công Đoạn 29

         if(isset($_POST['submitdfm29']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[28] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  






            // Công Đoạn 30

         if(isset($_POST['submitdfm30']))
        {    
             $tablecongdoan = 'congdoan1';
             $tiendoo = $_POST['tiendo'];
             $idd = $_POST['id'];

             $mathe = $dataID['mathe'];
             $nhomthuchien = $dataID['nhomthuchien'];
             $tenmay = $dataID['tenmay'];
             $ngaybatdau = $dataID['ngaybatdau'];
             $ngaydukien = $dataID['ngaydukien'];
             $bophan = $dataID['bophan'];

              $mangtiendodfm = array();
             $u = 0;
             $tiendo1 = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo1 as $value1) {
                       $u++;
                       $mangtiendodfm[$u] = $value1['tiendo'];
                   }
           if($mangtiendodfm[29] == 100 ) 
           {  


         if($db->UpdateTienDoCongDoan($tablecongdoan,$tiendoo,$idd))
        {


                $tongoftong1 = 0;
                $mathe = $dataID['mathe'];
                $nhomthuchien = $dataID['nhomthuchien'];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];
                $bophan = $dataID['bophan'];

                   $tiendo = $db->getDataTenMay($tablecongdoan,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);
                   foreach ($tiendo as $value) {

                   if($db->num_row()>0)
                   {
                       $a = $value['tiendo'];
                       $tongoftong1 = $tongoftong1 + $a;
                   }
                   else
                   {
                       $tongoftong1 = $tongoftong1 + 0;
                   }
                  }  
                  $lengthh = $db->num_row();

             $tongoftongtiendo = floor($tongoftong1/$lengthh);
            
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo($id,$tong);
            header('Refresh:0');
         }

         }else
         {
            $message = 'Tiến Độ trước Chưa Hoàn Thành';
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         }  





        if(isset($_POST['edit1']))
        {
            $tablecongdoan = 'congdoan1';
            $tenmay1 = $_POST['tenmay1'];
            $ngaybatdau1 = $_POST['ngaybatdau1'];
            $ngaydukien1 = $_POST['ngaydukien1'];
            $nhomthuchien1 = $_POST['nhomthuchien1'];
            $mathe1 = $_POST['mathe1'];
            $id1 = $_POST['id'];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());
            if($db->UpdateCongDoan($tablecongdoan,$id1,$tenmay1,$ngaybatdau1,$ngaydukien1,$mathe1,$nhomthuchien1,$thoigian))
            {
=======
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
                header('Refresh:0');
            }
        }






        if(isset($_POST['themcongdoan']))
        {
            $tablecongdoan = 'congdoan1';
            $tenmay1 = $_POST['congdoan'];
            $ngaybatdau1 = $_POST['ngaybatdau1'];
            $ngaydukien1 = $_POST['ngaydukien1'];
            $nhomthuchien1 = $_POST['thanhvien'];

            $tenmay = $_POST['tenmay'];
            $ngaybatdau = $_POST['ngaybatdau'];
            $ngaydukien = $_POST['ngaydukien'];
            $mathe = $dataID['mathe'];
            $bophan = $_POST['bophan'];
            $tenline = $_POST['tenline'];
            $nhomthuchien = $dataID['nhomthuchien'];
            $tiendo = 0;
            $tonggio = 0;   
            $hoanthanh = 0;
            $phantram = 0;
            $tangca = 0;
            $mathe1 = $_POST['mathe1'];;
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

            if(isset($_SESSION['username'] ))   
            {
                $user = $_SESSION['username'];
            }
            else
            {
                $user = 'Chưa Đăng Nhập';
            }

            if($db->InsertCongDoanLine($tablecongdoan,$tenmay,$tenmay1,$tiendo,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$hoanthanh,$phantram,$tangca,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$thoigian,$bophan,$tenline))
            {
                header('Refresh:0');
            }
        }





        if(isset($_POST['submittrongngay'])){
            $tabletrongngay = 'trongngay1';
            $tenmay = $dataID['tenmay'];
            $tenmay1 = $_POST['tenmay1'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $bophan = $dataID['bophan'];
            $tonggio = 0;
            $giotrongngay = $_POST['nametrongngay'];
            $ngaybatdau1 = $_POST['ngaybatdau1'];
            $ngaydukien1 = $_POST['ngaydukien1'];
            $hoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $dataID['mathe'];
            $mathe1 = $_POST['mathe1'];
            $nhomthuchien = $dataID['nhomthuchien'];
            $nhomthuchien1 = $_POST['nhomthuchien1'];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());


           if(isset($_SESSION['username'] ))   
            {
                $user = $_SESSION['username'];
            }
            else
            {
                $user = 'Chưa Đăng Nhập';
            }


            if($db->InsertTrongNgay($tabletrongngay,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$hoanthanh,$phantram,$tangca,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan,$thoigian,$user,$giotrongngay)){

                header('Refresh:0');
            }
        }




        if(isset($_POST['submithoanthanh'])){
            $tablecongdoan = 'congdoan1';
            $tenmay = $dataID['tenmay'];
            $tenmay1 = $_POST['tenmay1'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $bophan = $dataID['bophan'];
            $tonggio = 0;
            $ngaybatdau1 = $_POST['ngaybatdau1'];
            $ngaydukien1 = $_POST['ngaydukien1'];
            $hoanthanh = $_POST['hoanthanh'];
            $phantram = '0%';
            $tangca = 0;
            $mathe = $dataID['mathe'];
            $mathe1 = $_POST['mathe1'];
            $nhomthuchien = $dataID['nhomthuchien'];
            $nhomthuchien1 = $_POST['nhomthuchien1'];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());


           if(isset($_SESSION['username'] ))   
            {
                $user = $_SESSION['username'];
            }
            else
            {
                $user = 'Chưa Đăng Nhập';
            }


            if($db->Updatehoanthanh1($tablecongdoan,$hoanthanh,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan)){

                header('Refresh:0');
            }
        }


        


         if(isset($_POST['check']))
        {
            $idddd = $_POST['idddd'];
            $tablecongdoan = 'congdoan1';
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $tangcaa =  Date("Y-m-d", time());
            if($db->UpdateCheck($tablecongdoan,$tangcaa,$idddd))
            {
               header('Refresh:0');
            }
        }





        if(isset($_POST['xoa']))
        {
            $tablecongdoan = 'congdoan1';
            $idcongdoan = $_POST['id'];
            if($db->Delete($idcongdoan,$tablecongdoan))
            {
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


if($length == 0){
    $length = $length+1;
}

$oo = $dataID['tiendo'];

$o = substr($oo, 0, -1);


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


$tablecongdoan = 'congdoan1';
 $tenmay = $dataID['tenmay'];
 $ngaybatdau = $dataID['ngaybatdau'];
 $ngaydukien = $dataID['ngaydukien'];
 $mathe = $dataID['mathe'];
 $nhomthuchien = $dataID['nhomthuchien'];
 $bophan = $dataID['bophan'];
 $demcongdoan = 0;

 $datacongdoan = $db->getAllCongDoan($tablecongdoan,$tenmay,$ngaybatdau,$ngaydukien,$mathe,$bophan,$nhomthuchien);
 $tiendo = $dataID['tiendo'];
 if($datacongdoan > 0)
 {
 foreach ($datacongdoan as $value) {
 $demcongdoan++;
}
}


$tableline = 'congdoan1';
$tenline = $dataID['tenline'];

$line1 = $db->getDataLineMayMoc($tableline,$tenmay,$tenline,$bophan,$ngaybatdau,$ngaydukien,$nhomthuchien,$mathe);
$mang7 = array();
$l = 0;
$tongtong = 0;
if($line1 > 0)
{
    foreach ($line1 as $keykey) {
    $l++;
    $mang7[$l] = $keykey['tiendo'];
    $tongtong = $tongtong + $mang7[$l];

    if($l != 0)
    {
        $tong104 = floor($tongtong / $l);
    }
    else
    {
        $tong104 = 0;
    }
    }
    $db->UpdateTienDo3($tenmay,$tenline,$bophan,$tong104,$ngaybatdau,$ngaydukien,$mathe,$nhomthuchien);
}
else
    {
        $tongtong = 0;
        if($l != 0)
    {
        $tong104 = 0;
    }
    else
    {
        $tong104 = 0;
    }

    $db->UpdateTienDo3($tenmay,$tenline,$bophan,$tong104,$ngaybatdau,$ngaydukien,$mathe,$nhomthuchien);
}






$tabletiendomaymoc1 = 'tiendomaymoc1';
$tenline = $dataID['tenline'];

$line2 = $db->getDataLineMayMoc($tabletiendomaymoc1,$tenmay,$tenline,$bophan,$ngaybatdau,$ngaydukien,$nhomthuchien,$mathe);
$mang8 = array();
$l1 = 0;
$tongtong1 = 0;
if($line2 > 0)
{
    foreach ($line2 as $keykey1) {
    $l1++;
    $mang8[$l1] = $keykey1['tiendo'];
    $tongtong1 = $tongtong1 + $mang8[$l1];
    }
}
else
{
    $tongtong1 = 0;
}

if($l1 != 0)
{
    $tong105 = floor($tongtong1 / $l1);
    $tong106 = $tong105.'%';
}
else
{
    $tong105 = '0%';
}

$db->UpdateTienDo2($tenline,$bophan,$tong106);

$tabletiendomaymoc = 'tiendomaymoc';

$dodo = $db->getDataBoPhanLine1($tabletiendomaymoc,$tenline,$bophan,$ngaybatdau,$ngaydukien,$mathe,$nhomthuchien);
if($dodo > 0)
{
    $dodo1 = $dodo['tiendo'];

    $dodo2 = substr($dodo1, 0, -1);
}
else
{
    $dodo2 = 0;
}





$tablecongdoan = 'congdoan1';
 $tenmay = $dataID['tenmay'];
 $ngaybatdau = $dataID['ngaybatdau'];
 $ngaydukien = $dataID['ngaydukien'];
 $mathe = $dataID['mathe'];
 $nhomthuchien = $dataID['nhomthuchien'];
 $bophan = $dataID['bophan'];
 $demcongdoan = 0;

 $datacongdoan = $db->getAllCongDoan($tablecongdoan,$tenmay,$ngaybatdau,$ngaydukien,$mathe,$bophan,$nhomthuchien);
 $tiendo = $dataID['tiendo'];
 if($datacongdoan > 0)
 {
 foreach ($datacongdoan as $value) {
 $demcongdoan++;
}
}




?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../codejavascript/script.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.min.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.react.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../canvasjs/jquery.canvasjs.min.js"></script>
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudo.css">
    <title>Biểu Đồ Tiến Độ</title>
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
   <style type="text/css">
       
   </style>

  <script src="../codejavascript/jq1.js"></script>
  <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
=======
       <link rel="stylesheet" type="text/css" href="../codejavascript/mario.css">
    <title>Biểu Đồ Tiến Độ</title>
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../codejavascript/mario.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
   <style type="text/css">

      
      .tiendo{
=======
</head>
<style type="text/css">
    .tiendo{
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
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


<<<<<<< HEAD


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






 .search-input2{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input2 input{
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
        .search-input2 .autocom-box2{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box2 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box2 li:hover{
            background: #efefef;
        }
        .search-input2.active .autocom-box2{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input2.active .autocom-box2 li{
            display: block;
        }
        .search-input2.activee .autocom-box2 li{
            display: block;
        }




         .search-input3{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input3 input{
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
        .search-input3 .autocom-box3{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box3 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box3 li:hover{
            background: #efefef;
        }
        .search-input3.active .autocom-box3{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input3.active .autocom-box3 li{
            display: block;
        }
        .search-input3.activee .autocom-box3 li{
            display: block;
        }




         .search-input4{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input4 input{
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
        .search-input4 .autocom-box4{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box4 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box4 li:hover{
            background: #efefef;
        }
        .search-input4.active .autocom-box4{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input4.active .autocom-box4 li{
            display: block;
        }
        .search-input4.activee .autocom-box4 li{
            display: block;
        }




         .search-input5{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input5 input{
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
        .search-input5 .autocom-box5{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box5 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box5 li:hover{
            background: #efefef;
        }
        .search-input5.active .autocom-box5{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input5.active .autocom-box5 li{
            display: block;
        }
        .search-input5.activee .autocom-box5 li{
            display: block;
        }







         .search-input6{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input6 input{
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
        .search-input6 .autocom-box6{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box6 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box6 li:hover{
            background: #efefef;
        }
        .search-input6.active .autocom-box6{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input6.active .autocom-box6 li{
            display: block;
        }
        .search-input6.activee .autocom-box6 li{
            display: block;
        }




         .search-input7{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input7 input{
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
        .search-input7 .autocom-box7{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box7 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box7 li:hover{
            background: #efefef;
        }
        .search-input7.active .autocom-box7{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input7.active .autocom-box7 li{
            display: block;
        }
        .search-input7.activee .autocom-box7 li{
            display: block;
        }




        .search-input8{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input8 input{
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
        .search-input8 .autocom-box8{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box8 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box8 li:hover{
            background: #efefef;
        }
        .search-input8.active .autocom-box8{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input8.active .autocom-box8 li{
            display: block;
        }
        .search-input8.activee .autocom-box8 li{
            display: block;
        }




         .search-input9{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input9 input{
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
        .search-input9 .autocom-box9{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box9 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box9 li:hover{
            background: #efefef;
        }
        .search-input9.active .autocom-box9{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input9.active .autocom-box9 li{
            display: block;
        }
        .search-input9.activee .autocom-box9 li{
            display: block;
        }




         .search-input10{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input10 input{
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
        .search-input10 .autocom-box10{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box10 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box10 li:hover{
            background: #efefef;
        }
        .search-input10.active .autocom-box10{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input10.active .autocom-box10 li{
            display: block;
        }
        .search-input10.activee .autocom-box10 li{
            display: block;
        }




         .search-input11{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input11 input{
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
        .search-input11 .autocom-box11{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box11 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box11 li:hover{
            background: #efefef;
        }
        .search-input11.active .autocom-box11{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input11.active .autocom-box11 li{
            display: block;
        }
        .search-input11.activee .autocom-box11 li{
            display: block;
        }




         .search-input12{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input12 input{
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
        .search-input12 .autocom-box12{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box12 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box12 li:hover{
            background: #efefef;
        }
        .search-input12.active .autocom-box12{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input12.active .autocom-box12 li{
            display: block;
        }
        .search-input12.activee .autocom-box12 li{
            display: block;
        }



         .search-input13{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input13 input{
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
        .search-input13 .autocom-box13{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box13 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box13 li:hover{
            background: #efefef;
        }
        .search-input13.active .autocom-box13{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input13.active .autocom-box13 li{
            display: block;
        }
        .search-input13.activee .autocom-box13 li{
            display: block;
        }




         .search-input14{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input14 input{
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
        .search-input14 .autocom-box14{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box14 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box14 li:hover{
            background: #efefef;
        }
        .search-input14.active .autocom-box14{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input14.active .autocom-box14 li{
            display: block;
        }
        .search-input14.activee .autocom-box14 li{
            display: block;
        }




         .search-input15{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input15 input{
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
        .search-input15 .autocom-box15{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box15 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box15 li:hover{
            background: #efefef;
        }
        .search-input15.active .autocom-box15{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input15.active .autocom-box15 li{
            display: block;
        }
        .search-input15.activee .autocom-box15 li{
            display: block;
        }




         .search-input16{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input16 input{
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
        .search-input16 .autocom-box16{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box16 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box16 li:hover{
            background: #efefef;
        }
        .search-input16.active .autocom-box16{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input16.active .autocom-box16 li{
            display: block;
        }
        .search-input16.activee .autocom-box16 li{
            display: block;
        }




         .search-input17{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input17 input{
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
        .search-input17 .autocom-box17{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box17 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box17 li:hover{
            background: #efefef;
        }
        .search-input17.active .autocom-box17{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input17.active .autocom-box17 li{
            display: block;
        }
        .search-input17.activee .autocom-box17 li{
            display: block;
        }





         .search-input18{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input18 input{
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
        .search-input18 .autocom-box18{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box18 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box18 li:hover{
            background: #efefef;
        }
        .search-input18.active .autocom-box18{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input18.active .autocom-box18 li{
            display: block;
        }
        .search-input18.activee .autocom-box18 li{
            display: block;
        }





         .search-input19{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input19 input{
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
        .search-input19 .autocom-box19{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box19 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box19 li:hover{
            background: #efefef;
        }
        .search-input19.active .autocom-box19{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input19.active .autocom-box19 li{
            display: block;
        }
        .search-input19.activee .autocom-box19 li{
            display: block;
        }





         .search-input20{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input20 input{
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
        .search-input20 .autocom-box20{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box20 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box20 li:hover{
            background: #efefef;
        }
        .search-input20.active .autocom-box20{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input20.active .autocom-box20 li{
            display: block;
        }
        .search-input20.activee .autocom-box20 li{
            display: block;
        }




         .search-input21{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input21 input{
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
        .search-input21 .autocom-box21{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box21 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box21 li:hover{
            background: #efefef;
        }
        .search-input21.active .autocom-box21{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input21.active .autocom-box21 li{
            display: block;
        }
        .search-input21.activee .autocom-box21 li{
            display: block;
        }




         .search-input22{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input22 input{
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
        .search-input22 .autocom-box22{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box22 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box22 li:hover{
            background: #efefef;
        }
        .search-input22.active .autocom-box22{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input22.active .autocom-box22 li{
            display: block;
        }
        .search-input22.activee .autocom-box22 li{
            display: block;
        }





         .search-input23{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input23 input{
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
        .search-input23 .autocom-box23{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box23 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box23 li:hover{
            background: #efefef;
        }
        .search-input23.active .autocom-box23{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input23.active .autocom-box23 li{
            display: block;
        }
        .search-input23.activee .autocom-box23 li{
            display: block;
        }




         .search-input24{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input24 input{
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
        .search-input24 .autocom-box24{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box24 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box24 li:hover{
            background: #efefef;
        }
        .search-input24.active .autocom-box24{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input24.active .autocom-box24 li{
            display: block;
        }
        .search-input24.activee .autocom-box24 li{
            display: block;
        }




         .search-input25{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input25 input{
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
        .search-input25 .autocom-box25{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box25 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box25 li:hover{
            background: #efefef;
        }
        .search-input25.active .autocom-box25{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input25.active .autocom-box25 li{
            display: block;
        }
        .search-input25.activee .autocom-box25 li{
            display: block;
        }





         .search-input26{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input26 input{
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
        .search-input26 .autocom-box26{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box26 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box26 li:hover{
            background: #efefef;
        }
        .search-input26.active .autocom-box26{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input26.active .autocom-box26 li{
            display: block;
        }
        .search-input26.activee .autocom-box26 li{
            display: block;
        }




         .search-input27{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input27 input{
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
        .search-input27 .autocom-box27{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box27 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box27 li:hover{
            background: #efefef;
        }
        .search-input27.active .autocom-box27{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input27.active .autocom-box27 li{
            display: block;
        }
        .search-input27.activee .autocom-box27 li{
            display: block;
        }




         .search-input28{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input28 input{
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
        .search-input28 .autocom-box28{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box28 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box28 li:hover{
            background: #efefef;
        }
        .search-input28.active .autocom-box28{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input28.active .autocom-box28 li{
            display: block;
        }
        .search-input28.activee .autocom-box28 li{
            display: block;
        }





         .search-input29{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input29 input{
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
        .search-input29 .autocom-box29{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box29 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box29 li:hover{
            background: #efefef;
        }
        .search-input29.active .autocom-box29{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input29.active .autocom-box29 li{
            display: block;
        }
        .search-input29.activee .autocom-box29 li{
            display: block;
        }





         .search-input30{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input30 input{
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
        .search-input30 .autocom-box30{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box30 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box30 li:hover{
            background: #efefef;
        }
        .search-input30.active .autocom-box30{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input30.active .autocom-box30 li{
            display: block;
        }
        .search-input30.activee .autocom-box30 li{
            display: block;
        }



       .hiden{
                display: none;
             }




   </style>
</head>
<body>
    <section class="packages" id="packages" style="background: #CCE4F0;">

    <div style="width: 100%;height: 70px;position: fixed;z-index: 61;">
        <h2><a href="../Controller/index.php?action=selectaecdata#book" style="font-size: 25px;" class="btn btn-success"><i class="fa-solid fa-angles-left"></i> Quay Lại</a></h2>   
=======
</style>
<body>
	<section class="packages" id="packages" style="background: #CCE4F0;">

    <div style="width: 100%;height: 70px;position: fixed;z-index: 61;">
        <h2><a href="../Controller/index.php?action=test2#book" style="font-size: 25px;" class="btn btn-success">Trang Chủ</a></h2>   
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
    </div>


  <div class="container1">  
      <div class="cloud">

<<<<<<< HEAD
          <div class="anim-bar">
      </div>
=======
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
    <span style="" data-bs-toggle="modal" data-bs-target="#id3DTo2D" data-bs-whatever="3DTo2D" class="to2d">3DTO2D</span>
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
    <span style="" data-bs-toggle="modal" data-bs-target="#giacongvadathang" data-bs-whatever="Gia Công Và Đặt Hàng" class="giacongvadathang">GiaCôngĐặtHàng</span>
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
    <span style="" data-bs-toggle="modal" data-bs-target="#lapdatvachinhmay" data-bs-whatever="Lắp Đặt Và Chỉnh Máy" class="lapdatvachinhmay">LắpĐặtChỉnhMáy</span>
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
         <span style="--p: 30vw;" data-bs-toggle="modal" data-bs-target="#buyoff" data-bs-whatever="Buyoff" id="spanbuyoff" class="buyoff"><?php echo $dataID['tiendo']; ?></span>
    </div>


     
     <img src="../image/tree1.png" height="50"width="50" class ="img1" style="">
     <img src="../image/nam1.png" height="100"width="100" class ="img2" style="">
     <img src="../image/tree1.png" height="50"width="50" class ="img3" style="">
     <img src="../image/tree1.png" height="50"width="50" class ="img4" style="">
     <img src="../image/tree1.png" height="50"width="50" class ="img5" style="">
     <img src="../image/tree1.png" height="50"width="50" class ="img6" style="">
      <img src="../image/tree1.png" height="50"width="50" class ="img7" style="">
   
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


>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3

      <div class="ground" id="ground">
        <div class="mario" id="mario" style="--r:<?php echo $dataID['tiendo']; ?>vw;"></div>
        <div class="mario2" id="mario2" style="--r:<?php echo $dataID['tiendo']; ?>vw"></div>
        <div class="goomba"></div>
     <img src="../image/hangrao3.png" height="130"width="130" style="margin-left: 0vw;margin-top: 4vh;">

<!-- <div style="display: flex;"> -->

<?php $chiatong = 0;
       $tablecongdoan = 'congdoan1';
       $bophan = $dataID['bophan'];
       $nhomthuchien = $dataID['nhomthuchien'];
       $countcongdoan = $db->getAllCongDoan($tablecongdoan,$tenmay,$ngaybatdau,$ngaydukien,$mathe,$bophan,$nhomthuchien);
       $countcongdoan1 = $db->num_row(); 

       $dem = 0;
       $mangtenmay1 = array();
       $mangid = array();
       $mangtiendo = array();
       if($db->num_row()>0)
       {
foreach ($countcongdoan as $value) {
      $dem++;
      $mangtenmay1[$dem] = $value['tenmay1'];
      $mangid[$dem] = $value['id'];
      $mangtiendo[$dem] = $value['tiendo'];
}

     
<<<<<<< HEAD
for ($i=1; $i < $countcongdoan1; $i++) { 
    $chia = floor(80/($countcongdoan1));
    $chiatong = $chiatong + $chia;
?>

    <div class="chimney" id="chimney<?php echo $i; ?>" style="margin-left: <?php echo $chiatong ; ?>vw;">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="width: 100px;overflow: hidden;height: 50px;font-size:20px;left: 0px" data-bs-toggle="modal" data-bs-target="#dfm<?php echo $i; ?>" class="dfm">
         <?php 
             echo $mangtenmay1[$i];
              
            ?>
            
    </span>
  </div>
  <div class="flower" id="flower<?php echo $i; ?>" style="margin-left:  <?php echo $chiatong ; ?>vw;">
    <div class="top">
      <div class="bud"></div>
      <div class="mouth"></div>
      <div class="shadow"></div>
    </div>
    <div class="bottom">
      <div class="stem"></div>
      <div class="leaf l<?php echo $i; ?>"></div>
      <div class="leaf l<?php echo $i+1; ?>"></div>
    </div>
  </div>
<?php } ?>
<!-- </div> -->


  <div class="chimney" id="chimney100" style="margin-left: 80vw;top: -130px;">
      <img src="../image/castle.gif"height="300"width="300" style="">
         <span style="--p: 30vw;font-size: 22px;width: 230px;display: inline-block;margin-left: 30px;font-weight: 700;text-align: center;margin-top: -3px"data-bs-toggle="modal" data-bs-target="#dfm<?php echo $countcongdoan1; ?>" data-bs-whatever="Buyoff" id="spanbuyoff" class="buyoff"><?php echo $mangtenmay1[$countcongdoan1]; ?></span>

    </div>
<?php } ?>

    <div style="float: right;margin-right: 10px;margin-top: 170px;ba">
        <span style="font-weight: 700;font-size: 35px;"><?php echo $dataID['tiendo'].'%'; ?></span>
    </div>
=======
<!--     <div style="width: 99vw;margin-top: 30px;">
      <div class="progress" style="">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $phantram; ?>" aria-valuemin="0" aria-valuemax="100" style="max-width: <?php echo $phantram; ?>%">
        <span class="title" style="font-size:30px"><?php echo $tong; ?></span>
        </div>
      </div>    
    </div> -->
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3

     
     <img src="../image/tree1.png" height="50"width="50" class="img1" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img3" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img4" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img5" style="">
     <img src="../image/tree1.png" height="50"width="50" class="img6" style="">
      <img src="../image/tree1.png" height="50"width="50" class="img7" style="">
   
      <!--  <div class="progress2 progress-moved" style="margin-top: -16px;--p:30vw">
        <div class="progress-bar2" >
        </div>                       
      </div> --> 
      <div style="width: 100vw;position: relative;z-index: -1;">
          <img src="../image/anh77.jpg" height="65" style="--p:<?php echo $dataID['tiendo']; ?>vw;position: absolute;" id="imgimg">

      </div>


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

<<<<<<< HEAD
=======
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3





</div>
<<<<<<< HEAD

      <div style="width: 100vw;" class="div-table">
        
          <div style="" class="packages-divtable">
              <a data-bs-toggle="modal" data-bs-target="#addcongdoan" style="float: left;font-size: 50px;cursor: pointer;"><i class="fas fa-solid fa-plus"></i></a>
              <span class="div-table-span" >Bảng Tiến Độ</span>
                <table class="table" style="">
              <thead>
                <tr style="height: 20px;">
                    <th style="width: 20%;vertical-align: middle;" class="">Công Đoạn</th>    
                    <th style="width: 5%;vertical-align: middle;" class="">Tiến Độ</th>
                    <th style="width: 7%;vertical-align: middle;" class="">Ngày Bắt Đầu</th>
                    <th style="width: 7%;vertical-align: middle;" class="">Ngày Dự Kiến</th>
                    <th style="width: 7%;vertical-align: middle;" class="">Giờ Hoàn Thành(H)</th>
                    <th style="width: 5%;vertical-align: middle;" class="">Tổng Giờ</th>
                    <th style="width: 5%;vertical-align: middle;" class="">Giờ Trong Ngày(H)</th>
                    <th style="width: 5%;vertical-align: middle;" class="">Giờ Thực Tế(H)</th>
                    <th style="width: 5%;vertical-align: middle;" class="">Hiệu Suất(%)</th>
                    <th style="width: 5%;vertical-align: middle;" class="">Tăng Ca(H)</th>
                    <th style="width: 20%;vertical-align: middle;" class="">Thành Viên</th>
                    <th style="width: 8%;vertical-align: middle;" class="">####</th>
                </tr>   
              </thead>
           <tbody>
            <?php
                 $tablecongdoan = 'congdoan1';
                 $tenmay = $dataID['tenmay'];
                 $ngaybatdau = $dataID['ngaybatdau'];
                 $ngaydukien = $dataID['ngaydukien'];
                 $mathe = $dataID['mathe'];
                 $nhomthuchien = $dataID['nhomthuchien'];
                 $bophan = $dataID['bophan'];
                 $demcongdoan = 0;

                 $datacongdoan = $db->getAllCongDoan($tablecongdoan,$tenmay,$ngaybatdau,$ngaydukien,$mathe,$bophan,$nhomthuchien);
                 $tiendo = $dataID['tiendo'];
                 $manginput = array();
                 $mangtenmay = array();
                 $mangngaybatdau = array();
                 $mangngaydukien = array();
                 $mangmathe = array();
                 $mangnhomthuchien = array();
                 $deminput = 0;
                 if($datacongdoan > 0)
                 {
                 foreach ($datacongdoan as $value) {
                 $demcongdoan++;
                 $deminput++;
                 $manginput[$deminput] = $value['id'];
                 $mangtenmay[$deminput] = $value['tenmay1'];
                 $mangngaybatdau[$deminput] = $value['ngaybatdau1'];
                 $mangngaydukien[$deminput] = $value['ngaydukien1'];
                 $mangmathe[$deminput] = $value['mathe1'];
                 $mangnhomthuchien[$deminput] = $value['nhomthuchien1'];
                 
                 ?>
                 
                <?php if($value['tangca'] > 0 && $value['tiendo'] == 100){ ?>

             <tr style="background: #CCFFFF;height: 20px;text-align:center;font-size: 20px;" id="hidden<?php echo $value['id']; ?>">


                <td style='vertical-align: middle;'> 
                  <?php echo $value['tenmay1']; ?>
                </td> 


                <td style='vertical-align: middle;'><?php echo $value['tiendo'].'%'; ?></td>

                <td style='vertical-align: middle;'>
                  <?php echo $value['ngaybatdau1']; ?>
                        
                </td>

                <td style='vertical-align: middle;'>
                  <?php echo $value['ngaydukien1']; ?>  
                </td>
=======
 -->

        
            <div class="packages-divtable" style="">
            <span class="div-table-span" >Bảng Tiến Độ</span>
                <table class="table" style="">
              <thead>
                <tr>
                    <th style="" class="col-2">Tên Máy</th>    
                    <th style="" class="col-1">Tiến Độ</th>
                    <th style="" class="col-1">Ngày Bắt Đầu</th>
                    <th style="" class="col-1">Ngày Dự Kiến</th>
                    <th style="" class="col-1">Tổng Giờ</th>
                    <th style="" class="col-1">Giờ Hoàn Thành(H)</th>
                    <th style="" class="col-1">Hiệu Suất(%)</th>
                    <th style="" class="col-1">Tăng Ca(H)</th>
                    <th style="" class="col-2">Thành Viên</th>
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3


<<<<<<< HEAD
                <td style='font-weight: bold;font-size: 22px;vertical-align: middle;'>


                  
                        <button style="font-size: 17px;" data-bs-target="#timehoanthanh<?php echo $value['id']; ?>" class="btn btn-primary">
                          <?php 
                             $tablecongdoan = 'congdoan1';
                         $tenmay = $dataID['tenmay'];
                         $ngaybatdau = $dataID['ngaybatdau'];
                         $ngaydukien = $dataID['ngaydukien'];
                         $mathe = $dataID['mathe'];
                         $nhomthuchien = $dataID['nhomthuchien'];
                         $bophan = $dataID['bophan'];

                         date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $today =  Date("Y-m-d", time());
                            $tenmay1 = $value['tenmay1'];
                            $ngaybatdau1 = $value['ngaybatdau1'];
                            $ngaydukien1 = $value['ngaydukien1'];
                            $mathe1 = $value['mathe1'];
                            $nhomthuchien1 = $value['nhomthuchien1'];

                            
                            $giohoanthanh = 0;

                     $valuengaybatdau = $db->getDataNgayBatDauCongDoan($tablecongdoan,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                     if($valuengaybatdau > 0)
                     {
                        $giohoanthanh = $valuengaybatdau['hoanthanh'];
                         echo $giohoanthanh;
                     } 
                     else
                     {
                         echo 0;
                     } 

                        ?>
    
                </button>

                </td>  


    
                <td style='vertical-align: middle;'>
                    <?php 
                       $hours = 0;
                       $count = 0;
                        $tablecongdoan = 'congdoan1';
                         $tenmay = $dataID['tenmay'];
                         $ngaybatdau = $dataID['ngaybatdau'];
                         $ngaydukien = $dataID['ngaydukien'];
                         $mathe = $dataID['mathe'];
                         $nhomthuchien = $dataID['nhomthuchien'];
                         $bophan = $dataID['bophan'];


                         $tenmay1 = $value['tenmay1'];
                         $ngaybatdau1 = $value['ngaybatdau1'];
                         $ngaydukien1 = $value['ngaydukien1'];
                         $mathe1 = $value['mathe1'];
                         $nhomthuchien1 = $value['nhomthuchien1'];


                       $valuengaybatdau = $db->getDataNgayBatDauCongDoan($tablecongdoan,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                
                           $date1 = $valuengaybatdau['ngaydukien1'];
                           $date2 = $valuengaybatdau['ngaybatdau1']; 
                           $diff = abs(strtotime($date1) - strtotime($date2));

                           $days22 = $diff / (60 * 60 * 24);
                              
                           for ($l=1; $l <= $days22; $l++) { 
                            $time1 = strtotime($date2);
                            $final1 = date("Y-m-d", strtotime("+$l day", $time1));


                            $dayofweek = date('l', strtotime($final1));

     
                            if($dayofweek != 'Sunday')
                            {
                                $count++;
                            }
                           }
                           $hours = ($count+1)*8;

                           echo $hours;//////////////////////////+8
                     ?>
                </td>

                <td style="vertical-align: middle;"><!--  Tự Điền số giờ làm viecj trong ngày -->

                          <button data-bs-target="#timetrongngay<?php echo $valuengaybatdau['id']; ?>" class="btn btn-primary" style="">
                        <?php 
                            $tabletrongngay = 'trongngay1';
                            $mathe = $dataID['mathe'];
                            $nhomthuchien = $dataID['nhomthuchien'];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];
                            $bophan = $dataID['bophan'];
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $today =  Date("Y-m-d", time());
                            $tenmay1 = $value['tenmay1'];
                            $ngaybatdau1 = $value['ngaybatdau1'];
                            $ngaydukien1 = $value['ngaydukien1'];
                            $mathe1 = $value['mathe1'];
                            $nhomthuchien1 = $value['nhomthuchien1'];


                                $giotrongngay = $db->getDataTrongNgay($tabletrongngay,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$today,$bophan);
                               if($db->num_row()>0)
                               {
                                  if($giotrongngay[0] != null && $giotrongngay[0] > 0){
                                    echo $giotrongngay[0];
                                  }
                                  else{

                                    echo 8;
                                  }
                               }else
                               {
                                echo 8;
                               }


                        ?>
                    </button>

                </td>
             
                <td style='font-weight: bold;font-size: 25px;vertical-align: middle;'>

                

                    <button style="font-size: 25px;" data-bs-target="#tangca<?php echo $value['id']; ?>" class="btn btn-primary">
                            
                      
                      <?php 

                              $tabletrongngay = 'trongngay1';
                              $ngaybatdau1 = $value['ngaybatdau1'];
                              $ngaydukien1 = $value['ngaydukien1'];
                              $mathe1 = $value['mathe1'];
                              $bophan = $value['bophan'];
                              $nhomthuchien1 = $value['nhomthuchien1'];
                              $tenmay1 = $value['tenmay1'];
                              $ngaythuctee = $value['tangca'];

                              if($giohoanthanh > 0)
                              {
                                $diff2 = abs(strtotime($giohoanthanh) - strtotime($ngaybatdau1));
                                $days3 = $diff2 / (60 * 60 * 24);
                              }
                              else
                              {
                                $diff2 = abs(strtotime($today) - strtotime($ngaybatdau1));
                                $days3 = $diff2 / (60 * 60 * 24);
                              }

                               $tongthucte = 0;
                              if($today > $ngaybatdau1)
                              {

                              for ($g=1; $g <= $days3+1; $g++) { 
                                $time1 = strtotime($ngaybatdau1);
                                $final1 = date("Y-m-d", strtotime("+$g day", $time1));
                                $tangca = $db->getDataTanCa1($tabletrongngay,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$final1,$bophan);

                                $dayofweek = date('l', strtotime($final1));


                                if($tangca > 0)
                                {
                                    $tongthucte = $tongthucte + $tangca[8];
                                }
                                else if($dayofweek != 'Sunday')
                                {
                                    $tongthucte = $tongthucte + 8;
                                }
                              }
                              
                        }
                         echo 0;

                       ?>
                      



                </button>

                </td>  
            
                <td style='font-weight: bold;vertical-align: middle;'>
                    <?php 

                      if($giohoanthanh > 0)
                      {
                           $date3 = $giohoanthanh;
                           $date2 = $valuengaybatdau['ngaybatdau1']; 
                           $diff1 = abs(strtotime($date3) - strtotime($date2));
                           
                           
                           $days222 = $diff1 / (60 * 60 * 24);
                            $count1 = 0;
                           for ($l1=1; $l1 <= $days222; $l1++) { 
                            $time11 = strtotime($date2);
                            $final11 = date("Y-m-d", strtotime("+$l1 day", $time11));


                            $dayofweek1 = date('l', strtotime($final11));

     
                            if($dayofweek1 != 'Sunday')
                            {
                                $count1++;
                            }
                           }
                           $hours1 = ($count1+1)*8;


                        $hieusuat = floor((($hours)/($hours1))*100);
=======
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
                       echo $hieusuat.'%';


<<<<<<< HEAD
                       if($hieusuat > 0)
=======
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
                       {
                           $lengthchuoi = strlen($mathe1);

                           $tablenhanvien = 'hieusuat';
                           $laydulieu = $db->getDataNgayBatDauCongDoan($tablenhanvien,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                           
                           if($laydulieu <= 0)
                           {
                            
                              if($lengthchuoi <= 8)
                           {
                                $tablenhanvien = 'hieusuat';
                                $db->InsertHieuSuat1($tablenhanvien,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$hieusuat,$mathe,$mathe1,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                           }
                           else if($lengthchuoi > 8)
                           {
                                $tablenhanvien = 'hieusuat';
                                $mangnhanvien = array();
                                $mangnhanvien = explode(',', $mathe1);
                                $demmangnhanvien = count($mangnhanvien);
                                $mathe2 = 0;
                                for ($i=0; $i < $demmangnhanvien; $i++) { 
                                    $mathe2 = $mangnhanvien[$i];
                                    $db->InsertHieuSuat1($tablenhanvien,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$hieusuat,$mathe,$mathe1,$mathe2,$nhomthuchien,$nhomthuchien1,$bophan);
                                }
                           }

                           }
                           else
                           {
                                $tablenhanvien = 'hieusuat';
                                $db->UpdateHieuSuatPhanTram($tablenhanvien,$hieusuat,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                           }
                           
                       }
                       
                   }
                   else
                   {
                      echo 0;
                   }
                        
                       
                   
                   ?>
                </td>

                <td style="vertical-align: middle;">
                    
                    <?php 
                        
                        $tabletrongngay = 'trongngay1';
                        $mathe = $dataID['mathe'];
                        $nhomthuchien = $dataID['nhomthuchien'];
                        $tenmay = $dataID['tenmay'];
                        $ngaybatdau = $dataID['ngaybatdau'];
                        $ngaydukien = $dataID['ngaydukien'];
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $today =  Date("Y-m-d", time());
                        


                        $diff1 = abs(strtotime($ngaybatdau1) - strtotime($today));
                        $days1 = $diff1 / (60 * 60 * 24);
                        $hours1 = $days1*8;
                        
                        
                        $date6 = $today;
                        $diff2 = abs(strtotime($ngaybatdau1) - strtotime($date6));
                        $days2 = $diff2 / (60 * 60 * 24);

                        if($ngaybatdau1 > 0)
                        {
                             $tongtangca = 0;
                            for ($g=1; $g <= $days2; $g++) { 
                            $time1 = strtotime($ngaybatdau1);
                            $final1 = date("Y-m-d", strtotime("+$g day", $time1));
                            $tangca = $db->getDataTanCa($tabletrongngay,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$final1,$bophan);
                  
                                   if($db->num_row()>0)
                                   {              
                                        if($tangca[0] != 0)
                                        {
                                            $tangca1 = $tangca[0] - 8;
                                            $tongtangca = $tongtangca + $tangca1;
                                        }
                                        else
                                        {
                                            $tangca[0] = 0;
                                            $tongtangca = $tongtangca + $tangca[0];
                                        }
                                   }
                                   
                               }
                                 echo $tongtangca;
                           }
                           else
                           {
                             echo $tongtangca = 0;
                           }

                     ?> 
               
               </td>

               <td style="vertical-align: middle;">
                   <?php echo $value['nhomthuchien1']; ?>
               </td>
           


               <td style='font-size: 20px;vertical-align: middle; '>

                    <a style="text-decoration: none;" data-bs-target="#edit<?php echo $valuengaybatdau['id']; ?>" href="" ><i style="font-size: 30px;" class="fa-solid fa-pen-to-square"></i></a>

 
                &ensp;
                    <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $valuengaybatdau['id']; ?>" href="" title="xóa"><i style="font-size: 30px;" class="fa-solid fa-trash-can"></i></a>
                &ensp;

                    <a data-bs-toggle="modal" data-bs-target="#check<?php echo $valuengaybatdau['id']; ?>" href=""><i style="font-size:30px;" class="fa-solid fa-circle-check"></i></a>   
                </td>   



            </tr>

            <?php }else{ ?>

                             <tr style="background: white;height: 20px;text-align:center;font-size: 20px;" id="hidden<?php echo $value['id']; ?>">


                <td style='vertical-align: middle;'> 
                  <?php echo $value['tenmay1']; ?>
                </td> 


                <td style='vertical-align: middle;'><?php echo $value['tiendo'].'%'; ?></td>

                <td style='vertical-align: middle;'>
                  <?php echo $value['ngaybatdau1']; ?>
                        
                </td>

                <td style='vertical-align: middle;'>
                  <?php echo $value['ngaydukien1']; ?>  
                </td>


                <td style='font-weight: bold;font-size: 22px;vertical-align: middle;'>


                  
                        <button style="font-size: 17px;" data-bs-toggle="modal" data-bs-target="#timehoanthanh<?php echo $value['id']; ?>" class="btn btn-primary">
                          <?php 
                             $tablecongdoan = 'congdoan1';
                         $tenmay = $dataID['tenmay'];
                         $ngaybatdau = $dataID['ngaybatdau'];
                         $ngaydukien = $dataID['ngaydukien'];
                         $mathe = $dataID['mathe'];
                         $nhomthuchien = $dataID['nhomthuchien'];
                         $bophan = $dataID['bophan'];

                         date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $today =  Date("Y-m-d", time());
                            $tenmay1 = $value['tenmay1'];
                            $ngaybatdau1 = $value['ngaybatdau1'];
                            $ngaydukien1 = $value['ngaydukien1'];
                            $mathe1 = $value['mathe1'];
                            $nhomthuchien1 = $value['nhomthuchien1'];

                     $valuengaybatdau = $db->getDataNgayBatDauCongDoan($tablecongdoan,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                     if($valuengaybatdau > 0)
                     {
                        $giohoanthanh = $valuengaybatdau['hoanthanh'];
                         echo $giohoanthanh;
                     } 
                     else
                     {
                         echo 0;
                     } 

                        ?>
    
                </button>

                </td>  


    
                <td style='vertical-align: middle;'>
                    <?php 
                       $hours = 0;
                       $count = 0;
                        $tablecongdoan = 'congdoan1';
                         $tenmay = $dataID['tenmay'];
                         $ngaybatdau = $dataID['ngaybatdau'];
                         $ngaydukien = $dataID['ngaydukien'];
                         $mathe = $dataID['mathe'];
                         $nhomthuchien = $dataID['nhomthuchien'];
                         $bophan = $dataID['bophan'];


                         $tenmay1 = $value['tenmay1'];
                         $ngaybatdau1 = $value['ngaybatdau1'];
                         $ngaydukien1 = $value['ngaydukien1'];
                         $mathe1 = $value['mathe1'];
                         $nhomthuchien1 = $value['nhomthuchien1'];


                       $valuengaybatdau = $db->getDataNgayBatDauCongDoan($tablecongdoan,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                
                           $date1 = $valuengaybatdau['ngaydukien1'];
                           $date2 = $valuengaybatdau['ngaybatdau1']; 
                           $diff = abs(strtotime($date1) - strtotime($date2));

                           $days22 = $diff / (60 * 60 * 24);
                              
                           for ($l=1; $l <= $days22; $l++) { 
                            $time1 = strtotime($date2);
                            $final1 = date("Y-m-d", strtotime("+$l day", $time1));


                            $dayofweek = date('l', strtotime($final1));

     
                            if($dayofweek != 'Sunday')
                            {
                                $count++;
                            }
                           }
                           $hours = ($count+1)*8;

                           echo $hours;//////////////////////////+8
                     ?>
                </td>

                <td style="vertical-align: middle;"><!--  Tự Điền số giờ làm viecj trong ngày -->

                          <button data-bs-toggle="modal" data-bs-target="#timetrongngay<?php echo $valuengaybatdau['id']; ?>" class="btn btn-primary" style="">
                        <?php 
                            $tabletrongngay = 'trongngay1';
                            $mathe = $dataID['mathe'];
                            $nhomthuchien = $dataID['nhomthuchien'];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];
                            $bophan = $dataID['bophan'];
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $today =  Date("Y-m-d", time());
                            $tenmay1 = $value['tenmay1'];
                            $ngaybatdau1 = $value['ngaybatdau1'];
                            $ngaydukien1 = $value['ngaydukien1'];
                            $mathe1 = $value['mathe1'];
                            $nhomthuchien1 = $value['nhomthuchien1'];


                                $giotrongngay = $db->getDataTrongNgay($tabletrongngay,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$today,$bophan);
                               if($db->num_row()>0)
                               {
                                  if($giotrongngay[0] != null && $giotrongngay[0] > 0){
                                    echo $giotrongngay[0];
                                  }
                                  else{

                                    echo 8;
                                  }
                               }else
                               {
                                echo 8;
                               }


                        ?>
                    </button>

                </td>
             
                <td style='font-weight: bold;font-size: 25px;vertical-align: middle;'>

                

                    <button style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#tangca<?php echo $value['id']; ?>" class="btn btn-primary">
                            
                      
                      <?php 

                              $tabletrongngay = 'trongngay1';
                              $ngaybatdau1 = $value['ngaybatdau1'];
                              $ngaydukien1 = $value['ngaydukien1'];
                              $mathe1 = $value['mathe1'];
                              $bophan = $value['bophan'];
                              $nhomthuchien1 = $value['nhomthuchien1'];
                              $tenmay1 = $value['tenmay1'];

                              if($giohoanthanh > 0)
                              {
                                $diff2 = abs(strtotime($giohoanthanh) - strtotime($ngaybatdau1));
                                $days3 = $diff2 / (60 * 60 * 24);
                              }
                              else
                              {
                                $diff2 = abs(strtotime($today) - strtotime($ngaybatdau1));
                                $days3 = $diff2 / (60 * 60 * 24);
                              }

                               $tongthucte = 0;
                              if($today > $ngaybatdau1)
                              {

                              for ($g=1; $g <= $days3+1; $g++) { 
                                $time1 = strtotime($ngaybatdau1);
                                $final1 = date("Y-m-d", strtotime("+$g day", $time1));
                                $tangca = $db->getDataTanCa1($tabletrongngay,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$final1,$bophan);

                                $dayofweek = date('l', strtotime($final1));


                                if($tangca > 0)
                                {
                                    $tongthucte = $tongthucte + $tangca[8];
                                }
                                else if($dayofweek != 'Sunday')
                                {
                                    $tongthucte = $tongthucte + 8;
                                }
                              }
                              
                        }
                         echo $tongthucte;

                       ?>
                      



                </button>

                </td>  
            
                <td style='font-weight: bold;vertical-align: middle;'>
                    <?php 

                      if($giohoanthanh > 0)
                      {
                           $date3 = $giohoanthanh;
                           $date2 = $valuengaybatdau['ngaybatdau1']; 
                           $diff1 = abs(strtotime($date3) - strtotime($date2));
                           
                           
                           $days222 = $diff1 / (60 * 60 * 24);
                            $count1 = 0;
                           for ($l1=1; $l1 <= $days222; $l1++) { 
                            $time11 = strtotime($date2);
                            $final11 = date("Y-m-d", strtotime("+$l1 day", $time11));


                            $dayofweek1 = date('l', strtotime($final11));

     
                            if($dayofweek1 != 'Sunday')
                            {
                                $count1++;
                            }
                           }
                           $hours1 = ($count1+1)*8;


                        $hieusuat = floor((($hours)/($hours1))*100);
                       echo $hieusuat.'%';


                       if($hieusuat > 0)
                       {
                           $lengthchuoi = strlen($mathe1);

                           $tablenhanvien = 'hieusuat';
                           $laydulieu = $db->getDataNgayBatDauCongDoan($tablenhanvien,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                           
                           if($laydulieu <= 0)
                           {
                            
                              if($lengthchuoi <= 8)
                           {
                                $tablenhanvien = 'hieusuat';
                                $db->InsertHieuSuat1($tablenhanvien,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$hieusuat,$mathe,$mathe1,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                           }
                           else if($lengthchuoi > 8)
                           {
                                $tablenhanvien = 'hieusuat';
                                $mangnhanvien = array();
                                $mangnhanvien = explode(',', $mathe1);
                                $demmangnhanvien = count($mangnhanvien);
                                $mathe2 = 0;
                                for ($i=0; $i < $demmangnhanvien; $i++) { 
                                    $mathe2 = $mangnhanvien[$i];
                                    $db->InsertHieuSuat1($tablenhanvien,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$hieusuat,$mathe,$mathe1,$mathe2,$nhomthuchien,$nhomthuchien1,$bophan);
                                }
                           }

                           }
                           else
                           {
                                $tablenhanvien = 'hieusuat';
                                $db->UpdateHieuSuatPhanTram($tablenhanvien,$hieusuat,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan);
                           }
                           
                       }
                       
                   }
                   else
                   {
                      echo 0;
                   }
                        
                       
                   
                   ?>
                </td>

                <td style="vertical-align: middle;">
                    
                    <?php 
                        
                        $tabletrongngay = 'trongngay1';
                        $mathe = $dataID['mathe'];
                        $nhomthuchien = $dataID['nhomthuchien'];
                        $tenmay = $dataID['tenmay'];
                        $ngaybatdau = $dataID['ngaybatdau'];
                        $ngaydukien = $dataID['ngaydukien'];
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $today =  Date("Y-m-d", time());
                        


                        $diff1 = abs(strtotime($ngaybatdau1) - strtotime($today));
                        $days1 = $diff1 / (60 * 60 * 24);
                        $hours1 = $days1*8;
                        
                        
                        $date6 = $today;
                        $diff2 = abs(strtotime($ngaybatdau1) - strtotime($date6));
                        $days2 = $diff2 / (60 * 60 * 24);

                        if($ngaybatdau1 > 0)
                        {
                             $tongtangca = 0;
                            for ($g=1; $g <= $days2; $g++) { 
                            $time1 = strtotime($ngaybatdau1);
                            $final1 = date("Y-m-d", strtotime("+$g day", $time1));
                            $tangca = $db->getDataTanCa($tabletrongngay,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$final1,$bophan);
                  
                                   if($db->num_row()>0)
                                   {              
                                        if($tangca[0] != 0)
                                        {
                                            $tangca1 = $tangca[0] - 8;
                                            $tongtangca = $tongtangca + $tangca1;
                                        }
                                        else
                                        {
                                            $tangca[0] = 0;
                                            $tongtangca = $tongtangca + $tangca[0];
                                        }
                                   }
                                   
                               }
                                 echo $tongtangca;
                           }
                           else
                           {
                             echo $tongtangca = 0;
                           }

                     ?> 
               
               </td>

               <td style="vertical-align: middle;">
                   <?php echo $value['nhomthuchien1']; ?>
               </td>
           


               <td style='font-size: 20px;vertical-align: middle; '>

                    <a style="text-decoration: none;"data-bs-toggle="modal" data-bs-target="#edit<?php echo $valuengaybatdau['id']; ?>" href="" ><i style="font-size: 30px;" class="fa-solid fa-pen-to-square"></i></a>

 
                &ensp;
                    <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $valuengaybatdau['id']; ?>" href="" title="xóa"><i style="font-size: 30px;" class="fa-solid fa-trash-can"></i></a>
                &ensp;

                    <a data-bs-toggle="modal" data-bs-target="#check<?php echo $valuengaybatdau['id']; ?>" href=""><i style="font-size:30px;" class="fa-solid fa-circle-check"></i></a>   
                </td>   



            </tr>

        <?php } } } ?>
            </tbody>
        </table>
          </div>
         
            
            </div>
</section>



<<<<<<< HEAD

<!-- thêm công đoạn -->
=======
<!-- THời Gian Hoàn thành -->
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3

<?php for ($i=0; $i < 10; $i++) { 

?>

<<<<<<< HEAD
<form method="POST" action="">
<div class="modal fade" id="addcongdoan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Công Đoạn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>
            <input type="text" name="congdoan" class="form-control" id="recipient-name">
          </div>

           <input type="hidden" name="tenmay" value="<?php echo $dataID['tenmay']; ?>">
           <input type="hidden" name="tenline" value="<?php echo $dataID['tenline']; ?>">
           <input type="hidden" name="ngaybatdau" value="<?php echo $dataID['ngaybatdau']; ?>">
           <input type="hidden" name="ngaydukien" value="<?php echo $dataID['ngaydukien']; ?>">
           <input type="hidden" name="mathe" value="<?php echo $dataID['mathe']; ?>">
           <input type="hidden" name="bophan" value="<?php echo $dataID['bophan']; ?>">
           <input type="hidden" name="nhomthuchien" value="<?php echo $dataID['nhomthuchien']; ?>">
=======
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
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Ngày Bắt Đầu:</label>
             <input type="date" name="ngaybatdau1" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
<<<<<<< HEAD
            <label for="message-text" class="col-form-label">NgàyDự Kiến:</label>
             <input type="date" name="ngaydukien1" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>
            <input type="text" name="mathe1" class="form-control" id="matheId">
=======
            <label for="recipient-name" id="tieudehoanthanh<?php echo $i+1; ?>" class="col-form-label tieudehoanthanh<?php echo $i+1; ?>"style="display:none;">Giờ Hoàn Thành(Giờ) <?php echo $m1[$i]; ?> :</label>
            <input type="number" min="0" max="10000" required ="required" name="namehoanthanh" class="form-control idinputhoanthanh" id="idinputhoanthanh<?php echo $i+1; ?>"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspanhoanthanh<?php echo $i+1; ?>" class="idinputhoanthanh<?php echo $i+1; ?>"></span>
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Thành Viên:</label>
            <input type="text" name="thanhvien" class="form-control" id="nhomthuchienId">
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
<<<<<<< HEAD
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="themcongdoan" class="btn btn-primary">Xác Nhận</button>
=======
        <span class="btn btn-primary submitmayhoanthanh<?php echo $i+1; ?>" id="submitmayhoanthanh<?php echo $i+1; ?>" name="submitmayhoanthanh">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submithoanthanh<?php echo $i+1; ?>" id="submithoanthanh<?php echo $i+1; ?>" name="submithoanthanh"style="display:none;">Xác Nhận</button>
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
      </div>
    </div>
  </div>
</div>
</form>

<?php } ?>


<!-- THời Gian Ngày Bắt Đầu -->


<<<<<<< HEAD
=======
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




>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
<!-- edit -->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[1]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $mangtenmay[1]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[1]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[1]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[1]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe1" class="form-control" value="<?php echo $mangmathe[1]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien1" class="form-control" value="<?php echo $mangnhomthuchien[1]; ?>">


            <div class="search-input1" style="text-align: center;">
                   <input type="text" id="inputsearch1" class="inputsearch1" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box1">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[1]; ?>">
              
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




<!-- edit 2-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[2]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $mangtenmay[2]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[2]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[2]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[2]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe2" class="form-control" value="<?php echo $mangmathe[2]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien2" class="form-control" value="<?php echo $mangnhomthuchien[2]; ?>">


            <div class="search-input2" style="text-align: center;">
                   <input type="text" id="inputsearch2" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box2">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[2]; ?>">
              
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






<!-- edit 3-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[3]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $mangtenmay[3]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[3]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[3]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[3]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe3" class="form-control" value="<?php echo $mangmathe[3]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien3" class="form-control" value="<?php echo $mangnhomthuchien[3]; ?>">


            <div class="search-input3" style="text-align: center;">
                   <input type="text" id="inputsearch3" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box3">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[3]; ?>">
              
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





<!-- edit 4-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[4]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $mangtenmay[4]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[4]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[4]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[4]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe4" class="form-control" value="<?php echo $mangmathe[4]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien4" class="form-control" value="<?php echo $mangnhomthuchien[4]; ?>">


            <div class="search-input4" style="text-align: center;">
                   <input type="text" id="inputsearch4" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box4">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[4]; ?>">
              
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






<!-- edit 5-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[5]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $mangtenmay[5]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[5]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[5]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[5]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe5" class="form-control" value="<?php echo $mangmathe[5]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien5" class="form-control" value="<?php echo $mangnhomthuchien[5]; ?>">


            <div class="search-input5" style="text-align: center;">
                   <input type="text" id="inputsearch5" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box5">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[5]; ?>">
              
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





<!-- edit 6-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[6]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $mangtenmay[6]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[6]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[6]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[6]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe6" class="form-control" value="<?php echo $mangmathe[6]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien6" class="form-control" value="<?php echo $mangnhomthuchien[6]; ?>">


            <div class="search-input6" style="text-align: center;">
                   <input type="text" id="inputsearch6" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box6">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[6]; ?>">
              
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






<!-- edit 7-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[7]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $mangtenmay[7]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[7]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[7]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[7]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe7" class="form-control" value="<?php echo $mangmathe[7]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien7" class="form-control" value="<?php echo $mangnhomthuchien[7]; ?>">


            <div class="search-input7" style="text-align: center;">
                   <input type="text" id="inputsearch7" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box7">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[7]; ?>">
              
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







<!-- edit 8-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[8]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 800">Sửa Tiến Độ <?php echo $mangtenmay[8]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[8]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[8]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[8]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe8" class="form-control" value="<?php echo $mangmathe[8]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien8" class="form-control" value="<?php echo $mangnhomthuchien[8]; ?>">


            <div class="search-input8" style="text-align: center;">
                   <input type="text" id="inputsearch8" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box8">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[8]; ?>">
              
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





<!-- edit 9-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[9]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 900">Sửa Tiến Độ <?php echo $mangtenmay[9]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[9]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[9]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[9]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe9" class="form-control" value="<?php echo $mangmathe[9]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien9" class="form-control" value="<?php echo $mangnhomthuchien[9]; ?>">


            <div class="search-input9" style="text-align: center;">
                   <input type="text" id="inputsearch9" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box9">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[9]; ?>">
              
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





<!-- edit 10-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[10]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1000">Sửa Tiến Độ <?php echo $mangtenmay[10]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[10]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[10]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[10]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe10" class="form-control" value="<?php echo $mangmathe[10]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien10" class="form-control" value="<?php echo $mangnhomthuchien[10]; ?>">


            <div class="search-input10" style="text-align: center;">
                   <input type="text" id="inputsearch10" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box10">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[10]; ?>">
              
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






<!-- edit 11-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[11]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1100">Sửa Tiến Độ <?php echo $mangtenmay[11]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[11]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[11]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[11]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe11" class="form-control" value="<?php echo $mangmathe[11]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien11" class="form-control" value="<?php echo $mangnhomthuchien[11]; ?>">


            <div class="search-input11" style="text-align: center;">
                   <input type="text" id="inputsearch11" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box11">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[11]; ?>">
              
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






<!-- edit 12-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[12]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1200">Sửa Tiến Độ <?php echo $mangtenmay[12]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[12]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[12]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[12]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe12" class="form-control" value="<?php echo $mangmathe[12]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien12" class="form-control" value="<?php echo $mangnhomthuchien[12]; ?>">


            <div class="search-input12" style="text-align: center;">
                   <input type="text" id="inputsearch12" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box12">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[12]; ?>">
              
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






<!-- edit 13-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[13]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1300">Sửa Tiến Độ <?php echo $mangtenmay[13]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[13]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[13]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[13]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe13" class="form-control" value="<?php echo $mangmathe[13]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien13" class="form-control" value="<?php echo $mangnhomthuchien[13]; ?>">


            <div class="search-input13" style="text-align: center;">
                   <input type="text" id="inputsearch13" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box13">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[13]; ?>">
              
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






<!-- edit 14-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[14]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1400">Sửa Tiến Độ <?php echo $mangtenmay[14]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[14]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[14]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[14]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe14" class="form-control" value="<?php echo $mangmathe[14]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien14" class="form-control" value="<?php echo $mangnhomthuchien[14]; ?>">


            <div class="search-input14" style="text-align: center;">
                   <input type="text" id="inputsearch14" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box14">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[14]; ?>">
              
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





<!-- edit 15-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[15]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1500">Sửa Tiến Độ <?php echo $mangtenmay[15]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[15]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[15]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[15]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe15" class="form-control" value="<?php echo $mangmathe[15]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien15" class="form-control" value="<?php echo $mangnhomthuchien[15]; ?>">


            <div class="search-input15" style="text-align: center;">
                   <input type="text" id="inputsearch15" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box15">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[15]; ?>">
              
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








<!-- edit 16-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[16]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1600">Sửa Tiến Độ <?php echo $mangtenmay[16]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[16]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[16]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[16]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe16" class="form-control" value="<?php echo $mangmathe[16]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien16" class="form-control" value="<?php echo $mangnhomthuchien[16]; ?>">


            <div class="search-input16" style="text-align: center;">
                   <input type="text" id="inputsearch16" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box16">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[16]; ?>">
              
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





<!-- edit 17-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[17]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1700">Sửa Tiến Độ <?php echo $mangtenmay[17]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[17]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[17]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[17]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe17" class="form-control" value="<?php echo $mangmathe[17]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien17" class="form-control" value="<?php echo $mangnhomthuchien[17]; ?>">


            <div class="search-input17" style="text-align: center;">
                   <input type="text" id="inputsearch17" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box17">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[17]; ?>">
              
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






<!-- edit 18-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[18]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1800">Sửa Tiến Độ <?php echo $mangtenmay[18]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[18]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[18]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[18]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe18" class="form-control" value="<?php echo $mangmathe[18]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien18" class="form-control" value="<?php echo $mangnhomthuchien[18]; ?>">


            <div class="search-input18" style="text-align: center;">
                   <input type="text" id="inputsearch18" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box18">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[18]; ?>">
              
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





<!-- edit 19-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[19]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 1900">Sửa Tiến Độ <?php echo $mangtenmay[19]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[19]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[19]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[19]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe19" class="form-control" value="<?php echo $mangmathe[19]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien19" class="form-control" value="<?php echo $mangnhomthuchien[19]; ?>">


            <div class="search-input19" style="text-align: center;">
                   <input type="text" id="inputsearch19" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box19">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[19]; ?>">
              
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





<!-- edit 20-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[20]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2000">Sửa Tiến Độ <?php echo $mangtenmay[20]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[20]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[20]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[20]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe20" class="form-control" value="<?php echo $mangmathe[20]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien20" class="form-control" value="<?php echo $mangnhomthuchien[20]; ?>">


            <div class="search-input20" style="text-align: center;">
                   <input type="text" id="inputsearch20" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box20">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[20]; ?>">
              
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





<!-- edit 21-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[21]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2100">Sửa Tiến Độ <?php echo $mangtenmay[21]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[21]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[21]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[21]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe21" class="form-control" value="<?php echo $mangmathe[21]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien21" class="form-control" value="<?php echo $mangnhomthuchien[21]; ?>">


            <div class="search-input21" style="text-align: center;">
                   <input type="text" id="inputsearch21" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box21">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[21]; ?>">
              
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







<!-- edit 22-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[22]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2200">Sửa Tiến Độ <?php echo $mangtenmay[22]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[22]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[22]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[22]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe22" class="form-control" value="<?php echo $mangmathe[22]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien22" class="form-control" value="<?php echo $mangnhomthuchien[22]; ?>">


            <div class="search-input22" style="text-align: center;">
                   <input type="text" id="inputsearch22" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box22">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[22]; ?>">
              
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






<!-- edit 23-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[23]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2300">Sửa Tiến Độ <?php echo $mangtenmay[23]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[23]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[23]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[23]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe23" class="form-control" value="<?php echo $mangmathe[23]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien23" class="form-control" value="<?php echo $mangnhomthuchien[23]; ?>">


            <div class="search-input23" style="text-align: center;">
                   <input type="text" id="inputsearch23" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box23">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[23]; ?>">
              
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






<!-- edit 24-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[24]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2400">Sửa Tiến Độ <?php echo $mangtenmay[24]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[24]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[24]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[24]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe24" class="form-control" value="<?php echo $mangmathe[24]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien24" class="form-control" value="<?php echo $mangnhomthuchien[24]; ?>">


            <div class="search-input24" style="text-align: center;">
                   <input type="text" id="inputsearch24" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box24">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[24]; ?>">
              
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







<!-- edit 25-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[25]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2500">Sửa Tiến Độ <?php echo $mangtenmay[25]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[25]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[25]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[25]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe25" class="form-control" value="<?php echo $mangmathe[25]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien25" class="form-control" value="<?php echo $mangnhomthuchien[25]; ?>">


            <div class="search-input25" style="text-align: center;">
                   <input type="text" id="inputsearch25" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box25">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[25]; ?>">
              
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






<!-- edit 26-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[26]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2600">Sửa Tiến Độ <?php echo $mangtenmay[26]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[26]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[26]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[26]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe26" class="form-control" value="<?php echo $mangmathe[26]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien26" class="form-control" value="<?php echo $mangnhomthuchien[26]; ?>">


            <div class="search-input26" style="text-align: center;">
                   <input type="text" id="inputsearch26" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box26">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[26]; ?>">
              
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





<!-- edit 27-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[27]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2700">Sửa Tiến Độ <?php echo $mangtenmay[27]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[27]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[27]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[27]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe27" class="form-control" value="<?php echo $mangmathe[27]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien27" class="form-control" value="<?php echo $mangnhomthuchien[27]; ?>">


            <div class="search-input27" style="text-align: center;">
                   <input type="text" id="inputsearch27" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box27">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[27]; ?>">
              
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





<!-- edit 28-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[28]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2800">Sửa Tiến Độ <?php echo $mangtenmay[28]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[28]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[28]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[28]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe28" class="form-control" value="<?php echo $mangmathe[28]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien28" class="form-control" value="<?php echo $mangnhomthuchien[28]; ?>">


            <div class="search-input28" style="text-align: center;">
                   <input type="text" id="inputsearch28" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box28">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[28]; ?>">
              
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





<!-- edit 29-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[29]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 2900">Sửa Tiến Độ <?php echo $mangtenmay[29]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[29]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[29]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[29]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe29" class="form-control" value="<?php echo $mangmathe[29]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien29" class="form-control" value="<?php echo $mangnhomthuchien[29]; ?>">


            <div class="search-input29" style="text-align: center;">
                   <input type="text" id="inputsearch29" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box29">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[29]; ?>">
              
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






<!-- edit 30-->


<?php if($datacongdoan > 0)
{
    foreach ($datacongdoan as $value) {
 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $manginput[30]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 3000">Sửa Tiến Độ <?php echo $mangtenmay[30]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $mangtenmay[30]; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $mangngaybatdau[30]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $mangngaydukien[30]; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe30" class="form-control" value="<?php echo $mangmathe[30]; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien30" class="form-control" value="<?php echo $mangnhomthuchien[30]; ?>">


            <div class="search-input30" style="text-align: center;">
                   <input type="text" id="inputsearch30" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box30">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="id" value="<?php echo $manginput[30]; ?>">
              
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





<!-- Tăng Ca -->

<?php 
$tabletrongngay = 'trongngay';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$today =  Date("Y-m-d", time());




if($datacongdoan > 0)
{
foreach ($datacongdoan as $value) {
 
  $tabletrongngay = 'trongngay1';
  $ngaybatdau1 = $value['ngaybatdau1'];
  $ngaydukien1 = $value['ngaydukien1'];
  $mathe1 = $value['mathe1'];
  $bophan = $value['bophan'];
  $nhomthuchien1 = $value['nhomthuchien1'];
  $tenmay1 = $value['tenmay1'];
  $diff2 = abs(strtotime($today) - strtotime($ngaybatdau1));
  $days3 = $diff2 / (60 * 60 * 24);

  
 ?>
<form method="POST" action="">
<div class="modal fade" id="tangca<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lịch Sử Tăng Ca:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <table class="table">
          <thead>
            <tr>
              <th scope="col">Thời Gian làm(h)</th>
              <th scope="col">Tăng ca(h)</th>
              <th scope="col">Ngày</th>
            </tr>
          </thead>
          <tbody>
            <?php
               for ($g=0; $g < $days3+1; $g++) { 
                $time1 = strtotime($ngaybatdau1);
                $final11 = date("Y-m-d", strtotime("+$g day", $time1));
                $tangca = $db->getDataTanCa1($tabletrongngay,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$final11,$bophan);
              // echo "<script type='text/javascript'>alert('$final1');</script>";
                $dayofweek10 = date('l', strtotime($final11));
            
            if($dayofweek10 != 'Sunday')
            {
            if($tangca > 0)
            {
             ?>
            <tr>
              <td><?php echo $tangca[8]; ?></td>
              <td><?php echo $tangca[8]-8; ?></td>
              <td><?php echo $final11; ?></td>
            </tr>
           <?php }else{ ?>
                    
            <tr>
              <td><?php echo 8; ?></td>
              <td><?php echo 0; ?></td>
              <td><?php echo $final11; ?></td>
            </tr>

          <?php } }else{ ?>

            <tr>
              <td><?php echo 'Chủ Nhật'; ?></td>
              <td><?php echo 'Chủ Nhật'; ?></td>
              <td><?php echo 'Chủ Nhật'; ?></td>
            </tr>
               


       <?php    } }

            ?>
          </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } } ?>





<!-- xóa -->

<?php 
if($datacongdoan > 0)
{
foreach ($datacongdoan as $value) {

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






<!-- check -->

<?php 
if($datacongdoan > 0)
{
foreach ($datacongdoan as $value) {

 ?>
<form method="POST" action="">
<div class="modal fade" id="check<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Hoàn Thành Công Đoạn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idddd" value="<?php echo $value['id']; ?>">
        Bạn Chắc Chắn Hoàn Thành Không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
        <button type="submit" id="check" name="check" class="btn btn-primary">Đồng Ý</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php } } ?>








<!-- trong ngay -->


<?php 
if($datacongdoan > 0)
{
foreach ($datacongdoan as $value) {
?>
<form method="POST" action="">
<div class="modal fade" id="timetrongngay<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Giờ Trong Ngày:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Giờ Trong Ngày(h):</label>
            <input type="number" min="0" max="11"  required ="required" name="nametrongngay" class="form-control">
            <input type="hidden" name="tenmay1" value="<?php echo $value['tenmay1']; ?>">
            <input type="hidden" name="ngaybatdau1" value="<?php echo $value['ngaybatdau1']; ?>">
            <input type="hidden" name="ngaydukien1" value="<?php echo $value['ngaydukien1']; ?>">
            <input type="hidden" name="mathe1" value="<?php echo $value['mathe1']; ?>">
            <input type="hidden" name="nhomthuchien1" value="<?php echo $value['nhomthuchien1']; ?>">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="submittrongngay" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } } ?>



<!-- hoàn thành -->

<?php 
if($datacongdoan > 0)
{
foreach ($datacongdoan as $value) {
 ?>
<form method="POST" action="">
<div class="modal fade" id="timehoanthanh<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thời Gian Hoàn Thành:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Thời Gian Hoàn Thành(h):</label>
            <input type="date" data-date-format="DD MMMM YYYY"  required ="required" name="hoanthanh" class="form-control">
            <input type="hidden" name="tenmay1" value="<?php echo $value['tenmay1']; ?>">
            <input type="hidden" name="ngaybatdau1" value="<?php echo $value['ngaybatdau1']; ?>">
            <input type="hidden" name="ngaydukien1" value="<?php echo $value['ngaydukien1']; ?>">
            <input type="hidden" name="mathe1" value="<?php echo $value['mathe1']; ?>">
            <input type="hidden" name="nhomthuchien1" value="<?php echo $value['nhomthuchien1']; ?>">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="submithoanthanh" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } } ?>




<!-- DFM -->

<?php for ($i=1; $i <= $countcongdoan1; $i++) { 
 ?>
<form method="POST" action="">
<div class="modal fade" id="dfm<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Tiến Độ <?php echo $mangtenmay1[$i]; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cập Nhật Tiến Độ <?php echo $mangtenmay1[$i]; ?>(%):</label>
            <input type="number" max="100" min="0" required ="required" name="tiendo" class="form-control" value="<?php echo $mangtiendo[$i]; ?>">
            <input type="hidden" name="id" value="<?php echo $mangid[$i]; ?>">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="submitdfm<?php echo $i; ?>" class="btn btn-primary">Xác Nhận</button>
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





<script type="text/javascript">
<<<<<<< HEAD
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


<!-- thêm công đoạn -->


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
         console.log(userData)
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




   <!-- sửa công đoạn 2-->


 <script type="text/javascript">
       let searchWrapper2 = document.querySelector(".search-input2")
       let inputBox2 = document.querySelector("#inputsearch2")
       let suggBox2 = document.querySelector(".autocom-box2")
       let nhomthuchien2 = document.querySelector('#nhomthuchien2')
       let mathe2 = document.querySelector('#mathe2')
       var numberStore2 = [];
       var ma2 = [];

       inputBox2.onkeyup = (e) => {
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
            searchWrapper2.classList.add("active")
            showSuggettions2(emptyArray);
            let allList = suggBox2.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select2(this)")
            }
         }else{
            searchWrapper2.classList.remove("active")
         }
       }

       function select2(element){
        let selectUserData2 = element.textContent;
        // inputBox2.value = selectUserData2;
        const cat = selectUserData2.slice(0, -9)
        numberStore2 = [...numberStore2, cat];
        const cat2 = selectUserData2.slice(-8)
        ma2 = [...ma2, cat2];
        mathe2.value = ma2;
        nhomthuchien2.value = numberStore2;
        // inputBox2.value = ;
       }

       function showSuggettions2(list){
        let listData;
        if(!list.length){
             userValue = inputBox2.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox2.innerHTML = listData;
       }
   </script>




     <!-- sửa công đoạn 3-->


 <script type="text/javascript">
       let searchWrapper3 = document.querySelector(".search-input3")
       let inputBox3 = document.querySelector("#inputsearch3")
       let suggBox3 = document.querySelector(".autocom-box3")
       let nhomthuchien3 = document.querySelector('#nhomthuchien3')
       let mathe3 = document.querySelector('#mathe3')
       var numberStore3 = [];
       var ma3 = [];

       inputBox3.onkeyup = (e) => {
         let userData = e.target.value;
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper3.classList.add("active")
            showSuggettions3(emptyArray);
            let allList = suggBox3.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select3(this)")
            }
         }else{
            searchWrapper3.classList.remove("active")
         }
       }

       function select3(element){
        let selectUserData3 = element.textContent;
        // inputBox3.value = selectUserData3;
        const cat = selectUserData3.slice(0, -9)
        numberStore3 = [...numberStore3, cat];
        const cat3 = selectUserData3.slice(-8)
        ma3 = [...ma3, cat3];
        mathe3.value = ma3;
        nhomthuchien3.value = numberStore3;
        // inputBox3.value = ;
       }

       function showSuggettions3(list){
        let listData;
        if(!list.length){
             userValue = inputBox3.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox3.innerHTML = listData;
       }
   </script>





     <!-- sửa công đoạn 4-->


 <script type="text/javascript">
       let searchWrapper4 = document.querySelector(".search-input4")
       let inputBox4 = document.querySelector("#inputsearch4")
       let suggBox4 = document.querySelector(".autocom-box4")
       let nhomthuchien4 = document.querySelector('#nhomthuchien4')
       let mathe4 = document.querySelector('#mathe4')
       var numberStore4 = [];
       var ma4 = [];

       inputBox4.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper4.classList.add("active")
            showSuggettions4(emptyArray);
            let allList = suggBox4.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select4(this)")
            }
         }else{
            searchWrapper4.classList.remove("active")
         }
       }

       function select4(element){
        let selectUserData4 = element.textContent;
        // inputBox4.value = selectUserData4;
        const cat = selectUserData4.slice(0, -9)
        numberStore4 = [...numberStore4, cat];
        const cat4 = selectUserData4.slice(-8)
        ma4 = [...ma4, cat4];
        mathe4.value = ma4;
        nhomthuchien4.value = numberStore4;
        // inputBox4.value = ;
       }

       function showSuggettions4(list){
        let listData;
        if(!list.length){
             userValue = inputBox4.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox4.innerHTML = listData;
       }
   </script>





       <!-- sửa công đoạn 5-->


 <script type="text/javascript">
       let searchWrapper5 = document.querySelector(".search-input5")
       let inputBox5 = document.querySelector("#inputsearch5")
       let suggBox5 = document.querySelector(".autocom-box5")
       let nhomthuchien5 = document.querySelector('#nhomthuchien5')
       let mathe5 = document.querySelector('#mathe5')
       var numberStore5 = [];
       var ma5 = [];

       inputBox5.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper5.classList.add("active")
            showSuggettions5(emptyArray);
            let allList = suggBox5.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select5(this)")
            }
         }else{
            searchWrapper5.classList.remove("active")
         }
       }

       function select5(element){
        let selectUserData5 = element.textContent;
        // inputBox5.value = selectUserData5;
        const cat = selectUserData5.slice(0, -9)
        numberStore5 = [...numberStore5, cat];
        const cat5 = selectUserData5.slice(-8)
        ma5 = [...ma5, cat5];
        mathe5.value = ma5;
        nhomthuchien5.value = numberStore5;
        // inputBox5.value = ;
       }

       function showSuggettions5(list){
        let listData;
        if(!list.length){
             userValue = inputBox5.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox5.innerHTML = listData;
       }
   </script>




          <!-- sửa công đoạn 6-->


 <script type="text/javascript">
       let searchWrapper6 = document.querySelector(".search-input6")
       let inputBox6 = document.querySelector("#inputsearch6")
       let suggBox6 = document.querySelector(".autocom-box6")
       let nhomthuchien6 = document.querySelector('#nhomthuchien6')
       let mathe6 = document.querySelector('#mathe6')
       var numberStore6 = [];
       var ma6 = [];

       inputBox6.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper6.classList.add("active")
            showSuggettions6(emptyArray);
            let allList = suggBox6.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select6(this)")
            }
         }else{
            searchWrapper6.classList.remove("active")
         }
       }

       function select6(element){
        let selectUserData6 = element.textContent;
        // inputBox6.value = selectUserData6;
        const cat = selectUserData6.slice(0, -9)
        numberStore6 = [...numberStore6, cat];
        const cat6 = selectUserData6.slice(-8)
        ma6 = [...ma6, cat6];
        mathe6.value = ma6;
        nhomthuchien6.value = numberStore6;
        // inputBox6.value = ;
       }

       function showSuggettions6(list){
        let listData;
        if(!list.length){
             userValue = inputBox6.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox6.innerHTML = listData;
       }
   </script>





            <!-- sửa công đoạn 7-->


 <script type="text/javascript">
       let searchWrapper7 = document.querySelector(".search-input7")
       let inputBox7 = document.querySelector("#inputsearch7")
       let suggBox7 = document.querySelector(".autocom-box7")
       let nhomthuchien7 = document.querySelector('#nhomthuchien7')
       let mathe7 = document.querySelector('#mathe7')
       var numberStore7 = [];
       var ma7 = [];

       inputBox7.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper7.classList.add("active")
            showSuggettions7(emptyArray);
            let allList = suggBox7.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select7(this)")
            }
         }else{
            searchWrapper7.classList.remove("active")
         }
       }

       function select7(element){
        let selectUserData7 = element.textContent;
        // inputBox7.value = selectUserData7;
        const cat = selectUserData7.slice(0, -9)
        numberStore7 = [...numberStore7, cat];
        const cat7 = selectUserData7.slice(-8)
        ma7 = [...ma7, cat7];
        mathe7.value = ma7;
        nhomthuchien7.value = numberStore7;
        // inputBox7.value = ;
       }

       function showSuggettions7(list){
        let listData;
        if(!list.length){
             userValue = inputBox7.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox7.innerHTML = listData;
       }
   </script>






           <!-- sửa công đoạn 8-->


 <script type="text/javascript">
       let searchWrapper8 = document.querySelector(".search-input8")
       let inputBox8 = document.querySelector("#inputsearch8")
       let suggBox8 = document.querySelector(".autocom-box8")
       let nhomthuchien8 = document.querySelector('#nhomthuchien8')
       let mathe8 = document.querySelector('#mathe8')
       var numberStore8 = [];
       var ma8 = [];

       inputBox8.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper8.classList.add("active")
            showSuggettions8(emptyArray);
            let allList = suggBox8.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select8(this)")
            }
         }else{
            searchWrapper8.classList.remove("active")
         }
       }

       function select8(element){
        let selectUserData8 = element.textContent;
        // inputBox8.value = selectUserData8;
        const cat = selectUserData8.slice(0, -9)
        numberStore8 = [...numberStore8, cat];
        const cat8 = selectUserData8.slice(-8)
        ma8 = [...ma8, cat8];
        mathe8.value = ma8;
        nhomthuchien8.value = numberStore8;
        // inputBox8.value = ;
       }

       function showSuggettions8(list){
        let listData;
        if(!list.length){
             userValue = inputBox8.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox8.innerHTML = listData;
       }
   </script>






            <!-- sửa công đoạn 9-->


 <script type="text/javascript">
       let searchWrapper9 = document.querySelector(".search-input9")
       let inputBox9 = document.querySelector("#inputsearch9")
       let suggBox9 = document.querySelector(".autocom-box9")
       let nhomthuchien9 = document.querySelector('#nhomthuchien9')
       let mathe9 = document.querySelector('#mathe9')
       var numberStore9 = [];
       var ma9 = [];

       inputBox9.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper9.classList.add("active")
            showSuggettions9(emptyArray);
            let allList = suggBox9.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select9(this)")
            }
         }else{
            searchWrapper9.classList.remove("active")
         }
       }

       function select9(element){
        let selectUserData9 = element.textContent;
        // inputBox9.value = selectUserData9;
        const cat = selectUserData9.slice(0, -9)
        numberStore9 = [...numberStore9, cat];
        const cat9 = selectUserData9.slice(-8)
        ma9 = [...ma9, cat9];
        mathe9.value = ma9;
        nhomthuchien9.value = numberStore9;
        // inputBox9.value = ;
       }

       function showSuggettions9(list){
        let listData;
        if(!list.length){
             userValue = inputBox9.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox9.innerHTML = listData;
       }
   </script>







               <!-- sửa công đoạn 10-->


 <script type="text/javascript">
       let searchWrapper10 = document.querySelector(".search-input10")
       let inputBox10 = document.querySelector("#inputsearch10")
       let suggBox10 = document.querySelector(".autocom-box10")
       let nhomthuchien10 = document.querySelector('#nhomthuchien10')
       let mathe10 = document.querySelector('#mathe10')
       var numberStore10 = [];
       var ma10 = [];

       inputBox10.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper10.classList.add("active")
            showSuggettions10(emptyArray);
            let allList = suggBox10.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select10(this)")
            }
         }else{
            searchWrapper10.classList.remove("active")
         }
       }

       function select10(element){
        let selectUserData10 = element.textContent;
        // inputBox10.value = selectUserData10;
        const cat = selectUserData10.slice(0, -9)
        numberStore10 = [...numberStore10, cat];
        const cat10 = selectUserData10.slice(-8)
        ma10 = [...ma10, cat10];
        mathe10.value = ma10;
        nhomthuchien10.value = numberStore10;
        // inputBox10.value = ;
       }

       function showSuggettions10(list){
        let listData;
        if(!list.length){
             userValue = inputBox10.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox10.innerHTML = listData;
       }
   </script>





                  <!-- sửa công đoạn 11-->


 <script type="text/javascript">
       let searchWrapper11 = document.querySelector(".search-input11")
       let inputBox11 = document.querySelector("#inputsearch11")
       let suggBox11 = document.querySelector(".autocom-box11")
       let nhomthuchien11 = document.querySelector('#nhomthuchien11')
       let mathe11 = document.querySelector('#mathe11')
       var numberStore11 = [];
       var ma11 = [];

       inputBox11.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper11.classList.add("active")
            showSuggettions11(emptyArray);
            let allList = suggBox11.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select11(this)")
            }
         }else{
            searchWrapper11.classList.remove("active")
         }
       }

       function select11(element){
        let selectUserData11 = element.textContent;
        // inputBox11.value = selectUserData11;
        const cat = selectUserData11.slice(0, -9)
        numberStore11 = [...numberStore11, cat];
        const cat11 = selectUserData11.slice(-8)
        ma11 = [...ma11, cat11];
        mathe11.value = ma11;
        nhomthuchien11.value = numberStore11;
        // inputBox11.value = ;
       }

       function showSuggettions11(list){
        let listData;
        if(!list.length){
             userValue = inputBox11.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox11.innerHTML = listData;
       }
   </script>







                  <!-- sửa công đoạn 12-->


 <script type="text/javascript">
       let searchWrapper12 = document.querySelector(".search-input12")
       let inputBox12 = document.querySelector("#inputsearch12")
       let suggBox12 = document.querySelector(".autocom-box12")
       let nhomthuchien12 = document.querySelector('#nhomthuchien12')
       let mathe12 = document.querySelector('#mathe12')
       var numberStore12 = [];
       var ma12 = [];

       inputBox12.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper12.classList.add("active")
            showSuggettions12(emptyArray);
            let allList = suggBox12.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select12(this)")
            }
         }else{
            searchWrapper12.classList.remove("active")
         }
       }

       function select12(element){
        let selectUserData12 = element.textContent;
        // inputBox12.value = selectUserData12;
        const cat = selectUserData12.slice(0, -9)
        numberStore12 = [...numberStore12, cat];
        const cat12 = selectUserData12.slice(-8)
        ma12 = [...ma12, cat12];
        mathe12.value = ma12;
        nhomthuchien12.value = numberStore12;
        // inputBox12.value = ;
       }

       function showSuggettions12(list){
        let listData;
        if(!list.length){
             userValue = inputBox12.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox12.innerHTML = listData;
       }
   </script>





                     <!-- sửa công đoạn 13-->


 <script type="text/javascript">
       let searchWrapper13 = document.querySelector(".search-input13")
       let inputBox13 = document.querySelector("#inputsearch13")
       let suggBox13 = document.querySelector(".autocom-box13")
       let nhomthuchien13 = document.querySelector('#nhomthuchien13')
       let mathe13 = document.querySelector('#mathe13')
       var numberStore13 = [];
       var ma13 = [];

       inputBox13.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper13.classList.add("active")
            showSuggettions13(emptyArray);
            let allList = suggBox13.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select13(this)")
            }
         }else{
            searchWrapper13.classList.remove("active")
         }
       }

       function select13(element){
        let selectUserData13 = element.textContent;
        // inputBox13.value = selectUserData13;
        const cat = selectUserData13.slice(0, -9)
        numberStore13 = [...numberStore13, cat];
        const cat13 = selectUserData13.slice(-8)
        ma13 = [...ma13, cat13];
        mathe13.value = ma13;
        nhomthuchien13.value = numberStore13;
        // inputBox13.value = ;
       }

       function showSuggettions13(list){
        let listData;
        if(!list.length){
             userValue = inputBox13.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox13.innerHTML = listData;
       }
   </script>





                      <!-- sửa công đoạn 14-->


 <script type="text/javascript">
       let searchWrapper14 = document.querySelector(".search-input14")
       let inputBox14 = document.querySelector("#inputsearch14")
       let suggBox14 = document.querySelector(".autocom-box14")
       let nhomthuchien14 = document.querySelector('#nhomthuchien14')
       let mathe14 = document.querySelector('#mathe14')
       var numberStore14 = [];
       var ma14 = [];

       inputBox14.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper14.classList.add("active")
            showSuggettions14(emptyArray);
            let allList = suggBox14.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select14(this)")
            }
         }else{
            searchWrapper14.classList.remove("active")
         }
       }

       function select14(element){
        let selectUserData14 = element.textContent;
        // inputBox14.value = selectUserData14;
        const cat = selectUserData14.slice(0, -9)
        numberStore14 = [...numberStore14, cat];
        const cat14 = selectUserData14.slice(-8)
        ma14 = [...ma14, cat14];
        mathe14.value = ma14;
        nhomthuchien14.value = numberStore14;
        // inputBox14.value = ;
       }

       function showSuggettions14(list){
        let listData;
        if(!list.length){
             userValue = inputBox14.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox14.innerHTML = listData;
       }
   </script>





                         <!-- sửa công đoạn 15-->


 <script type="text/javascript">
       let searchWrapper15 = document.querySelector(".search-input15")
       let inputBox15 = document.querySelector("#inputsearch15")
       let suggBox15 = document.querySelector(".autocom-box15")
       let nhomthuchien15 = document.querySelector('#nhomthuchien15')
       let mathe15 = document.querySelector('#mathe15')
       var numberStore15 = [];
       var ma15 = [];

       inputBox15.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper15.classList.add("active")
            showSuggettions15(emptyArray);
            let allList = suggBox15.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select15(this)")
            }
         }else{
            searchWrapper15.classList.remove("active")
         }
       }

       function select15(element){
        let selectUserData15 = element.textContent;
        // inputBox15.value = selectUserData15;
        const cat = selectUserData15.slice(0, -9)
        numberStore15 = [...numberStore15, cat];
        const cat15 = selectUserData15.slice(-8)
        ma15 = [...ma15, cat15];
        mathe15.value = ma15;
        nhomthuchien15.value = numberStore15;
        // inputBox15.value = ;
       }

       function showSuggettions15(list){
        let listData;
        if(!list.length){
             userValue = inputBox15.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox15.innerHTML = listData;
       }
   </script>






                         <!-- sửa công đoạn 16-->


 <script type="text/javascript">
       let searchWrapper16 = document.querySelector(".search-input16")
       let inputBox16 = document.querySelector("#inputsearch16")
       let suggBox16 = document.querySelector(".autocom-box16")
       let nhomthuchien16 = document.querySelector('#nhomthuchien16')
       let mathe16 = document.querySelector('#mathe16')
       var numberStore16 = [];
       var ma16 = [];

       inputBox16.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper16.classList.add("active")
            showSuggettions16(emptyArray);
            let allList = suggBox16.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select16(this)")
            }
         }else{
            searchWrapper16.classList.remove("active")
         }
       }

       function select16(element){
        let selectUserData16 = element.textContent;
        // inputBox16.value = selectUserData16;
        const cat = selectUserData16.slice(0, -9)
        numberStore16 = [...numberStore16, cat];
        const cat16 = selectUserData16.slice(-8)
        ma16 = [...ma16, cat16];
        mathe16.value = ma16;
        nhomthuchien16.value = numberStore16;
        // inputBox16.value = ;
       }

       function showSuggettions16(list){
        let listData;
        if(!list.length){
             userValue = inputBox16.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox16.innerHTML = listData;
       }
   </script>






                         <!-- sửa công đoạn 17-->


 <script type="text/javascript">
       let searchWrapper17 = document.querySelector(".search-input17")
       let inputBox17 = document.querySelector("#inputsearch17")
       let suggBox17 = document.querySelector(".autocom-box17")
       let nhomthuchien17 = document.querySelector('#nhomthuchien17')
       let mathe17 = document.querySelector('#mathe17')
       var numberStore17 = [];
       var ma17 = [];

       inputBox17.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper17.classList.add("active")
            showSuggettions17(emptyArray);
            let allList = suggBox17.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select17(this)")
            }
         }else{
            searchWrapper17.classList.remove("active")
         }
       }

       function select17(element){
        let selectUserData17 = element.textContent;
        // inputBox17.value = selectUserData17;
        const cat = selectUserData17.slice(0, -9)
        numberStore17 = [...numberStore17, cat];
        const cat17 = selectUserData17.slice(-8)
        ma17 = [...ma17, cat17];
        mathe17.value = ma17;
        nhomthuchien17.value = numberStore17;
        // inputBox17.value = ;
       }

       function showSuggettions17(list){
        let listData;
        if(!list.length){
             userValue = inputBox17.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox17.innerHTML = listData;
       }
   </script>





                         <!-- sửa công đoạn 18-->


 <script type="text/javascript">
       let searchWrapper18 = document.querySelector(".search-input18")
       let inputBox18 = document.querySelector("#inputsearch18")
       let suggBox18 = document.querySelector(".autocom-box18")
       let nhomthuchien18 = document.querySelector('#nhomthuchien18')
       let mathe18 = document.querySelector('#mathe18')
       var numberStore18 = [];
       var ma18 = [];

       inputBox18.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper18.classList.add("active")
            showSuggettions18(emptyArray);
            let allList = suggBox18.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select18(this)")
            }
         }else{
            searchWrapper18.classList.remove("active")
         }
       }

       function select18(element){
        let selectUserData18 = element.textContent;
        // inputBox18.value = selectUserData18;
        const cat = selectUserData18.slice(0, -9)
        numberStore18 = [...numberStore18, cat];
        const cat18 = selectUserData18.slice(-8)
        ma18 = [...ma18, cat18];
        mathe18.value = ma18;
        nhomthuchien18.value = numberStore18;
        // inputBox18.value = ;
       }

       function showSuggettions18(list){
        let listData;
        if(!list.length){
             userValue = inputBox18.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox18.innerHTML = listData;
       }
   </script>







                         <!-- sửa công đoạn 19-->


 <script type="text/javascript">
       let searchWrapper19 = document.querySelector(".search-input19")
       let inputBox19 = document.querySelector("#inputsearch19")
       let suggBox19 = document.querySelector(".autocom-box19")
       let nhomthuchien19 = document.querySelector('#nhomthuchien19')
       let mathe19 = document.querySelector('#mathe19')
       var numberStore19 = [];
       var ma19 = [];

       inputBox19.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper19.classList.add("active")
            showSuggettions19(emptyArray);
            let allList = suggBox19.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select19(this)")
            }
         }else{
            searchWrapper19.classList.remove("active")
         }
       }

       function select19(element){
        let selectUserData19 = element.textContent;
        // inputBox19.value = selectUserData19;
        const cat = selectUserData19.slice(0, -9)
        numberStore19 = [...numberStore19, cat];
        const cat19 = selectUserData19.slice(-8)
        ma19 = [...ma19, cat19];
        mathe19.value = ma19;
        nhomthuchien19.value = numberStore19;
        // inputBox19.value = ;
       }

       function showSuggettions19(list){
        let listData;
        if(!list.length){
             userValue = inputBox19.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox19.innerHTML = listData;
       }
   </script>







                         <!-- sửa công đoạn 20-->


 <script type="text/javascript">
       let searchWrapper20 = document.querySelector(".search-input20")
       let inputBox20 = document.querySelector("#inputsearch20")
       let suggBox20 = document.querySelector(".autocom-box20")
       let nhomthuchien20 = document.querySelector('#nhomthuchien20')
       let mathe20 = document.querySelector('#mathe20')
       var numberStore20 = [];
       var ma20 = [];

       inputBox20.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper20.classList.add("active")
            showSuggettions20(emptyArray);
            let allList = suggBox20.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select20(this)")
            }
         }else{
            searchWrapper20.classList.remove("active")
         }
       }

       function select20(element){
        let selectUserData20 = element.textContent;
        // inputBox20.value = selectUserData20;
        const cat = selectUserData20.slice(0, -9)
        numberStore20 = [...numberStore20, cat];
        const cat20 = selectUserData20.slice(-8)
        ma20 = [...ma20, cat20];
        mathe20.value = ma20;
        nhomthuchien20.value = numberStore20;
        // inputBox20.value = ;
       }

       function showSuggettions20(list){
        let listData;
        if(!list.length){
             userValue = inputBox20.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox20.innerHTML = listData;
       }
   </script>






                            <!-- sửa công đoạn 22-->


 <script type="text/javascript">
       let searchWrapper22 = document.querySelector(".search-input22")
       let inputBox22 = document.querySelector("#inputsearch22")
       let suggBox22 = document.querySelector(".autocom-box22")
       let nhomthuchien22 = document.querySelector('#nhomthuchien22')
       let mathe22 = document.querySelector('#mathe22')
       var numberStore22 = [];
       var ma22 = [];

       inputBox22.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper22.classList.add("active")
            showSuggettions22(emptyArray);
            let allList = suggBox22.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select22(this)")
            }
         }else{
            searchWrapper22.classList.remove("active")
         }
       }

       function select22(element){
        let selectUserData22 = element.textContent;
        // inputBox22.value = selectUserData22;
        const cat = selectUserData22.slice(0, -9)
        numberStore22 = [...numberStore22, cat];
        const cat22 = selectUserData22.slice(-8)
        ma22 = [...ma22, cat22];
        mathe22.value = ma22;
        nhomthuchien22.value = numberStore22;
        // inputBox22.value = ;
       }

       function showSuggettions22(list){
        let listData;
        if(!list.length){
             userValue = inputBox22.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox22.innerHTML = listData;
       }
   </script>





                          <!-- sửa công đoạn 23-->


 <script type="text/javascript">
       let searchWrapper23 = document.querySelector(".search-input23")
       let inputBox23 = document.querySelector("#inputsearch23")
       let suggBox23 = document.querySelector(".autocom-box23")
       let nhomthuchien23 = document.querySelector('#nhomthuchien23')
       let mathe23 = document.querySelector('#mathe23')
       var numberStore23 = [];
       var ma23 = [];

       inputBox23.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper23.classList.add("active")
            showSuggettions23(emptyArray);
            let allList = suggBox23.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select23(this)")
            }
         }else{
            searchWrapper23.classList.remove("active")
         }
       }

       function select23(element){
        let selectUserData23 = element.textContent;
        // inputBox23.value = selectUserData23;
        const cat = selectUserData23.slice(0, -9)
        numberStore23 = [...numberStore23, cat];
        const cat23 = selectUserData23.slice(-8)
        ma23 = [...ma23, cat23];
        mathe23.value = ma23;
        nhomthuchien23.value = numberStore23;
        // inputBox23.value = ;
       }

       function showSuggettions23(list){
        let listData;
        if(!list.length){
             userValue = inputBox23.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox23.innerHTML = listData;
       }
   </script>





                          <!-- sửa công đoạn 24-->


 <script type="text/javascript">
       let searchWrapper24 = document.querySelector(".search-input24")
       let inputBox24 = document.querySelector("#inputsearch24")
       let suggBox24 = document.querySelector(".autocom-box24")
       let nhomthuchien24 = document.querySelector('#nhomthuchien24')
       let mathe24 = document.querySelector('#mathe24')
       var numberStore24 = [];
       var ma24 = [];

       inputBox24.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper24.classList.add("active")
            showSuggettions24(emptyArray);
            let allList = suggBox24.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select24(this)")
            }
         }else{
            searchWrapper24.classList.remove("active")
         }
       }

       function select24(element){
        let selectUserData24 = element.textContent;
        // inputBox24.value = selectUserData24;
        const cat = selectUserData24.slice(0, -9)
        numberStore24 = [...numberStore24, cat];
        const cat24 = selectUserData24.slice(-8)
        ma24 = [...ma24, cat24];
        mathe24.value = ma24;
        nhomthuchien24.value = numberStore24;
        // inputBox24.value = ;
       }

       function showSuggettions24(list){
        let listData;
        if(!list.length){
             userValue = inputBox24.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox24.innerHTML = listData;
       }
   </script>








                       <!-- sửa công đoạn 25-->


 <script type="text/javascript">
       let searchWrapper25 = document.querySelector(".search-input25")
       let inputBox25 = document.querySelector("#inputsearch25")
       let suggBox25 = document.querySelector(".autocom-box25")
       let nhomthuchien25 = document.querySelector('#nhomthuchien25')
       let mathe25 = document.querySelector('#mathe25')
       var numberStore25 = [];
       var ma25 = [];

       inputBox25.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper25.classList.add("active")
            showSuggettions25(emptyArray);
            let allList = suggBox25.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select25(this)")
            }
         }else{
            searchWrapper25.classList.remove("active")
         }
       }

       function select25(element){
        let selectUserData25 = element.textContent;
        // inputBox25.value = selectUserData25;
        const cat = selectUserData25.slice(0, -9)
        numberStore25 = [...numberStore25, cat];
        const cat25 = selectUserData25.slice(-8)
        ma25 = [...ma25, cat25];
        mathe25.value = ma25;
        nhomthuchien25.value = numberStore25;
        // inputBox25.value = ;
       }

       function showSuggettions25(list){
        let listData;
        if(!list.length){
             userValue = inputBox25.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox25.innerHTML = listData;
       }
   </script>






                       <!-- sửa công đoạn 26-->


 <script type="text/javascript">
       let searchWrapper26 = document.querySelector(".search-input26")
       let inputBox26 = document.querySelector("#inputsearch26")
       let suggBox26 = document.querySelector(".autocom-box26")
       let nhomthuchien26 = document.querySelector('#nhomthuchien26')
       let mathe26 = document.querySelector('#mathe26')
       var numberStore26 = [];
       var ma26 = [];

       inputBox26.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper26.classList.add("active")
            showSuggettions26(emptyArray);
            let allList = suggBox26.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select26(this)")
            }
         }else{
            searchWrapper26.classList.remove("active")
         }
       }

       function select26(element){
        let selectUserData26 = element.textContent;
        // inputBox26.value = selectUserData26;
        const cat = selectUserData26.slice(0, -9)
        numberStore26 = [...numberStore26, cat];
        const cat26 = selectUserData26.slice(-8)
        ma26 = [...ma26, cat26];
        mathe26.value = ma26;
        nhomthuchien26.value = numberStore26;
        // inputBox26.value = ;
       }

       function showSuggettions26(list){
        let listData;
        if(!list.length){
             userValue = inputBox26.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox26.innerHTML = listData;
       }
   </script>






                      <!-- sửa công đoạn 27-->


 <script type="text/javascript">
       let searchWrapper27 = document.querySelector(".search-input27")
       let inputBox27 = document.querySelector("#inputsearch27")
       let suggBox27 = document.querySelector(".autocom-box27")
       let nhomthuchien27 = document.querySelector('#nhomthuchien27')
       let mathe27 = document.querySelector('#mathe27')
       var numberStore27 = [];
       var ma27 = [];

       inputBox27.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper27.classList.add("active")
            showSuggettions27(emptyArray);
            let allList = suggBox27.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select27(this)")
            }
         }else{
            searchWrapper27.classList.remove("active")
         }
       }

       function select27(element){
        let selectUserData27 = element.textContent;
        // inputBox27.value = selectUserData27;
        const cat = selectUserData27.slice(0, -9)
        numberStore27 = [...numberStore27, cat];
        const cat27 = selectUserData27.slice(-8)
        ma27 = [...ma27, cat27];
        mathe27.value = ma27;
        nhomthuchien27.value = numberStore27;
        // inputBox27.value = ;
       }

       function showSuggettions27(list){
        let listData;
        if(!list.length){
             userValue = inputBox27.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox27.innerHTML = listData;
       }
   </script>







                         <!-- sửa công đoạn 28-->


 <script type="text/javascript">
       let searchWrapper28 = document.querySelector(".search-input28")
       let inputBox28 = document.querySelector("#inputsearch28")
       let suggBox28 = document.querySelector(".autocom-box28")
       let nhomthuchien28 = document.querySelector('#nhomthuchien28')
       let mathe28 = document.querySelector('#mathe28')
       var numberStore28 = [];
       var ma28 = [];

       inputBox28.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper28.classList.add("active")
            showSuggettions28(emptyArray);
            let allList = suggBox28.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select28(this)")
            }
         }else{
            searchWrapper28.classList.remove("active")
         }
       }

       function select28(element){
        let selectUserData28 = element.textContent;
        // inputBox28.value = selectUserData28;
        const cat = selectUserData28.slice(0, -9)
        numberStore28 = [...numberStore28, cat];
        const cat28 = selectUserData28.slice(-8)
        ma28 = [...ma28, cat28];
        mathe28.value = ma28;
        nhomthuchien28.value = numberStore28;
        // inputBox28.value = ;
       }

       function showSuggettions28(list){
        let listData;
        if(!list.length){
             userValue = inputBox28.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox28.innerHTML = listData;
       }
   </script>







                       <!-- sửa công đoạn 29-->


 <script type="text/javascript">
       let searchWrapper29 = document.querySelector(".search-input29")
       let inputBox29 = document.querySelector("#inputsearch29")
       let suggBox29 = document.querySelector(".autocom-box29")
       let nhomthuchien29 = document.querySelector('#nhomthuchien29')
       let mathe29 = document.querySelector('#mathe29')
       var numberStore29 = [];
       var ma29 = [];

       inputBox29.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper29.classList.add("active")
            showSuggettions29(emptyArray);
            let allList = suggBox29.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select29(this)")
            }
         }else{
            searchWrapper29.classList.remove("active")
         }
       }

       function select29(element){
        let selectUserData29 = element.textContent;
        // inputBox29.value = selectUserData29;
        const cat = selectUserData29.slice(0, -9)
        numberStore29 = [...numberStore29, cat];
        const cat29 = selectUserData29.slice(-8)
        ma29 = [...ma29, cat29];
        mathe29.value = ma29;
        nhomthuchien29.value = numberStore29;
        // inputBox29.value = ;
       }

       function showSuggettions29(list){
        let listData;
        if(!list.length){
             userValue = inputBox29.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox29.innerHTML = listData;
       }
   </script>






                          <!-- sửa công đoạn 30-->


 <script type="text/javascript">
       let searchWrapper30 = document.querySelector(".search-input30")
       let inputBox30 = document.querySelector("#inputsearch30")
       let suggBox30 = document.querySelector(".autocom-box30")
       let nhomthuchien30 = document.querySelector('#nhomthuchien30')
       let mathe30 = document.querySelector('#mathe30')
       var numberStore30 = [];
       var ma30 = [];

       inputBox30.onkeyup = (e) => {
         let userData = e.target.value;
 
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper30.classList.add("active")
            showSuggettions30(emptyArray);
            let allList = suggBox30.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select30(this)")
            }
         }else{
            searchWrapper30.classList.remove("active")
         }
       }

       function select30(element){
        let selectUserData30 = element.textContent;
        // inputBox30.value = selectUserData30;
        const cat = selectUserData30.slice(0, -9)
        numberStore30 = [...numberStore30, cat];
        const cat30 = selectUserData30.slice(-8)
        ma30 = [...ma30, cat30];
        mathe30.value = ma30;
        nhomthuchien30.value = numberStore30;
        // inputBox30.value = ;
       }

       function showSuggettions30(list){
        let listData;
        if(!list.length){
             userValue = inputBox30.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox30.innerHTML = listData;
       }
   </script>




<script type="text/javascript">

    var a = "<?php echo $demcongdoan; ?>";

    var b = "<?php echo $oo; ?>"
    var mario = document.getElementById('mario');
    var mario2 = document.getElementById('mario2');

    if(b == 0 || b == 1 || b == 2 || b == 3 || b == 4 || b == 5 || b == 6)
    {
        mario.classList.toggle("mario00");
        mario2.classList.toggle("mario00");
    }
    if(a == 1&& b > 0 && b <= 99)
    {

        mario.classList.toggle("mario11");
        mario2.classList.toggle("mario222");
    }
    if(a == 2 && b == 100)
    {
        
        mario.classList.toggle("mario1");
        mario2.classList.toggle("mario22");
    }

    if(a == 2 && b > 0 && b < 50)
    {
        
        mario.classList.toggle("mario11");
        mario2.classList.toggle("mario222");
    }
    
    if(a == 2 && b >= 50 && b < 100)
    {
        mario.classList.toggle("mario111");
        mario2.classList.toggle("mario2222");
    }


    if(a == 3 && b > 0 && b < 33)
    {
        mario.classList.add("mario3");
        mario2.classList.add("mario23");
    }

    if(a == 3 && b >= 33 && b < 66)
    {
        mario.classList.add("mario33");
        mario2.classList.add("mario233");
    }

    if(a == 3 && b >= 66 && b < 100)
    {
        mario.classList.add("mario333");
        mario2.classList.add("mario2333");
    }

    if(a == 3 && b == 100)
    {
        mario.classList.add("mario3333");
        mario2.classList.add("mario23333");
    }

    if(a == 4 && b >= 75 && b < 100)
    {
        mario.classList.add("mario4");
        mario2.classList.add("mario24");
    }
     if(a == 4 && b > 0 && b < 25)
    {
        mario.classList.add("mario44");
        mario2.classList.add("mario244");
    }

     if(a == 4 && b >= 25 && b < 50)
    {
        mario.classList.add("mario444");
        mario2.classList.add("mario2444");
    }

     if(a == 4 && b >= 50 && b < 75)
    {
        mario.classList.add("mario4444");
        mario2.classList.add("mario24444");
    }
    if(a == 4 && b == 100)
    {
        mario.classList.add("mario44444");
        mario2.classList.add("mario244444");
    }

    if(a == 5 && b >= 20 && b < 40)
    {
        mario.classList.add("mario51");
        mario2.classList.add("mario251");
    }

    if(a == 5 && b >= 40 && b < 60)
    {   
        mario.classList.add("mario512");
        mario2.classList.add("mario2512");
    }

    if(a == 5 && b >= 60 && b < 80)
    {
        mario.classList.add("mario5123");
        mario2.classList.add("mario25123");
    }
    if(a == 5 && b >= 80 && b < 100)
    {
        mario.classList.add("mario51234");
        mario2.classList.add("mario251234");
    }
      if(a == 5 && b == 100)
    {
        mario.classList.add("mario5");
        mario2.classList.add("mario25");
    }
     if(a == 6 && b >= 16 && b < 33)
    {
        mario.classList.add("mario6");
        mario2.classList.add("mario26");
    }
     if(a == 6 && b >= 32 && b < 49)
    {
        mario.classList.add("mario61");
        mario2.classList.add("mario261");
    }
     if(a == 6 && b >= 49 && b < 65)
    {
        mario.classList.add("mario612");
        mario2.classList.add("mario2612");
    }
    if(a == 6 && b >= 66 && b < 83)
    {
        mario.classList.add("mario6123");
        mario2.classList.add("mario26123");
    }
    if(a == 6 && b >= 83 && b < 100)
    { 
        mario.classList.add("mario61234");
        mario2.classList.add("mario261234");
    }
    if(a == 6 && b == 100)
    {
        mario.classList.add("mario612345");
        mario2.classList.add("mario2612345");
    }

    if(a == 7 && b >= 14 && b < 28)
    {
        mario.classList.add("mario7");
        mario2.classList.add("mario27");
    }
    if(a == 7 && b >= 28 && b < 42)
    {
        mario.classList.add("mario71");
        mario2.classList.add("mario271");
    }
    if(a == 7 && b >= 42 && b <= 56)
    {
        mario.classList.add("mario712");
        mario2.classList.add("mario2712");
    }
    if(a == 7 && b >= 57 && b < 70)
    {
        mario.classList.add("mario7123");
        mario2.classList.add("mario27123");
    }
    if(a == 7 && b >= 71 && b < 85)
    {
        mario.classList.add("mario71234");
        mario2.classList.add("mario271234");
    }
    if(a == 7 && b >= 85 && b < 100)
    {
        mario.classList.add("mario712345");
        mario2.classList.add("mario2712345");
    }
    if(a == 7 && b == 100)
    {
        mario.classList.add("mario7123456");
        mario2.classList.add("mario27123456");
    }

    if(a == 8 && b >= 12 && b < 25)
    {
        mario.classList.add("mario8");
        mario2.classList.add("mario28");
    }


    if(a == 8 && b >= 25 && b < 37)
    {
        mario.classList.add("mario81");
        mario2.classList.add("mario281");
    }

    if(a == 8 && b >= 37 && b < 49)
    {
        mario.classList.add("mario812");
        mario2.classList.add("mario2812");
    }

    if(a == 8 && b >= 50 && b < 62)
    {
        mario.classList.add("mario8123");
        mario2.classList.add("mario28123");
    }

    if(a == 8 && b >= 62 && b < 75)
    {
        mario.classList.add("mario81234");
        mario2.classList.add("mario281234");
    }

    if(a == 8 && b >= 75 && b < 87)
    {
        mario.classList.add("mario812345");
        mario2.classList.add("mario2812345");
    }
    if(a == 8 && b >= 87 && b < 100)
    {
        mario.classList.add("mario81234567");
        mario2.classList.add("mario281234567");
    }
    if(a == 8 && b == 100)
    {
        mario.classList.add("mario8123456");
        mario2.classList.add("mario28123456");
    }

    if(a == 9 && b >= 11 & b < 22)
    {
        mario.classList.add("mario9");
        mario2.classList.add("mario29");
    }
    if(a == 9 && b >= 22 & b < 33)
    {
        mario.classList.add("mario91");
        mario2.classList.add("mario291");
    }

    if(a == 9 && b >= 33 & b < 44)
    {
        mario.classList.add("mario912");
        mario2.classList.add("mario2912");
    }

    if(a == 9 && b >= 44 & b < 55)
    {
        mario.classList.add("mario9123");
        mario2.classList.add("mario29123");
    }
    if(a == 9 && b >= 55 & b < 66)
    {
        mario.classList.add("mario91234");
        mario2.classList.add("mario291234");
    }
    if(a == 9 && b >= 66 & b < 77)
    {
        mario.classList.add("mario912345");
        mario2.classList.add("mario2912345");
    }
    if(a == 9 && b >= 77 & b < 88)
    {
        mario.classList.add("mario9123456");
        mario2.classList.add("mario29123456");
    }
    if(a == 9 && b >= 88 & b < 100)
    {
        mario.classList.add("mario91234567");
        mario2.classList.add("mario291234567");
    }
    if(a == 9 && b == 100)
    {
        mario.classList.add("mario912345678");
        mario2.classList.add("mario2912345678");
    }

    if(a == 10 && b >= 10 && b < 20)
    {
        mario.classList.add("mario10");
        mario2.classList.add("mario210");
    }
    if(a == 10 && b >= 20 && b < 30)
    {
        mario.classList.add("mario101");
        mario2.classList.add("mario2101");
    }
    if(a == 10 && b >= 30 && b < 40)
    {
        mario.classList.add("mario1012");
        mario2.classList.add("mario21012");
    }
    if(a == 10 && b >= 40 && b < 50)
    {
        mario.classList.add("mario10123");
        mario2.classList.add("mario210123");
    }
    if(a == 10 && b >= 50 && b < 60)
    {
        mario.classList.add("mario101234");
        mario2.classList.add("mario2101234");
    }
    if(a == 10 && b >= 60 && b < 70)
    {
        mario.classList.add("mario1012345");
        mario2.classList.add("mario21012345");
    }
    if(a == 10 && b >= 70 && b < 80)
    {
        mario.classList.add("mario10123456");
        mario2.classList.add("mario210123456");
    }
    if(a == 10 && b >= 80 && b < 90)
    {
        mario.classList.add("mario101234567");
        mario2.classList.add("mario2101234567");
    }
    if(a == 10 && b >= 90 && b < 100)
    {
        mario.classList.add("mario1012345678");
        mario2.classList.add("mario21012345678");
    }
    if(a == 10 && b == 100)
    {
        mario.classList.add("mario10123456789");
        mario2.classList.add("mario210123456789");
    }
    if(a == 11 && b >= 9 && b < 18)
    {
        mario.classList.add("mario11");
        mario2.classList.add("mario211");
    }
    if(a == 11 && b >= 18 && b < 27)
    {
        mario.classList.add("mario111");
        mario2.classList.add("mario2111");
    }
    if(a == 11 && b >= 27 && b < 36)
    {
        mario.classList.add("mario1112");
        mario2.classList.add("mario21112");
    }
    if(a == 11 && b >= 36 && b < 45)
    {
        mario.classList.add("mario11123");
        mario2.classList.add("mario211123");
    }
    if(a == 11 && b >= 45 && b < 54)
    {
        mario.classList.add("mario111234");
        mario2.classList.add("mario2111234");
    }
    if(a == 11 && b >= 54 && b < 63)
    {
        mario.classList.add("mario1112345");
        mario2.classList.add("mario21112345");
    }
    if(a == 11 && b >= 63 && b < 72)
    {
        mario.classList.add("mario11123456");
        mario2.classList.add("mario211123456");
    }
    if(a == 11 && b >= 72 && b < 81)
    {
        mario.classList.add("mario111234567");
        mario2.classList.add("mario2111234567");
    }
    if(a == 11 && b >= 81 && b < 90)
    {
        mario.classList.add("mario1112345678");
        mario2.classList.add("mario21112345678");
    }
    if(a == 11 && b >= 90 && b < 100)
    {
        mario.classList.add("mario11123456789");
        mario2.classList.add("mario211123456789");
    }
    if(a == 11 && b == 100)
    {
        mario.classList.add("mario111234567891");
        mario2.classList.add("mario2111234567891");
    }
    if(a == 12 && b >= 8 && b < 16)
    {
        mario.classList.add("mario12");
        mario2.classList.add("mario212");
    }
    if(a == 12 && b >= 16 && b < 24)
    {
        mario.classList.add("mario123");
        mario2.classList.add("mario2123");
    }
    if(a == 12 && b >= 24 && b < 32)
    {
        mario.classList.add("mario124");
        mario2.classList.add("mario2124");
    }
    if(a == 12 && b >= 32 && b < 41)
    {
        mario.classList.add("mario125");
        mario2.classList.add("mario2125");
    }
    if(a == 12 && b >= 41 && b < 50)
    {
        mario.classList.add("mario126");
        mario2.classList.add("mario2126");
    }
    if(a == 12 && b >= 50 && b < 58)
    {
        mario.classList.add("mario126");
        mario2.classList.add("mario2126");
    }
    if(a == 12 && b >= 58 && b < 66)
    {
        mario.classList.add("mario127");
        mario2.classList.add("mario2127");
    }
    if(a == 12 && b >= 66 && b < 75)
    {
        mario.classList.add("mario128");
        mario2.classList.add("mario2128");
    }
    if(a == 12 && b >= 75 && b < 83)
    {
        mario.classList.add("mario129");
        mario2.classList.add("mario2129");
    }
    if(a == 12 && b >= 83 && b < 91)
    {
        mario.classList.add("mario1291");
        mario2.classList.add("mario21291");
    }
    if(a == 12 && b >= 91 && b < 100)
    {
        mario.classList.add("mario1292");
        mario2.classList.add("mario21292");
    }
    if(a == 12 && b == 100)
    {
        mario.classList.add("mario1293");
        mario2.classList.add("mario21293");
    }
    if(a == 13 && b >= 7 && b < 14)
    {
        mario.classList.add("mario13");
        mario2.classList.add("mario213");
    }
    if(a == 13 && b >= 14 && b < 21)
    {
        mario.classList.add("mario131");
        mario2.classList.add("mario2131");
    }
    if(a == 13 && b >= 21 && b < 30)
    {
        mario.classList.add("mario132");
        mario2.classList.add("mario2132");
    }
    if(a == 13 && b >= 30 && b < 38)
    {
        mario.classList.add("mario133");
        mario2.classList.add("mario2133");
    }
    if(a == 13 && b >= 38 && b < 46)
    {
        mario.classList.add("mario134");
        mario2.classList.add("mario2134");
    }
    if(a == 13 && b >= 46 && b < 53)
    {
        mario.classList.add("mario135");
        mario2.classList.add("mario2135");
    }
    if(a == 13 && b >= 53 && b < 61)
    {
        mario.classList.add("mario136");
        mario2.classList.add("mario2136");
    }
    if(a == 13 && b >= 61 && b < 69)
    {
        mario.classList.add("mario137");
        mario2.classList.add("mario2137");
    }
    if(a == 13 && b >= 69 && b < 76)
    {
        mario.classList.add("mario138");
        mario2.classList.add("mario2138");
    }
    if(a == 13 && b >= 76 && b < 84)
    {
        mario.classList.add("mario139");
        mario2.classList.add("mario2139");
    }
    if(a == 13 && b >= 84 && b < 92)
    {
        mario.classList.add("mario1391");
        mario2.classList.add("mario21391");
    }
    if(a == 13 && b >= 92 && b < 100)
    {
        mario.classList.add("mario1392");
        mario2.classList.add("mario21392");
    }
    if(a == 13 && b == 100)
    {
        mario.classList.add("mario1393");
        mario2.classList.add("mario21393");
    }
    if(a == 14 && b >= 7 && b < 14)
    {
        mario.classList.add("mario14");
        mario2.classList.add("mario214");
    }
    if(a == 14 && b >= 14 && b < 21)
    {
        mario.classList.add("mario141");
        mario2.classList.add("mario2141");
    }
    if(a == 14 && b >= 21 && b < 28)
    {
        mario.classList.add("mario142");
        mario2.classList.add("mario2142");
    }
    if(a == 14 && b >= 28 && b < 35)
    {
        mario.classList.add("mario143");
        mario2.classList.add("mario2143");
    }
    if(a == 14 && b >= 35 && b < 42)
    {
        mario.classList.add("mario144");
        mario2.classList.add("mario2144");
    }
    if(a == 14 && b >= 42 && b < 50)
    {
        mario.classList.add("mario145");
        mario2.classList.add("mario2145");
    }
    if(a == 14 && b >= 50 && b < 57)
    {
        mario.classList.add("mario146");
        mario2.classList.add("mario2146");
    }
    if(a == 14 && b >= 57 && b < 64)
    {
        mario.classList.add("mario147");
        mario2.classList.add("mario2147");
    }
    if(a == 14 && b >= 64 && b < 71)
    {
        mario.classList.add("mario148");
        mario2.classList.add("mario2148");
    }
    if(a == 14 && b >= 71 && b < 78)
    {
        mario.classList.add("mario149");
        mario2.classList.add("mario2149");
    }
    if(a == 14 && b >= 78 && b < 85)
    {
        mario.classList.add("mario1491");
        mario2.classList.add("mario21491");
    }
    if(a == 14 && b >= 85 && b < 92)
    {
        mario.classList.add("mario1492");
        mario2.classList.add("mario21492");
    }
    if(a == 14 && b >= 92 && b < 100)
    {
        mario.classList.add("mario1493");
        mario2.classList.add("mario21493");
    }
    if(a == 14 && b == 100)
    {
        mario.classList.add("mario1494");
        mario2.classList.add("mario21494");
    }
    if(a == 15 && b >= 6 && b < 13)
    {
        mario.classList.add("mario15");
        mario2.classList.add("mario215");
    }
    if(a == 15 && b >= 13 && b < 20)
    {
        mario.classList.add("mario151");
        mario2.classList.add("mario2151");
    }
    if(a == 15 && b >= 20 && b < 26)
    {
        mario.classList.add("mario152");
        mario2.classList.add("mario2152");
    }
    if(a == 15 && b >= 26 && b < 33)
    {
        mario.classList.add("mario153");
        mario2.classList.add("mario2153");
    }
    if(a == 15 && b >= 33 && b < 40)
    {
        mario.classList.add("mario154");
        mario2.classList.add("mario2154");
    }
    if(a == 15 && b >= 40 && b < 46)
    {
        mario.classList.add("mario155");
        mario2.classList.add("mario2155");
    }
    if(a == 15 && b >= 46 && b < 53)
    {
        mario.classList.add("mario156");
        mario2.classList.add("mario2156");
    }
    if(a == 15 && b >= 53 && b < 60)
    {
        mario.classList.add("mario157");
        mario2.classList.add("mario2157");
    }
    if(a == 15 && b >= 60 && b < 66)
    {
        mario.classList.add("mario158");
        mario2.classList.add("mario2158");
    }
    if(a == 15 && b >= 66 && b < 73)
    {
        mario.classList.add("mario159");
        mario2.classList.add("mario2159");
    }
    if(a == 15 && b >= 73 && b < 80)
    {
        mario.classList.add("mario1591");
        mario2.classList.add("mario21591");
    }
    if(a == 15 && b >= 80 && b < 86)
    {
        mario.classList.add("mario1592");
        mario2.classList.add("mario21592");
    }
    if(a == 15 && b >= 86 && b < 92)
    {
        mario.classList.add("mario1593");
        mario2.classList.add("mario21593");
    }
    if(a == 15 && b >= 92 && b < 100)
    {
        mario.classList.add("mario1594");
        mario2.classList.add("mario21594");
    }
     if(a == 15 && b == 100)
    {
        mario.classList.add("mario1595");
        mario2.classList.add("mario21595");
    }
</script>





=======

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


>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3




<script type="text/javascript">
    document.getElementById("xacnhan2").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau2");
     var y = document.getElementById("span2");
  x.value = x.value.toUpperCase();
     var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
<<<<<<< HEAD
        window.location="../Controller/index.php?action=editt&id=<?php echo $dataID['id']; ?>";
=======
        window.location="../Controller/index.php?action=edit1&id=<?php echo $dataID['id']; ?>";
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
    }else{
      document.getElementById("idmatkhau2").classList.add("is-invalid");
      document.getElementById("span2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span2").style.color = 'red'
    }
    
}


</script>

<!-- 
<script type="text/javascript">
    document.getElementById("xacnhan3").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau3");
     var y = document.getElementById("span3");
  x.value = x.value.toUpperCase();
     var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
        window.location="../Controller/index.php?action=delete&id=<?php echo $value['id']; ?>";
    }else{
      document.getElementById("idmatkhau3").classList.add("is-invalid");
      document.getElementById("span3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span3").style.color = 'red'
    }
    
}


</script>
 -->



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




<!-- giờ trong Ngày 1 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay1").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay1");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay1").style.display = 'none';
      document.getElementById("submittrongngay1").style.display = 'inline';
      document.getElementById("idspantrongngay1").innerText = ''
      document.getElementById("idspantrongngay1").style.color = ''
      document.getElementById("idmatkhautrongngay1").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay1").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay1").style.display = 'none';
    document.getElementById("idinputtrongngay1").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay1").style.display = 'none';
    document.getElementById("tieudetrongngay1").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay1").classList.add("form-control");
    document.getElementById("idmatkhautrongngay1").classList.add("is-invalid");
      document.getElementById("idspantrongngay1").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay1").style.color = 'red'
  }
}


</script>



<!-- giờ trong Ngày 2 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay2").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay2");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay2").style.display = 'none';
      document.getElementById("submittrongngay2").style.display = 'inline';
      document.getElementById("idspantrongngay2").innerText = ''
      document.getElementById("idspantrongngay2").style.color = ''
      document.getElementById("idmatkhautrongngay2").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay2").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay2").style.display = 'none';
    document.getElementById("idinputtrongngay2").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay2").style.display = 'none';
    document.getElementById("tieudetrongngay2").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay2").classList.add("form-control");
    document.getElementById("idmatkhautrongngay2").classList.add("is-invalid");
      document.getElementById("idspantrongngay2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay2").style.color = 'red'
  }
}


</script>



<!-- giờ trong Ngày 3 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay3").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay3");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay3").style.display = 'none';
      document.getElementById("submittrongngay3").style.display = 'inline';
      document.getElementById("idspantrongngay3").innerText = ''
      document.getElementById("idspantrongngay3").style.color = ''
      document.getElementById("idmatkhautrongngay3").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay3").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay3").style.display = 'none';
    document.getElementById("idinputtrongngay3").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay3").style.display = 'none';
    document.getElementById("tieudetrongngay3").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay3").classList.add("form-control");
    document.getElementById("idmatkhautrongngay3").classList.add("is-invalid");
      document.getElementById("idspantrongngay3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay3").style.color = 'red'
  }
}


</script>


<!-- giờ trong Ngày 4 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay4").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay4");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay4").style.display = 'none';
      document.getElementById("submittrongngay4").style.display = 'inline';
      document.getElementById("idspantrongngay4").innerText = ''
      document.getElementById("idspantrongngay4").style.color = ''
      document.getElementById("idmatkhautrongngay4").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay4").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay4").style.display = 'none';
    document.getElementById("idinputtrongngay4").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay4").style.display = 'none';
    document.getElementById("tieudetrongngay4").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay4").classList.add("form-control");
    document.getElementById("idmatkhautrongngay4").classList.add("is-invalid");
      document.getElementById("idspantrongngay4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay4").style.color = 'red'
  }
}


</script>



<!-- giờ trong Ngày 5 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay5").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay5");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay5").style.display = 'none';
      document.getElementById("submittrongngay5").style.display = 'inline';
      document.getElementById("idspantrongngay5").innerText = ''
      document.getElementById("idspantrongngay5").style.color = ''
      document.getElementById("idmatkhautrongngay5").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay5").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay5").style.display = 'none';
    document.getElementById("idinputtrongngay5").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay5").style.display = 'none';
    document.getElementById("tieudetrongngay5").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay5").classList.add("form-control");
    document.getElementById("idmatkhautrongngay5").classList.add("is-invalid");
      document.getElementById("idspantrongngay5").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay5").style.color = 'red'
  }
}


</script>


<!-- giờ trong Ngày 6 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay6").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay6");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay6").style.display = 'none';
      document.getElementById("submittrongngay6").style.display = 'inline';
      document.getElementById("idspantrongngay6").innerText = ''
      document.getElementById("idspantrongngay6").style.color = ''
      document.getElementById("idmatkhautrongngay6").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay6").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay6").style.display = 'none';
    document.getElementById("idinputtrongngay6").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay6").style.display = 'none';
    document.getElementById("tieudetrongngay6").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay6").classList.add("form-control");
    document.getElementById("idmatkhautrongngay6").classList.add("is-invalid");
      document.getElementById("idspantrongngay6").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay6").style.color = 'red'
  }
}


</script>



<!-- giờ trong Ngày 7 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay7").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay7");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay7").style.display = 'none';
      document.getElementById("submittrongngay7").style.display = 'inline';
      document.getElementById("idspantrongngay7").innerText = ''
      document.getElementById("idspantrongngay7").style.color = ''
      document.getElementById("idmatkhautrongngay7").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay7").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay7").style.display = 'none';
    document.getElementById("idinputtrongngay7").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay7").style.display = 'none';
    document.getElementById("tieudetrongngay7").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay7").classList.add("form-control");
    document.getElementById("idmatkhautrongngay7").classList.add("is-invalid");
      document.getElementById("idspantrongngay7").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay7").style.color = 'red'
  }
}


</script>



<!-- giờ trong Ngày 8 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay8").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay8");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay8").style.display = 'none';
      document.getElementById("submittrongngay8").style.display = 'inline';
      document.getElementById("idspantrongngay8").innerText = ''
      document.getElementById("idspantrongngay8").style.color = ''
      document.getElementById("idmatkhautrongngay8").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay8").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay8").style.display = 'none';
    document.getElementById("idinputtrongngay8").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay8").style.display = 'none';
    document.getElementById("tieudetrongngay8").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay8").classList.add("form-control");
    document.getElementById("idmatkhautrongngay8").classList.add("is-invalid");
      document.getElementById("idspantrongngay8").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay8").style.color = 'red'
  }
}


</script>


<!-- giờ trong Ngày 9 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay9").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay9");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay9").style.display = 'none';
      document.getElementById("submittrongngay9").style.display = 'inline';
      document.getElementById("idspantrongngay9").innerText = ''
      document.getElementById("idspantrongngay9").style.color = ''
      document.getElementById("idmatkhautrongngay9").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay9").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay9").style.display = 'none';
    document.getElementById("idinputtrongngay9").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay9").style.display = 'none';
    document.getElementById("tieudetrongngay9").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay9").classList.add("form-control");
    document.getElementById("idmatkhautrongngay9").classList.add("is-invalid");
      document.getElementById("idspantrongngay9").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay9").style.color = 'red'
  }
}


</script>



<!-- giờ trong Ngày 10 -->

<script type="text/javascript">

    document.getElementById("submitmaytrongngay10").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautrongngay10");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytrongngay10").style.display = 'none';
      document.getElementById("submittrongngay10").style.display = 'inline';
      document.getElementById("idspantrongngay10").innerText = ''
      document.getElementById("idspantrongngay10").style.color = ''
      document.getElementById("idmatkhautrongngay10").classList.remove("form-control");
    document.getElementById("idmatkhautrongngay10").classList.remove("is-invalid");
    document.getElementById("idmatkhautrongngay10").style.display = 'none';
    document.getElementById("idinputtrongngay10").style.display = 'inline';
    document.getElementById("tieudematkhautrongngay10").style.display = 'none';
    document.getElementById("tieudetrongngay10").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautrongngay10").classList.add("form-control");
    document.getElementById("idmatkhautrongngay10").classList.add("is-invalid");
      document.getElementById("idspantrongngay10").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantrongngay10").style.color = 'red'
  }
}


</script>





<!-- công đoạn dfm 1 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm1").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm1");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm1").style.display = 'none';
      document.getElementById("submitdfm1").style.display = 'inline';
      document.getElementById("idspandfm1").innerText = ''
      document.getElementById("idspandfm1").style.color = ''
      document.getElementById("idmatkhaudfm1").classList.remove("form-control");
    document.getElementById("idmatkhaudfm1").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm1").style.display = 'none';
    document.getElementById("idinputdfm1").style.display = 'inline';
    document.getElementById("tieudematkhaudfm1").style.display = 'none';
    document.getElementById("tieudedfm1").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm1").classList.add("form-control");
    document.getElementById("idmatkhaudfm1").classList.add("is-invalid");
      document.getElementById("idspandfm1").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm1").style.color = 'red'
  }
}


</script>



<!-- công đoạn dfm 2 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm2").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm2");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm2").style.display = 'none';
      document.getElementById("submitdfm2").style.display = 'inline';
      document.getElementById("idspandfm2").innerText = ''
      document.getElementById("idspandfm2").style.color = ''
      document.getElementById("idmatkhaudfm2").classList.remove("form-control");
    document.getElementById("idmatkhaudfm2").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm2").style.display = 'none';
    document.getElementById("idinputdfm2").style.display = 'inline';
    document.getElementById("tieudematkhaudfm2").style.display = 'none';
    document.getElementById("tieudedfm2").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm2").classList.add("form-control");
    document.getElementById("idmatkhaudfm2").classList.add("is-invalid");
      document.getElementById("idspandfm2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm2").style.color = 'red'
  }
}


</script>



<!-- công đoạn dfm 3 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm3").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm3");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm3").style.display = 'none';
      document.getElementById("submitdfm3").style.display = 'inline';
      document.getElementById("idspandfm3").innerText = ''
      document.getElementById("idspandfm3").style.color = ''
      document.getElementById("idmatkhaudfm3").classList.remove("form-control");
    document.getElementById("idmatkhaudfm3").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm3").style.display = 'none';
    document.getElementById("idinputdfm3").style.display = 'inline';
    document.getElementById("tieudematkhaudfm3").style.display = 'none';
    document.getElementById("tieudedfm3").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm3").classList.add("form-control");
    document.getElementById("idmatkhaudfm3").classList.add("is-invalid");
      document.getElementById("idspandfm3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm3").style.color = 'red'
  }
}


</script>


<!-- công đoạn dfm 4 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm4").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm4");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm4").style.display = 'none';
      document.getElementById("submitdfm4").style.display = 'inline';
      document.getElementById("idspandfm4").innerText = ''
      document.getElementById("idspandfm4").style.color = ''
      document.getElementById("idmatkhaudfm4").classList.remove("form-control");
    document.getElementById("idmatkhaudfm4").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm4").style.display = 'none';
    document.getElementById("idinputdfm4").style.display = 'inline';
    document.getElementById("tieudematkhaudfm4").style.display = 'none';
    document.getElementById("tieudedfm4").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm4").classList.add("form-control");
    document.getElementById("idmatkhaudfm4").classList.add("is-invalid");
      document.getElementById("idspandfm4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm4").style.color = 'red'
  }
}


</script>



<!-- công đoạn dfm 5 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm5").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm5");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm5").style.display = 'none';
      document.getElementById("submitdfm5").style.display = 'inline';
      document.getElementById("idspandfm5").innerText = ''
      document.getElementById("idspandfm5").style.color = ''
      document.getElementById("idmatkhaudfm5").classList.remove("form-control");
    document.getElementById("idmatkhaudfm5").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm5").style.display = 'none';
    document.getElementById("idinputdfm5").style.display = 'inline';
    document.getElementById("tieudematkhaudfm5").style.display = 'none';
    document.getElementById("tieudedfm5").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm5").classList.add("form-control");
    document.getElementById("idmatkhaudfm5").classList.add("is-invalid");
      document.getElementById("idspandfm5").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm5").style.color = 'red'
  }
}


</script>


<!-- công đoạn dfm 6 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm6").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm6");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm6").style.display = 'none';
      document.getElementById("submitdfm6").style.display = 'inline';
      document.getElementById("idspandfm6").innerText = ''
      document.getElementById("idspandfm6").style.color = ''
      document.getElementById("idmatkhaudfm6").classList.remove("form-control");
    document.getElementById("idmatkhaudfm6").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm6").style.display = 'none';
    document.getElementById("idinputdfm6").style.display = 'inline';
    document.getElementById("tieudematkhaudfm6").style.display = 'none';
    document.getElementById("tieudedfm6").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm6").classList.add("form-control");
    document.getElementById("idmatkhaudfm6").classList.add("is-invalid");
      document.getElementById("idspandfm6").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm6").style.color = 'red'
  }
}


</script>



<!-- công đoạn dfm 7 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm7").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm7");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm7").style.display = 'none';
      document.getElementById("submitdfm7").style.display = 'inline';
      document.getElementById("idspandfm7").innerText = ''
      document.getElementById("idspandfm7").style.color = ''
      document.getElementById("idmatkhaudfm7").classList.remove("form-control");
    document.getElementById("idmatkhaudfm7").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm7").style.display = 'none';
    document.getElementById("idinputdfm7").style.display = 'inline';
    document.getElementById("tieudematkhaudfm7").style.display = 'none';
    document.getElementById("tieudedfm7").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm7").classList.add("form-control");
    document.getElementById("idmatkhaudfm7").classList.add("is-invalid");
      document.getElementById("idspandfm7").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm7").style.color = 'red'
  }
}


</script>



<!-- công đoạn dfm 8 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm8").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm8");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm8").style.display = 'none';
      document.getElementById("submitdfm8").style.display = 'inline';
      document.getElementById("idspandfm8").innerText = ''
      document.getElementById("idspandfm8").style.color = ''
      document.getElementById("idmatkhaudfm8").classList.remove("form-control");
    document.getElementById("idmatkhaudfm8").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm8").style.display = 'none';
    document.getElementById("idinputdfm8").style.display = 'inline';
    document.getElementById("tieudematkhaudfm8").style.display = 'none';
    document.getElementById("tieudedfm8").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm8").classList.add("form-control");
    document.getElementById("idmatkhaudfm8").classList.add("is-invalid");
      document.getElementById("idspandfm8").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm8").style.color = 'red'
  }
}


</script>


<!-- công đoạn dfm 9 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm9").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm9");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm9").style.display = 'none';
      document.getElementById("submitdfm9").style.display = 'inline';
      document.getElementById("idspandfm9").innerText = ''
      document.getElementById("idspandfm9").style.color = ''
      document.getElementById("idmatkhaudfm9").classList.remove("form-control");
    document.getElementById("idmatkhaudfm9").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm9").style.display = 'none';
    document.getElementById("idinputdfm9").style.display = 'inline';
    document.getElementById("tieudematkhaudfm9").style.display = 'none';
    document.getElementById("tieudedfm9").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm9").classList.add("form-control");
    document.getElementById("idmatkhaudfm9").classList.add("is-invalid");
      document.getElementById("idspandfm9").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm9").style.color = 'red'
  }
}


</script>



<!-- công đoạn dfm 10 -->

<script type="text/javascript">

    document.getElementById("submitmaydfm10").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhaudfm10");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaydfm10").style.display = 'none';
      document.getElementById("submitdfm10").style.display = 'inline';
      document.getElementById("idspandfm10").innerText = ''
      document.getElementById("idspandfm10").style.color = ''
      document.getElementById("idmatkhaudfm10").classList.remove("form-control");
    document.getElementById("idmatkhaudfm10").classList.remove("is-invalid");
    document.getElementById("idmatkhaudfm10").style.display = 'none';
    document.getElementById("idinputdfm10").style.display = 'inline';
    document.getElementById("tieudematkhaudfm10").style.display = 'none';
    document.getElementById("tieudedfm10").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhaudfm10").classList.add("form-control");
    document.getElementById("idmatkhaudfm10").classList.add("is-invalid");
      document.getElementById("idspandfm10").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspandfm10").style.color = 'red'
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




<!-- tên máy 1 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay1").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay1");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay1").style.display = 'none';
      document.getElementById("submittenmay1").style.display = 'inline';
      document.getElementById("idspantenmay1").innerText = ''
      document.getElementById("idspantenmay1").style.color = ''
      document.getElementById("idmatkhautenmay1").classList.remove("form-control");
    document.getElementById("idmatkhautenmay1").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay1").style.display = 'none';
    document.getElementById("idinputtenmay1").style.display = 'inline';
    document.getElementById("tieudematkhautenmay1").style.display = 'none';
    document.getElementById("tieudetenmay1").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay1").classList.add("form-control");
    document.getElementById("idmatkhautenmay1").classList.add("is-invalid");
      document.getElementById("idspantenmay1").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay1").style.color = 'red'
  }
}


</script>




<!-- tên máy 2 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay2").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay2");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay2").style.display = 'none';
      document.getElementById("submittenmay2").style.display = 'inline';
      document.getElementById("idspantenmay2").innerText = ''
      document.getElementById("idspantenmay2").style.color = ''
      document.getElementById("idmatkhautenmay2").classList.remove("form-control");
    document.getElementById("idmatkhautenmay2").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay2").style.display = 'none';
    document.getElementById("idinputtenmay2").style.display = 'inline';
    document.getElementById("tieudematkhautenmay2").style.display = 'none';
    document.getElementById("tieudetenmay2").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay2").classList.add("form-control");
    document.getElementById("idmatkhautenmay2").classList.add("is-invalid");
      document.getElementById("idspantenmay2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay2").style.color = 'red'
  }
}


</script>




<!-- tên máy 3 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay3").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay3");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay3").style.display = 'none';
      document.getElementById("submittenmay3").style.display = 'inline';
      document.getElementById("idspantenmay3").innerText = ''
      document.getElementById("idspantenmay3").style.color = ''
      document.getElementById("idmatkhautenmay3").classList.remove("form-control");
    document.getElementById("idmatkhautenmay3").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay3").style.display = 'none';
    document.getElementById("idinputtenmay3").style.display = 'inline';
    document.getElementById("tieudematkhautenmay3").style.display = 'none';
    document.getElementById("tieudetenmay3").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay3").classList.add("form-control");
    document.getElementById("idmatkhautenmay3").classList.add("is-invalid");
      document.getElementById("idspantenmay3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay3").style.color = 'red'
  }
}


</script>




<!-- tên máy 4 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay4").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay4");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay4").style.display = 'none';
      document.getElementById("submittenmay4").style.display = 'inline';
      document.getElementById("idspantenmay4").innerText = ''
      document.getElementById("idspantenmay4").style.color = ''
      document.getElementById("idmatkhautenmay4").classList.remove("form-control");
    document.getElementById("idmatkhautenmay4").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay4").style.display = 'none';
    document.getElementById("idinputtenmay4").style.display = 'inline';
    document.getElementById("tieudematkhautenmay4").style.display = 'none';
    document.getElementById("tieudetenmay4").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay4").classList.add("form-control");
    document.getElementById("idmatkhautenmay4").classList.add("is-invalid");
      document.getElementById("idspantenmay4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay4").style.color = 'red'
  }
}


</script>



<!-- tên máy 5 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay5").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay5");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay5").style.display = 'none';
      document.getElementById("submittenmay5").style.display = 'inline';
      document.getElementById("idspantenmay5").innerText = ''
      document.getElementById("idspantenmay5").style.color = ''
      document.getElementById("idmatkhautenmay5").classList.remove("form-control");
    document.getElementById("idmatkhautenmay5").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay5").style.display = 'none';
    document.getElementById("idinputtenmay5").style.display = 'inline';
    document.getElementById("tieudematkhautenmay5").style.display = 'none';
    document.getElementById("tieudetenmay5").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay5").classList.add("form-control");
    document.getElementById("idmatkhautenmay5").classList.add("is-invalid");
      document.getElementById("idspantenmay5").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay5").style.color = 'red'
  }
}


</script>



<!-- tên máy 6 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay6").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay6");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay6").style.display = 'none';
      document.getElementById("submittenmay6").style.display = 'inline';
      document.getElementById("idspantenmay6").innerText = ''
      document.getElementById("idspantenmay6").style.color = ''
      document.getElementById("idmatkhautenmay6").classList.remove("form-control");
    document.getElementById("idmatkhautenmay6").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay6").style.display = 'none';
    document.getElementById("idinputtenmay6").style.display = 'inline';
    document.getElementById("tieudematkhautenmay6").style.display = 'none';
    document.getElementById("tieudetenmay6").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay6").classList.add("form-control");
    document.getElementById("idmatkhautenmay6").classList.add("is-invalid");
      document.getElementById("idspantenmay6").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay6").style.color = 'red'
  }
}


</script>



<!-- tên máy 7 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay7").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay7");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay7").style.display = 'none';
      document.getElementById("submittenmay7").style.display = 'inline';
      document.getElementById("idspantenmay7").innerText = ''
      document.getElementById("idspantenmay7").style.color = ''
      document.getElementById("idmatkhautenmay7").classList.remove("form-control");
    document.getElementById("idmatkhautenmay7").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay7").style.display = 'none';
    document.getElementById("idinputtenmay7").style.display = 'inline';
    document.getElementById("tieudematkhautenmay7").style.display = 'none';
    document.getElementById("tieudetenmay7").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay7").classList.add("form-control");
    document.getElementById("idmatkhautenmay7").classList.add("is-invalid");
      document.getElementById("idspantenmay7").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay7").style.color = 'red'
  }
}


</script>




<!-- tên máy 8 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay8").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay8");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay8").style.display = 'none';
      document.getElementById("submittenmay8").style.display = 'inline';
      document.getElementById("idspantenmay8").innerText = ''
      document.getElementById("idspantenmay8").style.color = ''
      document.getElementById("idmatkhautenmay8").classList.remove("form-control");
    document.getElementById("idmatkhautenmay8").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay8").style.display = 'none';
    document.getElementById("idinputtenmay8").style.display = 'inline';
    document.getElementById("tieudematkhautenmay8").style.display = 'none';
    document.getElementById("tieudetenmay8").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay8").classList.add("form-control");
    document.getElementById("idmatkhautenmay8").classList.add("is-invalid");
      document.getElementById("idspantenmay8").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay8").style.color = 'red'
  }
}


</script>



<!-- tên máy 9 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay9").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay9");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay9").style.display = 'none';
      document.getElementById("submittenmay9").style.display = 'inline';
      document.getElementById("idspantenmay9").innerText = ''
      document.getElementById("idspantenmay9").style.color = ''
      document.getElementById("idmatkhautenmay9").classList.remove("form-control");
    document.getElementById("idmatkhautenmay9").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay9").style.display = 'none';
    document.getElementById("idinputtenmay9").style.display = 'inline';
    document.getElementById("tieudematkhautenmay9").style.display = 'none';
    document.getElementById("tieudetenmay9").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay9").classList.add("form-control");
    document.getElementById("idmatkhautenmay9").classList.add("is-invalid");
      document.getElementById("idspantenmay9").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay9").style.color = 'red'
  }
}


</script>




<!-- tên máy 10 -->  

<script type="text/javascript">

    document.getElementById("submitmaytenmay10").addEventListener("click", myFunction2);
function myFunction2() {
  var x = document.getElementById("idmatkhautenmay10");
  x.value = x.value.toUpperCase();
   var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
      document.getElementById("submitmaytenmay10").style.display = 'none';
      document.getElementById("submittenmay10").style.display = 'inline';
      document.getElementById("idspantenmay10").innerText = ''
      document.getElementById("idspantenmay10").style.color = ''
      document.getElementById("idmatkhautenmay10").classList.remove("form-control");
    document.getElementById("idmatkhautenmay10").classList.remove("is-invalid");
    document.getElementById("idmatkhautenmay10").style.display = 'none';
    document.getElementById("idinputtenmay10").style.display = 'inline';
    document.getElementById("tieudematkhautenmay10").style.display = 'none';
    document.getElementById("tieudetenmay10").style.display = 'inline';
  }else{
     
    document.getElementById("idmatkhautenmay10").classList.add("form-control");
    document.getElementById("idmatkhautenmay10").classList.add("is-invalid");
      document.getElementById("idspantenmay10").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspantenmay10").style.color = 'red'
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
      document.getElementById("idspanbuyoff").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("idspanbuyoff").style.color = 'red'
  }
}

</script>


<<<<<<< HEAD
=======


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


>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3
<!-- 
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
<<<<<<< HEAD

 -->

=======
 -->
>>>>>>> afcfe6c5cf8f0191b87551881f803a8d1421aad3



</body>
</html>