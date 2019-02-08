<?php
    include 'function.php';
    $db = new database();

    $aksi=$_GET['aksi'];
        if ($aksi=="tambah") {
            $db->insert($_POST["username"],$_POST["password"],$_POST["akses"]);
            header("location:tampil-data.php");
        }elseif($aksi == "hapus"){ 	
            $db->hapus($_GET['id']);
           header("location:tampil-data.php");
        }elseif($aksi == "update"){
            $db->update($_POST['id'],$_POST['username'],$_POST['password'],$_POST['akses']);
            header("location:tampil-data.php");
        }elseif($aksi == "like"){
            $db->like($_GET['id']);
            header("location:tampil-data.php");
        }
?>