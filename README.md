## <p align="center" style="margin-top: 0;">Sistem Informasih Manajemen Warung Makan
“SIMA WARMAK”
</p>

<p align="center">
  <(https://github.com/Immayaa/Final_FWB/blob/main/Logo-Universitas-Sulawesi-Barat.webp)>
</p>

### <p align="center">LISMAWATI</p>

### <p align="center">D0222037</p></br>

### <p align="center">FRAMEWORK WEB BASED</p>

### <p align="center">2025</p>
---

## 🧑‍🤝‍🧑 Role dan Hak Akses

| Role              | Fitur-Fitur                                                                      |
|-------------------|-----------------------------------------------------------------------------------|
| Admin (Pemilik)   | Kelola pengguna & peran, menu, stok, harga, dan verifikasi transaksi             |
| Pembeli (Pegawai) | Layani pesanan, konfirmasi/tolak, atur status pesanan, serahkan ke kurir/pembeli |
| Pembeli (Pelanggan)| Lihat menu, tambah ke keranjang, checkout & upload bukti, lacak & riwayat       |

---

## 🗃️ Struktur Database

### 1. Tabel `users`

| Field      | Tipe Data      | Keterangan                |
|------------|----------------|---------------------------|
| id         | bigint (PK)    | Primary key               |
| name       | varchar(100)   | Nama pengguna             |
| email      | varchar(100)   | Harus unik                |
| password   | varchar(255)   | Enkripsi                  |
| role       | enum           | 'admin', 'penjual', 'pembeli' |
| created_at | timestamp      | Waktu dibuat              |
| updated_at | timestamp      | Waktu update terakhir     |

### 2. Tabel `products`

| Field       | Tipe Data      | Keterangan               |
|-------------|----------------|--------------------------|
| id          | bigint (PK)    | Primary key              |
| seller_id   | bigint (FK)    | Relasi ke users          |
| name        | varchar(100)   | Nama produk              |
| description | text           | Deskripsi produk         |
| price       | decimal(10,2)  | Harga produk             |
| stock       | int            | Jumlah stok              |
| status      | enum           | 'aktif', 'tidak_aktif'   |
| created_at  | timestamp      | Waktu dibuat             |
| updated_at  | timestamp      | Waktu update terakhir    |

### 3. Tabel `orders`

| Field       | Tipe Data      | Keterangan                          |
|-------------|----------------|-----------------------------------|
| id          | bigint (PK)    | Primary key                       |
| buyer_id    | bigint (FK)    | Relasi ke users                   |
| order_date  | date           | Tanggal pesanan                  |
| status      | enum           | 'pending', 'confirmed', 'shipped', 'delivered', 'cancelled' |
| created_at  | timestamp      | Waktu dibuat                     |
| updated_at  | timestamp      | Waktu update terakhir            |

### 4. Tabel `order_details`

| Field       | Tipe Data      | Keterangan                   |
|-------------|----------------|------------------------------|
| id          | bigint (PK)    | Primary key                  |
| order_id    | bigint (FK)    | Relasi ke orders             |
| product_id  | bigint (FK)    | Relasi ke products           |
| quantity    | int            | Jumlah                      |
| subtotal    | decimal(10,2)  | Harga x jumlah               |

### 5. Tabel `payments`

| Field          | Tipe Data      | Keterangan                           |
|----------------|----------------|------------------------------------|
| id             | bigint (PK)    | Primary key                        |
| order_id       | bigint (FK)    | Relasi ke orders                   |
| payment_proof  | varchar(255)   | Path bukti transfer                |
| amount         | decimal(10,2)  | Jumlah bayar                      |
| status         | enum           | 'belum diverifikasi', 'valid', 'invalid' |
| created_at     | timestamp      | Waktu upload                      |

---

## 🔗 Relasi Antar Tabel

| Tabel A  | Tabel B       | Relasi        | Keterangan                        |
|----------|---------------|---------------|---------------------------------|
| users    | products      | One-to-Many   | Satu penjual punya banyak produk|
| users    | orders        | One-to-Many   | Satu pembeli bisa buat banyak pesanan |
| orders   | order_details | One-to-Many   | Satu pesanan terdiri dari banyak item  |
| products | order_details | One-to-Many   | Satu produk bisa dibeli di banyak pesanan |
| orders   | payments      | One-to-One    | Satu pesanan satu bukti pembayaran |

```
