<?php 
    $id = $_GET["id"];
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

    $query = "SELECT * FROM attendance WHERE type_leave='Phép bệnh' AND date BETWEEN '$dauthang1' AND '$cuoithang12' AND member_id= $_GET[id]";
    $result = mysqli_query($conn, $query);
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
            </style>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
        </head>
        <body>
            <div style="background: #ebecf0;">
                <h2 align="center"> <img style="width:70px;height:70px;" onclick = "btn1()" src="../image/iconhome.png">  细节請假职员</h2></br></br></br>
                <div class="table-responsive" >
                    <table style="width: 1800px" class="table-sortable" id="idtable" align="center">
                        <!-- <input style="" type="date" name="myInput" class="myInput1" id="myInput" onkeyup="tableSearch()" placeholder="Ngày" style=""> -->
                        <thead>                  
                            <tr>                     
                            <th style="width: 50px;" class="col-1">工號</th>                        
                                <th style="	width: 12%;" class="col-1">姓名</th>
                                <th style="" class="">天</th>                    
                                <th style="" class="">請假類別</th>                     
                            </tr>               
                        </thead>            
                        <tbody>
                        <?php 
                                if( mysqli_num_rows($result) > 0){
                                    while( $rows = mysqli_fetch_assoc($result) ){
                                        $employcode = $rows["employcode"];
                                        $name = $rows["name"];
                                        $id = $rows["member_id"]; 
                                        $date = $rows["date"];
                                        $loaiphep = $rows["type_leave"];
                            ?>
                            <tr>         
                                <td><?php echo $employcode; ?></td>
                                <td style="width:10px;"><?php echo $name; ?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $loaiphep; ?></td>
                                <?php } } else{
                                            print "<script>";
                                            print "self.location='../Controller/index.php?action=table-attendance-cn#book';";
                                            print "alert('Không có dữ liệu nghỉ phép bệnh của nhân viên này!');";
                                            print "</script>";
                                        } ?>
                            </tr>
                        </tbody>         
                    </table> 
                </div> 
            </div>
        </body>
    </html>
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
        window.location.href = '../Controller/index.php?action=table-attendance-cn#book';
     }
 </script>
