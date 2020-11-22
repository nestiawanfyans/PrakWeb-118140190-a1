<?php 

    include "conenction.php";

    $nrp        = $_POST['nrp'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $foto       = $_POST['foto'];
    $jurusan    = $_POST['jurusan'];

    $insertData = mysqli_query($koneksi, "INSERT INTO `mahasiswa` VALUES ('$nrp', '$nama', '$alamat', '$foto', '$jurusan')");

    header("location:index.php?insertData=1");

    // echo "berhasil";
    // return 0;