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
        $dilamthu2 = 'null';
        $nghilamthu2 = 'null';
        $tiledilamthu2 = 'null';
        $tilenghilamthu2 = 'null';
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
        $dilamthu3 = 'null';
        $nghilamthu3 = 'null';
        $tiledilamthu3 = 'null';
        $tilenghilamthu3 = 'null';
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
       
    }else{
        $dilamthu4 = 'null';
        $nghilamthu4 = 'null';
        $tiledilamthu4 = 'null';
        $tilenghilamthu4 = 'null';
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
        $dilamthu5 = 'null';
        $nghilamthu5 = 'null';
        $tiledilamthu5 = 'null';
        $tilenghilamthu5 = 'null';
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
        $dilamthu6 = 'null';
        $nghilamthu6 = 'null';
        $tiledilamthu6 = 'null';
        $tilenghilamthu6 = 'null';
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
        $dilamthu7 = 'null';
        $nghilamthu7 = 'null';
        $tiledilamthu7 = 'null';
        $tilenghilamthu7 = 'null';
    }


// Dữ liệu tuần trong năm
$dautuan1 = date('Y-m-d', strtotime(date('Y-01-01', strtotime("now"))));
$cuoituan1 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan1)));
$dautuan2 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan1)));
$cuoituan2 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan2)));
$dautuan3 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan2)));
$cuoituan3 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan3)));
$dautuan4 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan3)));
$cuoituan4 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan4)));

$dautuan5 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan4)));
$cuoituan5 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan5)));
$dautuan6 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan5)));
$cuoituan6 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan6)));
$dautuan7 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan6)));
$cuoituan7 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan7)));
$dautuan8 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan7)));
$cuoituan8 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan8)));

$dautuan9 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan8)));
$cuoituan9 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan9)));
$dautuan10 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan9)));
$cuoituan10 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan10)));
$dautuan11 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan10)));
$cuoituan11 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan11)));
$dautuan12 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan11)));
$cuoituan12 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan12)));

$dautuan13 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan12)));
$cuoituan13 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan13)));
$dautuan14 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan13)));
$cuoituan14 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan14)));
$dautuan15 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan14)));
$cuoituan15 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan15)));
$dautuan16 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan15)));
$cuoituan16 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan16)));

$dautuan17 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan16)));
$cuoituan17 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan17)));
$dautuan18 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan17)));
$cuoituan18 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan18)));
$dautuan19 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan18)));
$cuoituan19 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan19)));
$dautuan20 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan19)));
$cuoituan20 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan20)));

$dautuan21 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan20)));
$cuoituan21 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan21)));
$dautuan22 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan21)));
$cuoituan22 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan22)));
$dautuan23 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan22)));
$cuoituan23 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan23)));
$dautuan24 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan23)));
$cuoituan24 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan24)));

$dautuan25 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan24)));
$cuoituan25 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan25)));
$dautuan26 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan25)));
$cuoituan26 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan26)));
$dautuan27 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan26)));
$cuoituan27 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan27)));
$dautuan28 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan27)));
$cuoituan28 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan28)));

$dautuan29 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan28)));
$cuoituan29 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan29)));
$dautuan30 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan29)));
$cuoituan30 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan30)));
$dautuan31 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan30)));
$cuoituan31 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan31)));
$dautuan32 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan31)));
$cuoituan32 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan32)));

$dautuan33 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan32)));
$cuoituan33 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan33)));
$dautuan34 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan33)));
$cuoituan34 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan34)));
$dautuan35 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan34)));
$cuoituan35 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan35)));
$dautuan36 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan35)));
$cuoituan36 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan36)));

$dautuan37 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan36)));
$cuoituan37 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan37)));
$dautuan38 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan37)));
$cuoituan38 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan38)));
$dautuan39 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan38)));
$cuoituan39 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan39)));
$dautuan40 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan39)));
$cuoituan40 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan40)));


$dautuan41 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan40)));
$cuoituan41 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan41)));
$dautuan42 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan41)));
$cuoituan42 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan42)));
$dautuan43 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan42)));
$cuoituan43 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan43)));
$dautuan44 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan43)));
$cuoituan44 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan44)));


$dautuan45 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan44)));
$cuoituan45 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan45)));
$dautuan46 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan45)));
$cuoituan46 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan46)));
$dautuan47 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan46)));
$cuoituan47 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan47)));
$dautuan48 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan47)));
$cuoituan48 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan48)));

