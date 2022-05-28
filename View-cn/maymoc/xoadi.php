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

        // $db->UpdateTienDo1($tenmay,$tenline,$tong);
        


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



if(isset($_POST['submittenmay'])){
            $tabletime = 'time1';
            $tenmay = $dataID['tenmay'];
            $tenmay1 = $_POST['nametenmay'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $giotrongngay = 0;
            $ngaybatdau1 = 0;
            $ngaydukien1 = 0;
            $timehoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];
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

// echo "<script type='text/javascript'>alert('$thoigian');</script>";

            if($db->InsertTime($tabletime,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$giotrongngay,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien,$thoigian,$user)){

                header('Refresh:0');
            }
        }






         if(isset($_POST['submitdfm1']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];

        if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


          $tongoftong1 = 0;
          for ($i=0; $i < $length; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i];
                $nguoithuchien = $m1[$i];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                   // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

             }
             $tongoftongtiendo = floor($tongoftong1/$length);
         
               $tong = $tongoftongtiendo.'%';
              $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
            header('Refresh:0');
         }
        }


// submit công đoạn 2

if(isset($_POST['submitdfm2']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];

             
            $tablee = 'tiendo1';
             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i];
                $nguoithuchien = $m1[$i];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);

                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }



// submit công đoạn 3

if(isset($_POST['submitdfm3']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+1];
                $nguoithuchien = $m1[$i+1];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }





        // submit công đoạn 4

if(isset($_POST['submitdfm4']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+2];
                $nguoithuchien = $m1[$i+2];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }





        // submit công đoạn 5

if(isset($_POST['submitdfm5']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+3];
                $nguoithuchien = $m1[$i+3];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }





      // submit công đoạn 6

if(isset($_POST['submitdfm6']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+4];
                $nguoithuchien = $m1[$i+4];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }



      // submit công đoạn 7

if(isset($_POST['submitdfm7']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+5];
                $nguoithuchien = $m1[$i+5];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }





      // submit công đoạn 8

if(isset($_POST['submitdfm8']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+6];
                $nguoithuchien = $m1[$i+6];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }




      // submit công đoạn 9

if(isset($_POST['submitdfm9']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+7];
                $nguoithuchien = $m1[$i+7];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }



      // submit công đoạn 10

if(isset($_POST['submitdfm10']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+8];
                $nguoithuchien = $m1[$i+8];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }




      // submit công đoạn 11

if(isset($_POST['submitdfm11']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+9];
                $nguoithuchien = $m1[$i+9];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                           $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }





      // submit công đoạn 12

if(isset($_POST['submitdfm12']))
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());

             $mathee = $_POST['hoanthanhmathe'];
             $congdoan = $_POST['congdoan'];
             $tiendocongdoan = $_POST['namedfm'];


             $tongoftong1 = 0;
          for ($i=0; $i < 1; $i++) { 
            $tongoftong = 0;
            $table = 'time1';
                $matheee = $m[$i+10];
                $nguoithuchien = $m1[$i+10];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         $tenmaycongdoan = $nametenmay1[0];
                      }
                      else{

                         $tenmaycongdoan = 0;
                      }
                   }else
                   {
                         $tenmaycongdoan = 0;
                   }
                   

                if($tenmaycongdoan > 0)
                {
                    $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                    if($a>0)
                    {
                        $b = $a[0];
                        $tongoftong = $tongoftong + $b;
                    }
                    $tongoftong = $tongoftong + 0;
                }
                else
                {
                     $tongoftong = $tongoftong + 0;
                }
                $tongoftong1 = $tongoftong1 + $tongoftong;
                if($tongoftong1 == 100)
                  {
                     if($db->InsertTien($tablee,$tenmay,$tiendocongdoan,$ngaybatdau,$congdoan,$mathee,$ngaydukien,$thoigian)){


                      $tongoftong1 = 0;
                      for ($i=0; $i < $length; $i++) { 
                        $tongoftong = 0;
                        $table = 'time1';
                            $matheee = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$matheee,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                     $tenmaycongdoan = $nametenmay1[0];
                                  }
                                  else{

                                     $tenmaycongdoan = 0;
                                  }
                               }else
                               {
                                     $tenmaycongdoan = 0;
                               }
                               

                            if($tenmaycongdoan > 0)
                            {
                                $a = $db->gettiendo($tablee,$matheee,$tenmay,$ngaybatdau,$ngaydukien,$tenmaycongdoan);
                                if($a>0)
                                {
                                    $b = $a[0];
                                    $tongoftong = $tongoftong + $b;
                                }
                                $tongoftong = $tongoftong + 0;
                            }
                            else
                            {
                                 $tongoftong = $tongoftong + 0;
                            }
                            $tongoftong1 = $tongoftong1 + $tongoftong;
                               // echo "<script type='text/javascript'>alert('$tongoftong');</script>";

                         }
                         $tongoftongtiendo = floor($tongoftong1/$length);
                     
                           $tong = $tongoftongtiendo.'%';
                          $db->UpdateTienDo1($tenmay,$tenline,$tong,$bophan,$ngaybatdau,$ngaydukien);
                        header('Refresh:0');
                     }
                           
                  }else
                  {
                    $message = 'Tiến Độ trước Chưa Hoàn Thành';
                    // echo "<script type='text/javascript'>alert('$message');</script>";
                  }

             }

    // echo "<script type='text/javascript'>alert('$tongoftong1');</script>";
       
        }






