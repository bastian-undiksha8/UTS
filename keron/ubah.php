<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'function.php';

// ambil data di URL
$id = $_GET["id"];
//query data penyedia berdasarkan idnya
$pyd = query("SELECT * FROM tb_penyediajasa WHERE id = $id")[0];

// cek apakah tombol submit sudah di pencet apa belum 
if (isset($_POST["submit"])) {

    //cek apakah data berhasil di ubah atau tidak 
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert ('data berhasil diubah!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert ('data gagal diubah!');
        document.location.href = 'index.php'
    </script>
    ";
    }
}
?>

<html>

<head>
    <title>UBAH DATA PENYEDIA JASA</title>
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
    </style>
</head>

<body>
    <div id="wrap">
        <h1>UBAH Data Penyedia Jasa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $pyd["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $pyd["gambar"]; ?>">
            <div id="all">
                <ul>
                    <li>
                        <label for="nik"> NIK :</label>
                        <input type="text" name="nik" id="nik" required value="<?= $pyd["nik"] ?>">
                    </li>
                    <li>
                        <label for="nama"> nama :</label>
                        <input type="text" name="nama" id="nama" required value="<?= $pyd["nama"] ?>">
                    </li>
                    <li>
                        <label for=" email"> Email :</label>
                        <input type="text" name="email" id="email" required value="<?= $pyd["email"] ?>">
                    </li>
                    <li>
                        <label for=" jasa"> JASA :</label>
                        <input type="text" name="jasa" id="jasa" required value="<?= $pyd["jasa"] ?>">
                    </li>
                    <li>
                        <label for=" gambar"> gambar :</label>
                        <img src="assets/<?= $pyd['gambar'] ?>" width="40"><br>
                        <input type="file" name="gambar" id="gambar">
                    </li>
                    <li>
                        <button type=" submit" name="submit">UBAH DATA</button>
                    </li>

                </ul>
            </div>

        </form>

    </div>


</body>

</html>