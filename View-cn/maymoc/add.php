<?php

include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

if(isset($_POST['add']))
        {
            $tenmay = $_POST['tenmayy'];
            $tiendo = '0%';
            $ngaybatdau = $_POST['ngaybatdau'];
            $ngaydukien = $_POST['ngaydukien'];
            $nhomthuchien = $_POST['nhomthuchien'];
            $mathe = $_POST['mathe'];
            $bophan = $_POST['bophan'];
            $dfm = '0%';
            $dtod = '0%';
            $giacongvadathang = '0%';
            $lapdatvachinhmay = '0%';
            $buyoff = '0%';
            


            $congdoan = 'congdoan';

            $tenmay1 = 0;
            $ngaybatdau1 = 0;
            $ngaydukien1 = 0;
            $tonggio = 0;
            $giotrongngay = 0;
            $hoanthanh = 0;
            $phantram = 0;
            $mathe1 = 0;
            $tangca = 0;
            $nguoithuchien1 = 0;
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $thoigian =  Date("Y-m-d h:i:s a", time());


            
            if($db->InsertData($tenmay,$tiendo,$ngaybatdau,$ngaydukien,$bophan,$nhomthuchien,$mathe))
            {
                header('Location: ../Controller/index.php?action=test2-cn');
            }
        }
