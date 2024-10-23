<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiPostController extends Controller
{
    public function getPosts()
    {
        // Dapatkan data daripada API Post https://jsonplaceholder.typicode.com/posts
      // $response = Http::withToken('--bearer-token-here--')->get('https://jsonplaceholder.typicode.com/posts');
      $response = Http::get('https://jsonplaceholder.typicode.com/users');

        $senaraiUsers = $response->json();

        // Simpan data user daripada API
        foreach ($senaraiUsers as $user)
        {
            // Semak kewujudan data berdasarkan email
            $pengguna = User::where('email', $user['email'])->first();

            // Jika pengguna sudah wujud, maka skip  foreach kepada rekod berikutnya
            if ($pengguna) {
                continue;
            }

            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
            ]);

        }

        return 'Semua Rekod berjaya ditambah';

        // return view('posts.template-index', compact('senaraiPosts'));
    }


    public function submitPosts(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // Bekalkan user ID untuk data
        $data['userId'] = 1;

        // Dapatkan data daripada API Post https://jsonplaceholder.typicode.com/posts
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', $data);

        return response()->json($response->json());
    }
}
