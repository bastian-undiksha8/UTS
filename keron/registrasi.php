<?php
require 'function.php';
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
         <script>
         alert('User Baru Berhasil Ditambahkan!');
         </script>
         ";
    } else {
        echo mysqli_error($conn);
    }
}

?>



<html>

<head>
    <title> Halaman Registrasi </title>
    <style>
        body {
            background-color: aliceblue;
        }

        #wrap {
            background-color: aqua;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;


        }
    </style>
</head>

<body>
    <div id="wrap">
        <h1>Halaman Registrasi </h1>
        <form action="" method="post">
            <ul><label for="username">username :</label><input type="text" name="username" id="username"></ul>
            <ul><label for="password">password :</label><input type="password" name="password" id="password"></ul>
            <ul><label for="password2">Konfirmasi password :</label><input type="password" name="password2" id="password2"></ul>
            <ul><button type="submit" name="register">Register !</button></ul>
    </div>
    </form>
</body>

</html>