<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
//panggil model BukuModel
use App\Models\BukuModel;

class BukuController extends Controller
{
    public function index()
    {
        $tbbuku = BukuModel::all();
        return view('buku',['buku'=> $tbbuku ]);
    }

    
    //method untuk tampil data buku
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('idbuku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku',['tbbuku'=>$databuku]);
    }

    //method untuk tambah data buku
    public function bukutambah(Request $request)
    {
        $request->validate([
            'idbuku' => 'required',
            'judulbuku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required'
            
        ]);

        BukuModel::create([
           'idbuku' => $request->id_buku,
            'judulbuku' => $request->judulbuku,
            'kategori' => $request->kategori,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'status' => $request->status
            
        ]);

        return redirect('/buku');
    }

     //method untuk hapus data buku
     public function bukuhapus($idbuku)
     {
         $databuku=BukuModel::find($idbuku);
         $databuku->delete();
 
         return redirect()->back();
     }


    public function bukuedit($idbuku, Request $request)
{
    $request->validate([
        'idbuku' => 'required',
        'judulbuku' => 'required',
        'kategori' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'status' => 'required'
    ]);

    $data = BukuModel::find($idbuku);
    $data->idbuku     = $request->idbuku;
    $data->judulbuku  = $request->judulbuku;
    $data->kategori   = $request->kategori;
    $data->pengarang  = $request->pengarang;
    $data->penerbit   = $request->penerbit;
    $data->status     = $request->status;
    $data->save();

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
}

// public function exportPdf()
// {
//     $databuku = BukuModel::orderby('idbuku', 'ASC') ->get();
//     $pdf = Pdf::loadView('pdf.export-buku', ['buku' => $databuku]);
//     return $pdf->download('laporan-buku-'.Carbon::now()->timestamp.'pdf');
// }

public function exportPdf()
{
    $databuku = BukuModel::orderby('idbuku', 'ASC')->get();
    $pdf = Pdf::loadView('pdf.export-buku', ['buku' => $databuku]);
    return $pdf->stream('laporan-buku-'.Carbon::now()->timestamp.'.pdf');
}
}