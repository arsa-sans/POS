<form action="{{ url('order') }}" id="order-form" method="POST">
  @csrf
  <div class="mb-2">
    <label for="customer_id" class="form-label">Pelanggan</label>
    <select name="customer_id" id="customer_id" class="form-select form-select-sm">
      @foreach($customers as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
      @endforeach
    </select>
  </div>

  <table class="table table-sm align-middle" id="tbl-cart">
    <thead>
      <tr>
        <th>Produk</th>
        <th>Qty</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2" class="text-end"><strong>Total</strong></td>
        <td id="total-cell">0</td>
      </tr>
    </tfoot>
  </table>
  <input type="hidden" name="order_payload" id="order-payload" value="">
  <button type="submit" id="submit-order" class="btn btn-success">Submit Order</button>

</form>
