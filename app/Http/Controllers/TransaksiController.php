<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
// use App\Models\UserModel;
use App\Models\AnggotaModel;
use App\Models\BukuModel;

class TransaksiController extends Controller
{
    //method untuk tampil data peminjaman
    public function transaksitampil()
    {
        $datatransaksi = TransaksiModel::orderby('idtransaksi', 'ASC')
        ->paginate(10);
       
        $dataanggota      = AnggotaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_transaksi',['tbtransaksi'=>$datatransaksi,'tbanggota'=>$dataanggota,'tbbuku'=>$databuku]);
    }

    //method untuk tambah data peminjaman

public function transaksitambah(Request $request)
{
    // Validasi hanya memastikan input yang wajib diisi
    $request->validate([
        'idtransaksi' => 'required',
        'idanggota'   => 'required',
        'idbuku'      => 'required',
        'tglpinjam' => 'required',
        'tglkembali' => 'required'
       
    ]);

    // Simpan ke database, dengan nilai default seperti now() ditentukan di sini
    TransaksiModel::create([
        'idtransaksi' => $request->idtransaksi,
        'idanggota'   => $request->idanggota,
        'idbuku'      => $request->idbuku,
        'tglpinjam'   => now(),
        'tglkembali' => now(), // atau $request->tglpinjam kalau input manual
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return redirect('/transaksi');
}

    //method untuk hapus data peminjaman
    public function transaksihapus($idtransaksi)
    {
        $datamodel=TransaksiModel::find($idtransaksi);
        $datamodel->delete();

        return redirect()->back();
    }

    //method untuk edit data peminjaman
    public function transaksiedit($idtransaksi, Request $request)
    {
        $request->validate( [
            
           'idtransaksi' => 'required',
            'idanggota' => 'required',
            'idbuku' => 'required',
            'tglpinjam' => 'required',
            'tglkembali' => 'required'

        ]);

        $idtransaksi= TransaksiModel::find($idtransaksi);
        $idtransaksi->idtransaksi   = $request->idtransaksi;
         $idtransaksi->idanggota      = $request->idanggota;
         $idtransaksi->idbuku      = $request->idbuku;
         $idtransaksi->tglpinjam     = $request->tglpinjam  ;
         $idtransaksi->tglkembali      = $request->tglkembali;

        

        $idtransaksi->save();

        return redirect()->back();
    }
    public function exportPdf()
{
    $datatransaksi = TransaksiModel::orderby('idtransaksi', 'ASC')->get();
    $pdf = Pdf::loadView('pdf.export-transaksi', ['transaksi' => $datatransaksi]);
    return $pdf->stream('laporan-transaksi-'.Carbon::now()->timestamp.'.pdf');
}
}