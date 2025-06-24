@extends('staff.master')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold text-slate-700 mb-4">Kelola Pesanan</h2>

    @foreach ($groupedOrders as $status => $orders)
        <div class="mb-6">
            <h3 class="text-xl font-semibold capitalize text-orange-600 mb-2">{{ $status }} ({{ $orders->count() }})</h3>
            <div class="bg-white rounded-xl shadow p-4">
                @forelse ($orders as $order)
                    <div class="border-b border-gray-200 py-3">
                        <p><strong>Pesanan ID:</strong> {{ $order->id }}</p>

                        
                        @foreach ($order->orderItems as $item)
                            <p><strong>Nama Makanan : </strong>{{ $item->menu->name ?? '-' }} (x{{ $item->quantity }})</p>
                        @endforeach
                        

                        <p><strong>User:</strong> {{ $order->user->name ?? '-' }}</p>
                        <p><strong>Total:</strong> Rp{{ number_format($order->total_amount, 0, ',', '.') }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) }} | <strong>Dibayar:</strong> {{ $order->is_paid ? 'Ya' : 'Belum' }}</p>

                        <form action="{{ route('staff.orders.update', $order->id) }}" method="POST" class="mt-2 grid grid-cols-1 md:grid-cols-4 gap-2">
                            @csrf
                            <select name="status" class="border rounded-lg px-3 py-2">
                                @foreach(['pending', 'processing', 'ready', 'completed', 'cancelled'] as $opt)
                                    <option value="{{ $opt }}" {{ $order->status == $opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
                                @endforeach
                            </select>

                            <input type="number" name="total_amount" class="border rounded-lg px-3 py-2" value="{{ $order->total_amount }}" step="0.01" min="0">

                            <select name="is_paid" class="border rounded-lg px-3 py-2">
                                <option value="1" {{ $order->is_paid ? 'selected' : '' }}>Sudah Dibayar</option>
                                <option value="0" {{ !$order->is_paid ? 'selected' : '' }}>Belum Dibayar</option>
                            </select>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Simpan
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada pesanan dalam status ini.</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
@endsection
