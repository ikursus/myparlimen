@extends('layout.template-induk')

@section('isi-kandungan-utama-halaman')

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">Daftar Ahli Parlimen Baru</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Ahli Parlimen</li>
            <li class="breadcrumb-item active">Daftar Baru</li>
        </ol>

        <form method="POST" action="{{ route('ahli.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Maklumat Ahli Parlimen
                </div>

                <div class="card-body">

                    @include('layout.template-alerts')

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">Parti</label>
                            <select name="parti_id" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiParti as $parti)
                                <option value="{{ $parti->id }}" {{ old('parti_id') == $parti->id ? 'selected' : NULL }}>
                                    {{ $parti->nama }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                        <div class="col-md-6">

                            <label class="form-label">Blok</label>
                            <select name="blok" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiBlok as $key => $value)
                                <option value="{{ $key }}" {{ old('blok') == $key ? 'selected' : NULL }}>
                                    {{ $value }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">No. KP</label>
                            <input type="text" class="form-control" name="no_ic" value="{{ old('no_ic') }}">

                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-md-6">

                            <label class="form-label">Gelaran</label>
                            <select name="gelaran_id" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiGelaran as $gelaran)
                                <option value="{{ $gelaran->id }}" {{ old('gelaran_id') == $gelaran->id ? 'selected' : NULL }}>
                                    {{ $gelaran->nama }}
                                </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">Jawatan</label>
                            <select name="jawatan_id" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiJawatan as $jawatan)
                                <option value="{{ $jawatan->id }}" {{ old('jawatan_id') == $jawatan->id ? 'selected' : NULL }}>
                                    {{ $jawatan->nama }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">No. Telefon</label>
                            <input type="text" class="form-control" name="no_tel" value="{{ old('no_tel') }}">

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">Jantina</label>
                            <select name="jantina" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiJantina as $key => $value)
                                <option value="{{ $key }}" {{ old('jantina') == $key ? 'selected' : NULL }}>
                                    {{ $value }}
                                </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">Status Ahli</label>
                            <select name="status" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiStatus as $key => $value)
                                <option value="{{ $key }}" {{ old('status') === (string)$key ? 'selected' : NULL }}>
                                    {{ $value }}
                                </option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">

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
