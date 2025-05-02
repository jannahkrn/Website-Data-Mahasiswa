<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $npm = $_GET['npm'];
  $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'");
  $data = mysqli_fetch_assoc($result);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $npm = $_POST['npm'];
  $nama = $_POST['nama'];
  $jurusan = $_POST['jurusan'];
  $tahun_masuk = $_POST['tahun_masuk'];
  $kelas = $_POST['kelas'];

  $query = "UPDATE mahasiswa SET 
            nama='$nama', jurusan='$jurusan', tahun_masuk='$tahun_masuk', kelas='$kelas' 
            WHERE npm='$npm'";
  mysqli_query($koneksi, $query);

  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* General body and container styles */
    body {
        font-family: 'Arial', sans-serif;
        background: #f4f4f9; /* Latar belakang abu-abu muda */
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 600px;
        margin: auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Shadow lembut untuk kedalaman */
    }

    /* Header styles */
    h2 {
        text-align: center;
        color: #2e4a29; /* Hijau army untuk heading */
        font-size: 28px;
        margin-bottom: 20px;
    }

    /* Form and input field styles */
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    input {
        padding: 12px;
        font-size: 16px;
        border: 2px solid #ddd;
        border-radius: 5px;
        outline: none;
        background-color: #f9f9f9;
        color: #333;
        transition: all 0.3s ease; /* Transisi lembut saat fokus */
    }

    input:focus {
        border-color: #2e4a29; /* Hijau army border saat fokus */
        background-color: #ffffff; /* Putih saat fokus */
        box-shadow: 0 0 5px rgba(46, 74, 41, 0.3); /* Efek glow */
    }

    /* Button styling */
    button {
        padding: 12px 20px;
        background-color: #2e4a29;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease; /* Transisi saat hover dan klik */
    }

    button:hover {
        background-color: #4b7f50; /* Warna hijau lebih cerah saat hover */
    }

    button:active {
        transform: scale(0.98); /* Efek mengecil saat button ditekan */
    }

    /* Styles for the page's responsive behavior */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }

        h2 {
            font-size: 24px;
        }

        input {
            font-size: 14px;
        }

        button {
            font-size: 14px;
        }
    }

    /* Styling for the "back to home" button */
    a {
        text-decoration: none;
        display: block;
        text-align: center;
        margin-top: 20px;
    }

    a button {
        padding: 12px 20px;
        background-color: #2e4a29;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    a button:hover {
        background-color: #4b7f50;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Mahasiswa</h2>
    <form action="edit.php" method="POST">
      <input type="text" name="npm" value="<?= $data['npm'] ?>" readonly />
      <input type="text" name="nama" value="<?= $data['nama'] ?>" required />
      <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" required />
      <input type="number" name="tahun_masuk" value="<?= $data['tahun_masuk'] ?>" required />
      <input type="text" name="kelas" value="<?= $data['kelas'] ?>" required />
      <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="index.php"><button>Back to Home</button></a>
  </div>
</body>
</html>
