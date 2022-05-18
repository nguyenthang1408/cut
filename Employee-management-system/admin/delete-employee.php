<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM employee WHERE id = $id ";
$sql1 = "DELETE FROM attendance WHERE member_id = $id ";
mysqli_query($conn , $sql); 
mysqli_query($conn , $sql1); 
header("Location: manage-employee.php?delete-success-where-id=" .$id );


?>
