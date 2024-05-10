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
            <div class="text-center">
                <h3 class="fw-bold mt-5">List Product</h3>
            </div>
            <span style="width: 100px;"></span>
            <div class="mt-5">
                <a href="{{route('admin.show', $user->id)}}" class="btn btn-primary text-white">Lihat Profil</a>
                <a href="{{route('admin.create', $user->id)}}" class="btn btn-dark text-white">Tambah Produk</a>
                <a href="{{route('products.index')}}" class="btn btn-secondary text-white">Kembali ke Produk</a>
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
                @foreach($user->products as $product)
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