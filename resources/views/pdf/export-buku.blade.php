<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
            <td style="text-align: center;">
                <h1 style="margin: 0;">POLITEKNIK NEGERI MEDAN</h1>
                <p style="margin: 0;">
Jl. Almamater No.1 Kampus USU Medan 20155,Indonesia 
Telp.(061-8211235),8211235(Ext,308), Fax : (061) 8215845 
www.polmed.ac.id, e-mail : polmed@polmedac.id </p>
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
            @foreach($buku as $index => $bk)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $bk->idbuku }}</td>
                <td>{{ $bk->judulbuku }}</td>
                <td>{{ $bk->kategori }}</td>
                <td>{{ $bk->pengarang }}</td>
                <td>{{ $bk->penerbit }}</td>
                <td>{{ $bk->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="footer">
        <p>Dicetak oleh: Admin Perpustakaan POLMED</p>
        <p>Tanggal cetak: <?php echo date('d-m-Y '); ?></p>
    </div>

</body>
</html>
