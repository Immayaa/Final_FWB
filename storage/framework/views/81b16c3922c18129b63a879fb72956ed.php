

<?php $__env->startSection('content'); ?>
<main class="p-6 bg-gray-50 min-h-screen">
  <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Profil Admin</h2>

    <?php if(session('success')): ?>
      <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
        <?php echo e(session('success')); ?>

      </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" class="space-y-4">
      <?php echo csrf_field(); ?>

      <!-- Nama -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>" required
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-orange-300" />
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-sm text-red-600"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>" required
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-orange-300" />
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-sm text-red-600"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
        <input type="password" name="password" id="password"
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-orange-300" />
        <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengganti password.</p>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-sm text-red-600"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <!-- Konfirmasi Password -->
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-orange-300" />
      </div>

      <div class="text-right">
        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-2 rounded-lg">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\siwarmak\resources\views/admin/profile.blade.php ENDPATH**/ ?>