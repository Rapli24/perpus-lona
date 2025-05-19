@extends('index')
@section('title', 'Anggota')

@section('isihalaman')
<h3><center>Daftar Anggota Perpustakaan Politeknik Negeri Medan</center></h3>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAnggotaTambah"> 
    Tambah Data Anggota
</button>
<a href="/export-pdf-anggota" class="btn btn-danger" target="_blank">Laporan Anggota</a>

<p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">No</td>
            <td align="center">ID Anggota</td>
            <td align="center">Nama</td>
            <td align="center">Jenis Kelamin</td>
            <td align="center">Alamat</td>
            <td align="center">Status</td>
            <td align="center">Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($tbanggota as $index => $a)
        <tr>
           <td align="center">{{ $index + $tbanggota->firstItem() }}</td>
            <td>{{ $a->idanggota }}</td>
            <td>{{ $a->nama}}</td>
            <td>{{$a->jeniskelamin }}</td>
            <td>{{$a->alamat}}</td>
            <td>{{ $a->status }}</td>
            <td align="center">
                <button type="button" class="btn btn-warning" data-toggle="modal" 
                data-target="#modalAnggotaEdit{{ $a->idanggota}}">Edit</button>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalAnggotaEdit{{ $a->idanggota }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Edit Data Anggota</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/anggota/edit/{{ $a->idanggota }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">ID Anggota</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="idanggota" value="{{ $a->idanggota }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama" value="{{ $a->nama}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="jeniskelamin" value="{{ $a->jeniskelamin }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alamat" value="{{ $a->alamat }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="kategori" value="{{ $a->kategori }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="status" value="{{ $a->status }}">
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
                <!-- End Modal Edit -->

            
<form action="{{ url('/anggota/hapus/' . $a->idanggota) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau dihapus?')">
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
Halaman : {{ $tbanggota->currentPage() }} <br />
Jumlah Data : {{ $tbanggota->total() }} <br />
Data Per Halaman : {{ $tbanggota->perPage() }} <br />
{{ $tbanggota->links() }}

<!-- Modal Tambah -->
<!-- Modal Tambah -->
<div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Data Anggota</h5>
            </div>
            <div class="modal-body">
                <form action="/anggota/tambah" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ID Anggota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="idanggota" placeholder="Masukan Kode Anggota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Anggota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="jeniskelamin" placeholder="Masukan Jenis Kelamin">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
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
