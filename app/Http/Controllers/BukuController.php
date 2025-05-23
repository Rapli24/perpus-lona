<?php
namespace App\Http\Controllers;

// use App\Models\AnggotaModel;
use App\Models\BukuModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class BukuController extends Controller
{
    //method untuk tampil data buku
    public function bukutampil()
{
    $databuku = BukuModel::orderBy('idbuku', 'ASC')->paginate(5);
    return view('halaman/view_buku', ['tbbuku' => $databuku]);
}


//     //method untuk tambah data bukupublic function anggotatambah(Request $request)
//     public function bukutambah(Request $request)
//     {
//        $request->validate( [
//            'idbuku' => 'required',
//         'judulbuku' => 'required',
//         'kategori' => 'required',
//         'pengarang' => 'required',
//         'penerbit' => 'required',
//         'status' => 'required'
//         ]);
// BukuModel::create([
//            'idbuku' => $request->idbuku,
//             'judulbuku' => $request->judulbuku,
//             'kategori' => $request->kategori,
//             'pengarang' => $request->pengarang,
//             'penerbit' => $request->penerbit,
//             'status' => $request->status
            
//         ]);
//         return redirect('/buku');
//     }



public function bukutambah(Request $request) {
    $request->validate([
        'idbuku' => 'required',
        'judulbuku' => 'required',
        'kategori' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'status' => 'required',
    ]);

    // Simpan ke DB
    BukuModel::create($request->all());

    return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
}
public function bukuhapus($idbuku)
{
    // Cek apakah data ada
    $databuku = BukuModel::find($idbuku);

    // Kalau null, kasih notif error
    if (!$databuku) {
        return redirect()->back()->with('error', 'Data buku gak ketemu.');
    }

    // Kalau ada, hapus
    $databuku->delete();
    return redirect()->back()->with('success', 'Data buku berhasil dihapus.');
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
    if (!$data) {
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    $data->judulbuku = $request->judulbuku;
    $data->kategori  = $request->kategori;
    $data->pengarang = $request->pengarang;
    $data->penerbit  = $request->penerbit;
    $data->status    = $request->status;
    $data->save();

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
}


public function exportPdf()
{
    $databuku = BukuModel::orderby('idbuku', 'ASC')->get();
    $pdf = Pdf::loadView('pdf.export-buku', ['buku' => $databuku]);
    return $pdf->stream('laporan-buku-'.Carbon::now()->timestamp.'.pdf');
}

}