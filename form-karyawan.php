<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Petugas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">Form Karyawan</h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET["id_karyawan"])) {
                    include"connection.php";
                    $id_karyawan = $_GET["id_karyawan"];
                    $sql = "select * from karyawan where id_karyawan= '$id_karyawan'";
                    # eksekusi perintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    #konversi hasil query ke bentuk array
                    $karyawan = mysqli_fetch_array($hasil);
                    ?>

                    <form action="process-karyawan.php" method="post">
                        ID Karyawan
                        <input type="text" name="id_karyawan" 
                        class="form-control mb-2" required 
                        value="<?=($karyawan["id_karyawan"])?>">

                        Nama Karyawan
                        <input type="text" name="nama_karyawan" 
                        class="form-control mb-2" required 
                        value="<?=($karyawan["nama_karyawan"])?>">

                        Alamat
                        <input type="text" name="alamat_karyawan" 
                        class="form-control mb-2" required 
                        value="<?=($karyawan["alamat_karyawan"])?>">

                        Kontak
                        <input type="number" name="kontak" 
                        class="form-control mb-2" required 
                        value="<?=($karyawan["kontak"])?>">

                        Username
                        <input type="text" name="username" 
                        class="form-control mb-2" required 
                        value="<?=($karyawan["username"])?>">

                        Password
                        <input type="password" name="password" 
                        class="form-control mb-2" />

                        <button type="submit" 
                        class="btn btn-success btn block"
                        name="edit_karyawan">
                            Simpan
                        </button>
                    </form>

                    <?php
                }else {
                    ?>
                    <form action="process-karyawan.php" method="post">
                        ID Karyawan
                        <input type="text" name="id_pelanggan" 
                        class="form-control mb-2" required>

                        Nama Karyawan
                        <input type="text" name="nama_karyawan" 
                        class="form-control mb-2" required />

                        Alamat 
                        <input type="text" name="alamat_karyawan" 
                        class="form-control mb-2" required />

                        Kontak
                        <input type="number" name="kontak" 
                        class="form-control mb-2" required />

                        Username
                        <input type="text" name="username" 
                        class="form-control mb-2" required />

                        Password
                        <input type="password" name="password" 
                        class="form-control mb-2" required />

                        <button type="submit" 
                        class="btn btn-success btn block"
                        name="simpan_karyawan">
                            Simpan
                        </button>
                    </form>
                    <?php
                }
                 ?>
            </div>
        </div>
    </div>
</body>
</html>