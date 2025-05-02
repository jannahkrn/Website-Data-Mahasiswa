<?php
include 'koneksi.php';

$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$tahun_masuk = $_POST['tahun_masuk'];
$kelas = $_POST['kelas'];

// Mengecek apakah npm sudah ada di database
$query_check = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
$result = mysqli_query($koneksi, $query_check);

if (mysqli_num_rows($result) > 0) {
    echo "NPM sudah ada. Harap gunakan NPM yang unik.";
    exit();
}

// Melakukan insert jika NPM unik
$query = "INSERT INTO mahasiswa (npm, nama, jurusan, tahun_masuk, kelas) 
          VALUES ('$npm', '$nama', '$jurusan', '$tahun_masuk', '$kelas')";
if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
