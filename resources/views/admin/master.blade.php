<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin | Warung Makan')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg">
      <div class="p-6 bg-orange-500 text-white text-center font-bold text-xl">
        <i class="fas fa-utensils mr-2"></i>Admin Panel
      </div>
      <nav class="mt-4">
        <ul class="space-y-2 px-4">
          <li><a href="{{route('admin.dashboard')}}" class="block px-4 py-2 rounded hover:bg-orange-100"><i class="fas fa-home mr-2"></i> Dashboard</a></li>
          <li><a href="{{route('user.index')}}" class="block px-4 py-2 rounded hover:bg-orange-100"><i class="fas fa-users-cog mr-2"></i> Manajemen User</a></li>
          <li><a href="{{route('menu.index')}}" class="block px-4 py-2 rounded hover:bg-orange-100"><i class="fas fa-utensil-spoon mr-2"></i> Menu Makanan</a></li>
          <li><a href="{{route('orders.index')}}" class="block px-4 py-2 rounded hover:bg-orange-100"><i class="fas fa-clipboard-list mr-2"></i> Pesanan</a></li>
          <li><a href="{{route('admin.profile')}}" class="block px-4 py-2 rounded hover:bg-orange-100"><i class="fas fa-cogs mr-2"></i> Pengaturan</a></li>
          <li><a href="/logout" class="block px-4 py-2 rounded hover:bg-red-100 text-red-600"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 p-6">
      <div class="mb-6 border-b pb-4">
        <h1 class="text-2xl font-semibold">@yield('page_title', 'Dashboard')</h1>
      </div>
      @yield('content')
    </main>
  </div>

</body>
</html>
