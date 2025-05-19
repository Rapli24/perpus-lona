@extends('index')
@section('title', 'Transaksi')

@section('isihalaman')
<h3 class="text-center mb-4">Daftar Transaksi Perpustakaan Politeknik Negeri Medan</h3>

<div class="mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTransaksiTambah"> 
        Tambah Data
    </button>
    <a href="/export-pdf" class="btn btn-danger" target="_blank">Laporan Transaksi</a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark text-center">
        <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>ID Anggota</th>
            <th>ID Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tbtransaksi as $index => $a)
        <tr>
            <td class="text-center">{{ $index + $tbtransaksi->firstItem() }}</td>
            <td>{{ $a->idtransaksi }}</td>
            <td>{{ $a->idanggota }}</td>
            <td>{{ $a->idbuku }}</td>
            <td>{{ $a->tglpinjam }}</td>
            <td>{{ $a->tglkembali }}</td>
            <td class="text-center">
                <!-- Tombol Edit -->
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalTransaksiEdit{{ $a->idtransaksi }}">
                    Edit
                </button>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalTransaksiEdit{{ $a->idtransaksi }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelEdit{{ $a->idtransaksi }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabelEdit{{ $a->idtransaksi }}">Form Edit Data Transaksi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/transaksi/edit/{{ $a->idtransaksi }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label for="idtransaksi{{ $a->idtransaksi }}" class="col-sm-4 col-form-label">ID Transaksi</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="idtransaksi{{ $a->idtransaksi }}" class="form-control" name="idtransaksi" value="{{ $a->idtransaksi }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="idanggota{{ $a->idtransaksi }}" class="col-sm-4 col-form-label">ID Anggota</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="idanggota{{ $a->idtransaksi }}" class="form-control" name="idanggota" value="{{ $a->idanggota }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="idbuku{{ $a->idtransaksi }}" class="col-sm-4 col-form-label">ID Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="idbuku{{ $a->idtransaksi }}" class="form-control" name="idbuku" value="{{ $a->idbuku }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tglpinjam{{ $a->idtransaksi }}" class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                                        <div class="col-sm-8">
                                            <input type="date" id="tglpinjam{{ $a->idtransaksi }}" class="form-control" name="tglpinjam" value="{{ $a->tglpinjam }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tglkembali{{ $a->idtransaksi }}" class="col-sm-4 col-form-label">Tanggal Kembali</label>
                                        <div class="col-sm-8">
                                            <input type="date" id="tglkembali{{ $a->idtransaksi }}" class="form-control" name="tglkembali" value="{{ $a->tglkembali }}" required>
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
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div class="mt-3">
    <p>Halaman : {{ $tbtransaksi->currentPage() }}</p>
    <p>Jumlah Data : {{ $tbtransaksi->total() }}</p>
    <p>Data Per Halaman : {{ $tbtransaksi->perPage() }}</p>
    <div>
        {{ $tbtransaksi->links() }}
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTransaksiTambah" tabindex="-1" role="dialog" aria-labelledby="modalLabelTambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelTambah">Form Input Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/transaksi/tambah" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="idtransaksiTambah" class="col-sm-4 col-form-label">ID Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" id="idtransaksiTambah" class="form-control" name="idtransaksi" placeholder="Masukan ID Transaksi" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="idanggotaTambah" class="col-sm-4 col-form-label">ID Anggota</label>
                        <div class="col-sm-8">
                            <input type="text" id="idanggotaTambah" class="form-control" name="idanggota" placeholder="Masukan ID Anggota" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="idbukuTambah" class="col-sm-4 col-form-label">ID Buku</label>
                        <div class="col-sm-8">
                            <input type="text" id="idbukuTambah" class="form-control" name="idbuku" placeholder="Masukan ID Buku" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tglpinjamTambah" class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-8">
                            <input type="date" id="tglpinjamTambah" class="form-control" name="tglpinjam" placeholder="Masukkan Tanggal Pinjam" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tglkembaliTambah" class="col-sm-4 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-8">
                            <input type="date" id="tglkembaliTambah" class="form-control" name="tglkembali" placeholder="Masukan Tanggal Kembali" required>
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
