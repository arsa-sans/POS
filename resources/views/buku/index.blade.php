<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Document</title>
</head>
<body>
  <header>
    @extends('templates.layout')
  </header>
  <main>
    @section('content')
    <h2>Halaman Daftar Buku</h2>
    {{-- Pesan sukses --}}
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

    <div>
    <button><a href=" {{ url('form/create') }} " style="color: white; text-decoration: none;">+ Tambah Buku</a></button>
    </div>
      @include('buku.data')
    @endsection
  </main>
</body>
</html>