if(isset($_POST['submittrongngay'])){
            $tabletime = 'time1';
            $tenmay = $dataID['tenmay'];
            $tenmay1 = 0;
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $giotrongngay = $_POST['nametrongngay'];
            $ngaybatdau1 = 0;
            $ngaydukien1 = 0;
            $timehoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];
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


            if($db->InsertTime($tabletime,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$giotrongngay,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien,$thoigian,$user)){

                header('Refresh:0');
            }
        }



        


  
        if(isset($_POST['submitngaybatdau'])){
            $tabletime = 'time1';
            $tenmay = $dataID['tenmay'];
            $tenmay1 = 0;
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $giotrongngay = 0;
            $ngaybatdau1 = $_POST['namengaybatdau'];                                        
            $ngaydukien1 = 0;
            $timehoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];
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

            // echo "<script type='text/javascript'>alert('$tungnguoi');</script>";

            if($db->InsertTime($tabletime,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$giotrongngay,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien,$thoigian,$user)){
                header('Refresh:0');
            }
        }


        if(isset($_POST['submitngaydukien'])){
            $tabletime = 'time1';
            $tenmay = $dataID['tenmay'];
            $tenmay1 = 0;
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];
            $tonggio = 0;
            $giotrongngay = 0;
            $ngaybatdau1 = 0;
            $ngaydukien1 = $_POST['namengaydukien'];
            $timehoanthanh = 0;
            $phantram = '0%';
            $tangca = 0;
            $mathe = $_POST['hoanthanhmathe'];
            $nguoithuchien = $_POST['hoanthanhnguoithuchien'];
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

            // echo "<script type='text/javascript'>alert('$tungnguoi');</script>";

            if($db->InsertTime($tabletime,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$giotrongngay,$timehoanthanh,$phantram,$tangca,$mathe,$nguoithuchien,$thoigian,$user)){
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
  

$o = substr($tiendo, 0, -1);

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
    <title>VN cable 自動化</title>

  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudo.css">
   <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudoCN.css">
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
        <h2><a href="../Controller/index.php?action=test2-cn#book" style="font-size: 25px;" class="btn btn-success">菜單</a></h2>   
    </div>



 <div class="container1">  
      <div class="cloud">

          <div class="anim-bar">
      </div>

      <div class="ground" id="ground">
        <div class="mario" id="mario" style="--r:<?php echo  $tiendomario; ?>vw;"></div>
        <div class="mario2" id="mario2" style="--r:<?php echo  $tiendomario; ?>vw"></div>
        <div class="goomba"></div>
     <img src="../image/hangrao3.png" height="130"width="130" style="margin-left: 0vw;margin-top: 4vh;">

<!-- <div style="display: flex;"> -->

<?php $chiatong = 0;
for ($i=1; $i < $length; $i++) { 
    $chia = floor(80/($length));
    $chiatong = $chiatong + $chia;
    // echo "<script type='text/javascript'>alert('$chiatong');</script>";
?>

    <div class="chimney" id="chimney<?php echo $i; ?>" style="margin-left: <?php echo $chiatong ; ?>vw;">
    <div class="top"></div>
    <div class="bottom"></div>
    <span style="width: 200px;" data-bs-toggle="modal" data-bs-target="#dfm<?php echo $i; ?>" class="dfm">
         <?php 
            $table = 'time1';
            $mathe = $m[$i-1];
            $nguoithuchien = $m1[$i-1];
            $tenmay = $dataID['tenmay'];
            $ngaybatdau = $dataID['ngaybatdau'];
            $ngaydukien = $dataID['ngaydukien'];

               $nametenmay1 = $db->getDataTenMay($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
               if($db->num_row()>0)
               {
                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                     echo $nametenmay1[0];
                  }
                  else{

                    echo 0;
                  }
               }else
               {
                echo 0;
               }
              
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


  <div class="chimney" id="chimney5" style="">
      <img src="../image/castle.gif"height="300"width="300" style="">
         <span style="--p: 30vw;"data-bs-toggle="modal" data-bs-target="#dfm<?php echo $length; ?>" data-bs-whatever="Buyoff" id="spanbuyoff" class="buyoff"><?php echo $dataID['tiendo']; ?></span>
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



     <div style="width: 100vw;" class="div-table">
        
          <div style="" class="packages-divtable">
                <span class="div-table-span" style="font-size:30px;font-weight:bold;">進度</span>
                <table class="table" style="">
              <thead>
                <tr>
                    <th style="" class="col-2">機台名稱</th>    
                    <th style="" class="col-1">進度</th>
                    <th style="" class="col-1">開始日期</th>
                    <th style="" class="col-1">預期日期</th>
                    <th style="" class="col-1">全部小时数</th>
                    <th style="" class="col-1">一天中的时间</th>
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


                <td style=''> 
                     <button style="font-size: 22px;" data-bs-toggle="modal" data-bs-target="#timetenmay<?php echo $i; ?>" class="btn btn-primary">
                        <?php 
                            $table = 'time1';
                            $mathe = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];

                               $nametenmay1 = $db->getDataTenMay($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                               if($db->num_row()>0)
                               {
                                  if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                                    echo $nametenmay1[0];
                                  }
                                  else{

                                    echo 0;
                                  }
                               }else
                               {
                                echo 0;
                               }
                              
                            ?>

                     </button>

                </td> 


                <td style=''><?php echo $dataID['tiendo']; ?></td>

                <td style=''>
                    <button style="font-size: 21px;" data-bs-toggle="modal" data-bs-target="#ngaybatdau<?php echo $i; ?>" class="btn btn-primary">
                         <?php 
                            $table = 'time1';
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
                    <button style="font-size: 21px;" data-bs-toggle="modal" data-bs-target="#ngaydukien<?php echo $i; ?>" class="btn btn-primary">
                         <?php 
                            $table = 'time1';
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

                <td><!--  Tự Điền số giờ làm viecj trong ngày -->
                    <button data-bs-toggle="modal" data-bs-target="#timetrongngay<?php echo $i; ?>" class="btn btn-primary" style="">
                        <?php 
                            $table = 'time1';
                            $mathe = $m[$i];
                            $nguoithuchien = $m1[$i];
                            $tenmay = $dataID['tenmay'];
                            $ngaybatdau = $dataID['ngaybatdau'];
                            $ngaydukien = $dataID['ngaydukien'];
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $today =  Date("Y-m-d", time());

                            if($db->num_row()>0)
                            {
                                $giotrongngay = $db->getDataTrongNgay($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien,$today);
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
                            }else{
                                echo 8;
                            }
                            
                            

                               
                              
                            ?>
                    </button>
                </td>
             
                <td style='font-weight: bold;font-size: 25px;'>

                   <button style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#timehoanthanh<?php echo $i; ?>" class="btn btn-primary">
                     <?php 
                     date_default_timezone_set("Asia/Ho_Chi_Minh");
                     $thoigian =  Date("Y-m-d h:i:s a", time());

                     date_default_timezone_set("Asia/Ho_Chi_Minh");
                     $thoigian1 =  Date("Y-m-d", time());
                   
                    if($ngaybatdau1[0] > 0){
                        $date3 = $ngaybatdau1[0];
                      }
                      else{

                        $date3 = 0;
                      }

                    if($ngaydukien1[0] > 0){
                        $date4 = $ngaydukien1[0];
                      }
                      else{
                       $date4 = 0;
                      }
                    
                    if($date3 > 0 && $date4 > 0)
                    {
                         $diff1 = abs(strtotime($date3) - strtotime($thoigian1));
                        $days1 = $diff1 / (60 * 60 * 24);
                        $hours1 = $days1*8;
                        

                        $table = 'time1';
                        $mathe = $m[$i];
                        $nguoithuchien = $m1[$i];
                        $tenmay = $dataID['tenmay'];
                        $ngaybatdau = $dataID['ngaybatdau'];
                        $ngaydukien = $dataID['ngaydukien'];
                        
                        $date5 = $ngaybatdau1[0];
                        $date6 = $thoigian1;
                        $diff2 = abs(strtotime($date3) - strtotime($date6));
                        $days2 = $diff2 / (60 * 60 * 24);
                        
                        $tongg = 0;
                                   
                        for ($g=1; $g <= $days2+1; $g++) { 
                            $time1 = strtotime($date3);
                            $final1 = date("Y-m-d", strtotime("+$g day", $time1));
                            $time2 = $db->getDataTrongNgay2($table,$final1,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                            if($db->num_row()>0)
                            {
                                $tongg = $tongg + $time2[0];
                            }
                            else
                            {
                                $tongg = $tongg + 8;
                            }
                        }
                        echo $tongg;

                        }else
                        {
                            echo $tongg = 0;
                        }

                    

                    
                    ?>
                </button>
            </td>  


            
                <td style='font-weight: bold;'>
                    <?php 
                    if($tongg > 0)
                    {
                        $hieusuat = floor((100 * $hours)/$tongg);
                       echo $hieusuat.'%';
                    }
                    else
                    {
                        echo 0;
                    }
                       
                   
                   ?>
                </td>


                <td>
                     <?php 
                        
                        $table = 'time1';
                        $mathe = $m[$i];
                        $nguoithuchien = $m1[$i];
                        $tenmay = $dataID['tenmay'];
                        $ngaybatdau = $dataID['ngaybatdau'];
                        $ngaydukien = $dataID['ngaydukien'];
                        
                        if($ngaybatdau1[0] > 0){
                        $date3 = $ngaybatdau1[0];
                          }
                          else{

                            $date3 = 0;
                          }



                        $diff1 = abs(strtotime($date3) - strtotime($thoigian1));
                        $days1 = $diff1 / (60 * 60 * 24);
                        $hours1 = $days1*8;
                        

                        $table = 'time1';
                        $mathe = $m[$i];
                        $nguoithuchien = $m1[$i];
                        $tenmay = $dataID['tenmay'];
                        $ngaybatdau = $dataID['ngaybatdau'];
                        $ngaydukien = $dataID['ngaydukien'];
                        
                        $date5 = $ngaybatdau1[0];
                        $date6 = $thoigian1;
                        $diff2 = abs(strtotime($date3) - strtotime($date6));
                        $days2 = $diff2 / (60 * 60 * 24);
                        
                        if($date3 > 0)
                        {
                             $tongtangca = 0;
                            for ($g=1; $g <= $days2; $g++) { 
                            $time1 = strtotime($date3);
                            $final1 = date("Y-m-d", strtotime("+$g day", $time1));
                            $tangca = $db->getDataTanCa($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien,$final1);
                            
                                   if($db->num_row()>0)
                                   {
                                      $a = $tangca[0];                             
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
                       echo "<script type='text/javascript'>alert('$tongtangca');</script>";
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






<!-- Tên Máy -->

<?php for ($i=0; $i < 10; $i++) { 

?>

<form method="POST" action=""> 
<div class="modal fade" id="timetenmay<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Tên Máy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautenmay<?php echo $i+1; ?>" class="col-form-label tieudematkhautenmay<?php echo $i+1; ?>">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhautenmay<?php echo $i+1; ?>" id="idmatkhautenmay<?php echo $i+1; ?>">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[$i]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[$i]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetenmay<?php echo $i+1; ?>" class="col-form-label tieudetenmay<?php echo $i+1; ?>"style="display:none;">Tên Máy :</label>
            <input type="text" required ="required" name="nametenmay" class="form-control idinputtenmay" id="idinputtenmay<?php echo $i+1; ?>"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantenmay<?php echo $i+1; ?>" class="idinputtenmay<?php echo $i+1; ?>"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmaytenmay<?php echo $i+1; ?>" id="submitmaytenmay<?php echo $i+1; ?>" name="submitmaytenmay">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submittenmay<?php echo $i+1; ?>" id="submittenmay<?php echo $i+1; ?>" name="submittenmay"style="display:none;">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } ?>






<!-- THời Gian Hoàn thành -->

<?php for ($i=0; $i < 10; $i++) { 

?>

<form method="POST" action=""> 
<div class="modal fade" id="timehoanthanh<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="">
        <h5 class=""style="display: flex;justify-content: center;font-size: 40px;font-weight: bold;" id="exampleModalLabel">Bảng Lịch Sử Cập Nhật</h5>
      </div>
      <div class="modal-body">
        
        <table style="" name="tabletable" id="idtable" class="table-hover table">
          <thead>
            <tr class="tr" style="">
                <th class="col-1 col-xs-1"id="idth" style="background: #D5E0E0;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px;line-height: 100px;">Tên Máy</th>  
                <th class="col-1 col-xs-1"id="idth" style="background:#41f055;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px;">Tên Công Đoạn</th> 
                <th class="col-1 col-xs-1"style="background: #dafa28;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px;line-height: 100px; ">Ngày Bắt Đầu</th>
                <th class="col-1 col-xs-1"style="background: #247070;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px;line-height: 100px; ">Ngày Dự Kiến</th>
                <th class="col-1 col-xs-1"style="background: #ff9378;line-height: 50px;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px; ">Giờ Trong Ngày</th>
                <th class="col-1 col-xs-1"style="background: #edc045;line-height: 50px;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px; ">Giờ Hoàn Thành</th>
                <th class="col-1 col-xs-1"style="background: #4fcdf0;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px;line-height: 100px; ">Mã Thẻ</th>
                <th class="col-1 col-xs-1"style="background: #D91C97;line-height: 50px;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px; ">Người Thực Hiện</th>
                <th class="col-1 col-xs-1"style="background: #EB090D;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px;line-height: 100px; ">Người Sửa</th>
                 <th class="col-1 col-xs-1"style="background: #eb6ebb;border: 3px solid white;border-radius: 20px 20px 0 0;text-align: center;font-size: 25px;line-height: 100px; ">Thời Gian Sửa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $time = 'time1';
             $alltable = $db->getDataLíchsu($time,$tenmay,$ngaybatdau,$ngaydukien);
             // echo "<script type='text/javascript'>alert('$ngaydukien');</script>";
            foreach ($alltable as $key) {

            ?>
                 <tr>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['tenmay'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['tenmay1'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['ngaybatdau1'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['ngaydukien1'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['giotrongngay'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['hoanthanh'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['mathe'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['nguoithuchien'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['user'];?></td>
                     <td class="col-1" style="font-weight: bold;border: 3px solid #d5e0e0;font-size: 20px;text-align: center;"><?php echo $key['thoigian'];?></td>
                 </tr>
             <?php } ?>
      </tbody>
     </table>

          <div>
              <span id="idspanhoanthanh<?php echo $i+1; ?>" class="idinputhoanthanh<?php echo $i+1; ?>"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  btn-lg" style="margin-right: 50px;" data-bs-dismiss="modal">Đóng</button>
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





<!-- Sửa DFM -->

<?php for ($i=0; $i <= $length; $i++) { 
    
?>

<form method="POST" action=""> 
<div class="modal fade" id="dfm<?php echo $i+1; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Tiến Độ 
               <?php 
               $table = 'time1';
                $mathe = $m[$i];
                $nguoithuchien = $m1[$i];
                $tenmay = $dataID['tenmay'];
                $ngaybatdau = $dataID['ngaybatdau'];
                $ngaydukien = $dataID['ngaydukien'];

                   $nametenmay1 = $db->getDataTenMay($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                   if($db->num_row()>0)
                   {
                      if($nametenmay1[0] != null && $nametenmay1[0] > 0){
                         echo $nametenmay1[0];
                      }
                      else{

                        echo 0;
                      }
                   }else
                   {
                    echo 0;
                   }
                ?>

        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhaudfm<?php echo $i+1; ?>" class="col-form-label">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control" id="idmatkhaudfm<?php echo $i+1; ?>">

             <input type="hidden" name="congdoan" value="<?php echo $nametenmay1[0]; ?>">
             <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[$i]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[$i]; ?>">


          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudedfm<?php echo $i+1; ?>" class="col-form-label tieudedfm<?php echo $i+1; ?>"style="display:none;">Tiến Độ(%):</label>
            <input type="number" min="0" max="100" required ="required" name="namedfm" class="form-control" id="idinputdfm<?php echo $i+1; ?>"
            value="0"style="display:none;">
          </div>
          <div>
              <span id="idspandfm<?php echo $i+1; ?>" class="idinputdfm<?php echo $i+1; ?>"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmaydfm<?php echo $i+1; ?>" id="submitmaydfm<?php echo $i+1; ?>" name="submitmaydfm">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary <?php echo $i+1; ?>" id="submitdfm<?php echo $i+1; ?>" name="submitdfm<?php echo $i+1; ?>"style="display:none;">Xác Nhận</button>
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



<!-- Tên Time Trong Ngày -->

<?php for ($i=0; $i < 10; $i++) { 

?>

<form method="POST" action=""> 
<div class="modal fade" id="timetrongngay<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập Nhập Giờ Trong Ngày</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhautrongngay<?php echo $i+1; ?>" class="col-form-label tieudematkhautrongngay<?php echo $i+1; ?>">Nhập Mật Khẩu Để Sửa:</label>
            <input type="password" required ="required" name="" class="form-control idmatkhautrongngay<?php echo $i+1; ?>" id="idmatkhautrongngay<?php echo $i+1; ?>">

            <input type="hidden" name="hoanthanhmathe" value="<?php echo $m[$i]; ?>">
            <input type="hidden" name="hoanthanhnguoithuchien" value="<?php echo $m1[$i]; ?>">

          </div>
          <div class="mb-3">
            <label for="recipient-name" id="tieudetrongngay<?php echo $i+1; ?>" class="col-form-label tieudetrongngay<?php echo $i+1; ?>"style="display:none;">Giờ Trong Ngày(Giờ); ?> :</label>
            <input type="number" min="0" max="11" required ="required" name="nametrongngay" class="form-control idinputtrongngay" id="idinputtrongngay<?php echo $i+1; ?>"value="0"style="display:none;">
          </div>
          <div>
              <span id="idspantrongngay<?php echo $i+1; ?>" class="idinputtrongngay<?php echo $i+1; ?>"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span class="btn btn-primary submitmaytrongngay<?php echo $i+1; ?>" id="submitmaytrongngay<?php echo $i+1; ?>" name="submitmaytrongngay">Xác Nhận</span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary submittrongngay<?php echo $i+1; ?>" id="submittrongngay<?php echo $i+1; ?>" name="submittrongngay"style="display:none;">Xác Nhận</button>
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
        <h5 class="modal-title" id="exampleModalLabel">3DTo2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
          <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau3dto2d" class="col-form-label">進度 :</label>
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
            <label for="recipient-name" id="tieudematkhau" class="col-form-label">進度 :</label>
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
            <label for="recipient-name" id="tieudematkhau1" class="col-form-label">進度 :</label>
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
        <h5 class="modal-title" id="exampleModalLabel">Buyoff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
         <input type="hidden" name="edit1" id="edit1">
         <div class="mb-3">
            <label for="recipient-name" id="tieudematkhau2" class="col-form-label">進度 :</label>
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

    var a = "<?php echo $length; ?>";
    var b = "<?php echo $o; ?>"
    var mario = document.getElementById('mario');
    var mario2 = document.getElementById('mario2');
    if(b == 0 || b == 1 || b == 2 || b == 3 || b == 4 || b == 5 || b == 6)
    {

        mario.classList.toggle("mario00");
        mario2.classList.toggle("mario00");
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

    if(a == 5)
    {
        mario.classList.add("mario5");
        mario2.classList.add("mario25");
    }

    if(a == 6)
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