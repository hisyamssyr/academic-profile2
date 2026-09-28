@extends('layouts.app')

@section('title', 'Profil Mahasiswa - Academic Profile')

@section('content')
<div class="space-y-8">
    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Profil Mahasiswa</h1>
    </div>

    <!-- Identity & Bio -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-info-card title="Identitas Diri">
            <ul class="space-y-2">
                <li><strong>Nama:</strong> Hisyam Syafa Raditya</li>
                <li><strong>NRP:</strong> 5025241130</li>
                <li><strong>Program Studi:</strong> S1 Teknik Informatika</li>
                <li><strong>Institusi:</strong> Institut Teknologi Sepuluh Nopember (ITS)</li>
                <li><strong>Angkatan:</strong> 2024</li>
                <li><strong>Periode:</strong> Masuk Agustus 2024, expected lulus Agustus 2028</li>
                <li><strong>IPK:</strong> 3.51 / 4.00</li>
            </ul>
        </x-info-card>

        <x-info-card title="Bio & Minat">
            <p class="mb-4">
                Mahasiswa Teknik Informatika ITS dengan ketertarikan kuat pada analisis data dan machine learning. Memiliki fondasi matematika dan pemrograman yang solid, dengan kemampuan yang terus berkembang di pemrosesan data, analisis statistik, dan konsep machine learning.
            </p>
            <p><strong>Minat Utama:</strong> Data Analysis & Machine Learning</p>
        </x-info-card>
    </div>

    <!-- Experience -->
    <x-info-card title="Pengalaman">
        <div class="space-y-6">
            <div class="border-l-2 border-blue-200 dark:border-blue-500 pl-4">
                <h4 class="font-semibold text-gray-800 dark:text-gray-100 text-lg">External Affairs Staff - Himpunan Mahasiswa Teknik Computer-Informatika ITS</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Mar 2026 – Present</p>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 text-sm space-y-1">
                    <li>PIC proker SiapinKarirmu! 1.0</li>
                    <li>Liaison Officer kegiatan company visit ke Oracle dan Telkomsel</li>
                    <li>PIC benchmark internal</li>
                </ul>
            </div>

            <div class="border-l-2 border-blue-200 dark:border-blue-500 pl-4">
                <h4 class="font-semibold text-gray-800 dark:text-gray-100 text-lg">Head of Food & Nutrition - Ramadan di Kampus 1447H</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Aug 2025 – Mar 2026</p>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 text-sm space-y-1">
                    <li>Memimpin Divisi Nutrisi dengan 25+ staf, mengoordinasikan kolaborasi lintas divisi.</li>
                    <li>Merancang sistem distribusi makanan untuk 700+ peserta per hari.</li>
                    <li>Berkoordinasi dengan 15+ vendor untuk pengadaan, harga, dan MoU.</li>
                    <li>Menyusun SOP food testing, pemilihan vendor, dan alur distribusi.</li>
                </ul>
            </div>

            <div class="border-l-2 border-blue-200 dark:border-blue-500 pl-4">
                <h4 class="font-semibold text-gray-800 dark:text-gray-100 text-lg">Teaching Assistant Database Systems - ITS</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Aug 2025 – Dec 2025</p>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 text-sm space-y-1">
                    <li>Membimbing 13 mahasiswa dalam praktikum konsep basis data.</li>
                    <li>Mengajar materi CDM, PDM, DDL, DML, dan SQL Query.</li>
                    <li>Mengevaluasi tugas dan kuis selama 7 pertemuan.</li>
                    <li>Mengembangkan studi kasus query SQL untuk memperkuat pemahaman praktikal.</li>
                </ul>
            </div>

            <div class="border-l-2 border-blue-200 dark:border-blue-500 pl-4">
                <h4 class="font-semibold text-gray-800 dark:text-gray-100 text-lg">Vice Head II of Data Management - Schematics 2025</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Apr 2025 – Dec 2025</p>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 text-sm space-y-1">
                    <li>Merancang formulir pendaftaran fisik untuk NLC, NPC, dan BST.</li>
                    <li>Mengelola seluruh data pendaftaran peserta, baik form fisik maupun online.</li>
                    <li>Membuat dan mengelola formulir kehadiran seluruh sesi acara.</li>
                    <li>Membuat formulir feedback untuk evaluasi kepuasan peserta.</li>
                </ul>
            </div>

            <div class="border-l-2 border-blue-200 dark:border-blue-500 pl-4">
                <h4 class="font-semibold text-gray-800 dark:text-gray-100 text-lg">Programming Division Internship - ITS Robocon</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Sep 2024 – Oct 2024</p>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 text-sm space-y-1">
                    <li>Mempelajari sistem mikrokontroler dan aplikasinya di robotika.</li>
                    <li>Mengembangkan program kontrol robot menggunakan C++ dan Python.</li>
                    <li>Mengimplementasikan ROS (Robot Operating System) untuk navigasi dan kontrol robot.</li>
                </ul>
            </div>
        </div>
    </x-info-card>

    <!-- Skills -->
    <x-info-card title="Skills">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            <div>
                <h5 class="font-medium text-gray-700 dark:text-gray-200 mb-2">Programming</h5>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">C</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">C++</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">Python</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">Go</span>
                </div>
            </div>
            <div>
                <h5 class="font-medium text-gray-700 dark:text-gray-200 mb-2">Web Development</h5>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">React</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">Vue</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">Next.js</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">Node.js</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">Laravel</span>
                </div>
            </div>
            <div>
                <h5 class="font-medium text-gray-700 dark:text-gray-200 mb-2">Database</h5>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">SQL</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">SQLite</span>
                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm">NoSQL</span>
                </div>
            </div>
            <div>
                <h5 class="font-medium text-gray-700 dark:text-gray-200 mb-2">Data & ML</h5>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">Pandas</span>
                    <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">NumPy</span>
                    <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">Scikit-learn</span>
                    <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">TensorFlow</span>
                    <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">Keras</span>
                    <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm">Matplotlib</span>
                </div>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <h5 class="font-medium text-gray-700 dark:text-gray-200 mb-2">Soft Skills</h5>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Problem Solving</span>
                    <span class="px-2 py-1 bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Team Collaboration</span>
                    <span class="px-2 py-1 bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Communication</span>
                    <span class="px-2 py-1 bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Time Management</span>
                    <span class="px-2 py-1 bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Adaptability</span>
                    <span class="px-2 py-1 bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm">Attention to Detail</span>
                </div>
            </div>
        </div>
    </x-info-card>

    <!-- Kontak -->
    <x-info-card title="Kontak & Sosial Media">
        <ul class="flex flex-col sm:flex-row gap-4 sm:gap-8">
            <li><strong>Email:</strong> <a href="mailto:hisyamsyafa2@gmail.com" class="text-blue-600 dark:text-blue-400 hover:underline">hisyamsyafa2@gmail.com</a></li>
            <li><strong>WhatsApp:</strong> <a href="https://wa.me/6285227763718" class="text-blue-600 dark:text-blue-400 hover:underline">+62 852 2776 3718</a></li>
            <li><strong>LinkedIn:</strong> <a href="https://linkedin.com/in/hisyam-syafa-raditya" class="text-blue-600 dark:text-blue-400 hover:underline" target="_blank">LinkedIn</a></li>
            <li><strong>GitHub:</strong> <a href="https://github.com/hisyamssyr" class="text-blue-600 dark:text-blue-400 hover:underline" target="_blank">GitHub</a></li>
            <li><strong>Instagram:</strong> <a href="https://instagram.com/hisyamssyr" class="text-blue-600 dark:text-blue-400 hover:underline" target="_blank">Instagram</a></li>
        </ul>
    </x-info-card>
</div>
@endsection
