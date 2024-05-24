<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller {
    public function index() {
        $user = Auth::user();
        $products = Product::get();
        return view('products.index', compact('products', 'user'));
    }

    public function detail($id) {
        $user = Auth::user();
        $product = Product::find($id);
        return view('products.detail', compact('product', 'user'));
    }

    public function transaksi($id) {
        $user = Auth::user();
        $product = Product::find($id);

        $latestTransaction = Transaction::latest()->first();
        return view('products.transaksi', compact('product', 'user', 'latestTransaction'));
    }

    public function createTransaksi(Request $request, $id) {
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $adminFee = 5000;
        $uniqueCode = Transaction::max('unique_code') + 1;

        $total = $product->harga + $adminFee + $uniqueCode;
        $invoiceNumber = now()->format('Ymd') . Str::random(5);
        $expiredAt = now()->addHours(3);

        $transaction = Transaction::create([
            'no_invoice' => $invoiceNumber,
            'user_id' => $user->id,
            'product_id' => $product->id,
            'admin_fee' => $adminFee,
            'unique_code' => $uniqueCode,
            'total' => $total,
            'payment_method' => 'VA BNI',
            'status' => 'PAID',
            'expired_at' => $expiredAt,
        ]);

        return compact('transaction', 'product', 'user');
    }
}
