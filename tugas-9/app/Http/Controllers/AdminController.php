<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Http\Requests\ProductCreateRequest;
use App\Imports\ProductImport;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller {
    public function index() {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $products = Product::latest()->get();
        return view('admins.index', compact('user', 'products'));
    }

    public function create() {
        $user = Auth::user();
        return view('admins.create', compact('user'));
    }

    public function store(ProductCreateRequest $request) {
        try {
            $user = Auth::user();

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

            return redirect()->route('admin.index');
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
            Storage::disk('public')->delete($product->gambar);
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

    public function exportProduct(Request $request) {
        return Excel::download(new ProductExport($request), 'List Product.xlsx');
    }

    public function importProduct(Request $request) {
        $user = Auth::user();
        Excel::import(new ProductImport($user), $request->file('import'));
        return redirect()->route('admin.index');
        // dd($request->all());
        // DB::beginTransaction();
        // try {
        //     $user = Auth::user();
        //     Excel::import(new ProductImport($user), $request->file('import'));
        //     DB::commit();

        //     return redirect()->route('admin.index');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     Log::debug($e);
        //     abort(400, 'Error importing product');
        // }
    }
}
