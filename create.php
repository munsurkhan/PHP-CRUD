<?php
include_once 'lib/config.php';
include_once 'lib/Database.php';

$db = new Database();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="inc/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row mt-5 bg-secondary p-3">
                <div class="col-md-12">
                    <h2 class="text-light text-center">CRUD Manage <b>Employees</b></h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <a href="index.php" class="btn btn-success" ><span>View All List</span></a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md 12">

                <?php
                    if (isset($_POST['submit'])){
                        $name = mysqli_real_escape_string($db->link,$_POST['name']);
                        $email = mysqli_real_escape_string($db->link,$_POST['email']);
                        $skill = mysqli_real_escape_string($db->link,$_POST['skill']);
                        if ($name == '' || $email == '' || $skill == ''){
                           $inputErr = "<span class='p-3 bg-danger text-white'>Field must not be empty</span>";
                        }else{
                            $query = "INSERT INTO `users`(`name`, `email`, `skill`) VALUES ('$name','$email','$skill')";
                            $inserData = $db->insert($query);
                       }
                    }
                ?>

                <?php
                    if (isset($inputErr)){
                        echo $inputErr;
                    }
                ?>

                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Name" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter Email" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="skill" class="col-sm-2 col-form-label">Skill</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="skill" name="skill" placeholder="Enter Skill" >
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="col-sm-2">
                            <input type="submit" class="form-control btn btn-primary" name="submit" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>