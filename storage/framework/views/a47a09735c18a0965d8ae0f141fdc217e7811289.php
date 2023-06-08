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
            <div class="row">
                <div class="table-holder table-responsive">
                    <table class="article-table table table-striped  ">
                        <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>front image</th>
                            <th>back image</th>
                            <th>update</th>
                            <th>delete</th>
                            <th>add images</th>
                            <th>show images</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="article-<?php echo e($row->id); ?>">
                                <th scope="row"><?php echo e($row->id); ?></th>
                                <td><?php echo e($row->name); ?></td>
                                <td><?php if( $row->front_image ): ?><img src="<?php echo e(url("/$row->front_image")); ?>"
                                                                 width="100px"><?php endif; ?></td>
                                <td><?php if( $row->back_image ): ?><img src="<?php echo e(url("/$row->back_image")); ?>"
                                                                width="100px"><?php endif; ?></td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>"
                                            data-title="<?php echo e($row->name); ?>">update
                                    </button>
                                </td>
                                <td>
                                    <button class="delete-article btn btn-danger" data-id="<?php echo e($row->id); ?>">delete</button>
                                </td>
                                <td>
                                    <button class="add-images btn btn-warning" data-toggle="modal"
                                            data-target="#add-images-modal" data-id="<?php echo e($row->id); ?>">add-images</button>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('images-album',[$row->id])); ?>"><button class="show-images btn btn-success">show</button></a>
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
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> add</h5>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(array('id'=>'add-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('name', 'name ')); ?>

                            <?php echo e(Form::text('name','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('front_image', 'front_image ')); ?>

                            <?php echo e(Form::file('front_image',['class'=>'form-control-file'])); ?><br><br>
                            <?php echo e(Form::label('back_image', 'back_image ')); ?>

                            <?php echo e(Form::file('back_image',['class'=>'form-control-file'])); ?><br><br>
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
            <!-- edit-Modal -->
            <div class="modal fade" id="edit-modal-article" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit</h5>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(array('id'=>'edit-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('name', 'name ')); ?>

                            <?php echo e(Form::text('name','',['class' => 'form-control','id'=>'title-edit'])); ?><br>
                            <?php echo e(Form::label('front_image', 'front_image ')); ?>

                            <?php echo e(Form::file('front_image',['class'=>'form-control-file'])); ?><br><br>
                            <?php echo e(Form::label('back_image', 'back_image ')); ?>

                            <?php echo e(Form::file('back_image',['class'=>'form-control-file'])); ?><br><br>
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
                                <input type="hidden" name="category_id" class="form-control" id="album_id">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on("click",".increment-image",function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $(document).on("click",".decrement-image",function(){
                $(this).parents(".control-group").remove();
            });
            /* ------------------- new-article----------------- */
            $(document).on("click", "#add-article", function (e) {
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'photography-categories',
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
                            "<td>" + data.name + "</td>" +
                            "<td><img src='" + path + "/" + data.front_image + "' width='100px'></td>" +
                            "<td><img src='" + path + "/" + data.back_image + "' width='100px'></td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-title='" + data.name + "'  >update</button></td>" +
                            "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' >delete</button></td>" +
                            "<td><button class='add-images btn btn-warning' data-toggle='modal' data-target='#add-images-modal' data-id='" + data.id + "' >add-images</button></td>" +
                            "<td><a href='"+path+"/images-album/"+data.id+"'><button class='show-images btn btn-success'  >show</button></a></td>" +
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
                            type: 'DELETE',
                            url: 'photography-categories/' + article_id,
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
                articleId = $(this).data('id');
            });
            $(document).on('click', "#edit-article", function (e) {
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'photography-categories/' + articleId,
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
                                "<td>" + data.name + "</td>" +
                                "<td><img src='" + path + "/" + data.front_image + "' width='100px'></td>" +
                                "<td><img src='" + path + "/" + data.back_image + "' width='100px'></td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-title='" + data.name + "'  >update</button></td>" +
                                "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' >delete</button></td>" +
                                "<td><button class='add-images btn btn-warning' data-toggle='modal' data-target='#add-images-modal' data-id='" + data.id + "' >add-images</button></td>" +
                                "<td><a href='"+path+"/images-album/"+data.id+"'><button class='show-images btn btn-success'  >show</button></a></td>" +
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
                $("#album_id").val($(this).data('id'));
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
                    url: 'add-album-images',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\nagy\resources\views/admin/pages/photography-categories.blade.php ENDPATH**/ ?>