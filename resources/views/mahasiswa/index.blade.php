<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('mahasiswa.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Tambah Data Mahasiswa
                        </a>
                    </div>

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border-b px-4 py-2">NIM</th>
                                <th class="border-b px-4 py-2">Nama</th>
                                <th class="border-b px-4 py-2">Program Studi</th>
                                <th class="border-b px-4 py-2">Email</th>
                                <th class="border-b px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mahasiswa as $mhs)
                                <tr>
                                    <td class="border-b px-4 py-2">{{ $mhs->nim }}</td>
                                    <td class="border-b px-4 py-2">{{ $mhs->nama }}</td>
                                    <td class="border-b px-4 py-2">{{ $mhs->program_studi }}</td>
                                    <td class="border-b px-4 py-2">{{ $mhs->email }}</td>
                                    <td class="border-b px-4 py-2 text-center">
                                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="text-blue-600 hover:underline mr-2">Detail/Edit</a>
                                        
                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border-b px-4 py-2 text-center text-gray-500">Tidak ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>