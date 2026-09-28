# Review Kodingan vs PRD

Tanggal review: 2026-09-28
Acuan: `docs/PRD.md` (terutama §32–§36 Rubric dan §40 Definition of Done)

## Ringkasan

Struktur arsitektur sudah benar dan sesuai PRD: satu `PageController`, satu master layout
`layouts/app.blade.php`, ketiga halaman utama pakai `@extends`, dua component
(`x-info-card`, `x-status-banner`) sudah punya parameter + `$slot` + `$attributes`,
Vite + Tailwind via NPM tanpa CDN, dan challenge dynamic (`/beranda?user=`,
`?mode=dark`) sudah merespons query parameter.

Semua URL merespons HTTP 200 dan `php artisan test` lulus (2/2).

> **Status update — sudah dikerjakan ( lihat "Yang Sudah Diperbaiki" di bawah):**
> dark mode kini berlaku di **semua** route dengan tombol toggle di navbar (item 1, 2, 3).
> Item 4–14 di dokumen ini **belum** dikerjakan dan tetap menunggu keputusanmu.

---

## Yang Sudah Diperbaiki

### [SELESAI] Dark mode di semua halaman + tombol toggle di navbar

PRD hanya meminta dark mode di `/ide-agent?mode=dark`. Sekarang dark mode berlaku di
keempat route, dan bisa dinyalakan/matikan lewat tombol di navbar.

Pendekatan: **class-based dark variant Tailwind**, bukan override class per-instance.
Di `resources/css/app.css`:

```css
@custom-variant dark (&:where(.dark, .dark *));
```

`$darkMode` sekarang dikirim dari keempat method `PageController` lewat private helper
`darkMode()`, lalu dipakai di layout untuk memberi class pada elemen `<html>`:

```blade
<html lang="id" class="{{ $darkMode ? 'dark' : '' }}">
```

Karena Blade `@extends` berbagi data antara child view dan layout, seluruh halaman
sekaligus ikut berubah tanpa perlu mengulang logika. Di view, styling dark ditulis
dengan variant `dark:` — **tidak ada lagi class konflik** seperti item 1 lama, dan
override warna per-instance di `ide-agent.blade.php` dihapus semua.

Tombol toggle di navbar adalah link (bukan JS), sehingga tetap pure server-side:

```blade
<a href="{{ $darkMode
    ? request()->fullUrlWithoutQuery(['mode'])
    : request()->fullUrlWithQuery(['mode' => 'dark']) }}">
```

Konsekuensinya:

| Aspek | Perilaku |
| --- | --- |
| Query lain | `fullUrlWithQuery` / `fullUrlWithoutQuery` membaca URL saat ini, jadi query lain ikut terjaga (contoh: `/beranda?user=Andi` → `/beranda?user=Andi&mode=dark`) |
| Berpindah halaman | Semua link navbar & tombol CTA mengirim `?mode=dark` bila sedang gelap, jadi mode bertahan lintas halaman tanpa cookie/session |
| `/ide-agent?mode=dark` | Tetap berfungsi persis seperti requirement PRD §27 |
| Form GET | Field hidden `mode=dark` sudah ada, jadi submit tidak mematikan dark mode |
| Aksesibilitas | Toggle berupa `<a>` dengan `aria-label` + `title`, plus ikon sun/moon + teks "Mode Gelap"/"Mode Terang" (teks disembunyikan di layar kecil) |
| UI responsif | Ikon tetap tampil di mobile, teks tombol disembunyikan di bawah `sm` agar navbar tidak berdesakan |

File yang disentuh: `resources/css/app.css`, `app/Http/Controllers/PageController.php`,
`resources/views/layouts/app.blade.php`, `resources/views/components/info-card.blade.php`,
`resources/views/components/status-banner.blade.php`, dan keempat halaman view.

Catatan kecil: pada `ide-agent.blade.php`, constraint auto-merge yang sebelumnya ditulis
dengan backtick Markdown diganti `<code>main</code>` supaya ter-render sebagai kode.

---

## Prioritas 1 — Harus Diperbaiki (berpengaruh ke rubric)

### [SUDAH SELESAI] Dark mode: class konflik, card tetap putih dengan teks terang

**Masalah lama:** `ide-agent.blade.php` mengirim class warna per-instance
(`class="{{ $darkMode ? 'bg-gray-800 ...' : '' }}"`) ke `x-info-card`, padahal default
component sudah memuat `bg-white`. Tailwind v4 tidak memilih berdasarkan urutan atribut
HTML, melainkan urutan di file CSS — dan `.bg-white` muncul setelah `.bg-gray-800`,
sehingga `bg-white` menang. Akibatnya card gelap tetap berlatar putih dengan teks
`text-gray-200` (abu-abu muda) → kontras buruk. Box constraint `repair-engineer` punya
konflik serupa (`text-yellow-800` mengalahkan `text-yellow-200`).

