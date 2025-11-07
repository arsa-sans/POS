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
  <form action="{{ url('category') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label for="" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kategori">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Deskripsi">
      </div>
    </div>
    <button type="submit" class="btn btn-secondary">Kirim</button>
  </form>
  @endsection
</body>
</html>