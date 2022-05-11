<?php
    include "../connection.php";
    $today1 = date("Y/m/d");
    $thu = date("l", strtotime($today1));
    $month = date("m/Y");
    $year = date("Y");
    $days= array();
    $weeks= array();
    $months = array();
    $ngays = array();
    $a = 0;
    $b = 0;
    //  Dữ liệu ngày trong tuần
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $dateParam = date('Y-m-d');
    $week = date('w', strtotime($dateParam));
    $date = new DateTime($dateParam);
    $firstWeek = $date->modify("-".$week." day")->format("Y-m-d");
    $monday = strtotime ( '+1 day' , strtotime ( $firstWeek ) ) ;
    $tuesday = strtotime ( '+2 day' , strtotime ( $firstWeek ) ) ;
    $wednesday = strtotime ( '+3 day' , strtotime ( $firstWeek ) ) ;
    $thursday = strtotime ( '+4 day' , strtotime ( $firstWeek ) ) ;
    $friday = strtotime ( '+5 day' , strtotime ( $firstWeek ) ) ;
    $saturday = strtotime ( '+6 day' , strtotime ( $firstWeek ) ) ;
    $monday = date ( 'Y-m-d' , $monday );
    $tuesday = date ( 'Y-m-d' , $tuesday );
    $wednesday = date ( 'Y-m-d' , $wednesday );
    $thursday = date ( 'Y-m-d' , $thursday );
    $friday = date ( 'Y-m-d' , $friday );
    $saturday = date ( 'Y-m-d' , $saturday );

    $sql = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$monday' ";
    $kq1 = mysqli_query($conn,$sql);
    while($mon =  mysqli_fetch_array($kq1)){

        foreach($mon as $key){
            $days[] = $key;         
        }    
    }

    if( !empty($days[1])   ||  !empty($days[3])){
        $dilamthu2 = $days[3]; 
        $nghilamthu2 = $days[1];
        $tongthu2 = $dilamthu2 + $nghilamthu2;
        $tiledilamthu2 = ($dilamthu2*100)/$tongthu2;
        $tilenghilamthu2 = 100 - $tiledilamthu2;
       
    }else{
        $dilamthu2 = 0;
        $nghilamthu2 =0;
        $tiledilamthu2 = 0;
        $tilenghilamthu2 = 0;
    }

    $sql1 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$tuesday' ";
    $kq2 = mysqli_query($conn,$sql1);
    while($tue =  mysqli_fetch_array($kq2)){

        foreach($tue as $key){
            $days[] = $key;         
        }    
    }

    if( !empty($days[5])   ||  !empty($days[7])){
        $dilamthu3 = $days[7]; 
        $nghilamthu3 = $days[5];
        $tongthu3 = $dilamthu3 + $nghilamthu3;
        $tiledilamthu3 = ($dilamthu3*100)/$tongthu3;
        $tilenghilamthu3 = 100 - $tiledilamthu3;
       
    }else{
        $dilamthu3 = 0;
        $nghilamthu3 = 0;
        $tiledilamthu3 = 0;
        $tilenghilamthu3 = 0;
    }
    $sql2 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$wednesday' ";
    $kq3 = mysqli_query($conn,$sql2);
    while($wed =  mysqli_fetch_array($kq3)){

        foreach($wed as $key){
            $days[] = $key;         
        }    
    }

    if( !empty($days[11])   ||  !empty($days[9])){
        $dilamthu4 = $days[11]; 
        $nghilamthu4 = $days[9];
        $tongthu4 = $dilamthu4 + $nghilamthu4;
        $tiledilamthu4 = ($dilamthu4*100)/$tongthu4;
        $tilenghilamthu4 = 100 - $tiledilamthu4;
       
    }else{$dilamthu4 = 0;
        $nghilamthu4 =0;
        $tiledilamthu4 = 0;
        $tilenghilamthu4 = 0;
    }
    $sql3 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$thursday' ";
    $kq4 = mysqli_query($conn,$sql3);
    while($thu =  mysqli_fetch_array($kq4)){

        foreach($thu as $key){
            $days[] = $key;         
        }    
    }

    if( !empty($days[13])   ||  !empty($days[15])){
        $dilamthu5 = $days[15]; 
        $nghilamthu5 = $days[13];
        $tongthu5 = $dilamthu5 + $nghilamthu5;
        $tiledilamthu5 = ($dilamthu5*100)/$tongthu5;
        $tilenghilamthu5 = 100 - $tiledilamthu5;
       
    }else{
        $dilamthu5 = 0;
        $nghilamthu5 =0;
        $tiledilamthu5 = 0;
        $tilenghilamthu5 = 0;
    }
    $sql4 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$friday' ";
    $kq5 = mysqli_query($conn,$sql4);
    while($fri =  mysqli_fetch_array($kq5)){

        foreach($fri as $key){
            $days[] = $key;         
        }    
    }

    if( !empty($days[17])   ||  !empty($days[19])){
        $dilamthu6 = $days[19]; 
        $nghilamthu6 = $days[17];
        $tongthu6 = $dilamthu6 + $nghilamthu6;
        $tiledilamthu6 = ($dilamthu6*100)/$tongthu6;
        $tilenghilamthu6 = 100 - $tiledilamthu6;
       
    }else{
        $dilamthu6 = 0;
        $nghilamthu6 =0;
        $tiledilamthu6 = 0;
        $tilenghilamthu6 = 0;
    }
    $sql5 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$saturday' ";
    $kq6 = mysqli_query($conn,$sql5);
    while($sat =  mysqli_fetch_array($kq6)){

        foreach($sat as $key){
            $days[] = $key;         
        }    
    }

    if( !empty($days[21])   ||  !empty($days[33])){
        $dilamthu7 = $days[23]; 
        $nghilamthu7 = $days[21];
        $tongthu7 = $dilamthu7 + $nghilamthu7;
        $tiledilamthu7 = ($dilamthu7*100)/$tongthu7;
        $tilenghilamthu7 = 100 - $tiledilamthu7;
       
    }else{
        $dilamthu7 = 0;
        $nghilamthu7 =0;
        $tiledilamthu7 = 0;
        $tilenghilamthu7 = 0;
    }


