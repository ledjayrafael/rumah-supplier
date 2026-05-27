# Rumah Supplier

Marketplace supplier ↔ UMKM berbasis Laravel 12 untuk mempertemukan pembeli dan penyedia barang lewat alur bidding.

## Fitur inti

- Pelaku bisnis mempublikasikan kebutuhan barang beserta jumlah, lokasi kirim, dan tanggal kebutuhan.
- Supplier dapat mengirim penawaran dengan harga, kualitas, jumlah tersedia, lead time, dan status verifikasi.
- Dashboard mobile-first menampilkan kebutuhan aktif, jumlah penawaran, dan bid terendah.
- Query daftar kebutuhan sudah dioptimalkan dengan eager loading, agregasi bid terendah, cache, dan index database.

## Stack

- Laravel 12 + Blade
- Eloquent ORM
- MySQL-ready schema
- Cache facade (bisa diarahkan ke Redis bila tersedia)

## Menjalankan proyek

```bash
composer install
cp .env.example .env
php artisan key:generate
mkdir -p database && touch database/database.sqlite
php artisan migrate
npm install
npm run build
php artisan serve
```

## Menjalankan test

```bash
php artisan test
```
