<?php 

include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

if(isset($_GET['id'])){
           $id = $_GET['id'];
           $table = "tiendomaymoc";
           $dataID = $db->getDataID($table,$id);

        $bophan = $dataID['bophan'];
        $tenmay = $dataID['tenmay'];
        $ngaybatdau = $dataID['ngaybatdau'];
        $ngaydukien = $dataID['ngaydukien'];
        $nhomthuchien = $dataID['nhomthuchien'];
        $mathe = $dataID['mathe'];
        $bophan = $dataID['bophan'];

        $tiendo = $dataID['tiendo'];
        $tiendomario = substr($tiendo, 0, -1);

        $oo = $dataID['tiendo'];
        $o = substr($oo, 0, -1);
       
       }


       // thêm máy

       if(isset($_POST['themmay']))
       {
          $tenmay1 = $_POST['tenmay1'];
          $ngaybatdau1 = $_POST['ngaybatdau1'];
          $ngaydukien1 = $_POST['ngaydukien1'];
          $mathe1 = $_POST['mathe1'];
          $nhomthuchien1 = $_POST['nhomthuchien1'];
          $tiendo1 = 0;

          $bophan = $dataID['bophan'];
          $line = $dataID['tenmay'];
          $ngaybatdau = $dataID['ngaybatdau'];
          $ngaydukien = $dataID['ngaydukien'];
          $nhomthuchien = $dataID['nhomthuchien'];
          $mathe = $dataID['mathe'];

          if($db->InsertTienDoMayMocLine($tenmay1,$tiendo1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$bophan,$nhomthuchien,$nhomthuchien1,$line,$mathe,$mathe1))
          {
               header('Refresh:0');
          }
       }



       if(isset($_POST['edit1']))
        {
            $tabletiendomaymoc1 = 'tiendomaymoc1';
            $tenmay1 = $_POST['tenmay1'];
            $ngaybatdau1 = $_POST['ngaybatdau1'];
            $ngaydukien1 = $_POST['ngaydukien1'];
            $nhomthuchien1 = $_POST['nhomthuchien1'];
            $mathe1 = $_POST['mathe1'];
            $id1 = $_POST['idd'];

            if($db->UpdateLine($tabletiendomaymoc1,$id1,$tenmay1,$ngaybatdau1,$ngaydukien1,$mathe1,$nhomthuchien1))
            {
                header('Refresh:0');
            }
        }




         if(isset($_POST['xoa']))
        {
            $tabletiendomaymoc1 = 'tiendomaymoc1';
            $idtiendomaymoc1 = $_POST['id'];
            if($db->Delete($idtiendomaymoc1,$tabletiendomaymoc1))
            {
               header('Refresh:0');
            }
        }





$employee = 'employee';
$mang = array();
$nhanvien = $db->getAllData($employee);
foreach ($nhanvien as $key) {
    $datamanhanvien = $key['employcode'];
    $datatennhanvien = $key['name'];
    $nhanviens = $datatennhanvien.'-'.$datamanhanvien;
    $mang[] = $nhanviens; 
}
$mang2 = count($mang);
      
       



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
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    <title>Biểu Đồ Tiến Độ</title>


  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../codejavascript/mario.css">
   <link rel="stylesheet" type="text/css" href="../codejavascript/stylebieudo.css">
   <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
   <script src="../codejavascript/jq1.js"></script>
   <style type="text/css">