// Dữ liệu tuần trong tháng
$dautuan1 = date('Y-m-d', strtotime(date('Y-m-01', strtotime("now"))));
$cuoituan1 = date('Y-m-d', strtotime(date('Y-m-07', strtotime("now"))));
$dautuan2 = date('Y-m-d', strtotime(date('Y-m-08', strtotime("now"))));
$cuoituan2 = date('Y-m-d', strtotime(date('Y-m-15', strtotime("now"))));
$dautuan3 = date('Y-m-d', strtotime(date('Y-m-16', strtotime("now"))));
$cuoituan3 = date('Y-m-d', strtotime(date('Y-m-23', strtotime("now"))));
$dautuan4 = date('Y-m-d', strtotime(date('Y-m-24', strtotime("now"))));
$cuoituan4 = date("Y-m-t");

        $mysql = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan1' AND '$cuoituan1' ";
        $ketquaw1 = mysqli_query($conn,$mysql);
        while($w1 =  mysqli_fetch_array($ketquaw1)){

            foreach($w1 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[1])   ||  !empty($weeks[3])){
            $dilamtuan1 = $weeks[3]; 
            $nghilamtuan1 = $weeks[1];
            $tongtuan1 = $dilamtuan1 + $nghilamtuan1;
            $tiledilamtuan1 = ($dilamtuan1*100)/$tongtuan1;
            $tilenghilamtuan1 = 100 - $tiledilamtuan1;
           
        }else{
            $tiledilamtuan1 =0;
            $tilenghilamtuan1 =0;
        }


        $mysql1 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan2' AND '$cuoituan2' ";
        $ketquaw2 = mysqli_query($conn,$mysql1);
        while($w2 =  mysqli_fetch_array($ketquaw2)){
    
            foreach($w2 as $key){
                $weeks[] = $key;         
            }    
        }
        
        if( !empty($weeks[5])   ||  !empty($weeks[7])){
            $dilamtuan2 = $weeks[7]; 
            $nghilamtuan2 = $weeks[5];
            $tongtuan2 = $dilamtuan2 + $nghilamtuan2;
            $tiledilamtuan2 = ($dilamtuan2*100)/$tongtuan2;
            $tilenghilamtuan2 = 100 - $tiledilamtuan2;
            
        }else{
            $tiledilamtuan2 =0;
            $tilenghilamtuan2 =0;
        }


        $mysql2 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan3' AND '$cuoituan3' ";
        $ketquaw3 = mysqli_query($conn,$mysql2);
        while($w3 =  mysqli_fetch_array($ketquaw3)){
    
            foreach($w3 as $key){
                $weeks[] = $key;         
            }    
        }
        
        if( !empty($weeks[9])   ||  !empty($weeks[11])){
            $dilamtuan3 = $weeks[11]; 
            $nghilamtuan3 = $weeks[9];
            $tongtuan3 = $dilamtuan3 + $nghilamtuan3;
            $tiledilamtuan3 = ($dilamtuan3*100)/$tongtuan3;
            $tilenghilamtuan3 = 100 - $tiledilamtuan3;
        }else{
            $tiledilamtuan3 =0;
            $tilenghilamtuan3 =0;
        }
    


        $mysql3 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan4' AND '$cuoituan4' ";
        $ketquaw4 = mysqli_query($conn,$mysql3);
        while($w4 =  mysqli_fetch_array($ketquaw4)){
    
            foreach($w4 as $key){
                $weeks[] = $key;         
            }    
        }

        
        if( !empty($weeks[13])   ||  !empty($weeks[15])){
            $dilamtuan4 = $weeks[15]; 
            $nghilamtuan4 = $weeks[13];
            $tongtuan4 = $dilamtuan4 + $nghilamtuan4;
            $tiledilamtuan4 = ($dilamtuan4*100)/$tongtuan4;
            $tilenghilamtuan4 = 100 - $tiledilamtuan4;
        }else{
            $tiledilamtuan4 =0;
            $tilenghilamtuan4 =0;
        }
    
    //    Dữ liệu trong năm
    $dauthang1 =date("Y-m-d", mktime(0, 0, 0, 1,1 ,date("Y")));
    $cuoithang1 = date("Y-m-d", mktime(0, 0, 0, 1+1,0,date("Y")));
    $dauthang2 =date("Y-m-d", mktime(0, 0, 0, 2,1 ,date("Y")));
    $cuoithang2 = date("Y-m-d", mktime(0, 0, 0, 2+1,0,date("Y")));
    $dauthang3 =date("Y-m-d", mktime(0, 0, 0, 3,1 ,date("Y")));
    $cuoithang3 = date("Y-m-d", mktime(0, 0, 0, 3+1,0,date("Y")));
    $dauthang4 =date("Y-m-d", mktime(0, 0, 0, 4,1 ,date("Y")));
    $cuoithang4 = date("Y-m-d", mktime(0, 0, 0, 4+1,0,date("Y")));
    $dauthang5 =date("Y-m-d", mktime(0, 0, 0, 5,1 ,date("Y")));
    $cuoithang5 = date("Y-m-d", mktime(0, 0, 0, 5+1,0,date("Y")));
    $dauthang6 =date("Y-m-d", mktime(0, 0, 0, 6,1 ,date("Y")));
    $cuoithang6 = date("Y-m-d", mktime(0, 0, 0, 6+1,0,date("Y")));
    $dauthang7 =date("Y-m-d", mktime(0, 0, 0, 7,1 ,date("Y")));
    $cuoithang7 = date("Y-m-d", mktime(0, 0, 0, 7+1,0,date("Y")));
    $dauthang8 =date("Y-m-d", mktime(0, 0, 0, 8,1 ,date("Y")));
    $cuoithang8 = date("Y-m-d", mktime(0, 0, 0, 8+1,0,date("Y")));
    $dauthang9 =date("Y-m-d", mktime(0, 0, 0, 9,1 ,date("Y")));
    $cuoithang9 = date("Y-m-d", mktime(0, 0, 0, 9+1,0,date("Y")));
    $dauthang10 =date("Y-m-d", mktime(0, 0, 0, 10,1 ,date("Y")));
    $cuoithang10 = date("Y-m-d", mktime(0, 0, 0, 10+1,0,date("Y")));
    $dauthang11 =date("Y-m-d", mktime(0, 0, 0, 11,1 ,date("Y")));
    $cuoithang11 = date("Y-m-d", mktime(0, 0, 0, 11+1,0,date("Y")));
    $dauthang12 =date("Y-m-d", mktime(0, 0, 0, 12,1 ,date("Y")));
    $cuoithang12 = date("Y-m-d", mktime(0, 0, 0, 12+1,0,date("Y")));
    
    $mysql4 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang1' AND '$cuoithang1' ";
    $reponse = mysqli_query($conn,$mysql4);
    while($ketquam1 =  mysqli_fetch_array($reponse)){

        foreach($ketquam1 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[1])   ||  !empty($months[3])){
        $dilamthang1 = $months[3]; 
        $nghilamthang1 = $months[1];
        $tongthang1 = $dilamthang1 + $nghilamthang1;
        $tiledilamthang1 = ($dilamthang1*100)/$tongthang1;
        $tilenghilamthang1 = 100 - $tiledilamthang1;
    }else{
        $tiledilamthang1 =0;
        $tilenghilamthang1 =0;
    }

    $mysql5 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang2' AND '$cuoithang2' ";
    $reponse1 = mysqli_query($conn,$mysql5);
    while($ketquam2 =  mysqli_fetch_array($reponse1)){

        foreach($ketquam2 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[5])   ||  !empty($months[7])){
        $dilamthang2 = $months[7]; 
        $nghilamthang2 = $months[5];
        $tongthang2 = $dilamthang2 + $nghilamthang2;
        $tiledilamthang2 = ($dilamthang2*100)/$tongthang2;
        $tilenghilamthang2 = 100 - $tiledilamthang2;
    }else{
        $tiledilamthang2 =0;
        $tilenghilamthang2 =0;
    }
    $mysql6 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang3' AND '$cuoithang3' ";
    $reponse2 = mysqli_query($conn,$mysql6);
    while($ketquam3 =  mysqli_fetch_array($reponse2)){

        foreach($ketquam3 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[11])   ||  !empty($months[9])){
        $dilamthang3 = $months[11]; 
        $nghilamthang3 = $months[9];
        $tongthang3 = $dilamthang3 + $nghilamthang3;
        $tiledilamthang3 = ($dilamthang3*100)/$tongthang3;
        $tilenghilamthang3 = 100 - $tiledilamthang3;
    }else{
        $tiledilamthang3 =0;
        $tilenghilamthang3 =0;
    }
    $mysql7 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang4' AND '$cuoithang4' ";
    $reponse3 = mysqli_query($conn,$mysql7);
    while($ketquam4 =  mysqli_fetch_array($reponse3)){

        foreach($ketquam4 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[15])   ||  !empty($months[13])){
        $dilamthang4 = $months[15]; 
        $nghilamthang4 = $months[13];
        $tongthang4 = $dilamthang4 + $nghilamthang4;
        $tiledilamthang4 = ($dilamthang4*100)/$tongthang4;
        $tilenghilamthang4 = 100 - $tiledilamthang4;
       
    }else{
        $tiledilamthang4 =0;
        $tilenghilamthang4 =0;
    }
    $mysql8 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang5' AND '$cuoithang5' ";
    $reponse4 = mysqli_query($conn,$mysql8);
    while($ketquam5 =  mysqli_fetch_array($reponse4)){

        foreach($ketquam5 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[17])   ||  !empty($months[19])){
        $dilamthang5 = $months[19]; 
        $nghilamthang5 = $months[17];
        $tongthang5 = $dilamthang5 + $nghilamthang5;
        $tiledilamthang5 = ($dilamthang5*100)/$tongthang5;
        $tilenghilamthang5 = 100 - $tiledilamthang5;
        
    }else{
        $tiledilamthang5 =0;
        $tilenghilamthang5 =0;
    }
    $mysql9 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang6' AND '$cuoithang6' ";
    $reponse5 = mysqli_query($conn,$mysql9);
    while($ketquam6 =  mysqli_fetch_array($reponse5)){

        foreach($ketquam6 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[21])   ||  !empty($months[23])){
        $dilamthang6 = $months[23]; 
        $nghilamthang6 = $months[21];
        $tongthang6 = $dilamthang6 + $nghilamthang6;
        $tiledilamthang6 = ($dilamthang6*100)/$tongthang6;
        $tilenghilamthang6 = 100 - $tiledilamthang6;
        
    }else{
        $tiledilamthang6 =0;
        $tilenghilamthang6 =0;
    }
    $mysql10 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang7' AND '$cuoithang7' ";
    $reponse6 = mysqli_query($conn,$mysql10);
    while($ketquam7 =  mysqli_fetch_array($reponse6)){

        foreach($ketquam7 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[25])   ||  !empty($months[27])){
        $dilamthang7 = $months[27]; 
        $nghilamthang7 = $months[25];
        $tongthang7 = $dilamthang7 + $nghilamthang7;
        $tiledilamthang7 = ($dilamthang7*100)/$tongthang7;
        $tilenghilamthang7 = 100 - $tiledilamthang7;
    }else{
        $tiledilamthang7 =0;
        $tilenghilamthang7 =0;
    }  
        
    $mysql11 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang8' AND '$cuoithang8' ";
    $reponse7 = mysqli_query($conn,$mysql11);
    while($ketquam8 =  mysqli_fetch_array($reponse7)){

        foreach($ketquam8 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[29])   ||  !empty($months[31])){
        $dilamthang8 = $months[31]; 
        $nghilamthang8 = $months[29];
        $tongthang8 = $dilamthang8 + $nghilamthang8;
        $tiledilamthang8 = ($dilamthang8*100)/$tongthang8;
        $tilenghilamthang8 = 100 - $tiledilamthang8;
   
    }else{
        $tiledilamthang8 =0;
        $tilenghilamthang8 =0;
    }
    $mysql12 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang9' AND '$cuoithang9' ";
    $reponse8 = mysqli_query($conn,$mysql12);
    while($ketquam9 =  mysqli_fetch_array($reponse8)){

        foreach($ketquam9 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[33])   ||  !empty($months[35])){
        $dilamthang9 = $months[335]; 
        $nghilamthang9 = $months[33];
        $tongthang9 = $dilamthang9 + $nghilamthang9;
        $tiledilamthang9 = ($dilamthang9*100)/$tongthang9;
        $tilenghilamthang9 = 100 - $tiledilamthang9;
        
    }else{
        $tiledilamthang9 =0;
        $tilenghilamthang9 =0;
    }
    $mysql13 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang10' AND '$cuoithang10' ";
    $reponse9 = mysqli_query($conn,$mysql13);
    while($ketquam10 =  mysqli_fetch_array($reponse9)){

        foreach($ketquam10 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[37])   ||  !empty($months[39])){
        $dilamthang10 = $months[39]; 
        $nghilamthang10 = $months[37];
        $tongthang10 = $dilamthang10 + $nghilamthang10;
        $tiledilamthang10 = ($dilamthang10*100)/$tongthang10;
        $tilenghilamthang10 = 100 - $tiledilamthang10;
        
    }else{
        $tiledilamthang10 =0;
        $tilenghilamthang10 =0;
    }
    $mysql14 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang11' AND '$cuoithang11' ";
    $reponse10 = mysqli_query($conn,$mysql14);
    while($ketquam11 =  mysqli_fetch_array($reponse10)){

        foreach($ketquam11 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[41])   ||  !empty($months[43])){
        $dilamthang11 = $months[43]; 
        $nghilamthang11 = $months[41];
        $tongthang11 = $dilamthang11 + $nghilamthang11;
        $tiledilamthang11 = ($dilamthang11*100)/$tongthang11;
        $tilenghilamthang11 = 100 - $tiledilamthang11;
    }else{
        $tiledilamthang11 =0;
        $tilenghilamthang11 =0;
    }
    $mysql15 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang12' AND '$cuoithang12' ";
    $reponse11 = mysqli_query($conn,$mysql15);
    while($ketquam12 =  mysqli_fetch_array($reponse11)){

        foreach($ketquam12 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[45])   ||  !empty($months[47])){
        $dilamthang12 = $months[47]; 
        $nghilamthang12 = $months[45];
        $tongthang12 = $dilamthang12 + $nghilamthang12;
        $tiledilamthang12 = ($dilamthang12*100)/$tongthang12;
        $tilenghilamthang12 = 100 - $tiledilamthang12;
        
    }else{
        $tiledilamthang12 =0;
        $tilenghilamthang12 =0;
    }
    // Dữ liệu từng ngày trong tháng
    $ngay1 = date('Y-m-d', strtotime(date('Y-m-01', strtotime("now"))));
    $ngay2 = date('Y-m-d', strtotime(date('Y-m-02', strtotime("now"))));
    $ngay3 = date('Y-m-d', strtotime(date('Y-m-03', strtotime("now"))));
    $ngay4 = date('Y-m-d', strtotime(date('Y-m-04', strtotime("now"))));
    $ngay5 = date('Y-m-d', strtotime(date('Y-m-05', strtotime("now"))));
    $ngay6 = date('Y-m-d', strtotime(date('Y-m-06', strtotime("now"))));
    $ngay7 = date('Y-m-d', strtotime(date('Y-m-07', strtotime("now"))));
    $ngay8 = date('Y-m-d', strtotime(date('Y-m-08', strtotime("now"))));
    $ngay9 = date('Y-m-d', strtotime(date('Y-m-09', strtotime("now"))));
    $ngay10 = date('Y-m-d', strtotime(date('Y-m-10', strtotime("now"))));
    $ngay11 = date('Y-m-d', strtotime(date('Y-m-11', strtotime("now"))));
    $ngay12 = date('Y-m-d', strtotime(date('Y-m-12', strtotime("now"))));
    $ngay13 = date('Y-m-d', strtotime(date('Y-m-13', strtotime("now"))));
    $ngay14 = date('Y-m-d', strtotime(date('Y-m-14', strtotime("now"))));
    $ngay15 = date('Y-m-d', strtotime(date('Y-m-15', strtotime("now"))));
    $ngay16 = date('Y-m-d', strtotime(date('Y-m-16', strtotime("now"))));
    $ngay17 = date('Y-m-d', strtotime(date('Y-m-17', strtotime("now"))));
    $ngay18 = date('Y-m-d', strtotime(date('Y-m-18', strtotime("now"))));
    $ngay19 = date('Y-m-d', strtotime(date('Y-m-19', strtotime("now"))));
    $ngay20 = date('Y-m-d', strtotime(date('Y-m-20', strtotime("now"))));
    $ngay21 = date('Y-m-d', strtotime(date('Y-m-21', strtotime("now"))));
    $ngay22 = date('Y-m-d', strtotime(date('Y-m-22', strtotime("now"))));
    $ngay23 = date('Y-m-d', strtotime(date('Y-m-23', strtotime("now"))));
    $ngay24 = date('Y-m-d', strtotime(date('Y-m-24', strtotime("now"))));
    $ngay25 = date('Y-m-d', strtotime(date('Y-m-25', strtotime("now"))));
    $ngay26 = date('Y-m-d', strtotime(date('Y-m-26', strtotime("now"))));
    $ngay27 = date('Y-m-d', strtotime(date('Y-m-27', strtotime("now"))));
    $ngay28 = date('Y-m-d', strtotime(date('Y-m-28', strtotime("now"))));
    $ngay29 = date('Y-m-d', strtotime(date('Y-m-29', strtotime("now"))));
    $ngay30 = date('Y-m-d', strtotime(date('Y-m-30', strtotime("now"))));
    $ngay31 = date('Y-m-d', strtotime(date('Y-m-31', strtotime("now"))));

    $truyvan1 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay1' ";
    $dulieu1 = mysqli_query($conn,$truyvan1);
    while($n1 =  mysqli_fetch_array($dulieu1)){

        foreach($n1 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[1])   ||  !empty($ngays[3])){
        $dilamngay1 = $ngays[3]; 
        $nghilamngay1 = $ngays[1];
        $tongngay1 = $dilamngay1 + $nghilamngay1;
        $tiledilamngay1 = ($dilamngay1*100)/$tongngay1;
        $tilenghilamngay1 = 100 - $tiledilamngay1;
        
    }else{
        $dilamngay1 =0;
        $nghilamngay1 =0;
    }

    $truyvan2 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay2' ";
    $dulieu2 = mysqli_query($conn,$truyvan2);
    while($n2 =  mysqli_fetch_array($dulieu2)){

        foreach($n2 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[5])   ||  !empty($ngays[7])){
        $dilamngay2 = $ngays[7];
        $nghilamngay2 = $ngays[5];
        $tongngay2 = $dilamngay2 + $nghilamngay2;
        $tiledilamngay2 = ($dilamngay2*100)/$tongngay2;
        $tilenghilamngay2 = 100 - $tiledilamngay2;
        
        }else{
            $dilamngay2 =0;
            $nghilamngay2 = 0; 
        }
    
    $truyvan3 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay3' ";
    $dulieu3 = mysqli_query($conn,$truyvan3);
    while($n3 =  mysqli_fetch_array($dulieu3)){

        foreach($n3 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[11])   ||  !empty($ngays[9])){
        $dilamngay3 = $ngays[11];
        $nghilamngay3 = $ngays[9];
        $tongngay3 = $dilamngay3 + $nghilamngay3;
        $tiledilamngay3 = ($dilamngay3*100)/$tongngay3;
        $tilenghilamngay3 = 100 - $tiledilamngay3;
        
    }else{
        $dilamngay3 =0;
        $nghilamngay3 = 0; 
    }
    $truyvan4 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay4' ";
    $dulieu4 = mysqli_query($conn,$truyvan4);
    while($n4 =  mysqli_fetch_array($dulieu4)){

        foreach($n4 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[13])   ||  !empty($ngays[15])){
        $dilamngay4 = $ngays[15]; 
        $nghilamngay4 = $ngays[13];
        $tongngay4 = $dilamngay4 + $nghilamngay4;
        $tiledilamngay4 = ($dilamngay4*100)/$tongngay4;
        $tilenghilamngay4 = 100 - $tiledilamngay4;
        
    }else{
        $dilamngay4 =0;
        $nghilamngay4 =0;
    }
    $truyvan5 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay5' ";
    $dulieu5 = mysqli_query($conn,$truyvan5);
    while($n5 =  mysqli_fetch_array($dulieu5)){

        foreach($n5 as $key){
            $ngays[] = $key;         
        }
    }
    
    if( !empty($ngays[17])   ||  !empty($ngays[19])){
        $dilamngay5 = $ngays[19]; 
        $nghilamngay5 = $ngays[17];
        $tongngay5 = $dilamngay5 + $nghilamngay5;
        $tiledilamngay5 = ($dilamngay5*100)/$tongngay5;
        $tilenghilamngay5 = 100 - $tiledilamngay5;
        
    }else{
        $dilamngay5 =0;
        $nghilamngay5 =0;
    }
    $truyvan6 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay6' ";
    $dulieu6 = mysqli_query($conn,$truyvan6);
    while($n6 =  mysqli_fetch_array($dulieu6)){

        foreach($n6 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[21])   ||  !empty($ngays[23])){
        $dilamngay6 = $ngays[23]; 
        $nghilamngay6 = $ngays[21];
        $tongngay6 = $dilamngay6 + $nghilamngay6;
        $tiledilamngay6 = ($dilamngay6*100)/$tongngay6;
        $tilenghilamngay6 = 100 - $tiledilamngay6;
        
    }else{
        $dilamngay6 =0;
        $nghilamngay6 =0;
    }
    $truyvan7 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay7' ";
    $dulieu7 = mysqli_query($conn,$truyvan7);
    while($n7 =  mysqli_fetch_array($dulieu7)){

        foreach($n7 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[27])   ||  !empty($ngays[25])){
        $dilamngay7 = $ngays[27]; 
        $nghilamngay7 = $ngays[25];
        $tongngay7 = $dilamngay7 + $nghilamngay7;
        $tiledilamngay7 = ($dilamngay7*100)/$tongngay7;
        $tilenghilamngay7 = 100 - $tiledilamngay7;
        
    }else{
        $dilamngay7 =0;
        $nghilamngay7 =0;
    }
    $truyvan8 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay8' ";
    $dulieu8 = mysqli_query($conn,$truyvan8);
    while($n8 =  mysqli_fetch_array($dulieu8)){

        foreach($n8 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[31])   ||  !empty($ngays[29])){
        $dilamngay8 = $ngays[31]; 
        $nghilamngay8 = $ngays[29];
        $tongngay8 = $dilamngay8 + $nghilamngay8;
        $tiledilamngay8 = ($dilamngay8*100)/$tongngay8;
        $tilenghilamngay8 = 100 - $tiledilamngay8;
        
    }else{
        $dilamngay8 =0;
        $nghilamngay8 =0;
    }
    $truyvan9 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay9' ";
    $dulieu9 = mysqli_query($conn,$truyvan9);
    while($n9 =  mysqli_fetch_array($dulieu9)){

        foreach($n9 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[35])   ||  !empty($ngays[33])){
        $dilamngay9 = $ngays[35]; 
        $nghilamngay9 = $ngays[33];
        $tongngay9 = $dilamngay9 + $nghilamngay9;
        $tiledilamngay9 = ($dilamngay9*100)/$tongngay9;
        $tilenghilamngay9 = 100 - $tiledilamngay9;
        
    }else{
        $dilamngay9 =0;
        $nghilamngay9 =0;
    }
    $truyvan10 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay10' ";
    $dulieu10 = mysqli_query($conn,$truyvan10);
    while($n10 =  mysqli_fetch_array($dulieu10)){

        foreach($n10 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[37])   ||  !empty($ngays[39])){
        $dilamngay10 = $ngays[39]; 
        $nghilamngay10 = $ngays[37];
        $tongngay10 = $dilamngay10 + $nghilamngay10;
        $tiledilamngay10 = ($dilamngay10*100)/$tongngay10;
        $tilenghilamngay10 = 100 - $tiledilamngay10;
       
    }else{
        $dilamngay10 =0;
        $nghilamngay10 =0;
    }
    $truyvan11 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay11' ";
    $dulieu11 = mysqli_query($conn,$truyvan11);
    while($n11 =  mysqli_fetch_array($dulieu11)){

        foreach($n11 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[41])   ||  !empty($ngays[43])){
        $dilamngay11 = $ngays[43]; 
        $nghilamngay11 = $ngays[41];
        $tongngay11 = $dilamngay11 + $nghilamngay11;
        $tiledilamngay11 = ($dilamngay11*100)/$tongngay11;
        $tilenghilamngay11 = 100 - $tiledilamngay11;  
    }else{
        $dilamngay11 =0;
        $nghilamngay11 =0;
    }
    $truyvan12 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay12' ";
    $dulieu12 = mysqli_query($conn,$truyvan12);
    while($n12 =  mysqli_fetch_array($dulieu12)){

        foreach($n12 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[45])   ||  !empty($ngays[47])){
        $dilamngay12 = $ngays[47]; 
        $nghilamngay12 = $ngays[45];
        $tongngay12 = $dilamngay12 + $nghilamngay12;
        $tiledilamngay12 = ($dilamngay12*100)/$tongngay12;
        $tilenghilamngay12 = 100 - $tiledilamngay12;
        
    }else{
        $dilamngay12 =0;
        $nghilamngay12 =0;
    }
    $truyvan13 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay13' ";
    $dulieu13 = mysqli_query($conn,$truyvan13);
    while($n13 =  mysqli_fetch_array($dulieu13)){

        foreach($n13 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[51])   ||  !empty($ngays[49])){
        $dilamngay13 = $ngays[51]; 
        $nghilamngay13 = $ngays[49];
        $tongngay13 = $dilamngay13 + $nghilamngay13;
        $tiledilamngay13 = ($dilamngay13*100)/$tongngay13;
        $tilenghilamngay13 = 100 - $tiledilamngay13;
        
    }else{
        $dilamngay13 =0;
        $nghilamngay13 =0;
    }
    $truyvan14 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay14' ";
    $dulieu14 = mysqli_query($conn,$truyvan14);
    while($n14 =  mysqli_fetch_array($dulieu14)){

        foreach($n14 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[55])   ||  !empty($ngays[53])){
        $dilamngay14 = $ngays[55]; 
        $nghilamngay14 = $ngays[53];
        $tongngay14 = $dilamngay14 + $nghilamngay14;
        $tiledilamngay14 = ($dilamngay14*100)/$tongngay14;
        $tilenghilamngay14 = 100 - $tiledilamngay14;
        
    }else{
        $dilamngay14 =0;
        $nghilamngay14 =0;
    }
    $truyvan15 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay15' ";
    $dulieu15 = mysqli_query($conn,$truyvan15);
    while($n15 =  mysqli_fetch_array($dulieu15)){

        foreach($n15 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[57])   ||  !empty($ngays[59])){
        $dilamngay15 = $ngays[59]; 
        $nghilamngay15 = $ngays[57];
        $tongngay15 = $dilamngay15 + $nghilamngay15;
        $tiledilamngay15 = ($dilamngay15*100)/$tongngay15;
        $tilenghilamngay15 = 100 - $tiledilamngay15;
        
    }else{
        $dilamngay15 =0;
        $nghilamngay15 =0;
    }
    $truyvan16 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay16' ";
    $dulieu16 = mysqli_query($conn,$truyvan16);
    while($n16 =  mysqli_fetch_array($dulieu16)){

        foreach($n16 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[63])   ||  !empty($ngays[61])){
        $dilamngay16 = $ngays[63]; 
        $nghilamngay16 = $ngays[61];
        $tongngay16 = $dilamngay16 + $nghilamngay16;
        $tiledilamngay16 = ($dilamngay16*100)/$tongngay16;
        $tilenghilamngay16 = 100 - $tiledilamngay16;
        
    }else{
        $dilamngay16 =0;
        $nghilamngay16 =0;
    }
    $truyvan17 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay17' ";
    $dulieu17 = mysqli_query($conn,$truyvan17);
    while($n17 =  mysqli_fetch_array($dulieu17)){

        foreach($n17 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[65])   ||  !empty($ngays[67])){
        $dilamngay17 = $ngays[67]; 
        $nghilamngay17 = $ngays[65];
        $tongngay17 = $dilamngay17 + $nghilamngay17;
        $tiledilamngay17 = ($dilamngay17*100)/$tongngay17;
        $tilenghilamngay17 = 100 - $tiledilamngay17;
        
    }else{
        $dilamngay17 =0;
        $nghilamngay17 =0;
    }
    $truyvan18 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay18' ";
    $dulieu18 = mysqli_query($conn,$truyvan18);
    while($n18 =  mysqli_fetch_array($dulieu18)){

        foreach($n18 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[69])   ||  !empty($ngays[71])){
        $dilamngay18 = $ngays[71]; 
        $nghilamngay18 = $ngays[69];
        $tongngay18 = $dilamngay18 + $nghilamngay18;
        $tiledilamngay18 = ($dilamngay18*100)/$tongngay18;
        $tilenghilamngay18 = 100 - $tiledilamngay18;
        
    }else{
        $dilamngay18 =0;
        $nghilamngay18 =0;
    }
    $truyvan19 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay19' ";
    $dulieu19 = mysqli_query($conn,$truyvan19);
    while($n19 =  mysqli_fetch_array($dulieu19)){

        foreach($n19 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[73])   ||  !empty($ngays[75])){
        $dilamngay19 = $ngays[75]; 
        $nghilamngay19 = $ngays[73];
        $tongngay19 = $dilamngay19 + $nghilamngay19;
        $tiledilamngay19 = ($dilamngay19*100)/$tongngay19;
        $tilenghilamngay19 = 100 - $tiledilamngay19;
        
    }else{
        $dilamngay19 =0;
        $nghilamngay19 =0;
    }
    $truyvan20 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay20' ";
    $dulieu20 = mysqli_query($conn,$truyvan20);
    while($n20 =  mysqli_fetch_array($dulieu20)){

        foreach($n20 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[77])   ||  !empty($ngays[79])){
        $dilamngay20 = $ngays[79]; 
        $nghilamngay20 = $ngays[77];
        $tongngay20 = $dilamngay20 + $nghilamngay20;
        $tiledilamngay20 = ($dilamngay20*100)/$tongngay20;
        $tilenghilamngay20 = 100 - $tiledilamngay20;
        
    }else{
        $dilamngay20 =0;
        $nghilamngay20 =0;
    }
    $truyvan21 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay21' ";
    $dulieu21 = mysqli_query($conn,$truyvan21);
    while($n21 =  mysqli_fetch_array($dulieu21)){

        foreach($n21 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[83])   ||  !empty($ngays[81])){
        $dilamngay21 = $ngays[83]; 
        $nghilamngay21 = $ngays[81];
        $tongngay21 = $dilamngay21 + $nghilamngay21;
        $tiledilamngay21 = ($dilamngay21*100)/$tongngay21;
        $tilenghilamngay21 = 100 - $tiledilamngay21;
        
    }else{
        $dilamngay21 =0;
        $nghilamngay21 =0;
    }
    $truyvan22 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay22' ";
    $dulieu22 = mysqli_query($conn,$truyvan22);
    while($n22 =  mysqli_fetch_array($dulieu22)){

        foreach($n22 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[85])   ||  !empty($ngays[87])){
        $dilamngay22 = $ngays[87]; 
        $nghilamngay22 = $ngays[85];
        $tongngay22 = $dilamngay22 + $nghilamngay22;
        $tiledilamngay22 = ($dilamngay22*100)/$tongngay22;
        $tilenghilamngay22 = 100 - $tiledilamngay22;
        
    }else{
        $dilamngay22 =0;
        $nghilamngay22 =0;
    }
    $truyvan23 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay23' ";
    $dulieu23 = mysqli_query($conn,$truyvan23);
    while($n23 =  mysqli_fetch_array($dulieu23)){

        foreach($n23 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[89])   ||  !empty($ngays[91])){
        $dilamngay23 = $ngays[91]; 
        $nghilamngay23 = $ngays[89];
        $tongngay23 = $dilamngay23 + $nghilamngay23;
        $tiledilamngay23 = ($dilamngay23*100)/$tongngay23;
        $tilenghilamngay23 = 100 - $tiledilamngay23;
        
    }else{
        $dilamngay23 =0;
        $nghilamngay23 =0;
    }
    $truyvan24 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay24' ";
    $dulieu24 = mysqli_query($conn,$truyvan24);
    while($n24 =  mysqli_fetch_array($dulieu24)){

        foreach($n24 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[95])   ||  !empty($ngays[93])){
        $dilamngay24 = $ngays[95]; 
        $nghilamngay24 = $ngays[93];
        $tongngay24 = $dilamngay24 + $nghilamngay24;
        $tiledilamngay24 = ($dilamngay24*100)/$tongngay24;
        $tilenghilamngay24 = 100 - $tiledilamngay24;
        
    }else{
        $dilamngay24 =0;
        $nghilamngay24 =0;
    }
    $truyvan25 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay25' ";
    $dulieu25 = mysqli_query($conn,$truyvan25);
    while($n25 =  mysqli_fetch_array($dulieu25)){

        foreach($n25 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[99])   ||  !empty($ngays[97])){
        $dilamngay25 = $ngays[99]; 
        $nghilamngay25 = $ngays[97];
        $tongngay25 = $dilamngay25 + $nghilamngay25;
        $tiledilamngay25 = ($dilamngay25*100)/$tongngay25;
        $tilenghilamngay25 = 100 - $tiledilamngay25;
        
    }else{
        $dilamngay25 =0;
        $nghilamngay25 =0;
    }
    $truyvan26 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay26' ";
    $dulieu26 = mysqli_query($conn,$truyvan26);
    while($n26 =  mysqli_fetch_array($dulieu26)){

        foreach($n26 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[103])   ||  !empty($ngays[101])){
        $dilamngay26 = $ngays[103]; 
        $nghilamngay26 = $ngays[101];
        $tongngay26 = $dilamngay26 + $nghilamngay26;
        $tiledilamngay26 = ($dilamngay26*100)/$tongngay26;
        $tilenghilamngay26 = 100 - $tiledilamngay26;
       
    }else{
        $dilamngay26 =0;
        $nghilamngay26 =0;
    }
    $truyvan27 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay27' ";
    $dulieu27 = mysqli_query($conn,$truyvan27);
    while($n27 =  mysqli_fetch_array($dulieu27)){

        foreach($n27 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[105])   ||  !empty($ngays[107])){
        $dilamngay27 = $ngays[107]; 
        $nghilamngay27 = $ngays[105];
        $tongngay27 = $dilamngay27 + $nghilamngay27;
        $tiledilamngay27 = ($dilamngay27*100)/$tongngay27;
        $tilenghilamngay27 = 100 - $tiledilamngay27;
        
    }else{
        $dilamngay27 =0;
        $nghilamngay27 =0;
    }
    $truyvan28 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay28' ";
    $dulieu28 = mysqli_query($conn,$truyvan28);
    while($n28 =  mysqli_fetch_array($dulieu28)){

        foreach($n28 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[111])   ||  !empty($ngays[109])){
        $dilamngay28 = $ngays[111]; 
        $nghilamngay28 = $ngays[109];
        $tongngay28 = $dilamngay28 + $nghilamngay28;
        $tiledilamngay28 = ($dilamngay28*100)/$tongngay28;
        $tilenghilamngay28 = 100 - $tiledilamngay28;
        
    }else{
        $dilamngay28 =0;
        $nghilamngay28 =0;
    }
    $truyvan29 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay29' ";
    $dulieu29 = mysqli_query($conn,$truyvan29);
    while($n29 =  mysqli_fetch_array($dulieu29)){

        foreach($n29 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[115])   ||  !empty($ngays[113])){
        $dilamngay29 = $ngays[115]; 
        $nghilamngay29 = $ngays[113];
        $tongngay29 = $dilamngay29+ $nghilamngay29;
        $tiledilamngay29 = ($dilamngay29*100)/$tongngay29;
        $tilenghilamngay29 = 100 - $tiledilamngay29;
        
    }else{
        $dilamngay29 =0;
        $nghilamngay29 =0;
    }
    $truyvan30 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay30' ";
    $dulieu30 = mysqli_query($conn,$truyvan30);
    while($n30 =  mysqli_fetch_array($dulieu30)){

        foreach($n30 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[117])   ||  !empty($ngays[119])){
        $dilamngay30 = $ngays[119]; 
        $nghilamngay30 = $ngays[117];
        $tongngay30 = $dilamngay30 + $nghilamngay30;
        $tiledilamngay30 = ($dilamngay30*100)/$tongngay30;
        $tilenghilamngay30 = 100 - $tiledilamngay30;
        
    }else{
        $dilamngay30 =0;
        $nghilamngay30 =0;
    }
    $truyvan31 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date = '$ngay31' ";
    $dulieu31 = mysqli_query($conn,$truyvan31);
    while($n31 =  mysqli_fetch_array($dulieu31)){

        foreach($n31 as $key){
            $ngays[] = $key;         
        }    
    }
    
    if( !empty($ngays[121])   ||  !empty($ngays[123])){
        $dilamngay31 = $ngays[123]; 
        $nghilamngay31 = $ngays[121];
        $tongngay31 = $dilamngay1 + $nghilamngay31;
        $tiledilamngay31 = ($dilamngay1*100)/$tongngay31;
        $tilenghilamngay31 = 100 - $tiledilamngay31;
        
    }else{
        $dilamngay31 =0;
        $nghilamngay31 =0;
    }
 ?>