if(isset($_POST['addluu']))
{
    $tenmay = $_POST['tenmay'];
    $tiendo = '0%';
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngaydukien = $_POST['ngaydukien'];
    $nhomthuchien = $_POST['nhomthuchienn'];
    $mathe = $_POST['mathee'];
    $bophan = $_POST['bophan'];






    if($db->InsertData($tenmay,$tiendo,$ngaybatdau,$ngaydukien,$bophan,$nhomthuchien,$mathe))
    {
        header('Location: ../Controller/index.php?action=test2-cn');
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



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Th??m D??? ??n</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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


        

        .search-line{
            max-width: 450px;
            position: relative;
            background: #fff;
            /*width: 100%;*/    
            border-radius: 5px;
            box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
        }
        .search-line input{
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
        .search-line .autocom-line{
            padding: 0px;
            max-height: 280px;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }
        .autocom-line li{
            list-style: none;
            padding:  8px 12px;
            width: 100%;
            cursor: default;
            border-radius: 3px;
            display: none;
        }
        .autocom-line li:hover{
            background: #efefef;
        }
        .search-line.active .autocom-line{
            padding: 10px 8px;
            opacity: 1;
            pointer-events: auto;
        }
        .search-line.active .autocom-line li{
            display: block;
        }
        .search-line.activee .autocom-line li{
            display: block;
        }


       
    </style>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body style="background:#c7deff">

   <a href="../Controller/index.php?action=test2-cn#tableselectdata" style="font-weight: bold; border: 1px; text-decoration: none;" class="btn btn-success btn-lg aec">??????</a>
<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="">
  <li class="nav-item" role="presentation" >
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="font-size:30px">??????</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="font-size:30px">?????? Line</button>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent" style="">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <section class="book" id="book">
    <div class="row" style=" border-radius: 10px;">
     <form action="" method="POST">
        <ul class="btn justify-content-center" style="font-size: 50px; display: inline-block; width: 100%;margin-top: 10px;" >
                <li"><a href="" style="text-decoration: none;" class="text-success">??????</a></li>
              </ul>
           <div class="col-12" style="">
           </div>
            <div class="inputBox" style=" width: 80%;">
                <input type="text" name="tenmayy" id="tenmayy" placeholder="????????????" style="width: 80%;text-align: center;margin-left: 21%; margin-top: 0%; font-size: 40px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);border-radius: 20px;">
            </div>
            <div style="text-align: center;">
                <span id="idspan1"></span>
            </div>
            <div class="inputBox" style=" width: 80%;">
                <input type="date" name="ngaybatdau" placeholder="????????????" style="width: 80%;text-align: center;margin-left: 21%; margin-top: 3%;font-size: 40px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);border-radius: 20px;">
            </div>
            <div class="inputBox" style=" width: 80%;">
                <input type="date" name="ngaydukien" placeholder="????????????" style="width: 80%;text-align: center;margin-left: 21%;margin-top: 3%;font-size: 40px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);border-radius: 20px;">
            </div>
            <div class="inputBox" style=" width: 80%;">
                <select class="form-control" name="bophan" style="width: 80%;margin-left: 21%; text-align: center;font-size: 30px; margin-top: 3%;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7); border-radius: 20px;">
                    <option value="AEC" style="font-size: 20px;">AEC</option>
                    <option value="TSC" style="font-size: 20px;">TSC</option>
                    <option value="APS" style="font-size: 20px;">APS</option>
                </select>
            </div>
            <div class="inputBox" style=" width: 80%;">
                <input type="text" name="nhomthuchien" id="nhomthuchienId" placeholder="??????" style="width: 35%;text-align: center;margin-left: 21%;margin-top: 3%;font-size: 40px;border-radius: 20px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);">
                <input type="text" name="mathe" id="matheId" placeholder="??????" style="width: 35%;text-align: center;margin-top: 3%;font-size: 40px;float: right;border-radius: 20px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);">
                   <div class="search-input" style="margin-top: 3%;margin-left: 49%;">
                   <input type="text" id="inputsearch" placeholder="Tim Kiem Ma The..."autocomplete="off">
                   <div class="autocom-box">
                   </div>
                   <div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
               </div>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-success form-control" name="add" value="?????????" style="margin-top: 20px;width: auto;font-size: 30px; margin-bottom: 20px; ">?????????</button>
            </div>

        </form>
        <?php
           if(isset($thanhcong)&&in_array('thanh_cong',$thanhcong))
           {
            echo "<p style='color: green;text-align:center'>?????????</p>";
           }
        ?>
    </div>
</section>
  </div>


  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <section class="book" id="book">
    <div class="row" style=" border-radius: 10px;">
     <form action="" method="POST">
        <ul class="btn justify-content-center" style="font-size: 50px; display: inline-block; width: 100%;margin-top: 10px;" >
                <li"><a href="" style="text-decoration: none;" class="text-success">?????? Line</a></li>
            </ul>
           <div class="col-12" style="">
           </div>
            <div class="inputBox" style=" width: 80%;">
                <input type="text" name="tenmay" id="idtenmay" placeholder="?????? Line" style="width: 80%;text-align: center;margin-left: 22%; margin-top: 0%; font-size: 40px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);border-radius: 20px;">
            </div>
            <div style="text-align: center;">
                <span id="idspan"></span>
            </div>

            <div class="inputBox" style=" width: 80%;">
                <input type="date" name="ngaybatdau" placeholder="????????????" style="width: 80%;text-align: center;margin-left: 22%; margin-top: 3%;font-size: 40px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);border-radius: 20px;">
            </div>
            <div class="inputBox" style=" width: 80%;">
                <input type="date" name="ngaydukien" placeholder="????????????" style="width: 80%;text-align: center;margin-left: 22%;margin-top: 3%;font-size: 40px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);border-radius: 20px;">
            </div>
            <div class="inputBox" style=" width: 80%;">
                <select class="form-control" name="bophan" style="width: 80%;margin-left: 22%; text-align: center;font-size: 30px; margin-top: 3%; box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);border-radius: 20px;">
                    <option value="AEC" style="font-size: 30px;">AEC</option>
                    <option value="TSC" style="font-size: 30px;">TSC</option>
                    <option value="APS" style="font-size: 30px;">APS</option>
                </select>
            </div>
            <div class="inputBox" style=" width: 80%;">
                <input type="text" name="nhomthuchienn" id="linenhomthuchien" placeholder="??????" style="width: 35%;text-align: center;margin-left: 21%;margin-top: 3%;font-size: 40px;border-radius: 20px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);">
                <input type="text" name="mathee" id="linemathe" placeholder="??????" style="width: 35%;text-align: center;margin-top: 3%;font-size: 40px;float: right;border-radius: 20px;box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.7);">
                   <div class="search-line" style="margin-top: 3%;margin-left: 49%;">
                   <input type="text" id="search-mathe" placeholder="Tim Kiem Ma The..."autocomplete="off">
                   <div class="autocom-line">
                   </div>
                   <span id="clear"></span>
                   <div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
               </div>
            </div>

            

             <div style="text-align: center;">
                 <button type="submit" class="btn btn-success" name="addluu" value="?????????" style="margin-top: 20px;margin-bottom: 20px; width: auto;font-size: 30px;">?????????</button>
             </div>

        </form>
        <?php
           if(isset($thanhcong)&&in_array('thanh_cong',$thanhcong))
           {
            echo "<p style='color: green;text-align:center'>?????????</p>";
           }
        ?>
    </div>
</section>
  </div>
</div>

<!-- th??m may -->

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

<!-- th??m line -->

<script type="text/javascript">
       let searchWrapperr = document.querySelector(".search-line")
       let inputBoxx = document.querySelector("#search-mathe")
       let suggBoxx = document.querySelector(".autocom-line")
       let nhomthuchienn = document.querySelector('#linenhomthuchien')
       let mathee = document.querySelector('#linemathe')
       var numberStoree = [];
       var maa = [];

       inputBoxx.onkeyup = (e) => {
         let userDataa = e.target.value;
         let emptyArrayy = [];
         if(userDataa){
            emptyArrayy = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa.toLocaleLowerCase());
            });
         emptyArrayy =  emptyArrayy.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapperr.classList.add("active")
            showSuggettionss(emptyArrayy);
            let allList = suggBoxx.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select1(this)")
            }
         }else{
            searchWrapperr.classList.remove("active")
         }
       }

       function select1(element){
        let selectUserData = element.textContent;
        // inputBoxx.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStoree = [...numberStoree, cat];
        const cat1 = selectUserData.slice(-8)
        maa = [...maa, cat1];
        mathee.value = maa;
        nhomthuchienn.value = numberStoree;
        // inputBoxx.value = '';
       }

       function showSuggettionss(list){
        let listData;
        if(!list.length){
             userValue = inputBoxx.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBoxx.innerHTML = listData;
       }
   </script>

<!-- th??m may 1 -->

  <script type="text/javascript">
       let searchWrapper1 = document.querySelector("#inputmayline1")
       let inputBox1 = document.querySelector("#searchinputmayline1")
       let suggBox1 = document.querySelector("#divmayline1")
       let mathe1 = document.querySelector('#nhomthuchienmay1')
       let nhomthuchien1 = document.querySelector('#mathe1')
       var numberStore11 = [];
       var ma1 = [];
       var nhom1 = [];

       inputBox1.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            // searchWrapper1.classList.add("active")
            suggBox1.style.display = 'block'
            showSuggettions1(emptyArrayy1);
            let allList = suggBox1.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select11(this)")
            }
         }else{
            // searchWrapper1.classList.remove("active")
            suggBox1.style.display = 'none'
         }
       }

       function select11(element){
        let selectUserData = element.textContent;
        // inputBox1.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore11 = [...numberStore11, cat];
        const cat1 = selectUserData.slice(-8)
        ma1 = [...ma1, cat];
        nhom1 = [...nhom1, cat1];
        mathe1.value = ma1;
        nhomthuchien1.value = nhom1;
        // inputBox1.value = '';
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

<!-- th??m m??y 2 -->

   <script type="text/javascript">
       let searchWrapper2 = document.querySelector("#inputmayline2")
       let inputBox2 = document.querySelector("#searchinputmayline2")
       let suggBox2 = document.querySelector("#divmayline2")
       let mathe2 = document.querySelector('#nhomthuchienmay2')
       let nhomthuchien2 = document.querySelector('#mathe2')
       var numberStore2 = [];
       var ma2 = [];
       var nhom2 = [];

       inputBox2.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper2.classList.add("active")
            suggBox2.style.display = 'block'
            showSuggettions2(emptyArrayy1);
            let allList = suggBox2.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select2(this)")
            }
         }else{
            searchWrapper2.classList.remove("active")
            suggBox2.style.display = 'none'
         }
       }

       function select2(element){
        let selectUserData = element.textContent;
        // inputBox2.value = selectUserData;
        let cat = selectUserData.slice(0, -9)
        numberStore2 = [...numberStore2, cat];
        let cat1 = selectUserData.slice(-8)
        ma2 = [...ma2, cat];
        nhom2 = [...nhom2, cat1];
        mathe2.value = ma2;
        nhomthuchien2.value = nhom2;
        // inputBox2.value = '';
       }

       function showSuggettions2(list){
        let listData;
        if(!list.length){
             userValue = inputBox2.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox2.innerHTML = listData;
       }
   </script>

<!-- th??m m??y 3 -->


<script type="text/javascript">
       let searchWrapper3 = document.querySelector("#inputmayline3")
       let inputBox3 = document.querySelector("#searchinputmayline3")
       let suggBox3 = document.querySelector("#divmayline3")
       let mathe3 = document.querySelector('#nhomthuchienmay3')
       let nhomthuchien3 = document.querySelector('#mathe3')
       var numberStore3 = [];
       var ma3 = [];
       var nhom3 = [];

       inputBox3.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper3.classList.add("active")
            suggBox3.style.display = 'block'
            showSuggettions3(emptyArrayy1);
            let allList = suggBox3.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select3(this)")
            }
         }else{
            searchWrapper3.classList.remove("active")
            suggBox3.style.display = 'none'
         }
       }

       function select3(element){
        let selectUserData = element.textContent;
        // inputBox3.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore3 = [...numberStore3, cat];
        const cat1 = selectUserData.slice(-8)
        ma3 = [...ma3, cat];
        nhom3 = [...nhom3, cat1];
        mathe3.value = ma3;
        nhomthuchien3.value = nhom3;
        // inputBox3.value = '';
       }

       function showSuggettions3(list){
        let listData;
        if(!list.length){
             userValue = inputBox3.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox3.innerHTML = listData;
       }
   </script>


   <!-- th??m m??y 4 -->


<script type="text/javascript">
       let searchWrapper4 = document.querySelector("#inputmayline4")
       let inputBox4 = document.querySelector("#searchinputmayline4")
       let suggBox4 = document.querySelector("#divmayline4")
       let mathe4 = document.querySelector('#nhomthuchienmay4')
       let nhomthuchien4 = document.querySelector('#mathe4')
       var numberStore4 = [];
       var ma4 = [];
       var nhom4 = [];

       inputBox4.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper4.classList.add("active")
            suggBox4.style.display = 'block'
            showSuggettions4(emptyArrayy1);
            let allList = suggBox4.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select4(this)")
            }
         }else{
            searchWrapper4.classList.remove("active")
            suggBox4.style.display = 'none'
         }
       }

       function select4(element){
        let selectUserData = element.textContent;
        // inputBox4.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore4 = [...numberStore4, cat];
        const cat1 = selectUserData.slice(-8)
        nhom4 = [...nhom4, cat1];
        ma4 = [...ma4, cat];
        mathe4.value = ma4;
        nhomthuchien4.value = nhom4;
        // inputBox4.value = '';
       }

       function showSuggettions4(list){
        let listData;
        if(!list.length){
             userValue = inputBox4.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox4.innerHTML = listData;
       }
   </script>

  
  <!-- th??m m??y 5 -->


  <script type="text/javascript">
       let searchWrapper5 = document.querySelector("#inputmayline5")
       let inputBox5 = document.querySelector("#searchinputmayline5")
       let suggBox5 = document.querySelector("#divmayline5")
       let mathe5 = document.querySelector('#nhomthuchienmay5')
       let nhomthuchien5 = document.querySelector('#mathe5')
       var numberStore5 = [];
       var ma5 = [];
       var nhom5 = [];

       inputBox5.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper5.classList.add("active")
            suggBox5.style.display = 'block'
            showSuggettions5(emptyArrayy1);
            let allList = suggBox5.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select5(this)")
            }
         }else{
            searchWrapper5.classList.remove("active")
            suggBox5.style.display = 'none'
         }
       }

       function select5(element){
        let selectUserData = element.textContent;
        // inputBox5.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore5 = [...numberStore5, cat];
        const cat1 = selectUserData.slice(-8)
        ma5 = [...ma5, cat];
        nhom5 = [...nhom5, cat1];
        mathe5.value = ma5;
        nhomthuchien5.value = nhom5;
        // inputBox5.value = '';
       }

       function showSuggettions5(list){
        let listData;
        if(!list.length){
             userValue = inputBox5.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox5.innerHTML = listData;
       }
   </script>


<!-- th??m m??y 6 -->


<script type="text/javascript">
       let searchWrapper6 = document.querySelector("#inputmayline6")
       let inputBox6 = document.querySelector("#searchinputmayline6")
       let suggBox6 = document.querySelector("#divmayline6")
       let mathe6 = document.querySelector('#nhomthuchienmay6')
       let nhomthuchien6 = document.querySelector('#mathe6')
       var numberStore6 = [];
       var ma6 = [];
       var nhom6 = [];

       inputBox6.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper6.classList.add("active")
            suggBox6.style.display = 'block'
            showSuggettions6(emptyArrayy1);
            let allList = suggBox6.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select6(this)")
            }
         }else{
            searchWrapper6.classList.remove("active")
            suggBox6.style.display = 'none'
         }
       }

       function select6(element){
        let selectUserData = element.textContent;
        // inputBox6.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore6 = [...numberStore6, cat];
        const cat1 = selectUserData.slice(-8)
        ma6 = [...ma6, cat];
        nhom6 = [...nhom6, cat1];
        mathe6.value = ma6;
        nhomthuchien6.value = nhom6;
        // inputBox6.value = '';
       }

       function showSuggettions6(list){
        let listData;
        if(!list.length){
             userValue = inputBox6.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox6.innerHTML = listData;
       }
   </script>



<!-- th??m m??y 7 -->


<script type="text/javascript">
       let searchWrapper7 = document.querySelector("#inputmayline7")
       let inputBox7 = document.querySelector("#searchinputmayline7")
       let suggBox7 = document.querySelector("#divmayline7")
       let mathe7 = document.querySelector('#nhomthuchienmay7')
       let nhomthuchien7 = document.querySelector('#mathe7')
       var numberStore7 = [];
       var ma7 = [];
       var nhom7 = [];

       inputBox7.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper7.classList.add("active")
            suggBox7.style.display = 'block'
            showSuggettions7(emptyArrayy1);
            let allList = suggBox7.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select7(this)")
            }
         }else{
            searchWrapper7.classList.remove("active")
            suggBox7.style.display = 'none'
         }
       }

       function select7(element){
        let selectUserData = element.textContent;
        // inputBox7.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore7 = [...numberStore7, cat];
        const cat1 = selectUserData.slice(-8)
        ma7 = [...ma7, cat];
        nhom7 = [...nhom7, cat1];
        mathe7.value = ma7;
        nhomthuchien7.value = nhom7;
        // inputBox7.value = '';
       }

       function showSuggettions7(list){
        let listData;
        if(!list.length){
             userValue = inputBox7.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox7.innerHTML = listData;
       }
   </script>



<!-- th??m m??y 8 -->


<script type="text/javascript">
       let searchWrapper8 = document.querySelector("#inputmayline8")
       let inputBox8 = document.querySelector("#searchinputmayline8")
       let suggBox8 = document.querySelector("#divmayline8")
       let mathe8 = document.querySelector('#nhomthuchienmay8')
       let nhomthuchien8 = document.querySelector('#mathe8')
       var numberStore8 = [];
       var ma8 = [];
       var nhom8 = [];

       inputBox8.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper8.classList.add("active")
            suggBox8.style.display = 'block'
            showSuggettions8(emptyArrayy1);
            let allList = suggBox8.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select8(this)")
            }
         }else{
            searchWrapper8.classList.remove("active")
            suggBox8.style.display = 'none'
         }
       }

       function select8(element){
        let selectUserData = element.textContent;
        // inputBox8.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore8 = [...numberStore8, cat];
        const cat1 = selectUserData.slice(-8)
        nhom8 = [...nhom8, cat1];
        ma8 = [...ma8, cat];
        mathe8.value = ma8;
        nhomthuchien8.value = nhom8;
        // inputBox8.value = '';
       }

       function showSuggettions8(list){
        let listData;
        if(!list.length){
             userValue = inputBox8.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox8.innerHTML = listData;
       }
   </script>



<!-- th??m m??y 9 -->



<script type="text/javascript">
       let searchWrapper9 = document.querySelector("#inputmayline9")
       let inputBox9 = document.querySelector("#searchinputmayline9")
       let suggBox9 = document.querySelector("#divmayline9")
       let mathe9 = document.querySelector('#nhomthuchienmay9')
       let nhomthuchien9 = document.querySelector('#mathe9')
       var numberStore9 = [];
       var ma9 = [];
       var nhom9 = [];

       inputBox9.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper9.classList.add("active")
            suggBox9.style.display = 'block'
            showSuggettions9(emptyArrayy1);
            let allList = suggBox9.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select9(this)")
            }
         }else{
            searchWrapper9.classList.remove("active")
            suggBox9.style.display = 'none'
         }
       }

       function select9(element){
        let selectUserData = element.textContent;
        // inputBox9.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore9 = [...numberStore9, cat];
        const cat1 = selectUserData.slice(-8)
        ma9 = [...ma9, cat];
        nhom9 = [...nhom9, cat1];
        mathe9.value = ma9;
        nhomthuchien9.value = nhom9;
        // inputBox9.value = '';
       }

       function showSuggettions9(list){
        let listData;
        if(!list.length){
             userValue = inputBox9.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox9.innerHTML = listData;
       }
   </script>



   <!-- th??m m??y 10 -->




   <script type="text/javascript">
       let searchWrapper10 = document.querySelector("#inputmayline10")
       let inputBox10 = document.querySelector("#searchinputmayline10")
       let suggBox10 = document.querySelector("#divmayline10")
       let mathe10 = document.querySelector('#nhomthuchienmay10')
       let nhomthuchien10 = document.querySelector('#mathe10')
       var numberStore10 = [];
       var ma10 = [];
       var nhom10 = [];

       inputBox10.onkeyup = (e) => {
         let userDataa1 = e.target.value;
         let emptyArrayy1 = [];
         if(userDataa1){
            emptyArrayy1 = suggettion.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userDataa1.toLocaleLowerCase());
            });
         emptyArrayy1 =  emptyArrayy1.map((data) => {
            return data = '<li>'+ data +'</li>';
         });
            searchWrapper10.classList.add("active")
            suggBox10.style.display = 'block'
            showSuggettions10(emptyArrayy1);
            let allList = suggBox10.querySelectorAll("li")
            for (let i = 0; i < allList.length; i++) {
                allList[i].setAttribute("onclick","select10(this)")
            }
         }else{
            searchWrapper10.classList.remove("active")
            suggBox10.style.display = 'none'
         }
       }

       function select10(element){
        let selectUserData = element.textContent;
        // inputBox10.value = selectUserData;
        const cat = selectUserData.slice(0, -9)
        numberStore10 = [...numberStore10, cat];
        const cat1 = selectUserData.slice(-8)
        nhom10 = [...nhom10, cat1];
        ma10 = [...ma10, cat];
        mathe10.value = ma10;
        nhomthuchien10.value = nhom10;
        // inputBox10.value = '';
       }

       function showSuggettions10(list){
        let listData;
        if(!list.length){
             userValue = inputBox10.value;
             listData = '<li>' + userValue + '</li>';
        }else{
            listData = list.join('')
        }
        suggBox10.innerHTML = listData;
       }
   </script>


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


