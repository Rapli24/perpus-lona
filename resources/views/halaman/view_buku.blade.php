@extends('index')
@section('title', 'Buku')

@section('isihalaman')
<h3><center>Daftar Buku Perpustakaan Politeknik Negeri Medan</center></h3>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBukuTambah"> 
    Tambah Data Buku
</button>
<a href="/export-pdf-buku" class="btn btn-danger" target="_blank">Laporan Buku</a>

<p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">No</td>
            <td align="center">ID Buku</td>
            <td align="center">Judul Buku</td>
            <td align="center">Kategori</td>
            <td align="center">Pengarang</td>
            <td align="center">Penerbit</td>
            <td align="center">Status</td>
            <td align="center">Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($tbbuku as $index => $bk)
        <tr>
           <td align="center">{{ $index + $tbbuku->firstItem() }}</td>
            <td>{{$bk->idbuku}}</td>
            <td>{{$bk->judulbuku}}</td>
            <td>{{$bk->kategori }}</td>
            <td>{{$bk->pengarang}}</td>
            <td>{{$bk->penerbit}}</td>
            <td>{{$bk->status }}</td>
            <td align="center">
                <button type="button" class="btn btn-warning" data-toggle="modal" 
                data-target="#modalBukuEdit{{ $bk->idbuku}}">Edit</button>
                <!-- Modal Edit -->
                <div class="modal fade" id="modalBukuEdit{{ $bk->idbuku }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Edit Data buku</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/buku/edit/{{ $bk->idbuku }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">ID Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="idbuku" value="{{ $bk->idbuku }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Judul Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="judulbuku" value="{{ $bk->judulbuku}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="kategori" value="{{ $bk->kategori }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Pengarang</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="pengarang" value="{{ $bk->pengarang }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="penerbit" value="{{ $bk->penerbit}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="status" value="{{ $bk->status }}">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Edit -->

            
<form action="{{ url('/buku/hapus/' . $bk->idbuku) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau dihapus?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
Halaman : {{ $tbbuku->currentPage() }} <br />
Jumlah Data : {{ $tbbuku->total() }} <br />
Data Per Halaman : {{ $tbbuku->perPage() }} <br />
{{ $tbbuku->links() }}

<!-- Modal Tambah -->
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
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ID Buku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="idbuku" placeholder="Masukan ID Buku">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Judul Buku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="judulbuku" placeholder="Masukan Judul Buku">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pengarang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pengarang" placeholder="Masukan Pengarang">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Penerbit</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="penerbit" placeholder="Masukan Penerbit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="status" placeholder="Masukan Status">
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
