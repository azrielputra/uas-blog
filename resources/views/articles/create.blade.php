<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Artikel Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf

                        <div class="mb-6 p-4 bg-yellow-100 border border-yellow-400 rounded">
                            <p class="mb-2 font-bold text-yellow-800">Klik tombol ini untuk menyimpan:</p>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-4 rounded shadow-lg uppercase tracking-wider">
                                SIMPAN ARTIKEL SEKARANG
                            </button>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel</label>
                            <input type="text" name="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Penulis</label>
                            <input type="text" name="penulis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Publikasi</label>
                            <input type="date" name="tanggal_publikasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Isi Artikel</label>
                            <textarea name="isi" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Tulis konten di sini..." required></textarea>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>