<?php
include 'koneksi.php';

$nis = $_GET['nis'];
$query = "DELETE FROM tb_siswa WHERE nis='$nis'";
$result = mysqli_query($koneksi, $query);
if ($result) {
?>
<script language=""javacript> document.location.href="tampil.php"</script>
<?php
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>