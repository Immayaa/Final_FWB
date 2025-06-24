@extends('user.master')

@section('title', 'Dashboard')

@section('content')
  <h2 class="text-2xl font-semibold text-orange-600 mb-6">Menu Tersedia</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($menus as $menu)
      <a href="{{ route('user.menu.detail', $menu->id) }}" class="block">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition hover:scale-105 duration-200">
          @if ($menu->image)
            <img src="{{ $menu->image }}" alt="{{ $menu->name }}" class="h-40 w-full object-cover">
          @else
            <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-400">Tidak Ada Gambar</div>
          @endif

          <div class="p-4">
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $menu->name }}</h3>
            <p class="text-sm text-gray-600 mb-3">{{ $menu->description ?? 'Tidak ada deskripsi.' }}</p>
            <div class="flex justify-between items-center">
              <span class="text-orange-600 font-bold">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
              <span class="text-sm text-gray-500">{{ ucfirst($menu->category->name ?? '-') }}</span>
            </div>
          </div>
        </div>
      </a>
    @endforeach
  </div>
@endsection
