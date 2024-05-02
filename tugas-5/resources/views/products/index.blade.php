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
    <div class="container mt-4 mb-4 bg-info  d-flex flex-column align-items-center rounded-3">
        <div class="d-flex justify-content-between w-100 align-items-center">
            <div class="mt-5">
                <a href="{{ route('admin.index') }}" class="btn btn-primary text-white">Ke Halaman Admin</a>
            </div>
            <div class="text-center">
                <h3 class="fw-bold mt-5">PRODUCTS</h3>
                <span class="border border-dark row mx-auto border-2" style="width: 50px;"></span>
            </div>
            <span style="width: 100px;"></span>
        </div>
        <div class="d-flex flex-wrap justify-content-center mt-5">
            @foreach($products as $product)
            <div class="mb-4 d-flex justify-content-between">
                <div class="card d-flex me-3" style="width: 18rem;">
                    <img src="{{ $product->gambar }}" class="card-img-top" alt="gambar">
                    <div class="card-body d-flex justify-content-between row flex-column">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-title fw-bold">{{ $product->nama }}</h5>
                            <p class="bg-{{ $product->kondisi == 'Baru' ? 'success' : 'warning' }} p-1 rounded">{{ $product->kondisi }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <p class="bg-success p-1 rounded text-white">{{ $product->stok }}</p>
                            <p class="bg-info p-1 rounded">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <p class="bg-secondary p-1 rounded text-white">{{ $product->berat }} gr</p>
                        </div>
                        <p class="card-text" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; /* number of lines to show */ line-clamp: 2;-webkit-box-orient: vertical;">{{ $product->deskripsi }}</p>
                        <a href="#" class="btn btn-primary mt-auto align-self-end">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>