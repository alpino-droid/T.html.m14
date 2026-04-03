<?php
if (isset($_POST['input'])) {
    $user = $_POST['nama'];
    $pass = $_POST['password'];
    if ($user == "samkn4malang" && $pass == "123") {
        echo "<h2>Login Berhasil</h2>";
    } else {
        echo "<h2>Login gagal</h2>";
    }
}
?>