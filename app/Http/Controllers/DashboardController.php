<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $token = $request->user()->createToken('Ahmad')->plainTextToken;

        //$token->plainTextToken;

        return view('template-dashboard', compact('token'));
    }
}
