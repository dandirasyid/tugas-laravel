<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {
    public function index($id) {
        $user = User::find($id);
        return view('admins.index', compact('user'));
    }

    public function create($id) {
        $user = User::find($id);
        return view('admins.create', compact('user'));
    }

    public function store(ProductCreateRequest $request, $id) {
        try {
            $user = User::find($id);

            if ($request->hasFile('gambar')) {
                $imagePath = $request->file('gambar')->store('gambar_product', 'public');
            }

            $product = new Product();
            $product->user_id = $user->id;
            $product->gambar = $imagePath;
            $product->nama = $request->nama;
            $product->berat = $request->berat;
            $product->harga = $request->harga;
            $product->stok = $request->stok;
            $product->kondisi = $request->kondisi;
            $product->deskripsi = $request->deskripsi;
            $product->save();
            
            return redirect()->route('admin.index', $id);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Gagal menambahkan data',
                'info' => $e->getMessage()
            ]);
        }
    }

    public function edit($user_id, $id) {
        $product = Product::find($id);
        return view('admins.edit', compact('product'));
    }

    public function update(ProductCreateRequest $request, $user_id,  $id) {
        $product = Product::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::delete($product->gambar);
            $imagePath = $request->file('gambar')->store('gambar_product', 'public');
        } else {
            $imagePath = $product->gambar;
        }

        Product::where('id', $id)->update([
            'gambar' =>  $imagePath,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('admin.index', $user_id);
    }

    public function delete($user_id, $id) {
        $product = Product::find($id);
        Storage::disk('public')->delete($product->gambar);
        $product->delete();
        return redirect()->route('admin.index', $user_id);
    }

    public function show($id) {
        $user = User::find($id);
        return view('admins.show', compact('user'));
    }
}
