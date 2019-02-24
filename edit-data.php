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
<body>
    <?php
        include 'function.php';
        $db = new database();
    ?>
    <div class="container" style="margin-top:50px;">
        <h1>CRUD OOP PHP</h1>
        <h3>Edit Data </h3>
        <form action="proses.php?aksi=update" method="POST" enctype="multipart/form-data">
        <?php
        foreach($db->edit($_GET['id']) as $d){
        ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" value="<?php echo $d['username'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="form-group mx-sm-3 mb-2">
                    <input id="password" type="password" name="password" class="form-control" value="<?php echo $d['pass']?>">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="checkbox" onclick="myViewPass()"> Show Password
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Akses</label>
                <div class="col-sm-10">
                    <select class="form-control" name="akses">
                        <?php if($d['akses_id']== 1){?>
                            <option value=1 selected>Admin</option>
                            <option value=2>User</option>
                        <?php }elseif($d['akses_id']== 2){?>
                            <option value=1>Admin</option>
                            <option value=2 selected>User</option>
                        <?php }?>
                    </select> 
                </div>   
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
                <button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-save"></i> Update</button>
                <a class="btn btn-danger" href="tampil-data.php"><i class="fas fa-backspace"></i> Batal</a>
        <?php } ?>
        </form>
    </div>
   
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
