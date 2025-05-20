<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Transaksi</title>
        <style>
    body { font-family: Arial, sans-serif; font-size: 12pt; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid black; padding: 6px; text-align: left; }
    th { background-color: #f2f2f2; }
    .footer { margin-top: 30px; font-size: 10pt; text-align: right; }
</style>
</head>
<body>
<div class="header">
    <table style="width:100%;">
        <tr>
            <td><img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fpolmed.ac.
            id%2Fprofil-institusi%2F&psig=AOvVaw3QXJ-NPoh_hvYnFwGZhw7Y&us
            t=1747729263967000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCJCo
            soGNr40DFQAAAAAdAAAAABAE"></td>
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

    <h2 style="text-align: center; margin-bottom: 20px;">LAPORAN DATA TRANSAKSI</h2>

      <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>ID Anggota</th>
                <th>ID Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $index => $bk)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $bk->idtransaksi}}</td>
                <td>{{ $bk->idanggota }}</td>
                <td>{{ $bk->idbuku }}</td>
                <td>{{ $bk->tglpinjam}}</td>
                <td>{{ $bk->tglkembali }}</td>
              
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