.search-input{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input input{
            height: 55px;
            max-width: 450px;
            width: 100%;
            outline: none;
            border: none;
            border-radius: 5px;
            /*padding: 0 60px 0 20px;*/
            font-size: 18px;
            box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);
        }
        .search-input .autocom-box{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box li:hover{
            background: #efefef;
        }
        .search-input.active .autocom-box{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input.active .autocom-box li{
            display: block;
        }
        .search-input.activee .autocom-box li{
            display: block;
        }



        
          /*sửa công đoạn*/

        .search-input1{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-input1 input{
            height: 55px;
            max-width: 450px;
            width: 100%;
            outline: none;
            border: none;
            border-radius: 5px;
            /*padding: 0 60px 0 20px;*/
            font-size: 18px;
            box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);
        }
        .search-input1 .autocom-box1{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-box1 li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-box1 li:hover{
            background: #efefef;
        }
        .search-input1.active .autocom-box1{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-input1.active .autocom-box1 li{
            display: block;
        }
        .search-input1.activee .autocom-box1 li{
            display: block;
        }

   </style>
</head>
<body>

    <section class="packages" id="packages"style="">






      <div style="width: 100vw;">
        <div class="packages-divtable" style="height: 94vh;">
            <a data-bs-toggle="modal" data-bs-target="#addcongdoan" style="float: left;font-size: 50px;cursor: pointer;"><i class="fas fa-solid fa-plus"></i></a>

                <div style="display: inline-flex;height: 50px;margin-bottom: 20px;">
                    <a href="../Controller/index.php?action=test2#book"><img style="align-items: center;line-height: 50px;" height="50" width="50" src="../image/iconhome.png"></a>
                    <span class="div-table-span" style="align-items: center;line-height: 50px;margin-left: 20px;">Bảng Tiến Độ <?php echo $tenmay; ?></span>
                </div>
                <table class="table" style="">
              <thead>
                <tr>
                    <th style="line-height: 100px;" class="col-2">Tên Máy</th>    
                    <th style="line-height: 100px;" class="col-1">Tiến Độ</th>
                    <th style="line-height: 100px;" class="col-1">Ngày Bắt Đầu</th>
                    <th style="line-height: 100px;" class="col-1">Ngày Dự Kiến</th>
                    <th style="line-height: 100px;" class="col-1">Bộ Phận</th>
                    <th style="line-height: 100px;" class="col-2">Nhóm Thực Hiện</th>
                    <th style="line-height: 100px;" class="col-1">#</th>
                </tr>
              </thead>
           <tbody>
          <?php 
              $tabletiendomaymoc1 = 'tiendomaymoc1';
              $bophan = $dataID['bophan'];
              $tenmay = $dataID['tenmay'];
              $ngaybatdau = $dataID['ngaybatdau'];
              $ngaydukien = $dataID['ngaydukien'];
              $nhomthuchien = $dataID['nhomthuchien'];
              $mathe = $dataID['mathe'];
              $bophan = $dataID['bophan'];
              $datatenmayline = $db->getDataTenMayLine($tabletiendomaymoc1,$mathe,$nhomthuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan);


             if($datatenmayline > 0)
             {
             foreach ($datatenmayline as $value) {
                
             ?>
            <tr style="background: white;height: 50px;text-align:center;">
                <td style=''> <a style="text-decoration: none;" href="../Controller/index.php?action=bieudoline1&id=<?php echo $value['id']; ?>"><?php echo $value['tenmay']; ?></a></td>  
                <td style=''><?php echo $value['tiendo']; ?></td>
                <td style=''><?php echo $value['ngaybatdau1']; ?></td>

                <td style=''><?php echo $value['ngaydukien1']; ?></td>
                

                <td style='font-weight: bold;'><?php echo $value['bophan']; ?></td>
                <td style='font-weight: bold;'><?php echo $value['nhomthuchien1']; ?></td>
           




                <td style='font-size: 20px; border: 1px solid; '>
                    <a style="text-decoration: none;margin-right: 30px"data-bs-toggle="modal" data-bs-target="#edit<?php echo $value['id']; ?>" href="" ><i style="font-size: 30px;" class="fa-solid fa-pen-to-square"></i></a>
          
                    <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $value['id']; ?>" href="" title="xóa"><i style="font-size: 30px;" class="fa-solid fa-trash-can"></i></a>
                </td>   

            </tr>
           <?php } } ?>
            </tbody>
        </table>
          </div>
            
            </div>
</section>
</body>







<!-- edit -->

<?php 
if($datatenmayline > 0)
{
foreach ($datatenmayline as $value) {

 ?>

<form method="POST" action="">
<div class="modal fade" id="edit<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700">Sửa Tiến Độ <?php echo $value['tenmay']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Tên Công Đoạn:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="tenmay1" class="form-control" value="<?php echo $value['tenmay']; ?>">
            
            <label for="recipient-name" class="col-form-label">Ngày Bắt Đầu:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaybatdau1" class="form-control" value="<?php echo $value['ngaybatdau1']; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="date" style="margin: 20px 0;height: 50px"  required ="required" name="ngaydukien1" class="form-control" value="<?php echo $value['ngaydukien1']; ?>">

            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="mathe1" id="mathe1" class="form-control" value="<?php echo $value['mathe1']; ?>">

            <label for="recipient-name" class="col-form-label">Ngày Dự Kiến:</label>

            <input type="text" style="margin: 20px 0;height: 50px"  required ="required" name="nhomthuchien1" id="nhomthuchien1" class="form-control" value="<?php echo $value['nhomthuchien1']; ?>">


            <div class="search-input1" style="text-align: center;">
                   <input type="text" id="inputsearch1" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box1">
                   </div>
                   <span id="clear"></span>
            </div>
 
            <input type="hidden" name="idd" value="<?php echo $value['id']; ?>">
              
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="edit1" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } } ?>





<!-- xóa -->

<?php 
if($datatenmayline > 0)
{
foreach ($datatenmayline as $value) {

 ?>
<form method="POST" action="">
<div class="modal fade" id="exampleModal1<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Công Đoạn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
        Bạn Chắc Chắn Muốn Xóa Không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
        <button type="submit" name="xoa" class="btn btn-primary">Đồng Ý</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php } } ?>



    
<!-- thêm May Line -->


<form method="POST" action="">
<div class="modal fade" id="addcongdoan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Máy <?php echo $tenmay; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tên Máy:</label>
            <input type="text" name="tenmay1" class="form-control" id="recipient-name">
          </div>

           <input type="hidden" name="tenmay" value="<?php echo $dataID['tenmay']; ?>">
           <input type="hidden" name="ngaybatdau" value="<?php echo $dataID['ngaybatdau']; ?>">
           <input type="hidden" name="ngaydukien" value="<?php echo $dataID['ngaydukien']; ?>">
           <input type="hidden" name="mathe" value="<?php echo $dataID['mathe']; ?>">
           <input type="hidden" name="bophan" value="<?php echo $dataID['bophan']; ?>">
           <input type="hidden" name="nhomthuchien" value="<?php echo $dataID['nhomthuchien']; ?>">

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Ngày Bắt Đầu:</label>
             <input type="date" name="ngaybatdau1" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">NgàyDự Kiến:</label>
             <input type="date" name="ngaydukien1" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mã Thẻ:</label>
            <input type="text" name="mathe1" class="form-control" id="matheId">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nhóm Thực Hiện:</label>
            <input type="text" name="nhomthuchien1" class="form-control" id="nhomthuchienId">
          </div>
          <label for="recipient-name" class="col-form-label">Tìm Kiếm Mã Tên Nhân Viên:</label>
          <div class="search-input" style="text-align: center;">
                   <input type="text" id="inputsearch" autocomplete="off" placeholder="Tim Kiếm Tên...">
                   <div class="autocom-box">
                   </div>
                   <span id="clear"></span>
               </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" name="themmay" class="btn btn-primary">Xác Nhận</button>
      </div>
    </div>
  </div>
</div>
</form>










<script type="text/javascript">
    let suggettion111 = new Array();
    var length = "<?php $mang2; ?>";

    var a = "<?php
         for ($i=0; $i < $mang2; $i++) { 
             echo $mang[$i].','; 
         }
         
          ?>";
  
  suggettion111.push(...suggettion111,a);

  var suggettion = suggettion111[0].split(","); 
  
</script>



<!-- Thêm Máy Trong Line -->




 <script type="text/javascript">
       let searchWrapper = document.querySelector(".search-input")
       let inputBox = document.querySelector("#inputsearch")
       let suggBox = document.querySelector(".autocom-box")
       let nhomthuchien = document.querySelector('#nhomthuchienId')
       let mathe = document.querySelector('#matheId')
       var numberStore = [];
       var ma = [];

       inputBox.onkeyup = (e) => {
         let userData = e.target.value;
         console.log(userData)
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper.classList.add("active")
            showSuggettions(emptyArray);
            let allList = suggBox.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select(this)")
            }
         }else{
            searchWrapper.classList.remove("active")
         }
       }

       function select(element){
        let selectUserData = element.textContent;
        // inputBox.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore = [...numberStore, cat];
        const cat1 = selectUserData.slice(-8)
        ma = [...ma, cat1];
        mathe.value = ma;
        nhomthuchien.value = numberStore;
        // inputBox.value = ;
       }

       function showSuggettions(list){
        let listData;
        if(!list.length){
             userValue = inputBox.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox.innerHTML = listData;
       }
   </script>




   <!-- sửa công đoạn -->


 <script type="text/javascript">
       let searchWrapper1 = document.querySelector(".search-input1")
       let inputBox1 = document.querySelector("#inputsearch1")
       let suggBox1 = document.querySelector(".autocom-box1")
       let nhomthuchien1 = document.querySelector('#nhomthuchien1')
       let mathe1 = document.querySelector('#mathe1')
       var numberStore1 = [];
       var ma1 = [];

       inputBox1.onkeyup = (e) => {
         let userData = e.target.value;
         let emptyArray = [];
         if(userData){
            emptyArray = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            });
         emptyArray =  emptyArray.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper1.classList.add("active")
            showSuggettions1(emptyArray);
            let allList = suggBox1.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select1(this)")
            }
         }else{
            searchWrapper1.classList.remove("active")
         }
       }

       function select1(element){
        let selectUserData1 = element.textContent;
        // inputBox1.value = selectUserData1;
        const cat = selectUserData1.slice(0, -9)
        numberStore1 = [...numberStore1, cat];
        const cat1 = selectUserData1.slice(-8)
        ma1 = [...ma1, cat1];
        mathe1.value = ma1;
        nhomthuchien1.value = numberStore1;
        // inputBox1.value = ;
       }

       function showSuggettions1(list){
        let listData;
        if(!list.length){
             userValue = inputBox1.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox1.innerHTML = listData;
       }
   </script>






<script type="text/javascript">

    var a = "<?php echo $tiendomario; ?>";
    var mario = document.getElementById('mario');
    var mario2 = document.getElementById('mario2');

    if(a > 20 && a <= 40)
    {

        mario.classList.toggle("mario1");
        mario2.classList.toggle("mario22");
    }

    if(a > 40 && a <= 60)
    {
        mario.classList.add("mario3");
        mario2.classList.add("mario23");
    }

    if(a > 60 && a <= 80)
    {
        mario.classList.add("mario4");
        mario2.classList.add("mario24");
    }

    if(a > 80 && a < 100)
    {
        mario.classList.add("mario5");
        mario2.classList.add("mario25");
    }

    if(a <= '20%')
    {

    }
</script>   






<script type="text/javascript">
    document.getElementById("xacnhan2").addEventListener("click", myFunction);

function myFunction() {

     var x = document.getElementById("idmatkhau2");
     var y = document.getElementById("span2");
  x.value = x.value.toUpperCase();
    if(x.value == '<?php echo $matkhau1[1]; ?>'){
        window.location="../Controller/index.php?action=edit&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau2").classList.add("is-invalid");
      document.getElementById("span2").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span2").style.color = 'red'
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
        window.location="../Controller/index.php?action=delete&id=<?php echo $dataID['id']; ?>";
    }else{
      document.getElementById("idmatkhau3").classList.add("is-invalid");
      document.getElementById("span3").innerText = 'Mật Khẩu Không Đúng'
      document.getElementById("span3").style.color = 'red'
    }
    
}


</script>




<!--         <script type="text/javascript">
          //For adding dots to loading
window.onload = function(){
    var loading = document.getElementById("loading");
    
    function addRedDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span></h1>";
        }
        function addYellowDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span><span class='dot-yellow'>.</span></h1>";
        }
        function addGreenDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span><span class='dot-yellow'>.</span><span class='dot-green'>.</span></h1>";
        }
        function removeDots(i) {
        i.innerHTML = "<h1>LOADING</h1>";
        }
    
    function timedDots(i) {
    
        setTimeout(function(){
            addRedDot(i)
        }, 1000);
        setTimeout(function(){
            addYellowDot(i)
        }, 2000);
        setTimeout(function(){
            addGreenDot(i)
        }, 3000);
        setTimeout(function(){
            removeDots(i)
        }, 4000);
        
        }
    
    setInterval(function(){
        timedDots(loading)
    }, 4000);
}

        </script> -->


</body>
</html>