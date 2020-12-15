<table border="1" cellpadding="5px">
    <tr>
        <th>No</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>jurusan</th>
        <th>Aksi</th>
    </tr>
    <?php
        include "koneksi.php";

        $hasil = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        $no = 0;

        foreach ($hasil as $key => $data) {
            $no++;
    ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nrp']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['jurusan']; ?></td>
                <td>
                    <button id="<?php echo $data['nrp']; ?>" class="edit"> Edit </button>
                    <button id="<?php echo $data['nrp']; ?>" class="hapus"> Hapus </button>
                </td>
            </tr>
    <?php } ?>
</table>
<script type='text/javascript'>
    $(document).on('click', '.hapus', function() {
        var id = $(this).attr('id');

        $.ajax({
            type    : 'POST',
            url     : "hapus.php",
            data: {
                nrp : id
            },

            success: function() {
                $('#tampil_data').load("show.php"); 
            },
             
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });

    $(document).on('click', '.edit', function() {

        var nrp         = $(this).attr('id');
        var nama        = document.getElementsByName('nama').value;
        var alamat      = document.getElementsByName('alamat').value;
        var jurusan     = document.getElementsByName('jurusan').value;

        $.ajax({
            type: 'POST',
            url: "update.php",
            data: {
                nrp     : nrp,
                nama    : nama,
                alamat  : alamat,
                jurusan : jurusan

            },

            success: function() {
                $('#tampil_data').load("show.php");
            },

            error: function(response) {
                console.log(response.responseText);
            }
        });
    });
</script>