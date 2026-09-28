@extends('layouts.app')

@section('title', 'Ide Agent - Academic Profile')

@section('content')
<div class="space-y-8">

    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Agentic AI-Based Web Application</h1>
        <p class="text-lg italic text-gray-600 dark:text-gray-300 mt-2">
            "Autonomous agent that tests, diagnoses, and repairs deployed web applications — then proves the fix with a verified pull request."
        </p>
    </div>

    <!-- Background -->
    <x-info-card title="Project Overview / Background" class="mb-4">
        <p class="mb-4">
            Pengujian web modern menghadapi dua masalah sekaligus: DOM yang berantakan, seperti div custom, canvas UI, dan elemen tanpa label semantik, membuat automation tools biasa gagal. Di sisi lain, business-logic vulnerability seperti broken access control sering lolos dari scanner otomatis.
        </p>
        <p>
            Sistem ini menggabungkan agent browser dengan strategi fallback berlapis, security scanning berbasis reasoning AI, dan kemampuan menelusuri root cause langsung ke source code di GitHub. Sistem kemudian mengusulkan perbaikan yang sudah diverifikasi melalui automated testing, bukan sekadar menghasilkan laporan bug.
        </p>
    </x-info-card>

    <!-- Tech Stack -->
    <x-info-card title="Tech Stack">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="col" class="pb-2 font-semibold">Teknologi</th>
                        <th scope="col" class="pb-2 font-semibold">Fungsi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="inline-block px-2 py-1 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200 rounded text-xs font-medium">Laravel + Livewire</span></td>
                        <td class="py-2">Orchestration</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="inline-block px-2 py-1 bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200 rounded text-xs font-medium">Qwen3 1.7B via llama.cpp</span></td>
                        <td class="py-2">Reasoning engine, CPU-only</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="inline-block px-2 py-1 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-xs font-medium">Playwright + Headless Chromium</span></td>
                        <td class="py-2">Browser automation</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="inline-block px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-200 rounded text-xs font-medium">OWASP ZAP</span></td>
                        <td class="py-2">Security scanning</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="inline-block px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded text-xs font-medium">GitHub App + GitHub Actions</span></td>
                        <td class="py-2">Repository integration, CI, PR</td>
                    </tr>
                    <tr>
                        <td class="py-2"><span class="inline-block px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-xs font-medium">PostgreSQL + Queue</span></td>
                        <td class="py-2">Data &amp; job orchestration</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-info-card>

    <!-- Architecture & Workflow -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-info-card title="Agent Architecture">
            <pre class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-300 p-4 rounded text-sm overflow-x-auto"><code>              Web Application
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
            Verified Pull Request</code></pre>
        </x-info-card>

        <x-info-card title="End-to-End Workflow">
            <div class="flex flex-col space-y-2 text-sm items-center">
                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full">Web Application</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full">QA Exploration</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full">Security Testing</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full">Finding / Bug</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200 rounded-full">Root Cause Analysis</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200 rounded-full">Source Code Investigation</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full">Patch + Regression Test</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full">Ephemeral Validation</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full">CI</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full">Draft Pull Request</span>
                <span class="text-gray-400 dark:text-gray-600" aria-hidden="true">↓</span>
                <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full">Human Review</span>
            </div>
        </x-info-card>
    </div>

    <!-- Agent Details -->
    <div class="space-y-6">
        <x-info-card title="Agent 1 — qa-explorer">
            <p class="mb-2"><strong>Role:</strong> <span class="inline-block px-2 py-0.5 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">Functional &amp; Accessibility QA Agent</span></p>
            <p class="mb-2">Agent menjelajahi aplikasi web menggunakan strategi <strong>6-level fallback</strong>:</p>
            <ol class="list-decimal list-inside mb-4 text-sm space-y-1 pl-2">
                <li>Semantic accessibility tree</li>
                <li>DOM heuristics</li>
                <li>Computed geometry/proximity</li>
                <li>Keyboard navigation</li>
                <li>Coordinate interaction</li>
                <li>Optional visual interpretation</li>
            </ol>
            <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">
                Strategi ini memungkinkan agent tetap menguji form dan interaksi meskipun markup HTML aplikasi tidak rapi.
            </p>
            <p class="mb-2"><strong>Output — daftar finding:</strong></p>
            <ul class="list-disc list-inside mb-4 text-sm space-y-1 pl-2">
                <li>Functional findings</li>
                <li>Accessibility findings</li>
                <li>Error/broken flow</li>
                <li>Unlabelled elements</li>
                <li>Elements yang tidak keyboard-reachable</li>
            </ul>
            <p><strong>Bukti tiap finding:</strong> DOM snapshot, network log, screenshot.</p>
        </x-info-card>

        <x-info-card title="Agent 2 — security-scanner">
            <p class="mb-2"><strong>Role:</strong> <span class="inline-block px-2 py-0.5 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200 rounded text-sm">Security Testing Agent</span></p>
            <p class="mb-2">Agent menjalankan <strong>passive security scanning</strong> melalui proxy OWASP ZAP untuk mendeteksi:</p>
            <ul class="list-disc list-inside mb-4 text-sm space-y-1 pl-2">
                <li>Header tidak aman</li>
                <li>Cookie tidak aman</li>
                <li>Security-related traffic findings</li>
            </ul>
            <p class="mb-2">Agent juga menggunakan beberapa akun uji dengan role berbeda untuk menguji:</p>
            <ul class="list-disc list-inside mb-4 text-sm space-y-1 pl-2">
                <li>Broken access control</li>
                <li>IDOR/BOLA</li>
                <li>Business-logic vulnerability</li>
            </ul>
            <x-status-banner type="warning" class="mb-4">
                <span><strong>Otorisasi wajib:</strong> active scan hanya boleh dijalankan apabila pengguna secara eksplisit memberikan otorisasi.</span>
            </x-status-banner>
            <p class="mb-2"><strong>Output — laporan security findings:</strong></p>
            <ul class="list-disc list-inside text-sm space-y-1 pl-2">
                <li>Finding</li>
                <li>Severity</li>
                <li>Evidence</li>
                <li>Request/response evidence</li>
                <li>Recommendation</li>
            </ul>
        </x-info-card>

        <x-info-card title="Agent 3 — repair-engineer">
            <p class="mb-4"><strong>Role:</strong> <span class="inline-block px-2 py-0.5 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Auto-Repair Agent</span></p>
            <p class="mb-2">Agent menelusuri root cause bug langsung ke source code repository GitHub. Pencarian dilakukan secara deterministik:</p>
            <pre class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-300 p-4 rounded text-sm overflow-x-auto mb-4"><code>Stack Trace
    ↓
