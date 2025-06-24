

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
  <h2 class="text-2xl font-semibold text-orange-600 mb-6">Menu Tersedia</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('user.menu.detail', $menu->id)); ?>" class="block">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition hover:scale-105 duration-200">
          <?php if($menu->image): ?>
            <img src="<?php echo e($menu->image); ?>" alt="<?php echo e($menu->name); ?>" class="h-40 w-full object-cover">
          <?php else: ?>
            <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-400">Tidak Ada Gambar</div>
          <?php endif; ?>

          <div class="p-4">
            <h3 class="text-lg font-bold text-gray-800 mb-2"><?php echo e($menu->name); ?></h3>
            <p class="text-sm text-gray-600 mb-3"><?php echo e($menu->description ?? 'Tidak ada deskripsi.'); ?></p>
            <div class="flex justify-between items-center">
              <span class="text-orange-600 font-bold">Rp<?php echo e(number_format($menu->price, 0, ',', '.')); ?></span>
              <span class="text-sm text-gray-500"><?php echo e(ucfirst($menu->category->name ?? '-')); ?></span>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\siwarmak\resources\views/user/dashboard.blade.php ENDPATH**/ ?>