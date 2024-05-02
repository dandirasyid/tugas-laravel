<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function index() {
        $products = Product::get();
        return view('admins.index', compact('products'));
    }

    public function create() {
        return view('admins.create');
    }

    public function store(Request $request) {
        if (!$request->filled('gambar')) {
            return redirect()->back()->with('error', 'Error. Field Gambar wajib di isi');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama wajib di isi');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat wajib di isi');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga wajib di isi');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok wajib di isi');
        } else if ($request->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi wajib di isi');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi wajib di isi');
        }

        $product = new Product();
        $product->gambar = $request->gambar;
        $product->nama = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('admin.index');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('admins.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'gambar' => 'required',
            'nama' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'required',
        ]);

        Product::where('id', $id)->update([
            'gambar' => $request->gambar,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('admin.index');
    }

    public function delete(Request $request, $id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.index');
    }
}
