<!DOCTYPE html>
<html lang="id" class="{{ $darkMode ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Academic Profile')</title>
    {{ Vite::fonts() }}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased flex flex-col min-h-screen">
    <nav class="bg-white dark:bg-gray-800 shadow-sm dark:shadow-none sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center gap-3 sm:gap-6 h-16">
                <a href="{{ route('home', $darkMode ? ['mode' => 'dark'] : []) }}"
                    class="text-base sm:text-xl font-bold text-gray-800 dark:text-gray-100 whitespace-nowrap">
                    Academic Profile
                </a>

                <div class="flex items-center gap-3 sm:gap-6 min-w-0 overflow-x-auto">
                    <a href="{{ route('home', $darkMode ? ['mode' => 'dark'] : []) }}"
                        class="text-sm sm:text-base text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium whitespace-nowrap">
                        Home
                    </a>
                    <a href="{{ route('profil', $darkMode ? ['mode' => 'dark'] : []) }}"
                        class="text-sm sm:text-base text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium whitespace-nowrap">
                        Profil Mahasiswa
                    </a>
                    <a href="{{ route('ide-agent', $darkMode ? ['mode' => 'dark'] : []) }}"
                        class="text-sm sm:text-base text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium whitespace-nowrap">
                        Ide Agent
                    </a>
                </div>

                <a href="{{ $darkMode ? request()->fullUrlWithoutQuery(['mode']) : request()->fullUrlWithQuery(['mode' => 'dark']) }}"
                    class="inline-flex items-center gap-2 shrink-0 rounded-md border border-gray-300 dark:border-gray-600 px-2.5 sm:px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition"
                    title="{{ $darkMode ? 'Kembali ke mode terang' : 'Aktifkan mode gelap' }}"
                    aria-label="{{ $darkMode ? 'Kembali ke mode terang' : 'Aktifkan mode gelap' }}">
                    @if ($darkMode)
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2m0 16v2M4.9 4.9l1.4 1.4m11.4 11.4 1.4 1.4M2 12h2m16 0h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4" />
                        </svg>
                        <span class="hidden sm:inline">Mode Terang</span>
                    @else
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z" />
                        </svg>
                        <span class="hidden sm:inline">Mode Gelap</span>
                    @endif
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        @yield('content')
    </main>

    <footer class="bg-gray-800 dark:bg-black text-white dark:text-gray-300 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2026 Hisyam Syafa Raditya</p>
            <p class="text-gray-400 dark:text-gray-500 text-sm mt-2">Institut Teknologi Sepuluh Nopember</p>
        </div>
    </footer>
</body>
</html>
