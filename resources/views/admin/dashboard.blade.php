@extends('admin.master')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

  <!-- Jumlah User -->
  <div class="bg-white p-5 rounded-2xl shadow flex items-center space-x-4">
    <div class="bg-blue-100 text-blue-600 rounded-full p-3">
      <i class="fas fa-users text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-500">Total Pengguna</p>
      <h3 class="text-xl font-bold">{{$users}}</h3>
    </div>
  </div>

  <!-- Total Menu -->
  <div class="bg-white p-5 rounded-2xl shadow flex items-center space-x-4">
    <div class="bg-green-100 text-green-600 rounded-full p-3">
      <i class="fas fa-hamburger text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-500">Menu Aktif</p>
      <h3 class="text-xl font-bold">{{$menus}}</h3>
    </div>
  </div>

  <!-- Total Pesanan -->
  <div class="bg-white p-5 rounded-2xl shadow flex items-center space-x-4">
    <div class="bg-yellow-100 text-yellow-600 rounded-full p-3">
      <i class="fas fa-receipt text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-500">Pesanan Hari Ini</p>
      <h3 class="text-xl font-bold">{{$orders}}</h3>
    </div>
  </div>

  <!-- Pendapatan -->
  {{-- <div class="bg-white p-5 rounded-2xl shadow flex items-center space-x-4">
    <div class="bg-red-100 text-red-600 rounded-full p-3">
      <i class="fas fa-money-bill-wave text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-500">Pendapatan</p>
      <h3 class="text-xl font-bold">Rp 5.200.000</h3>
    </div>
  </div> --}}

</div>

<!-- Grafik atau info tambahan -->
<div class="mt-10 bg-white p-6 rounded-2xl shadow">
  <h2 class="text-lg font-semibold mb-4">Ringkasan Aktivitas</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <p class="text-sm text-gray-600 mb-2">Status Pesanan</p>
      <ul class="space-y-2 text-sm">
        <li><i class="fas fa-hourglass-half text-yellow-500 mr-2"></i> Pending: {{ $pending }}</li>
        <li><i class="fas fa-spinner text-blue-500 mr-2"></i> Proses: {{ $processing }}</li>
        <li><i class="fas fa-check-circle text-green-500 mr-2"></i> Selesai: {{ $completed }}</li>
      </ul>
    </div>
    <div>
      <p class="text-sm text-gray-600 mb-2">Kategori Terlaris</p>
      <ul class="space-y-2 text-sm">
        <li><i class="fas fa-fire text-orange-500 mr-2"></i> Makanan Berat: 120</li>
        <li><i class="fas fa-fire text-orange-500 mr-2"></i> Minuman: 95</li>
        <li><i class="fas fa-fire text-orange-500 mr-2"></i> Camilan: 72</li>
      </ul>
    </div>
  </div>
</div>
@endsection
