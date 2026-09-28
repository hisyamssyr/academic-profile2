@extends('layouts.app')

@section('title', 'Home - Academic Profile')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] text-center space-y-8">
    <div class="space-y-4">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">
            Hi, I'm <span class="text-blue-600 dark:text-blue-400">Hisyam Syafa Raditya</span>
        </h1>
        <p class="text-xl text-gray-600 dark:text-gray-300">S1 Teknik Informatika ITS &middot; 2024</p>
        <p class="text-lg font-medium text-gray-800 dark:text-gray-100">Data Analysis &amp; Machine Learning</p>
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
        <a href="{{ route('profil', $darkMode ? ['mode' => 'dark'] : []) }}" class="px-6 py-3 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 transition">
            Lihat Profil
        </a>
        <a href="{{ route('ide-agent', $darkMode ? ['mode' => 'dark'] : []) }}" class="px-6 py-3 bg-white dark:bg-gray-800 text-blue-600 dark:text-blue-400 border border-blue-600 dark:border-blue-500 rounded-md shadow-sm hover:bg-blue-50 dark:hover:bg-gray-700 transition">
            Lihat Ide Agent
        </a>
    </div>

    <div class="mt-12 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 p-8 rounded-lg shadow-sm max-w-2xl w-full">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">Agentic AI-Based Web Application</h2>
        <p class="text-gray-600 dark:text-gray-300">
            Quality Assurance &middot; Security Testing &middot; Automated Repair
        </p>
    </div>
</div>
@endsection
