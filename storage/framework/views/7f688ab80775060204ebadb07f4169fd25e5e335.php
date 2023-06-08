
<?php $__env->startSection('content'); ?>
    <!-- Project Area Start -->
    <div class="gallery_area clearfix">
        <div class="container-fluid clearfix">
            <div class="gallery_menu">
                <div class="portfolio-menu">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="active btn" type="button" data-filter=".<?php echo e($row->name); ?>"><?php echo e($row->name); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="row portfolio-column">

                <!-- Single Item -->
                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 column_single_gallery_item All <?php echo e($row->category ? $row->category->name : ''); ?>">
                        <img src='<?php echo e(asset("$row->photo")); ?>' loading="lazy" alt="">
                        <div class="hover_overlay">
                            <a class="gallery_img" href="<?php echo e(asset("$row->photo")); ?>"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php echo e($photos->links()); ?>


        <!--<div class="row">
                <div class="col-12 text-center mt-70">
                    <a href="#" class="btn studio-btn"><img src="img/core-img/logo-icon.png" alt=""> Load More</a>
                </div>
            </div>-->
        </div>
    </div>
    <!-- Project Area End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hossam-ghozal\resources\views/portfolio.blade.php ENDPATH**/ ?>