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
  
        $sql = "SELECT member_id,employcode,name
        FROM `attendance`";
        $result = mysqli_query($conn , $sql);

        $sqlweek = "SELECT  member_id, employcode, name, SUM(attendance1 = 0) as nghilamtuan
        FROM `attendance`
        WHERE  `date` 
        BETWEEN '$monday' AND '$saturday' GROUP BY name";
        $executesqlweek = mysqli_query($conn , $sqlweek);

        $sqlmonth = "SELECT  member_id, employcode, name, SUM(attendance1 = 0) as nghilamthang
        FROM `attendance`
        WHERE  `date` 
        BETWEEN ' $dauthang' AND '$cuoithang' GROUP BY name";
        $executesqlmonth = mysqli_query($conn , $sqlmonth);

        $sqlyear = "SELECT member_id, employcode, name, SUM(attendance1 = 0) as nghilamnam
        FROM `attendance` WHERE  `date` BETWEEN '$dauthang1' AND '$cuoithang12' GROUP BY name";
        $executesqlyear = mysqli_query($conn , $sqlyear);

        $columns = array('1 Năm','Hiệu suất(%)');
        $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
        $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';


        if(isset($_POST['btnChitiet'])){
            header('Location: ../Controller/index.php?action=chitiethieusuat');
        }
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
                
                    .table-sortable .th-sort-asc::after tbody tr td:nth-child(6){
                        border: 1px solid #788080;
                        background-color: white;
                        line-height: 35px;
                        text-align: center;
                        font-size: 17px;
                        font-weight: bold;
                        
                    }


            </style>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
        </head>
        <body>
        <div style="width: 100%;padding-right:650px; background: #ebecf0;">  
                <div class="container">
                    <form action="" method="POST">
                        <table class="table-sortable" style="margin: 10px;width:1850px; z-index:1;" id="idtable">
                            <div style="height:50px;width:95vw; text-align=center;">
                                <h2 style="margin-bottom:50px;"> <img style="width:70px;height:70px;" onclick = "btn1()" src="../image/iconhome.png">  Chi tiết nghỉ phép của nhân viên</h2> 
                            </div>
                            <div class="form-group has-search">
                                <input style="" type="text" name="myInput" class="myInput1" id="myInput" onkeyup="tableSearch()" placeholder="Mã nhân viên" style="">
                                <span class="fa fa-search form-control-feedback"></span>
                            </div>              
                            <thead>                  
                                <tr>                     
                                    <th style="" class="col-1">Mã nhân viên</th>                        
                                    <th style="	width: 12%;" class="col-2">Họ tên</th>                     
                                    <th style="" class="col-1">1 Tuần</th>                     
                                    <th style="" class="col-1">1 Tháng</th>                     
                                    <th style="" class="col-1">1 Năm</th>
                                    <th  onclick="change_background()" style="" class="col-1">Hiệu suất(%)
                                    </th>
                                    <th style="" class="col-1">Chi tiết</th>                                     
                                </tr>               
                            </thead>            
                            <tbody>
                                <?php 
                                $mang1 = array();
                                $mang2 = array();
                                $mang3 = array();
                                $mang4 = array();
                                $mang5 = array();
                                $c = 0;
                                $d = 0;
                                $e = 0;
                                    if( mysqli_num_rows($executesqlweek) > 0){




                                        while( $rows1 = mysqli_fetch_assoc($executesqlweek) ){
                                            $c++;
                                            $employcode = $rows1["employcode"];
                                            $name = $rows1["name"];
                                            $nghilamtuan = $rows1["nghilamtuan"];
                                            $mang1[$c] = $nghilamtuan;
                                            $mang4[$c] = $employcode;
                                            $mang5[$c] = $name;

                                           
                                        }
                                        while( $rows1 = mysqli_fetch_assoc($executesqlmonth) ){
                                            $d++;
                                            $nghilamthang = $rows1["nghilamthang"];
                                            $mang2[$d] = $nghilamthang;
                                           
                                        }
                                        while( $rows1 = mysqli_fetch_assoc($executesqlyear) ){
                                            $e++;
                                            $nghilamnam = $rows1["nghilamnam"];
                                            $mang3[$e] = $nghilamnam;
                                           
                                        }
                                        $count1 = count($mang1);
                                        echo "<script type='text/javascript'>alert('$count1');</script>";
                                        for($i=1;$i< $count1;$i++){
                                ?>
                                
                                <tr>         
                                    <td><?php echo $mang4[$i]; ?></td>
                                    <td><?php echo $mang5[$i]; ?></td>
                                    <td><?php echo $mang1[$i];?></td>
                                    <td><?php echo $mang2[$i]; ?></td>
                                    <td><?php echo $mang3[$i]; ?></td>
                                    <td id="td"><?php echo round(100-($mang3[$i]*100/$datediff),2).'%'; ?></td>
                                    <td><button class="btn btn-primary" name="btnChitiet">Chi tiết</button></td>
                                </tr>
                                    
                                    
                                    <?php }  }?>
                            </tbody>         
                        </table>
                    </form>    
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
            td = tr[i].getElementsByTagName("td")[1];
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
        function change_background(){
            document.getElementById("td").classList.toggle("tdd");
        }
    </script>
    <script>
        function btn1(){
            window.location.href = '../Controller/index.php?action=test2#book';
        }
    </script>
    <script src="../View/maymoc/tablesort.js"></script>