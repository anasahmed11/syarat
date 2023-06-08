<?php $__env->startSection('content'); ?>

    <section class="about-me-area mt-100 section_padding_100">
        <!-- About Me Area Start -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin: 40px ;">
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0"
                        class="<?php echo e($row->id==1 ? 'active' : ''); ?>"></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            <div class="carousel-inner" style="border-radius: 25px">
                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($row->id==1 ? 'active' : ''); ?>"
                         style="max-height: 700px ; border-radius: 3px">
                        <img class="d-block w-100" src="<?php echo e(asset("$row->image")); ?>" width="100%" height="100%"
                             style=" border-radius: 3px">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br><br>
        <div class="container">

            <div class="row ">
                <div class="col-12" style="text-align: center">
                    <br><br>
                    <h2>Mohamed Nagy ?</h2>
                    <br><br>
                    <div class="about-me-thumb " data-aos="zoom-out-up" data-aos-anchor-placement="top-center"
                         data-aos-duration="2000">
                        <img src='<?php echo e(asset("$information->image")); ?>' loading="lazy" alt="">
                    </div>
                </div>
                <div class="col-12  " data-aos="zoom-in-down" data-aos-anchor-placement="top-right"
                     data-aos-duration="2000">
                    <div class="about-content mt-100 mb-100 text-center">
                        <span></span>
                        <h2><?php echo e($information->title); ?></h2>
                        <p><?php echo e($information->description); ?></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up-right" data-aos-anchor-placement="top-right"
                     data-aos-duration="2000">
                    <?php if($information->video): ?>
                        <iframe width="100%" style="min-height: 500px" src="<?php echo e($information->video); ?>">
                        </iframe><br>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <br><br>
        <!-- information -->
        <div class="contact-area section_padding_50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class=" col-12">
                        <!-- Contact Info -->
                        <div class="information-area  align-items-center " data-aos="fade-down-left" data-aos-anchor-placement="top-right"
                             data-aos-duration="2000">
                            <div style="text-align: center">
                                <img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="" width="60px"><br><br><br>
                            </div>
                            <div class="row">
                                <!-- Single Footer Content -->
                                <div class="col-lg-6 col-md-6  col-12" style="color: white ;text-align: center">
                                    <a href="tel:<?php echo e($information->phone); ?>">
                                        <h5>
                                            <i class="fa fa-whatsapp" aria-hidden="true" style="color: #128c7e !important;"></i> <?php echo e($information->phone); ?>

                                        </h5>
                                    </a>
                                    <br><br>
                                </div>
                                <!-- Single Footer Content -->
                                <div class="col-lg-6 col-md-6  col-12" style="color: white ;text-align: center">
                                    <a href="mailto:<?php echo e($information->email); ?>">
                                        <h5>
                                            <i class="fa fa-envelope" aria-hidden="true" style="color: #FBBC05 !important;"></i> <?php echo e($information->email); ?>

                                        </h5>
                                    </a>
                                    <br><br>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Single Footer Content -->
                                <div class="col-lg-4 col-md-4 col-12" style="color: white ;text-align: center">
                                    <a href="//<?php echo e($information->facebook); ?>" target="_blank">
                                        <h5>
                                            <i class="fa fa-facebook" aria-hidden="true" style="color: #4267B2 !important;"></i>
                                            <?php echo e($information->facebook); ?>

                                        </h5>
                                    </a>
                                    <br><br>
                                </div>
                                <!-- Single Footer Content -->
                                <div class="col-lg-4 col-md-4 col-12" style="color: white ;text-align: center">
                                    <a href="//<?php echo e($information->instagram); ?>" target="_blank">
                                        <h5>
                                            <i class="fa fa-instagram" aria-hidden="true" style="color: #E1306C !important;"></i>
                                            <?php echo e($information->instagram); ?>

                                        </h5>
                                    </a>
                                    <br><br>
                                </div>
                                <!-- Single Footer Content -->
                                <div class="col-lg-4 col-md-4 col-12" style="color: white ;text-align: center">
                                    <a href="//<?php echo e($information->twitter); ?>" target="_blank">
                                        <h5>
                                            <i class="fa fa-twitter" aria-hidden="true" style="color: #1DA1F2 !important;"></i>
                                            <?php echo e($information->twitter); ?>

                                        </h5>
                                    </a>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Me Area End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\nagy\resources\views/articles.blade.php ENDPATH**/ ?>
