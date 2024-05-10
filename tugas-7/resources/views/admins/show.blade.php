<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Products</title>
</head>

<body>
    <div class="container mt-4 mb-4 d-flex flex-column align-items-center rounded-3">
        <a href="{{route('admin.index', $user->id)}}" class="btn btn-success text-white">Kembali ke Halaman Admin</a>
        <div class="d-flex justify-content-between mt-5 w-75">
            <div class="border border-dark border-2 rounded-2 p-3 justify-content-between w-50" style="margin-right: 10px;">
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Nama Akun</p>
                    <p style="margin-left: 12px;">{{$user->nama}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Email</p>
                    <p style="margin-left: 59px;">{{$user->email}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Gender</p>
                    <p style="margin-left: 47px;">{{$user->gender}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Umur</p>
                    <p style="margin-left: 60px;">{{$user->umur}} Tahun</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Tanggal Lahir</p>
                    <p>{{$user->tanggal_lahir}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Alamat</p>
                    <p style="margin-left: 50px;">{{$user->alamat}}</p>
                </div>
            </div>
            <div class="border border-dark border-2 rounded-2 p-3 justify-content-between w-50">
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Nama Toko</p>
                    <p style="margin-left: 20px;">{{$user->users_detail->nama}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Rate</p>
                    <p style="margin-left: 70px;">{{$user->users_detail->rate}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold">Produk Terbaik</p>
                    <p style="margin-left: 40px;">{{$user->users_detail->produk_terbaik}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="fw-bold me-5">Deskripsi</p>
                    <p style="margin-left: 38px;">{{$user->users_detail->deskripsi}}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>