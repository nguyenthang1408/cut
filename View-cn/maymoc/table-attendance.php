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
        $result1 = mysqli_query($conn, "select count(id) as total from employee");
        $row1 = mysqli_fetch_assoc($result1);   
        $total_records = $row1['total'];

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        $total_page = ceil($total_records / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        
        $sql = "SELECT B.`id`, B.`employcode`, B.`name`
        FROM `attendance`AS A 
        INNER JOIN `employee` AS B 
        ON B.`id` = A.`member_id`";
        $result = mysqli_query($conn , $sql);

        $sqlweek = "SELECT  member_id, employcode, name, SUM(attendance1 = 0) as nghilam
        FROM `attendance`
        WHERE `attendance1` = 0 AND `date` 
        BETWEEN ' $monday' AND '$saturday' GROUP BY member_id ORDER by member_id ASC LIMIT $start, $limit";
        $executesqlweek = mysqli_query($conn , $sqlweek);

        $sqlmonth = "SELECT B.`id`, B.`employcode`, B.`name`, SUM(A.`attendance1` = 0) as nghilam
        FROM `attendance`AS A 
        INNER JOIN `employee` AS B 
        ON B.`id` = A.`member_id` 
        WHERE A.`attendance1` = 0  AND A.`date` 
        BETWEEN '$dauthang' AND '$cuoithang' 
        GROUP BY B.`name` ORDER by name ASC LIMIT $start, $limit";
        $executesqlmonth = mysqli_query($conn , $sqlmonth);

        $sqlyear = "SELECT B.`id`, B.`employcode`, B.`name`, SUM(A.`attendance1` = 0) as nghilam
        FROM `attendance`AS A 
        INNER JOIN `employee` AS B 
        ON B.`id` = A.`member_id` 
        WHERE A.`attendance1` = 0 AND A.`date` 
        BETWEEN '$dauthang1' AND '$cuoithang12' 
        GROUP BY B.`name` ORDER by name ASC LIMIT $start, $limit";
        $executesqlyear = mysqli_query($conn , $sqlyear);
    ?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="../codejavascript/tablecustom.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            button {
                margin: 20px;
            }
            .custom-btn {
                width: 130px;
                height: 60px;
                color: #fff;
                border-radius: 5px;
                padding: 10px 25px;
                font-family: 'Lato', sans-serif;
                font-weight: 500;
                background: transparent;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
                display: inline-block;
                box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
                7px 7px 20px 0px rgba(0,0,0,.1),
                4px 4px 5px 0px rgba(0,0,0,.1);
                outline: none;
            }
            /* 11 */
            .btn-11 {
                border: none;
                background: rgb(251,33,117);
                background: linear-gradient(0deg, rgba(251,33,117,1) 0%, rgba(234,76,137,1) 100%);
                color: #fff;
                overflow: hidden;
            }
            .btn-11:hover {
                text-decoration: none;
                color: #fff;
            }
            .btn-11:before {
                position: absolute;
                content: '';
                display: inline-block;
                top: -180px;
                left: 0;
                width: 30px;
                height: 100%;
                background-color: #fff;
                animation: shiny-btn1 3s ease-in-out infinite;
            }
            .btn-11:hover{
                opacity: .7;
            }
            .btn-11:active{
                box-shadow:  4px 4px 6px 0 rgba(255,255,255,.3),
                            -4px -4px 6px 0 rgba(116, 125, 136, .2), 
                inset -4px -4px 6px 0 rgba(255,255,255,.2),
                inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
            }
            
            
            @-webkit-keyframes shiny-btn1 {
                0% { -webkit-transform: scale(0) rotate(45deg); opacity: 0; }
                80% { -webkit-transform: scale(0) rotate(45deg); opacity: 0.5; }
                81% { -webkit-transform: scale(4) rotate(45deg); opacity: 1; }
                100% { -webkit-transform: scale(50) rotate(45deg); opacity: 0; }
            }
            </style>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
        </head>
        <body>
        <div style="width: 100%;height: 70px;">
        <div class="frame">
        <button class="custom-btn btn-11" onclick = "btn1()">Trang Chủ</button>
         </div>
                <h2 align= "center";>請假統計員工</h2>
                <div class="container" style="margin: 50px;">
                    <div style="box-shadow:7px 7px 15px rgba(121, 130, 160, 0.747);border-radius: 30px; background-color: white; height: 750px; padding-top:10px; width:1700px;">
                        <table class="" style="margin: 20px; width: 1650px;">               
                            <thead>                 
                                <tr>                     
                                    <th style="" class="col-1">工號</th>                        
                                    <th style="" class="col-2">姓名</th>                     
                                    <th style="" class="col-1">1 周</th>                     
                                    <th style="" class="col-1">1 个月</th>                     
                                    <th style="" class="col-1">一年</th>
                                    <th style="" class="col-2">细节</th>                                     
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
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $nghilamtuan;?></td>
                                    <td><?php echo $nghilamthang; ?></td>
                                    <td><?php echo $nghilamnam; ?></td>
                                    <td>
                                        <table style="width:100%">
                                                <tr>
                                                    <td>年休: <?php echo 1; ?></td>
                                                    <td>事假: <?php echo 0; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>病假: 0</td>
                                                    <td>曠工: 0</td>
                                                </tr>
                                        </table>
                                    </td>
      
                                </tr>
                                <?php } } ?>
                                <?php } } ?>
                                <?php } } ?>
                            </tbody>         
                        </table>
                        <div class="pagination" align="right">
                            <?php 
                            // PHẦN HIỂN THỊ PHÂN TRANG
                            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                    
                            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                            if ($current_page > 1 && $total_page > 1){
                                echo '<a href="../Controller/index.php?action=table-attendance&page='.($current_page-1).'">Trước</a> | ';
                            }
                    
                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<span>'.$i.'</span> | ';
                                }
                                else{
                                    echo '<a href="../Controller/index.php?action=table-attendance&page='.$i.'">'.$i.'</a> | ';
                                }
                            }
                    
                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<a href="../Controller/index.php?action=table-attendance&page='.($current_page+1).'">Tiếp</a> | ';
                            }
                            ?>
                        </div>
                    </div> 
                </div>
        </body>
    </html>


<script type="text/javascript">
    document.getElementById("xacnhan").addEventListener("click", myFunction);
	function myFunction() {
		var x = document.getElementById("idmatkhau");
		var y = document.getElementById("span");
		x.value = x.value.toUpperCase();
		if(x.value == '<?php echo $matkhau1[1] ?>'){
			window.location="../Controller/index.php?action=usermanager&page=1";
		}else{
		document.getElementById("idmatkhau").classList.add("is-invalid");
		document.getElementById("span").innerText = 'Mật Khẩu Không Đúng'
		document.getElementById("span").style.color = 'red'
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
        window.location.href = '../Controller/index.php?action=test2#book';
     }
 </script>