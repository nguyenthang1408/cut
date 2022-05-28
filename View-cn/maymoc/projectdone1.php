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
$tiendomaymoc1 = 'tiendomaymoc1';
$data1 = $db->getAllData($table);
$data2 = $db->getAllData($tiendomaymoc1);
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

    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">

    <script type="text/javascript" src="../bootstrap-5/js/bootstrap.min.js"></script>

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
</head>
<body>

<section class="book" id="book" style="">


    <div class="row" style="" id="divtimkiem">
<!--         <h1 class="heading btn col-12" id="headingtieude">
            <span style="">A</span>
            <span style="">E</span>
            <span style="">C</span>
        </h1> -->
                <div class="row-header">   
                             
                       
                      <!-- <input type="text" name="myInput" class="" id="myInput" onkeyup="tableSearch()" placeholder="Tìm Kiếm Tên Máy" style=""> -->
                     <!--  <input type="text" name="myInput" class="classinput" id="myInput1" onkeyup="tableSearch1()" placeholder="Tìm Kiếm Theo Tiến Độ" style=""> -->
                </div>
                             

            <div style="" class="col-12 table" id="tableselectdata" style="">
            <div style="" class="div-table-div" >
                <div style="height:auto;width:95vw;top: 0px; text-align: center;display: inline-block;">
                                <!-- <a class="" href="../Controller/index.php?action=add" id="addmay" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: left;"><i style="" class="fas fa-solid fa-plus"></i></a> -->
                                <a class="" href="../Controller/index.php?action=add-cn" id="addmay" style="float: left;"><i style="" class="fas fa-solid fa-plus"></i></a>

                                
                                    <h2 style="">
                                        <a href="../Controller/index.php?action=test2-cn#divtimkiem">
                                         <img style="" src="../image/iconhome.png">
                                         </a>
                                         已完成
                                    </h2> 
                               
                               <a style="float: right;" data-bs-toggle="modal" data-bs-target="#edit123" href=""><i class="fa-solid fa-key"></i></a>
                                

                 </div>  
                <span class="div-table-span" style="font-size: 40px;font-weight: bold;"></span>
            <table style="" name="tabletable" id="idtable" class="table-hover table">
                 <thead>
            <tr class="tr" style="">
               <!--  <th style="font-size: 20px; text-align: center; width: 15%;" id="idth">#</th> -->
                <th class="col-1 col-xs-1"id="idth" style="">機台名稱</th>  

                <th class="col-1 col-xs-1"style="">進度</th>
                <th class="col-1 col-xs-1"style="">開始日期</th>
                <th class="col-1 col-xs-1"style="">預期日期</th>
                <th class="col-1 col-xs-1"style="">部門</th>
                <th class="col-3 col-xs-3"style="">成員</th>
            </tr>
        </thead>
        <tbody>

            <!-- tiendomaymoc -->

         <?php 
           $stt = 0;
           if($data1 > 0)
           {


           foreach ($data1 as $value) {
                $tiendophantram = $value['tiendo'];
                $tiendo = substr($tiendophantram, 0, -1);
                  if ( $tiendo == 100 )
                {  $stt++;
           ?>
           
            <tr style="background: white; text-align: center;">
                

                <td style='border: 3px solid #d5e0e0;' class="col-1 col-xs-1"> 
                    <a style="" href=""> <?php echo $value['tenmay'] ?> 



                    </a> 
                </td>

                <td style='border: 3px solid #d5e0e0;' class="col-1 col-xs-1">

                  <?php echo $value['tiendo']; ?>

                </td> 
                

                <td style='border: 3px solid #d5e0e0; ' class="col-1 col-xs-1"><?php echo $value['ngaybatdau']; ?></td>
                <td style=' border: 3px solid #d5e0e0;' class="col-1 col-xs-1"><?php echo $value['ngaydukien']; ?></td>
                <td style=' border: 3px solid #d5e0e0;' class="col-1 col-xs-1"><?php echo $value['bophan']; ?></td>
                <td style=' border: 3px solid #d5e0e0;' class="col-1 col-xs-1 nhomthuchien"><?php echo $value['nhomthuchien']; ?></td>




                         
            </tr>

            <?php 
                   } 
               }
                
            }else
            {
                echo "<span style='font-size: 10px; color:red;margin-left: 45%;'>Không có Dữ Liệu Aps</span>";
            }
            ?>

            <!-- tiendomaymoc1 -->

             <?php 
           if($data2 > 0)
           {
           foreach ($data2 as $value) {
                $tiendophantram = $value['tiendo'];
                $tiendo = substr($tiendophantram, 0, -1);
                  if ( $tiendo == 100 )
                { 
                    $stt++;
           ?>
           
            <tr style="background: white; text-align: center;">
                    <td style='border: 3px solid #d5e0e0;' class="col-1 col-xs-1"> 
                        <a style="" href=""> <?php echo $value['tenmay'] ?> 



                      </a> 
                  </td>

                <td style='border: 3px solid #d5e0e0; ' class="col-1 col-xs-1">

                  <?php echo $value['tiendo']; ?>

                </td> 
                

                <td style=' border: 3px solid #d5e0e0;' class="col-1 col-xs-1"><?php echo $value['ngaybatdau']; ?></td>
                <td style=' border: 3px solid #d5e0e0;' class="col-1 col-xs-1"><?php echo $value['ngaydukien']; ?></td>
                <td style=' border: 3px solid #d5e0e0;' class="col-1 col-xs-1"><?php echo $value['bophan']; ?></td>
                <td style='border: 3px solid #d5e0e0; ' class="col-1 col-xs-1 nhomthuchien"><?php echo $value['nhomthuchien']; ?></td>




                         
            </tr>

            <?php 
                   } 
               }
                
            }else
            {
                echo "<span style='font-size: 10px; color:red;margin-left: 45%;'>Không có Dữ Liệu Aps</span>";
            }
            ?>

            </tbody>
        </table>
            
            </div>
       

    </div>

