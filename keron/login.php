<?php
session_start();

if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}
require 'function.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username 
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            header("location: index.php");
            exit;
        }
    }

    $error = true;
}
?>


<html>

<head>
    <title>Halaman Login</title>
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
        <h1>HALAMAN LOGIN</h1>

        <?php if (isset($error)) : ?>
            <p style="color:red; font-style: italic;">username / password salah </p>
        <?php endif; ?>
        <form action="" method="post">
            <ul>

                </label for="username ">USERNAME :</label>
                <input type="text" name="username" id="username">

            </ul>
            <ul>

                </label for="password">PASSWORD : </label>
                <input type="password" name="password" id="password">

            </ul>
            <ul>

                <button type="submit" name="login">LOGIN </button>

            </ul>
        </form>
    </div>
</body>

</html>