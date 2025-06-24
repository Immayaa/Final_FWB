@extends('user.master')

@section('title', 'Detail Menu')

@section('content')

{{-- {{ dd(session()->all()) }} --}}

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">

    {{-- Pesan Success --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan Error Umum --}}
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validasi Form --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:flex-row gap-6">
        <!-- Gambar -->
        <div class="md:w-1/2">
            @if ($menu->image)
                <img src="{{ $menu->image }}" alt="{{ $menu->name }}" class="rounded-xl w-full h-64 object-cover">
            @else
                <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400 rounded-xl">
                    Tidak Ada Gambar
                </div>
            @endif
        </div>

        <!-- Info Menu -->
        <div class="md:w-1/2">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $menu->name }}</h2>
            <p class="text-sm text-gray-600 mb-4">{{ $menu->description ?? 'Tidak ada deskripsi.' }}</p>

            <p class="mb-2"><strong>Kategori:</strong> {{ ucfirst($menu->category->name ?? '-') }}</p>
            <p class="mb-2"><strong>Harga:</strong> Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
            <p class="mb-4"><strong>Stok:</strong> {{ $menu->stock }} tersedia</p>

            <form action="{{ route('user.menu.order', $menu->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pesanan</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="{{ $menu->stock }}"
                           class="w-full border rounded-lg px-4 py-2 text-sm focus:ring-orange-400 focus:outline-none"
                           required>
                </div>
                <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-xl shadow-md transition">
                    Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
