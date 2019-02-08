<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>
    <?php
        include 'function.php';
        $db = new database();
    ?>
    <h1>CRUD OOP PHP</h1>
    <h3>Data User</h3>
    <a href="download.php">download</a><br>
    <a href="insert-data.php">Input Data</a><br><br>
    
    <form action="" method="post">
        <input type="text" name="search" placeholder="Cari...">
        <button type="submit" name="cari">Search</button>
    </form><br>
    <?php
    include 'pagination.php';
        if (isset($_POST["cari"])) :
            include 'search.php';
        elseif(empty($_POST['cari'])):
            include 'default-data.php';
        endif;
    ?>
    <?php
        // $file = 'counter.txt';
        // if(file_exists($file)){
        //     $file_open = fopen($file, "r");
        //     $cek = trim(fgets($file_open, 255));
        //     $cek++;
        // }  else {
        //     $cek = 1;
        // }
        // $file_open = fopen($file, "w");
        // fwrite($file_open, $cek);
        // fclose($file_open);

        // echo 'Anda pengunjung ke '.$cek;
    ?>
    <br><br>
    
</body>
</html>
