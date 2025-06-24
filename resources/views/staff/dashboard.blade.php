@extends('staff.master')

@section('title', 'Dashboard Staff')

@section('content')
<div class="space-y-6">

    {{-- Header Selamat Datang --}}
    <div class="bg-gradient-to-r from-yellow-400 via-orange-400 to-orange-500 text-white p-6 rounded-xl shadow flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-1">Selamat Datang, {{ Auth::user()->name }} 👋</h1>
            <p class="text-sm text-white">Kelola pesanan dengan mudah dan pantau status pesanan pelanggan.</p>
        </div>
        <i class="fas fa-utensils text-5xl opacity-20"></i>
    </div>

    {{-- Statistik Pesanan --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-yellow-100 rounded-xl p-5 shadow hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-sm text-yellow-700">Pesanan Pending</h2>
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <p class="text-3xl font-bold text-yellow-600">{{ $pending }}</p>
        </div>

        <div class="bg-blue-100 rounded-xl p-5 shadow hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-sm text-blue-700">Sedang Diproses</h2>
                <i class="fas fa-spinner text-blue-600 text-xl animate-spin"></i>
            </div>
            <p class="text-3xl font-bold text-blue-600">{{ $processing }}</p>
        </div>

        <div class="bg-green-100 rounded-xl p-5 shadow hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-sm text-green-700">Siap Diambil</h2>
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <p class="text-3xl font-bold text-green-600">{{ $ready }}</p>
        </div>

        <div class="bg-gray-100 rounded-xl p-5 shadow hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-sm text-gray-700">Selesai</h2>
                <i class="fas fa-box-open text-gray-600 text-xl"></i>
            </div>
            <p class="text-3xl font-bold text-gray-600">{{ $completed }}</p>
        </div>
    </div>

    {{-- Informasi Tambahan (Filler) --}}
    <div class="bg-white rounded-xl shadow p-6 border border-orange-100">
        <h3 class="text-lg font-semibold text-orange-600 mb-4 flex items-center gap-2">
            <i class="fas fa-info-circle text-orange-500"></i> Ringkasan Aktivitas Hari Ini
        </h3>
        <ul class="text-sm text-gray-700 space-y-2">
            <li>📦 Terdapat <span class="font-semibold text-orange-600">{{ $pending + $processing + $ready + $completed }}</span> total pesanan aktif hari ini.</li>
            <li>✅ Sebanyak <span class="font-semibold text-green-600">{{ $completed }}</span> pesanan telah diselesaikan.</li>
            <li>🕒 <span class="text-yellow-500 font-semibold">{{ $pending }}</span> pesanan masih menunggu konfirmasi.</li>
            <li>📊 Pantau terus pesanan yang sedang <span class="text-blue-500 font-semibold">diproses</span>.</li>
        </ul>
    </div>

</div>
@endsection
