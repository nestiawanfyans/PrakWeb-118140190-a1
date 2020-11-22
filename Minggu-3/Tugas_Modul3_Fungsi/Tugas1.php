<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 Fungsi - Menghitung biaya perkarakter</title>

    <style>
        .center-item {
            margin: 5rem auto;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    <div class="text-center mt-5">
        <h2>Menghitung Faktorial</h2>
    </div>

    
    <div class="center-item w-25">
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Angka</label>
                <input type="number" name="nilai" value="<?php if(isset($_POST['nilai'])){ echo $_POST['nilai'];} ?>" class="form-control">
            </div>
            <input type="submit" class="w-100 btn btn-primary" name="submitData" value="Hitung">
        </form> 
    </div>  


    <?php 
    
        function faktorial($nilai)
        {
            $total = 1;

            for ($i=1; $i <= $nilai; $i++) { 
                $total *= $i;
            }

            return $total;
        }

        if(isset($_POST['nilai'])){

            $nilai  =$_POST['nilai'];

            if($_POST['nilai'] == null){
                $nilai = 0;
            }

            $faktorial = faktorial($nilai);

    ?>

        <div style="text-align:center;">
            <h3>Hasilnya adalah : <?php echo $faktorial; ?> </h3>
        </div>

    <?php
        }
    ?>

</body>
</html>