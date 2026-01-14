<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting_environment.payment_methods_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_method_name' => 'required|string|max:255',
            'sub_category' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        PaymentMethod::create($validated);

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Metode pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('admin.setting_environment.payment_methods_edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $validated = $request->validate([
            'payment_method_name' => 'required|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $paymentMethod->update($validated);

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Metode pembayaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Metode pembayaran berhasil dihapus');
    }
}
