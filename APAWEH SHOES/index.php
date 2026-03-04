<?php
session_start();

if (!isset($_SESSION['login']) && isset($_COOKIE['user_login'])) {
  $_SESSION['login'] = true;
  $_SESSION['username'] = $_COOKIE['user_login'];
}

$is_login = isset($_SESSION['login']);
?>

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
  <link rel="stylesheet" href="css/style.css" />
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
        <?php if ($is_login): ?>
          <span class="text-white me-2">Halo, <?= $_SESSION['username']; ?>!</span>
          <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        <?php else: ?>
          <a href="login.php" class="btn btn-warning btn-sm">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div
    class="modal fade"
    id="wishlistModal"
    tabindex="-1"
    aria-labelledby="wishlistModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="wishlistModalLabel">
            Daftar Wishlist Saya
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group" id="daftar-wishlist"></ul>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal">
            Tutup
          </button>
          <button
            type="button"
            class="btn btn-danger"
            onclick="hapusWishlist()">
            Hapus Wishlist
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="position-relative mb-5" style="height: 50vh">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUGkD5bZV7wnbxw-J9y19pdNZYiGgx589XUA&s"
      class="w-100 h-100 object-fit-cover"
      alt="" />
    <div
      class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
    <div
      class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-3">
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
      <h2 class="mb-0">Daftar Sepatu</h2>
    </div>

    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img
            src="data:image/jpeg;base64,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"
            class="card-img-top"
            alt="Sepatu Kulit"
            style="height: 200px; object-fit: cover" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold">Sepatu Kulit Pria Pantofel</h5>
            <p class="card-text text-muted mb-1">Kategori: Formal</p>
            <p class="card-text mb-2 stok-text">
              Stok: <strong class="stok-angka">0</strong> Pasang
            </p>
            <h5 class="text-danger mb-3">Rp 350.000</h5>
            <div class="d-flex justify-content-between mt-auto">
              <button class="btn btn-primary w-50 me-2 tombol-beli">
                Beli
              </button>
              <button class="btn btn-outline-danger w-50 tombol-wishlist">
                Wishlist
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img
            src="data:image/jpeg;base64,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"
            class="card-img-top"
            alt="Sepatu Sneakers"
            style="height: 200px; object-fit: cover" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold">Sneakers Kasual Putih</h5>
            <p class="card-text text-muted mb-1">Kategori: Kasual</p>
            <p class="card-text mb-2 stok-text">
              Stok: <strong class="stok-angka">15</strong> Pasang
            </p>
            <h5 class="text-success mb-3">Rp 200.000</h5>
            <div class="d-flex justify-content-between mt-auto">
              <button class="btn btn-primary w-50 me-2 tombol-beli">
                Beli
              </button>
              <button class="btn btn-outline-danger w-50 tombol-wishlist">
                Wishlist
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img
            src="data:image/jpeg;base64,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"
            class="card-img-top"
            alt="Nike Air Jordan"
            style="height: 200px; object-fit: cover" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold">Nike Air Jordan</h5>
            <p class="card-text text-muted mb-1">Kategori: Sporty</p>
            <p class="card-text mb-2 stok-text">
              Stok: <strong class="stok-angka">3</strong> Pasang
            </p>
            <h5 class="text-warning mb-3">Rp 270.000</h5>
            <div class="d-flex justify-content-between mt-auto">
              <button class="btn btn-primary w-50 me-2 tombol-beli">
                Beli
              </button>
              <button class="btn btn-outline-danger w-50 tombol-wishlist">
                Wishlist
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-dark text-white text-center py-4">
    <div class="container">
      <p class="mb-0">apaweh atu</p>
    </div>
  </footer>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

  <script src="js/script.js"></script>
</body>

</html>