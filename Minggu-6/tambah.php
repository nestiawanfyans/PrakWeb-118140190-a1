<?php
    include "koneksi.php";

    $nrp        = $_POST['nrp'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $jurusan    = $_POST['jurusan'];

    $insertData = mysqli_query($koneksi, "INSERT INTO `mahasiswa` VALUES ('$nrp', '$nama', '$alamat', '$jurusan')");

    json_encode($insertData);
    exit;

?>