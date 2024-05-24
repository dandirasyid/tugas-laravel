<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Transaksi</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-2">
            <img src="https://amandemy.co.id/images/amandemy-logo.png" alt="logo" width="200px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    @if(auth()->user()->hasRole('superadmin'))
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('products.index')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('admin.index')}}">Manage Product</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('user.index') }}">Manage User</a>
                    </li> -->
                    @else
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('products.index')}}">Product</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg> {{ $user->nama}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="max-width: 100%; right: 0; left: auto;">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <a class="fw-bold dropdown-item" href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold mx-1 text-dark" href="{{ route('products.index') }}">PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info fw-bold" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    <div class="d-flex justify-content-center mt-3 mb-5">
        <div class="col-md-6 border p-4 rounded-3">
            <h3 class="text-center fw-bold">Invoice Transaksi</h3>
            <h5 class="border-bottom" style="line-height: 50px;">Detail Transaksi</h5>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    <p class="fw-bold">No. Invoice</p>
                    <p class="fw-bold">Admin Fee</p>
                    <p class="fw-bold">Kode Unik</p>
                    <p class="fw-bold">Total</p>
                    <p class="fw-bold">Metode Pembayaran</p>
                    <p class="fw-bold">Status</p>
                    <p class="fw-bold">Tanggal Kadaluwarsa</p>
                </div>
                <div>
                    <p>{{ $latestTransaction->no_invoice }}</p>
                    <p>{{ $latestTransaction->admin_fee }}</p>
                    <p>{{ $latestTransaction->unique_code }}</p>
                    <p>{{ $latestTransaction->total }}</p>
                    <p>{{ $latestTransaction->payment_method }}</p>
                    <p class="bg-{{ $latestTransaction->status == 'UNPAID' ? 'danger' : 'success' }} p-1 rounded text-center">{{ $latestTransaction->status }}</p>
                    <p>{{ $latestTransaction->expired_at }}</p>
                </div>
            </div>
            <h5 class="border-bottom mt-2" style="line-height: 50px;">Produk yang Dibeli</h5>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="w-50">
                    <img src="{{Storage::url($product->gambar)}}" alt="{{$product->nama}}" width="100%">
                </div>
                <div class="w-50 ms-3">
                    <h3 class="fw-bold">{{$product->nama}}</h3>
                    <div class="d-flex justify-content-between">
                        <p>Stok : {{$product->stok}}</p>
                        <p class="bg-info p-1 rounded">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Kondisi : {{$product->kondisi}}</p>
                        <p>{{$product->berat}}gr</p>
                    </div>
                </div>
            </div>
            <h5 class="border-bottom mt-2" style="line-height: 50px;">Data Pembeli</h5>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    <p class="fw-bold">Nama</p>
                    <p class="fw-bold">Email</p>
                    <p class="fw-bold">Handphone</p>
                    <p class="fw-bold">Alamat</p>
                </div>
                <div>
                    <p>{{$user->nama}}</p>
                    <p>{{$user->email}}</p>
                    <p>0812xxxxxx</p>
                    <p>{{$user->alamat}}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>