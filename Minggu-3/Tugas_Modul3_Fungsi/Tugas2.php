<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 Fungsi - Menghitung biaya perkarakter</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    <div class="text-center mt-5">
        <h2>Menghitung Biaya Perkarakter</h2>
    </div>

    
    <div class="container p-5">
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Kata</label>
                <input type="text" name="string" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pilih tampilan Warna</label>
                <input type="color" name="color" value="#ff0000" class="form-control">
            </div>
            <input type="submit" class="w-100 btn btn-primary" name="submitData" value="Lihat Harga">
        </form> 
    </div>  


    <?php 

        function loopCost($string, $cost)
        {
            $total = 0;

            for ($i=0; $i < $string ; $i++) { 
                $total += $cost;
            }

            return $total;
        }
    
        function characterCost($string, $color)
        {
            $nama   = $string;
            $string = strlen($string);
            $total  = 0;

            if ($string >= 1 && $string <= 10) {
                $total = loopCost($string, 300);
            } else  if ($string >= 11 && $string <= 20) {
                $total = loopCost($string, 500);
            } else  if ($string > 20) {
                $total = loopCost($string, 700);
            }
        ?>

            <div class="container p-5" style="color:<?php echo $color; ?>;">
                <p>Nama : <?php echo $nama; ?></p>
                <h4> Total yang Harus dibayar adalah : <?php echo $total; ?> </h4>
            </div>

        <?php
        }

        if (isset($_POST['string']) && isset($_POST['color'])) {
            characterCost($_POST['string'], $_POST['color']);
        }
    
    ?>

</body>
</html>