<?php
require 'security.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suspects</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">

    <script src="bootstrap-4.2/js/jquery.min.js"></script>
    <script src="bootstrap-4.2/js/popper.min.js"></script>
    <script src="bootstrap-4.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require 'navbar.php';?>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAMES</th>
            <th>IDENTITY</th>
            <th>GENDER</th>
            <th>DATE IN</th>
            <th>TYPE</th>
            <th>DATE RELEASED</th>
        </tr>
        </thead>
        <tbody>
        <!--<tr>
            <td>1</td>
            <td>Kipto Simple</td>
            <td>2554784</td>
            <td>Male</td>
            <td>2019-12-10</td>
            <td>traffic</td>
        </tr>-->
        <?php
        require 'db.php';
        $sql = "SELECT * FROM suspects where date_left  NOT like '0000-00-00%'";
        $results =mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($results))
        {
            extract($row);
            echo "<tr>
            <td>$id</td>
            <td>$names</td>
            <td>$identity</td>
            <td>$gender</td>
            <td>$date</td>
            <td>$type</td>
            <td>$date_left</td>
        </tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>