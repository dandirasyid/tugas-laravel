<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Tambah Edit</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-info">
                    <div class="card-body">
                        <form action="{{route('user.update', ['user_id'=>$user['user_id'], 'id'=>$user['id']])}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf()
                            <h4 class="text-center fw-bold">Edit Data User {{ $user->id }}</h4>

                            <div class="form-group">
                                <label for="nama" class="fw-bold mt-2 mb-2">Nama User</label>
                                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan nama user" value="{{ old('nama') ? old('nama') : $user->nama }}">
                                @error('nama')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="fw-bold mt-2 mb-2">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email" value="{{ old('email') ? old('email') : $user->email }}">
                                @error('email')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="fw-bold mt-2 mb-2">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password">
                                @error('password')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role" class="fw-bold mt-2 mb-2">Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="0" {{ old('role', $user->role) == '0' ? 'selected' : '' }}>Pilih role</option>
                                    <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>SuperAdmin</option>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('role')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender" class="fw-bold mt-2 mb-2">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="0" {{ old('gender', $user->gender) == '0' ? 'selected' : '' }}>Pilih Gender</option>
                                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="umur" class="fw-bold mt-2 mb-2">Umur</label>
                                <input type="number" name="umur" class="form-control" id="umur" placeholder="Masukan Umur" value="{{ old('umur') ? old('umur') : $user->umur }}">
                                @error('umur')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir" class="fw-bold mt-2 mb-2">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $user->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="fw-bold mt-2 mb-2">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan alamat" value="{{ old('alamat') ? old('alamat') : $user->alamat }}">
                                @error('alamat')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="{{route('user.index')}}" class="btn btn-warning text-dark me-3 mt-3">Kembali</a>
                                <button type="submit" class="btn btn-light btn-dark mt-3 ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>