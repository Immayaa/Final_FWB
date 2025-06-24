

<?php $__env->startSection('title', 'Dashboard Admin'); ?>
<?php $__env->startSection('page_title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

  <!-- Jumlah User -->
  <div class="bg-white p-5 rounded-2xl shadow flex items-center space-x-4">
    <div class="bg-blue-100 text-blue-600 rounded-full p-3">
      <i class="fas fa-users text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-500">Total Pengguna</p>
      <h3 class="text-xl font-bold"><?php echo e($users); ?></h3>
    </div>
  </div>

  <!-- Total Menu -->
  <div class="bg-white p-5 rounded-2xl shadow flex items-center space-x-4">
    <div class="bg-green-100 text-green-600 rounded-full p-3">
      <i class="fas fa-hamburger text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-500">Menu Aktif</p>
      <h3 class="text-xl font-bold"><?php echo e($menus); ?></h3>
    </div>
  </div>

  <!-- Total Pesanan -->
  <div class="bg-white p-5 rounded-2xl shadow flex items-center space-x-4">
    <div class="bg-yellow-100 text-yellow-600 rounded-full p-3">
      <i class="fas fa-receipt text-2xl"></i>
    </div>
    <div>
      <p class="text-sm text-gray-500">Pesanan Hari Ini</p>
      <h3 class="text-xl font-bold"><?php echo e($orders); ?></h3>
    </div>
  </div>

  <!-- Pendapatan -->
  

</div>

<!-- Grafik atau info tambahan -->
<div class="mt-10 bg-white p-6 rounded-2xl shadow">
  <h2 class="text-lg font-semibold mb-4">Ringkasan Aktivitas</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <p class="text-sm text-gray-600 mb-2">Status Pesanan</p>
      <ul class="space-y-2 text-sm">
        <li><i class="fas fa-hourglass-half text-yellow-500 mr-2"></i> Pending: <?php echo e($pending); ?></li>
        <li><i class="fas fa-spinner text-blue-500 mr-2"></i> Proses: <?php echo e($processing); ?></li>
        <li><i class="fas fa-check-circle text-green-500 mr-2"></i> Selesai: <?php echo e($completed); ?></li>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\siwarmak\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>