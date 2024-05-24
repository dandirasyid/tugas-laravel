<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection {
    protected $user;
    /**
     * @param Collection $collection
     */
    public function __construct($user) {
        $this->user = $user;
    }

    public function collection(Collection $collection) {
        // foreach ($collection as $item) {
        //     Product::create([
        //         'user_id' => $this->user->id,
        //         'gambar' => '/storage/app/public/4ewzQ1pepFdzaUBOcPW28315IdoThpRmwgKfLrnK.jpg',
        //         'nama' => $item['nama'],
        //         'harga' => $item['harga'],
        //         'stok' => $item['stok'],
        //         'berat' => $item['berat'],
        //         'kondisi' => $item['kondisi'],
        //         'deskripsi' => $item['deskripsi'],
        //     ]);
        // }
        // return $collection;

        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                return Product::create([
                    'user_id' => $this->user->id,
                    'gambar' => $row[0],
                    'nama' => $row[1],
                    'harga' => $row[2],
                    'stok' => $row[3],
                    'berat' => $row[4],
                    'kondisi' => $row[5],
                    'deskripsi' => $row[6],
                ]);
            }
        }
    }
}
