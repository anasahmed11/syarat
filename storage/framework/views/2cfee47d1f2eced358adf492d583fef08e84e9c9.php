
<?php $__env->startSection('content'); ?>
    <section class="contact-area section_padding_100 mt-100">
        <div class="container">
            <div class="row justify-content-center">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-10">
                        <div class="contact-heading-text text-center mb-100">
                            <span></span>
                            <h2><?php echo e($row->title); ?></h2>
                            <p><?php echo e($row->article); ?></p>
                        </div>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Contact Form Area -->
                <div class="col-10">
                    <div class="contact-form-area">
                        <form enctype="multipart/form-data" id="add-new-contact-form">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn studio-btn mt-3" id="add-contact"><img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="" width="30px"> Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- information -->
    <div class="contact-area section_padding_50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <!-- Contact Info -->
                    <div class="information-area  align-items-center wow bounceInDown" data-wow-delay="0.5s" data-wow-duration="1000ms">
                        <div class="text-center">
                            <img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="" width="60px"><br><br><br>
                            <!-- Single Footer Content -->
                            <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12" style="color: white">

                                    <h5 ><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo e($row->location); ?></h5><br>
                                </div>
                                <!-- Single Footer Content -->
                                <div class="col-12" style="color: white">

                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e($row->phone); ?></h5><br>
                                </div>
                                <!-- Single Footer Content -->
                                <div class="col-12" style="color: white">

                                    <h5> <i class="fa fa-envelope-open" aria-hidden="true"></i> <?php echo e($row->email); ?></h5>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $( document ).ready(function() {
            /* ------------------- new-article----------------- */
            $(document).on("click", "#add-contact", function (e) {
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'contacts',
                    data: new FormData($("#add-new-contact-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        Swal.fire(
                            'thank you',
                            'I Will contact you soon',
                            'success'
                        );
                        $('#add-contact-form').trigger("reset");

                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            Swal.fire({
                                type: 'error',
                                title: 'sorry',
                                text: value,
                            });
                        })
                    }
                });
                e.preventDefault();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hossam-ghozal\resources\views/contact.blade.php ENDPATH**/ ?>