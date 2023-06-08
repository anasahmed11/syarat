
<?php $__env->startSection('content'); ?>
    <!-- About Me Area Start -->
    <section class="about-me-area mt-100 section_padding_100">
        <div class="container">
            <div class="row ">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12">
                        <div class="about-me-thumb " data-aos="zoom-out-up" data-aos-anchor-placement="top-center" data-aos-duration="2000">
                            <img src='<?php echo e(asset("$row->photo")); ?>' loading="lazy" alt="">
                        </div>
                    </div>
                    <div class="col-12 wow bounceIn" data-wow-delay="0.8s" data-wow-duration="2200ms">
                        <div class="about-content mt-100 mb-100 text-center" >
                            <span></span>
                            <h2><?php echo e($row->title); ?></h2>
                            <p><?php echo e($row->article); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12" >
                    <!-- Pie Bars Area Start -->
                    <div class="our-skills-area text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Expert In</h3>
                                <br><br>
                            </div>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-6 col-md-6">
                                <?php if($row->photo): ?>
                                    <!--<div class="content wow fadeInLeft" data-wow-delay="1s" data-wow-duration="1000ms">
                                    <a href="<?php echo e(route('portfolio')); ?>" target="_blank">
                                    <div class="content-overlay"></div>
                                        <img class="content-image" src='<?php echo e(asset("$row->photo")); ?>'>
                                        <div class="content-details fadeIn-bottom">
                                            <h3 class="content-title">Show More</h3>
                                        </div>
                                    </a>
                                </div>
                                <br><br>-->
                                    <?php endif; ?>
                                    <div id="counter" >
                                        <h5 style="text-transform: capitalize" class="wow fadeInRight" data-wow-delay="0.7s" data-wow-duration="1000ms"><?php echo e($row->service); ?></h5>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- About Me Area End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('#counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter-value').each(function () {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },
                        {
                            duration: 2000,
                            easing: 'swing',
                            step: function () {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function () {
                                $this.text(this.countNum);
                                //alert('finished');
                            }
                        });
                });
                a = 1;
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hossam-ghozal\resources\views/articles.blade.php ENDPATH**/ ?>
