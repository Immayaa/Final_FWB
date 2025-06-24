

<?php $__env->startSection('title', 'Edit Profil'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700 flex items-center gap-2">
        <i class="fas fa-user-cog text-orange-500"></i> Edit Profil Staff
    </h2>

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside text-sm">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('staff.profile.update')); ?>" class="space-y-4">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-user text-gray-500 mr-1"></i> Nama Lengkap
            </label>
            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-orange-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-envelope text-gray-500 mr-1"></i> Email
            </label>
            <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-orange-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-lock text-gray-500 mr-1"></i> Password Baru (opsional)
            </label>
            <input type="password" name="password"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-orange-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-lock text-gray-500 mr-1"></i> Konfirmasi Password
            </label>
            <input type="password" name="password_confirmation"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-orange-500">
        </div>

        <div class="text-right">
            <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\siwarmak\resources\views/staff/profile/edit.blade.php ENDPATH**/ ?>