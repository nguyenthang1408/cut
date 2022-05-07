<?php 
        include "../Model/DBconfig.php";
        include "../Model/datachart.php";
        include "../Model/connection.php";
        $db = new Database();
        $db -> connect();

        $today = date("Y-m-d");
        $week = date('w', strtotime($today));
        $date = new DateTime($today);
        $firstWeek = $date->modify("-".$week." day")->format("Y-m-d");
        $mondaystr = strtotime ( '+1 day' , strtotime ( $firstWeek ) ) ;
        $saturdaystr = strtotime ( '+6 day' , strtotime ( $firstWeek ) ) ;
        $monday = date ( 'Y-m-d' , $mondaystr );
        $saturday = date ( 'Y-m-d' , $saturdaystr );

        $dauthang = date('Y-m-d', strtotime(date('Y-m-01', strtotime("now"))));
        $cuoithang = date("Y-m-t");

        $dauthang1 =date("Y-m-d", mktime(0, 0, 0, 1,1 ,date("Y")));
        $cuoithang12 = date("Y-m-d", mktime(0, 0, 0, 12+1,0,date("Y")));
        $i = 1;
        $diff = abs(strtotime($dauthang1) - strtotime($today));
        $datediff = floor($diff / (60*60*24));
  
        $sql = "SELECT B.`id`, B.`employcode`, B.`name`
        FROM `attendance`AS A 
        INNER JOIN `employee` AS B 
        ON B.`id` = A.`member_id`";
        $result = mysqli_query($conn , $sql);

        $sqlweek = "SELECT  member_id, employcode, name, SUM(attendance1 = 0) as nghilam
        FROM `attendance`
        WHERE `attendance1` = 0 AND `date` 
        BETWEEN ' $monday' AND '$saturday' GROUP BY member_id";
        $executesqlweek = mysqli_query($conn , $sqlweek);

        $sqlmonth = "SELECT B.`id`, B.`employcode`, B.`name`, SUM(A.`attendance1` = 0) as nghilam
        FROM `attendance`AS A 
        INNER JOIN `employee` AS B 
        ON B.`id` = A.`member_id` 
        WHERE A.`attendance1` = 0  AND A.`date` 
        BETWEEN '$dauthang' AND '$cuoithang' 
        GROUP BY B.`name` ";
        $executesqlmonth = mysqli_query($conn , $sqlmonth);

        $sqlyear = "SELECT B.`id`, B.`employcode`, B.`name`, SUM(A.`attendance1` = 0) as nghilam
        FROM `attendance`AS A 
        INNER JOIN `employee` AS B 
        ON B.`id` = A.`member_id` 
        WHERE A.`attendance1` = 0 AND A.`date` 
        BETWEEN '$dauthang1' AND '$cuoithang12' 
        GROUP BY B.`name` ORDER by nghilam DESC";
        $executesqlyear = mysqli_query($conn , $sqlyear);
    ?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="../codejavascript/tablecustom.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
            <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>
            <title>Quản Lý Tự Đông Hóa</title>
            <style type="text/css">

            :root {
                --dk-gray-100: #F3F4F6;
                --dk-gray-200: #E5E7EB;
                --dk-gray-300: #D1D5DB;
                --dk-gray-400: #9CA3AF;
                --dk-gray-500: #6B7280;
                --dk-gray-600: #4B5563;
                --dk-gray-700: #374151;
                --dk-gray-800: #1F2937;
                --dk-gray-900: #111827;
                --dk-dark-bg: #313348;
                --dk-darker-bg: #2a2b3d;
                --navbar-bg-color: #6f6486;
                --sidebar-bg-color: #252636;
                --sidebar-width: 250px;
            }
            input
            {   
                width: 220px;
                height: 45px;
                border-radius: 50px;
                font-size: 20px;
                font-weight:500;
                outline: none;
                border: none;
                padding: 5px 15px;
                background:#ebecf0;
                color: #8a92a5;
                box-shadow:inset -4px -4px 8px rgb(255, 255, 255),
                inset 4px 4px 8px rgba(121, 130, 160, 0.747);
                }
                .has-search span{
                   left: 190px;
                   top: 55px;
                }
                .has-search .form-control-feedback {
                    border-radius: 50px;
                    background: #7b22e4;
                    position: absolute;
                    z-index: 2;
                    display: block;
                    width: 2.375rem;
                    height: 2.375rem;
                    line-height: 2.375rem;
                    text-align: center;
                    pointer-events: none;
                    color: #fff;
                }
            </style>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
        </head>
        <body>
        <div style="width: 100%;padding-right:650px; background: #ebecf0;">  
                <div class="container">
                        <table class="myInput" style="margin: 10px;width:1850px; z-index:1;" id="idtable">
                        <div >
                        </div>
                            <div style="height:50px;width:95vw; text-align=center;">
                                <h2 style="margin-bottom:50px;"> <img style="width:70px;height:70px;" onclick = "btn1()" src="../image/iconhome.png">  請假統計員工</h2> 
                            </div>
                            <div class="form-group has-search">
                                <input style="" type="text" name="myInput" class="myInput1" id="myInput" onkeyup="tableSearch()" placeholder="Mã nhân viên" style="">
                                <span class="fa fa-search form-control-feedback"></span>
                            </div>              
                            <thead>                  
                                <tr>                     
                                    <th style="width: 50px;" class="col-1">工號</th>                        
                                    <th style="	width: 12%;" class="col-1">姓名</th>                     
                                    <th style="" class="">1 周</th>                     
                                    <th style="" class="">1 个月</th>                     
                                    <th style="" class="">
                                        <div class="btn-group">
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" style="font-size: 20px; font-weight: bold;">一年</button>
                                        <div class="dropdown-menu" style="z-index: 3;">
                                            <a href="#" class="dropdown-item">上升</a>
                                            <a href="#" class="dropdown-item">减少</a>
                                        </div>
                                    </div></th>
                                    <th style="" class="">
                                    <div class="btn-group">
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" style="font-size: 20px; font-weight: bold;">工作表现(%)</button>
                                        <div class="dropdown-menu" style="z-index: 3;">
                                            <a href="#" class="dropdown-item">上升</a>
                                            <a href="#" class="dropdown-item">减少</a>
                                        </div>
                                    </div>
                                    </th>
                                    <th style="" class="col-4">细节</th>                                     
                                </tr>               
                            </thead>            
                            <tbody>
                                
                                <?php 
                                    if( mysqli_num_rows($executesqlweek) > 0){
                                        while( $rows1 = mysqli_fetch_assoc($executesqlweek) ){
                                            $employcode = $rows1["employcode"];
                                            $name = $rows1["name"];
                                            $id = $rows1["member_id"]; 
                                            $nghilamtuan = $rows1["nghilam"];
                                ?>
                                <?php 
                                    if( mysqli_num_rows($executesqlmonth) > 0){
                                        while( $rows2 = mysqli_fetch_assoc($executesqlmonth) ){
                                            $employcode = $rows2["employcode"];
                                            $name = $rows2["name"];
                                            $id = $rows2["id"]; 
                                            $nghilamthang  = $rows2["nghilam"];
                                    ?>
                                 <?php 
                                    if( mysqli_num_rows($executesqlyear) > 0){
                                        while( $rows3 = mysqli_fetch_assoc($executesqlyear) ){
                                            $employcode = $rows3["employcode"];
                                            $name = $rows3["name"];
                                            $id = $rows3["id"]; 
                                            $nghilamnam  = $rows3["nghilam"];
                                ?>
                                <tr>         
                                    <td><?php echo $employcode; ?></td>
                                    <td style="width:10px;"><?php echo $name; ?></td>
                                    <td><?php echo $nghilamtuan;?></td>
                                    <td><?php echo $nghilamthang; ?></td>
                                    <td><?php echo $nghilamnam; ?></td>
                                    <td><?php echo round(100-($nghilamnam*100/$datediff),2).'%'; ?></td>
                                    <td>
                                        <table style="width:100% ; border-left: 5px;" id="idtable2">                              
                                            <td style="border-top:none; border-left: none; border-bottom: none">年休: <?php echo 1; ?></td>
                                            <td style="border-top:none; border-left: none; border-bottom: none">事假: <?php echo 0; ?></td>
                                            <td style="border-top:none; border-left: none; border-bottom: none">病假: 0</td>
                                            <td style="border-top:none; border-left: none; border-bottom: none">曠工: 0</td>                            
                                        </table>
                                    </td>
                                    <?php } } ?>
                                    <?php } } ?>
                                    <?php } } ?>
                                </tr>
                                
                            </tbody>         
                        </table>
                    </div> 
                <!-- </div> -->
        </body>
    </html>

