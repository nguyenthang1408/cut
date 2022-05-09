<?php 
include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

$table = 'tiendomaymoc';
$bophan = 'AEC';
if(isset($_POST['dangxuat'])){
    session_destroy();
    header('Location: ../Controller/index.php?action=begin-cn');
}
if(isset($_GET['delete'])){
if(isset($_GET['id'])){
$id = $_GET['id'];
$table = "tiendomaymoc";
if($db->Delete($id,$table))
{
   header('location: ../Controller/index.php?action=test2-cn#divtimkiem');
}
else{
     header('location: ../Controller/index.php?action=test2-cn#divtimkiem');
}
}
}

$table = 'tiendomaymoc';
$data1 = $db->getAllData($table);
$num_row = $db->count_row($table);
$databophan = $db->getAllDatabophan($table,$bophan);

$table = 'tiendomaymoc';
$data1 = $db->getAllData($table);
$num_row = $db->count_row($table);

$count_all_data = $db->count_row_alldata($table);

$num = $num_row;
$counthoanthanh = 0;
$countchua = 0;
$counttruocdukien = 0;
$countsaudukien = 0;

if($count_all_data>0)
{
foreach ($data1 as $value) {
   $ngaybatdau = $value['ngaybatdau'];
   $ngaydukien = $value['ngaydukien'];
   $today = date("Y-m-d");
   if(strtotime($ngaydukien) > strtotime($today)&&$value['tiendo']=='100%')
   {
        $counttruocdukien++;
   }
   else if(strtotime($ngaydukien) < strtotime($today)&&$value['tiendo']=='100%'){
        $countsaudukien++;
   }
    if($value['tiendo']=='100%')
    {
        $counthoanthanh++;
    }else{
        $countchua++;
    }

}
}

$nhanvien = 'nhanvien';
$datanhanvien = $db->getAllData($nhanvien);





$tableusersview = 'usersview';
$matkhau = $db->getAllData($tableusersview);


$matkhau2 = array();
$a = 0;
foreach ($matkhau as $keyy) {
    $a++;
    $matkhau1[$a] = $keyy['password'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VN cable 自動化</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script type="text/javascript" src="../canvasjs/canvasjs.min.js"></script>
    <script type="text/javascript" src="../canvasjs/canvasjs.react.js"></script>
    <script type="text/javascript" src="../canvasjs/jquery.canvasjs.min.js"></script>
    
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->


    <link rel="stylesheet" href="../codejavascript/style6.css"> 



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style type="text/css">

         #myUL {
              margin: 0;
              padding: 0;
            }
        .book .caret {
              cursor: pointer;
              user-select: none; 
            }

        .book .caret::before {
              content: "\25B6";
              color: black;
              display: inline-block;
              margin-right: 6px;
            }
        .caret-down::before {
              transform: rotate(90deg);
            }
        .book .nested {
              display: none;
            }
        .book .active {
              display: block;
            }
    </style>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Biểu Đồ Tiến Độ Công Việc"
    },
     axisX: {
    labelAngle: -50
    },
    axisY: {
        title: "Số Tiến Độ"
    },
    data: [{        
        type: "column",  
        dataPoints: [      
            { y: <?php echo $countchua; ?>, label: "Chưa Xong" },
            { y: <?php echo $counthoanthanh; ?>,  label: "Đã Xong " },
            { y: <?php echo $counttruocdukien; ?>,  label: "Xong Trước Dự Kiến" },
            { y: <?php echo $countsaudukien; ?>,  label: "Xong Sau Dự Kiến" },
            { y: <?php echo $num;?>,  label: "Tổng Số" }
        ]
    }]
});
chart.render();
}
</script>
</head>
<body>

