<?php
include '../layout/navbar-customer.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <form action="" method="POST">
            <tr class="judul">
                <th colspan="3">DETAIL PRODUK</th>
            </tr>
            <tr>
                <td rowspan="7"><img src="../image/<?= $produk["foto"]; ?>" width="100"></td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td><?= $produk["nama_produk"]; ?></td>
            </tr>
            <tr>
                <td>Harga Produk</td>
                <td><?= $produk["harga"]; ?></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><?= $produk["stok"]; ?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><?= $produk["deskripsi"]; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    Masukkan Jumlah Produk Yang Ingin Dibeli <br />
                    <input type="number" name="qty" id="qty">
                </td>
            </tr>
            <tr>
                <td colspan=""><button type="submit" name="beli">Add To Cart</button></td>
            </tr>
        </form>
    </table>
</body>

</html>

<?php

if (isset($_POST["beli"])) {
    $qty = $_POST["qty"];
    $_SESSION["cart"][$id] = $qty;

    echo "
    <script type='text/javascript'>
        alert('Produk Berhasil Ditambahkan Ke Keranjang Belanja!');
        window.location= 'keranjang.php'
    </script>
    ";
}
?>