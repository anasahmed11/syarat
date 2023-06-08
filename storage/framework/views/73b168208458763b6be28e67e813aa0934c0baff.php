<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div>
            <div class="row">
                <div class="col-md-3 ">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#new-modal-article">Add new</button>
                    <br><br>
                </div>
            </div>
            <form>
                <div class="row">

                    <div class="col-md-2">
                        <input type="text" name="article" class="form-control" placeholder="article">
                        <br>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="price" class="form-control" placeholder="<= price">
                        <br>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="rooms" class="form-control" placeholder="rooms">
                        <br>
                    </div>
                    <div class="col-md-2">
                        <?php echo e(Form::select('type', array(''=>'choose price type','1'=>'highest to low','2'=>'lowest to high'),null, array('class' => 'form-control '))); ?>

                        <br>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> search</button>
                        <button class="btn btn-danger "><a href="<?php echo e(route('estates')); ?>" style="color: white"><i
                                    class="far fa-arrow-alt-circle-left"></i> back</a></button>
                        <br><br>
                    </div>

                </div>
            </form>
            <div class="row">
                <div class="table-holder table-responsive">
                    <table class="article-table table table-striped  ">
                        <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>price</th>
                            <th>distance</th>
                            <th>address</th>
                            <th>bathrooms</th>
                            <th>rooms</th>
                            <th>description</th>
                            <th>features</th>
                            <th>photo</th>
                            <th>update</th>
                            <th>add images</th>
                            <th>show images</th>
                            <th>delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="article-<?php echo e($row->id); ?>">
                                <th scope="row"><?php echo e($row->id); ?></th>
                                <td><?php echo e($row->title); ?></td>
                                <td><?php echo e($row->price); ?></td>
                                <td><?php echo e($row->distance); ?></td>
                                <td><?php echo e($row->address); ?></td>
                                <td><?php echo e($row->bathrooms); ?></td>
                                <td><?php echo e($row->rooms); ?></td>
                                <td><?php echo $row->description; ?></td>
                                <td><?php echo $row->features; ?></td>
                                <td><?php if( $row->photo ): ?><img src="<?php echo e(url("/$row->photo")); ?>" width="100px"><?php endif; ?></td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>"
                                            data-title="<?php echo e($row->title); ?>" data-distance="<?php echo e($row->distance); ?>"
                                            data-price="<?php echo e($row->price); ?>" data-address="<?php echo e($row->address); ?>"
                                            data-lat="<?php echo e($row->lat); ?>" data-lng="<?php echo e($row->lng); ?>"
                                            data-rooms="<?php echo e($row->rooms); ?>" data-bathrooms="<?php echo e($row->bathrooms); ?>"

                                            data-description="<?php echo e($row->description); ?>" data-features="<?php echo e($row->features); ?>">update
                                    </button>
                                </td>
                                <td>
                                    <button class="add-images btn btn-warning" data-toggle="modal"
                                            data-target="#add-images-modal" data-id="<?php echo e($row->id); ?>">add-images</button>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('estate-images',[$row->id])); ?>"><button class="show-images btn btn-success">show</button></a>
                                </td>
                                <td>
                                    <button class="delete-article btn btn-danger" data-id="<?php echo e($row->id); ?>">delete</button>
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
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> add </h5>
                        </div>
                        <div class="modal-body">
                            <div id="map" style="width: 100%;height: 500px"></div>
                            <?php echo e(Form::open(array('id'=>'add-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('title', ' title ')); ?>

                            <?php echo e(Form::text('title','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('price', ' price ')); ?>

                            <?php echo e(Form::number('price','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('description', ' description ')); ?>

                            <?php echo e(Form::textarea('description','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'ck-description'])); ?>

                            <br>
                            <?php echo e(Form::label('distance', ' distance ')); ?>

                            <?php echo e(Form::text('distance','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('address', ' address ')); ?>

                            <?php echo e(Form::text('address','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('rooms', ' rooms ')); ?>

                            <?php echo e(Form::number('rooms','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('bathrooms', ' bathrooms ')); ?>

                            <?php echo e(Form::number('bathrooms','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('photo', 'photo ')); ?>

                            <?php echo e(Form::file('photo',['class'=>'form-control-file'])); ?><br>
                            <?php echo e(Form::label('features', ' features ')); ?>

                            <?php echo e(Form::textarea('features','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'ck-features'])); ?>

                            <br><br>
                            <?php echo e(Form::hidden('lat','',['class'=>'form-control','id'=>'lat'])); ?>

                            <?php echo e(Form::hidden('lng','',['class'=>'form-control','id'=>'lng'])); ?>

                            <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-article'])); ?>

                            <?php echo e(Form::close()); ?>

                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- new-Modal -->
            <div class="modal fade" id="edit-modal-article" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit </h5>
                        </div>
                        <div class="modal-body">
                            <div id="map-edit" style="width: 100%;height: 500px"></div>
                            <?php echo e(Form::open(array('id'=>'edit-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('title', 'title ')); ?>

                            <?php echo e(Form::text('title','',['class' => 'form-control','id'=>'title-edit'])); ?><br>
                            <?php echo e(Form::label('price', ' price ')); ?>

                            <?php echo e(Form::number('price','',['class' => 'form-control','id'=>'price-edit'])); ?><br>
                            <?php echo e(Form::label('description', ' description ')); ?>

                            <?php echo e(Form::textarea('description','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'description-edit'])); ?>

                            <br>
                            <?php echo e(Form::label('distance', ' distance ')); ?>

                            <?php echo e(Form::text('distance','',['class' => 'form-control','id'=>'distance-edit'])); ?><br>
                            <?php echo e(Form::label('address', ' address ')); ?>

                            <?php echo e(Form::text('address','',['class' => 'form-control','id'=>'address-edit'])); ?><br>
                            <?php echo e(Form::label('rooms', ' rooms ')); ?>

                            <?php echo e(Form::number('rooms','',['class' => 'form-control','id'=>'rooms-edit'])); ?><br>
                            <?php echo e(Form::label('bathrooms', ' bathrooms ')); ?>

                            <?php echo e(Form::number('bathrooms','',['class' => 'form-control','id'=>'bathrooms-edit'])); ?><br>
                            <?php echo e(Form::label('photo', 'photo ')); ?>

                            <?php echo e(Form::file('photo',['class'=>'form-control-file'])); ?><br>
                            <?php echo e(Form::hidden('lat','',['class'=>'form-control','id'=>'lat-edit'])); ?>

                            <?php echo e(Form::hidden('lng','',['class'=>'form-control','id'=>'lng-edit'])); ?>

                            <?php echo e(Form::label('features', ' features ')); ?>

                            <?php echo e(Form::textarea('features','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'features-edit'])); ?><br><br>
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
            <!-- add-images -->
            <div class="modal fade" id="add-images-modal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> add images</h5>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" id='add-images-form'>
                                <input type="hidden" name="estate_id" class="form-control" id="estate_id">
                                <div class="input-group control-group increment">
                                    <input type="file" name="image[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="increment-image btn btn-success" type="button"><i
                                                class="glyphicon glyphicon-plus"></i>Add
                                        </button>
                                    </div>
                                </div>
                                <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="file" name="image[]" class="form-control">
                                        <div class="input-group-btn">
                                            <button class="decrement-image btn btn-danger" type="button"><i
                                                    class="glyphicon glyphicon-remove"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="add-images" style="margin-top:10px">Submit</button>

                            </form>
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
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('ck-description');
            CKEDITOR.replace('description-edit');
            CKEDITOR.replace('ck-features');
            CKEDITOR.replace('features-edit');
            $(document).on("click",".increment-image",function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $(document).on("click",".decrement-image",function(){
                $(this).parents(".control-group").remove();
            });
            /* ------------------- new-article----------------- */
            $(document).on("click", "#add-article", function (e) {
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
                    url: 'estate',
                    data: new FormData($("#add-article-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        Swal.fire(
                            'done',
                            '',
                            'success'
                        );
                        $('#add-article-form').trigger("reset");
                        $(".article-table").prepend("<tr class='article-" + data.id + "'>" +
                            "<th scope='row'>" + data.id + "</th>" +
                            "<td>" + data.title + "</td>" +
                            "<td>" + data.price + "</td>" +
                            "<td>" + data.distance + "</td>" +
                            "<td>" + data.address + "</td>" +
                            "<td>" + data.bathrooms + "</td>" +
                            "<td>" + data.rooms + "</td>" +
                            "<td>" + data.description+ "</td>" +
                            "<td>" + data.features+ "</td>" +
                            "<td><img src='" + data.image + "' width='100px'></td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-distance='" + data.distance + "' data-article='" + data.article + "' data-price='" + data.price + "' data-address='" + data.address + "' data-bathrooms='" + data.bathrooms + "' data-rooms='" + data.rooms + "' data-description='" + data.description + "' data-features='" + data.features + "'  data-lat='" + data.lat + "' data-lng='" + data.lng + "'>update</button></td>" +
                            "<td><button class='add-images btn btn-warning' data-toggle='modal' data-target='#add-images-modal' data-id='" + data.id + "' >add-images</button></td>" +
                            "<td><a href='"+path+"/estate-images/"+data.id+"'><button class='show-images btn btn-success'  >show</button></a></td>" +
                            "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' >delete</button></td>" +
                            "</tr>");

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
            /* ------------------- delete article----------------- */
            $(document).on('click', ".delete-article", function (e) {
                var article_id = $(this).data('id');
                Swal.fire({
                    title: 'are you sure ?',
                    text: "if you delete you cant return the date",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'cancel',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'yes delete it '
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: 'estate-delete/' + article_id,
                            processData: false,
                            success: function (res) {
                                if ((res.errors)) {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'sorry try again',
                                        text: 'error',
                                    })
                                } else {
                                    $(".article-" + article_id).remove();
                                    Swal.fire(
                                        'done',
                                        'successful',
                                        'success'
                                    )
                                }
                            },
                            error: function (data) {
                                Swal.fire({
                                    type: 'error',
                                    title: 'sorry',
                                    text: 'try again',
                                });
                            }
                        });
                    } else {
                        swal("sorry", "not deleted", "error");
                    }
                });
                e.preventDefault();
            });
            /* -------------------edit article----------------- */
            $(document).on('click', ".edit-article", function (e) {
                $('#edit-article-form').trigger("reset");
                $("#title-edit").val($(this).data('title'));
                $("#price-edit").val($(this).data('price'));
                $("#distance-edit").val($(this).data('distance'));
                $("#bathrooms-edit").val($(this).data('bathrooms'));
                $("#rooms-edit").val($(this).data('rooms'));
                $("#address-edit").val($(this).data('address'));
                $("#lat-edit").val($(this).data('lat'));
                $("#lng-edit").val($(this).data('lng'));
                CKEDITOR.instances['description-edit'].setData($(this).data('description'));
                CKEDITOR.instances['features-edit'].setData($(this).data('features'));
                articleId = $(this).data('id');
                latEdit = $(this).data('lat');
                lngEdit = $(this).data('lng');
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
                    url: 'estate/' + articleId,
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
                                "<td>" + data.title + "</td>" +
                                "<td>" + data.price + "</td>" +
                                "<td>" + data.distance + "</td>" +
                                "<td>" + data.address + "</td>" +
                                "<td>" + data.bathrooms + "</td>" +
                                "<td>" + data.rooms + "</td>" +
                                "<td>" + data.description+ "</td>" +
                                "<td>" + data.features+ "</td>" +
                                "<td><img src='" + data.image + "' width='100px'></td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-distance='" + data.distance + "' data-article='" + data.article + "' data-price='" + data.price + "' data-address='" + data.address + "' data-bathrooms='" + data.bathrooms + "' data-rooms='" + data.rooms + "' data-description='" + data.description + "' data-features='" + data.features + "' data-lat='" + data.lat + "' data-lng='" + data.lng + "'>update</button></td>" +
                                "<td><button class='add-images btn btn-warning' data-toggle='modal' data-target='#add-images-modal' data-id='" + data.id + "' >add-images</button></td>" +
                                "<td><a href='"+path+"/estate-images/"+data.id+"'><button class='show-images btn btn-success'  >show</button></a></td>" +
                                "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' >delete</button></td>" +
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

            /* ------------------- add-images----------------- */
            $(document).on('click', ".add-images", function (e) {
                $('#add-images-form').trigger("reset");
                $("#estate_id").val($(this).data('id'));
            });
            $(document).on("click", "#add-images", function (e) {
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'add-estate-images',
                    data: new FormData($("#add-images-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        Swal.fire(
                            'done',
                            '',
                            'success'
                        );
                        $('#add-images-form').trigger("reset");

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
    <script>
        var map2; //Will contain map object.
        var marker2 = false; ////Has the user plotted their location marker?

        //Function called to initialize / create the map.
        //This is called when the page has loaded.
        function initMap2() {

            //The center location of our map.
            if(typeof latEdit !== 'undefined'){
                var centerOfMap2 = new google.maps.LatLng(latEdit, lngEdit);
            }else{
                var centerOfMap2 = new google.maps.LatLng(30.033333, 31.233334);
            }


            //Map options.
            var options = {
                center: centerOfMap2, //Set center.
                zoom: 7 //The zoom value.
            };

            //Create the map object.
            map2 = new google.maps.Map(document.getElementById('map-edit'), options);

            //Listen for any clicks on the map.
            google.maps.event.addListener(map2, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation2 = event.latLng;
                //If the marker hasn't been added.
                if(marker2 === false){
                    //Create the marker.
                    marker2 = new google.maps.Marker({
                        position: clickedLocation2,
                        map: map2,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker2, 'dragend', function(event){
                        markerLocation2();
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker2.setPosition(clickedLocation2);
                }
                //Get the marker's location.
                markerLocation2();
            });
        }

        //This function will get the marker's current location and then add the lat/long
        //values to our textfields so that we can save the location.
        function markerLocation2(){
            //Get location.
            var currentLocation2 = marker2.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat-edit').value = currentLocation2.lat(); //latitude
            document.getElementById('lng-edit').value = currentLocation2.lng(); //longitude
        }


        //Load the map when the page has finished loading.
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\far7a\resources\views/admin/pages/employees.blade.php ENDPATH**/ ?>
