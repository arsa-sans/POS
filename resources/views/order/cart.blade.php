<form id="order-form" action="{{ route('order.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="customer_id">Pelanggan</label>
        <select id="customer_id" name="customer_id" class="form-control">
            @foreach($customers as $cust)
                <option value="{{ $cust->id }}">{{ $cust->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="hidden" id="order-payload" name="order_payload">

    <table id="tbl-cart" class="table">
        <tbody></tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total</td>
                <td id="total-cell">Rp 0</td>
            </tr>
        </tfoot>
    </table>

    <button type="submit" id="submit-order" class="btn btn-success">Submit Order</button>
</form>
