<?php
if (isset($_POST['inout'])) {
    $jurusan = $_POST['jurusan'];
    echo "Jurusan Anda Adalah
    <B><font color='red'>$jurusan</font></B>";
}
?>