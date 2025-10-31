@foreach($categories as $category)
  <h5 class="mb-2 mt-3 text-secondary">{{ $category->name }}</h5>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2 item-product">
  @foreach($category->product as $product)
    <div class="col">
      <div class="card h-100 shadow-sm">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body p-2 d-flex flex-column justify-content-between">
          <div>
            <h6 class="card-title mb-1" style="margin:0; font-size:0.95rem;">{{ $product->name }}</h6>
          </div>
          <div class="text-muted small">Rp {{ number_format($product->price, 2, ',', '.') }}</div>
          <div class="d-flex justify-content-end align-items-center mt-2">
            <input type="hidden" class="id_product" value="{{ $product->id }}" data-price="{{ $product->price }}">
            <button class="btn btn-sm btn-outline-primary btn-add" title="Tambah ke keranjang">
              <span class="small">Add</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>
@endforeach