**Solusi yang dipakai:** class-based dark variant (`@custom-variant dark` di
`resources/css/app.css`) plus class `dark` pada `<html>`. Semua warna gelap kini ditulis
dengan variant `dark:` (`bg-white dark:bg-gray-800`), jadi tidak ada dua class
background yang bersaing dan konfliknya mustahil muncul. Override per-instance di
`ide-agent.blade.php` dihapus seluruhnya.

### [SUDAH SELESAI] Navbar dan footer tidak ikut dark mode

**Masalah lama:** `layouts/app.blade.php` mengunci `bg-gray-50 text-gray-900` di
`<body>` dan navbar `bg-white`, sementara container gelap hanya membungkus isi `main`.
Di `?mode=dark`, latar sekitar card, navbar, dan footer tetap terang.

**Solusi:** `<body>`, `<nav>`, dan `<footer>` sekarang memakai variant `dark:`
(`bg-gray-50 dark:bg-gray-900`, `bg-white dark:bg-gray-800`, `bg-gray-800 dark:bg-black`),
dan `$darkMode` sudah dikirim dari keempat method controller. Wrapper
`bg-gray-900 ... p-6 rounded-xl` yang tumpang tindih di `ide-agent.blade.php` dihapus.

### [SUDAH SELESAI] Navbar tidak ada di layar mobile

**Masalah lama:** link navigasi memakai `hidden md:flex`, sehingga di bawah 768px seluruh
menu hilang dan pengunjung mobile tidak bisa pindah halaman.

**Solusi:** link navigasi kini selalu tampil dengan `whitespace-nowrap` +
`overflow-x-auto`, ukuran font `text-sm` di mobile dan `sm:text-base` di layar lebih
besar. Tombol dark mode di sebelahnya memakai ikon saja di bawah `sm` (teks
"Mode Gelap"/"Mode Terang" disembunyikan) supaya navbar tidak berdesakan atau
menghasilkan horizontal overflow.

## Prioritas 2 — Seharusnya Diperbaiki (kelengkapan konten vs PRD)

### 4. `Angkatan: 2024` tidak ada di halaman profil

PRD §4 menyertakan `Angkatan: 2024` sebagai bagian identitas. `profil-mahasiswa.blade.php:15-20`
menampilkan Nama, NRP, Prodi, Institusi, Periode, IPK — angkatan terlewat. (`Angkatan`
memang tampil di `home.blade.php:11` sebagai "· 2024", tapi halaman yang supposed-nya
menampilkan profil akademik lengkap tidak punya.)

### 5. `x-status-banner` belum pernah dipakai untuk status `error`

PRD §23 menyebut component harus bisa dipakai ulang untuk status berbeda
(`success` dan `error`). Saat ini `type="success"` dipakai di
`ide-agent.blade.php:162`, `type="info"` di `beranda.blade.php:7`, tapi `error` belum
pernah dipakai. Form juga tidak punya validasi sama sekali, jadi tidak ada cara
menampilkan pesan error.

Tambahkan validasi ringan di controller (tanpa database):

```php
public function ideAgent(Request $request)
{
    $darkMode = $request->query('mode') === 'dark';

    $validated = $request->validate([
        'nama'  => ['nullable', 'string', 'max:255'],
        'email' => ['nullable', 'email'],
        'ide'   => ['nullable', 'string'],
    ]);

    return view('ide-agent', compact('darkMode', 'validated'));
}
```

lalu di view:

```blade
@if ($errors->any())
    <x-status-banner type="error">Periksa kembali isian form Anda.</x-status-banner>
@endif
@if (request()->has('submit'))
    <x-status-banner type="success">Ide berhasil dikirim.</x-status-banner>
@endif
```

Catatan: kalau tetap pakai `method="GET"`, nilai input akan hilang setelah submit.
Sebaiknya tambahkan `value="{{ old('nama') }}"` (atau `request('nama')`) pada ketiga
field supaya isi form tidak hilang — ini juga bagian dari "Form rapi" di rubric §35.

### 6. `repair-engineer`: alur pencarian root cause tidak ditampilkan

PRD §14 punya blok deterministik yang belum ada di view:

```text
Stack Trace → File → Caller → Related Test
```

dan 6 langkah: patch → regression test → validasi ephemeral environment → branch →
tunggu CI → Draft PR. Yang tampil sekarang (`ide-agent.blade.php:151-155`) hanya dua
kalimat ringkas plus constraint. Tambahkan daftar ordered/`<pre>` supaya alur agent
terbaca jelas (rubric §38 Checkpoint 4 "Agent project lengkap").

### 7. `security-scanner`: aturan active scan belum ditampilkan

PRD §13: "Pengujian active scan hanya boleh dijalankan apabila pengguna secara eksplisit
memberikan otorisasi." Kalimat ini tidak ada di card agent 2. Cukup satu baris
callout, misalnya dengan `type="warning"` — sekaligus menambah variasi baru pada
`x-status-banner`.

### 8. `qa-explorer`: daftar output kurang lengkap

PRD §12 menyatakan output berupa lima butir (functional findings, accessibility
findings, error/broken flow, unlabelled elements, elements yang tidak keyboard-reachable)
lalu bukti (DOM snapshot, network log, screenshot). Sekarang semuanya dipadatkan jadi
satu kalimat. Pecah jadi dua list agar mudah dibaca.

