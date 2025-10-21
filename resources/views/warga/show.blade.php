<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Data Warga
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ $warga->nama }}</h3>
                <div class="space-y-2">
                    <p><strong>NIK:</strong> {{ $warga->nik }}</p>
                    <p><strong>No KK:</strong> {{ $warga->no_kk }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</p>
                    <p><strong>Alamat:</strong> {{ $warga->alamat }}</p>
                    <p><strong>Status Rumah:</strong> {{ $warga->status_rumah }}</p>
                    <p><strong>No HP:</strong> {{ $warga->no_hp }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('warga.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
