<?php
include 'koneksi.php';

// Hapus data
if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM siswa WHERE id=$id");
    header("Location: index.php");
}

// Ambil data untuk edit
$edit_data = null;
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE id=$id");
    $edit_data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Ekstrakurikuler</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2> PENDAFTARAN EKSTRAKURIKULER</h2>
        
        <!-- FORM TAMBAH/EDIT -->
        <form action="proses.php" method="POST">
            <?php if($edit_data): ?>
                <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
            <?php endif; ?>
            
            <div class="form-row">
                <div>
                    <div class="form-group">
                        <label>NIS *</label>
                        <input type="text" name="nis" value="<?= $edit_data['nis'] ?? '' ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Lengkap *</label>
                        <input type="text" name="nama" value="<?= $edit_data['nama'] ?? '' ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Kelas *</label>
                        <select name="kelas" required>
                            <option value="">Pilih</option>
                            <option <?= ($edit_data['kelas'] ?? '') == 'X' ? 'selected' : '' ?>>X</option>
                            <option <?= ($edit_data['kelas'] ?? '') == 'XI' ? 'selected' : '' ?>>XI</option>
                            <option <?= ($edit_data['kelas'] ?? '') == 'XII' ? 'selected' : '' ?>>XII</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Lahir *</label>
                        <input type="date" name="ttl" value="<?= $edit_data['ttl'] ?? '' ?>" required>
                    </div>
                </div>
                
                <div>
                    <div class="form-group">
                        <label>Alamat *</label>
                        <textarea name="alamat" required><?= $edit_data['alamat'] ?? '' ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Kota *</label>
                        <input type="text" name="kota" value="<?= $edit_data['kota'] ?? '' ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Jenis Kelamin *</label>
                        <div class="jk-group">
                            <label><input type="radio" name="jk" value="Laki-Laki" <?= ($edit_data['jk'] ?? '') == 'Laki-Laki' ? 'checked' : '' ?>> Laki-Laki</label>
                            <label><input type="radio" name="jk" value="Perempuan" <?= ($edit_data['jk'] ?? '') == 'Perempuan' ? 'checked' : '' ?>> Perempuan</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Hobby</label>
                <div class="hobby-group">
                    <label><input type="checkbox" name="hobi[]" value="Membaca" <?= strpos($edit_data['hobi'] ?? '', 'Membaca') !== false ? 'checked' : '' ?>> Membaca</label>
                    <label><input type="checkbox" name="hobi[]" value="Olahraga" <?= strpos($edit_data['hobi'] ?? '', 'Olahraga') !== false ? 'checked' : '' ?>> Olahraga</label>
                    <label><input type="checkbox" name="hobi[]" value="Menyanyi" <?= strpos($edit_data['hobi'] ?? '', 'Menyanyi') !== false ? 'checked' : '' ?>> Menyanyi</label>
                    <label><input type="checkbox" name="hobi[]" value="Menari" <?= strpos($edit_data['hobi'] ?? '', 'Menari') !== false ? 'checked' : '' ?>> Menari</label>
                    <label><input type="checkbox" name="hobi[]" value="Traveling" <?= strpos($edit_data['hobi'] ?? '', 'Traveling') !== false ? 'checked' : '' ?>> Traveling</label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Pilih Ekstrakurikuler *</label>
                <div class="ekskul-group">
                    <label><input type="radio" name="ekskul" value="Pramuka" <?= ($edit_data['ekskul'] ?? '') == 'Pramuka' ? 'checked' : '' ?>> Pramuka</label>
                    <label><input type="radio" name="ekskul" value="Basket" <?= ($edit_data['ekskul'] ?? '') == 'Basket' ? 'checked' : '' ?>> Basket</label>
                    <label><input type="radio" name="ekskul" value="Volly Band" <?= ($edit_data['ekskul'] ?? '') == 'Volly Band' ? 'checked' : '' ?>> Volly Band</label>
                    <label><input type="radio" name="ekskul" value="Seni Tari" <?= ($edit_data['ekskul'] ?? '') == 'Seni Tari' ? 'checked' : '' ?>> Seni Tari</label>
                    <label><input type="radio" name="ekskul" value="Robotic" <?= ($edit_data['ekskul'] ?? '') == 'Robotic' ? 'checked' : '' ?>> Robotic</label>
                    <label><input type="radio" name="ekskul" value="Bulu Tangkis" <?= ($edit_data['ekskul'] ?? '') == 'Bulu Tangkis' ? 'checked' : '' ?>> Bulu Tangkis</label>
                </div>
            </div>
            
            <button type="submit"><?= $edit_data ? 'UPDATE' : 'SIMPAN' ?></button>
            <?php if($edit_data): ?>
                <a href="index.php" class="btn-batal" style="display: inline-block; padding: 10px 20px; background: #999; color: white; text-decoration: none; border-radius: 5px;">BATAL</a>
            <?php endif; ?>
        </form>
        
        <hr>
        
        <!-- TABEL DATA -->
        <h3>Data Pendaftar</h3>
        <table>
            <thead>
                <tr>
                    <th>NIS</th><th>Nama</th><th>Kelas</th><th>JK</th><th>Ekskul</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td><?= $row['nis'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['kelas'] ?></td>
                    <td><?= $row['jk'] ?></td>
                    <td><?= $row['ekskul'] ?></td>
                    <td>
                        <a href="?edit=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                        <a href="?hapus=<?= $row['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>