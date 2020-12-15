<?php

    include "koneksi.php";

    $dataNRP = $_POST['nrp'];

    $delete = mysqli_query($koneksi, "DELETE FROM `mahasiswa` WHERE nrp = '$dataNRP'");