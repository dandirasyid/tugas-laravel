<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Tambah Product</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(Session::has('error'))
                <p class="bg-danger rounded text-white p-2 fw-bold">{{Session::get('error')}}</p>
                @endif
                <div class="card bg-info">
                    <div class="card-body">
                        <form action="{{route('admin.update', ['id' => $product->id])}}" method="POST">
                            @method('PUT')
                            @csrf()
                            <h4 class="text-center fw-bold">Edit Data Produk {{ $product->id }}</h4>
                            <div class="form-group">
                                <label for="gambar" class="fw-bold mt-2 mb-2">Gambar Produk</label>
                                <input type="url" class="form-control" id="gambar" name="gambar" aria-describedby="gambar" placeholder="Masukan gambar produk" value="{{$product->gambar}}">
                            </div>
                            <div class="form-group">
                                <label for="nama" class="fw-bold mt-2 mb-2">Nama Produk</label>
                                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan nama produk" value="{{$product->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="berat" class="fw-bold mt-2 mb-2">Berat</label>
                                <input type="number" name="berat" class="form-control" id="berat" placeholder="Masukan berat produk" value="{{$product->berat}}">
                            </div>
                            <div class="form-group">
                                <label for="harga" class="fw-bold mt-2 mb-2">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukan harga produk" value="{{$product->harga}}">
                            </div>
                            <div class="form-group">
                                <label for="stok" class="fw-bold mt-2 mb-2">Stok</label>
                                <input type="number" name="stok" class="form-control" id="stok" placeholder="Masukan stok produk" value="{{$product->stok}}">
                            </div>
                            <div class="form-group">
                                <label for="kondisi" class="fw-bold mt-2 mb-2">Kondisi</label>
                                <select class="form-control" id="kondisi" name="kondisi">
                                    <option value="0" {{ $product->kondisi == '0' ? 'selected' : '' }}>Pilih Kondisi Barang</option>
                                    <option value="Baru" {{ $product->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="Bekas" {{ $product->kondisi == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="fw-bold mt-2 mb-2">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Tuliskan deskripsi produk yang akan dijual">{{$product->deskripsi}}</textarea>
                            </div>
                            <div class="d-flex justify-content-center">
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