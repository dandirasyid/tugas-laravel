<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index($id) {
        $user = User::find($id);
        return view('admins.index', compact('user'));
    }

    public function store() {
        $user = new User();
        $user->nama = 'Admin Rasyid Merchant';
        $user->email = 'admin.merchant@gmail.com';
        $user->gender = 'Male';
        $user->umur = '19';
        $user->tanggal_lahir = '2004-05-07';
        $user->alamat = 'JL. K. H. Ahmad Dahlan V, Kelurahan. Kukusan, Kecamatan Beji, Kota Depok';
        $user->save();

        $user_detail = new UserDetail();
        $user_detail->nama =  'Toko Rasyid';
        $user_detail->rate =  '4';
        $user_detail->produk_terbaik =  'Kucing British';
        $user_detail->deskripsi =  'Kucing import ini sangat berkualitas tinggi dan makan yang lancar, sehingga tidak perlu takut untuk mogok makan';
        $user_detail->user_id =  $user->id;
        $user->users_detail()->save($user_detail);
    }
}
