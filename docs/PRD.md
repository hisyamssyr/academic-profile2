# PRD — Multi-View Profil Akademik & Ide Agent

## 1. Informasi Project

**Nama Project:** Academic Profile & Agentic AI Showcase

**Framework:** Laravel

**Frontend:** Blade + Tailwind CSS/Bootstrap

**Asset Bundler:** Vite + NPM

**Tujuan:**
Membangun website multi-view sederhana yang menampilkan profil akademik mahasiswa dan konsep final project Agentic AI, sekaligus menerapkan konsep Laravel Blade Layout, Blade Components, Vite, serta dynamic route parameter sesuai requirement tugas.

Website tidak menggunakan database karena fokus tugas adalah penerapan Blade, layout inheritance, components, Vite, dan dynamic rendering.

---

# 2. Tujuan Website

Website berfungsi sebagai personal academic profile yang menampilkan:

1. Profil akademik mahasiswa.
2. Bio singkat dan minat.
3. Pengalaman organisasi dan akademik.
4. Skills.
5. Konsep final project Agentic AI.
6. Arsitektur dan penjelasan tiga agent utama.
7. Tech stack final project.
8. Challenge dynamic mode dan dynamic welcome message.

Website harus memiliki struktur Laravel yang rapi dan menghindari pengulangan HTML antar halaman.

---

# 3. Struktur Halaman

Website memiliki minimal tiga halaman utama:

| Route               | Halaman          | Isi                                         |
| ------------------- | ---------------- | ------------------------------------------- |
| `/`                 | Home             | Landing page dan ringkasan profil           |
| `/profil-mahasiswa` | Profil Mahasiswa | Informasi akademik, bio, pengalaman, skills |
| `/ide-agent`        | Ide Agent        | Detail final project Agentic AI             |

Tambahkan route:

| Route                  | Fungsi                      |
| ---------------------- | --------------------------- |
| `/beranda?user=Andi`   | Challenge dynamic welcome   |
| `/ide-agent?mode=dark` | Challenge dynamic dark mode |

Seluruh halaman utama harus menggunakan **satu `PageController`**.

---

# 4. Data Profil Mahasiswa

Gunakan data berikut sebagai konten website.

## Identitas

**Nama:** Hisyam Syafa Raditya

**NRP:** 5025241130

**Program Studi:** S1 Teknik Informatika

**Institusi:** Institut Teknologi Sepuluh Nopember (ITS)

**Angkatan:** 2024

**Periode:** Masuk Agustus 2024, expected lulus Agustus 2028

**IPK:** 3.51 / 4.00

**Minat:** Data Analysis & Machine Learning

**Email:** [hisyamsyafa2@gmail.com](mailto:hisyamsyafa2@gmail.com)

**WhatsApp:** +62 852 2776 3718

**Instagram:** https://instagram.com/hisyamssyr

**LinkedIn:** https://linkedin.com/in/hisyam-syafa-raditya

**GitHub:** https://github.com/hisyamssyr

---

# 5. Bio

Gunakan bio berikut:

> Mahasiswa Teknik Informatika ITS dengan ketertarikan kuat pada analisis data dan machine learning. Memiliki fondasi matematika dan pemrograman yang solid, dengan kemampuan yang terus berkembang di pemrosesan data, analisis statistik, dan konsep machine learning.

---

# 6. Pengalaman

Tampilkan pengalaman dari yang terbaru ke yang lama.

## 6.1 Himpunan Mahasiswa Teknik Computer-Informatika ITS

**Position:** External Affairs Staff

**Period:** Mar 2026 – Present

**Responsibilities:**

* PIC proker SiapinKarirmu! 1.0
* Liaison Officer kegiatan company visit ke Oracle dan Telkomsel
* PIC benchmark internal

---

## 6.2 Ramadan di Kampus 1447H

**Position:** Head of Food & Nutrition

**Period:** Aug 2025 – Mar 2026

**Responsibilities:**

