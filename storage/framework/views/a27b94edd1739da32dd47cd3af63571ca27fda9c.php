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
                        <?php echo e(Form::select('category_id', $categories,null, array('class' => 'form-control'))); ?>

                        <br>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> search</button>
                        <button class="btn btn-danger "><a href="<?php echo e(route('category-works')); ?>" style="color: white"><i
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
                            <th>description</th>
                            <th>title_en</th>
                            <th>description_en</th>
                            <th>category</th>
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
                                <td><?php echo $row->description; ?></td>
                                <td><?php echo e($row->title_en); ?></td>
                                <td><?php echo $row->description_en; ?></td>
                                <td><?php echo e($row->category?$row->category->name:''); ?></td>
                                <td><?php if( $row->photo ): ?><img src="<?php echo e(url("/$row->photo")); ?>" width="100px"><?php endif; ?></td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>"
                                            data-title="<?php echo e($row->title); ?>" data-category="<?php echo e($row->category_id); ?>"
                                            data-title-en="<?php echo e($row->title_en); ?>"
                                            data-description-en="<?php echo e($row->description_en); ?>"
                                            data-description="<?php echo e($row->description); ?>">update
                                    </button>
                                </td>
                                <td>
                                    <button class="add-images btn btn-warning" data-toggle="modal"
                                            data-target="#add-images-modal" data-id="<?php echo e($row->id); ?>">add-images
                                    </button>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('work-images',[$row->id])); ?>">
                                        <button class="show-images btn btn-success">show</button>
                                    </a>
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
                            <?php echo e(Form::open(array('id'=>'add-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('title', ' title ')); ?>

                            <?php echo e(Form::text('title','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('description', ' description ')); ?>

                            <?php echo e(Form::textarea('description','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'ck-description'])); ?>

                            <br>
                            <br>
                            <?php echo e(Form::label('title_en', ' title_en ')); ?>

                            <?php echo e(Form::text('title_en','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('description_en', ' description_en ')); ?>

                            <?php echo e(Form::textarea('description_en','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'ck-description-en'])); ?>

                            <br>
                            <?php echo e(Form::label('category', ' category ')); ?>

                            <?php echo e(Form::select('category_id', $categories,null, array('class' => 'form-control'))); ?><br>
                            <?php echo e(Form::label('photo', 'photo ')); ?>

                            <?php echo e(Form::file('photo',['class'=>'form-control-file'])); ?><br>
                            <br><br>
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
                            <?php echo e(Form::open(array('id'=>'edit-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('title', 'title ')); ?>

                            <?php echo e(Form::text('title','',['class' => 'form-control','id'=>'title-edit'])); ?><br>
                            <?php echo e(Form::label('description', ' description ')); ?>

                            <?php echo e(Form::textarea('description','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'description-edit'])); ?>

                            <br>
                            <br>
                            <?php echo e(Form::label('title_en', ' title_en ')); ?>

                            <?php echo e(Form::text('title_en','',['class' => 'form-control','id'=>'title-en-edit'])); ?><br>
                            <?php echo e(Form::label('description_en', ' description_en ')); ?>

                            <?php echo e(Form::textarea('description_en','',['class' => 'form-control','rows' =>3,'cols'=>10,'placeholder'=>'write article','id'=>'description-en-edit'])); ?>

                            <br>
                            <?php echo e(Form::label('category', ' category ')); ?>

                            <?php echo e(Form::select('category_id', $categories,null, array('class' => 'form-control','id'=>'category-edit'))); ?>

                            <br>
                            <?php echo e(Form::label('photo', 'photo ')); ?>

                            <?php echo e(Form::file('photo',['class'=>'form-control-file'])); ?><br><br>
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
                                <input type="hidden" name="work_id" class="form-control" id="work_id">
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

                                <button type="submit" class="btn btn-primary" id="add-images" style="margin-top:10px">
                                    Submit
                                </button>

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
            CKEDITOR.replace('ck-description-en');
            CKEDITOR.replace('description-en-edit');
            $(document).on("click", ".increment-image", function () {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $(document).on("click", ".decrement-image", function () {
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
                    url: 'category-work',
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
                            "<td>" + data.description + "</td>" +
                            "<td>" + data.title_en + "</td>" +
                            "<td>" + data.description_en + "</td>" +
                            "<td>" + data.category.name + "</td>" +
                            "<td><img src='" + data.image + "' width='100px'></td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "'    data-title='" + data.title + "' data-description='" + data.description + "' data-title-en='" + data.title_en + "' data-description-en='" + data.description_en + "' data-category='" + data.category.id + "' >update</button></td>" +
                            "<td><button class='add-images btn btn-warning' data-toggle='modal' data-target='#add-images-modal' data-id='" + data.id + "' >add-images</button></td>" +
                            "<td><a href='" + path + "/work-images/" + data.id + "'><button class='show-images btn btn-success'  >show</button></a></td>" +
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
                            url: 'category-work-delete/' + article_id,
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
                $("#title-en-edit").val($(this).data('title-en'));
                $("#category-edit").val($(this).data('category'));
                CKEDITOR.instances['description-edit'].setData($(this).data('description'));
                CKEDITOR.instances['description-en-edit'].setData($(this).data('description-en'));
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
                    url: 'category-work/' + articleId,
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
                                "<td>" + data.description + "</td>" +
                                "<td>" + data.title_en + "</td>" +
                                "<td>" + data.description_en + "</td>" +
                                "<td>" + data.category.name + "</td>" +
                                "<td><img src='" + data.image + "' width='100px'></td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "'    data-title='" + data.title + "' data-description='" + data.description + "' data-title-en='" + data.title_en + "' data-description-en='" + data.description_en + "' data-category='" + data.category.id + "' >update</button></td>" +
                                "<td><button class='add-images btn btn-warning' data-toggle='modal' data-target='#add-images-modal' data-id='" + data.id + "' >add-images</button></td>" +
                                "<td><a href='" + path + "/work-images/" + data.id + "'><button class='show-images btn btn-success'  >show</button></a></td>" +
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
                $("#work_id").val($(this).data('id'));
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
                    url: 'add-work-images',
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\far7a\resources\views/admin/pages/category-works.blade.php ENDPATH**/ ?>