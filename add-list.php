
<?php

require_once('config/database.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK MANAGER</title>
    <link rel="stylesheet" href="<?php echo SITURL; ?>css/style.css">
</head>

<body>
<div class="wrapper">
    <a class="btn2" href="<?php echo SITURL;     ?>index.php">Home</a>
    <a class="btn2" href= "<?php echo SITURL;     ?>manage-list.php">Manage Lists</a>
    <h3>Add List Page</h3>

    <p>

    <?php
    if(isset( $_SESSION['add_fail']))
    {
        echo $_SESSION['add_fail'];

        unset($_SESSION['add_fail']);
    }

    ?>

    </p>

    <form method="POST" action="">

        <table class="tbl-half">

            <tr>
                <td>List Name:</td>
                <td><input type="text" name="list_name"  placeholder="Type list name here" required="required"></td>
            </tr>
            <tr>
                <td>List Description:</td>
                <td><textarea name="list_description" placeholder="Type list Description here"></textarea></td>
            </tr>
            <tr>
                <td><input class="btn btn-lg" type="submit" name="submit" value="Save"></td>
            </tr>
        </table>



    </form>


</div>
</body>

</html>

<?php

if(isset($_POST['submit']))
{
   
    $list_name = $_POST['list_name'];
    $list_description = $_POST['list_description'];
   




    $sql = "INSERT INTO tbl_lists SET
    list_name = '$list_name',
    list_description = '$list_description'";

    $resulte = mysqli_query($conn, $sql);
    if($resulte==true){
       
        $_SESSION['add'] = "List Added Succssfully";
        header('location:' . SITURL . 'manage-list.php');
        
    }
    else{
      
       $_SESSION['add_fail'] = "Failed to Add List";
       header('location:' . SITURL . 'add-list.php');
    }
}



?>