* Memimpin Divisi Nutrisi dengan 25+ staf, mengoordinasikan kolaborasi lintas divisi.
* Merancang sistem distribusi makanan untuk 700+ peserta per hari.
* Berkoordinasi dengan 15+ vendor untuk pengadaan, harga, dan MoU.
* Menyusun SOP food testing, pemilihan vendor, dan alur distribusi.

---

## 6.3 Institut Teknologi Sepuluh Nopember

**Position:** Teaching Assistant Database Systems

**Period:** Aug 2025 – Dec 2025

**Responsibilities:**

* Membimbing 13 mahasiswa dalam praktikum konsep basis data.
* Mengajar materi CDM, PDM, DDL, DML, dan SQL Query.
* Mengevaluasi tugas dan kuis selama 7 pertemuan.
* Mengembangkan studi kasus query SQL untuk memperkuat pemahaman praktikal.

---

## 6.4 Schematics 2025

**Position:** Vice Head II of Data Management

**Period:** Apr 2025 – Dec 2025

**Responsibilities:**

* Merancang formulir pendaftaran fisik untuk NLC, NPC, dan BST.
* Mengelola seluruh data pendaftaran peserta, baik form fisik maupun online.
* Membuat dan mengelola formulir kehadiran seluruh sesi acara.
* Membuat formulir feedback untuk evaluasi kepuasan peserta.

---

## 6.5 ITS Robocon

**Position:** Programming Division Internship

**Period:** Sep 2024 – Oct 2024

**Responsibilities:**

* Mempelajari sistem mikrokontroler dan aplikasinya di robotika.
* Mengembangkan program kontrol robot menggunakan C++ dan Python.
* Mengimplementasikan ROS (Robot Operating System) untuk navigasi dan kontrol robot.

---

# 7. Skills

Kelompokkan skills berdasarkan kategori.

## Programming

* C
* C++
* Python
* Go

## Web Development

* React
* Vue
* Next.js
* Node.js
* Laravel

## Database

* SQL
* SQLite
* NoSQL

## Data & Machine Learning

* Pandas
* NumPy
* Scikit-learn
* TensorFlow
* Keras
* Matplotlib

## Soft Skills

* Problem Solving
* Team Collaboration
* Communication
* Time Management
* Adaptability
* Attention to Detail

---

# 8. Ide Final Project

## Nama

**Agentic AI-Based Web Application — Quality Assurance, Security Testing, and Automated Repair System**

## Tagline

> Autonomous agent that tests, diagnoses, and repairs deployed web applications — then proves the fix with a verified pull request.

---

# 9. Tech Stack Final Project

Tampilkan stack dalam bentuk card/badge/list yang mudah dibaca.

| Teknologi                      | Fungsi                         |
| ------------------------------ | ------------------------------ |
| Laravel + Livewire             | Orchestration                  |
| Qwen3 1.7B via llama.cpp       | Reasoning engine, CPU-only     |
| Playwright + Headless Chromium | Browser automation             |
| OWASP ZAP                      | Security scanning              |
| GitHub App + GitHub Actions    | Repository integration, CI, PR |
| PostgreSQL + Queue             | Data & job orchestration       |

---

# 10. Latar Belakang Final Project

Gunakan informasi berikut sebagai penjelasan utama:

> Pengujian web modern menghadapi dua masalah sekaligus: DOM yang berantakan, seperti div custom, canvas UI, dan elemen tanpa label semantik, membuat automation tools biasa gagal. Di sisi lain, business-logic vulnerability seperti broken access control sering lolos dari scanner otomatis.
>
> Sistem ini menggabungkan agent browser dengan strategi fallback berlapis, security scanning berbasis reasoning AI, dan kemampuan menelusuri root cause langsung ke source code di GitHub. Sistem kemudian mengusulkan perbaikan yang sudah diverifikasi melalui automated testing, bukan sekadar menghasilkan laporan bug.

Tampilkan bagian ini sebagai **Project Overview / Background**.

---

