<?php
include 'koneksi.php';

// Proses menyimpan data (jika metode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $kelas = $_POST['kelas'];

    // Mengecek apakah npm sudah ada di database
    $query_check = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
    $result = mysqli_query($koneksi, $query_check);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('NPM sudah ada. Harap gunakan NPM yang unik.'); window.location.href='index.php';</script>";
        exit();
    }

    // Melakukan insert jika NPM unik
    $query = "INSERT INTO mahasiswa (npm, nama, jurusan, tahun_masuk, kelas) 
              VALUES ('$npm', '$nama', '$jurusan', '$tahun_masuk', '$kelas')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: save_mahasiswa.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Proses menampilkan data mahasiswa (jika metode GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($koneksi, $query);

    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Data Mahasiswa</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f0f3f0;
          margin: 0;
          padding: 20px;
        }

        .container {
          max-width: 900px;
          margin: auto;
          background: #ffffff;
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
          text-align: center;
          color: #2e4a29;
          margin-bottom: 30px;
        }

        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
        }

        table, th, td {
          border: 1px solid #ccc;
        }

        th {
          background-color: #2e4a29;
          color: white;
        }

        th, td {
          padding: 10px;
          text-align: center;
        }

        a {
          color: #2e4a29;
          text-decoration: none;
          font-weight: bold;
        }

        a:hover {
          text-decoration: underline;
        }

        button {
          margin-top: 20px;
          padding: 10px 20px;
          background-color: #2e4a29;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s, transform 0.1s ease;
        }

        button:hover {
          background-color: #4b7f50;
        }

        button:active {
          transform: scale(0.96);
        }

        @media (max-width: 600px) {
          table, th, td {
            font-size: 14px;
          }

          button {
            width: 100%;
          }
        }
      </style>
    </head>
    <body>
      <div class='container'>
        <h1>Data Mahasiswa</h1>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Tahun Masuk</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['npm']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['jurusan']}</td>
                    <td>{$row['tahun_masuk']}</td>
                    <td>{$row['kelas']}</td>
                    <td>
                        <a href='edit.php?npm={$row['npm']}'>Edit</a> | 
                        <a href='delete.php?npm={$row['npm']}' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada data mahasiswa.</p>";
    }

    echo "<a href='index.php'><button>Kembali ke Halaman Utama</button></a>
      </div>
    </body>
    </html>";
}
?>
