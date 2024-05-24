<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['nama', 'harga', 'stok', 'berat', 'gambar', 'kondisi', 'deskripsi'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactions() {
        return $this->hasOne(Transaction::class);
    }
}
