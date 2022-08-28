<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('created_at', 'DESC');
        $kategori = Kategori::orderBy('created_at', 'DESC')->get();
        
        $kategori_ket = "";
        foreach ($kategori as $k){
            if ( intval(request()->id_kategori) == $k->id_kategori){
                $kegiatan = Kegiatan::where('id_kategori', $k->id_kategori);
                $kategori_ket = Kategori::where('id_kategori', $k->id_kategori)->first();
            }
        }

        return view('kegiatan.index', compact('kegiatan', 'kategori', 'kategori_ket'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('id_kategori', 'DESC')->get();
        return view('kegiatan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'nama_kegiatan' => ['required','string'],
            'lokasi' => ['required','string'],
            'keterangan' => ['required','string'],
            'tanggal' => ['required','date'],
            'kuota_peserta' => ['required','string'],
            'kategori' => ['required', 'numeric'],
        ]);

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $fileName = "kegiatan_" . time() . "." . $gambar->getClientOriginalExtension();
            $gambar->move('./uploads/kegiatan/', $fileName);
        }else {
            $fileName = null;
        }

        $data = [
            'id_user' => Auth::user()->id_user,
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'lokasi' => $request->input('lokasi'),
            'keterangan' => $request->input('keterangan'),
            'tanggal' => $request->input('tanggal'),
            'kuota_peserta' => $request->input('kuota_peserta'),
            'gambar' => $fileName,
            'id_kategori' => $request->input('kategori'),
        ];

        Kegiatan::create($data);

        Alert::success('Berhasil', 'Kegiatanan Berhasil ditambah');
        return redirect('kegiatan');
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    public function delete($id)
    {
        $kegiatan = Kegiatan::find($id);
        if ($kegiatan->gambar != null) {
            $path = public_path("./uploads/kegiatan/" . $kegiatan->gambar);
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $kegiatan->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Kegiatan');
        return redirect('kegiatan');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $k = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('k', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'nama_kegiatan' => ['required','string'],
            'lokasi' => ['required','string'],
            'keterangan' => ['required','string'],
            'tanggal' => ['required','date'],
            'kuota_peserta' => ['required','string'],
            'kategori' => ['required', 'numeric'],
        ]);

        $fileName = null;

        if ($request->file('gambar') != null) {
            $path = public_path("uploads/kegiatan/" . $kegiatan->gambar);
            if(File::exists($path)){
                File::delete($path);
                $gambar = $request->file('gambar');
                $fileName = "kegiatan_" . time() . "." . $gambar->getClientOriginalExtension();
                $gambar->move('./uploads/kegiatan/', $fileName);
            }
        } else {
            $fileName = $kegiatan->gambar;
        }

        $data = [
            'id_user' => Auth::user()->id_user,
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'lokasi' => $request->input('lokasi'),
            'keterangan' => $request->input('keterangan'),
            'tanggal' => $request->input('tanggal'),
            'kuota_peserta' => $request->input('kuota_peserta'),
            'gambar' => $fileName,
            'id_kategori' => $request->input('kategori'),
        ];

        $kegiatan->update($data);
        Alert::success('Berhasil', 'Kegiatan Berhasil diupdate');
        return redirect('kegiatan');
    }

    public function cetakId($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->gambar = base64_encode(public_path('./uploads/kegiatan/'.$kegiatan->gambar));
        $pdf = PDF::loadview('kegiatan.cetak_satu', compact('kegiatan'))->setPaper('a4');
        return $pdf->download(date('dmYHi').'_kegiatan.pdf');
        // return view('kegiatan.cetak_satu', compact('kegiatan'));

    }

    public function print()
    {
        return view('kegiatan.print');
    }

    public function cetak(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date'
        ]);

        $from_date  = Carbon::parse($request->from_date)->toDateTimeString();
        $to_date    = Carbon::parse($request->to_date)->toDateTimeString();

        $kegiatan = Kegiatan::whereBetween('created_at',[$from_date, $to_date])->get();

        if($kegiatan->count() == 0){
            return back()->with('msg', 'Tidak ada data kegiatan yang di input dari tanggal tersebut');
        } else {
            $pdf = PDF::loadview('kegiatan.cetak_semua', [
                'kegiatan' => $kegiatan,
                'from_date' => $request->from_date, 
                'to_date' => $request->to_date
            ]);
            return $pdf->download("kegiatan.pdf");
        }
    }
}
