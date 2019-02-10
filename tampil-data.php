<?php
session_start();
include_once 'function.php';
    $user = new sign(); $id = $_SESSION['id'];
    if (!$user->get_session()){
    header("location:login.php");
    }
    if (isset($_GET['keluar'])){
    $user->user_logout();
    header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body >
    <?php
        $db = new database();
    ?>
     <div class="container" style="margin-top: 50px;">
        <div class="row">
            <h1>CRUD OOP PHP</h1>
        </div>
        <div class="row">
            <div class="col-3">
                <h3>Data User</h3>
            </div>
            <div class="col-3">
            
            <a class="btn btn-primary" href="insert-data.php"><i class="fas fa-user-plus"></i> Input Data</a> 
                <a class="btn btn-dark" href="download.php"><i class="fas fa-file-download"></i> download</a>
                
            </div>
            <div class="row">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="submit" name="cari"><i class="fas fa-search"></i> Search</button>
                            </div>
                </div>
            </form>   
            </div>
            
        </div>       
        <div class="row">
            <?php
                if (isset($_POST["cari"])) :
                    include 'search.php';
                elseif(empty($_POST['cari'])):
                    include 'default-data.php';
                endif;
                include 'pagination.php';
            ?>
            <div class="col">
                <?php
                    $file = 'counter.txt';
                    if(file_exists($file)){
                        $file_open = fopen($file, "r");
                        $cek = trim(fgets($file_open, 255));
                        $cek++;
                    }  else {
                        $cek = 1;
                    }
                    $file_open = fopen($file, "w");
                    fwrite($file_open, $cek);
                    fclose($file_open);

                    echo 'Anda pengunjung ke '.$cek;
                    // $hit = new hitCuonter();
                    // $hit->hitung();
                    // //tampilkan 
                    // echo "jumlah pengunjung " . $hit->tampil;
                    // //tampilkan history jika ada
                    // $h = $hit->waktu();
                    // if (!empty($h)) {
                    //     echo "<br>Anda telah mengunjungi halaman ini pada : " . $h;
                    // }
                ?>
            </div>
        </div>
        <a class="btn btn-dark" href="tampil-data.php?keluar=logout"><i class="fas fa-sign-out-alt"></i> Log out</a>
    </div>
    
</body>
</html>
