<?php
include "../Model/DBconfig.php";
$db = new Database();
$db -> connect();
session_start();

if(isset($_GET['id'])){
     $id = $_GET['id'];
     $table = "congdoan";
     $table1 = "time";
     if($db->Delete($id,$table)&&$db->Delete($id,$table1))
     {
       header("location:javascript://history.go(-1)");
        
     }
     else{
      $message = "Vui Lòng Thử Lại";
      echo "<script type='text/javascript'>alert('$message');</script>";
        header("location:javascript://history.go(-1)");
        
     }
   }

?>