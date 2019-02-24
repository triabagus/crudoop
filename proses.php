<?php
    include 'function.php';
    $db = new database();
    
    $aksi=$_GET['aksi'];
        if ($aksi=="tambah") {
            $namafolder="img/";
            $gambar = $namafolder . basename($_FILES['file']['name']);
            
            if (move_uploaded_file($_FILES['file']['tmp_name'], $gambar)):
                $db->insert($_POST["username"],$_POST["password"],$_POST["akses"],$gambar);
                header("location:tampil-data.php");  
            else:
                echo $gambar;
            endif; 
        }elseif($aksi == "hapus"){ 	
            $db->hapus($_GET['id']);
           header("location:tampil-data.php");
        }elseif($aksi == "update"){
            if(!empty($_FILES['file']['tmp_name'])){
                $namafolder="img/";
                $gambar = $namafolder . basename($_FILES['file']['name']);
                
                if (move_uploaded_file($_FILES['file']['tmp_name'], $gambar)):
                    $db->update($_POST['id'],$_POST['username'],$_POST['password'],$_POST['akses'],$gambar);
                    header("location:tampil-data.php");
                else:
                    echo $gambar;
                endif; 
            }else{
                $db->updateNoImage($_POST['id'],$_POST['username'],$_POST['password'],$_POST['akses']);
                    header("location:tampil-data.php");
            }
        }elseif($aksi == "like"){
            $db->like($_GET['id']);
            header("location:tampil-data.php");
        }elseif($aksi == "download"){
            $db->download($_GET['id']);
            header("location:tampil-data.php");
        }
?>