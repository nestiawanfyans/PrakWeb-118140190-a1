<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5 mb-5">

        <?php if(isset($_GET['insertData']) && $_GET['insertData'] == 1){ ?>
            <div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data.
            </div>
        <?php } ?>

        <form action="insert.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">NRP</label>
                <input type="text" name="nrp" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Foto</label>
                <input type="file" name="foto" class="form-control">
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
            <input type="submit" class="w-100 btn btn-primary" name="submitData" value="Tambah Data">
        </form>
    </div>

<hr>

    <h3 class="text-center mt-5">Cari Nama</h3>

    <div class="container mt-2 mb-5">
        <?php if(isset($_GET['delete']) && $_GET['delete'] == 1){ ?>
            <div class="alert alert-success" role="alert">
                Berhasil Menghapus Data.
            </div>
        <?php } ?>

        <?php if(isset($_GET['updateSuccess']) && $_GET['updateSuccess'] == 1){ ?>
            <div class="alert alert-success" role="alert">
                Berhasil Memperbaharui Data.
            </div>
        <?php } ?>

        <?php include 'conenction.php'; 

            if(isset($_GET['search'])){
                $cari = $_GET['search']; 
                $getData = mysqli_query($koneksi, "SELECT * FROM mahasiswa JOIN jurusan ON mahasiswa.jurusan = jurusan.ID_Jur WHERE nama LIKE '%".$cari."%'") or die(mysqli_error());
            } else {
                $getData = mysqli_query($koneksi, "SELECT * FROM mahasiswa, jurusan WHERE mahasiswa.jurusan = jurusan.ID_Jur ") or die(mysqli_error());
            }
        ?>

        <br>

        <form action="" method="get" class="mb-5">
            <div class="form-group w-100">
                <input type="text" name="search" placeholder="Cari Nama" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" class="form-control">
            </div>
            <input class="w-100 btn btn-primary" type="submit" value="cari">
        </form>


        <table class="table">
            <tr>
                <th>NRP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>

            <?php while($data = mysqli_fetch_array($getData)){ ?>
                <tr>
                    <th> <?php echo $data['nrp'] ?> </th>
                    <th> <?php echo $data['nama'] ?> </th>
                    <th> <?php echo $data['alamat'] ?> </th>
                    <th> <?php echo $data['foto'] ?> </th>
                    <th> <?php echo $data['Nama_Jurusan'] ?> </th>
                    <th> 
                    <a href="delete.php?nomor=<?php echo $data['nrp']; ?>"> Delete </a> ||
                    <a href="update.php?nrp=<?php echo $data['nrp']; ?>"> edit </a>
                    </th>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>
</html>