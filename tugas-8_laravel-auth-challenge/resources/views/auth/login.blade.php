<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-info px-2">
            <a class="navbar-brand fw-bold" href="">Amandemy Market</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    @if(auth()->user()->hasRole('superadmin'))
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('admin.index')}}">Manage Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('user.index') }}">Manage User</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('admin.index')}}">Manage Product</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                </ul>
        </nav>
    </header>
    <div class="container bg-info rounded-3 mt-3">
        <div class="d-flex justify-content-center w-100 align-items-center">
            <div class="text-center">
                <h3 class="fw-bold mt-3">LOGIN</h3>
                <span class="border border-dark row mx-auto border-2" style="width: 50px;"></span>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 border p-4 rounded bg-white mt-3 mb-3 ">
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('login_user') }}" method="POST">
                    @csrf
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

                    <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>