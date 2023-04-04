<?php
include '../admin/functions.php';
?>
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
</body>
</html>