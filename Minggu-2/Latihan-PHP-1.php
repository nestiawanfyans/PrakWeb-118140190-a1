<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>118140190 - Nestiawan Ferdiyanto - Tugas PW - Minggu 07</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    

    <div class="container">
        <h2 class="text-center mt-5 mb-5">Kalkulator</h2>
        
        <form method="post" class="text-align:center;justify-content:center;">
            <div class="d-flex">
                <div class="form-group m-3 w-50">
                    <label for="">Angka Pertama</label>
                    <input type="number" name="satu" value="<?php if(isset($_POST['submit'])){ echo $_POST['satu']; }?>" class="form-control">
                </div>
                <div class="form-group m-3 w-50">
                    <label for="">Angka Kedua</label>
                    <input type="number" name="dua" value="<?php if(isset($_POST['submit'])){ echo $_POST['dua']; }?>" class="form-control">
                </div>
            </div>
            <input type="submit" name="submit" value="Hitung" class="w-100 btn btn-primary"/>
        </form>
    </div>

    <div class="container mt-5 mb-5">
    <?php 
        if(isset($_POST['submit']) && $_POST['satu'] != "" && $_POST['dua'] != ""){
        $operator = ['+', '-', '*', '/', '%'];
        $data = [ $_POST['satu'], $_POST['dua'] ]; 
    ?>
        
        <?php foreach($data as $key => $datas){ ?>
            <p>Bilangan <?php echo $key + 1; ?> = <?php echo $datas; ?></p>
        <?php } ?>

        <p>Berikut Merupakan hasil dari setiap Operasi :</p>

        <p>
            <?php
                foreach($operator as $operators){
                    switch ($operators) {
                        case '+':
                            echo "PENJUMLAHAN" . "<br>";
                            echo "Operator : " . $operators . "<br>";
                            echo "Hasil : " . ($data[0] + $data[1]) . "<br><br>";
                            break;

                        case '-':
                            echo "PEGURANGAN" . "<br>";
                            echo "Operator : " . $operators . "<br>";
                            echo "Hasil : " . ($data[0] - $data[1]) . "<br><br>";
                            break;
                        
                        case '*':
                            echo "PERKALIAN" . "<br>";
                            echo "Operator : " . $operators . "<br>";
                            echo "Hasil : " . ($data[0] * $data[1]) . "<br><br>";
                            break;

                        case '/':
                            echo "PEMBAGIAN" . "<br>";
                            echo "Operator : " . $operators . "<br>";
                            echo "Hasil : " . ($data[0] / $data[1]) . "<br><br>";
                            break;

                        case '%':
                            echo "MODULUS" . "<br>";
                            echo "Operator : " . $operators . "<br>";
                            echo "Hasil : " . ($data[0] % $data[1]) . "<br><br>";
                            break;
                    }
                }
            ?>
        </p>

    <?php } else { echo "Silakan Masukkan Angka..."; } ?>
    </div>

</body>
</html>