<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Mahasiswa</title>
  <style>
    /* Global style */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f3f0;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #2e4a29; /* Hijau army */
      margin-bottom: 30px;
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: space-between;
    }

    input {
      flex: 1 1 30%;
      padding: 10px;
      border: 2px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      background-color: #f9f9f9;
    }

    input:focus {
      border-color: #2e4a29;
      box-shadow: 0 0 5px rgba(46, 74, 41, 0.3);
      outline: none;
    }

    button {
      padding: 10px 20px;
      background-color: #2e4a29;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.1s ease;
      margin-top: 10px;
    }

    button:hover {
      background-color: #4b7f50;
    }

    button:active {
      transform: scale(0.97);
    }

    a button {
      background-color: #4b4b4b;
    }

    a button:hover {
      background-color: #2e4a29;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Manajemen Mahasiswa</h1>

    <form action="save_mahasiswa.php" method="POST">
      <input type="text" name="npm" placeholder="NPM" required />
      <input type="text" name="nama" placeholder="Nama" required />
      <input type="text" name="jurusan" placeholder="Jurusan" required />
      <input type="number" name="tahun_masuk" placeholder="Tahun Masuk" required />
      <input type="text" name="kelas" placeholder="Kelas" required />
      <button type="submit">Tambah Mahasiswa</button>
    </form>

    <br />

    <a href="save_mahasiswa.php"><button type="button">Data Mahasiswa</button></a>
  </div>
</body>
</html>
