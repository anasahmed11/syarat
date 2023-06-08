<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div>
            <div class="row">
                <div class="col-md-3 ">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#new-modal-article">change password </button>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="table-holder table-responsive">
                    <table class="article-table table table-striped  ">
                        <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>facebook</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>instagram</th>
                            <th>twitter</th>
                            <th>email 2</th>
                            <th>description</th>
                            <th>image</th>
                            <th>video</th>
                            <th>update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="article-<?php echo e($row->id); ?>">
                                <th scope="row"><?php echo e($row->id); ?></th>
                                <td><?php echo e($row->facebook); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td><?php echo e($row->phone); ?></td>
                                <td><?php echo e($row->instagram); ?></td>
                                <td><?php echo e($row->twitter); ?></td>
                                <td><?php echo e($row->linkedin); ?></td>
                                <td><?php echo $row->description; ?></td>
                                <td><?php if( $row->image ): ?><img src="<?php echo e(url("/$row->image")); ?>" width="100px"><?php endif; ?></td>
                                <td><a href="<?php echo e($row->video); ?>" target="_blank"><?php echo e($row->video); ?></a></td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>"
                                            data-facebook="<?php echo e($row->facebook); ?>" data-instagram="<?php echo e($row->instagram); ?>"
                                            data-twitter="<?php echo e($row->twitter); ?>" data-email="<?php echo e($row->email); ?>" data-linkedin="<?php echo e($row->linkedin); ?>"
                                            data-phone="<?php echo e($row->phone); ?>" data-video="<?php echo e($row->video); ?>"
                                            data-description="<?php echo e($row->description); ?>"
                                    >
                                        update
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($articles->links()); ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- new-Modal -->
            <div class="modal fade" id="new-modal-article" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> change password </h5>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(array('id'=>'change-password-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('old password', ' old password ')); ?>

                            <?php echo e(Form::password('old_password',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('new password', ' new password ')); ?>

                            <?php echo e(Form::password('password',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('confirm new password', ' confirm new password ')); ?>

                            <?php echo e(Form::password('password_confirmation',['class' => 'form-control'])); ?><br><br>
                            <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'change-password'])); ?>

                            <?php echo e(Form::close()); ?>

                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit-Modal -->
            <div class="modal fade" id="edit-modal-article" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit </h5>
                        </div>
                        <div class="modal-body">
                            <div id="map" style="width: 100%;height: 500px"></div>
                            <?php echo e(Form::open(array('id'=>'edit-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('facebook', 'facebook ')); ?>

                            <?php echo e(Form::text('facebook','',['class' => 'form-control','id'=>'facebook-edit'])); ?><br>
                            <?php echo e(Form::label('instagram', 'instagram ')); ?>

                            <?php echo e(Form::text('instagram','',['class' => 'form-control','id'=>'instagram-edit'])); ?><br>
                            <?php echo e(Form::label('twitter', 'twitter ')); ?>

                            <?php echo e(Form::text('twitter','',['class' => 'form-control','id'=>'twitter-edit'])); ?><br>
                            <?php echo e(Form::label('email 2', 'email 2 ')); ?>

                            <?php echo e(Form::text('linkedin','',['class' => 'form-control','id'=>'linkedin-edit'])); ?><br>
                            <?php echo e(Form::label('video', 'video ')); ?>

                            <?php echo e(Form::text('video','',['class' => 'form-control','id'=>'video-edit'])); ?><br>
                            <?php echo e(Form::label('description', 'description ')); ?>

                            <?php echo e(Form::textarea('description','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>' write article','id'=>'description-edit'])); ?>

                            <?php echo e(Form::label('email', 'email ')); ?>

                            <?php echo e(Form::email('email','',['class' => 'form-control','id'=>'email-edit'])); ?><br>
                            <?php echo e(Form::label('phone', 'phone ')); ?>

                            <?php echo e(Form::text('phone','',['class'=>'form-control','id'=>'phone-edit'])); ?><br><br>
                            <?php echo e(Form::label('image', 'image ')); ?>

                            <?php echo e(Form::file('image',['class'=>'form-control-file'])); ?><br><br>
                            <?php echo e(Form::hidden('lat','',['class'=>'form-control','id'=>'lat'])); ?>

                            <?php echo e(Form::hidden('lng','',['class'=>'form-control','id'=>'lng'])); ?>

                            <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-article'])); ?>

                            <?php echo e(Form::close()); ?>

                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                        </div>
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
            CKEDITOR.replace('description-edit');
            /* ------------------- change-password----------------- */
            $(document).on("click", "#change-password", function (e) {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'change-password',
                    data: new FormData($("#change-password-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.message) {
                            Swal.fire({
                                type: 'error',
                                title: 'sorry',
                                text: data.message,
                            });
                        } else {
                            Swal.fire(
                                'done',
                                '',
                                'success'
                            );
                            $('#change-password-form').trigger("reset");
                        }

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
            /* -------------------edit article----------------- */
            $(document).on('click', ".edit-article", function (e) {
                $('#edit-article-form').trigger("reset");
                $("#email-edit").val($(this).data('email'));
                $("#facebook-edit").val($(this).data('facebook'));
                $("#instagram-edit").val($(this).data('instagram'));
                $("#twitter-edit").val($(this).data('twitter'));
                $("#linkedin-edit").val($(this).data('linkedin'));
                CKEDITOR.instances['description-edit'].setData($(this).data('description'));
                $("#description-edit").val($(this).data('description'));
                $("#phone-edit").val($(this).data('phone'));
                $("#video-edit").val($(this).data('video'));
                articleId = $(this).data('id');
            });
            $(document).on('click', "#edit-article", function (e) {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'information/' + articleId,
                    data: new FormData($("#edit-article-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if ((data.errors)) {
                            Swal.fire({
                                type: 'error',
                                title: 'sorry',
                                text: 'try again',
                            });

                        } else {
                            Swal.fire(
                                'done',
                                'successful',
                                'success'
                            );
                            $(".article-" + articleId).replaceWith("<tr class='article-" + data.id + "'>" +
                                "<th scope='row'>" + data.id + "</th>" +
                                "<td>" + data.facebook + "</td>" +
                                "<td>" + data.email + "</td>" +
                                "<td>" + data.phone + "</td>" +
                                "<td>" + data.instagram + "</td>" +
                                "<td>" + data.twitter + "</td>" +
                                "<td>" + data.linkedin + "</td>" +
                                "<td>" + data.description + "</td>" +
                                "<td><img src='" + path + "/" + data.image + "' width='100px'></td>" +
                                "<td><a href='" + data.video + "' target='_blank'>" + data.video + "</a></td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-facebook='" + data.facebook + "' data-linkedin='" + data.linkedin + "' data-instagram='" + data.instagram + "' data-photo='" + data.phone + "' data-description='" + data.description + "' data-twitter='" + data.twitter + "'>update</button></td>" +
                                "</tr>")

                        }
                        $('#edit-article-form').trigger("reset");
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
    <script>
        var map; //Will contain map object.
        var marker = false; ////Has the user plotted their location marker?

        //Function called to initialize / create the map.
        //This is called when the page has loaded.
        function initMap() {

            //The center location of our map.
            var centerOfMap = new google.maps.LatLng(30.033333, 31.233334);

            //Map options.
            var options = {
                center: centerOfMap, //Set center.
                zoom: 7 //The zoom value.
            };

            //Create the map object.
            map = new google.maps.Map(document.getElementById('map'), options);

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function(event){
                        markerLocation();
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
            });
        }

        //This function will get the marker's current location and then add the lat/long
        //values to our textfields so that we can save the location.
        function markerLocation(){
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat').value = currentLocation.lat(); //latitude
            document.getElementById('lng').value = currentLocation.lng(); //longitude
        }


        //Load the map when the page has finished loading.
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\far7a\resources\views/admin/pages/information.blade.php ENDPATH**/ ?>