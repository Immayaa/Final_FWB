

<?php $__env->startSection('title', 'Edit Menu'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Menu: <?php echo e($menu->name); ?></h2>

    
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('menu.update', $menu->id)); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>

        <!-- Nama Menu -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Menu</label>
            <input type="text" name="name" id="name" value="<?php echo e(old('name', $menu->name)); ?>" class="w-full border rounded-md px-4 py-2" required>
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded-md px-4 py-2"><?php echo e(old('description', $menu->description)); ?></textarea>
        </div>

        <!-- Harga -->
        <div>
            <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Harga</label>
            <input type="number" name="price" id="price" step="0.01" value="<?php echo e(old('price', $menu->price)); ?>" class="w-full border rounded-md px-4 py-2" required>
        </div>

        <!-- Link Gambar -->
        <div>
            <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Link Gambar Menu (URL)</label>
            <input type="url" name="image" id="image" value="<?php echo e(old('image', $menu->image)); ?>" class="w-full border rounded-md px-4 py-2" placeholder="https://example.com/image.jpg">
            <?php if($menu->image): ?>
                <div class="mt-2">
                    <img src="<?php echo e($menu->image); ?>" alt="Preview" class="h-32 rounded shadow-md">
                </div>
            <?php endif; ?>
        </div>

        <!-- Stok -->
        <div>
            <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
            <input type="number" name="stock" id="stock" value="<?php echo e(old('stock', $menu->stock)); ?>" class="w-full border rounded-md px-4 py-2" required>
        </div>

        <!-- Kategori -->
        <div>
            <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
            <select name="category_id" id="category_id" class="w-full border rounded-md px-4 py-2" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e($menu->category_id == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Status Ketersediaan -->
        <div class="flex items-center">
            <input type="checkbox" name="is_available" id="is_available" class="mr-2"
                   <?php echo e($menu->is_available ? 'checked' : ''); ?>>
            <label for="is_available" class="text-sm text-gray-700">Tersedia untuk dipesan</label>
        </div>

        <!-- Tombol Submit -->
        <div class="text-right">
            <a href="/admin/menu" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\siwarmak\resources\views/admin/menu/edit.blade.php ENDPATH**/ ?>