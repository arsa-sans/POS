<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use PDOException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::get();
        $data['customers'] = Customer::get();
        return view('order.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('STORE DIPANGGIL');
        \Log::info($request->all());

        $payload = json_decode($request->order_payload, true);

        if (!$payload || empty($payload['items'])) {
            return back()->with('error', 'Tidak ada item dalam pesanan.');
        }

        DB::beginTransaction();
        try {
            // Buat invoice unik
            $invoice = 'INV-' . now()->format('YmdHis');

            // Simpan ke tabel orders

            $customers = Customer::find($request->name);
            
            $order = Order::create([
                'invoice'     => $invoice,
                'customer_id' => $request->customer_id,
                'user_id'     => Auth::id(), // ✅ tambahkan ini
                'name'        => $request->name,
                'total'       => $payload['total'],
                'created_at'  => Carbon::now(),
            ]);


            // Simpan ke tabel order_details
            foreach ($payload['items'] as $item) {
                OrderDetail::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['id'],
                    'quantity'   => $item['qty'],
                    'price'      => $item['unitPrice'],
                ]);
            }

            DB::commit();

            Log::info('ORDER BERHASIL DISIMPAN', ['order_id' => $order->id]);

            return redirect()->route('order.print', $order->id)
                            ->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('ERROR SIMPAN ORDER: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan order.');
        }
    }

    public function print(Order $order)
{
    // Ambil semua detail order
    $details = OrderDetail::where('order_id', $order->id)->get();

    // Ambil produk yang terlibat
    $productIds = $details->pluck('product_id')->unique()->toArray();
    $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

    return view('order.print', [
        'order' => $order->load('customer'), // ✅ pastikan customer ikut di-load
        'details' => $details,
        'products' => $products,
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
