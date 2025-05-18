<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../koneksi.php';

// Ambil data dari database
$sql = "SELECT * FROM tbbuku ORDER BY idbuku ASC";
$query = mysqli_query($db, $sql);

// Mulai buffering output HTML
ob_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Buku</title>
    <style>
    body { font-family: Arial, sans-serif; font-size: 12pt; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid black; padding: 6px; text-align: left; }
    th { background-color: #f2f2f2; }
    .header img { display: block; }
    .footer { margin-top: 30px; font-size: 10pt; text-align: right; }
</style>
</head>
<body>
<div class="header">
    <table style="width:100%;">
        <tr>
            <td style="width: 80px;">
                <img src="../assets/polmed_logo.png" style="width: 70px;">
            </td>
            <td style="text-align: center;">
                <h1 style="margin: 0;">POLITEKNIK NEGERI MEDAN</h1>
                <p style="margin: 0;">Jl. Almamater No.1 Kampus USU, Medan</p>
            </td>
        </tr>
    </table>
</div>
<hr>

    <h2 style="text-align: center; margin-bottom: 20px;">LAPORAN DATA BUKU</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$data['idbuku']}</td>
                    <td>{$data['judulbuku']}</td>
                    <td>{$data['kategori']}</td>
                    <td>{$data['pengarang']}</td>
                    <td>{$data['penerbit']}</td>
                    <td>{$data['status']}</td>
                  </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak oleh: Admin Perpustakaan POLMED</p>
        <p>Tanggal cetak: <?php echo date('d-m-Y H:i'); ?></p>
    </div>

</body>
</html>