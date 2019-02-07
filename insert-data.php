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
    <h1>CRUD OOP PHP</h1>
    <h3>Tambah Data </h3>
    <form action="proses.php?aksi=tambah" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input id="password" type="password" name="password"><input type="checkbox" onclick="myViewPass()">Show Password</td>
        </tr>
        <tr>
            <td>Akses</td>
            <td>
            <select name="akses">
                <option value=1>Admin</option>
                <option value=2>User</option>
            </select>   
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Simpan</button></td>
        </tr>
    </table>
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
