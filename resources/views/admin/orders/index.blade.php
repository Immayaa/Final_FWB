@extends('admin.master')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-xl font-semibold mb-4">Manajemen Pesanan</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Metode Ambil</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Bayar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $order->id }}</td>
                    <td class="px-4 py-2">{{ $order->user->name ?? 'Guest' }}</td>
                    <td class="px-4 py-2 capitalize">{{ $order->pickup_method }}</td>
                    <td class="px-4 py-2 capitalize">{{ $order->status }}</td>
                    <td class="px-4 py-2">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $order->is_paid ? '✔️' : '❌' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-4 text-center text-gray-500">Belum ada pesanan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
