<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">Data Pelanggan</h4>
            </div>

            <div class="card-body">
                <!--kotak pencarian data karyawan-->
                <form action="daftar-karyawan.php" method="get">
                    <input type="text" name="search" 
                    class="form-control mb-2"
                    placeholder="Masukkan Keyword" required/>
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pada saat load halaman ini
                        # akan mengecek apakah ada data dengan method 
                        # get yang bernama search

                        $search = $_GET["search"];
                        $sql = "select * from karyawan where id_keryawan like '%$search%'
                        or nama_karyawan like '%$search%'
                        or alamat_karyawan like '%$search%'
                        or username like '%$search%'  
                        or kontak like '%$search%' ";
                    }else{
                        $sql = "select * from karyawan";
                    }

                    //eksekusi perintah sql
                    $query = mysqli_query ($connect, $sql);
                    while($karyawan = mysqli_fetch_array($query)) { ?>

                    <li class="list-group-item">
                        <div class="row">
                            <!--bagian data karyawan-->
                            <div class="col-lg-8 col-md-10">
                                <h5>Nama Karyawan: <?php echo $petugas["nama_karyawan"] ?></h5>
                                <h6>Username: <?php echo $petugas["username"] ?></h6>
                                <h6>Kontak: <?php echo $petugas["kontak"] ?></h6>
                                <h6>ID Karyawan: <?php echo $petugas["id_karyawan"] ?></h6>
                            </div>
                            <!--bagian tombol-->
                            <div class="col-lg-4 col-md-2">
                                <a href="form-karyawan.php?id_karyawan=<?=$petugas["id_karyawan"]?>">
                                <button class="btn btn-info btn-block">
                                    Edit
                                </button>
                                </a>
                                <div class="card-footer">
                                    <a href="delete-karyawan.php?id_karyawan=<?=$petugas["id_karyawan"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">
                                </div>
                                <button class="btn btn-block btn-danger">
                                    Hapus
                                </button>
                                    </a>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-petugas.php">
                    <button class="btn btn-success">Tambah Data Petugas</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>