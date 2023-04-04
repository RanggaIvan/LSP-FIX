<?php
include 'functions.php';

if(isset($_POST["submit"])){
    if(register($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
        alert('Anda berhasil register')
        window.location= 'login/index.php'
        </script>";
    }else{
        echo "
        <script type='text/javascript'>
        alert(Anda gagal register);
        window.location= register.php;
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<h2>Tambah Data User</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama_lengkap">Nama Lengkap</label><br />
            <input type="text" name="nama_lengkap" id="nama_lengkap"><br /> <br />

            <label for="username">Username</label><br >
            <input type="text" name="username" id="username"><br /> <br />

            <label for="password">Password</label><br />
            <input type="password" name="password" id="password"><br /> <br />

            <input type="hidden" name="roles" value="Customer"> 
            <button type="submit" name="submit">Tambah Data</button> 
        </form>
</body>
</html>