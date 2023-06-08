<?php $__env->startSection('content'); ?>
    <!-- About Me Area Start -->

    <section class="about-me-area mt-100 section_padding_100">
        <div class="container">
            <div class="row ">
                <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4" style="text-align: center" >
                        <a href="<?php echo e(route('album-images',[$row->id])); ?>">
                            <div class="about-me-thumb album-image" >
                                <img src='<?php echo e(asset("$row->front_image")); ?>' loading="lazy" alt="" height="100%" width="100%" class="img-bottom"><br>
                                <img src='<?php echo e(asset("$row->back_image")); ?>' loading="lazy" alt="" height="100%" width="100%"
                                     class="img-top"><br>
                            </div>
                        </a>
                        <a href="<?php echo e(route('album-images',[$row->id])); ?>">
                            <div  >
                                <h2><?php echo e($row->name); ?> </h2>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <br><br>
            <?php echo e($albums->links()); ?>

        </div>
    </section>
    <!-- About Me Area End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\nagy\resources\views/albums.blade.php ENDPATH**/ ?>