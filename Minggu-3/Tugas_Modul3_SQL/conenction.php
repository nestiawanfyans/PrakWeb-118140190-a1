<?php 

    $server     = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "data_mahasiswa";

    $koneksi = mysqli_connect($server, $username, $password, $database);

    if(mysqli_connect_errno()){
        echo "Koneksi ke database error. Code Error : " . mysqli_connect_error();
    }