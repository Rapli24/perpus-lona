<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class AnggotaController extends Controller
{
    //method untuk tampil data buku
    public function anggotatampil()
{
    $dataanggota = AnggotaModel::orderBy('idanggota', 'ASC')->paginate(5);
    return view('halaman/view_anggota', ['tbanggota' => $dataanggota]);


}

    //method untuk tambah data buku
    public function anggotatambah(Request $request)
    {
       $request->validate( [
           'idanggota' => 'required',
        'nama' => 'required',
        'jeniskelamin' => 'required',
        'alamat' => 'required',
        'status' => 'required'
        ]);

       AnggotaModel::create([
           'idanggota' => $request->idanggota,
            'nama' => $request->nama,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'status' => $request->status
            
        ]);

        return redirect('/anggota');
    }

public function anggotahapus($idanggota)
{
    // Cek apakah data ada
    $dataanggota = AnggotaModel::find($idanggota);

    // Kalau null, kasih notif error
    if (!$dataanggota) {
        return redirect()->back()->with('error', 'Data anggota gak ketemu.');
    }

    // Kalau ada, hapus
    $dataanggota->delete();
    return redirect()->back()->with('success', 'Data anggota berhasil dihapus.');
}


    public function anggotaedit($idanggota, Request $request)
{
    $request->validate([
        'idanggota' => 'required',
        'nama' => 'required',
        'jeniskelamin' => 'required',
        'alamat' => 'required',
        'status' => 'required'
    ]);

    $data = AnggotaModel::find($idanggota);
    $data->idanggota    = $request->idanggota;
    $data->nama  = $request->nama;
    $data->jeniskelamin   = $request->jeniskelamin;
    $data->alamat = $request->alamat;
    $data->status   = $request->status;
    $data->save();

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
}

public function exportPdf()
{
    $dataanggota = AnggotaModel::orderby('idanggota', 'ASC')->get();
    $pdf = Pdf::loadView('pdf.export-anggota', ['anggota' => $dataanggota]);
    return $pdf->stream('laporan-anggota-'.Carbon::now()->timestamp.'.pdf');
}

}