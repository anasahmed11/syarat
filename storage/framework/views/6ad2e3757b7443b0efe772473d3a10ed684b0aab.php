<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="ztKVo7FcdPyszFlrY2_aoymXhWdrvk5PmZP889ZImFA" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Hossam Ghozal </title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo e(asset('public/vendor/adminlte/dist/img/icon.png')); ?>">

    <!-- Core Style CSS -->
    <!-- Responsive CSS -->
    <link href="<?php echo e(asset('public/css/responsive.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('/public/sweetalert2/dist/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/core-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/pointer.css')); ?>">
    <style>
        #change:hover,#blue:hover,#black:hover,#green:hover,#purple:hover,#information:hover{
            background-color: black !important;
        }
        #change:hover i,#blue:hover i,#black:hover i,#green:hover i,#purple:hover i,#information:hover i{
            color: white !important;
        }
    </style>
    <!-- End Google Tag Manager -->


</head>

<body>

<!-- End Google Tag Manager (noscript) -->
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
<header class="header-area bg-img">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 h-100">
                <div class="main-menu h-100">
                    <nav class="navbar h-100 navbar-expand-lg">
                        <!-- Logo Area  -->
                        <a class="navbar-brand" href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="Logo" width="65px"></a>

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
<!-- ***** Welcome Area Start ***** -->
<section class="welcome-area">
    <div class="carousel h-100 slide carousel-fade " data-ride="carousel" id="welcomeSlider">
        <!-- Carousel Inner -->
        <div class="carousel-inner h-100 carousel-fade">
            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item h-100 bg-img  <?php echo e($row->id==1 ? 'active' : ''); ?> " data-background-image-url="<?php echo e(asset("$row->photo")); ?>" >
                    <!--<div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>02.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>-->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

    </div>
</section>
<div class="social"></div>
<button id="change" style="background-color: white"><a href="https://www.behance.net/HossamGhozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Behance"><i style="color: black" class="fa fa-behance" aria-hidden="true"></i></a></button>
<button id="blue" style="background-color: white"><a href="https://www.pinterest.com/Hossamghozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Pinterest"><i style="color: black" class="fa fa-pinterest" aria-hidden="true"></i></a></button>
<button id="green" style="background-color: white"><a href="https://www.facebook.com/hussam.taher.5680" target="_blank" data-toggle="tooltip" data-placement="right" title="Facebook"><i style="color: black" class="fa fa-facebook" aria-hidden="true"></i></a></button>
<button id="black" style="background-color: white"><a href="https://www.instagram.com/hussam_ghozal" target="_blank" data-toggle="tooltip" data-placement="right" title="Instagram"><i style="color: black" class="fa fa-instagram" aria-hidden="true"></i> </a></button>
<button id="information" style="background-color: white"> <a  href="#" data-toggle="modal" data-target=".information-modal-lg"><i style="color: black" class="fa fa-info-circle" aria-hidden="true"></i></a><br></button>
<button id="purple" style="background-color: white"> <a  href="#" data-toggle="modal" data-target=".contact-modal-lg"><i style="color: black" class="fa fa-envelope" aria-hidden="true"></i></a><br></button>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<div class="contact-popup-form" id="contact-modal-lg">
    <div class="modal fade contact-modal-lg" tabindex="-1" role="dialog" aria-labelledby="contact-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-heading-text text-center mb-30">
                                <span></span>
                                <h2>Contact Me</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <div class="container-fluid">
                        <form enctype="multipart/form-data" id="add-contact-form">
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
    </div>
</div>
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
<script>
    $( document ).ready(function() {
        /* ------------------- new-article----------------- */
        $(window).on('load', function () {
            $('#preloader-active').delay(1).fadeOut('fast');
        });
        function BackgroundNode({node, loadedClassName}) {
            let src = node.getAttribute('data-background-image-url');
            let show = (onComplete) => {
                requestAnimationFrame(() => {
                    node.style.backgroundImage = `url(${src})`
                    node.classList.add(loadedClassName);
                    onComplete();
                })
            }

            return {
                node,

                // onComplete is called after the image is done loading.
                load: (onComplete) => {
                    let img = new Image();
                    img.onload = show(onComplete);
                    img.src = src;
                }
            }
        }

        let defaultOptions = {
            selector: '[data-background-image-url]',
            loadedClassName: 'loaded'
        }

        function BackgroundLazyLoader({selector, loadedClassName} = defaultOptions) {
            let nodes = [].slice.apply(document.querySelectorAll(selector))
                .map(node => new BackgroundNode({node, loadedClassName}));

            let callback = (entries, observer) => {
                entries.forEach(({target, isIntersecting}) => {
                    if (!isIntersecting) {
                        return;
                    }

                    let obj = nodes.find(it => it.node.isSameNode(target));

                    if (obj) {
                        obj.load(() => {
                            // Unobserve the node:
                            observer.unobserve(target);
                            // Remove this node from our list:
                            nodes = nodes.filter(n => !n.node.isSameNode(target));

                            // If there are no remaining unloaded nodes,
                            // disconnect the observer since we don't need it anymore.
                            if (!nodes.length) {
                                observer.disconnect();
                            }
                        });
                    }
                })
            };

            let observer = new IntersectionObserver(callback);
            nodes.forEach(node => observer.observe(node.node));
        };

        BackgroundLazyLoader();
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
                data: new FormData($("#add-contact-form")[0]),
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

<?php /**PATH C:\xampp\htdocs\hossam-ghozal\resources\views/index.blade.php ENDPATH**/ ?>