<header>
    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="col-lg-12 col-12 navbar" id="navbar" style="">
        <a href="../Controller/index.php?action=test2-cn#home" class="logo" style=""><span>V</span>N cable 自動化</a>
        <a href="../Controller/index.php?action=test2-cn#book" style=""><span>菜</span>單</a>
        <a href="../Employee-management-system/admin/dashboard.php">點名</a>
        <a href="../Controller/index.php?action=hieusuat-cn">效率</a>
        <span href="" class="spantiendo" style="">進度
            <ul style="">
                <li style=""><a href="../Controller/index.php?action=selectaecdata-cn#divtimkiem" style="">AEC</a></li>
                <li style=""><a href="../Controller/index.php?action=selecttscdata-cn#divtimkiem" style="">TSC</a></li>
                <li style=""><a href="../Controller/index.php?action=selectapsdata-cn#divtimkiem" style="">APS</a></li>
            </ul>
        </span>
        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModall">賬號</a>
    <div class="icons" style="display: inline;margin-left: 100px;">
        <i class="fas fa-search" id="search-btn"style=""></i>
        <i class="fas fa-user" id="login-btn">
        <?php 
           if(isset($_SESSION['username'] ))
           {
            echo $_SESSION['username'];
           }


         ?></i>
    </div>
    </nav>
    

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>



<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="" method="POST">
        <h3>登出</h3>
        <input type="text" class="box" placeholder="name" value="<?php 
           if(isset($_SESSION['username'] ))
           {
            echo $_SESSION['username'];
           }
         ?>">
        <input type="password" class="box" placeholder="***********"  disabled>
        <input type="submit" name="dangxuat" value="登出" class="btn btn-success btn-lg">
    </form>

</div>

<!-- home section starts  -->



<section class="book" id="book" style="">

    <h1 class="heading btn col-12" id="headingtieude">
        <span style="">效</span>
        <span style="">率</span>
    </h1>

    <div class="row" style="" id="divtimkiem">

                <div class="row-header">                 
                        <a class="btn btn-danger" id="addmay" data-bs-toggle="modal" data-bs-target="#exampleModal" style="">加專案</a>
                      <input type="text" name="myInput" class="" id="myInput" onkeyup="tableSearch()" placeholder="工號" style="">
<!--                       <input type="text" name="myInput" class="classinput" id="myInput1" onkeyup="tableSearch1()" placeholder="工號" style=""> -->
                </div>
                             

            <div style="" class="col-12 table" id="tableselectdata" style="">
           <div style="margin: 0 30px;height: 100vw;height: 100vh; box-shadow:7px 7px 15px rgba(121, 130, 160, 0.747);padding:30px;margin-top: 30px;border-radius: 30px;background: white;overflow-y: auto;text-align: center;" class="div-table-div" >
                <span class="div-table-span" style="font-size: 40px;font-weight: bold;">進度</span>
            <table style="" name="tabletable" id="idtable" class="table-hover table">
                 <thead>
            <tr class="tr" style="">
               <!--  <th style="font-size: 20px; text-align: center; width: 15%;" id="idth">#</th> -->
                <th class="col-1 col-xs-1"id="idth" style="width: 10%;border: none;background: #D5E0E0;border-radius: 20px 20px 0 0;line-height: 70px;border: 3px solid white;">#</th>  

                <th class="col-1 col-xs-1"style="width: 10%;background: #7868ed;border: none;border-radius: 20px 20px 0 0;line-height: 70px;border: 3px solid white;">工號</th>
                <th class="col-1 col-xs-1"style="width: 10%;background: #247070;border: none;border-radius: 20px 20px 0 0;line-height: 70px;border: 3px solid white;">姓名</th>
                <th class="col-1 col-xs-1"style="width: 10%;background: #ff9378;border: none;border-radius: 20px 20px 0 0;line-height: 70px;border: 3px solid white;">效率</th>
            </tr>
        </thead>
        <tbody>
           <?php $stt = 0; foreach ($datanhanvien as $value) { $stt++;

           ?>
            <tr style="background: white; text-align: center;">
                <td style='border: 3px solid #d5e0e0; ' class=""><?php echo $stt; ?></td>
                <td style=' border: 3px solid #d5e0e0;' class=""><?php echo $value['mathe']; ?></td>
                <td style=' border: 3px solid #d5e0e0;' class=""><?php echo $value['hoten']; ?></td>
                <td style='border: 3px solid #d5e0e0; ' class=""><?php echo $value['hieusuat']; ?></td>                     
            </tr>
           <?php } ?>
            </tbody>
        </table>
            
            </div>
       

    </div>

</section>

<!-- book section ends -->




<!-- footer section  -->



