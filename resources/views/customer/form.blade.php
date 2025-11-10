<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  @extends('templates.layout')
  @section('content')
  <h1>Tambah Kategori</h1>
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
  <form action="{{ url('customer') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label for="" class="form-label">Nama</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Alamat</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Alamat">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">No. Telepon</label>
        <input type="number" class="form-control" name="phone" id="phone" placeholder="No. Telepon">
      </div>
    </div>
    <button type="submit" class="btn btn-secondary">Submit</button>
  </form>
  @endsection
</body>
</html>