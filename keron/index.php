<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'function.php';
$penyedia = query("SELECT * FROM tb_penyediajasa ");
//jika tombol cari di klik maka 
if (isset($_POST["cari"])) {
    $penyedia = cari($_POST["keyword"]);
}

?>
<html>

<head>
    <title>HALAMAN ADMIN</title>
    <style>
        body {
            background-color: aliceblue;
        }

        #wrap {
            background-color: whitesmoke;
        }

        #all {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .row {
            display: flex;
            justify-content: start;
            width: 100vh;
        }

        .row a {
            margin-right: 2rem;
        }
    </style>
</head>

<body>
    <a href="logout.php">logout</a>
    <div id="all">
        <h1>DAFTAR PENYEDIA JASA</h1> <br><br>
        <div class="row">
            <a href="tambah.php">Tambah Data Penyedia</a>
            <form action="" method="post">

                <input type="text" name="keyword" size="40" autofocus placeholder="MASUKKAN KEYWORD PENCARIAN......" autocomplete="off">
                <button type="submit" name="cari">Cari!</button>

            </form>
        </div>

        <table id="wrap" border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>NO.</th>
                <th>AKSI</th>
                <th>Gambar</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>JASA</th>

            </tr>
            <?php $i = 1; ?>
            <?php foreach ($penyedia as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                    return confirm('yakin?');">Hapus</a>

                    </td>

                    <td><img src="assets/<?= $row["gambar"]; ?>" width="50"></td>
                    <td><?= $row["nik"] ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["jasa"] ?></td>

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </table>
    </div>
</body>

</html>