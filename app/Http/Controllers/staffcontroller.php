<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PDF;
use App\Models\mbkm;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Role;
use App\Models\Konsentrasi;
use App\Models\program;

class staffcontroller extends Controller
{
    public function index(){
        $mbkm = mbkm::all();
        return view('staff.index', compact('mbkm'));
    }
    // value enum = 'Usulan','Ditolak','Usulan disetujui','Usulan konversi nilai','Konversi diterima','Konversi ditolak','Nilai sudah keluar'
    public function approve(Request $request, $id)
    {
        $km = mbkm::find($id);
        $km->status = 'Nilai sudah keluar';
        $km->update();
        return  back();
    }

    public function print(){
        return view('staff.print');
    }

    public function downloadpdf(){
        $pdf = PDF::loadview('staff.print');
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('konversi.pdf');
    }

    public function indexmhs(){
        $mahasiswa = mahasiswa::all();
        return view('staff.indexmahasiswa', compact('mahasiswa'));
    }
    public function createmhs(){
        $konsentrasi = konsentrasi::all();
        $roles = role::all();
        return view('staff.createmahasiswa', compact('konsentrasi','roles'));
    }

    public function storemhs(Request $request)
    {
        $request->validate([
            'prodi_id' => ['required'],
            'nim' => ['required', 'unique:mahasiswa'],
            'password' => ['required', 'min:3', 'max:255'],
            // 'gambar' => ['image', 'file', 'max:1024'],
            'nama' => ['required'],
            'email' => ['required', 'unique:dosen', 'email'],
            'angkatan' => ['required'],
        ]);

        Mahasiswa::create([
            'role_id' => $request->role_id,
            'prodi_id' => $request->prodi_id,
            'konsentrasi_id' => $request->konsentrasi_id,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
            // 'gambar' => $request->file('gambar')->store('gambar'),
            'nama' => $request->nama,
            'email' => $request->email,
            'angkatan' => $request->angkatan,
        ]);

        return redirect('/staff/mahasiswa')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function editmhs(Mahasiswa $mahasiswa)
    {
        return view('staff.editmahasiswa', [
            'mahasiswa' => $mahasiswa,
            'prodis' => Prodi::all(),
            'konsentrasis' => Konsentrasi::all(),
        ]);
    }

    public function updatemhs(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            'prodi_id' => ['required'],
            'nama' => ['required'],
            'angkatan' => ['required'],
        ];

        if ($mahasiswa->nim != $request->nim) {
            $rules['nim'] = 'required|unique:mahasiswa';
        } elseif ($mahasiswa->email != $request->email) {
            $rules['email'] = 'required|unique:mahasiswa';
        }

        $validated = $request->validate($rules);

        Mahasiswa::where('id', $mahasiswa->id)
            ->update($validated);

        return redirect('/staff/mahasiswa')->with('message', 'Data Berhasil Diedit!');
    }

    public function destroymhs(Mahasiswa $mahasiswa)
    {
        // if ($mahasiswa->gambar) {
        //     Storage::delete($mahasiswa->gambar);
        // }

        Mahasiswa::destroy($mahasiswa->id);
        return redirect('/staff/mahasiswa')->with('message', 'Data Berhasil Dihapus!');
    }


    public function indexdsn(){
        $dosen = dosen::all();
        return view('staff.indexdosen', compact('dosen'));
    }
    public function createdsn(){
        $prodis = prodi::all();
        $roles = role::all();
        return view('staff.createdosen', compact('prodis','roles'));
    }
    public function storedsn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => ['required', 'unique:dosen'],
            'password' => ['required', 'min:3', 'max:255'],
            // 'gambar' => ['image', 'file', 'max:1024'],
            'nama' => ['required'],
            'nama_singkat' => ['required'],
            'email' => ['required', 'unique:dosen', 'email'],
            // 'role_id' => ['unique:dosen']
        ]);
        $dosen = dosen::create([
            'role_id' => $request->role_id,
            'prodi_id' => $request->prodi_id,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'nama_singkat' => $request->nama_singkat,
            'email' => $request->email,
        ]);

        return redirect('/staff/dosen')->with('message', 'Data Berhasil Ditambahkan!');

    }

    public function editdsn(Dosen $dosen)
    {
        return view('staff.editdosen', [
            'dosen' => $dosen,
            'roles' => Role::all(),
            'prodis' => Prodi::all(),
        ]);
    }

    public function updatedsn(Request $request, Dosen $dosen)
    {
        $rules = [
            'nama' => ['required'],
            'nama_singkat' => ['required'],
            // 'password' => ['required', 'min:3', 'max:255'],
        ];

        if ($dosen->nip != $request->nip) {
            $rules['nip'] = 'required|unique:dosen';
        } elseif ($dosen->email != $request->email) {
            $rules['email'] = 'required|unique:dosen';
        } elseif ($dosen->role_id != $request->role_id) {
            $rules['role_id'] = 'unique:dosen';
        }

        $validated = $request->validate($rules);

        Dosen::where('id', $dosen->id)
            ->update($validated);

        return redirect('/staff/dosen')->with('message', 'Data Berhasil Diubah!');
    }

    public function destroydsn($id)
    {
        $dosen = dosen::find($id);
        $dosen->delete();
        return redirect('/staff/dosen')->with('message', 'Data Berhasil Dihapus!');
    }



    public function indexstaff(){
        $user = User::all();
        return view('staff.indexstaff', compact('user'));
    }
    public function createstaff(){
        $roles = role::all();
        return view('staff.createstaff', compact('roles'));
    }

    public function storestaff(Request $request)
    {
        $request->validate([
            'role_id' => ['required'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'min:3', 'max:255'],
            'nama' => ['required'],
            'email' => ['required', 'unique:users', 'email'],
        ]);

        User::create([
            'role_id' => $request->role_id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect('/staff/user')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function editstaff(User $user)
    {
        return view('staff.editstaff', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function updatestaff(Request $request, User $user)
    {
        $rules = [
            'role_id' => ['required'],
            'nama' => ['required'],
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        } elseif ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users|email';
        }

        $validated = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validated);

        return redirect('/staff/user')->with('message', 'Data Berhasil Diubah!');
    }

    public function destroystaff(User $user)
    {
        User::destroy($user->id);
        return redirect('/staff/user')->with('message', 'Data Berhasil Dihapus!');
    }

    public function editpswstaff(User $user)
    {
        return view('user.profil-editpsw', [
            'user' => $user,
        ]);
    }

    public function updatepswstaff()
    {
        request()->validate([
            'password_lama' => ['required'],
            'password' => ['required', 'min:5', 'max:255', 'confirmed'],
        ]);

        $current_password = auth()->user()->password;
        $old_password = request('password_lama');
        $user_id = auth()->user()->id;

        if (Hash::check($old_password, $current_password)) {

            $user = User::find($user_id);

            $user->password = Hash::make(request('password'));

            if ($user->save()) {
                return redirect('/staff')->with('message', 'Password Berhasil Diedit!');
            } else {
                return back()->with('message', 'Password Salah!');
            }
        } else {
            return back()->with('message', 'Password Salah!');
        }
    }

}
