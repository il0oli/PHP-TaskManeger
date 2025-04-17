<?php

require_once('config/database.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="<?php echo SITURL; ?>css/style.css">
</head>

<body>
<div class="wrapper">
    <h1>TASK MANAGER</h1>
    <a class="btn2" href="<?php echo SITURL; ?>index.php">Home</a>
    <h3>Manage Lists Page</h3>
    <p>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];

            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];

            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['delete_fail'])) {
            echo $_SESSION['delete_fail'];

            unset($_SESSION['delete_fail']);
        }

        ?>

    </p>
    <div class="all-lists">
        <a class="btn " href="<?php echo SITURL; ?>add-list.php">Add list</a>
        <table class="tbl-half">
            <tr>
                <th>NO.</th>
                <th>list Name</th>
                <th>Actions</th>

            </tr>
            <?php

            


            $sql = "SELECT * FROM tbl_lists";

            $resulte = mysqli_query($conn, $sql);
            if ($resulte == true) {
                $count_rows = mysqli_num_rows($resulte);
                $sn = 1;
                if ($count_rows > 0) {
                    while ($row = mysqli_fetch_assoc($resulte)) {
                        $list_id = $row['list_id'];
                        $list_name = $row['list_name'];
                        ?>
                        <tr>
                            <td><?php echo $sn++ ?> </td>
                            <td><?php echo $list_name ?></td>
                            <td>
                                <a class="btn3" href="<?php echo SITURL; ?>update-list.php?update=<?php echo $list_id;?>"> Update </a>
                                <a class="btn4" href="<?php echo SITURL; ?>delete-list.php?delete=<?php echo $list_id;?>"> Delete </a>

                            </td>

                        </tr>
                        <?php
                    }
                } else {

                    ?>
                    <tr>
                        <td colspan="3">No list Added Yet.</td>
                    </tr>
                    <?php
                }
            }


            ?>



        </table>
    </div>
    </body>

</html>