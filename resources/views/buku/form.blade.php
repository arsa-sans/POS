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
      <h2>Tambah Buku</h2>
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

      <form action="{{ url('buku') }}" method="post">
        @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Penulis</label>
            <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Penulis Buku">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit Buku">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit Buku">
          </div>
        </div>
        <button type="submit">Kirim</button>
      </form>
    @endsection
  </main>
</body>
</html>