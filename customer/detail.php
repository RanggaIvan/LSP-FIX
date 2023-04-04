<?php
include '../layout/navbar-customer.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

?>

<head>
    <title>Document</title>
</head>
<body>
    <div class="main">
    <h3>Nama Produk     =  <?= $produk["nama_produk"]; ?></h3>
    <h3>Foto Produk     =  </h3>
    <img src="../image/<?= $produk["foto"]; ?>" alt="" width="100">
    <h3>Harga Produk    =  <?= $produk["harga"]; ?></h3>
    <h3>Stok Produk     =  <?= $produk["stok"]; ?></h3>
    <h3>Deskripsi Produk=  <?= $produk["deskripsi"]; ?></h3>
    <a href="index.php">Kembali</a>
    </div>    
</body>
</html>