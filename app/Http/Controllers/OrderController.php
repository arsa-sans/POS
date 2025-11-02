<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_payload' => 'required|string',
        ]);

        $payload = json_decode($validated['order_payload'], true);
        if(!$payload || empty($payload['items'])) {
            return redirect()->back()->with('error', 'No items in order');
        }

        DB::beginTransaction();
        try {
            $order = new Order();
            $order->invoice = 'INV'.time();
            $order->total = $payload['total'] ?? array_sum(array_column($payload['items'], 'price'));
            $order->user_id = Auth::id() ?? 1;
            $order->customer_id = $validated['customer_id'];
            $order->save();
            foreach($payload['items'] as $item) {
                $detail = new OrderDetail();
                $detail->order_id = $order->id;
                $detail->product_id = $item['id'];
                $detail->quantity = $item['qty'];
                $detail->price = $item['price'];
                $detail->save();
            }
            DB::commit();
            return redirect()->route('order.print', $order->id)->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create order: ' . $e->getMessage());
        }
    }

    public function print(Order $order)
    {
        $details = \App\Models\OrderDetail::where('order_id', $order->id)->get();
        $productIds = $details->pluck('product_id')->unique()->toArray();
        $products = \App\Models\Product::whereIn('id', $productIds)->get()->keyBy('id');
        return view('order.print', [
            'order' => $order,
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
