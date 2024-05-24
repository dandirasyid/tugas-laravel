<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>List Products</title>
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
    <div class="container mt-4 mb-4 bg-info  d-flex flex-column align-items-center rounded-3">
        <div class="d-flex justify-content-between w-100 align-items-center">
            <div class="text-center">
                <h3 class="fw-bold mt-5">List Product</h3>
            </div>
            <span style="width: 100px;"></span>
            <div class="mt-5">
                <a href="{{route('profile')}}" class="btn btn-primary text-white fw-bold">Lihat Profile</a>
                <a href="{{route('admin.create')}}" class="btn btn-dark text-white">Tambah Produk</a>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success text-white fw-bold">Import Product</button>
                <a href="{{route('admin.products.export')}}" class="btn btn-warning text-dark fw-bold">Export Product</a>
                <!-- <a href="{{route('products.index')}}" class="btn btn-secondary text-white">Kembali ke Produk</a> -->
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.products.import') }}" method="POST" class="modal-content" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-header">
                        <h1 class="modal-tittle fs-5" id="exampleModalLabel">Import Data Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="#">Klik Untuk mengunduh template import</a>
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label fw-semibold">Data Excel</label>
                            <input type="file" class="form-control @error('import') is-invalid @enderror" name="import" id="import" placeholder="Masukan data excel" value="{{old('import')}}">
                            @error('import')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped mt-3">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Kondisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$product['nama']}}</td>
                    <td>{{$product['stok']}}</td>
                    <td>{{$product['berat']}}</td>
                    <td>Rp. {{ number_format($product['harga'], 0, ',', '.') }}</td>
                    <td>
                        <p class="bg-{{ $product['kondisi'] == 'Baru' ? 'success' : 'dark' }} text-{{ $product['kondisi'] == 'Baru' ? 'dark' : 'white' }} rounded" style="padding: 6px;">{{$product['kondisi']}}</p>
                    </td>
                    <td>
                        <a href="{{route('admin.edit', ['user_id'=>$product['user_id'], 'id'=>$product['id']])}}" class="btn btn-warning">Update</a>
                        <form action="{{route('admin.destroy',  ['user_id'=>$product['user_id'], 'id'=>$product['id']])}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger text-white" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>