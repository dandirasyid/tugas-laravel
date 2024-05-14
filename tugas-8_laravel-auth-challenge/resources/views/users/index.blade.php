<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>List Users</title>
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
                        <a class="nav-link fw-bold" href="{{ route('user.index')}}">Manage User</a>
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
    <div class="container mt-4 mb-4 bg-info  d-flex flex-column align-items-center rounded-3">
        <div class="d-flex justify-content-between w-100 align-items-center">
            <div class="text-center">
                <h3 class="fw-bold mt-5">List User</h3>
            </div>
            <span style="width: 100px;"></span>
            <div class="mt-5">
                <a href="{{route('user.create')}}" class="btn btn-dark text-white">Tambah User</a>
                <a href="{{route('products.index')}}" class="btn btn-secondary text-white">Kembali ke Produk</a>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success w-100 mt-2">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger w-100 mt-2">
            {{ session('error') }}
        </div>
        @endif
        <table class="table table-striped mt-3">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Umur</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$user['nama']}}</td>
                    <td>
                        <p class="bg-{{ $user['gender'] == 'Male' ? 'success' : 'dark' }} text-{{ $user['gender'] == 'Baru' ? 'dark' : 'white' }} rounded" style="padding: 6px;">{{$user['gender']}}</p>
                    </td>
                    <td>{{$user['umur']}}</td>
                    <td>{{ $user['tanggal_lahir'] }}</td>
                    <td>{{ $user['alamat'] }}</td>
                    <td>
                        <a href="{{route('user.edit', ['user_id'=>$user['user_id'], 'id'=>$user['id']])}}" class="btn btn-warning">Update</a>
                        <form action="{{route('user.destroy',  ['user_id'=>$user['user_id'], 'id'=>$user['id']])}}" method="POST" class="d-inline">
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