<?php

require_once('config/database.php');

if(isset($_GET['delete']))
{
    $get_id = $_GET['delete'];
    
    

 $sql = "DELETE FROM tbl_tasks WHERE task_id = $get_id";

 $resulte = mysqli_query($conn, $sql);
 if($resulte==true){

  $_SESSION['delete'] = "Task deleted Succssfully";
  header('location:' . SITURL);
  
}
else{

 $_SESSION['delete_fail'] = "Failed to delete Task";
 header('location:' . SITURL);
}
}
else{
    header('location:' . SITURL . 'manage-list.php');
}


?>