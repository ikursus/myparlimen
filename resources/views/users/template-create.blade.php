@extends('layout.template-induk')

@section('isi-kandungan-utama-halaman')

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">Daftar Pengguna Baru</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Pengguna</li>
            <li class="breadcrumb-item active">Daftar Baru</li>
        </ol>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Maklumat Pengguna
                </div>

                <div class="card-body">

                    @include('layout.template-alerts')

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">Email Pengguna</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">Password Pengguna</label>
                            <input type="password" class="form-control" name="password">

                        </div>
                        <div class="col-md-6">

                            <label class="form-label">Password (Pengesahan)</label>
                            <input type="password" class="form-control" name="password_confirmation">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">Jawatan Pengguna</label>
                            <select name="jawatan_id" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiJawatan as $jawatan)
                                <option value="{{ $jawatan->id }}" {{ old('jawatan_id') == $jawatan->id ? 'selected' : NULL }}>
                                    {{ $jawatan->nama }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                        <div class="col-md-6">

                            <label class="form-label">Unit Pengguna</label>
                            <select name="unit_id" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiUnit as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : NULL }}>
                                    {{ $unit->nama }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>

        </form>

    </div>

</main>

@endsection
