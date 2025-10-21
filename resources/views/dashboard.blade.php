<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-8 text-gray-900 text-center">

                {{-- Logo atau ikon sederhana --}}
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 4h16a2 2 0 002-2v-6a2 2 0 00-2-2h-1.5" />
                    </svg>
                </div>

                {{-- Judul dan tagline --}}
                <h1 class="text-3xl font-extrabold text-gray-800 mb-2">
                    Selamat Datang di <span class="text-blue-700">RukunApp</span> 👋
                </h1>
                <p class="text-gray-600 italic mb-6">
                    “RukunApp – Data Rapi, Warga Happy”
                </p>

                {{-- Deskripsi aplikasi --}}
                <p class="text-gray-700 leading-relaxed mb-6 max-w-2xl mx-auto">
                     RukunApp adalah sistem informasi warga berbasis web yang dirancang untuk membantu dalam 
                    mengelola data warga, mencatat keuangan, serta memantau berbagai kegiatan sosial seperti donasi warga, 
                    pos ronda, posyandu, kerja bakti dan administrasi surat menyurat secara efisien dan transparan. Semuanya dalam satu aplikasi terpadu.
                </p>

                {{-- Info login --}}
                <p class="text-gray-600 mb-8">
                    Anda berhasil login sebagai <strong>{{ Auth::user()->name }}</strong>.  
                    Gunakan menu di bawah ini untuk mengelola data warga dan kegiatan masyarakat.
                </p>

                {{-- Tombol aksi --}}
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('warga.index') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow-md transition">
                        🧾 Kelola Data Warga
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2.5 rounded-lg shadow-md transition">
                            🚪 Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
