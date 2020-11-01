<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'function.php';

// cek apakah tombol submit sudah di pencet apa belum 
if (isset($_POST["submit"])) {


    //cek apakah data berhasil di tambahkan atau tidak 
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert ('data berhasil ditambahkan!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert ('data gagal ditambahkan!');
        document.location.href = 'index.php'
    </script>
    ";
    }
}
?>

<html>

<head>
    <title>TAMBAH DATA PENYEDIA JASA</title>
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
        <h1>Tambah Data Penyedia Jasa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div id="all">
                <ul>
                    <li>
                        <label for="nik"> NIK :</label>
                        <input type="text" name="nik" id="nik" required>
                    </li>
                    <li>
                        <label for="nama"> nama :</label>
                        <input type="text" name="nama" id="nama" required>
                    </li>
                    <li>
                        <label for="email"> Email :</label>
                        <input type="text" name="email" id="email" required>
                    </li>
                    <li>
                        <label for="jasa"> JASA :</label>
                        <input type="text" name="jasa" id="jasa" required>
                    </li>
                    <li>
                        <label for="gambar"> gambar :</label>
                        <input type="file" name="gambar" id="gambar">
                    </li>
                    <li>
                        <button type="submit" name="submit">TAMBAH DATA</button>
                    </li>

                </ul>
            </div>

        </form>

    </div>


</body>

</html>