<?php
include 'koneksi.php';

$nis = $_GET['nis'];
$query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
?>

<form action="update.php" method="post">

    <table border="1">

        <tr>
            <td>Nis</td>
            <td>:</td>
            <td><input type="text" name="nis" value="<?php echo $data['nis'];?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama'];?>"></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <button type="submit">Update</button>
                <button type="reset">Reset</button>
            </td> 
        </tr>
        

    </table>

</form>