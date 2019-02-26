<?php
require 'security.php';
if ($_SESSION["user"]["type"]!="admin")
{
 header("location:home.php");
}
require 'db.php';
if (isset($_POST['password']))
{
    extract($_POST);
    $type = isset($admin)? "admin" : "normal";
    $password=crypt($password,"7juipytmklilmn");
    $sql="INSERT INTO `users`(`id`, `names`, `badge_number`, `email`, `password`, `type`) VALUES 
                            (null ,'$names','$badge_number','$email','$password','$type')";
    mysqli_query($conn ,$sql) or die (mysqli_error($conn));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">

    <script src="bootstrap-4.2/js/jquery.min.js"></script>
    <script src="bootstrap-4.2/js/popper.min.js"></script>
    <script src="bootstrap-4.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require 'navbar.php';?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card" style="margin-top: 12px">
                <div class="card-header">
                    Add New User
                </div>
                <div class="card-body">
                    <?php
                    if (isset($message))
                        echo "user added successfully";
                    ?>
                    <form action="admin.php" method="post">
                        <div class="form-group">
                            <label for="email">Names:</label>
                            <input type="text" name="names" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="email">Badge Number :</label>
                            <input type="text" name="badge_number" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" name="email" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" required class="form-control" id="pwd">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="admin" name="admin">Is an Admin?
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Add User</button>
                    </form>
                    <p class="text-danger">
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?>
                    </p>


                </div>
            </div>
        </div>
    </div>
</div>




<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <h2>Users</h2>
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAMES</th>
                    <th>BADGE_NUMBER</th>
                    <th>EMAIL</th>
                    <th>PROMOTE</th>
                    <th>DEMOTE</th>
                </tr>

                <?php
                $sql="select * from users";
                // $conn = mysqli_connect("localhost","root","","php");
                $results = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($results))
                {
                    //var_dump($row);
                    //die();
                    extract($row);
                    echo " <tr>
                    <td>$id</td>
                    <td>$names</td>
                    <td>$badge_number</td>
                    <td>$email</td>
                    <td>$type</td>
                    <td><a href='promote.php' class='btn btn-info'>Promote</a></td>
                    <td> <a href='checkout.php?id=$id' class='btn btn-info btn-sm'>Demote</a></td>
        </tr>";
        }
        ?>

            </table>
        </div>
    </div>
</div>




</body>
</html>