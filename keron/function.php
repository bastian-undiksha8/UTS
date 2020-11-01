<?php

//koneksi ke DB
$conn = mysqli_connect("localhost", "root", "", "db_kerjon");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $email = htmlspecialchars($data["email"]);
    $jasa  = htmlspecialchars($data["jasa"]);

    //    upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO tb_penyediajasa
     VALUES 
     ('','$nama','$nik','$email','$jasa','$gambar');
  ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cel apakah tidak ada gambar yang di upload 
    if ($error === 4) {
        echo "
        <script>
        alert('pili gambar terlebihb dahulu');
        </script>
        ";
        return false;
    }


    // cek apakah yang diupload adalah gambar  
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid))
        echo "
           <script>
           alert('yang anda upload bukan gambar');
           </script>
           ";
    //    cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo
            "<script>
           alert('ukuran gambar terlalu besar');
           </script>
           ";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lolos pengecekkan , gambar siap di upload
    move_uploaded_file($tmpName, 'assets/' . $namaFileBaru);
    return $namaFile;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_penyediajasa WHERE id= $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $email = htmlspecialchars($data["email"]);
    $jasa  = htmlspecialchars($data["jasa"]);
    $gambarLama  = htmlspecialchars($data["gambarLama"]);
    // cek apakah user pilih gambar baru atau tidak 
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE tb_penyediajasa
     SET
     nama = '$nama',
     nik = '$nik',
     email = '$email',
     jasa = '$jasa',
     gambar = '$gambar'
WHERE id = $id
     ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM tb_penyediajasa 
    WHERE 
    nama LIKE '%$keyword%' OR 
     nik LIKE '%$keyword%' OR
     email LIKE '%$keyword%' OR
     jasa LIKE '%$keyword%' 
    ";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum 
    $result = mysqli_query($conn, "SELECT username FROM user WHERE 
    username ='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
    <script>
    alert('username sudah terdaftar!')
    </script >
    ";
    }
    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
          <script>
          alert('konfirmasi password tidak sesuai')
          </script>
          ";
        return false;
    }
    //enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);
}