<!-- thêm dự án -->
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
            <label for="recipient-name" class="col-form-label">號碼:</label>
            <input type="password" class="form-control" id="idmatkhau">
          </div>
          <div>
              <span id="span">
                  
              </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="xacnhan" class="btn btn-primary">確認</button>
      </div>
    </div>
  </div>
</div>


<!-- sửa dự an -->



<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">入密碼</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">號碼:</label>
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


<!-- quản lý -->

<div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">入密碼</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">號碼:</label>
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


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../codejavascript/script.js"></script>




<script type="text/javascript">
    document.getElementById("xacnhan3").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau3");
     var y = document.getElementById("span3");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1]; ?>'){
        window.location="../Controller/index.php?action=usermanager-cn&page=1";
    }else{
      document.getElementById("idmatkhau3").classList.add("is-invalid");
      document.getElementById("span3").innerText = '號碼号码不正确'
      document.getElementById("span3").style.color = 'red'
    }
    
}


</script>

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
<script type="text/javascript">
    function tableSearch1(){
        let input, filter, table, tr ,td, i, txtvalue;
        
        input = document.getElementById("myInput1");
        filter = input.value.toUpperCase();
        table = document.getElementById("idtable");
        tr = table.getElementsByTagName("tr");
        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
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
    document.getElementById("xacnhan").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau");
     var y = document.getElementById("span");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1] ?>'){
        // localStorage.setItem('key', '1997');
        // localStorage.removeItem(key);
        sessionStorage.setItem('key', '1997');
        window.location="../Controller/index.php?action=add-cn";

    }else{
      document.getElementById("idmatkhau").classList.add("is-invalid");
      document.getElementById("span").innerText = '號碼号码不正确'
      document.getElementById("span").style.color = 'red'
    }
    
}


</script>

<script type="text/javascript">
    var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
    this.classList.toggle("caret-down");

  });
}
</script>


<script type="text/javascript">



        function LINE1(){
         var x = document.querySelectorAll('.LINE1');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE2(){
         var x = document.querySelectorAll('.LINE2');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }


        function LINE3(){
         var x = document.querySelectorAll('.LINE3');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE4(){
         var x = document.querySelectorAll('.LINE4');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }


       function LINE5(){
         var x = document.querySelectorAll('.LINE5');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE6(){
         var x = document.querySelectorAll('.LINE6');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }  

         function LINE7(){
         var x = document.querySelectorAll('.LINE7');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE8(){
         var x = document.querySelectorAll('.LINE8');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }



         function LINE9(){
         var x = document.querySelectorAll('.LINE9');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE10(){
         var x = document.querySelectorAll('.LINE10');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }



        function LINE11(){
         var x = document.querySelectorAll('.LINE11');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE12(){
         var x = document.querySelectorAll('.LINE12');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }


        function LINE13(){
         var x = document.querySelectorAll('.LINE13');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE14(){
         var x = document.querySelectorAll('.LINE14');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }



       function LINE15(){
         var x = document.querySelectorAll('.LINE15');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE16(){
         var x = document.querySelectorAll('.LINE16');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }



       function LINE17(){
         var x = document.querySelectorAll('.LINE17');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE18(){
         var x = document.querySelectorAll('.LINE18');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }



       function LINE19(){
         var x = document.querySelectorAll('.LINE19');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE20(){
         var x = document.querySelectorAll('.LINE20');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }


        function LINE21(){
         var x = document.querySelectorAll('.LINE21');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE22(){
         var x = document.querySelectorAll('.LINE22');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }
    
    
        function LINE23(){
         var x = document.querySelectorAll('.LINE23');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE24(){
         var x = document.querySelectorAll('.LINE24');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }
    
       function LINE25(){
         var x = document.querySelectorAll('.LINE25');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE26(){
         var x = document.querySelectorAll('.LINE26');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }
    
        
        function LINE27(){
         var x = document.querySelectorAll('.LINE27');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }

        function LINE28(){
         var x = document.querySelectorAll('.LINE28');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }


        function LINE29(){
         var x = document.querySelectorAll('.LINE29');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }



        function LINE30(){
         var x = document.querySelectorAll('.LINE30');
         for (var i = 0; i < 10; i++) {
             x[i].style.display =='none' ? x[i].style.display='table-row' : x[i].style.display='none'
         }
    }




</script>




</body>
</html>