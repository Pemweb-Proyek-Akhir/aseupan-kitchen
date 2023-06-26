<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Admin\'s Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <style>
        .menu-button {
            display: block;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .menu-button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php echo e(__("Selamat datang di Dashboard Admin!")); ?>

                </div>
                <div class="menu-container">
                    <a href="<?php echo e(route('admin.index')); ?>" class="menu-button">Manage Products</a>
                    <a href="<?php echo e(route('admin.create')); ?>" class="menu-button">Create Product</a>
                    <a href="<?php echo e(route('admin.orders')); ?>" class="menu-button">Manage Orders</a>
                    <a href="<?php echo e(route('admin.users')); ?>" class="menu-button">Manage Users</a>
                    <!-- Add more menu items as needed -->
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/Perkuliahan/aseupan-kitchen/resources/views/dashboardAdmin.blade.php ENDPATH**/ ?>