<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>
</head>
<body>
  @extends('templates.layout')

  @section('content')
  @if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
  @endif

  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  <h1>Kategori</h1>
  <div>
    <a href=" {{ url('categories/create') }} " class="btn btn-secondary">+ Add Category</a>
  </div>
  <div class="mt-3">
    @include('category.data')
  </div>
  @endsection
</body>
</html>