<!--    <script type="text/javascript">
       let suggettion = [
       "V3001894-V??n Huy",
"V0255059-Nguy???n Th??? Kh??nh H??",
"V0255086-Nguy???n Th??nh C??ng",
"V0259315-D????ng Minh Th???o",
"V0255507-Nguy????n Thi?? Thu Ha??",
"V0255535-L?? Ngo??c ??i????p",
"V0256155-Hoa??ng Thi?? Ha??i",
"V0256158-L?? Thi????n Chung",
"V0258993-Nguy????n Thi?? Thanh Hoa??i",
"V0257423-Nguy????n ??????c Tha??nh",
"V0255257-Hoa??ng Tu????n Anh",
"V0259421-Ng?? ??i??nh Hi????n",
"V0259433-Qu??ng V??n L??i",
"V0250180-B??i Trung V??n",
"V0259509-Vi V??n V????ng",
"V0259529-Nguy????n V??n V??????ng",
"V0259548-Vu?? V??n L????ng",
"V0259587-Nguy????n Huy Li????u",
"V0259724-Pha??m Quang Ma??nh",
"V0259888-Tr????n V??n Nguy??n",
"V0260063-Nguy????n V??n L????c",
"V0263379-Nguy???n V??n B???c",
"V0263387-Nguy????n V??n Dung",
"V0263388-Nguy????n V??n Nguy??n",
"V0263389-Tri????u V??n Hai",
"V0263390-L??u V??n Long",
"V0263439-Nguy????n V??n Kh??i",
"V0263435-Nguy????n Gia Huy",
"V0263444-Hoa??ng Thanh ??i??nh",
"V0263521-Nguy????n V??n ??i??nh",
"V0263573-Tr????ng V??n V??nh",
"V0263577-D????ng V??n Ba",
"V0263671-Nguy????n V??n Ti????n",
"V0264155-Nguy????n Ngo??c Ha??i",
"V3032700-Vi H???i Nam",
"V0255522-Tr???n v??n ng???c",
"V0255719-Nguy???n ????nh L???c",
"V0256556-Vi V??n Ma??nh",
"V3032691-Nguy???n V??n S??n",
"V0256551-L?? V??n Trung",
"V0258682-Tri???u V??n Khoa",
"V0256549-Bu??i V??n Hi????p",
"V0256550-Ha?? V??n C??????ng",
"V3032703-Hoa??ng V??n Tr????n",
"V0263371-Ha?? V??n Chi??nh",
"V0263373-Nguy???n V??n Qu??n",
"V0263374-Nguy???n ????nh Thu",
"V0263375-?????? V??n Th????ng",
"V0263376-Ly?? V??n L??m",
"V0263377-L?? Huy Ha??i",
"V0263392-?????? ??i??nh Sa??ng",
"V0263391-Hoa??ng C??ng Ninh",
"V0263382-Nguy????n V??n Vi??nh",
"V0263383-Nguy????n V??n Tu??ng",
"V0263384-Nguy????n Hoa??ng Linh",
"V0263385-?????? V??n D????ng",
"V0263433-D????ng Ng?? Kha??nh",
"V3032270-Chu Anh Tu????n",
"V3049023-Tr????n V??n Quang",
"V3031355-Nguy???n Huy H???ng",
"V0231422-Nguy???n V??n Th???o",
"V0205682-Nguy???n V??n Th?????ng",
"V0205690-Ng?? ??V??n Ki??n",
"V3049354-Nguy???n Qu???c Ti???n",
"V0232115-V?? ????nh Th???ng",
"V0236226-??o??n V??n M???ng",
"V0220302-Nguy???n Anh L?????ng",
"V0230192-L??u ?????c C?????ng",
"V0236121-Nguy???n V??n Di??n",
"V3003500-Ho??ng V??n Th???ng",
"V3005020-Nguy???n V??n Tuy??n",
"V0248304-Tr???nh V??n T??i",
"V0253208-????? Th??? Oanh",
"V0254203-Nguy???n Ti???n ?????c",
"V0255087-Nguy???n Th??? L??? Th???y",
"V0255256-Nguy????n Ngo??c Qui??",
"V0255258-??????ng V??n Nam",
"V0255275-Nguy???n Quang L??m",
"V0255450-Pha??m L?? Tu??ng",
"V0256578-Hoa??ng V??n Ngo??c",
"V0236170-Nguy???n V??n Qu??",
"V0258220-Vu?? Quang Anh",
"V0259429-Pha??m V??n ????ng",
"V0259523-Tr????n V??n Ma??nh",
"V0259525-Ng?? V??n Tha??i",
"V0263380-Nguy????n Ngo??c Tu??ng",
"V0263386-Hoa??ng Kim Chi??nh",
"V0263437-Nguy???n Thanh S??n",
"V0263442-Vu?? V??n Bi??nh",
"V0263467-Ho??ng C??ng An",
"V0263523-H??? Th??? Hu???",
"V0263524-V?? Tr?????ng Giang",
"V0263572-L?? Ng???c M???nh",
"V3032126-Tr???n Th??? H???ng",
"V0264157-Nguy???n V??n Th???ng",
"V0264235-Tr????ng ?????c D??ng",
"V0264236-Th??n V??n Nam",
"V3076400-Nguy???n Tu???n Anh",
"V0221050-??inh V??n H???i",
"V0248234-Nguy???n ????nh Th???ng",
"V0252443-Nguy???n Th??? Ba",
"V0205617-D????ng v??n Tr?????ng",
"V0236711-Nguy???n Ng???c Ho??n",
"V0238581-Nguy???n ??n Nguy??n",
"V0253114-V?? Th??? Qu???nh",
"V0253203-Nguy???n V??n Ho???t",
"V0253204-Tr???n Xu??n Huy",
"V0253206-Tr???n V??n Minh",
"V0253209-????ng H???ng S??n",
"V0259477-Th??n V??n Tu????n",
"V0259591-Nguy????n V??n Du??ng",
"V0259801-Nguy????n Duy L????c",
"V0262351-Phu??ng V??n Nghi??a",
"V0262353-Tri????u V??n Th????c",
"V0260158-??oa??n V??n Du??ng",
"V0263369-Tri??nh V??n C????ng",
"V0263446-Nguy???n V??n C?????ng",
"V0263525-Nguy????n H????u Nam",
"V0263526-Tr???n V??n Quy???n",
"V0263627-Nguy???n M???nh H??ng",
"V0263629-?????ng Minh Quang",
"V0263661-Ng?? ?????c Tr???ng",
"V0263662-Ho??ng Ng???c Duy",
"V0263663-Nguy???n ????ng Huy",
"V0263664-Nguy????n V??n D????ng",
"V0263672-Nguy????n Quang Minh",
"V0263673-Nguy????n V??n Thi??nh",
"V0263674-Nguy????n Trung Tha??nh",
"V0236223-Nguy???n Vi???t D??ng",
"V0236026-L?? V??n Qu??n",
"V0230216-L?? V??n Xu??n",
"V3005023-L????ng n Khanh",
"V0264163-Nguy???n T?? Linh",
"V3075238-Tr???nh V??n Quang",
"V3076410-Nguy???n Ng???c Duy",
"V3000220-Tr???n xu??n H???i",
"V0256166-Nguy????n ??i??nh Tr??????ng",
"V0256172-Nguy????n V??n ??oa??n",
"V0255717-Nguy????n Duy Ph????ng",
"V0259480-??????ng V??n T??n",
"V0259502-Pho?? Ngo??c Anh",
"V0259521-Vu?? V??n Hi????u",
"V0259592-Vu?? ??i??nh C??ng",
"V0260515-Pha??m Minh Sang",
"V0260722-??inh V??n H??",
"V0262099-Nguy???n V??n Nguy??n",
"V0262100-L????ng H???u Tr?????ng",
"V0262360-Nguy???n ?????c Tu???n",
"V0262361-Nguy???n C??ng Minh",
"V0263529-?????ng Duy H???u",
"V0263633-Nguy????n ??i??nh T????",
"V0263665-L?? Trung S??n",
"V0264158-La Li??m",
"V0264159-Nguy????n Anh Tu????n",
"V0264160-Tr????n V??n Kh????ng",
"V0264162-??????ng V??n Nghi??a",
"V3073889-D????ng V??n ???nh",
"V0264161-Chu V??n Ha??i",
"V3072925-Nguy???n Minh ?????c",
       ];