File
    ↓
Caller
    ↓
Related Test</code></pre>
            <p class="mb-2">Setelah menemukan root cause, agent:</p>
            <ol class="list-decimal list-inside mb-4 text-sm space-y-1 pl-2">
                <li>Menghasilkan patch.</li>
                <li>Membuat regression test.</li>
                <li>Menjalankan validasi di ephemeral environment.</li>
                <li>Membuat branch perbaikan.</li>
                <li>Menunggu proses CI.</li>
                <li>Menghasilkan Draft Pull Request.</li>
            </ol>
            <x-status-banner type="warning" class="mb-4">
                <span><strong>Constraint:</strong> Agent tidak pernah melakukan auto-merge ke <code>main</code>. Perubahan tetap menunggu human review.</span>
            </x-status-banner>
            <p class="mb-2"><strong>Output:</strong></p>
            <ul class="list-disc list-inside text-sm space-y-1 pl-2">
                <li>Repair branch</li>
                <li>Regression test</li>
                <li>CI result</li>
                <li>Draft Pull Request</li>
            </ul>
        </x-info-card>
    </div>

    <!-- Idea Submission Form -->
    <x-info-card title="Idea Submission Form">
        <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Form tidak disimpan ke database — isian hanya divalidasi lalu dicatat ke log aplikasi.
        </p>

        @if (session('status'))
            <x-status-banner type="success" class="mb-4">
                {{ session('status') }}
            </x-status-banner>
        @endif

        @if ($errors->any())
            <x-status-banner type="error" class="mb-4">
                <div>
                    <p class="font-semibold mb-1">Ide gagal dikirim. Periksa kembali isian form Anda.</p>
                    <ul class="list-disc list-inside text-sm space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </x-status-banner>
        @endif

        <form method="GET" action="{{ route('ide-agent') }}" class="space-y-4">
            @if ($darkMode)
                <input type="hidden" name="mode" value="dark">
            @endif

            <div>
                <label for="nama" class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" maxlength="255" required
                    @error('nama') aria-invalid="true" @enderror
                    class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md px-3 py-2">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" maxlength="255" required
                    @error('email') aria-invalid="true" @enderror
                    class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md px-3 py-2">
            </div>
            <div>
                <label for="ide" class="block text-sm font-medium mb-1">Ide / Feedback</label>
                <textarea id="ide" name="ide" rows="4" maxlength="2000" required
                    @error('ide') aria-invalid="true" @enderror
                    class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md px-3 py-2">{{ old('ide') }}</textarea>
            </div>
            <button type="submit" name="submit" value="1" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-md transition">
                Kirim Ide
            </button>
        </form>
    </x-info-card>

</div>
@endsection
