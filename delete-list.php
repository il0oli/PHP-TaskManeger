<?php

require_once('config/database.php');

if(isset($_GET['delete']))
{
    $get_id = $_GET['delete'];
    
    

 $sql = "DELETE FROM tbl_lists WHERE list_id = $get_id";

 $resulte = mysqli_query($conn, $sql);
 if($resulte==true){

  $_SESSION['delete'] = "List deleted Succssfully";
  header('location:' . SITURL . 'manage-list.php');
  
}
else{

 $_SESSION['delete_fail'] = "Failed to delete List";
 header('location:' . SITURL . 'manage-list.php');
}
}
else{
    header('location:' . SITURL . 'manage-list.php');
}


?>