$dautuan49 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan48)));
$cuoituan49 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan49)));
$dautuan50 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan49)));
$cuoituan50 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan50)));
$dautuan51 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan50)));
$cuoituan51 = date('Y-m-d', strtotime('+7 day', strtotime($dautuan51)));
$dautuan52 = date('Y-m-d', strtotime('+1 day', strtotime($cuoituan51)));
$cuoituan52 = date("Y-m-d", mktime(0, 0, 0, 12+1,0,date("Y")));



        $queryweek1 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan1' AND '$cuoituan1' ";
        $ketquaw1 = mysqli_query($conn,$queryweek1);
        while($w1 =  mysqli_fetch_array($ketquaw1)){

            foreach($w1 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[1])   ||  !empty($weeks[3])){
            $dilamtuan1 = $weeks[3]; 
            $nghilamtuan1 = $weeks[1];
        
            
        }else{
            $dilamtuan1 = 'null';
            $nghilamtuan1 = 'null';
        }

        $queryweek2 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan2' AND '$cuoituan2' ";
        $ketquaw2 = mysqli_query($conn,$queryweek2);
        while($w2 =  mysqli_fetch_array($ketquaw2)){

            foreach($w2 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[5])   ||  !empty($weeks[7])){
            $dilamtuan2 = $weeks[7]; 
            $nghilamtuan2 = $weeks[5];
        
           
        }else{
            $dilamtuan2 = 'null';
            $nghilamtuan2 = 'null';
        }

        $queryweek3 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan3' AND '$cuoituan3' ";
        $ketquaw3 = mysqli_query($conn,$queryweek3);
        while($w3 =  mysqli_fetch_array($ketquaw3)){

            foreach($w3 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[9])   ||  !empty($weeks[11])){
            $dilamtuan3 = $weeks[9]; 
            $nghilamtuan3 = $weeks[11];
        
           
        }else{
            $dilamtuan3 = 'null';
            $nghilamtuan3 = 'null';
        }

        $queryweek4 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan4' AND '$cuoituan4' ";
        $ketquaw4 = mysqli_query($conn,$queryweek4);
        while($w4 =  mysqli_fetch_array($ketquaw4)){

            foreach($w4 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[13])   ||  !empty($weeks[15])){
            $dilamtuan4 = $weeks[15]; 
            $nghilamtuan4 = $weeks[13];
        
           
        }else{
            $dilamtuan4 = 'null';
            $nghilamtuan4 = 'null';
        }

        $queryweek5 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan5' AND '$cuoituan5' ";
        $ketquaw5 = mysqli_query($conn,$queryweek5);
        while($w5 =  mysqli_fetch_array($ketquaw5)){

            foreach($w5 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[17])   ||  !empty($weeks[19])){
            $dilamtuan5 = $weeks[19]; 
            $nghilamtuan5 = $weeks[17];
        
           
        }else{
            $dilamtuan5 = 'null';
            $nghilamtuan5 = 'null';
        }

        $queryweek6 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan6' AND '$cuoituan6' ";
        $ketquaw6 = mysqli_query($conn,$queryweek6);
        while($w6 =  mysqli_fetch_array($ketquaw6)){

            foreach($w6 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[21])   ||  !empty($weeks[23])){
            $dilamtuan6 = $weeks[23]; 
            $nghilamtuan6 = $weeks[21];
        
           
        }else{
            $dilamtuan6 = 'null';
            $nghilamtuan6 = 'null';
        }

        $queryweek7 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan7' AND '$cuoituan7' ";
        $ketquaw7 = mysqli_query($conn,$queryweek7);
        while($w7 =  mysqli_fetch_array($ketquaw7)){

            foreach($w7 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[25])   ||  !empty($weeks[27])){
            $dilamtuan7 = $weeks[27]; 
            $nghilamtuan7 = $weeks[25];
        
           
        }else{
            $dilamtuan7 = 'null';
            $nghilamtuan7 = 'null';
        }

        $queryweek8 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan8' AND '$cuoituan8' ";
        $ketquaw8 = mysqli_query($conn,$queryweek8);
        while($w8 =  mysqli_fetch_array($ketquaw8)){

            foreach($w8 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[29])   ||  !empty($weeks[31])){
            $dilamtuan8 = $weeks[31]; 
            $nghilamtuan8 = $weeks[29];
        
           
        }else{
            $dilamtuan8 = 'null';
            $nghilamtuan8 = 'null';
        }

        $queryweek9 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan9' AND '$cuoituan9' ";
        $ketquaw9 = mysqli_query($conn,$queryweek9);
        while($w9 =  mysqli_fetch_array($ketquaw9)){

            foreach($w9 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[33])   ||  !empty($weeks[35])){
            $dilamtuan9 = $weeks[35]; 
            $nghilamtuan9 = $weeks[33];
        
           
        }else{
            $dilamtuan9 = 'null';
            $nghilamtuan9 = 'null';
        }

        $queryweek10 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan10' AND '$cuoituan10' ";
        $ketquaw10 = mysqli_query($conn,$queryweek10);
        while($w10 =  mysqli_fetch_array($ketquaw10)){

            foreach($w10 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[37])   ||  !empty($weeks[39])){
            $dilamtuan10 = $weeks[39]; 
            $nghilamtuan10 = $weeks[37];
        
           
        }else{
            $dilamtuan10 = 'null';
            $nghilamtuan10 = 'null';
        }

        $queryweek11 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan11' AND '$cuoituan11' ";
        $ketquaw11 = mysqli_query($conn,$queryweek11);
        while($w11 =  mysqli_fetch_array($ketquaw11)){

            foreach($w11 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[41])   ||  !empty($weeks[43])){
            $dilamtuan11 = $weeks[43]; 
            $nghilamtuan11 = $weeks[41];
        
           
        }else{
            $dilamtuan11 = 'null';
            $nghilamtuan11 = 'null';
        }

        $queryweek12 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan12' AND '$cuoituan12' ";
        $ketquaw12 = mysqli_query($conn,$queryweek12);
        while($w12 =  mysqli_fetch_array($ketquaw12)){

            foreach($w12 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[45])   ||  !empty($weeks[47])){
            $dilamtuan12 = $weeks[47]; 
            $nghilamtuan12 = $weeks[45];
        
           
        }else{
            $dilamtuan12 = 'null';
            $nghilamtuan12 = 'null';
        }

        $queryweek13 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan13' AND '$cuoituan13' ";
        $ketquaw13 = mysqli_query($conn,$queryweek13);
        while($w13 =  mysqli_fetch_array($ketquaw13)){

            foreach($w13 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[49])   ||  !empty($weeks[51])){
            $dilamtuan13 = $weeks[51]; 
            $nghilamtuan13 = $weeks[49];
        
           
        }else{
            $dilamtuan13 = 'null';
            $nghilamtuan13 = 'null';
        }

        $queryweek14 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan14' AND '$cuoituan14' ";
        $ketquaw14 = mysqli_query($conn,$queryweek14);
        while($w14 =  mysqli_fetch_array($ketquaw14)){

            foreach($w14 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[53])   ||  !empty($weeks[55])){
            $dilamtuan14 = $weeks[55]; 
            $nghilamtuan14 = $weeks[53];
        
           
        }else{
            $dilamtuan14 = 'null';
            $nghilamtuan14 = 'null';
        }

        $queryweek15 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan15' AND '$cuoituan15' ";
        $ketquaw15 = mysqli_query($conn,$queryweek15);
        while($w15 =  mysqli_fetch_array($ketquaw15)){

            foreach($w15 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[57])   ||  !empty($weeks[59])){
            $dilamtuan15 = $weeks[59]; 
            $nghilamtuan15 = $weeks[57];
        
           
        }else{
            $dilamtuan15 = 'null';
            $nghilamtuan15 = 'null';
        }

        $queryweek16 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan16' AND '$cuoituan16' ";
        $ketquaw16 = mysqli_query($conn,$queryweek16);
        while($w16 =  mysqli_fetch_array($ketquaw16)){

            foreach($w16 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[61])   ||  !empty($weeks[63])){
            $dilamtuan16 = $weeks[63]; 
            $nghilamtuan16 = $weeks[61];
        
           
        }else{
            $dilamtuan16 = 'null';
            $nghilamtuan16 = 'null';
        }

        $queryweek17 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan17' AND '$cuoituan17' ";
        $ketquaw17 = mysqli_query($conn,$queryweek17);
        while($w17 =  mysqli_fetch_array($ketquaw17)){

            foreach($w17 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[65])   ||  !empty($weeks[67])){
            $dilamtuan17 = $weeks[67]; 
            $nghilamtuan17 = $weeks[65];
        
           
        }else{
            $dilamtuan17 = 'null';
            $nghilamtuan17 = 'null';
        }

        $queryweek18 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan18' AND '$cuoituan18' ";
        $ketquaw18 = mysqli_query($conn,$queryweek18);
        while($w18 =  mysqli_fetch_array($ketquaw18)){

            foreach($w18 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[69])   ||  !empty($weeks[71])){
            $dilamtuan18 = $weeks[71]; 
            $nghilamtuan18 = $weeks[69];
        
           
        }else{
            $dilamtuan18 = 'null';
            $nghilamtuan18 = 'null';
        }

        $queryweek19 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan19' AND '$cuoituan19' ";
        $ketquaw19 = mysqli_query($conn,$queryweek19);
        while($w19 =  mysqli_fetch_array($ketquaw19)){

            foreach($w19 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[73])   ||  !empty($weeks[75])){
            $dilamtuan19 = $weeks[75]; 
            $nghilamtuan19 = $weeks[73];
        
           
        }else{
            $dilamtuan19 = 'null';
            $nghilamtuan19 = 'null';
        }

        $queryweek20 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan20' AND '$cuoituan20' ";
        $ketquaw20 = mysqli_query($conn,$queryweek20);
        while($w20 =  mysqli_fetch_array($ketquaw20)){

            foreach($w20 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[77])   ||  !empty($weeks[79])){
            $dilamtuan20 = $weeks[79]; 
            $nghilamtuan20 = $weeks[77];
        
           
        }else{
            $dilamtuan20 = 'null';
            $nghilamtuan20 = 'null';
        }

        $queryweek21 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan21' AND '$cuoituan21' ";
        $ketquaw21 = mysqli_query($conn,$queryweek21);
        while($w21 =  mysqli_fetch_array($ketquaw21)){

            foreach($w21 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[81])   ||  !empty($weeks[83])){
            $dilamtuan21 = $weeks[83]; 
            $nghilamtuan21 = $weeks[81];
        
           
        }else{
            $dilamtuan21 = 'null';
            $nghilamtuan21 = 'null';
        }

        $queryweek22 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan22' AND '$cuoituan22' ";
        $ketquaw22 = mysqli_query($conn,$queryweek22);
        while($w22 =  mysqli_fetch_array($ketquaw22)){

            foreach($w22 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[85])   ||  !empty($weeks[87])){
            $dilamtuan22 = $weeks[87]; 
            $nghilamtuan22 = $weeks[85];
        
           
        }else{
            $dilamtuan22 = 'null';
            $nghilamtuan22 = 'null';
        }

        $queryweek23 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan23' AND '$cuoituan23' ";
        $ketquaw23 = mysqli_query($conn,$queryweek23);
        while($w23 =  mysqli_fetch_array($ketquaw23)){

            foreach($w23 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[89])   ||  !empty($weeks[91])){
            $dilamtuan23 = $weeks[91]; 
            $nghilamtuan23 = $weeks[89];
        
           
        }else{
            $dilamtuan23 = 'null';
            $nghilamtuan23 = 'null';
        }

        $queryweek24 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan24' AND '$cuoituan24' ";
        $ketquaw24 = mysqli_query($conn,$queryweek24);
        while($w24 =  mysqli_fetch_array($ketquaw24)){

            foreach($w24 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[93])   ||  !empty($weeks[95])){
            $dilamtuan24 = $weeks[95]; 
            $nghilamtuan24 = $weeks[93];
        
           
        }else{
            $dilamtuan24 = 'null';
            $nghilamtuan24 = 'null';
        }

        $queryweek25 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan25' AND '$cuoituan25' ";
        $ketquaw25 = mysqli_query($conn,$queryweek25);
        while($w25 =  mysqli_fetch_array($ketquaw25)){

            foreach($w25 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[97])   ||  !empty($weeks[99])){
            $dilamtuan25 = $weeks[99]; 
            $nghilamtuan25 = $weeks[97];
        
           
        }else{
            $dilamtuan25 = 'null';
            $nghilamtuan25 = 'null';
        }

        $queryweek26 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan26' AND '$cuoituan26' ";
        $ketquaw26 = mysqli_query($conn,$queryweek26);
        while($w26 =  mysqli_fetch_array($ketquaw26)){

            foreach($w26 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[101])   ||  !empty($weeks[103])){
            $dilamtuan26  = $weeks[103]; 
            $nghilamtuan26  = $weeks[101];
        
           
        }else{
            $dilamtuan26  = 'null';
            $nghilamtuan26  = 'null';
        }

        $queryweek27 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan27' AND '$cuoituan27' ";
        $ketquaw27 = mysqli_query($conn,$queryweek27);
        while($w27 =  mysqli_fetch_array($ketquaw27)){

            foreach($w27 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[105])   ||  !empty($weeks[107])){
            $dilamtuan27 = $weeks[107]; 
            $nghilamtuan27 = $weeks[105];
        
           
        }else{
            $dilamtuan27 = 'null';
            $nghilamtuan27 = 'null';
        }

        $queryweek28 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan28' AND '$cuoituan28' ";
        $ketquaw28 = mysqli_query($conn,$queryweek28);
        while($w28 =  mysqli_fetch_array($ketquaw28)){

            foreach($w28 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[109])   ||  !empty($weeks[111])){
            $dilamtuan28 = $weeks[111]; 
            $nghilamtuan28 = $weeks[109];
        
           
        }else{
            $dilamtuan28 = 'null';
            $nghilamtuan28 = 'null';
        }

        $queryweek29 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan29' AND '$cuoituan29' ";
        $ketquaw28 = mysqli_query($conn,$queryweek28);
        while($w28 =  mysqli_fetch_array($ketquaw28)){

            foreach($w28 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[113])   ||  !empty($weeks[115])){
            $dilamtuan29 = $weeks[115]; 
            $nghilamtuan29 = $weeks[113];
        
           
        }else{
            $dilamtuan29 = 'null';
            $nghilamtuan29 = 'null';
        }

        $queryweek30 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan30' AND '$cuoituan30' ";
        $ketquaw30 = mysqli_query($conn,$queryweek30);
        while($w30 =  mysqli_fetch_array($ketquaw30)){

            foreach($w30 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[117])   ||  !empty($weeks[119])){
            $dilamtuan30 = $weeks[119]; 
            $nghilamtuan30 = $weeks[117];
        
           
        }else{
            $dilamtuan30 = 'null';
            $nghilamtuan30 = 'null';
        }

        $queryweek31 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan31' AND '$cuoituan31' ";
        $ketquaw31 = mysqli_query($conn,$queryweek31);
        while($w31 =  mysqli_fetch_array($ketquaw31)){

            foreach($w31 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[121])   ||  !empty($weeks[123])){
            $dilamtuan31 = $weeks[123]; 
            $nghilamtuan31 = $weeks[121];
        
           
        }else{
            $dilamtuan31 = 'null';
            $nghilamtuan31 = 'null';
        }

        $queryweek32 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan32' AND '$cuoituan32' ";
        $ketquaw32 = mysqli_query($conn,$queryweek32);
        while($w32 =  mysqli_fetch_array($ketquaw32)){

            foreach($w32 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[125])   ||  !empty($weeks[127])){
            $dilamtuan32 = $weeks[127]; 
            $nghilamtuan32 = $weeks[125];
        
           
        }else{
            $dilamtuan32 = 'null';
            $nghilamtuan32 = 'null';
        }

        $queryweek33 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan33' AND '$cuoituan33' ";
        $ketquaw33 = mysqli_query($conn,$queryweek33);
        while($w33 =  mysqli_fetch_array($ketquaw33)){

            foreach($w33 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[129])   ||  !empty($weeks[131])){
            $dilamtuan33 = $weeks[131]; 
            $nghilamtuan33 = $weeks[129];
        
           
        }else{
            $dilamtuan33 = 'null';
            $nghilamtuan33 = 'null';
        }

        $queryweek34 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan34' AND '$cuoituan34' ";
        $ketquaw34 = mysqli_query($conn,$queryweek34);
        while($w34 =  mysqli_fetch_array($ketquaw34)){

            foreach($w34 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[133])   ||  !empty($weeks[135])){
            $dilamtuan34 = $weeks[135]; 
            $nghilamtuan34 = $weeks[133];
        
           
        }else{
            $dilamtuan34 = 'null';
            $nghilamtuan34 = 'null';
        }

        $queryweek35 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan35' AND '$cuoituan35' ";
        $ketquaw35 = mysqli_query($conn,$queryweek35);
        while($w35 =  mysqli_fetch_array($ketquaw35)){

            foreach($w35 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[137])   ||  !empty($weeks[139])){
            $dilamtuan35 = $weeks[139]; 
            $nghilamtuan35 = $weeks[137];
        
           
        }else{
            $dilamtuan35 = 'null';
            $nghilamtuan35 = 'null';
        }

        $queryweek36 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan36' AND '$cuoituan36' ";
        $ketquaw36 = mysqli_query($conn,$queryweek36);
        while($w36 =  mysqli_fetch_array($ketquaw36)){

            foreach($w36 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[141])   ||  !empty($weeks[143])){
            $dilamtuan36 = $weeks[143]; 
            $nghilamtuan36 = $weeks[141];
        
           
        }else{
            $dilamtuan36 = 'null';
            $nghilamtuan36 = 'null';
        }

        $queryweek37 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan37' AND '$cuoituan37' ";
        $ketquaw37 = mysqli_query($conn,$queryweek37);
        while($w37 =  mysqli_fetch_array($ketquaw37)){

            foreach($w37 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[145])   ||  !empty($weeks[147])){
            $dilamtuan37 = $weeks[147]; 
            $nghilamtuan37 = $weeks[145];
        
           
        }else{
            $dilamtuan37 = 'null';
            $nghilamtuan37 = 'null';
        }

        $queryweek38 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan38' AND '$cuoituan38' ";
        $ketquaw38 = mysqli_query($conn,$queryweek38);
        while($w38 =  mysqli_fetch_array($ketquaw38)){

            foreach($w38 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[149])   ||  !empty($weeks[151])){
            $dilamtuan38 = $weeks[151]; 
            $nghilamtuan38 = $weeks[149];
        
           
        }else{
            $dilamtuan38 = 'null';
            $nghilamtuan38 = 'null';
        }

        $queryweek39 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan39' AND '$cuoituan39' ";
        $ketquaw39 = mysqli_query($conn,$queryweek39);
        while($w39 =  mysqli_fetch_array($ketquaw39)){

            foreach($w39 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[153])   ||  !empty($weeks[155])){
            $dilamtuan39 = $weeks[155]; 
            $nghilamtuan39 = $weeks[153];
        
           
        }else{
            $dilamtuan39 = 'null';
            $nghilamtuan39 = 'null';
        }

        $queryweek40 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan40' AND '$cuoituan40' ";
        $ketquaw40 = mysqli_query($conn,$queryweek40);
        while($w40 =  mysqli_fetch_array($ketquaw40)){

            foreach($w40 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[157])   ||  !empty($weeks[159])){
            $dilamtuan40 = $weeks[159]; 
            $nghilamtuan40 = $weeks[157];
        
           
        }else{
            $dilamtuan40 = 'null';
            $nghilamtuan40 = 'null';
        }

        $queryweek41 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan41' AND '$cuoituan41' ";
        $ketquaw41 = mysqli_query($conn,$queryweek41);
        while($w41 =  mysqli_fetch_array($ketquaw41)){

            foreach($w41 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[161])   ||  !empty($weeks[163])){
            $dilamtuan41 = $weeks[163]; 
            $nghilamtuan41 = $weeks[161];
        
           
        }else{
            $dilamtuan41 = 'null';
            $nghilamtuan41 = 'null';
        }

        $queryweek42 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan42' AND '$cuoituan42' ";
        $ketquaw42 = mysqli_query($conn,$queryweek42);
        while($w42 =  mysqli_fetch_array($ketquaw42)){

            foreach($w42 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[165])   ||  !empty($weeks[167])){
            $dilamtuan42 = $weeks[167]; 
            $nghilamtuan42 = $weeks[165];
        
           
        }else{
            $dilamtuan42 = 'null';
            $nghilamtuan42 = 'null';
        }

        $queryweek43 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan43' AND '$cuoituan43' ";
        $ketquaw43 = mysqli_query($conn,$queryweek43);
        while($w43 =  mysqli_fetch_array($ketquaw43)){

            foreach($w43 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[169])   ||  !empty($weeks[171])){
            $dilamtuan43 = $weeks[171]; 
            $nghilamtuan43 = $weeks[169];
        
           
        }else{
            $dilamtuan43 = 'null';
            $nghilamtuan43 = 'null';
        }

        $queryweek44 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan44' AND '$cuoituan44' ";
        $ketquaw44 = mysqli_query($conn,$queryweek44);
        while($w44 =  mysqli_fetch_array($ketquaw44)){

            foreach($w44 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[173])   ||  !empty($weeks[175])){
            $dilamtuan44 = $weeks[175]; 
            $nghilamtuan44 = $weeks[173];
        
           
        }else{
            $dilamtuan44 = 'null';
            $nghilamtuan44 = 'null';
        }

        $queryweek45 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan45' AND '$cuoituan45' ";
        $ketquaw45 = mysqli_query($conn,$queryweek45);
        while($w45 =  mysqli_fetch_array($ketquaw45)){

            foreach($w45 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[177])   ||  !empty($weeks[179])){
            $dilamtuan45 = $weeks[179]; 
            $nghilamtuan45 = $weeks[177];
        
           
        }else{
            $dilamtuan45 = 'null';
            $nghilamtuan45 = 'null';
        }
        
        $queryweek46 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan46' AND '$cuoituan46' ";
        $ketquaw46 = mysqli_query($conn,$queryweek46);
        while($w46 =  mysqli_fetch_array($ketquaw46)){

            foreach($w46 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[181])   ||  !empty($weeks[183])){
            $dilamtuan46 = $weeks[183]; 
            $nghilamtuan46 = $weeks[181];
        
           
        }else{
            $dilamtuan46 = 'null';
            $nghilamtuan46 = 'null';
        }

        $queryweek47 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan47' AND '$cuoituan47' ";
        $ketquaw47 = mysqli_query($conn,$queryweek47);
        while($w47 =  mysqli_fetch_array($ketquaw47)){

            foreach($w47 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[185])   ||  !empty($weeks[187])){
            $dilamtuan47 = $weeks[187]; 
            $nghilamtuan47 = $weeks[185];
        
           
        }else{
            $dilamtuan47 = 'null';
            $nghilamtuan47 = 'null';
        }

        $queryweek48 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan48' AND '$cuoituan48' ";
        $ketquaw48 = mysqli_query($conn,$queryweek48);
        while($w48 =  mysqli_fetch_array($ketquaw48)){

            foreach($w48 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[189])   ||  !empty($weeks[191])){
            $dilamtuan48 = $weeks[191]; 
            $nghilamtuan48 = $weeks[189];
        
           
        }else{
            $dilamtuan48 = 'null';
            $nghilamtuan48 = 'null';
        }

        $queryweek49 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan49' AND '$cuoituan49' ";
        $ketquaw49 = mysqli_query($conn,$queryweek49);
        while($w49 =  mysqli_fetch_array($ketquaw49)){

            foreach($w49 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[193])   ||  !empty($weeks[195])){
            $dilamtuan49 = $weeks[195]; 
            $nghilamtuan49 = $weeks[193];
        
           
        }else{
            $dilamtuan49 = 'null';
            $nghilamtuan49 = 'null';
        }

        $queryweek50 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan50' AND '$cuoituan50' ";
        $ketquaw50 = mysqli_query($conn,$queryweek50);
        while($w50 =  mysqli_fetch_array($ketquaw50)){

            foreach($w50 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[197])   ||  !empty($weeks[199])){
            $dilamtuan50 = $weeks[199]; 
            $nghilamtuan50 = $weeks[197];
        
           
        }else{
            $dilamtuan50 = 'null';
            $nghilamtuan50 = 'null';
        }

        $queryweek51 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan51' AND '$cuoituan51' ";
        $ketquaw51 = mysqli_query($conn,$queryweek51);
        while($w51 =  mysqli_fetch_array($ketquaw51)){

            foreach($w51 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[201])   ||  !empty($weeks[203])){
            $dilamtuan51 = $weeks[203]; 
            $nghilamtuan51 = $weeks[201];
        
           
        }else{
            $dilamtuan51 = 'null';
            $nghilamtuan51 = 'null';
        }

        $queryweek52 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dautuan52' AND '$cuoituan52' ";
        $ketquaw52 = mysqli_query($conn,$queryweek52);
        while($w52 =  mysqli_fetch_array($ketquaw52)){

            foreach($w52 as $key){
                $weeks[] = $key;         
            }    
        }

        if( !empty($weeks[205])   ||  !empty($weeks[207])){
            $dilamtuan52 = $weeks[207]; 
            $nghilamtuan52 = $weeks[205];
        
           
        }else{
            $dilamtuan52 = 'null';
            $nghilamtuan52 = 'null';
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
        $tiledilamthang1 = 0;
        $tilenghilamthang1 = 0;
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
        $tiledilamthang2 = 0;
        $tilenghilamthang2 = 0;
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
        $tiledilamthang3 = 0;
        $tilenghilamthang3 = 0;
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
        $tiledilamthang4 = 0;
        $tilenghilamthang4 = 0;
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
        $tiledilamthang5 = 0;
        $tilenghilamthang5 = 0;
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
        $tiledilamthang6 = 0;
        $tilenghilamthang6 = 0;
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
        $tiledilamthang7 = 0;
        $tilenghilamthang7 = 0;
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
        $tiledilamthang8 = 0;
        $tilenghilamthang8 = 0;
    }
    $mysql12 = "SELECT SUM(attendance1=0) as nghilam,SUM(attendance1=1) as dilam FROM attendance WHERE date BETWEEN '$dauthang9' AND '$cuoithang9' ";
    $reponse8 = mysqli_query($conn,$mysql12);
    while($ketquam9 =  mysqli_fetch_array($reponse8)){

        foreach($ketquam9 as $key){
            $months[] = $key;         
        }    
    }
    
    if( !empty($months[33])   ||  !empty($months[35])){
        $dilamthang9 = $months[35]; 
        $nghilamthang9 = $months[33];
        $tongthang9 = $dilamthang9 + $nghilamthang9;
        $tiledilamthang9 = ($dilamthang9*100)/$tongthang9;
        $tilenghilamthang9 = 100 - $tiledilamthang9;
        
    }else{
        $tiledilamthang9 = 0;
        $tilenghilamthang9 = 0;
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
        $tiledilamthang11 = 0;
        $tilenghilamthang11 = 0;
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
        $tiledilamthang12 = 0;
        $tilenghilamthang12 = 0;
    }
    // Dữ liệu từng ngày trong tháng

    $ngay1 = date('Y-m-d', strtotime(date("Y-$thang-01", strtotime("now"))));
    $ngay2 = date('Y-m-d', strtotime(date("Y-$thang-02", strtotime("now"))));
    $ngay3 = date('Y-m-d', strtotime(date("Y-$thang-03", strtotime("now"))));
    $ngay4 = date('Y-m-d', strtotime(date("Y-$thang-04", strtotime("now"))));
    $ngay5 = date('Y-m-d', strtotime(date("Y-$thang-05", strtotime("now"))));
    $ngay6 = date('Y-m-d', strtotime(date("Y-$thang-06", strtotime("now"))));
    $ngay7 = date('Y-m-d', strtotime(date("Y-$thang-07", strtotime("now"))));
    $ngay8 = date('Y-m-d', strtotime(date("Y-$thang-08", strtotime("now"))));
    $ngay9 = date('Y-m-d', strtotime(date("Y-$thang-09", strtotime("now"))));
    $ngay10 = date('Y-m-d', strtotime(date("Y-$thang-10", strtotime("now"))));
    $ngay11 = date('Y-m-d', strtotime(date("Y-$thang-11", strtotime("now"))));
    $ngay12 = date('Y-m-d', strtotime(date("Y-$thang-12", strtotime("now"))));
    $ngay13 = date('Y-m-d', strtotime(date("Y-$thang-13", strtotime("now"))));
    $ngay14 = date('Y-m-d', strtotime(date("Y-$thang-14", strtotime("now"))));
    $ngay15 = date('Y-m-d', strtotime(date("Y-$thang-15", strtotime("now"))));
    $ngay16 = date('Y-m-d', strtotime(date("Y-$thang-16", strtotime("now"))));
    $ngay17 = date('Y-m-d', strtotime(date("Y-$thang-17", strtotime("now"))));
    $ngay18 = date('Y-m-d', strtotime(date("Y-$thang-18", strtotime("now"))));
    $ngay19 = date('Y-m-d', strtotime(date("Y-$thang-19", strtotime("now"))));
    $ngay20 = date('Y-m-d', strtotime(date("Y-$thang-20", strtotime("now"))));
    $ngay21 = date('Y-m-d', strtotime(date("Y-$thang-21", strtotime("now"))));
    $ngay22 = date('Y-m-d', strtotime(date("Y-$thang-22", strtotime("now"))));
    $ngay23 = date('Y-m-d', strtotime(date("Y-$thang-23", strtotime("now"))));
    $ngay24 = date('Y-m-d', strtotime(date("Y-$thang-24", strtotime("now"))));
    $ngay25 = date('Y-m-d', strtotime(date("Y-$thang-25", strtotime("now"))));
    $ngay26 = date('Y-m-d', strtotime(date("Y-$thang-26", strtotime("now"))));
    $ngay27 = date('Y-m-d', strtotime(date("Y-$thang-27", strtotime("now"))));
    $ngay28 = date('Y-m-d', strtotime(date("Y-$thang-28", strtotime("now"))));
    $ngay29 = date('Y-m-d', strtotime(date("Y-$thang-29", strtotime("now"))));
    $ngay30 = date('Y-m-d', strtotime(date("Y-$thang-30", strtotime("now"))));
    $ngay31 = date('Y-m-d', strtotime(date("Y-$thang-31", strtotime("now"))));

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
        $dilamngay1 = 'null';
        $nghilamngay1 = 'null';
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
            $dilamngay2 = 'null';
            $nghilamngay2 = 'null'; 
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
        $dilamngay3 = 'null';
        $nghilamngay3 = 'null'; 
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
        $dilamngay4 = 'null';
        $nghilamngay4 = 'null';
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
        $dilamngay5 = 'null';
        $nghilamngay5 = 'null';
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
        $dilamngay6 = 'null';
        $nghilamngay6 = 'null';
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
        $dilamngay7 = 'null';
        $nghilamngay7 = 'null';
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
        $dilamngay8 = 'null';
        $nghilamngay8 = 'null';
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
        $dilamngay9 = 'null';
        $nghilamngay9 = 'null';
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
        $dilamngay10 = 'null';
        $nghilamngay10 = 'null';
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
        $dilamngay11 = 'null';
        $nghilamngay11 = 'null';
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
        $dilamngay12 = 'null';
        $nghilamngay12 = 'null';
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
        $dilamngay13 = 'null';
        $nghilamngay13 = 'null';
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
        $dilamngay14 = 'null';
        $nghilamngay14 = 'null';
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
        $dilamngay15 = 'null';
        $nghilamngay15 = 'null';
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
        $dilamngay16 = 'null';
        $nghilamngay16 = 'null';
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
        $dilamngay17 = 'null';
        $nghilamngay17 = 'null';
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
        $dilamngay18 = 'null';
        $nghilamngay18 = 'null';
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
        $dilamngay19 = 'null';
        $nghilamngay19 = 'null';
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
        $dilamngay20 = 'null';
        $nghilamngay20 = 'null';
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
        $dilamngay21 = 'null';
        $nghilamngay21 = 'null';
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
        $dilamngay22 = 'null';
        $nghilamngay22 = 'null';
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
        $dilamngay23 = 'null';
        $nghilamngay23 = 'null';
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
        $dilamngay24 = 'null';
        $nghilamngay24 = 'null';
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
        $dilamngay25 = 'null';
        $nghilamngay25 = 'null';
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
        $dilamngay26 = 'null';
        $nghilamngay26 = 'null';
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
        $dilamngay27 = 'null';
        $nghilamngay27 = 'null';
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
        $dilamngay28 = 'null';
        $nghilamngay28 = 'null';
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
        $dilamngay29 = 'null';
        $nghilamngay29 = 'null';
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
        $dilamngay30 = 'null';
        $nghilamngay30 = 'null';
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
        $dilamngay31 = 'null';
        $nghilamngay31 = 'null';
    }
 ?>