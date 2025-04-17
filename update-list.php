<?php
require_once('config/database.php');

if(isset($_GET['update']))
{
    $get_id = $_GET['update'];
    
    

 $sql = "SELECT * FROM tbl_lists WHERE list_id = $get_id";

 $resulte = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc( $resulte))
    {

        $list_name = $row['list_name'];
        $list_description = $row['list_description'];


    }

if(isset($_POST['submit'])){

        $post_list_name = $_POST['list_name'];
        $post_list_description = $_POST['list_description'];
        $sql = "UPDATE tbl_lists SET list_name ='$post_list_name' , list_description ='$post_list_description'
         WHERE list_id = $get_id ";
        $up_resulte = mysqli_query($conn, $sql);
        header('location:' . SITURL . 'manage-list.php');


}


 
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Maneger</title>
    <link rel="stylesheet" href="<?php echo SITURL; ?>css/style.css">
</head>

<body>
<div class="wrapper">
    <a class="btn2" href="<?php echo SITURL; ?>index.php">Home</a>
    <a class="btn2" href="<?php echo SITURL; ?>manage-list.php">Manage Lists</a>
    <h3>Update List Page</h3>


    <form method="POST" action="">

        <table class="tbl-half">

            <tr>
                <td>List Name:</td>
                <td><input type="text" name="list_name" value="<?php echo $list_name; ?>" required="required"></td>
            </tr>
            <tr>
                <td>List Description:</td>
                <td><textarea name="list_description"><?php echo $list_description; ?></textarea></td>
            </tr>
            <tr>
                <td><input class="btn btn-lg" type="submit" name="submit" value="Update"></td>
            </tr>
        </table>



    </form>


</div>
</body>

</html>