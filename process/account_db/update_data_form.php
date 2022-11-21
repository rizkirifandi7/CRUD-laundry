<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style-beta.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

    <?php

        require_once('../../koneksi.php');
        $iduser = $_GET['id'];
        $query = "SELECT * FROM toko WHERE iduser='$iduser'";
        $result = mysqli_query($koneksi,$query);
        $row = mysqli_fetch_assoc($result);

    ?>

    <div class="container">
        <div class="card bg-white mt-4 w-75  position-absolute top-50 start-50 translate-middle" id="form-body">
            <div class="card-header bg-white">Update Account</div>
            <div class="card-body">
                <form method="post" action="update_data.php">
                    <input type="hidden" value="<?php echo $row['iduser']; ?>" name="iduser">
                    <div class="form-group">
                        <label>Username </label>
                        <input type="text" value="<?php echo $row['username']; ?>" class="form-control" name="username" placeholder="Enter Name">
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="text" value="<?php echo $row['password']; ?>" class="form-control" name="password" placeholder="Enter Email">
                    </div>
                    <div class="form-group mt-2">
                        <label>Level</label>
                        <input type="level" value="<?php echo $row['level']; ?>" class="form-control" name="level" placeholder="Enter Level">
                    </div>
                    <button type="submit" class="btn btn-edit mt-4" id="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
