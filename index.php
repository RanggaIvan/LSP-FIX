<?php
include 'admin/functions.php';

$produk = query("SELECT * FROM produk");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        ul{
            list-style: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        li{
            float: left;
        }

        li a{
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<ul>
        <li><a href="index.php">Produk</a></li>
        <li><a href="" onclick="return confirm('Anda belum login, silahkan login dulu')">Keranjang</a></li>
        <li style="float: right;"><a class="active" href="register.php">Register</a></li>
        <li style="float: right;"><a class="active" href="login/index.php">Login</a></li>
    </ul>


<div class="main">
<h1>Selamat datang di toko Lektrik</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php $i= 1; ?>
        <?php foreach($produk as $data) :?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data['nama_produk']; ?></td>
                <td><img src="image/<?= $data['foto']; ?>" alt="" width="100"></td>
                <td><?= $data['harga']; ?></td>
                <td><?= $data['stok']; ?></td>
                <td><?= $data['deskripsi']; ?></td>
                <td>
                    <a href="index.php" onclick="return confirm('Anda belu login, login terlebih dahulu')">Detail</a>
                    <a href="index.php" onclick="return confirm('Anda belu login, login terlebih dahulu')">Pesan</a>
                </td>
            </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>