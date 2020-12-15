<?php 

    include "koneksi.php";

    $nrp        = $_POST['nrp'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $jurusan    = $_POST['jurusan'];

    $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', foto='$foto', jurusan='$jurusan' WHERE nrp='$nrp'");
