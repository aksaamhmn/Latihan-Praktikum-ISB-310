<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manajemen Sepatu</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand fw-bold" href="#">Apaweh Shoes</a>
            <div>
                <button
                    class="btn btn-outline-warning btn-sm me-2"
                    data-bs-toggle="modal"
                    data-bs-target="#wishlistModal"
                    onclick="tampilkanWishlist()">
                    Wishlist (<span id="wishlist-count">0</span>)
                </button>
                <button id="btn-theme" class="btn btn-outline-light btn-sm">
                    Mode Gelap
                </button>

                @if(session()->has('login'))
                <span class="text-white me-2">Halo, {{ session('username') }}!</span>
                <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-warning btn-sm">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="wishlistModalLabel">Daftar Wishlist Saya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="daftar-wishlist"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" onclick="hapusWishlist()">Hapus Wishlist</button>
                </div>
            </div>
        </div>
    </div>

    <div class="position-relative mb-5" style="height: 50vh">
        <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUGkD5bZV7wnbxw-J9y19pdNZYiGgx589XUA&s"
            class="w-100 h-100 object-fit-cover"
            alt="" />
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-3">
            <h1 class="fw-bold display-5">Sistem Manajemen Sepatu</h1>
            <p class="lead mb-0">Kelola sepatumu enjooyyy!!!</p>
        </div>
    </div>

    <main class="container mb-5 flex-grow-1">
        <div class="row g-3 mb-5">
            <div class="col-12 col-md-4">
                <div class="card bg-primary text-white shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Produk</h5>
                        <h2 class="fw-bold mb-0">2</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card bg-success text-white shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Stok Tersedia</h5>
                        <h2 class="fw-bold mb-0">39</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card bg-warning text-white shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori</h5>
                        <h2 class="fw-bold mb-0">2</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Daftar Sepatu</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
                Tambah Produk
            </button>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row g-4" id="container-barang">
            @foreach ($products as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <img
                        src="https://via.placeholder.com/400x200?text=Sepatu+Keren"
                        class="card-img-top"
                        alt="Foto Sepatu"
                        style="height: 200px; object-fit: cover" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mt-2">{{ $item->product_name }}</h5>
                        <p class="mb-2">
                            <span class="badge bg-secondary">{{ $item->category->category_name }}</span>
                        </p>
                        <p class="card-text mb-2 stok-text">
                            Stok: <strong class="stok-angka">{{ $item->product_stock }}</strong> Pasang
                        </p>
                        <h5 class="text-danger mb-3">Rp {{ number_format($item->product_price, 0, ',', '.') }}</h5>
                        <div class="d-flex justify-content-between mt-auto">
                            <button class="btn btn-primary w-50 me-2 btn-detail">Beli</button>
                            <button class="btn btn-outline-danger w-50 btn-wishlist">Wishlist</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <div class="modal fade" id="tambahProdukModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahProdukModalLabel">Tambah Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->category_id }}">
                                    {{ $cat->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_stock" class="form-label">Stok Produk</label>
                            <input type="number" class="form-control" id="product_stock" name="product_stock" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">apaweh atu</p>
        </div>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>