<?php
if (isset($_POST['input'])) {
    $jurusan = $_POST['jurusan'];
    echo "Jurusan Anda Adalah
    <B><font color='red'>$jurusan</font></B>";
}
?>