# 11. Agent Architecture

Buat visualisasi sederhana mengenai alur tiga agent.

```text
                    Web Application
                           │
                           ▼
                  ┌─────────────────┐
                  │  qa-explorer    │
                  │ Functional QA   │
                  │ Accessibility   │
                  └────────┬────────┘
                           │
                           ▼
                  ┌─────────────────┐
                  │ security-scanner│
                  │ Security Testing│
                  └────────┬────────┘
                           │
                           ▼
                  ┌─────────────────┐
                  │ repair-engineer │
                  │ Auto Repair     │
                  └────────┬────────┘
                           │
                           ▼
                  Verified Pull Request
```

Visualisasi tidak perlu terlalu kompleks. Yang penting hubungan antar-agent mudah dipahami.

---

# 12. Agent 1 — qa-explorer

## Nama

`qa-explorer`

## Role

Functional & Accessibility QA Agent

## Fungsi

Agent menjelajahi aplikasi web menggunakan strategi **6-level fallback**:

1. Semantic accessibility tree
2. DOM heuristics
3. Computed geometry/proximity
4. Keyboard navigation
5. Coordinate interaction
6. Optional visual interpretation

Strategi ini memungkinkan agent tetap menguji form dan interaksi meskipun markup HTML aplikasi tidak rapi.

## Output

Agent menghasilkan daftar:

* Functional findings
* Accessibility findings
* Error/broken flow
* Unlabelled elements
* Elements yang tidak keyboard-reachable

Setiap finding dilengkapi bukti seperti:

* DOM snapshot
* Network log
* Screenshot

---

# 13. Agent 2 — security-scanner

## Nama

`security-scanner`

## Role

Security Testing Agent

## Fungsi

Agent menjalankan passive security scanning melalui proxy OWASP ZAP untuk mendeteksi:

* Header tidak aman
* Cookie tidak aman
* Security-related traffic findings

Agent juga menggunakan beberapa akun uji dengan role berbeda untuk menguji:

* Broken access control
* IDOR/BOLA
* Business-logic vulnerability

Pengujian active scan hanya boleh dijalankan apabila pengguna secara eksplisit memberikan otorisasi.

## Output

Agent menghasilkan laporan security findings yang berisi:

* Finding
* Severity
* Evidence
* Request/response evidence
* Recommendation

---

# 14. Agent 3 — repair-engineer

## Nama

`repair-engineer`

## Role

Auto-Repair Agent

## Fungsi

Agent menelusuri root cause bug langsung ke source code repository GitHub.

Pencarian dilakukan secara deterministik:

```text
Stack Trace
    ↓
File
    ↓
Caller
    ↓
Related Test
```

Setelah menemukan root cause, agent:

1. Menghasilkan patch.
2. Membuat regression test.
3. Menjalankan validasi di ephemeral environment.
4. Membuat branch perbaikan.
5. Menunggu proses CI.
6. Menghasilkan Draft Pull Request.

## Constraint

Agent **tidak pernah melakukan auto-merge ke `main`**.

Perubahan tetap menunggu human review.

## Output

* Repair branch
* Regression test
* CI result
* Draft Pull Request

---

# 15. Halaman `/`

## Tujuan

Menjadi landing page website.

## Konten

Tampilkan:

* Greeting
* Nama mahasiswa
* Program studi
* Institusi
* Minat utama
* Ringkasan singkat final project
* CTA ke:

  * Profil Mahasiswa
  * Ide Agent

Contoh struktur:

```text
Hi, I'm Hisyam Syafa Raditya
S1 Teknik Informatika ITS · 2024

Data Analysis & Machine Learning

[ Lihat Profil ] [ Lihat Ide Agent ]

Agentic AI-Based Web Application
Quality Assurance · Security Testing · Automated Repair
```

Gunakan layout yang sederhana dan profesional.

---

# 16. Halaman `/profil-mahasiswa`

Halaman ini menampilkan seluruh profil akademik.

Gunakan section:

