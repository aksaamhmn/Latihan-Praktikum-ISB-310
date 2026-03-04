// 1. FITUR DARK MODE
const btnTheme = document.getElementById("btn-theme");
const body = document.body;

if (localStorage.getItem("theme") === "dark") {
  body.classList.add("dark-mode");
  btnTheme.textContent = "Mode Terang";
}

btnTheme.addEventListener("click", function () {
  body.classList.toggle("dark-mode");

  if (body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark");
    btnTheme.textContent = "Mode Terang";
  } else {
    localStorage.setItem("theme", "light");
    btnTheme.textContent = "Mode Gelap";
  }
});

// 2. FITUR BELI DAN KURANGI STOK (TERSAPAN OTOMATIS)
let dataStok = JSON.parse(localStorage.getItem("dataStokSepatu")) || {};

function aturFiturBeli() {
  const tombolBeli = document.querySelectorAll(".tombol-beli");

  tombolBeli.forEach(function (tombol) {
    const cardBody = tombol.closest(".card-body");
    const stokElement = cardBody.querySelector(".stok-angka");
    const namaBarang = cardBody.querySelector(".card-title").textContent.trim();

    // --- 1. SAAT HALAMAN DIMUAT ---
    if (dataStok.hasOwnProperty(namaBarang)) {
      stokElement.textContent = dataStok[namaBarang];
    } else {
      dataStok[namaBarang] = parseInt(stokElement.textContent);
      localStorage.setItem("dataStokSepatu", JSON.stringify(dataStok));
    }

    if (dataStok[namaBarang] === 0) {
      tombol.disabled = true;
      tombol.textContent = "Habis";
    }

    // --- 2. SAAT TOMBOL BELI DIKLIK ---
    tombol.addEventListener("click", function (e) {
      if (dataStok[namaBarang] > 0) {
        dataStok[namaBarang]--;
        stokElement.textContent = dataStok[namaBarang];

        localStorage.setItem("dataStokSepatu", JSON.stringify(dataStok));

        alert("Berhasil membeli " + namaBarang);

        if (dataStok[namaBarang] === 0) {
          e.target.disabled = true;
          e.target.textContent = "Habis";
        }
      } else {
        alert("Maaf, stok barang habis!");
      }
    });
  });
}

aturFiturBeli();

// 3. FITUR WISHLIST
let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

function updateWishlistCount() {
  const countElement = document.getElementById("wishlist-count");
  countElement.textContent = wishlist.length;
}

function tambahKeWishlist(namaBarang) {
  if (!wishlist.includes(namaBarang)) {
    wishlist.push(namaBarang);
    localStorage.setItem("wishlist", JSON.stringify(wishlist));
    updateWishlistCount();
    alert(namaBarang + " ditambahkan ke wishlist!");
  } else {
    alert(namaBarang + " sudah ada di wishlist!");
  }
}

function tampilkanWishlist() {
  const daftarWishlist = document.getElementById("daftar-wishlist");
  daftarWishlist.innerHTML = "";

  if (wishlist.length === 0) {
    daftarWishlist.innerHTML =
      '<li class="list-group-item">Wishlist kosong</li>';
  } else {
    wishlist.forEach(function (item) {
      const li = document.createElement("li");
      li.className = "list-group-item";
      li.textContent = item;
      daftarWishlist.appendChild(li);
    });
  }
}

function hapusWishlist() {
  wishlist = [];
  localStorage.removeItem("wishlist");
  updateWishlistCount();
  tampilkanWishlist();
}

function aktifkanTombolWishlist() {
  const tombolWishlist = document.querySelectorAll(".tombol-wishlist");

  tombolWishlist.forEach(function (tombol) {
    tombol.addEventListener("click", function (e) {
      const cardBody = e.target.closest(".card-body");
      const namaBarang = cardBody.querySelector(".card-title").textContent;
      tambahKeWishlist(namaBarang);
    });
  });
}

aktifkanTombolWishlist();
updateWishlistCount();
