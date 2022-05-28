<?php
// session_start();
if(isset($_GET['action'])){
	$action = $_GET['action'];
}else{
	$action ='';
}
$thanhcong = array();
switch ($action) {
	case 'add':{
	
         require_once('../View/maymoc/add.php');
         break;
	}
	case 'addtiendo':{

		require_once('../View/maymoc/addtiendo.php');
        break;
	}
	case 'edit':{
	
         require_once('../View/maymoc/edit.php');
         break;
	}
	case 'editt':{
		    
         require_once('../View/maymoc/editt.php');
         break;
	}
	case 'delete':{
	
         require_once('../View/maymoc/delete.php');
         break;
	}
	case 'list':{
         require_once('../View/maymoc/list.php');
         break;
	}
	case 'tim-kiem':{
		require_once('../View/maymoc/timkiemmoi.php');
		break;
	}
	case 'tim-kiem1':{
		require_once('../View/maymoc/timkiemmoi1.php');
		break;
	}
	case 'home':{
		require_once('../View/maymoc/Home.php');
		break;
	}
	case 'home1':{
		require_once('../View/maymoc/Home1.php');
		break;
	}
	case 'login':{
		require_once('../View/maymoc/login.php');
		break;
	}
	case 'loginuser':{
		require_once('../View/maymoc/loginuser.php');
		break;
	}
	case 'logindeveloper':{
		require_once('../View/maymoc/logindeveloper.php');
		break;
	}
	case 'selectaecdata':{
		require_once('../View/maymoc/selectaecdata.php');
		break;
	}
	case 'dataaec':{
		require_once('../View/maymoc/dataaec.php');
		break;
	}
	case 'dataaec1':{
		require_once('../View/maymoc/dataaec1.php');
		break;
	}
	case 'selecttscdata':{
		require_once('../View/maymoc/selecttscdata.php');
		break;
	}
	case 'datatsc1':{
		require_once('../View/maymoc/datatsc1.php');
		break;
	}
	case 'datatsc':{
		require_once('../View/maymoc/datatsc.php');
		break;
	}
	case 'selectapsdata':{
		require_once('../View/maymoc/selectapsdata.php');
		break;
	}
	case 'dataaps':{
		require_once('../View/maymoc/dataaps.php');
		break;
	}
	case 'dataaps1':{
		require_once('../View/maymoc/dataaps1.php');
		break;
	}
	case 'selectaecdata1':{
		require_once('../View/maymoc/selectaecdata1.php');
		break;
	}
	case 'selecttscdata1':{
		require_once('../View/maymoc/selecttscdata1.php');
		break;
	}
	case 'selectapsdata1':{
		require_once('../View/maymoc/selectapsdata1.php');
		break;
	}
	case 'tiendo':{
		require_once('../View/maymoc/tiendo.php');
		break;
	}
	case 'bieudo':{
		require_once('../View/maymoc/bieudo.php');
		break;
	}
	case 'bieudocot':{
		require_once('../View/maymoc/bieudocot.php');
		break;
	}
	case 'bieudoduong':{
		require_once('../View/maymoc/bieudoduong.php');
		break;
	}
	case 'bieudotron':{
		require_once('../View/maymoc/bieudotron.php');
		break;
	}
	case 'bieudo1':{
		require_once('../View/maymoc/bieudo1.php');
		break;
	}
	case 'bieudocot1':{
		require_once('../View/maymoc/bieudocot1.php');
		break;
	}
	case 'bieudoduong1':{
		require_once('../View/maymoc/bieudoduong1.php');
		break;
	}
	case 'bieudotron1':{
		require_once('../View/maymoc/bieudotron1.php');
		break;
	}
	case 'themthanhvien':{		
		require_once('../View/maymoc/themnhanvien.php');
		break;
	}
	case 'adminmanager':{
		require_once('../View/maymoc/adminmanager.php');
		break;
	}
	case 'usermanager':{
		require_once('../View/maymoc/usermanager.php');
		break;
	}
	case 'developer':{
		require_once('../View/maymoc/developer.php');
		break;
	}
	case 'developeruser':{
		require_once('../View/maymoc/developeruser.php');
		break;
	}
	case 'begin':{
		require_once('../View/maymoc/begin.php');
		break;
	}
	case 'test':{
		require_once('../View/maymoc/test.php');
		break;
	}
	case 'sum1':{
		require_once('../View/maymoc/sum1.php');
		break;
	}
	
	case 'khongcoquyendangnhap':{
		require_once('../View/maymoc/khongcoquyendangnhap.php');
		break;
	}
	case 'mypage':{
		require_once('../View/maymoc/mypage.php');
		break;
	}
	case 'mypagemanager':{
		require_once('../View/maymoc/mypagemanager.php');
		break;
	}
	case 'bieudoline':{
		require_once('../View/maymoc/bieudoline.php');
		break;
	}
	case 'edit':{
		require_once('../View/maymoc/edit.php');
		break;
	}
	case 'add1':{
		require_once('../View/maymoc/add1.php');
		break;
	}
	case 'bieudoline1':{
		require_once('../View/maymoc/bieudoline1.php');
		break;
	}
	case 'test1':{
		require_once('../View/maymoc/test1.php');
		break;
	}
	case 'test2':{
		require_once('../View/maymoc/test2.php');
		break;
	}
	case 'sum':{
		require_once('../View/maymoc/sum.php');
		break;
	}
	case 'projectloading':{
		require_once('../View/maymoc/projectloading.php');
		break;
	}
	case 'projectloading1':{
		require_once('../View/maymoc/projectloading1.php');
		break;
	}
	case 'projectdone':{
		require_once('../View/maymoc/projectdone.php');
		break;
	}
	case 'projectdone1':{
		require_once('../View/maymoc/projectdone1.php');
		break;
	}
	case 'hieusuat':{
		require_once('../View/maymoc/hieusuat.php');
		break;
	}
	case 'homech':{
		require_once('../View/maymoc/hometiengtrung.php');
		break;
	}
	case 'addchart':{
		require_once('../View/maymoc/addchart.php');
		break;
	}
	case 'table-attendance':{
		require_once('../View/maymoc/table-attendance.php');
		break;
	}
	case 'chitiethieusuat':{
		require_once('../View/maymoc/chitiethieusuat.php');
		break;
	}
	case 'chitiethieusuatviecrieng':{
		require_once('../View/maymoc/chitiethieusuatviecrieng.php');
		break;
	}
	case 'chitiethieusuatphepbenh':{
		require_once('../View/maymoc/chitiethieusuatphepbenh.php');
		break;
	}
	case 'chitiethieusuattudo':{
		require_once('../View/maymoc/chitiethieusuattudo.php');
		break;
	}
	//china


	case 'add-cn':{
	
         require_once('../View-cn/maymoc/add.php');
         break;
	}
	case 'addtiendo-cn':{

		require_once('../View-cn/maymoc/addtiendo.php');
        break;
	}
	case 'edit-cn':{
	
         require_once('../View-cn/maymoc/edit.php');
         break;
	}
	case 'editt-cn':{
		    
         require_once('../View-cn/maymoc/editt.php');
         break;
	}
	case 'delete-cn':{
	
         require_once('../View-cn/maymoc/delete.php');
         break;
	}
	case 'list-cn':{
         require_once('../View-cn/maymoc/list.php');
         break;
	}
	case 'tim-kiem-cn':{
		require_once('../View-cn/maymoc/timkiemmoi.php');
		break;
	}
	case 'tim-kiem1-cn':{
		require_once('../View-cn/maymoc/timkiemmoi1.php');
		break;
	}
	case 'home-cn':{
		require_once('../View-cn/maymoc/Home.php');
		break;
	}
	case 'home1-cn':{
		require_once('../View-cn/maymoc/Home1.php');
		break;
	}
	case 'login-cn':{
		require_once('../View-cn/maymoc/login.php');
		break;
	}
	case 'loginuser-cn':{
		require_once('../View-cn/maymoc/loginuser.php');
		break;
	}
	case 'logindeveloper-cn':{
		require_once('../View-cn/maymoc/logindeveloper.php');
		break;
	}
	case 'selectaecdata-cn':{
		require_once('../View-cn/maymoc/selectaecdata.php');
		break;
	}
	case 'dataaec-cn':{
		require_once('../View-cn/maymoc/dataaec.php');
		break;
	}
	case 'dataaec1-cn':{
		require_once('../View-cn/maymoc/dataaec1.php');
		break;
	}
	case 'selecttscdata-cn':{
		require_once('../View-cn/maymoc/selecttscdata.php');
		break;
	}
	case 'selectaecdata1-cn':{
		require_once('../View-cn/maymoc/selectaecdata1.php');
		break;
	}
	case 'selecttscdata1-cn':{
		require_once('../View-cn/maymoc/selecttscdata1.php');
		break;
	}
	case 'selectapsdata1-cn':{
		require_once('../View-cn/maymoc/selectapsdata1.php');
		break;
	}
	case 'datatsc1-cn':{
		require_once('../View-cn/maymoc/datatsc1.php');
		break;
	}
	case 'datatsc-cn':{
		require_once('../View-cn/maymoc/datatsc.php');
		break;
	}
	case 'selectapsdata-cn':{
		require_once('../View-cn/maymoc/selectapsdata.php');
		break;
	}
	case 'dataaps-cn':{
		require_once('../View-cn/maymoc/dataaps.php');
		break;
	}
	case 'dataaps1-cn':{
		require_once('../View-cn/maymoc/dataaps1.php');
		break;
	}
	case 'selectaecdata1-cn':{
		require_once('../View-cn/maymoc/selectaecdata1.php');
		break;
	}
	case 'selecttscdata1-cn':{
		require_once('../View-cn/maymoc/selecttscdata1.php');
		break;
	}
	case 'selectapsdata1-cn':{
		require_once('../View-cn/maymoc/selectapsdata1.php');
		break;
	}
	case 'tiendo-cn':{
		require_once('../View-cn/maymoc/tiendo.php');
		break;
	}
	case 'bieudo-cn':{
		require_once('../View-cn/maymoc/bieudo.php');
		break;
	}
	case 'bieudocot-cn':{
		require_once('../View-cn/maymoc/bieudocot.php');
		break;
	}
	case 'bieudoduong-cn':{
		require_once('../View-cn/maymoc/bieudoduong.php');
		break;
	}
	case 'bieudotron-cn':{
		require_once('../View-cn/maymoc/bieudotron.php');
		break;
	}
	case 'bieudo1-cn':{
		require_once('../View-cn/maymoc/bieudo1.php');
		break;
	}
	case 'bieudocot1-cn':{
		require_once('../View-cn/maymoc/bieudocot1.php');
		break;
	}
	case 'bieudoduong1-cn':{
		require_once('../View-cn/maymoc/bieudoduong1.php');
		break;
	}
	case 'bieudotron1-cn':{
		require_once('../View-cn/maymoc/bieudotron1.php');
		break;
	}
	case 'themthanhvien-cn':{		
		require_once('../View-cn/maymoc/themnhanvien.php');
		break;
	}
	case 'adminmanager-cn':{
		require_once('../View-cn/maymoc/adminmanager.php');
		break;
	}
	case 'usermanager-cn':{
		require_once('../View-cn/maymoc/usermanager.php');
		break;
	}
	case 'developer-cn':{
		require_once('../View-cn/maymoc/developer.php');
		break;
	}
	case 'developeruser-cn':{
		require_once('../View-cn/maymoc/developeruser.php');
		break;
	}
	case 'begin-cn':{
		require_once('../View-cn/maymoc/begin.php');
		break;
	}
	case 'test-cn':{
		require_once('../View-cn/maymoc/test.php');
		break;
	}
	
	case 'khongcoquyendangnhap-cn':{
		require_once('../View-cn/maymoc/khongcoquyendangnhap.php');
		break;
	}
	case 'mypage-cn':{
		require_once('../View-cn/maymoc/mypage.php');
		break;
	}
	case 'mypagemanager-cn':{
		require_once('../View-cn/maymoc/mypagemanager.php');
		break;
	}
	case 'bieudoline-cn':{
		require_once('../View-cn/maymoc/bieudoline.php');
		break;
	}
	case 'edit-cn':{
		require_once('../View-cn/maymoc/edit.php');
		break;
	}
	case 'add1-cn':{
		require_once('../View-cn/maymoc/add1.php');
		break;
	}
	case 'bieudoline1-cn':{
		require_once('../View-cn/maymoc/bieudoline1.php');
		break;
	}
	case 'test1-cn':{
		require_once('../View-cn/maymoc/test1.php');
		break;
	}
	case 'test2-cn':{
		require_once('../View-cn/maymoc/test2.php');
		break;
	}
	case 'sum-cn':{
		require_once('../View-cn/maymoc/sum.php');
		break;
	}
	case 'sum1-cn':{
		require_once('../View-cn/maymoc/sum1.php');
		break;
	}
	case 'projectloading-cn':{
		require_once('../View-cn/maymoc/projectloading.php');
		break;
	}
	case 'projectloading1-cn':{
		require_once('../View-cn/maymoc/projectloading1.php');
		break;
	}
	case 'projectdone-cn':{
		require_once('../View-cn/maymoc/projectdone.php');
		break;
	}
	case 'projectdone1-cn':{
		require_once('../View-cn/maymoc/projectdone1.php');
		break;
	}
	case 'hieusuat-cn':{
		require_once('../View-cn/maymoc/hieusuat.php');
		break;
	}
	case 'homech-cn':{
		require_once('../View-cn/maymoc/hometiengtrung.php');
		break;
	}
	case 'addchart-cn':{
		require_once('../View-cn/maymoc/addchart.php');
		break;
	}
	case 'te':{
		require_once('../View/maymoc/te.php');
		break;
	}
	case 'table-attendance-cn':{
		require_once('../View-cn/maymoc/table-attendance.php');
		break;
	}
	
	case 'chitiethieusuat-cn':{
		require_once('../View-cn/maymoc/chitiethieusuat.php');
		break;
	}
	case 'chitiethieusuatviecrieng-cn':{
		require_once('../View-cn/maymoc/chitiethieusuatviecrieng.php');
		break;
	}
	case 'chitiethieusuatphepbenh-cn':{
		require_once('../View-cn/maymoc/chitiethieusuatphepbenh.php');
		break;
	}
	case 'chitiethieusuattudo-cn':{
		require_once('../View-cn/maymoc/chitiethieusuattudo.php');
		break;
	}

}

?>