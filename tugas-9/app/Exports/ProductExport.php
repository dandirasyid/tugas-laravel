<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings {
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {
        $query = Product::select('id', 'nama', 'harga', 'stok', 'berat', 'kondisi', 'deskripsi')->get();
        return $query;
    }

    public function headings(): array {
        return [
            'ID',
            'Nama',
            'Harga',
            'Stok',
            'Berat',
            'Kondisi',
            'Deskripsi'
        ];
    }
}
