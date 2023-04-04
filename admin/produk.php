<?php
require 'functions.php';


if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location: '../login/index.php';
    </script>";
}

if($_SESSION["roles"] != "Admin"){
    echo "
    <script type='text/javascript'>
        alert('Anda bukan admin')
        window.location: '../login/index.php';
    </script>";
}

$produk = query("SELECT * FROM produk");

?>

<?php include '../layout/sidebar.php'; ?>
<div class="main">
    <h1>Data Produk</h1>
    <hr>
    <a href="tambah.php">Tambah Produk</a>
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

    <?php $i=1; ?>
    <?php foreach($produk as $data) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $data["nama_produk"]; ?></td>
        <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="100"></td>
        <td><?= $data["harga"]; ?></td>
        <td><?= $data["stok"]; ?></td>
        <td><?= $data["deskripsi"]; ?></td>
        <td>
            <a href="edit.php?id=<?= $data["id_produk"]; ?>">Edit</a>
            <a href="hapus.php?id=<?= $data["id_produk"]; ?>" onclick="return confirm('Anda yakin ingin menghapus produk?')">Hapus</a>
        </td>
    </tr>
    <?php $i++?>
    <?php endforeach; ?>
</table>

</div>