<?php
$jumlahDataHalaman= 2;
$result = mysqli_query(mysqli_connect("localhost","toor","1","crudOOP"), "SELECT * FROM admin");
$jumlahData = mysqli_num_rows($result);
$jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);
$halamanAktif=(isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
?>