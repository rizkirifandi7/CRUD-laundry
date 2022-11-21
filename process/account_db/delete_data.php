<?php

    require_once('../../koneksi.php');

    $iduser = $_GET['id'];

    $query = "DELETE FROM toko WHERE iduser='$iduser'";

    $result = mysqli_query($koneksi,$query);

    if($result == true){
        header("location:../../tampil2.php");
    }

?>
