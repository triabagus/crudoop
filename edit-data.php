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
    <h3>Edit Data</h3>

    <form action="proses.php?aksi=update" method="post">
    <?php
    foreach($db->edit($_GET['id']) as $d){
    ?>
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                <input type="text" name="username" value="<?php echo $d['username'] ?>">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input id="password" type="password" name="password" value="<?php echo $d['pass']?>"><input type="checkbox" onclick="myViewPass()">Show Password</td>
        </tr>
        <tr>
            <td>Hak Akses</td>
            <td>
                <select name="akses">
                <?php if($d['akses_id']== 1){?>
                    <option value=1 selected>Admin</option>
                    <option value=2>User</option>
                <?php }elseif($d['akses_id']== 2){?>
                    <option value=1>Admin</option>
                    <option value=2 selected>User</option>
                <?php }?>
                </select> 
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Update</button></td>
        </tr>
    </table>
    <?php } ?>
    </form>
    
    <script>
    function myViewPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>
</body>
</html>