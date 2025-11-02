@extends('templates.layout')

@section('content')
  <div class="container mt-4">
    <div class="card">
      <div class="card-body">
        <h4>Invoice: {{ $order->invoice }}</h4>
        <p><strong>Pelanggan :</strong> {{  $order->customer->name ?? 'Tidak Diketahui'}}</p>
        <p><strong>Tanggal :</strong> {{  $order->created_at}}</p>

        <table class="table table-sm">
          <thead>
            <tr>
              <th>Produk</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach($details as $d)
              <tr>
                <td>{{ $products[$d->product_id]->name ?? $d->product_id }}</td>
                <td>{{ $d->quantity }}</td>
                <td>{{ number_format($d->price,0,',','.') }}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2">Total</th>
              <th>{{ number_format($order->total, 0, ',', '.') }}</th>
            </tr>
        </table>
        <div class="mt-3">
          <a href="{{ url('beranda') }}" class="btn btn-secondary btn-sm">Kembali</a>
          <button id="print-now" class="btn btn-primary btn-sm">Print</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
<script>
  window.addEventListener('load', function(){
    setTimeout(function(){
      window.print()
    }, 300)
  })
  document.getElementById('print-now').addEventListener('click', function(){
    window.print()
  });
</script>
@endpush