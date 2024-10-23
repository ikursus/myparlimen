@extends('layout.template-induk')

@section('isi-kandungan-utama-halaman')

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">Kemaskini Ahli Parlimen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Ahli Parlimen</li>
            <li class="breadcrumb-item active">Kemaskini</li>
        </ol>

        <form method="POST" action="{{ route('ahli.update', $ahli->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

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
                                <option value="{{ $parti->id }}" {{ (old('parti_id') ?? $ahli->parti_id) == $parti->id ? 'selected' : NULL }}>
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
                                <option value="{{ $key }}" {{ (old('blok') ?? $ahli->blok) == $key ? 'selected' : NULL }}>
                                    {{ $value }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') ?? $ahli->nama }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">No. KP</label>
                            <input type="text" class="form-control" name="no_ic" value="{{ old('no_ic') ?? $ahli->no_ic }}">

                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-md-6">

                            <label class="form-label">Gelaran</label>
                            <select name="gelaran_id" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiGelaran as $gelaran)
                                <option value="{{ $gelaran->id }}" {{ (old('gelaran_id') ?? $ahli->gelaran_id) == $gelaran->id ? 'selected' : NULL }}>
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
                                <option value="{{ $jawatan->id }}" {{ (old('jawatan_id') ?? $ahli->jawatan_id) == $jawatan->id ? 'selected' : NULL }}>
                                    {{ $jawatan->nama }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">No. Telefon</label>
                            <input type="text" class="form-control" name="no_tel" value="{{ old('no_tel') ?? $ahli->no_tel }}">

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') ?? $ahli->email }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">

                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control">{{ old('alamat') ?? $ahli->alamat }}</textarea>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label class="form-label">Jantina</label>
                            <select name="jantina" class="form-select">
                                <option value="">-- Sila Pilih --</option>

                                @foreach ($senaraiJantina as $key => $value)
                                <option value="{{ $key }}" {{ (old('jantina') ?? $ahli->jantina) == $key ? 'selected' : NULL }}>
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
                                <option value="{{ $key }}" {{ (old('status') ?? (string)$ahli->status) === (string)$key ? 'selected' : NULL }}>
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
                            @if (!is_null($ahli->photo))
                            <div class="mt-2">
                                <img src="{{ asset('uploads/' . $ahli->photo) }}" width="150" alt="">
                            </div>
                            @endif

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
