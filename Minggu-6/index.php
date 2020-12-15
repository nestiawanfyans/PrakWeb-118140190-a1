<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 12 - 118140190 - Nestiawan Ferdiyanto</title>
    <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
    <h2>Tamnah Data</h2>
    <form method="post" id="form_mahasiswa">
        <table>
            <tr>
                <td><label>NRP</label></td>
                <td><input type="text" name="nrp"></td>
            </tr>
            <tr>
                <td><label>Nama</label></td>
                <td><input type="text" name="nama"><br></td>
            </tr>
            <tr>
                <td><label>Alamat</label></td>
                <td><input type="text" name="alamat"><br></td>
            </tr>
            <tr>
                <td><label>Angkatan</label></td>
                <td>
                    <select name="jurusan">
                        <option value="310TL">Telekomunikasi</option>
                        <option value="299EL">Elka</option>
                        <option value="281IT">IT</option>
                        <option value="082ELI">Elin</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
    <button id="btn_tampil">Tambah data</button>

    <br><br>

    <h2>Data Mahasiswa</h2>
    <div id="tampil_data"></div>

    <script>
        $(document).ready(function() {
            $('#tampil_data').load("show.php");

            $('#btn_tampil').click(function() {
                var data = $('#form_mahasiswa').serialize();

                $.ajax({
                    type    : 'POST',
                    url     : "tambah.php",
                    data    : data,

                    success: function(data) {
                        $('#tampil_data').load("show.php");
                    }
                });
            });
        });
    </script>
</body>
</html>