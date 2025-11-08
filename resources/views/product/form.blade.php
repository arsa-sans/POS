<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Product</title>
</head>
<body>
  @extends('templates.layout')
  @section('content')
  <h1>Tambah Product</h1>
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
  <form action="{{ url('product') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label for="" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Produk">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Deskripsi">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Stok</label>
        <input type="number" class="form-control" name="stock" id="stock" placeholder="Stok">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Harga</label>
        <input type="number" class="form-control" step="0.01" name="price" id="price" placeholder="Harga">
      </div>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Kategori</label>
      <select class="form-select" name="category_id" id="category">
        <option value="" selected disabled>Pilih Kategori</option>
        @foreach ($category as $ct)
          <option value="{{ $ct->id }}">{{ $ct->name }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-secondary">Submit</button>
  </form>
  @endsection
</body>
</html>