1. Profile Header
2. Bio
3. Academic Information
4. Experience
5. Skills
6. Contact / Social Links

Gunakan `<x-info-card>` untuk informasi yang dapat digunakan kembali.

Contoh:

```blade
<x-info-card title="Nama">
    Hisyam Syafa Raditya
</x-info-card>
```

Contoh lain:

```blade
<x-info-card title="Program Studi">
    S1 Teknik Informatika
</x-info-card>
```

---

# 17. Halaman `/ide-agent`

Halaman ini menjadi showcase utama final project.

Urutan konten:

1. Project title
2. Tagline
3. Background
4. Tech Stack
5. Agent Architecture
6. `qa-explorer`
7. `security-scanner`
8. `repair-engineer`
9. End-to-end workflow
10. Idea submission form

---

# 18. End-to-End Workflow

Tampilkan alur sederhana:

```text
Web Application
      ↓
QA Exploration
      ↓
Security Testing
      ↓
Finding / Bug
      ↓
Root Cause Analysis
      ↓
Source Code Investigation
      ↓
Patch + Regression Test
      ↓
Ephemeral Validation
      ↓
CI
      ↓
Draft Pull Request
      ↓
Human Review
```

Tujuannya agar pengunjung langsung memahami bagaimana ketiga agent bekerja sebagai satu sistem.

---

# 19. Idea Submission Form

Pada halaman `/ide-agent`, sediakan form sederhana untuk mengakomodasi requirement tugas.

Field minimal:

* Nama
* Email
* Ide / Feedback
* Submit button

Form tidak perlu menyimpan data ke database.

Setelah submit, tampilkan notification menggunakan:

```blade
<x-status-banner type="success">
    Ide berhasil dikirim.
</x-status-banner>
```

Tidak perlu membuat database, model, migration, authentication, atau CRUD.

---

# 20. Master Layout

File:

```text
resources/views/layouts/app.blade.php
```

Master layout wajib menangani struktur HTML utama:

```text
<html>
<head>
    Dynamic title
    Vite assets
</head>

<body>

    Navbar

    Main content container
        @yield('content')

    ITS Footer

</body>
</html>
```

Child views tidak boleh membuat ulang:

* `<html>`
* `<head>`
* `<body>`
* Navbar
* Footer
* Main container

---

# 21. Blade Views

Minimal gunakan:

```text
resources/views/
├── layouts/
│   └── app.blade.php
├── components/
│   ├── info-card.blade.php
│   └── status-banner.blade.php
├── home.blade.php
├── profil-mahasiswa.blade.php
└── ide-agent.blade.php
```

Semua halaman utama harus menggunakan:

```blade
@extends('layouts.app')
```

dan:

```blade
@section('content')
    ...
@endsection
```

---

# 22. Blade Component — `x-info-card`

Buat reusable Blade component:

```text
resources/views/components/info-card.blade.php
```

Component harus mendukung:

* Parameter/title
* `$slot`
* `$attributes`

Contoh penggunaan:

```blade
<x-info-card title="Nama" class="...">
    Hisyam Syafa Raditya
</x-info-card>
```

Component tidak boleh hanya menjadi HTML statis.

Tujuan component adalah menunjukkan bahwa satu component dapat digunakan untuk berbagai informasi profil.

---

# 23. Blade Component — `x-status-banner`

Buat:

```text
resources/views/components/status-banner.blade.php
```

Component harus mendukung:

* Parameter/type
* `$slot`
* `$attributes`

Contoh:

```blade
<x-status-banner type="success">
    Ide berhasil dikirim.
</x-status-banner>
```

Component harus dapat digunakan kembali untuk status berbeda.

Contoh:

```blade
<x-status-banner type="error">
    Terjadi kesalahan.
</x-status-banner>
```

Gunakan `$attributes` agar class tambahan atau HTML attributes dapat diberikan dari parent view.

---

# 24. PageController

Gunakan satu controller:

```text
app/Http/Controllers/PageController.php
```

