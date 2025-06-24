

<?php $__env->startSection('title', 'Kelola Pesanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <h2 class="text-2xl font-bold text-slate-700 mb-4">Kelola Pesanan</h2>

    <?php $__currentLoopData = $groupedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-6">
            <h3 class="text-xl font-semibold capitalize text-orange-600 mb-2"><?php echo e($status); ?> (<?php echo e($orders->count()); ?>)</h3>
            <div class="bg-white rounded-xl shadow p-4">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="border-b border-gray-200 py-3">
                        <p><strong>Pesanan ID:</strong> <?php echo e($order->id); ?></p>

                        
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><strong>Nama Makanan : </strong><?php echo e($item->menu->name ?? '-'); ?> (x<?php echo e($item->quantity); ?>)</p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        

                        <p><strong>User:</strong> <?php echo e($order->user->name ?? '-'); ?></p>
                        <p><strong>Total:</strong> Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></p>
                        <p><strong>Status:</strong> <?php echo e(ucfirst($order->status)); ?> | <strong>Dibayar:</strong> <?php echo e($order->is_paid ? 'Ya' : 'Belum'); ?></p>

                        <form action="<?php echo e(route('staff.orders.update', $order->id)); ?>" method="POST" class="mt-2 grid grid-cols-1 md:grid-cols-4 gap-2">
                            <?php echo csrf_field(); ?>
                            <select name="status" class="border rounded-lg px-3 py-2">
                                <?php $__currentLoopData = ['pending', 'processing', 'ready', 'completed', 'cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($opt); ?>" <?php echo e($order->status == $opt ? 'selected' : ''); ?>><?php echo e(ucfirst($opt)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <input type="number" name="total_amount" class="border rounded-lg px-3 py-2" value="<?php echo e($order->total_amount); ?>" step="0.01" min="0">

                            <select name="is_paid" class="border rounded-lg px-3 py-2">
                                <option value="1" <?php echo e($order->is_paid ? 'selected' : ''); ?>>Sudah Dibayar</option>
                                <option value="0" <?php echo e(!$order->is_paid ? 'selected' : ''); ?>>Belum Dibayar</option>
                            </select>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Simpan
                            </button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500">Tidak ada pesanan dalam status ini.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\siwarmak\resources\views/staff/orders/index.blade.php ENDPATH**/ ?>