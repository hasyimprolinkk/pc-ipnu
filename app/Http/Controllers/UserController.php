<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{ 

    public function index()
    {
        $users = User::orderBy('created_at',  'DESC')->get();
        return view('users.index', compact('users'));
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        Alert::success('Berhasil', 'Berhasil Menghapus ' . $user->nama);
        $user->delete();
        return redirect('users');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jk' => ['required'],
            'no_hp' => ['required', 'numeric', 'digits_between:10,13', 'unique:users'],
            'jabatan' => ['nullable'],
            'roles' => ['required', 'string'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        User::create([
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            'no_hp' => $request->input('no_hp'),
            'jabatan' => $request->input('jabatan'),
            'roles' => $request->input('roles'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        Alert::success('Berhasil', 'Berhasil Menambah User');
        return redirect('users');
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id_user);
        return view('users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id_user);

        $request->validate([
            'username' => 'required|alpha_dash|unique:users,username,'.$user->id_user.',id_user',
            'nama' => 'required|string|max:255',
            'jk' => 'required',
            'no_hp' => ['required', 'unique:users,no_hp,'. $user->id_user .',id_user'], 
            'jabatan' => 'nullable',
            'avatar' => 'nullable|mimes:jpg,jpeg,png|image'
        ]);
        $fileName = null;
        if ($request->file('avatar') != null) {
            $path = public_path("uploads/avatars/" . $user->avatar);
            if(File::exists($path)){
                if ($user->avatar != "default.jpg") {
                    File::delete($path);
                }
                $avatar = $request->file('avatar');
                $fileName = "avatar_" . time() . "." . $avatar->getClientOriginalExtension();
                $avatar->move('./uploads/avatars/', $fileName);
            }
        } else {
            $fileName = $user->avatar;
        }

        $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
            'avatar' => $fileName,
        ];

        $user->update($data);

        Alert::success('Berhasil', 'Berhasil Update Profile');
        return back();
    }

    public function statusActive(Request $request, $id)
    {
        $user = User::find($id);

        if($request->aktif){
            $status = "1";
            $msg = "Berhasil Mengaktifkan User";
        }elseif($request->nonaktif){
            $status = "0";
            $msg = "Berhasil Menonaktifkan User";
        }

        $user->update(['is_active' => $status]);
        Alert::success('Berhasil', $msg);
        return back();
    }

    public function editPassword()
    {
        return view('users.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'passwordlama' => 'required|string',
            'passwordbaru' => 'required|string|min:4|confirmed',
        ]);

        if (!Hash::check($request->passwordlama, Auth::user()->password)) {
            return back()->with('msg', 'Password lama tidak cocok');
        } else {
            User::find(Auth::user()->id_user)->update([
                'password' => Hash::make($request->passwordbaru)
            ]);
            Alert::success('Berhasil', "Berhasil Mengubah Passoword");
            return back();
        }
    }

}