Controller bertanggung jawab untuk seluruh halaman:

```text
home()
profilMahasiswa()
ideAgent()
beranda()
```

Jangan membuat controller terpisah untuk masing-masing halaman.

Data yang dibutuhkan view dapat dikirim melalui controller atau didefinisikan secara sederhana di Blade sesuai kebutuhan tugas.

Hindari overengineering.

---

# 25. Routes

Gunakan route yang jelas.

Contoh:

```php
Route::get('/', [PageController::class, 'home']);
Route::get('/profil-mahasiswa', [PageController::class, 'profilMahasiswa']);
Route::get('/ide-agent', [PageController::class, 'ideAgent']);
Route::get('/beranda', [PageController::class, 'beranda']);
```

Route `/beranda` digunakan khusus untuk memenuhi challenge dynamic welcome.

---

# 26. Vite & NPM

Gunakan Vite sebagai asset bundler Laravel.

CSS framework harus di-install melalui NPM.

Pilihan:

* Tailwind CSS
* Bootstrap

Prioritaskan implementasi yang sederhana dan stabil.

Master layout harus menggunakan:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Tidak boleh menggunakan:

```html
<link href="https://cdn...">
```

atau CDN framework lainnya.

---

# 27. Challenge 1 — Dynamic Dark Mode

URL:

```text
/ide-agent?mode=dark
```

Ketika query parameter:

```text
mode=dark
```

diberikan, halaman `/ide-agent` harus berubah ke mode dark.

Implementasikan menggunakan:

* Query parameter Laravel
* Variable dari controller
* Blade conditional
* Dynamic CSS/Tailwind class

Tidak boleh membuat halaman `ide-agent-dark.blade.php`.

Contoh konsep:

```text
Request
   ↓
mode=dark
   ↓
Controller
   ↓
$darkMode = true
   ↓
Blade
   ↓
Dynamic class
```

Jika parameter tidak diberikan, halaman menggunakan mode normal.

---

# 28. Challenge 2 — Dynamic Welcome

URL:

```text
/beranda?user=Andi
```

Halaman harus membaca parameter:

```text
user=Andi
```

dan menampilkan pesan:

```text
Selamat datang, Andi!
```

Jika parameter tidak diberikan, gunakan fallback yang masuk akal seperti:

```text
Selamat datang!
```

Gunakan:

```blade
<x-status-banner>
```

untuk menampilkan notification tersebut.

Tidak boleh membuat view berbeda untuk setiap nama user.

---

# 29. UI Design

Desain harus:

* Clean
* Modern
* Responsive
* Readable
* Konsisten
* Tidak terlalu ramai

Prioritaskan readability daripada dekorasi.

## Navbar

Berisi:

```text
Academic Profile
Home
Profil Mahasiswa
Ide Agent
```

## Footer

Gunakan footer sederhana dengan identitas:

```text
© 2026 Hisyam Syafa Raditya
Institut Teknologi Sepuluh Nopember
```

## Responsive

Website harus tetap nyaman digunakan pada:

* Desktop
* Tablet
* Mobile

Hindari:

* Horizontal overflow
* Text terpotong
* Card bertabrakan
* Button keluar container
* Navbar rusak pada layar kecil

---

# 30. Visual Style

Gunakan visual hierarchy yang jelas.

Prioritas:

```text
Page Title
    ↓
Section Title
    ↓
Description
    ↓
Cards / Content
```

Gunakan card untuk:

* Informasi profil
* Experience
* Skills
* Tech stack
* Agent details

Gunakan badge/chip untuk:

* Skills
* Technology
* Agent name
* Role

Jangan membuat setiap elemen menjadi card jika tidak diperlukan.

---

# 31. Arsitektur View

Struktur yang diharapkan:

```text
                 layouts/app.blade.php
                         │
          ┌──────────────┼──────────────┐
          ↓              ↓              ↓
       home.blade    profil.blade    ide-agent.blade
          │              │              │
          │              ↓              ↓
          │        x-info-card    x-info-card
          │                             │
          │                       x-status-banner
          │
          └────────── shared layout ──────────┘
```

