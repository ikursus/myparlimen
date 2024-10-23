<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Jawatan;
use App\Models\AhliParlimen;
use App\Models\Gelaran;
use App\Models\Parti;
use Illuminate\Http\Request;

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
        $senaraiAhliParlimen = AhliParlimen::paginate(5);

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
        //
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

        return view('ahli.template-create', compact(
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
    public function update(Request $request, AhliParlimen $ahliParlimen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AhliParlimen $ahliParlimen)
    {
        //
    }
}
