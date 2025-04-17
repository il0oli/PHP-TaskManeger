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

    <div class="menu">

        <a href="<?php echo SITURL; ?>index.php">All Task</a>
        <?php

        $sql = "SELECT * FROM tbl_lists";
        $result = mysqli_query($conn, $sql);

        if($result==true)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $list_id = $row['list_id'];
                $list_name = $row['list_name'];
                ?>
                <a href="<?php echo SITURL; ?>list-task.php?list_id=<?php echo $list_id; ?>"><?php echo $list_name; ?></a>
                <?php
            }
        }
        
        ?>
       



        <a class="btn2" href="<?php echo SITURL; ?>manage-list.php">Manage Lists</a>
    </div>

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
    <div class="all-tasks">
        <a class="btn" href="<?php SITURL; ?>add-task.php">Add-tasks</a>
        <table class="tbl-full">
            <tr>
                <th>NO.</th>
                <th>Task Name</th>
                <th>Priority</th>
                <th>Deadline</th>
                <th>Actions</th>

            </tr>
            <?php

            $sql = "SELECT * FROM tbl_tasks";
            $resulte = mysqli_query($conn, $sql);
            if ($resulte == true) {
                $count_rows = mysqli_num_rows($resulte);
                $sn = 1;
                if ($count_rows > 0) {
                    while ($row = mysqli_fetch_assoc($resulte)) {
                        $task_id = $row['task_id'];
                        $task_name = $row['task_name'];
                        $priority = $row['priority'];
                        $deadline = $row['deadline'];
                            ?>
                        <tr>
                        <td> <?php echo $sn++; ?> </td>
                        <td><?php echo $task_name; ?></td>
                        <td><?php echo $priority; ?></td>
                        <td><?php echo $deadline; ?></td>
                        <td>
                            <a class="btn3" href="<?php echo SITURL; ?>update-task.php?update=<?php echo $task_id;?>"> Update </a>
                            <a class="btn4" href="<?php echo SITURL; ?>delete-task.php?delete=<?php echo $task_id;?>"> Delete </a>
        
                        </td>
        
                    </tr>
                            <?php

                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5">No Task Added Yet.</td>
                    </tr>
                    <?php
                }
            }

            ?>
            


        </table>


    </div>
    </div>
</body>

</html>