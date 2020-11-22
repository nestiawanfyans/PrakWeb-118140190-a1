<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

        <?php include 'conenction.php'; 
        
            $nrp = $_GET['nrp'];

            $getData = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nrp = '$nrp'") or die(mysqli_error());
        ?>

    
    <div class="container mt-5">
        <?php while($data = mysqli_fetch_array($getData)){ ?>

            <form action="updatePost.php" method="post">
                <div class="form-group" style="display:none;">
                    <label for="exampleInputEmail1">NRP</label>
                    <input type="text" name="nrp" value="<?php echo $data['nrp'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Foto</label>
                    <input type="file" name="foto" value="<?php echo $data['foto'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jurusan</label>
                    <select class="form-control" name="jurusan">
                        <option value="310TL">Telekomunikasi</option>
                        <option value="299EL">Elka</option>
                        <option value="281IT">IT</option>
                        <option value="082ELI">Elin</option>
                    </select>
                </div>
                <input type="submit" class="w-100 btn btn-primary" name="submitData" value="Update Data">
            </form>

        <?php } ?>
    </div>
</body>
</html>