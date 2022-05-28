 <tbody>
            <?php for ($i=0; $i < $length; $i++) { 
                // echo "<script type='text/javascript'>alert('$length');</script>";
            ?>
            <tr style="background: white;height: 20px;text-align:center;font-size: 20px;">


                <td style=''> 
                     <button style="font-size: 22px;" data-bs-toggle="modal" data-bs-target="#timetenmay<?php echo $i; ?>" class="btn btn-primary">
                        <?php 
                            $table = 'time';
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
                    <button style="font-size: 21px;" data-bs-toggle="modal" data-bs-target="#ngaydukien<?php echo $i; ?>" class="btn btn-primary">
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
                           $days22 = $diff / (60 * 60 * 24);
                             // echo "<script type='text/javascript'>alert('$days22');</script>";
                           for ($l=1; $l <= $days22; $l++) { 
                            $time1 = strtotime($date1);
                            $final1 = date("Y-m-d", strtotime("+$l day", $time1));


                            $a = '2022-05/02';
                            $dayofweek = date('l', strtotime($final1));

     
                            if($dayofweek == 'Sunday')
                            {

                           
                            }
                           }
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
                            $table = 'time';
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
                     $tonggg = 0;
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
                        

                        $table = 'time';
                        $mathe = $m[$i];
                        $nguoithuchien = $m1[$i];
                        $tenmay = $dataID['tenmay'];
                        $ngaybatdau = $dataID['ngaybatdau'];
                        $ngaydukien = $dataID['ngaydukien'];
                        
                        $date5 = $ngaybatdau1[0];
                        $date6 = $thoigian1;
                        $diff2 = abs(strtotime($date3) - strtotime($date6));
                        $days2 = $diff2 / (60 * 60 * 24);
                        
                        $tonggg = 0;
                                   
                        for ($g=1; $g <= $days2+1; $g++) { 
                            $time1 = strtotime($date3);
                            $final1 = date("Y-m-d", strtotime("+$g day", $time1));
                            $time2 = $db->getDataTrongNgay2($table,$final1,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien);
                            if($db->num_row()>0)
                            {
                                $tonggg = $tonggg + $time2[0];
                            }
                            else
                            {
                                $tonggg = $tonggg + 8;
                            }
                        }
                        echo $tonggg;

                        }else
                        {
                            echo $tonggg = 0;
                        }
                      
                    

                    
                    ?>
                </button>
            </td>  


            
                <td style='font-weight: bold;'>
                    <?php 
                    if($tonggg > 0)
                    {
                        $hieusuat = floor((100 * $hours)/$tonggg);
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
                        
                        $table = 'time';
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
                        

                        $table = 'time';
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