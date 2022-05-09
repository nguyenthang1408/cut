<?php
	if(isset($_POST["btnsubmit"]))
	{
		require_once "../connection.php";
		
		$today = date("Y/m/d");
              		
		$query = "SELECT * FROM employee";
		$result = mysqli_query($conn,$query);
		while($rows = mysqli_fetch_array($result))
		{
			$id= $rows["id"];
			$employcode = $rows["employcode"];
			$name = $rows['name'];
			$type_leave = $_POST["hinhthuc".$id]; 
			if(isset($_POST[$id]))
			{
				$query1 = "INSERT INTO  `attendance`( `member_id`,`employcode` ,`name` , `date` ,  `attendance1`, `type_leave`) VALUES ('$id','$employcode','$name','$today', '1','Đi làm')";
				$query2 = "INSERT INTO `chitiethieusuat` (`id`, `employcode`,`name`, `date` ,`phepbenh` ,`phepnam` , `viecrieng` ,  `tudo`) VALUES ('$id','$employcode','$name','$today','0', '0','0','0')";
			}
			else
			{
				$query1 = "INSERT INTO  `attendance`( `member_id`,`employcode` ,`name` , `date` ,  `attendance1`, `type_leave`) VALUES ('$id','$employcode','$name','$today', '0', '$type_leave')";
				$query2 = "INSERT INTO `chitiethieusuat` (`id`, `employcode`,`name`, `date` ,`phepbenh` ,`phepnam` , `viecrieng` ,  `tudo`) VALUES ('$id','$employcode','$name','$today','0', '0','0','0')";
			}
			mysqli_query($conn,$query1);
			mysqli_query($conn,$query2);
			print "<script>";
			print "alert('Đã lưu dữ liệu điểm danh....');";
			print "self.location='attendance.php';";
			print "</script>";
		}
	}
		else{
			header("Location:index.php");
		}
	
	 ?>
<?php 
    require_once "include/footer.php";
?>
