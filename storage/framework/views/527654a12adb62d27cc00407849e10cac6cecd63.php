<aside class="main-sidebar <?php echo e(config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4')); ?>">

    
    <?php if(config('adminlte.logo_img_xl')): ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xl', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column <?php echo e(config('adminlte.classes_sidebar_nav', '')); ?>"
                data-widget="treeview" role="menu"
                <?php if(config('adminlte.sidebar_nav_animation_speed') != 300): ?>
                    data-animation-speed="<?php echo e(config('adminlte.sidebar_nav_animation_speed')); ?>"
                <?php endif; ?>
                <?php if(!config('adminlte.sidebar_nav_accordion')): ?>
                    data-accordion="false"
                <?php endif; ?>>
                
                <?php if(Auth::user()->type==1): ?>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' || request()->route()->getName() === 'departments' ?'active' : ''); ?>"
                           href="<?php echo e(route('departments')); ?>">
                            <i class="fas fa-home "></i>

                            <p>
                                Departments
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'employees' ?'active' : ''); ?>"
                           href="<?php echo e(route('employees')); ?>">
                            <i class="fas fa-fw fa-users "></i>

                            <p>
                                employees
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'tasks' ?'active' : ''); ?>"
                           href="<?php echo e(route('tasks')); ?>">
                            <i class="fas fa-fw fa-tasks "></i>

                            <p>
                                tasks
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth::user()->type==2): ?>
                    <li class="nav-item">
                        <a class="nav-link  active"
                           href="<?php echo e(route('tasks')); ?>">
                            <i class="fas fa-fw fa-tasks "></i>

                            <p>
                                tasks
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

</aside>
<?php /**PATH C:\xampp\htdocs\syarat\resources\views/vendor/adminlte/partials/sidebar/left-sidebar.blade.php ENDPATH**/ ?>