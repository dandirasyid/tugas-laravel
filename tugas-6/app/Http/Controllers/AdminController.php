<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function index($id) {
        $user = User::find($id);
        return view('admins.index', compact('user'));
    }

    public function create($id) {
        $user = User::find($id);
        return view('admins.create', compact('user'));
    }

    public function store(Request $request, $id) {
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

        $user = User::find($id);

        $product = new Product();
        $product->user_id = $user->id;
        $product->gambar = $request->gambar;
        $product->nama = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('admin.index', $id);
    }

    public function edit($user_id, $id) {
        $product = Product::find($id);
        return view('admins.edit', compact('product'));
    }

    public function update(Request $request, $user_id,  $id) {
        if (!$request->gambar) {
            return redirect()->back()->with('error', 'Error. Field Gambar wajib di isi');
        } else if (!$request->nama) {
            return redirect()->back()->with('error', 'Error. Field Nama wajib di isi');
        } else if (!$request->berat) {
            return redirect()->back()->with('error', 'Error. Field Berat wajib di isi');
        } else if (!$request->harga) {
            return redirect()->back()->with('error', 'Error. Field Harga wajib di isi');
        } else if (!$request->stok) {
            return redirect()->back()->with('error', 'Error. Field Stok wajib di isi');
        } else if ($request->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi wajib di isi');
        } else if (!$request->deskripsi) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi wajib di isi');
        }

        Product::where('id', $id)->update([
            'gambar' => $request->gambar,
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
        $product->delete();
        return redirect()->route('admin.index', $user_id);
    }

    public function show($id) {
        $user = User::find($id);
        return view('admins.show', compact('user'));
    }
}
