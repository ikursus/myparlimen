<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Jawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Senarai Pengguna';
        $senaraiPengguna = User::paginate(5);

        // Cara 1 attach data ke template view = with()
        // return view('users.template-index')
        // ->with('pageTitle', $pageTitle)
        // ->with('senaraiPengguna', $senaraiPengguna);

        // Cara 2 attach data ke template view = array
        // return view('users.template-index', ['
        //     pageTitle' => $pageTitle,
        //     'senaraiPengguna' => $senaraiPengguna
        // ]);

        // Cara 3 attach data ke template view = php compact
        return view('users.template-index', compact('pageTitle', 'senaraiPengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $senaraiJawatan = Jawatan::select('id', 'nama')->get();
        $senaraiUnit = Unit::select('id', 'nama')->get();

        return view('users.template-create', compact('senaraiJawatan', 'senaraiUnit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil SEMUA data daripada borang
        // $data = $request->all();
        // $data = $request->only('email', 'password', 'jawatan_id', 'unit_id', 'name');
        // $data = $request->except('_token', 'email');
        // $data = $request->input('name');
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required|min:3|confirmed',
            'jawatan_id' => 'required|integer',
            'unit_id' => ['required', 'integer']
        ]);

        // Simpan data kaedah Query Builder
        // DB::table('users')->insert($data);

        // Simpan data kaedah Eloquent ORM (Model) Cara 1
        // $pengguna = new User;
        // $pengguna->name = $data['name'];
        // $pengguna->email = $data['email'];
        // $pengguna->password = bcrypt($data['password']);
        // $pengguna->jawatan_id = $data['jawatan_id'];
        // $pengguna->unit_id = $data['unit_id'];
        // $pengguna->save();

        // Simpan data kaedah Eloquent ORM (Model) Cara 2
        User::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari rekod pengguna berdasarkan ID
        $user = User::findOrFail($id); // findOrFail hanya boleh digunakan untuk carian ID sahaja
        // $user = User::find($id); // Gunakan find jika ingin buat condition tertentu sekiranya tiada rekod
        // $user = User::where('id', '=', $id)->firstOrFail();
        $senaraiJawatan = Jawatan::select('id', 'nama')->get();
        $senaraiUnit = Unit::select('id', 'nama')->get();

        return view('users.template-edit', compact('user', 'senaraiJawatan', 'senaraiUnit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Buat validasi dan ambil data
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => 'required|email:filter|unique:users,email,' . $id,
            'jawatan_id' => 'required|integer',
            'unit_id' => ['required', 'integer']
        ]);

        // Semak jika ruang password diisi untuk ditukar
        if ($request->has('password') && $request->filled('password'))
        {
            $request->validate(['password' => 'min:3|confirmed']);

            // Attachkan password baru ke $data
            $data['password'] = $request->password;
        }

        // Cara rekod user yang perlu dikemaskini berdasarkan ID
        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari rekod pengguna berdasarkan ID
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
