<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use function App\Helpers\sendNotifUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->paginate(5);
        return view('home', [
            'kegiatan'    => $kegiatans,
        ]);
    }

    //menampilkan data Kegiatan berdasarkan id
    public function show($id)
    {   
        $kegiatan = Kegiatan::where('id_kegiatan', $id)->firstOrFail();
        return view('kegiatan.komentar', compact('kegiatan'));
    }

    //menambah komentar
    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required'
        ]);
        $data = [
            'id_kegiatan' => $request->id_kegiatan,
            'id_user' => Auth::user()->id_user,
            'komentar' => $request->komentar
        ];

        Komentar::create($data);

        return back();
    }

    public function deleteKomentar($id)
    {
        Komentar::where('id_komentar', $id)->where('id_user', Auth::user()->id_user)->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus komentar');
        return back();
    }
    
}
