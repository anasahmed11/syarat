<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div>

            <div class="row">
                <div class="col-md-12 ">
                    <div class="small-box bg-red ">
                        <div class="inner ">
                            <h2>Sorry !! </h2> <br>
                            <h3>you dont have permission to visit this page</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-close"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {


        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syarat\resources\views/admin/pages/404.blade.php ENDPATH**/ ?>