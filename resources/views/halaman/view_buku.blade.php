@extends('index')
@section('title', 'Buku')

@section('isihalaman')
<div class="container my-4">
    <h3 class="text-center">Daftar Buku Perpustakaan Politeknik Negeri Medan</h3>

    <div class="d-flex justify-content-between my-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBukuTambah">
            Tambah Data Buku
        </button>

        <a href="/export-pdf-buku" class="btn btn-danger" target="_blank">Laporan Buku</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light text-center">
                <tr>
                    <th>No</th>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Kategori</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tbbuku as $index => $bk)
                <tr>
                    <td class="text-center">{{ $index + $tbbuku->firstItem() }}</td>
                    <td>{{ $bk->idbuku }}</td>
                    <td>{{ $bk->judulbuku }}</td>
                    <td>{{ $bk->kategori }}</td>
                    <td>{{ $bk->pengarang }}</td>
                    <td>{{ $bk->penerbit }}</td>
                    <td>{{ $bk->status }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalBukuEdit{{ $bk->idbuku }}">Edit</button>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalBukuEdit{{ $bk->idbuku }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Form Edit Data Buku</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/buku/edit/{{ $bk->idbuku }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>ID Buku</label>
                                                <input type="text" class="form-control" name="idbuku" value="{{ $bk->idbuku }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <input type="text" class="form-control" name="judulbuku" value="{{ $bk->judulbuku }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Pengarang</label>
                                                <input type="text" class="form-control" name="pengarang" value="{{ $bk->pengarang }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Penerbit</label>
                                                <input type="text" class="form-control" name="penerbit" value="{{ $bk->penerbit }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <input type="text" class="form-control" name="kategori" value="{{ $bk->kategori }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control" name="status" value="{{ $bk->status }}">
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
                        <!-- End Modal Edit -->

                        <form action="{{ url('/buku/hapus/' . $bk->idbuku) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau dihapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="my-3">
        Halaman : {{ $tbbuku->currentPage() }} <br />
        Jumlah Data : {{ $tbbuku->total() }} <br />
        Data Per Halaman : {{ $tbbuku->perPage() }} <br />
        {{ $tbbuku->links() }}
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Data Buku</h5>
            </div>
            <div class="modal-body">
                <form action="/buku/tambah" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>ID Buku</label>
                        <input type="text" class="form-control" name="idbuku" placeholder="Masukan Kode Buku">
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control" name="judulbuku" placeholder="Masukan Judul Buku">
                    </div>
                    <div class="form-group">
                        <label>Nama Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Masukan Nama Pengarang">
                    </div>
                    <div class="form-group">
                        <label>Nama Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Masukan Nama Penerbit">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" placeholder="Masukan Status">
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
