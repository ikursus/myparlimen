@extends('layout.template-induk')

@section('isi-kandungan-utama-halaman')

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">Senarai Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Senarai Pengguna
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Pengguna</th>
                            <th>Emel</th>
                            <th>Jawatan ID</th>
                            <th>Unit ID</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

@endsection



