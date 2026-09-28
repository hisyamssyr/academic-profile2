# Academic Profile & Agentic AI Showcase

Website multi-view profil akademik mahasiswa sekaligus showcase konsep **final project Agentic AI**
(*Quality Assurance, Security Testing, and Automated Repair System*).

Dibangun sebagai tugas Pemrograman Berorientasi Objek / Pemrograman Basis Data Killer (PBKK) dengan
fokusply pada penerapan **Blade Layout Inheritance**, **Blade Components**, **Vite asset bundling**,
dan **dynamic route/query parameter** — **tanpa database, tanpa model, tanpa autentikasi.**

| | |
| --- | --- |
| **Nama** | Hisyam Syafa Raditya |
| **NRP** | 5025241130 |
| **Program Studi** | S1 Teknik Informatika — Institut Teknologi Sepuluh Nopember (ITS) |
| **Angkatan** | 2024 (Masuk Agustus 2024 · expected lulus Agustus 2028) |
| **Minat** | Data Analysis & Machine Learning |

---

## Daftar Isi

- [Tech Stack](#tech-stack)
- [Cara Menjalankan](#cara-menjalankan)
- [Routing](#routing)
- [Arsitektur](#arsitektur)
- [Blade Components](#blade-components)
- [Dynamic Challenge](#dynamic-challenge)
- [Struktur Project](#struktur-project)
- [Pengujian](#pengujian)
- [Pemetaan Rubric](#pemetaan-rubric)
- [Out of Scope](#out-of-scope)

---

## Tech Stack

### Backend

| Teknologi | Versi | Peran |
| --- | --- | --- |
| PHP | `^8.3` (dijalankan di 8.5) | Bahasa runtime |
| Laravel Framework | `^13.17` | Framework backend, routing, Blade |
| Illuminate Validation | — | Validasi form ide (tanpa DB) |
| Illuminate Log | — | Menerima log ide yang dikirim user |

### Frontend & Asset

| Teknologi | Versi | Peran |
| --- | --- | --- |
| Tailwind CSS | `^4.0` (v4.3) | CSS framework, install via NPM |
| `@tailwindcss/vite` | `^4.0` | Plugin Tailwind untuk Vite |
| Vite | `^8.0` | Asset bundler |
| `laravel-vite-plugin` | `^3.1` | Integrasi Vite ↔ Laravel + font self-hosting |
| Instrument Sans | 400/500/600 | Font, di-*self-host* (bukan CDN) |

### Tooling

| Tool | Peran |
| --- | --- |
| PHPUnit `^12.5` | Test suite |
| Laravel Pint `^1.27` | Code style |
| Laravel Boost `^2.10` | MCP server untuk AI agent |
| Mockery, Faker, Collision | Dependency test |

> **Nol CDN.** Tidak ada `<link href="https://cdn...">` pun di `resources/views`. Font
> `Instrument Sans` diunduh saat build oleh `bunny()` dari `laravel-vite-plugin/fonts` dan
> disajikan dari `public/build/assets/*.woff2` milik repo sendiri.

---

## Cara Menjalankan

### Prasyarat

- PHP **8.3+** (diuji pada 8.5) dengan ekstensi standar
- Composer 2.x
- Node.js **20+** & NPM 10+

### Instalasi

```bash
git clone <repository-url> academic-profile
cd academic-profile

composer install
cp .env.example .env
php artisan key:generate

npm install
npm run build          # atau `npm run dev` selama pengembangan
```

> **Catatan database.** Skeleton Laravel bawaan sudah menyertakan `.env` dengan
> `SESSION_DRIVER` / `CACHE_STORE` / `QUEUE_CONNECTION` = `database`. Karena tiga migration
> bawaan ikut dipertahankan, nilainya **tidak diubah** — jalankan `php artisan migrate` sekali
> agar session & cache bisa bekerja.-Level kode aplikasi sendiri **tidak pernah menyentuh
> database**: nol model, nol query, nol autentikasi.

### Menjalankan

```bash
php artisan serve
```

Buka <http://localhost:8000>.

### Development (mode watch)

```bash
composer run dev      # menjalankan artisan serve + queue + log + vite dev sekaligus
```

`npm run dev` menyalakan Vite dev server dengan HMR. Jangan jalankan `php artisan serve` dan
`npm run dev` bersamaan lewat `composer run dev` — sudah ditangani script tersebut.

### Verifikasi Cepat

```bash
php artisan route:list          # 4 route aplikasi
php artisan test --compact      # test suite
vendor/bin/pint --dirty        # rapikan formatting
```

---

## Routing

Semua halaman dilayani **satu** `PageController` — tidak ada controller per halaman.

| Method | URI | Route name | Method controller | Halaman |
| --- | --- | --- | --- | --- |
| GET | `/` | `home` | `home()` | Landing page & ringkasan profil |
| GET | `/profil-mahasiswa` | `profil` | `profilMahasiswa()` | Profil akademik lengkap |
| GET | `/ide-agent` | `ide-agent` | `ideAgent()` | Showcase final project Agentic AI |
| GET | `/beranda` | `beranda` | `beranda()` | Challenge dynamic welcome |

Query parameter yang dipahami:

| Parameter | Route | Efek |
| --- | --- | --- |
| `?mode=dark` | keempat route | Mengaktifkan dark mode |
| `?user=<nama>` | `/beranda` | Menyebutkan nama pada pesan selamat datang |
| `?submit=1` | `/ide-agent` | Menandai form ide sebagai disubmit (dipakai controller) |

Semua link internal memakai `route()` sehingga `?mode=dark` otomatis ikut terbawa —
mode gelap bertahan lintas halaman tanpa cookie atau session.

---

## Arsitektur

```
                    resources/views/layouts/app.blade.php
                    <html> · <head> · <body> · navbar · main · footer
                                 │
        ┌────────────────────────┼────────────────────────┐
        │                        │                        │
  home.blade.php      profil-mahasiswa.blade.php    ide-agent.blade.php
        │                        │                        │
        │                        ▼                        ▼
        │                  x-info-card              x-info-card
        │                                                │
        │                                          x-status-banner
        │                                          (success | error | info | warning)
        └─────────────────── shared layout ─────────────┘

  beranda.blade.php  ── x-status-banner (dynamic welcome)
```

### Prinsip yang dipegang

1. **Satu master layout.** `<html>`, `<head>`, `<body>`, navbar, `<main>`, dan footer hanya
   ada di `layouts/app.blade.php`. Empat view anak tidak mengulang struktur HTML itu.
2. **Satu controller.** `PageController` melayani keempat halaman lewat method
   `home()`, `profilMahasiswa()`, `ideAgent()`, `beranda()`.
3. **Layout berbagi data.** Karena `@extends` berbagi data antara view anak dan layout,
   variabel `$darkMode` yang dikirim controller langsung dipakai layout untuk memberi class
   pada elemen `<html>`.
4. **Data di dalam view.** Konten profil dan agent ditulis langsung di Blade. Tidak ada
   config, repository, atau service layer — sesuai prinsip "hindari overengineering".
5. **Server-side sepenuhnya.** Tidak ada hydration, SPA, atau state client-side. Dark mode
   bekerja lewat query string, bukan JavaScript.

### Alur request

```
Request  →  PageController::ideAgent($request)
              ├─ $darkMode = ($request->query('mode') === 'dark')
              ├─ GET tanpa ?submit  →  return view('ide-agent', ['darkMode' => …])
              └─ GET dengan ?submit
                    ├─ validasi gagal  →  redirect ke /ide-agent (+ errors + old input)
                    └─ validasi lolos  →  log ide, redirect + flash "status"
                                          ↓
                                    layouts/app.blade.php
                                    <html class="{{ $darkMode ? 'dark' : '' }}">
                                          ↓
                                    @yield('content')
```

### Dark mode

Menggunakan **class-based variant** Tailwind, bukan override class per-instance:

```css
/* resources/css/app.css */
@custom-variant dark (&:where(.dark, .dark *));
```

Controller mengirim `$darkMode` dari keempat method; layout menerapkannya sebagai class pada
`<html>`. Semua warna gelap ditulis dengan variant `dark:` (`bg-white dark:bg-gray-800`),
sehingga tidak mungkin ada dua class background yang bersaing —ouncing kontras card gelap
berlatar putih yang dulu terjadi.

---

## Blade Components

Dua component reusable, keduanya mendukung **parameter**, **`$slot`**, dan **`$attributes`**.

### `x-info-card`

```blade
<x-info-card title="Program Studi" class="mt-8">
    S1 Teknik Informatika
</x-info-card>
```

| Bagian | Implementasi |
| --- | --- |
| Parameter | `@props(['title' => null])` — title opsional |
| Slot | `{{ $slot }}` |
| Attributes | `$attributes->merge([...])` sehingga class parent bisa ditambahkan/ditimpa |

### `x-status-banner`

```blade
<x-status-banner type="success" class="mb-4">
    Ide berhasil dikirim.
</x-status-banner>
```

Mendukung lima tipe lewat `match`: `success`, `error`, `info`, `warning`, dan `default`.
Margin tidak dipatok di dalam component — pemanggil yang menentukan lewat `class`.

| Tipe | Dipakai di |
| --- | --- |
| `success` | Konfirmasi form ide terkirim |
| `error` | Gagal validasi form ide |
| `info` | Dynamic welcome di `/beranda` |
| `warning` | Otorisasi active scan & constraint auto-merge |

---

## Dynamic Challenge

Dua challenge tanpa view tambahan — semuanya diselesaikan di layer yang sama.

### 1. Dynamic welcome — `/beranda?user=Andi`

```
Request  →  $request->query('user')  →  "Andi"
         →  <x-status-banner type="info">Selamat datang, Andi!</x-status-banner>
```

Tanpa parameter → `Selamat datang!`. Nilai di-escape Blade, sehingga aman dari XSS.

### 2. Dynamic dark mode — `/ide-agent?mode=dark`

```
Request  →  $request->query('mode') === 'dark'  →  true
         →  <html class="dark">
         →  seluruh styling `dark:` aktif
```

Bisa dijalankan di keempat route lewat tombol toggle di navbar, dan bertahan saat berpindah
halaman. Tombolnya berupa `<a>`, bukan JavaScript, sehingga tetap pure server-side.

### Form ide

Form memakai `method="GET"` tanpa database. Alurnya:

- Submit valid → `Log::info()` → redirect (PRG) + flash `status` → banner hijau
- Submit tidak valid → redirect deterministik ke `/ide-agent` + `withErrors()` + `withInput()`
  → banner merah berisi daftar pesan, dan isian form terisi kembali lewat `old()`

`?mode=dark` tetap terjaga di kedua jalur, dan banner sukses tidak bisa dipalsukan lewat URL
karena berasal dari session flash, bukan dari query string.

---

## Struktur Project

```
academic-profile/
├── app/
│   ├── Http/Controllers/
│   │   ├── Controller.php
│   │   └── PageController.php      ← satu-satunya controller aplikasi
│   ├── Models/User.php             ← skeleton Laravel, tidak dipakai kode aplikasi
│   └── Providers/AppServiceProvider.php
├── database/
│   ├── migrations/                 ← skeleton Laravel (users, cache, jobs)
│   ├── factories/UserFactory.php
│   └── seeders/DatabaseSeeder.php
├── resources/
│   ├── css/app.css                 ← Tailwind v4 + custom-variant dark
│   ├── js/app.js
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php       ← MASTER LAYOUT
│       ├── components/
│       │   ├── info-card.blade.php
│       │   └── status-banner.blade.php
│       ├── home.blade.php
│       ├── profil-mahasiswa.blade.php
│       ├── ide-agent.blade.php
│       └── beranda.blade.php
├── routes/web.php                  ← 4 route
├── docs/
│   ├── PRD.md                      ← requirements & rubric
│   └── REVIEW-PDG.md               ← hasil review kode vs PRD
├── vite.config.js
└── composer.json
```

---

## Pengujian

```bash
php artisan test --compact                     # 36 test, 137 assertion
php artisan test --filter=PageRoutesTest       # route, layout, konten profil & agent
php artisan test --filter=DynamicChallengeTest # dark mode & dynamic welcome
php artisan test --filter=IdeaFormTest         # validasi, banner sukses/error, old input
```

Coverage yang dijaga test:

| Test | Yang dijaga |
| --- | --- |
| `PageRoutesTest` | keempat route 200, `<title>` dinamis, `<html>/<body>/<nav>/<main>/<footer>` muncul **tepat sekali** per halaman, aset lewat Vite tanpa CDN, kelengkapan isi profil & tech stack |
| `DynamicChallengeTest` | `?mode=dark` memberi class `dark` di keempat route, `?user=` menyapa dinamis, escaping XSS, link navbar membawa mode |
| `IdeaFormTest` | submit valid → flash sukses + `Log::info`, submit invalid → `withErrors` + pesan Indonesia + `old()` terisi, `?mode=dark` bertahan di kedua jalur, banner sukses tidak bisa dipalsukan |

Manual check yang diwajibkan PRD:

```text
[ ] /                     → 200
[ ] /profil-mahasiswa     → 200
[ ] /ide-agent            → 200
[ ] /ide-agent?mode=dark  → berubah ke gelap
[ ] /beranda              → "Selamat datang!"
[ ] /beranda?user=Andi    → "Selamat datang, Andi!"
[ ] Form ide              → banner sukses / banner error
[ ] Desktop & mobile      → tanpa horizontal overflow
```

---

## Pemetaan Rubric

| Kategori | Bobot | Yang Mewakili |
| --- | --- | --- |
| **A. Pewarisan Layout** | 30% | `@extends('layouts.app')` di keempat view; `<html>/<head>/<body>`, navbar, `<main>`, footer hanya di master layout; `<title>` dinamis per halaman lewat `@yield('title')` |
| **B. Blade Components & Slots** | 25% | `x-info-card` & `x-status-banner` dengan `@props`, `$slot`, `$attributes->merge()`; `x-status-banner` dipakai pada 4 tipe berbeda (`success`, `error`, `info`, `warning`) |
| **C. Vite Asset Bundling** | 25% | `package.json` + Tailwind v4 via NPM; `@vite([...])` & `Vite::fonts()` di master layout; nol CDN; `npm run dev` / `npm run build` berjalan |
| **D. UI & Responsiveness** | 10% | Dark mode di semua halaman, navbar tetap reachable di layar kecil (`overflow-x-auto` + `whitespace-nowrap`), grid responsif, form dengan pasangan `label for`/`id` |
| **E. Dynamic Challenge** | 10% | `?mode=dark` via query parameter + Blade conditional + dynamic class; `?user=` via query parameter + `x-status-banner`; tanpa view tambahan per nilai |

---

## Out of Scope

Sesuai PRD §39, project ini **sengaja tidak**implementasikan:

- Database access di kode aplikasi (model, query, CRUD)
- Authentication, login/register, admin dashboard
- Real Agentic AI implementation — Playwright, OWASP ZAP, GitHub API, llama.cpp, dan
  pembuatan Pull Request hanya **dijelaskan sebagai konsep**, bukan diimplementasikan
- API backend & deployment infrastructure

Isi bagian Agentic AI di `/ide-agent` adalah **presentasi konsep final project**, bukan sistem
berjalan.

---

## Lisensi

MIT — repository tugas pribadi.
