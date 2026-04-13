<?php
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $jk = $_POST['jk'];
    $hobi = isset($_POST['hobi']) ? implode(",", $_POST['hobi']) : '';
    $ekskul = $_POST['ekskul'];
    
    if(isset($_POST['id'])) {
        // UPDATE
        $id = $_POST['id'];
        $query = "UPDATE siswa SET 
                  nis='$nis', nama='$nama', kelas='$kelas', ttl='$ttl', 
                  alamat='$alamat', kota='$kota', jk='$jk', hobi='$hobi', ekskul='$ekskul' 
                  WHERE id=$id";
    } else {
        // INSERT
        $query = "INSERT INTO siswa (nis, nama, kelas, ttl, alamat, kota, jk, hobi, ekskul) 
                  VALUES ('$nis', '$nama', '$kelas', '$ttl', '$alamat', '$kota', '$jk', '$hobi', '$ekskul')";
    }
    
    if(mysqli_query($conn, $query)) {
        header("Location: tampil.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>