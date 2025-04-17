
<?php
require_once('config/database.php');

if(isset($_GET['update']))
{
    $get_id = $_GET['update'];
    
    

 $sql = "SELECT * FROM tbl_tasks WHERE task_id = $get_id";

 $resulte = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc( $resulte))
    {

        
                        $task_name = $row['task_name'];
        $task_description = $row['task_description'];
        $list_id = $row['list_id'];
                        $priority = $row['priority'];
                        $deadline = $row['deadline'];


    }


if(isset($_POST['submit'])){

        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $list_id = $_POST['list_id'];
        $priority = $_POST['priority'];
        $deadline = $_POST['deadline'];

         $sql = "UPDATE tbl_tasks SET  
        task_name ='$task_name',
        task_description = '$task_description',
        list_id = '$list_id',
        priority = '$priority',
        deadline = '$deadline'
         WHERE task_id = $get_id ";
        $up_resulte = mysqli_query($conn, $sql);
        header('location:' . SITURL);


}


 
}



?>

<html>

    <head><title>Task Manager</title>
    <link rel="stylesheet" href="<?php echo SITURL; ?>css/style.css">

</head>

    <body>
    <div class="wrapper">
        <h1>TASK MANAGER</h1>
        <a class="btn2" href="<?php echo SITURL; ?> ">Home</a>
        <h3>Update Task Page</h3>


    <form method="POST" action="" >

    <table class="tbl-half">

    <tr>
        <td>Task Name: </td>
        <td><input type="text" name="task_name" value="<?php echo $task_name ?>" required="required" ></td>
    </tr>

    <tr>
        <td>Task Description: </td>
        <td><textarea name="task_description"><?php echo $task_description ?></textarea></td>
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
            $list_id_db = $row['list_id'];
            $list_name = $row['list_name'];
            ?>
            <option <?php if ($list_id_db == $list_id) { echo "selected='selected'";} ?>  value="<?php echo $list_id_db ?>"><?php echo $list_name; ?></option>
            <?php
        }
    } else {

        ?>
        <option <?php if ($list_id == 0) { echo "selected='selected'";} ?> value="0">None</option>
        <?php
    }
}
?>
            
            
        </select></td>
    </tr>

    <tr>
        <td>Priority: </td>
        <td><select name="priority" >
            <option <?php if ($priority == "high") { echo "selected='selected'";} ?> value="high">High</option>
            <option <?php if ($priority == "medium") { echo "selected='selected'";} ?> value="medium">Medium</option>
            <option <?php if ($priority == "low") { echo "selected='selected'";} ?> value="low">Low</option>
        </select></td>
    </tr>

    <tr>
        <td>Deadline: </td>
        <td><input type="date" name="deadline" value="<?php echo $deadline ?>"></td>
    </tr>

    <tr>
        
        <td><input class="btn btn-lg" type="submit" name="submit" value="Update" ></td>
    </tr>



    </table>


    </form>
    </div>
    </body>


</html>