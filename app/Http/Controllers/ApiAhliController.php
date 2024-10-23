<?php

namespace App\Http\Controllers;

use App\Models\AhliParlimen;
use Illuminate\Http\Request;

class ApiAhliController extends Controller
{
    public function getAhliParlimen()
    {
        $data = AhliParlimen::with('relationGelaran', 'relationJawatan')
        ->select('id', 'nama', 'gelaran_id', 'jawatan_id')
        ->get();

        return response()->json($data);
    }
}