### 9. Tech stack: nama teknologi dipotong

PRD §9 vs `ide-agent.blade.php:37-57`:

| PRD | Tampil di web |
| --- | --- |
| Qwen3 1.7B via llama.cpp | `Qwen3 1.7B` |
| Playwright + Headless Chromium | `Playwright` |
| GitHub App + GitHub Actions | `GitHub App` |

Gunakan nama lengkap PRD, tetap sebagai badge.

---

## Prioritas 3 — Kebersihan (tidak Scoring, tapi rapi)

### 10. `resources/views/welcome.blade.php` masih ada

File bawaan Laravel, sudah tidak dirujuk route mana pun, dan berisi ~200 baris CSS
Tailwind hasil compile yang di-inline. Selain membingungkan saat presentasi, file ini
menyuntikkan banyak utility `dark:` dan class custom ke `app.css` build (terlihat di
`public/build/assets/app-DCJdxfn3.css`) sehingga bundle membengkak tanpa dipakai.
Hapus saja — tidak ada fitur yang bergantung padanya.

### [SUDAH SELESAI] `@props(['title'])` + `@if (isset($title))` redundan

`info-card.blade.php` — `title` tanpa default selalu ada, jadi `isset()` selalu true.
Sudah diubah jadi `@props(['title' => null])` + `@if ($title)` saat component ditulis ulang
untuk dark mode, jadi `x-info-card` kini bisa dipanggil tanpa title.

### 12. `mb-4` dipatok di dalam `status-banner`

`status-banner.blade.php:13` — `mb-4` ada di default class, jadi parent tidak bisa
menghilangkan marginnya (mis. banner terakhir di dalam card). Pindahkan ke pemakaian
di parent view.

### 13. Halaman `/beranda` tidak punya pintu masuk

`/beranda` hanya bisa diakses lewat URL. Untuk demo challenge dynamic welcome, jauh
lebih mudah ditambahkan link kecil di navbar atau di `home.blade.php`. Bukan syarat rubric,
tapi menghindari penguji tidak menemukan URL-nya.

### 14. `resources/js/app.js` kosong

Isinya hanya `//`. Tidak melanggar apa pun (rubric §34 hanya mensyaratkan "JS berhasil
dimuat", dan sudah terpenuhi). Tombol dark mode sengaja dibuat tanpa JS supaya tetap
server-side, jadi file ini masih kosong.

---

## Checklist Rubric

| Kategori | Status | Catatan |
| --- | --- | --- |
| A. Pewarisan Layout (30%) | ✅ Penuh | `@extends` di 3 halaman, navbar/footer/main container hanya di layout, dynamic title ada. Tidak ada duplikasi HTML. |
| B. Blade Components & Slots (25%) | ⚠️ 90% | Parameter, `$slot`, `$attributes` semua ada di kedua component dan dipakai berulang. Yang kurang: `type="error"` belum pernah dipakai (item 5). |
| C. Vite Asset Bundling (25%) | ✅ Penuh | `package.json` ada, Tailwind v4 via NPM, `@vite` di layout, nol CDN, `npm run dev` jalan. |
| D. UI & Responsiveness (10%) | ✅ Penuh | Desktop bersih dan konsisten. Menu navbar sudah tampil di mobile. Dark mode rapi di semua halaman, tidak ada kontras rusak. |
| E. Dynamic Challenge (10%) | ✅ Penuh | Kedua challenge merespons query parameter dan tanpa view tambahan. Dark mode benar-benar mengubah tampilan dan bisa di-toggle dari navbar. |

### Definition of Done — item yang belum terpenuhi

- [x] 1–13 (Laravel jalan, routeaccessible, satu layout, component reusable, Vite tanpa CDN, profil tampil, `/ide-agent?mode=dark` merespons, `/beranda?user=Andi` merespons, form menampilkan status)
- [ ] **11.** Architecture tiga agent ditampilkan dengan jelas — sudah ada, tapi alur deterministik `repair-engineer` (item 6) belum
- [x] **15.** UI responsive tanpa visual collision — navbar mobile sudah tampil + kontras dark mode sudah benar
- [ ] **16.** Tidak ada fitur tambahan di luar tugas — `welcome.blade.php` sisa bawaan (item 10), dan `database/database.sqlite` + 3 migration bawaan masih ada di repo. Tidak dipakai kode mana pun, jadi tidak merusak, tapi bisa dihapus bila ingin benar-benar bebas database.

---

## Urutan pengerjaan yang disarankan

Item 1, 2, 3, dan 11 sudah selesai. Sisa pekerjaan:

1. Item 5 (validasi + `x-status-banner type="error"`) — paling besar pengaruhnya ke
   rubric component (25%).
2. Item 10 (hapus `welcome.blade.php`) lalu `npm run build` ulang.
3. Item 4, 6, 7, 8, 9 (kelengkapan konten).
4. Item 12, 13, 14 (polish).
