<?php
include_once 'lib/config.php';
include_once 'lib/Database.php';

$db = new Database();

?>
<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="inc/bootstrap.min.css">
    <link rel="stylesheet" href="inc/jquery.min.js">
    <link rel="stylesheet" href="inc/bootstrap.min.js">
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row mt-5 bg-secondary p-3">
                <div class="col-md-12">
                    <h2 class="text-center text-light">CRUD Manage <b>Employees</b></h2>
                </div>
            </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <a href="create.php" class="btn btn-success" ><span>Add New Employee</span></a>
                        </div>
                    </div>
                </div>
                    <?php
                        if (isset($_GET['msg'])){
                            ?>
                            <div class="alert alert-success" role="alert">
                                Success! <?=$_GET['msg'];?>
                            </div>

                    <?php
                        }
                    ?>

                <table class="table table-hover table-bordered mt-3">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>SKILLS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        $query = "SELECT * FROM `users` ORDER BY id DESC";
                        $getUser = $db->select($query);
                        if ($getUser){
                            $i = 0;
                            while ($userData = $getUser->fetch_assoc()){
                                $i++;

                      ?>
                        <tr>
                            <td><?=$i; ?></td>
                            <td><?=$userData['name'];?></td>
                            <td><?=$userData['email'];?></td>
                            <td><?=$userData['skill'];?></td>
                            <td><a href="update.php?id=<?= base64_encode($userData['id']);?>" class="btn btn-sm btn-warning">Edit</a> ||
                                <a Onclick="return ConfirmDelete()" href="delete.php?id=<?php echo base64_encode($userData['id']);?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                            }

                        }else{
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Data not Found!
                            </div>
                    <?php
                        }
                    ?>



                    </tbody>
                </table>
            </div>
    </div>

</body>
</html>