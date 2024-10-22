@extends('layout.template-induk')

@section('isi-kandungan-utama-halaman')

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">Senarai Jawatan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Jawatan</li>
        </ol>

    </div>
</main>

@endsection

@section('sebelum-tutup-body')
<script>
    alert('hello world');
</script>
@endsection



