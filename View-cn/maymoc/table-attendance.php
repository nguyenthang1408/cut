<?php
        $thang = date('m', strtotime("now")); 
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

        $sqlweek = "SELECT  member_id, employcode, name, SUM(attendance1 = 0) as nghilamtuan
        FROM `attendance`
        WHERE  `date` 
        BETWEEN '$monday' AND '$today' GROUP BY name";
        $executesqlweek = mysqli_query($conn , $sqlweek);

        $sqlmonth = "SELECT  member_id, employcode, name, SUM(attendance1 = 0) as nghilamthang
        FROM `attendance`
        WHERE  `date` 
        BETWEEN ' $dauthang' AND '$cuoithang' GROUP BY name";
        $executesqlmonth = mysqli_query($conn , $sqlmonth);

        $sqlyear = "SELECT member_id, employcode, name, SUM(attendance1 = 0) as nghilamnam
        FROM `attendance` WHERE  `date` BETWEEN '$dauthang1' AND '$cuoithang12' GROUP BY name";
        $executesqlyear = mysqli_query($conn , $sqlyear);

        $query = "SELECT member_id,employcode,name, date, 
        SUM(type_leave = 'Phép năm') AS 'Phép năm', SUM(type_leave = 'Việc riêng') AS 'Việc riêng',SUM(type_leave = 'Phép bệnh') AS 'Phép bệnh',SUM(type_leave = 'Tự do') AS 'Tự do'
        FROM attendance WHERE date BETWEEN '$dauthang1' AND '$cuoithang12' GROUP BY name";
        $re = mysqli_query($conn , $query);
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
                width: 200px;
                height: 45px;
                border-radius: 50px;
                font-size: 20px;
                font-weight:500;
                outline: none;
                border: none;
                background:#ebecf0;
                color: #8a92a5;
                box-shadow:inset -4px -4px 8px rgb(255, 255, 255),
                inset 4px 4px 8px rgba(121, 130, 160, 0.747);
                }
            .has-search .form-control-feedback {
                border-radius: 50px;
                background: #7b22e4;
                width: 2.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;
                color: #fff;
            }
            
            .table-sortable th {
                cursor: pointer;
                }

                .table-sortable .th-sort-asc::after {
                content: "\25b4";
                }

                .table-sortable .th-sort-desc::after {
                content: "\25be";
                }

                .table-sortable .th-sort-asc::after,
                .table-sortable .th-sort-desc::after {
                margin-left: 5px;
                }

                .table-sortable .th-sort-asc,
                .table-sortable .th-sort-desc {
                background: rgba(0, 0, 0, 0.1);
                }

                a{
                    color: red;
                    text-decoration: none;
                }

            </style>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
        </head>
        <body>
        <div style="background: #ebecf0;">
                    <h2 align="center"> <img style="width:70px;height:70px;" onclick = "btn1()" src="../image/iconhome.png">  细节請假职员</h2> 
                        <div class="table-responsive" >
                            <table style="width:1900px" class="table-sortable" id="idtable" align="center">
                            </br>  
                            <div class="form-group has-search">
                            <input style="" type="text" name="myInput" class="myInput1" id="myInput" onkeyup="tableSearch()" placeholder="工號" style="">
                            <!-- <div class="fa fa-search form-control-feedback"></div> -->
                        </div>
                        </br>          
                                <thead>                  
                                    <tr>                     
                                        <th style="" class="col-1">工號</th>                        
                                        <th style="" class="col-2">姓名</th>                     
                                        <th style="" class="col-1">1 周</th>                     
                                        <th style="" class="col-1">1 个月</th>                     
                                        <th style="" class="col-1">一年</th>
                                        <th style="" class="col-1">工作表现(%)
                                        </th>
                                        <th style="	width: 25%;" class="col-2">细节</th>                                     
                                    </tr>               
                                </thead>            
                                <tbody>
                                    <?php 
                                    $mang1 = $mang2 = $mang3 = $mang4 = $mang5 = $mang6 = $mang7 = $mang8 = $mang9 = $mang_id =   array();
                                    $c = $d = $e = $f = $g = $h = $j =  0;
                                        if( mysqli_num_rows($executesqlweek) > 0){
                                            while( $rows = mysqli_fetch_array($executesqlweek) ){
                                                $c++;
                                                $id = $rows["member_id"];
                                                $employcode = $rows["employcode"];
                                                $name = $rows["name"];
                                                $nghilamtuan = $rows["nghilamtuan"];
                                                $mang1[$c] = $nghilamtuan;
                                                $mang4[$c] = $employcode;
                                                $mang5[$c] = $name;
                                                $mang_id[$c] = $id;   
                                            }
                                            while( $rows = mysqli_fetch_array($executesqlmonth) ){
                                                $d++;
                                                $nghilamthang = $rows["nghilamthang"];
                                                $mang2[$d] = $nghilamthang;
                                            }
                                            while( $rows = mysqli_fetch_array($executesqlyear) ){
                                                $e++;
                                                $nghilamnam = $rows["nghilamnam"];
                                                $mang3[$e] = $nghilamnam;
                                            }
                                            while($rows = mysqli_fetch_array($re)){
                                                $f++;
                                                
                                                $phepnam = $rows["Phép năm"];
                                                $viecrieng = $rows["Việc riêng"];
                                                $phepbenh = $rows["Phép bệnh"];
                                                $tudo = $rows["Tự do"];
                                                $mang6[$f] = $phepnam;
                                                $mang7[$f] = $viecrieng;
                                                $mang8[$f] = $phepbenh;
                                                $mang9[$f] = $tudo;
                                            }

                                            $count1 = count($mang1);
                                            for($i=1;$i< $count1;$i++){
                                    ?>
                                    
                                    <tr>         
                                        <td><?php echo $mang4[$i]; ?></td>
                                        <td><?php echo $mang5[$i]; ?></td>
                                        <td><?php echo $mang1[$i];?></td>
                                        <td><?php echo $mang2[$i]; ?></td>
                                        <td><?php echo $mang3[$i]; ?></td>
                                        <td id="td"><?php echo round(100-($mang3[$i]*100/$datediff),2).'%'; ?></td>
                                        <td><?php 
                                            $phepnam_icon = "<a href='../Controller/index.php?action=chitiethieusuat-cn&id={$mang_id[$i]}' class='btn-sm btn-primary float-right ml-3 '> <span >年休 : {$mang6[$i]} </span></a>&nbsp;";
                                            $viecrieng_icon = "<a href='../Controller/index.php?action=chitiethieusuatviecrieng-cn&id={$mang_id[$i]}' class='btn-sm btn-primary float-right'> <span >事假 : {$mang7[$i]} </span> </a>&nbsp;";
                                            $phepbenh_icon = "<a href='../Controller/index.php?action=chitiethieusuatphepbenh-cn&id={$mang_id[$i]}' class='btn-sm btn-primary float-right ml-3 '> <span >病假: {$mang8[$i]} </span></a>&nbsp;";
                                            $tudo_icon = " <a href='../Controller/index.php?action=chitiethieusuattudo-cn&id={$mang_id[$i]}' class='btn-sm btn-primary float-right'> <span >曠工 : {$mang9[$i]} </span> </a>";                                     
                                            echo $phepnam_icon .  $viecrieng_icon .  $phepbenh_icon .  $tudo_icon;
                                        ?> </td>
                                    </tr>
                                        
                                        
                                        <?php }  } ?>
                                </tbody>         
                            </table> 
                        </div> 
                    </div>
                </div>
            </div>
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
            window.location.href = '../Controller/index.php?action=test2-cn#book';
        }
    </script>
    <script src="../View/maymoc/tablesort.js"></script>