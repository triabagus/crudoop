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

    <a href="insert-data.php">Input Data</a><br><br>
    
    <form action="" method="post">
        <input type="text" name="search" autofocus placeholder="Cari..." autocomplete="off">
        <button type="submit" name="cari">Search</button>
    </form><br>
    
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Akses ID</th>
            <th>Opsi</th>
        </tr>
        <?php
        $no = 1;
        foreach($db->tampil_data() as $x){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['username']; ?></td>
            <td><?php echo $x['pass']; ?></td>
            <td><?php 
                    if($x['akses_id']==1):
                        echo "Admin";
                    elseif($x['akses_id']==2):
                        echo "User";
                    else:
                        echo"Tidak mempunyai jabatan";
                    endif;
                ?>
            </td>
            <td>
                <a href="edit-data.php?id=<?php echo $x['id']; ?>&aksi=update">Edit</a>
                <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus">Hapus</a>			
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>
