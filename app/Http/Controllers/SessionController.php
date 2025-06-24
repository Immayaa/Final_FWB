<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;


class SessionController extends Controller
{
    //Function untuk admin
   public function adminDashboard()
   {
    $users = User::where('status', 'active')->count();
    $menus = Menu::where('is_available', true)->count();
    $orders = Order::where('status', '!=', 'cancelled')->count();
    $pending = Order::where('status', 'pending')->count();
    $processing = Order::where('status', 'processing')->count();
    $ready = Order::where('status', 'ready')->count();
    $completed = Order::where('status', 'completed')->count();
    return view('admin.dashboard', compact('users', 'menus', 'orders', 'pending', 'processing', 'ready', 'completed'));
   }

   //nomor 6
   public function indexUser()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.user.index', compact('users'));
    }

    // Tampilkan form edit
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Update data user
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,staff',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ]);

        return redirect()->back()->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }

    // Aktifkan user
    public function activateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diaktifkan.');
    }

    // Nonaktifkan user
    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();

        return redirect()->back()->with('success', 'User berhasil dinonaktifkan.');
    }

    public function indexMenu()
    {
        $menus = Menu::with('category')->get();
        return view('admin.menu.index', compact('menus'));
    }

    public function createMenu()
    {
        $categories = Category::all();
        return view('admin.menu.create', compact('categories'));
    }

   public function storeMenu(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|url',
    ]);

    $menu = new Menu();
    $menu->name = $validated['name'];
    $menu->description = $validated['description'] ?? null;
    $menu->price = $validated['price'];
    $menu->stock = $validated['stock'];
    $menu->category_id = $validated['category_id'];
    $menu->image = $validated['image'] ?? null;
    $menu->is_available = $request->has('is_available'); // true jika dicentang

    $menu->save();

    return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
}

    public function editMenu($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Category::all();
        return view('admin.menu.edit', compact('menu', 'categories'));
    }

    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|url|max:255',
        ]);

        $menu->name = $validated['name'];
        $menu->description = $validated['description'] ?? null;
        $menu->price = $validated['price'];
        $menu->stock = $validated['stock'];
        $menu->category_id = $validated['category_id'];
        $menu->image = $validated['image'] ?? null;
        $menu->is_available = $request->has('is_available');

        $menu->save();

        return redirect()->back()->with('success', 'Menu berhasil diperbarui.');
    }


    public function destroyMenu($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }


    //Function untuk order
    public function indexOrder()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Order::with(['user', 'orderItems.menu'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatusOrder(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,ready,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan diperbarui.');
    }

    //Function untuk profile admin
    public function editProfile()
{
    $user = Auth::user(); // ambil data user yang login
    return view('admin.profile', compact('user'));
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
}

    
   

   




























   //Function untuk staff
   public function staffDashboard()
    {
        $pending = Order::where('status', 'pending')->count();
        $processing = Order::where('status', 'processing')->count();
        $ready = Order::where('status', 'ready')->count();
        $completed = Order::where('status', 'completed')->count();

        return view('staff.dashboard', compact('pending', 'processing', 'ready', 'completed'));
    }

    public function manageOrders()
    {
        $orders = Order::with('orderItems.menu', 'user')->latest()->get();

        $groupedOrders = [
            'pending' => $orders->where('status', 'pending'),
            'processing' => $orders->where('status', 'processing'),
            'ready' => $orders->where('status', 'ready'),
            'completed' => $orders->where('status', 'completed'),
        ];

        return view('staff.orders.index', compact('groupedOrders'));
    }


    public function updateOrder(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,ready,completed,cancelled',
            'total_amount' => 'required|numeric|min:0',
            'is_paid' => 'required|boolean',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->total_amount = $request->total_amount;
        $order->is_paid = $request->is_paid;
        $order->save();

        return redirect()->route('staff.orders')->with('success', 'Pesanan berhasil diperbarui.');
    }


    public function editStaffProfile()
{
    $user = Auth::user(); // Ambil staff yang sedang login
    return view('staff.profile.edit', compact('user'));
}

public function updateStaffProfile(Request $request)
{
    $user = Auth::user();

    // Validasi input
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    // Update profil
    $user->name = $request->name;
    $user->email = $request->email;

    // Jika password diisi, update
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
}
















   //function untuk user
   public function userDashboard()
    {
        $menus = Menu::with('category')->where('is_available', true)->get();
        return view('user.dashboard', compact('menus'));
    }

    public function detailMenu($id)
{
    $menu = Menu::with('category')->findOrFail($id);
    return view('user.detail', compact('menu'));
}

public function orderMenu(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // Validasi input jumlah pesanan
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $menu->stock,
        ]);

        $quantity = $request->quantity;
        $userId = Auth::id(); // Ambil ID user yang sedang login

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Hitung total harga
        $total = $menu->price * $quantity;

        // nomor 4
        // Jalankan dalam transaksi database
        DB::beginTransaction();
        try {
            // Buat entri order baru
            $order = Order::create([
                'user_id' => $userId,
                'status' => 'pending',
                'pickup_method' => 'dine_in', // default atau bisa dibuat pilihan nanti
                'payment_method' => null,
                'total_amount' => $total,
                'is_paid' => false,
            ]);

            // Tambah detail item yang dipesan
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => $quantity,
                'price' => $menu->price,
            ]);

            // Kurangi stok
            $menu->decrement('stock', $quantity);

            DB::commit();

            return redirect()->route('user.dashboard')->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function riwayatPesanan()
    {
        $userId = Auth::id();

        $orders = Order::with(['orderItems.menu']) // ambil item dan info menu
                    ->where('user_id', $userId)
                    ->latest()
                    ->get();

        return view('user.riwayat', compact('orders'));
    }

    public function batalkanPesanan($id)
    {
        $userId = Auth::id();
        $order = Order::with('orderItems')->where('user_id', $userId)->findOrFail($id);

        // Hanya bisa dibatalkan jika masih pending
        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan tidak dapat dibatalkan.');
        }

        DB::beginTransaction();
        try {
            // Kembalikan stok menu
            foreach ($order->orderItems as $item) {
                $item->menu->increment('stock', $item->quantity);
            }

            // Update status jadi cancelled
            $order->status = 'cancelled';
            $order->save();

            DB::commit();
            return back()->with('success', 'Pesanan berhasil dibatalkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membatalkan pesanan.');
        }
    }

    public function editProfil()
{
    $user = auth()->user();
    return view('user.edit_profile', compact('user'));
}
// nomor 8
public function updateProfil(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('user.profil.edit')->with('success', 'Profil berhasil diperbarui.');
}





    





   //Function untuk logout
   public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

}
