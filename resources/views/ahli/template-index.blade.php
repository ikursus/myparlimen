@extends('layout.template-induk')

@section('isi-kandungan-utama-halaman')

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">Senarai Ahli Parlimen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Ahli Parlimen</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Senarai Ahli Parlimen
            </div>
            <div class="card-body">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Blok</th>
                            <th>Parti</th>
                            <th>Nama</th>
                            <th>Gelaran</th>
                            <th>Jawatan</th>
                            <th>Photo</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $senaraiAhliParlimen as $ahli )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ahli->blok }}</td>
                            <td>{{ $ahli->parti_id }}</td>
                            <td>{{ $ahli->nama }}</td>
                            <td>{{ $ahli->gelaran_id }}</td>
                            <td>{{ $ahli->jawatan_id }}</td>
                            <td>
                                @if (!is_null($ahli->photo))
                                    <img
                                    src="{{ asset('uploads/'.$ahli->photo) }}"
                                    class="img-fluid img-thumbnail"
                                    style="max-width: 80px"
                                    >
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('ahli.edit', $ahli->id) }}" class="btn btn-primary">Edit</a>

                                <form method="POST" action="{{ route('ahli.destroy', $ahli->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Adakah anda pasti ingin hapus data {{ $ahli->nama }}?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $senaraiAhliParlimen->links() }}

            </div>
        </div>

    </div>
</main>

@endsection



