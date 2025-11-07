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
  <h1>Edit Kategori</h1>
  <form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <input type="type" name="description" value="{{ $category->description }}" class="form-control">
      </div>
    </div>
    <button type="submit" class="btn btn-secondary">Update</button>
  </form>
  @endsection
</body>
</html>