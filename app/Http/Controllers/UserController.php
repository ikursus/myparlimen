<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Senarai Pengguna';
        $senaraiPengguna = User::all();

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
        return view('users.template-create');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
