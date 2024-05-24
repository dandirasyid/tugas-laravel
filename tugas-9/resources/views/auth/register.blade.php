<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Register</title>
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
    <div class="container rounded-3 mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4 border p-4 rounded bg-white mt-3 mb-3">
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('register_user') }}" method="POST">
                    <h3 class="fw-bold mb-3 text-center">Halaman Register User</h3>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                    </div>
                    @error('nama')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required>
                    </div>
                    @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required>
                    </div>
                    @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" class="form-select" id="gender" required>
                            <option value="">Pilih Jenis Kelamin Kamu</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    @error('gender')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" id="umur" class="form-control" placeholder="Masukan Umur Kamu" required>
                    </div>
                    @error('umur')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </div>
                    @error('tanggal_lahir')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat Kamu" required></textarea>
                    </div>
                    @error('alamat')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="w-100 btn btn-lg btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>