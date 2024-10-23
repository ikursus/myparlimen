<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Parti;
use App\Models\Gelaran;
use App\Models\Jawatan;
use App\Models\AhliParlimen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AhliParlimenController extends Controller
{
    public function senaraiBlok()
    {
        return [
            'kerajaan' => 'Kerajaan',
            'pembangkang' => 'Pembangkang',
        ];
    }

    public function senaraiJantina()
    {
        return [
            'lelaki' => 'Lelaki',
            'perempuan' => 'Perempuan',
        ];
    }

    public function senaraiStatus()
    {
        return [
            '1' => 'Aktif',
            '0' => 'Tidak Aktif',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Senarai Pengguna';
        // $senaraiAhliParlimen = AhliParlimen::paginate(5);

        // Cara relation daripada table ahli_parlimen kepada table gelaran
        // dan table jawatan menerusi kaedah join table
        // $senaraiAhliParlimen = AhliParlimen::join('gelaran', 'gelaran.id', '=', 'ahli_parlimen.gelaran_id')
        //     ->join('jawatan', 'jawatan.id', '=', 'ahli_parlimen.jawatan_id')
        //     ->select('ahli_parlimen.*', 'gelaran.nama as nama_gelaran', 'jawatan.nama as nama_jawatan')
        //     ->paginate(5);
        $senaraiAhliParlimen = AhliParlimen::with('relationGelaran', 'relationJawatan', 'relationParti')
        ->paginate(5);

        return view('ahli.template-index', compact('pageTitle', 'senaraiAhliParlimen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $senaraiJawatan = Jawatan::select('id', 'nama')->get();
        $senaraiUnit = Unit::select('id', 'nama')->get();
        $senaraiGelaran = Gelaran::select('id', 'nama')->get();
        $senaraiParti = Parti::select('id', 'nama')->get();
        $senaraiBlok = self::senaraiBlok();
        $senaraiJantina = self::senaraiJantina();
        $senaraiStatus = self::senaraiStatus();

        return view('ahli.template-create', compact(
            'senaraiJawatan',
            'senaraiUnit',
            'senaraiGelaran',
            'senaraiParti',
            'senaraiBlok',
            'senaraiJantina',
            'senaraiStatus'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gelaran_id' => 'required|integer',
            'jawatan_id' => 'required|integer',
            'parti_id' => 'required|integer',
            'blok' => 'required',
            'nama' => 'required',
            'no_ic' => 'required',
            'no_tel' => 'required',
            'jantina' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'alamat' => 'required',
            'photo' => 'nullable|sometimes|mimes:jpg,jpeg,png,gif|max:1024',
            'status' => 'required',
        ]);

        // Semak jika ada gambar/photo yang diupload
        if ($request->hasFile('photo'))
        {
            // Attachkan nama photo ke $data dan simpan dalam folder public/uploads/gambar
            $file = $request->file('photo');
            $data['photo'] = $file->store('gambar', 'public_uploads');

        }

        // Simpan data ke dalam table ahli_parlimen
        AhliParlimen::create($data);

        // Selesai simpan, redirect ke halaman senarai ahli parlimen
        return redirect()->route('ahli.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AhliParlimen $ahliParlimen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AhliParlimen $ahli)
    {
        $senaraiJawatan = Jawatan::select('id', 'nama')->get();
        $senaraiUnit = Unit::select('id', 'nama')->get();
        $senaraiGelaran = Gelaran::select('id', 'nama')->get();
        $senaraiParti = Parti::select('id', 'nama')->get();
        $senaraiBlok = self::senaraiBlok();
        $senaraiJantina = self::senaraiJantina();
        $senaraiStatus = self::senaraiStatus();

        return view('ahli.template-edit', compact(
            'ahli',
            'senaraiJawatan',
            'senaraiUnit',
            'senaraiGelaran',
            'senaraiParti',
            'senaraiBlok',
            'senaraiJantina',
            'senaraiStatus'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AhliParlimen $ahli)
    {
        $data = $request->validate([
            'gelaran_id' => 'required|integer',
            'jawatan_id' => 'required|integer',
            'parti_id' => 'required|integer',
            'blok' => 'required',
            'nama' => 'required',
            'no_ic' => 'required',
            'no_tel' => 'required',
            'jantina' => 'required',
            'email' => 'required|email:filter|unique:users,email,' . $ahli->id,
            'alamat' => 'required',
            'photo' => 'nullable|sometimes|mimes:jpg,jpeg,png,gif|max:1024',
            'status' => 'required',
        ]);

        // Semak jika ada gambar/photo yang diupload
        if ($request->hasFile('photo'))
        {
            // Attachkan nama photo ke $data dan simpan dalam folder public/uploads/gambar
            $file = $request->file('photo');
            $data['photo'] = $file->store('gambar', 'public_uploads');

            // Semak jika gambar lama ada
            if (!is_null($ahli->photo) && Storage::disk('public_uploads')->exists($ahli->photo))
            {
                // Hapus gambar lama
                Storage::disk('public_uploads')->delete($ahli->photo);
            }

        }

        // Simpan data ke dalam table ahli_parlimen
        $ahli->update($data);

        // Selesai simpan, redirect ke halaman senarai ahli parlimen
        return redirect()->route('ahli.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AhliParlimen $ahliParlimen)
    {
        //
    }

    public function parlimen()
    {
        $ahliParlimen = AhliParlimen::with('relationParti')
        ->get()
        ->map(function($ahli) {
            return [
                'id' => $ahli->id,
                'name' => $ahli->nama,
                'label' => $ahli->blok,
                'parti_color' => $ahli->relationParti->color ?? '#000000',
            ];
        });

        return view('ahli.template-parlimen', compact('ahliParlimen'));
    }
}
