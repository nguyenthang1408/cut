<?php
	if(isset($_POST["btnsubmit"]))
	{
		require_once "../connection.php";
		
		$today = date("Y/m/d");
        $date = $today;
		$date = $_POST["date"];
		$query = "SELECT * FROM employee";
		$result = mysqli_query($conn,$query);
		$sql = "SELECT * FROM attendance WHERE date = '$date'";
		$re = mysqli_query($conn,$sql); 

		while($rows = mysqli_fetch_array($result))
		{
			$id= $rows["id"];
			$employcode = $rows["employcode"];
			$name = $rows['name'];
			
			$type_leave = $_POST["hinhthuc".$id];
			if(isset($_POST[$id]))
			{
				if( mysqli_num_rows($re) <= 0){
					$query1 = "INSERT INTO  `attendance`( `member_id`,`employcode` ,`name` , `date` ,  `attendance1`, `type_leave`) VALUES ('$id','$employcode','$name','$date', '1','Đi làm')";
					mysqli_query($conn,$query1);
					print "<script>";
					print "alert('Đã lưu dữ liệu điểm danh....');";
					print "self.location='attendance.php';";
					print "</script>";
				}
				else{
					print "<script>";
					print "self.location='attendance.php';";
					print "alert('Hôm nay đã có dữ liệu điểm danh, nếu điểm danh sai hãy vào quản lý điểm danh');";
					print "</script>";
				}
			}
			else
			{
				if( mysqli_num_rows($re) <= 0){
					$query1 = "INSERT INTO  `attendance`( `member_id`,`employcode` ,`name` , `date` ,  `attendance1`, `type_leave`) VALUES ('$id','$employcode','$name','$date', '0', '$type_leave')";
					mysqli_query($conn,$query1);
					print "<script>";
					print "alert('Đã lưu dữ liệu điểm danh....');";
					print "self.location='attendance.php';";
					print "</script>";
				}
				else{
					print "<script>";
					print "alert('Hôm nay đã có dữ liệu điểm danh, nếu điểm danh sai hãy vào quản lý điểm danh');";
					print "self.location='attendance.php';";
					print "</script>";
				}
			}
			

		}
	}
		else{
			header("Location:index.php");
		}
	
	 ?>
<?php 
    require_once "include/footer.php";
?>
