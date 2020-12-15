<?php 

    include "conenction.php";

    $nrp        = $_POST['nrp'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $foto       = $_POST['foto'];
    $jurusan    = $_POST['jurusan'];

    $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', foto='$foto', jurusan='$jurusan' WHERE nrp='$nrp'");

    // echo $update;
    // return 0;
    
    // if($koneksi->query($update) === TRUE){
        header("location:index.php?updateSuccess=1");
    // } else { echo "gagal : " . $koneksi->error; }