Tujuan utamanya adalah memastikan tidak ada duplikasi struktur HTML.

---

# 32. Requirement Rubric

## A. Pewarisan Layout — 30%

**Requirement:**

* Ketiga halaman utama menggunakan `@extends`.
* Semua menggunakan `layouts.app`.
* Tidak ada duplikasi HTML structure.
* Navbar hanya berada di master layout.
* Footer hanya berada di master layout.
* Main container hanya berada di master layout.
* Dynamic title berada di master layout.

**Acceptance Criteria:**

```text
[ ] /
    └── @extends('layouts.app')

[ ] /profil-mahasiswa
    └── @extends('layouts.app')

[ ] /ide-agent
    └── @extends('layouts.app')
```

---

# 33. Blade Components & Slots — 25%

Minimal terdapat:

```text
x-info-card
x-status-banner
```

Keduanya harus:

* Reusable
* Memiliki parameter
* Menggunakan `$slot`
* Mendukung `$attributes`
* Digunakan lebih dari satu kali jika relevan

Acceptance criteria:

```text
[ ] x-info-card tersedia
[ ] x-info-card menerima parameter
[ ] x-info-card menggunakan $slot
[ ] x-info-card menggunakan $attributes

[ ] x-status-banner tersedia
[ ] x-status-banner menerima parameter
[ ] x-status-banner menggunakan $slot
[ ] x-status-banner menggunakan $attributes
```

---

# 34. Vite Asset Bundling — 25%

Acceptance criteria:

```text
[ ] package.json tersedia
[ ] Framework CSS di-install melalui NPM
[ ] Vite digunakan
[ ] @vite digunakan di master layout
[ ] CSS berhasil dimuat
[ ] JS berhasil dimuat
[ ] Tidak menggunakan CDN
[ ] npm run dev berjalan
```

---

# 35. UI & Responsiveness — 10%

Acceptance criteria:

```text
[ ] Layout bersih
[ ] Typography konsisten
[ ] Spacing konsisten
[ ] Cards tidak bertabrakan
[ ] Form rapi
[ ] Navbar rapi
[ ] Footer rapi
[ ] Responsive mobile
[ ] Responsive desktop
[ ] Tidak ada horizontal overflow
```

---

# 36. Dynamic Challenge — 10%

Acceptance criteria:

### Dark mode

```text
[ ] /ide-agent dapat dibuka
[ ] /ide-agent?mode=dark dapat dibuka
[ ] mode=dark mengubah tampilan
[ ] Menggunakan variable dari request
[ ] Menggunakan conditional Blade
[ ] Tidak membuat view baru
```

### Dynamic user

```text
[ ] /beranda dapat dibuka
[ ] /beranda?user=Andi dapat dibuka
[ ] Nama Andi muncul secara dynamic
[ ] Menggunakan x-status-banner
[ ] Tidak membuat view per user
```

---

# 37. Implementation Order

Implementasikan project secara bertahap.

## Phase 1 — Project Inspection

Periksa:

* Laravel version
* Existing routes
* Existing controller
* Existing Blade views
* `package.json`
* `vite.config.js`
* CSS/JS setup

Jangan menghapus konfigurasi existing tanpa alasan.

---

## Phase 2 — Vite

Pastikan:

* NPM tersedia
* Dependencies ter-install
* CSS framework tersedia
* Vite berjalan

Test:

```bash
npm install
npm run dev
```

---

## Phase 3 — Controller & Routes

Buat/rapikan:

```text
PageController
```

dan seluruh route yang dibutuhkan.

Pastikan route dapat diakses sebelum mempercantik UI.

---

## Phase 4 — Master Layout

Implementasikan:

```text
layouts/app.blade.php
```

berisi:

* Dynamic title
* Navbar
* Vite
* Main content
* Footer

---

## Phase 5 — Main Views

