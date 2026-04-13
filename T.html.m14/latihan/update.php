<?php
include 'koneksi.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$query = "UPDATE tb_siswa SET nama='$nama' WHERE nis='$nis'";
$result = mysqli_query($koneksi, $query);
if ($result) {
    echo "Data berhasil diupdate.";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>