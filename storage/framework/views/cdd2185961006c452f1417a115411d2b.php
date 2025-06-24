

<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
<main class="p-6 bg-sky-50 min-h-screen">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Edit User</h2>

        <?php if(session('success')): ?>
            <div class="mb-4 text-sm text-green-700 bg-green-100 px-4 py-2 rounded-xl">
                <i class="fas fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('user.update',$user->id)); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name" class="block text-sm font-semibold mb-1 text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>"
                    class="w-full border rounded-xl px-4 py-2 focus:ring focus:ring-green-400" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold mb-1 text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>"
                    class="w-full border rounded-xl px-4 py-2 focus:ring focus:ring-green-400" required>
            </div>

            <div>
                <label for="role" class="block text-sm font-semibold mb-1 text-gray-700">Role</label>
                <select name="role" id="role"
                    class="w-full border rounded-xl px-4 py-2 focus:ring focus:ring-green-400" required>
                    <option value="user" <?php echo e($user->role === 'user' ? 'selected' : ''); ?>>User</option>
                    <option value="staff" <?php echo e($user->role === 'staff' ? 'selected' : ''); ?>>Staff</option>
                </select>
            </div>

            <div class="flex justify-between mt-6">
                <a href="<?php echo e(route('user.index')); ?>"
                    class="inline-block px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit"
                    class="inline-block px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\siwarmak\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>