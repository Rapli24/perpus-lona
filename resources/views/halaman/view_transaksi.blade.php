@extends('index')
@section('title', 'Transaksi')

@section('isihalaman')
<h3><center>Daftar Transaksi Perpustakaan Politeknik Negeri Medan</center></h3>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTransaksiTambah"> 
    Tambah Data 
</button>
<a href="/export-pdf" class="btn btn-danger" target="_blank">Laporan Transaksi</a>

<p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">No</td>
            <td align="center">ID Transaksi</td>
            <td align="center">ID Anggota</td>
            <td align="center">ID Buku</td>
            <td align="center">Tanggal Pinjam</td>
            <td align="center">Tanggal Kembali</td>
            <td align="center">Aksi</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($tbtransaksi as $index => $a)
        <tr>
            <td align="center">{{ $index + $tbtransaksi->firstItem() }}</td>
            <td>{{ $a->idtransaksi }}</td>
            <td>{{ $a->idanggota }}</td>
            <td>{{ $a->idbuku }}</td>
            <td>{{ $a->tglpinjam }}</td>
            <td>{{ $a->tglkembali }}</td>
            <td align="center">
                <!-- Tombol Edit -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTransaksiEdit{{ $a->idtransaksi }}">
                    Edit
                </button>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalTransaksiEdit{{ $a->idtransaksi }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Edit Data Transaksi</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/transaksi/edit/{{ $a->idtransaksi }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">ID Transaksi</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="idtransaksi" value="{{ $a->idtransaksi }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">ID Anggota</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="idanggota" value="{{ $a->idanggota }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">ID Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="idbuku" value="{{ $a->idbuku }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tglpinjam" value="{{ $a->tglpinjam }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tanggal Kembali</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tglkembali" value="{{ $a->tglkembali }}">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Delete -->
                <form action="/transaksi/hapus/{{ $a->idtransaksi }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau dihapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
Halaman : {{ $tbtransaksi->currentPage() }} <br />
Jumlah Data : {{ $tbtransaksi->total() }} <br />
Data Per Halaman : {{ $tbtransaksi->perPage() }} <br />
{{ $tbtransaksi->links() }}

<!-- Modal Tambah -->
<div class="modal fade" id="modalTransaksiTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Data Transaksi</h5>
            </div>
            <div class="modal-body">
                <form action="/transaksi/tambah" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ID Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="idtransaksi" placeholder="Masukan ID Transaksi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ID Anggota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="idanggota" placeholder="Masukan ID Anggota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ID Buku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="idbuku" placeholder="Masukan ID Buku">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tglpinjam" placeholder="Masukkan Tanggal Pinjam">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tglkembali" placeholder="Masukan Tanggal Kembali">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