<script type="text/javascript">
    function tableSearch(){
        let input, filter, table, tr ,td, i, txtvalue;
        
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("idtable");
        tr = table.getElementsByTagName("tr");
        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if(td)
            {
                txtvalue = td.textContent || td.innerText;
                if(txtvalue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }else{
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>
<!-- <script type="text/javascript">
    function tableSearch1(){
        let input1, filter1, table1, tr1 ,td1, i, txtvalue1;
        input1 = document.getElementById("myInput1");
        filter1 = input1.value.toUpperCase();
        table1 = document.getElementById("idtable2");
        tr1 = table1.getElementsByTagName("tr");
        for (let i = 0; i < tr1.length; i++) {
            td1 = tr1[i].getElementsByTagName("td")[0];
            if(td1)
            {
                txtvalue1 = td1.textContent || td1.innerText;
                if(txtvalue1.toUpperCase().indexOf(filter1) > -1){
                    tr1[i].style.display = "";
                }else{
                    tr1[i].style.display = "none";
                }
            }
        }
    }

</script> -->

 <script src="../plugins/jquery-2.2.4.min.js"></script>
 <script src="../plugins/jquery.appear.min.js"></script>
 <script src="../plugins/jquery.easypiechart.min.js"></script> 
 <script>
    'use strict';
	var $window = $(window);
	function run()
	{
		var fName = arguments[0],
			aArgs = Array.prototype.slice.call(arguments, 1);
		try {
			fName.apply(window, aArgs);
		} catch(err) {
			
		}
	};
 </script>
 <script>
     function btn1(){
        window.location.href = '../Controller/index.php?action=test2#book';
     }
 </script>
