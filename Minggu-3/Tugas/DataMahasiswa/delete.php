<?php

    include "conenction.php";

    $dataNRP = $_GET['nomor'];

    $delete = mysqli_query($koneksi, "DELETE FROM `mahasiswa` WHERE nrp = '$dataNRP'");

    header("location:index.php?delete=1");