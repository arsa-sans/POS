@foreach($categories as $category)
  <h3 align="center">{{ $category->name }}</h3>
  <div class="row row-cols-1 row-cols-md-2 g-4">
  @foreach($category->product as $product)
    <div class="col">
      <div class="card">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5><br>
          <input type="hidden" name="" class="id_product" value="{{ $product->id }}">
          <h3>{{ $product->price }}</h3><br>
          <button class="btn-add btn btn-primary btn-sm">Add to cart</button>
        </div>
      </div>
    </div>
  @endforeach
  </div>
@endforeach