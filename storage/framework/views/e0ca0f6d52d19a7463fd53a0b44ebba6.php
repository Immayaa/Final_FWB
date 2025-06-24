

<?php $__env->startSection('title', 'Detail Menu'); ?>

<?php $__env->startSection('content'); ?>



<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <?php if(session('error')): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            <ul class="list-disc list-inside text-sm">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="flex flex-col md:flex-row gap-6">
        <!-- Gambar -->
        <div class="md:w-1/2">
            <?php if($menu->image): ?>
                <img src="<?php echo e($menu->image); ?>" alt="<?php echo e($menu->name); ?>" class="rounded-xl w-full h-64 object-cover">
            <?php else: ?>
                <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400 rounded-xl">
                    Tidak Ada Gambar
                </div>
            <?php endif; ?>
        </div>

        <!-- Info Menu -->
        <div class="md:w-1/2">
            <h2 class="text-2xl font-bold text-gray-800 mb-2"><?php echo e($menu->name); ?></h2>
            <p class="text-sm text-gray-600 mb-4"><?php echo e($menu->description ?? 'Tidak ada deskripsi.'); ?></p>

            <p class="mb-2"><strong>Kategori:</strong> <?php echo e(ucfirst($menu->category->name ?? '-')); ?></p>
            <p class="mb-2"><strong>Harga:</strong> Rp<?php echo e(number_format($menu->price, 0, ',', '.')); ?></p>
            <p class="mb-4"><strong>Stok:</strong> <?php echo e($menu->stock); ?> tersedia</p>

            <form action="<?php echo e(route('user.menu.order', $menu->id)); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pesanan</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="<?php echo e($menu->stock); ?>"
                           class="w-full border rounded-lg px-4 py-2 text-sm focus:ring-orange-400 focus:outline-none"
                           required>
                </div>
                <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-xl shadow-md transition">
                    Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\siwarmak\resources\views/user/detail.blade.php ENDPATH**/ ?>