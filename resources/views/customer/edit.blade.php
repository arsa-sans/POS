<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pelanggan</title>
</head>
<body>
  @extends('templates.layout')
  @section('content')
  <h1>Edit Pelanggan</h1>
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
  <form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="address" value="{{ $customer->address }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">No. Telepon</label>
        <input type="number" name="phone" value="{{ $customer->phone }}" class="form-control">
      </div>
    </div>
    <button type="submit" class="btn btn-secondary">Update</button>
  </form>
  @endsection
</body>
</html>