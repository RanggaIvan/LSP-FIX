<?php

include '../layout/navbar-customer.php';
$produk = query("SELECT * FROM produk");




?>

<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>haloo <?= $_SESSION["nama_lengkap"]; ?> Selamat datang di toko Lektrik</h1>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($produk as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="100"></td>
                <td><?= $data["harga"]; ?></td>
                <td><?= $data["stok"]; ?></td>
                <td>
                    <a href="detail.php?id=<?= $data["id_produk"]; ?>">Detail</a>
                    <a href="pesan.php?id=<?= $data["id_produk"]; ?>">Pesan</a>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>
