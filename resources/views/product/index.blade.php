<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk</title>
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
  <h1>Produk</h1>
  <div>
    <a href=" {{ url('products/create') }} " class="btn btn-secondary">+ Add Product</a>
  </div>
  <div class="mt-3">
    @include('product.data')
  </div>
  @endsection
</body>
</html>