Implementasikan:

```text
home.blade.php
profil-mahasiswa.blade.php
ide-agent.blade.php
```

Pastikan semuanya menggunakan `@extends`.

---

## Phase 6 — Components

Implementasikan:

```text
x-info-card
x-status-banner
```

Pastikan parameter, slot, dan attributes benar-benar bekerja.

---

## Phase 7 — Profile Content

Masukkan seluruh data:

* Identity
* Bio
* Experience
* Skills
* Contact

---

## Phase 8 — Agent Content

Masukkan:

* Project title
* Tagline
* Background
* Tech stack
* Architecture
* Three agents
* Workflow
* Idea submission form

---

## Phase 9 — Challenges

Implementasikan:

```text
/ide-agent?mode=dark
```

dan:

```text
/beranda?user=Andi
```

---

## Phase 10 — UI Polish

Periksa:

* Desktop
* Mobile
* Navbar
* Cards
* Form
* Typography
* Spacing
* Overflow
* Dark mode

Jangan menambahkan fitur yang tidak diperlukan.

---

# 38. Final Verification

Sebelum dianggap selesai, lakukan pengecekan bertahap.

## Checkpoint 1 — Architecture

```text
[ ] Laravel project berjalan
[ ] PageController digunakan
[ ] Routes benar
[ ] Master layout tersedia
[ ] 3 halaman menggunakan @extends
```

## Checkpoint 2 — Components

```text
[ ] x-info-card
[ ] x-status-banner
[ ] Props/parameters
[ ] Slots
[ ] Attributes
```

## Checkpoint 3 — Vite

```text
[ ] NPM dependencies
[ ] CSS framework
[ ] Vite
[ ] @vite
[ ] No CDN
```

## Checkpoint 4 — Content

```text
[ ] Profil lengkap
[ ] Experience lengkap
[ ] Skills lengkap
[ ] Agent project lengkap
[ ] Three agents
[ ] Architecture
[ ] Workflow
```

## Checkpoint 5 — Challenge

Test:

```text
/
 /profil-mahasiswa
 /ide-agent
 /beranda?user=Andi
 /ide-agent?mode=dark
```

## Checkpoint 6 — UI

Test minimal:

```text
Desktop
Mobile
Dark mode
Form
Navigation
```

---

# 39. Out of Scope

Jangan menambahkan:

* Database
* Migration
* Eloquent Model
* Authentication
* Login/Register
* Admin dashboard
* Real Agentic AI implementation
* GitHub API integration
* OWASP ZAP integration
* Playwright implementation
* Real AI inference
* Real Pull Request creation
* API backend
* Deployment infrastructure

Detail Agentic AI di website merupakan **konsep final project yang dipresentasikan**, bukan implementasi sistem Agentic AI yang sebenarnya.

---

# 40. Definition of Done

Project dianggap selesai apabila:

1. Laravel berjalan tanpa error.
2. `/`, `/profil-mahasiswa`, dan `/ide-agent` dapat diakses.
3. Ketiga halaman menggunakan master layout yang sama.
4. Tidak terdapat duplikasi HTML structure.
5. `x-info-card` dan `x-status-banner` benar-benar reusable.
6. Components menggunakan parameter, slot, dan attributes.
7. Vite + NPM digunakan untuk asset.
8. Tidak menggunakan CDN.
9. Profil mahasiswa tampil lengkap.
10. Ide Agent tampil lengkap dan mudah dipahami.
11. Architecture tiga agent ditampilkan dengan jelas.
12. `/ide-agent?mode=dark` bekerja.
13. `/beranda?user=Andi` bekerja.
14. Form ide dapat digunakan dan menampilkan status.
15. UI responsive dan tidak mengalami visual collision.
16. Tidak terdapat fitur tambahan yang tidak diperlukan oleh tugas.
17. Struktur project tetap sederhana dan mudah dipahami.

**Target akhir: memenuhi seluruh requirement tugas dan seluruh kategori rubric 100%.**