console.log(suggettion)
   </script>
 -->





<script type="text/javascript">
    document.getElementById("idtenmay").addEventListener("change", myFunction);

function myFunction() {
  var x = document.getElementById("idtenmay");
  x.value = x.value.toUpperCase();
  var chuoi = x.value.search("LINE");
    if(chuoi){
      document.getElementById("idtenmay").classList.add("form-control");
      document.getElementById("idtenmay").classList.add("is-invalid");
      document.getElementById("idspan").innerText = 'Vui L??ng Nh???p C?? T??? LINE...vd:line 2'
      document.getElementById("idspan").style.color = 'red'
  }else{
    document.getElementById("idtenmay").classList.remove("form-control");
    document.getElementById("idtenmay").classList.remove("is-invalid");
    document.getElementById("idtenmay").classList.add("form-control");
    document.getElementById("idtenmay").classList.add("is-valid");
    document.getElementById("idspan").innerText = ''
  }
}

</script>


<script type="text/javascript">
    document.getElementById("tenmayy").addEventListener("change", myFunction1);

function myFunction1() {
  var x = document.getElementById("tenmayy");
  x.value = x.value.toUpperCase();
  var chuoi = x.value.search("LINE");
    if(!chuoi){
      document.getElementById("tenmayy").classList.add("form-control");
      document.getElementById("tenmayy").classList.add("is-invalid");
      document.getElementById("idspan1").innerText = 'Vui L??ng Nh???p Kh??ng C?? T??? Line'
      document.getElementById("idspan1").style.color = 'red'
  }else{
    document.getElementById("tenmayy").classList.remove("form-control");
    document.getElementById("tenmayy").classList.remove("is-invalid");
    document.getElementById("tenmayy").classList.add("form-control");
    document.getElementById("tenmayy").classList.add("is-valid");
    document.getElementById("idspan1").innerText = ''
  }
}

</script>



<!-- <script type="text/javascript">
   window.onload = function()
{
  if(sessionStorage.getItem('key')!=1997){
      window.location="../Controller/index.php?action=test2#tableselectdata";
  }
};
</script> -->
   
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</body>
</html>