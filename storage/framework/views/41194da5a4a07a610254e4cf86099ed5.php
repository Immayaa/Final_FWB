<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff | <?php echo $__env->yieldContent('title'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 text-lg font-bold text-orange-500 border-b">Staff Panel</div>
            <nav class="p-4 space-y-2">
                <a href="<?php echo e(route('staff.dashboard')); ?>" class="block text-gray-700 hover:text-orange-500">Dashboard</a>
                <a href="<?php echo e(route('staff.orders')); ?>" class="block text-gray-700 hover:text-orange-500">Kelola Pesanan</a>
                <a href="<?php echo e(route('staff.profile.edit')); ?>" class="block text-gray-700 hover:text-orange-500">Profile Staff</a>
                <a href="<?php echo e(route('logout')); ?>" class="block text-red-600 hover:text-red-800">Logout</a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\siwarmak\resources\views/staff/master.blade.php ENDPATH**/ ?>