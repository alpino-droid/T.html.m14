<?php
include 'koneksi.php';

$nis = $_GET['id'];
$query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($result);

?>

<table border="1">

    <tr><td>NIS</td><td>:</td><td><?php echo $data['nis'];?></td></tr>
    <tr><td>Nama</td><td>:</td><td><?php echo $data['nama'];?></td></tr>

    

</table>