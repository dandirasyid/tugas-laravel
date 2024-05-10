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
                <div class="card bg-info">
                    <div class="card-body">
                        <form action="{{route('admin.update', ['user_id'=>$product['user_id'], 'id'=>$product['id']])}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf()
                            <h4 class="text-center fw-bold">Edit Data Produk {{ $product->id }}</h4>
                            <div class="form-group">
                                <label for="gambar" class="fw-bold mt-2 mb-2">Gambar Produk</label>
                                <input type="file" class="form-control  @error('gambar') is-invalid @enderror" id="gambar" name="gambar" aria-describedby="gambar" placeholder="Masukan gambar produk" value="{{$product->gambar}}">
                                @error('gambar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama" class="fw-bold mt-2 mb-2">Nama Produk</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan nama produk" value="{{$product->nama}}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="berat" class="fw-bold mt-2 mb-2">Berat</label>
                                <input type="number" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Masukan berat produk" value="{{$product->berat}}">
                                @error('berat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga" class="fw-bold mt-2 mb-2">Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukan harga produk" value="{{$product->harga}}">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stok" class="fw-bold mt-2 mb-2">Stok</label>
                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukan stok produk" value="{{$product->stok}}">
                                @error('stok')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kondisi" class="fw-bold mt-2 mb-2">Kondisi</label>
                                <select class="form-control @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi">
                                    <option value="0" {{ old('kondisi', $product->kondisi) == '0' ? 'selected' : '' }}>Pilih Kondisi Barang</option>
                                    <option value="Baru" {{ old('kondisi', $product->kondisi) == 'Baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="Bekas" {{ old('kondisi', $product->kondisi) == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                                </select>
                                @error('kondisi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="fw-bold mt-2 mb-2">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3" placeholder="Tuliskan deskripsi produk yang akan dijual">{{$product->deskripsi}}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('admin.index', ['user_id'=>$product['user_id'], 'id'=>$product['id']])}}" class="btn btn-warning text-dark me-3 mt-3">Kembali</a>
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