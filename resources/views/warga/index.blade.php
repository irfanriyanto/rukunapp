<x-app-layout>
    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row justify-between items-center mb-5 gap-3">
                <h3 class="text-2xl font-bold text-gray-900">Data Warga</h3>

                {{-- Search Bar --}}
                <form action="{{ route('warga.index') }}" method="GET" class="flex items-center space-x-2">
                    <input type="text" name="search" 
                           placeholder="Cari nama atau NIK..." 
                           value="{{ request('search') }}"
                           class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Cari
                        <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[name="search"]');
    searchInput.addEventListener('input', function () {
        if (this.value.trim() === '') {
            window.location.href = "{{ route('warga.index') }}";
        }
    });
});
</script>

                    </button>
                </form>
            </div>

            {{-- Tombol Tambah --}}
            <a href="{{ route('warga.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-3 inline-block">
               + Tambah Warga
            </a>

            {{-- Notifikasi --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabel --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden text-gray-900">
                    <thead>
                        <tr class="bg-gray-100 text-left font-semibold">
                            <th class="px-4 py-2 border border-gray-200">NAMA</th>
                            <th class="px-4 py-2 border border-gray-200">NIK</th>
                            <th class="px-4 py-2 border border-gray-200">NO KK</th>
                            <th class="px-4 py-2 border border-gray-200">JENIS KELAMIN</th>
                            <th class="px-4 py-2 border border-gray-200">ALAMAT</th>
                            <th class="px-4 py-2 border border-gray-200">STATUS RUMAH</th>
                            <th class="px-4 py-2 border border-gray-200">NO HP</th>
                            <th class="px-4 py-2 border border-gray-200"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($wargas as $w)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2 border border-gray-200">{{ $w->nama }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $w->nik }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $w->no_kk }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $w->jenis_kelamin }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $w->alamat }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $w->status_rumah }}</td>
                                <td class="px-4 py-2 border border-gray-200">{{ $w->no_hp }}</td>
                                <td class="px-4 py-2 border border-gray-200">
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('warga.show', $w->id) }}" 
                                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-center">
                                           Detail
                                        </a>
                                        <a href="{{ route('warga.edit', $w->id) }}" 
                                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-center">
                                           Edit
                                        </a>
                                        <form action="{{ route('warga.destroy', $w->id) }}" 
                                              method="POST" class="inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button onclick="return confirm('Hapus data ini?')" 
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded w-full">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-gray-500">
                                    Tidak ada data warga.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
