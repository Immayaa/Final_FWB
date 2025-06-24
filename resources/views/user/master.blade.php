<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User | @yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-amber-50 min-h-screen text-gray-800">

  <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <h1 class="text-xl font-bold text-orange-600">Warung Makan</h1>
    <ul class="flex space-x-6 text-sm font-semibold">
      <li><a href="/userDashboard" class="hover:text-orange-500">Dashboard</a></li>
      <li><a href="{{route('user.riwayat')}}" class="hover:text-orange-500">Riwayat Pesanan</a></li>
      <li><a href="{{route('user.profil.edit')}}" class="hover:text-orange-500">Profil</a></li>
      <li><a href="/logout" class="text-red-500 hover:text-red-700">Logout</a></li>
    </ul>
  </nav>

  <main class="p-6">
    @yield('content')
  </main>

</body>
</html>
