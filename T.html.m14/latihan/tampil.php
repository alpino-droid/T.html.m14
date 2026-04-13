<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil data</title>
</head>
<body>
    
    <table border="1">

        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>Nama</th>
            <th colspan="3">Action</th>
        </tr>


        <?php
        $query = "SELECT * FROM tb_siswa";
        $result = mysqli_query($koneksi, $query);
        $no = 1;
        $jum = mysqli_num_rows($result);
        echo "Jumlah data: " . $jum . "<br>";
        while ($data = mysqli_fetch_array($result)) {
        ?>
        <tr>

            <td><?php echo $no++;?></td>
            <td><?php echo $data['nis'];?></td>
            <td><?php echo $data['nama'];?></td>
            <td><a href="edit.php?nis=<?php echo $data['nis'];?>">Edit</a></td>
            <td><a href="delete.php?nis=<?php echo $data['nis'];?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a></td>
            <td><a href="detail.php?id=<?php echo $data['nis'];?>">Detail</a></td>

        </tr>

    
        
        <?php
        }
        ?>
        
    </table>
        <a href="insertData.php"><button>Tambah Data</button></a>
</body>
</html>