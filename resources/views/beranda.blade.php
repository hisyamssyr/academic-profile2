@extends('layouts.app')

@section('title', 'Beranda - Academic Profile')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 mt-8">
    <x-status-banner type="info" class="mb-4">
        @if ($user)
            Selamat datang, {{ $user }}!
        @else
            Selamat datang!
        @endif
    </x-status-banner>

    <div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 p-6 rounded-lg shadow-sm text-center">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Halaman Beranda</h2>
        <p class="text-gray-600 dark:text-gray-300 mb-6">
            Halaman ini dibuat khusus untuk memenuhi requirement "Challenge Dynamic Welcome".
        </p>
        <a href="{{ route('home', $darkMode ? ['mode' => 'dark'] : []) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Kembali ke Home
        </a>
    </div>
</div>
@endsection
