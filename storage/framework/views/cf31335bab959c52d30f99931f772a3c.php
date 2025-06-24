

<?php $__env->startSection('title', 'Riwayat Pesanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Riwayat Pesanan Anda</h2>

    
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

    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-6 bg-white shadow rounded-xl p-5 border border-gray-200">
            <div class="mb-2 text-gray-700">
                <span class="font-semibold">Tanggal Pesanan:</span> <?php echo e($order->created_at->format('d M Y, H:i')); ?><br>
                <span class="font-semibold">Status:</span> 
                <span class="uppercase px-2 py-1 rounded bg-gray-100 text-sm"><?php echo e($order->status); ?></span><br>
                <span class="font-semibold">Total:</span> Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?>

            </div>

            <div class="mt-3">
                <p class="font-semibold mb-1 text-gray-600">Item Pesanan:</p>
                <ul class="list-disc list-inside text-sm text-gray-700">
                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <?php echo e($item->menu->name ?? 'Menu tidak tersedia'); ?> - 
                            <?php echo e($item->quantity); ?> x Rp<?php echo e(number_format($item->price, 0, ',', '.')); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            
            <?php if($order->status === 'pending'): ?>
                <form action="<?php echo e(route('user.riwayat.batal', $order->id)); ?>" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-4 rounded">
                        Batalkan Pesanan
                    </button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500 text-sm">Belum ada riwayat pesanan.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\siwarmak\resources\views/user/riwayat.blade.php ENDPATH**/ ?>