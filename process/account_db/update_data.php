<?php

    require_once('../../koneksi.php');

    $iduser = $_POST['iduser'];

    $username = $_POST['username'];

    $password = $_POST['password'];
    
    $level = $_POST['level'];

    $query = "UPDATE toko SET username='$username', password='$password',level='$level' WHERE iduser='$iduser'";

    $result = mysqli_query($koneksi,$query);

    if($result == true){
        header("location:../../tampil2.php");
    }

?>
