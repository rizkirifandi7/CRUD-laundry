<?php
    require_once('../../koneksi.php');

    $iduser = $_POST['iduser'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql = "INSERT INTO toko(username,password,level) VALUES ('$username','$password','$level')";
    $result = $koneksi->query($sql);
    //query

    if ($result) {
        header("location:../../tampil2.php");
    }
    else{
        echo "Failed". mysqli_error($koneksi);
    }

?>