</section>


<!-- thêm dự án -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Mật Khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mật Khẩu:</label>
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
        <button type="button" id="xacnhan" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>





<!-- điền Mật Khẩu -->



<div class="modal fade" id="edit123" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Mật Khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mật Khẩu:</label>
            <input type="password" class="form-control" id="idmatkhau4">
          </div>
          <div>
              <span id="span4">
                  
              </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="xacnhan4" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>





<!-- sửa dự an -->



<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Mật Khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mật Khẩu:</label>
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
        <button type="button" id="xacnhan2" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>


<!-- quản lý -->

<div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập Mật Khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mật Khẩu:</label>
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
        <button type="button" id="xacnhan3" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../codejavascript/script.js"></script>



<script type="text/javascript">
    document.getElementById("xacnhan4").addEventListener("click", myFunction1);

function myFunction1() {

     var x = document.getElementById("idmatkhau4");
     var y = document.getElementById("span4");
  x.value = x.value.toUpperCase();
  var b = "<?php echo $matkhau1[1]; ?>";
  var c = b.toUpperCase();

    if(x.value == c){

        window.location="../Controller/index.php?action=projectdone-cn#divtimkiem";
    }else{
      document.getElementById("idmatkhau4").classList.add("is-invalid");
      document.getElementById("span4").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span4").style.color = 'red'
    }
    
}


</script>





<script type="text/javascript">
    document.getElementById("xacnhan3").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau3");
     var y = document.getElementById("span3");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1]; ?>'){
        window.location="../Controller/index.php?action=usermanager&page=1";
    }else{
      document.getElementById("idmatkhau3").classList.add("is-invalid");
      document.getElementById("span3").innerText = 'Mật Khẩu Không Đúng'
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
        let input, filter, table, tr ,td, i, txtvalue;
        
        input = document.getElementById("myInput1");
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
    document.getElementById("xacnhan").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau");
     var y = document.getElementById("span");
  x.value = x.value.toUpperCase();
     var matkhau =  "<?php echo $matkhau1[1] ?>";
        matkhau1 = matkhau.toUpperCase();
    if(x.value == matkhau1){
        // localStorage.setItem('key', '1997');
        // localStorage.removeItem(key);
        sessionStorage.setItem('key', '1997');
        window.location="../Controller/index.php?action=add";

    }else{
      document.getElementById("idmatkhau").classList.add("is-invalid");
      document.getElementById("span").innerText = 'Mật Khẩu Không Đúng'
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