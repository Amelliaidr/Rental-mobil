<?php
include ("connection.php");
if (isset($_POST["simpan_pelanggan"])) {
    # data input dari user
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    // insert ke tabel petugas
    $sql = "insert into pelanggan values
    ('','$nama_pelanggan','$alamat_pelanggan','$kontak')";

    if (mysqli_query($connect, $sql)) {
        header("location:daftar-pelanggan.php");
    } else {
        echo mysqli_error($connect);
    }
    
}

else if (isset($_POST["edit_petugas"])) {
        # data yg akan diupdate
        $id_pelanggan = $_POST["id_pelanggan"];
        $nama_pelanggan = $_POST["nama_pelanggan"];
        $alamat_pelanggan = $_POST["alamat_pelanggan"];
        $kontak = $_POST["kontak"];

        if (mysqli_query($connect, $sql)) {
            header("location:daftar-pelanggan.php");
        } else {
            echo mysqli_error($connect);
        }

}

?>