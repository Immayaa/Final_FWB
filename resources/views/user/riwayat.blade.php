@extends('user.master')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Riwayat Pesanan Anda</h2>

    {{-- Pesan Flash --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            {{ session('error') }}
        </div>
    @endif

    @forelse ($orders as $order)
        <div class="mb-6 bg-white shadow rounded-xl p-5 border border-gray-200">
            <div class="mb-2 text-gray-700">
                <span class="font-semibold">Tanggal Pesanan:</span> {{ $order->created_at->format('d M Y, H:i') }}<br>
                <span class="font-semibold">Status:</span> 
                <span class="uppercase px-2 py-1 rounded bg-gray-100 text-sm">{{ $order->status }}</span><br>
                <span class="font-semibold">Total:</span> Rp{{ number_format($order->total_amount, 0, ',', '.') }}
            </div>

            <div class="mt-3">
                <p class="font-semibold mb-1 text-gray-600">Item Pesanan:</p>
                <ul class="list-disc list-inside text-sm text-gray-700">
                    @foreach ($order->orderItems as $item)
                        <li>
                            {{ $item->menu->name ?? 'Menu tidak tersedia' }} - 
                            {{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Tombol Batalkan jika status masih pending --}}
            @if ($order->status === 'pending')
                <form action="{{ route('user.riwayat.batal', $order->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-4 rounded">
                        Batalkan Pesanan
                    </button>
                </form>
            @endif
        </div>
    @empty
        <p class="text-gray-500 text-sm">Belum ada riwayat pesanan.</p>
    @endforelse
</div>
@endsection
