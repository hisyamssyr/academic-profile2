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
    <x-info-card title="Project Overview / Background">
        <p class="mb-4">
            Pengujian web modern menghadapi dua masalah sekaligus: DOM yang berantakan, seperti div custom, canvas UI, dan elemen tanpa label semantik, membuat automation tools biasa gagal. Di sisi lain, business-logic vulnerability seperti broken access control sering lolos dari scanner otomatis.
        </p>
        <p>
            Sistem ini menggabungkan agent browser dengan strategi fallback berlapis, security scanning berbasis reasoning AI, dan kemampuan menelusuri root cause langsung ke source code di GitHub. Sistem kemudian mengusulkan perbaikan yang sudah diverifikasi melalui automated testing, bukan sekadar menghasilkan laporan bug.
        </p>
    </x-info-card>

    <!-- Tech Stack -->
    <x-info-card title="Tech Stack" class="mt-8">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="pb-2 font-semibold">Teknologi</th>
                        <th class="pb-2 font-semibold">Fungsi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="px-2 py-1 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200 rounded text-xs font-medium">Laravel + Livewire</span></td>
                        <td class="py-2">Orchestration</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="px-2 py-1 bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200 rounded text-xs font-medium">Qwen3 1.7B</span></td>
                        <td class="py-2">Reasoning engine, CPU-only</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-xs font-medium">Playwright</span></td>
                        <td class="py-2">Browser automation</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-200 rounded text-xs font-medium">OWASP ZAP</span></td>
                        <td class="py-2">Security scanning</td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="py-2"><span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded text-xs font-medium">GitHub App</span></td>
                        <td class="py-2">Repository integration, CI, PR</td>
                    </tr>
                    <tr>
                        <td class="py-2"><span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-xs font-medium">PostgreSQL</span></td>
                        <td class="py-2">Data & job orchestration</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-info-card>

    <!-- Architecture & Workflow -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <x-info-card title="Agent Architecture">
            <pre class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-300 p-4 rounded text-sm overflow-x-auto">
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
            </pre>
        </x-info-card>

        <x-info-card title="End-to-End Workflow">
            <div class="flex flex-col space-y-2 text-sm items-center py-2">
                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full">Web Application</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full">QA Exploration</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full">Security Testing</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full">Finding / Bug</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200 rounded-full">Root Cause Analysis</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200 rounded-full">Source Code Investigation</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full">Patch + Regression Test</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full">Ephemeral Validation</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full">CI</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full">Draft Pull Request</span>
                <span class="text-gray-400 dark:text-gray-600">↓</span>
                <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full">Human Review</span>
            </div>
        </x-info-card>
    </div>

    <!-- Agent Details -->
    <div class="space-y-6 mt-8">
        <x-info-card title="Agent 1 — qa-explorer">
            <p class="mb-2"><strong>Role:</strong> <span class="px-2 py-0.5 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">Functional &amp; Accessibility QA Agent</span></p>
            <p class="mb-2">Agent menjelajahi aplikasi web menggunakan strategi <strong>6-level fallback</strong>:</p>
            <ol class="list-decimal list-inside mb-4 text-sm space-y-1 pl-2">
                <li>Semantic accessibility tree</li>
                <li>DOM heuristics</li>
                <li>Computed geometry/proximity</li>
                <li>Keyboard navigation</li>
                <li>Coordinate interaction</li>
                <li>Optional visual interpretation</li>
            </ol>
            <p><strong>Output:</strong> Functional &amp; accessibility findings, error flows, dengan bukti berupa DOM snapshot, network log, dan screenshot.</p>
        </x-info-card>

        <x-info-card title="Agent 2 — security-scanner">
            <p class="mb-2"><strong>Role:</strong> <span class="px-2 py-0.5 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200 rounded text-sm">Security Testing Agent</span></p>
            <p class="mb-2">Menjalankan passive security scanning (OWASP ZAP) dan menguji celah logika bisnis:</p>
            <ul class="list-disc list-inside mb-4 text-sm space-y-1 pl-2">
                <li>Header &amp; cookie tidak aman</li>
                <li>Broken access control</li>
                <li>IDOR/BOLA</li>
            </ul>
            <p><strong>Output:</strong> Laporan security findings dengan severity, bukti, dan rekomendasi perbaikan.</p>
        </x-info-card>

        <x-info-card title="Agent 3 — repair-engineer">
            <p class="mb-2"><strong>Role:</strong> <span class="px-2 py-0.5 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Auto-Repair Agent</span></p>
            <p class="mb-2">Menelusuri root cause langsung ke source code, kemudian membuat patch dan regression test.</p>
            <p class="mb-2 text-sm bg-yellow-50 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 p-2 rounded">
                <strong>Constraint:</strong> Agent tidak pernah melakukan auto-merge ke <code>main</code>. Perubahan tetap menunggu human review.
            </p>
            <p><strong>Output:</strong> Repair branch, regression test, CI result, dan Draft Pull Request.</p>
        </x-info-card>
    </div>

    <!-- Idea Submission Form -->
    <x-info-card title="Idea Submission Form" class="mt-8">
        @if (request()->has('submit'))
            <x-status-banner type="success">
                Ide berhasil dikirim.
            </x-status-banner>
        @endif

        <form method="GET" action="{{ route('ide-agent') }}" class="space-y-4">
            @if ($darkMode)
                <input type="hidden" name="mode" value="dark">
            @endif

            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" required class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" required class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Ide / Feedback</label>
                <textarea name="ide" rows="4" required class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-md px-3 py-2"></textarea>
            </div>
            <button type="submit" name="submit" value="1" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Kirim Ide
            </button>
        </form>
    </x-info-card>

</div>
@endsection
