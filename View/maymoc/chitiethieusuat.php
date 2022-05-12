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
    $columns = array('Phép năm','Phép bệnh','Việc riêng');
    $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
    $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
    $query = "SELECT member_id,employcode,name, date, SUM(type_leave = 'Phép năm') AS 'Phép năm', SUM(type_leave = 'Việc riêng') AS 'Việc riêng',SUM(type_leave = 'Phép bệnh') AS 'Phép bệnh',SUM(type_leave = 'Tự do') AS 'Tự do'
    
    FROM attendance WHERE date BETWEEN '$dauthang1' AND '$cuoithang12' GROUP BY name";
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

            </style>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
        </head>
        <body>
        <div style="width: 100%;padding-right:650px; background: #ebecf0;">  
                <div class="container">
                        <table class="table-sortable" style="margin: 10px;width:1850px; z-index:1;" id="idtable">
                        <div >
                        </div>
                            <div style="height:50px;width:95vw; text-align=center;">
                                <h2 style="margin-bottom:50px;"> <img style="width:70px;height:70px;" onclick = "btn1()" src="../image/iconhome.png">  Chi tiết nghỉ phép của nhân viên</h2> 
                            </div>
                            <div class="form-group has-search">
                                <input style="" type="text" name="myInput" class="myInput1" id="myInput" onkeyup="tableSearch()" placeholder="Mã nhân viên" style="">
                                <span class="fa fa-search form-control-feedback"></span>
                            </div>              
                            <thead>                  
                                <tr>                     
                                    <th style="width: 50px;" class="col-1">Mã nhân viên</th>                        
                                    <th style="	width: 12%;" class="col-1">Họ tên</th>
                                    <th style="" class="">Ngày</th>                    
                                    <th style="" class="">Phép năm</th>                     
                                    <th style="" class="">Việc riêng</th>                     
                                    <th style="" class="">Phép bệnh</th>
                                    <th style="" class="">Tự do</th>                                   
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
                                            $phepnam = $rows["Phép năm"];
                                            $phepbenh = $rows["Phép bệnh"];
                                            $viecrieng = $rows["Việc riêng"];
                                            $tudo = $rows["Tự do"];
                                ?>

                                <tr>         
                                    <td><?php echo $employcode; ?></td>
                                    <td style="width:10px;"><?php echo $name; ?></td>
                                    <td><?php echo $date;?></td>
                                    <td><?php echo $phepnam; ?></td>
                                    <td><?php echo $viecrieng; ?></td>
                                    <td><?php echo $phepbenh; ?></td>
                                    <td><?php echo $tudo; ?></td>
                                    <?php } } ?>
                                </tr>
                            </tbody>         
                        </table>
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
<script type="text/javascript">
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
<script>
    /**
 * Sorts a HTML table.
 * 
 * @param {HTMLTableElement} table The table to sort
 * @param {number} column The index of the column to sort
 * @param {boolean} asc Determines if the sorting will be in ascending
 */
function sortTableByColumn(table, column, asc = true) {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });

    // Remove all existing TRs from the table
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how the column is currently sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains("th-sort-asc");

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
    });
});

<script>