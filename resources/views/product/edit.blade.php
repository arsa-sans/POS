<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Produk</title>
</head>
<body>
  @extends('templates.layout')
  @section('content')
  <h1>Edit Produk</h1>
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
  <form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <input type="type" name="description" value="{{ $product->description }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="type" name="stock" value="{{ $product->stock }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="type" name="price" value="{{ $product->price }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select class="form-select" name="category_id" id="category">
          <option value="" selected disabled>Pilih Kategori</option>
          @foreach ($category as $ct)
            <option value="{{ $ct->id }}" {{ $ct->id == $product->category_id ? 'selected' : '' }} >{{ $ct->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-secondary">Update</button>
  </form>
  @endsection
</body>
</html>