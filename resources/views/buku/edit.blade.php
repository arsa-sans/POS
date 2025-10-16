<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        @extends('templates.layout')
    </header>
    <main>
        @section('content')
            <h2>Edit Buku</h2>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Pesan error --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Pesan validasi error (misal input kosong atau duplikat) --}}
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    <strong>Terjadi kesalahan pada input:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('buku.update', $data->kode_buku) }}" method="POST">
                @csrf
                <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" value="{{ $data->judul }}" class="form-control">
                </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" value="{{ $data->penulis }}" class="form-control">
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" value="{{ $data->penerbit }}" class="form-control">
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" value="{{ $data->tahun_terbit }}" class="form-control">
                    </div>
                </div>
                <button type="submit">Update</button>
            </form>
        @endsection
    </main>
</body>
</html>