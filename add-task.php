<?php

require_once('config/database.php');





?>

<html>

<head><title>Task Manager</title>
<link rel="stylesheet" href="<?php echo SITURL; ?>css/style.css">
</head>


    <body>
    <div class="wrapper">
        <h1>TASK MANAGER</h1>
        <a class="btn2" href="<?php echo SITURL; ?> ">Home</a>
        <h3>Add Task Page</h3>

        <p>

    <?php
    if(isset( $_SESSION['add_fail']))
    {
        echo $_SESSION['add_fail'];

        unset($_SESSION['add_fail']);
    }

    ?>

    </p>


    <form method="POST" action="" >

    <table  class="tbl-half">

    <tr>
        <td>Task Name: </td>
        <td><input type="text" name="task_name" placeholder="Type your Task" ></td>
    </tr>

    <tr>
        <td>Task Description: </td>
        <td><textarea name="task_description" placeholder="Type Task Description"></textarea></td>
    </tr>

    <tr>
        <td>Select List: </td>
        <td><select name="list_id">
        <?php
        $sql = "SELECT * FROM tbl_lists";
$resulte = mysqli_query($conn, $sql);
if ($resulte == true) {
    $count_rows = mysqli_num_rows($resulte);
    if ($count_rows > 0) {
        while ($row = mysqli_fetch_assoc($resulte)) {
            $list_id = $row['list_id'];
            $list_name = $row['list_name'];
            ?>
            <option value="<?php echo $list_id ?>"><?php echo $list_name; ?></option>
            <?php
        }
    } else {

        ?>
        <option value="0">None</option>
        <?php
    }
}
?>
            
            
        </select></td>
    </tr>

    <tr>
        <td>Priority: </td>
        <td><select name="priority" >
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low" selected>Low</option>
        </select></td>
    </tr>

    <tr>
        <td>Deadline: </td>
        <td><input type="date" name="deadline" ></td>
    </tr>

    <tr>
        
        <td><input class="btn btn-lg" type="submit" name="submit" value="Save" ></td>
    </tr>



    </table>


    </form>
    </div>
    </body>


</html>
<?php
if(isset($_POST['submit'])){
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $list_id =$_POST['list_id'];
    $priority =$_POST['priority'];
    $deadline =$_POST['deadline'];
   
    $sql = "INSERT INTO tbl_tasks SET task_name = '$task_name',
    task_description = '$task_description',
    list_id = $list_id,
    priority = '$priority',
    deadline = '$deadline'";

    $resulte = mysqli_query($conn, $sql);
    if($resulte==true){
       
        $_SESSION['add'] = "Task Added Succssfully";
        header('location:' . SITURL);
        
    }
    else{
      
       $_SESSION['add_fail'] = "Failed to Add Task";
       header('location:' . SITURL .'add-task.php');
    }

}
?>