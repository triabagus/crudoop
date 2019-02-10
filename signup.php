<?php  
    include_once 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" language="javascript">
        function submitReg(){
            var form    = document.reg;
            if(form.username.value == ""){
                alert("Masukkan Username");
                return false;
            }else if(form.password.value ==""){
                alert("Masukkan Password");
                return false;
            }
        }
    </script>
</head>
<body> 
    <div class="container" style="margin-top:50px;">
    <?php
        $user = new sign();
        if(isset($_REQUEST['submit'])){
            extract($_REQUEST);
            $register = $user->reg_user($username,$password);

            if($register){
                // signup sukses
                echo"<a href='login.php'><div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Sukses!</strong> Silahkan login.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div></a>";
            }else{
                // signup gagal
                echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Warning!</strong> Username sudah ada.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }
        }
    ?>
        <div class="card">
            <div class="card-header">
             Form SignUp
            </div>
        <div class="card-body">
            <form action="" method="post" name="reg">
            <div class="form-group">
                <label for="username" >Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <label for="inputPassword2" >Password</label>
                <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password" required>
            </div>
            <button onclick="return(submitReg());" type="submit" class="btn btn-primary mb-2" name="submit">Sign Up</button>
            </form>
            <a href="login.php">Sign In</a>
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        $('.alert').alert()
    </script>
</body>
</html>

