<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Hossam Ghozal </title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo e(asset('public/vendor/adminlte/dist/img/icon.png')); ?>">

    <!-- Core Style CSS -->

    <link rel="stylesheet" href="<?php echo e(asset('public/css/aos.css')); ?>">

    <!-- Responsive CSS -->
    <link href="<?php echo e(asset('public/css/responsive.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('/public/sweetalert2/dist/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/core-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/pointer.css')); ?>">

</head>

<body>

<!-- Preloader -->
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="" width="30px">
            </div>
        </div>
    </div>
</div>

<!-- Gradient Background Overlay -->
<div class="gradient-background-overlay"></div>

<!-- Header Area Start -->
<header class="header-area bg-img" style="background-image: url(public/images/header.jpg); filter: grayscale(100%); -webkit-box-shadow: 0px 10px 30px 0px #0404046e;
    -moz-box-shadow: 0px 10px 30px 0px #0404046e;
    -o-box-shadow: 0px 10px 30px 0px #0404046e;
    box-shadow: 0px 10px 30px 0px #0404046e;">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 h-100">
                <div class="main-menu h-100">
                    <nav class="navbar h-100 navbar-expand-lg">
                        <!-- Logo Area  -->
                        <a class="navbar-brand" href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="Logo" width="65px" ></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> </button>

                        <div class="collapse navbar-collapse" id="studioMenu">
                            <!-- Menu Area Start  -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('index')); ?>"><span class="custom-nav-item <?php echo e(request()->route()->getName() === 'index' ?'active' : ''); ?>">Home</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('about')); ?>"><span class="custom-nav-item <?php echo e(request()->route()->getName() === 'about' ?'active' : ''); ?>">About</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('portfolio')); ?>"><span class="custom-nav-item <?php echo e(request()->route()->getName() === 'portfolio' ?'active' : ''); ?>">Portfolio</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('photography')); ?>"><span class="custom-nav-item <?php echo e(request()->route()->getName() === 'photography' ?'active' : ''); ?>">Photography</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('contact')); ?>"><span class="custom-nav-item <?php echo e(request()->route()->getName() === 'contact' ?'active' : ''); ?>">contact</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->

<!-- Social Sidebar Area Start -->
<button id="change"><a href="https://www.behance.net/HossamGhozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a></button>
<button id="blue"><a href="https://www.pinterest.com/Hossamghozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></button>
<button id="green"><a href="https://www.facebook.com/hussam.taher.5680" target="_blank" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></button>
<button id="black" ><a href="https://www.instagram.com/hussam_ghozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i> </a></button>
<button id="information" style="border-bottom-right-radius: 10px"> <a  href="#" data-toggle="modal" data-target=".information-modal-lg"><i  class="fa fa-info-circle" aria-hidden="true"></i></a><br></button>
<!-- Social Sidebar Area End -->
<div class="contact-popup-form" id="information-modal-lg">
    <div class="modal fade information-modal-lg" tabindex="-1" role="dialog" aria-labelledby="information-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-heading-text text-center mb-30">
                                <span></span>
                                <h2 style="color : dimgray">information</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <div class="container-fluid">
                        <form enctype="multipart/form-data" id="add-contact-form">
                            <div class="row">
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12" style="color: white ;text-align: center ">
                                        <i class="fa fa-location-arrow" aria-hidden="true" style="color :black;font-size:20px !important;"></i>
                                        <a href="#" style="color :black;font-size:15px !important;" ><b><?php echo e($row->location); ?></b></a><br><br>
                                    </div>
                                    <!-- Single Footer Content -->
                                    <div class="col-12" style="color: white ;text-align: center ">
                                        <i class="fa fa-envelope-open" aria-hidden="true" style="color :black;font-size:20px !important;"></i>
                                        <a href="#" style="color :black;font-size:15px !important;" ><b><?php echo e($row->email); ?></b></a><br><br>
                                    </div>
                                    <!-- Single Footer Content -->
                                    <div class="col-12" style="color: white ;text-align: center ">
                                        <i class="fa fa-phone" aria-hidden="true" style="color :black;font-size:20px !important;"></i>
                                        <a href="#" style="color :black;font-size:15px !important;" ><b><?php echo e($row->phone); ?></b></a><br><br>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->yieldContent('content'); ?>

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="<?php echo e(asset('public/js/jquery/jquery-2.2.4.min.js')); ?>"></script>
<!-- Popper js -->
<script src="<?php echo e(asset('public/js/popper.min.js')); ?>"></script>
<!-- Bootstrap js -->
<script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
<!-- Plugins js -->
<script src="<?php echo e(asset('public/js/plugins.js')); ?>"></script>
<!-- Active js -->
<script src="<?php echo e(asset('public/js/active.js')); ?>"></script>
<script src="<?php echo e(url('/public/sweetalert2/dist/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/pointer.js')); ?>"></script>
<script>
    init_pointer({

    })
</script>
<script src="<?php echo e(asset('public/js/aos.js')); ?>"></script>
<script>
    AOS.init();
</script>
<script>
    $(window).on('load', function () {
        $('#preloader-active').delay(1).fadeOut('fast');
    });
</script>
<?php echo $__env->yieldContent('script'); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175433386-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-175433386-1');
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\hossam-ghozal\resources\views/layouts/custom-app.blade.php ENDPATH**/ ?>