<?php
include ("connection.php");
if (isset($_POST["simpan_karyawan"])) {
    # data input dari user
    $id_karyawan = $_POST["id_karyawan"];
    $nama_karyawan = $_POST["nama_karyawan"];
    $alamat_karyawan = $_POST["alamat_karyawan"];
    $kontak = $_POST["kontak"];
    $username = $_POST["username"];
    $password = sha1 ($_POST["password"]);

    // insert ke tabel karyawan
    $sql = "insert into karyawan values
    ('$id_karyawan','$nama_karyawan','$alamat_karyawan','$kontak','$username','$password')";

    if (mysqli_query($connect, $sql)) {
        header("location:daftar-karyawan.php");
    } else {
        echo mysqli_error($connect);
    }
    
}

else if (isset($_POST["edit_karyawan"])) {
        # data yg akan diupdate
        $id_karyawan = $_POST["id_karyawan"];
        $nama_karyawan = $_POST["nama_karyawan"];
        $alamat_karyawan = $_POST["alamat_karyawan"];
        $kontak = $_POST["kontak"];
        $username = $_POST["username"];

        if (empty($_POST["password"])) {
            $sql = "update karyawan set id_karyawan='$id_karyawan', nama_karyawan='$nama_karyawan',
            kontak ='$kontak', username='$username'
            where id_karyawan='$id_karyawan'";
        }else {
            $password = sha1 ($_POST["passwords"]);
            $sql = "update karyawan set id_karyawan='$id_karyawan', nama_karyawan='$nama_karyawan',
            kontak ='$kontak', username='$username'
            where id_karyawan='$id_karyawan'";
        }

        if (mysqli_query($connect, $sql)) {
            header("location:daftar-karyawan.php");
        } else {
            echo mysqli_error($connect);
        }

}

?>