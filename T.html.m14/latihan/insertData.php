<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

        <table>

        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><input type="text" name="nis"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="reset">Reset</button></td>
            <td><input type="submit" value="Kirim" name="kirim"></td>
        </tr>

        </table>

    </form>
</body>
</html>

<?php
 @$nis = $_POST['nis'];
 @$nama = $_POST['nama'];
 @$kirim = $_POST['kirim'];
 @$query = "INSERT INTO tb_siswa VALUES ('$nis', '$nama')";

 if ($kirim) {
    $result = mysqli_query($koneksi, $query);
    echo "Data berhasil disimpan.";
    echo "<a href='tampil.php'>Lihat data</a>";
 }

?>