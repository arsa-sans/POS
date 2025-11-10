<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Support\Facades\DB;
use PDO;
use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            Customer::create($request->validated());
            DB::commit();
            return redirect('customers')->with('success', 'Pelanggan berhasil ditambahkan.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('customers')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecustomerRequest $request, $id, Customer $customers)
    {
        DB::beginTransaction();
        try {
            $customers = Customer::findOrfail($id);
            $customers->update($request->validated());
            DB::commit();
            return redirect('customers')->with('success', 'Pelanggan berhasil diperbarui.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('customers')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, $id)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();
            DB::commit();
            return redirect('customers')->with('success', 'Pelanggan berhasil dihapus.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('customers')->with('error', $e->getMessage());
        }

        return redirect('customers');
    }
}
