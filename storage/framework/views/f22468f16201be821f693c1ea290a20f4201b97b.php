<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div>
            <div class="row">
                <div class="col-md-3 ">
                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#new-modal-article"><i
                            class="fas fa-user-plus"></i> Add new
                    </button>
                    <br><br>
                </div>
            </div>
            <form>
                <div class="row">

                    <div class="col-md-3">
                        <input type="text" name="first_name" class="form-control" placeholder="first_name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="last_name" class="form-control" placeholder="last_name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="phone" class="form-control" placeholder="phone">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> search</button>
                        <button class="btn btn-danger "><a href="<?php echo e(route('employees')); ?>" style="color: white"><i
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
                            <th>first name</th>
                            <th>last name</th>
                            <th>full name</th>
                            <th>phone</th>
                            <th>salary</th>
                            <th>Email</th>
                            <th>image</th>
                            <th>department</th>
                            <th>manager</th>
                            <th>update</th>
                            <th>delete</th>
                            <th>add-task</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="article-<?php echo e($row->id); ?>">
                                <th scope="row"><?php echo e($row->id); ?></th>
                                <td><?php echo e($row->first_name); ?></td>
                                <td><?php echo e($row->last_name); ?></td>
                                <td><?php echo e($row->full_name); ?></td>
                                <td><?php echo e($row->phone); ?></td>
                                <td><?php echo e($row->salary); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td><?php if( $row->image ): ?><img src="<?php echo e($row->image); ?>"
                                                           width="100px"><?php endif; ?></td>
                                <td><?php echo e($row->department?$row->department->name:''); ?></td>
                                <td><?php echo e($row->manager?$row->manager->full_name:''); ?></td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-email="<?php echo e($row->email); ?>"
                                            data-salary="<?php echo e($row->salary); ?>" data-phone="<?php echo e($row->phone); ?>"
                                            data-id="<?php echo e($row->id); ?>" data-first-name="<?php echo e($row->first_name); ?>"
                                            data-last-name="<?php echo e($row->last_name); ?>"
                                            data-department="<?php echo e($row->department->id); ?>"
                                    ><i class='far fa-edit'></i> update
                                    </button>
                                </td>
                                <td>
                                    <button class="delete-article btn btn-danger" data-id="<?php echo e($row->id); ?>"><i
                                            class='far fa-trash-alt'></i> delete
                                    </button>
                                </td>
                                <td>
                                    <button class="add-task btn btn-success" data-toggle="modal"
                                            data-target="#add-modal-task" data-id="<?php echo e($row->id); ?>"><i
                                            class='far fa-edit'></i> add-task
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($data->links()); ?>

                        </tbody>
                    </table>
                    <br><br>
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

                            <?php echo e(Form::label('first_name', 'first_name ')); ?>

                            <?php echo e(Form::text('first_name','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('last_name', 'last_name ')); ?>

                            <?php echo e(Form::text('last_name','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('phone', 'phone ')); ?>

                            <?php echo e(Form::text('phone','',['class' => 'form-control'])); ?><br>
                            <div class="input-group mb-3">
                                <input type="password" name="password"
                                       class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
                                       placeholder="<?php echo e(__('adminlte::adminlte.password')); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock <?php echo e(config('adminlte.classes_auth_icon', '')); ?>"></span>
                                    </div>
                                </div>
                                <?php if($errors->has('password')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </div>
                                <?php endif; ?>
                            </div>

                            
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation"
                                       class="form-control <?php echo e($errors->has('password_confirmation') ? 'is-invalid' : ''); ?>"
                                       placeholder="<?php echo e(__('adminlte::adminlte.retype_password')); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock <?php echo e(config('adminlte.classes_auth_icon', '')); ?>"></span>
                                    </div>
                                </div>
                                <?php if($errors->has('password_confirmation')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php echo e(Form::label('salary', 'salary ')); ?>

                            <?php echo e(Form::number('salary','',['class' => 'form-control','min'=>1])); ?><br>
                            <?php echo e(Form::label('email', 'email ')); ?>

                            <?php echo e(Form::email('email','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('department', 'department')); ?>

                            <?php echo e(Form::select('department_id', $departments,null, array('class' => 'form-control'))); ?><br>
                            <?php echo e(Form::label('image', 'image ')); ?>

                            <?php echo e(Form::file('image',['class'=>'form-control-file'])); ?><br><br>
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

                            <?php echo e(Form::label('first_name', 'first_name ')); ?>

                            <?php echo e(Form::text('first_name','',['class' => 'form-control','id'=>'first-name-edit'])); ?><br>
                            <?php echo e(Form::label('last_name', 'last_name ')); ?>

                            <?php echo e(Form::text('last_name','',['class' => 'form-control','id'=>'last-name-edit'])); ?><br>
                            <?php echo e(Form::label('phone', 'phone ')); ?>

                            <?php echo e(Form::text('phone','',['class' => 'form-control','id'=>'phone-edit'])); ?><br>
                            <?php echo e(Form::label('salary', 'salary ')); ?>

                            <?php echo e(Form::number('salary','',['class' => 'form-control','id'=>'salary-edit'])); ?><br>
                            <?php echo e(Form::label('email', 'email ')); ?>

                            <?php echo e(Form::email('email','',['class' => 'form-control' ,'id'=>'email-edit'])); ?><br>
                            <?php echo e(Form::label('department', 'department')); ?>

                            <?php echo e(Form::select('department_id', $departments,null, array('class' => 'form-control','id'=>'department-edit'))); ?>

                            <br>
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
            <!-- add-task -->
            <div class="modal fade" id="add-modal-task" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit</h5>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(array('id'=>'add-task-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('title', 'title ')); ?>

                            <?php echo e(Form::text('title','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::label('description', 'description ')); ?>

                            <?php echo e(Form::textArea('description','',['class' => 'form-control'])); ?><br>
                            <?php echo e(Form::hidden('employee_id','',['class' => 'form-control','id'=>'employee-id'])); ?>

                            <br>
                            <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-task'])); ?>

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
            /* ------------------- new-article----------------- */
            $(document).on("click", "#add-article", function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'employee',
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
                            "<td>" + data.first_name + "</td>" +
                            "<td>" + data.last_name + "</td>" +
                            "<td>" + data.full_name + "</td>" +
                            "<td>" + data.phone + "</td>" +
                            "<td>" + data.salary + "</td>" +
                            "<td>" + data.email + "</td>" +
                            "<td><img src=" + data.image + " width='100px'></td>" +
                            "<td>" + data.department.name + "</td>" +
                            "<td>" + data.manager.full_name + "</td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-phone='" + data.phone + "'data-email='" + data.email + "'data-salary='" + data.salary + "' data-first-name='" + data.first_name + "' data-last-name='" + data.last_name + "' data-department='" + data.department.id + "' ><i class='far fa-edit'></i> update</button></td>" +
                            "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                            "<td><button class='add-task btn btn-success'  data-toggle='modal' data-target='#add-modal-task' data-id='" + data.id + "' ><i class='far fa-edit'></i> add-task</button></td>" +
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
                            url: 'users/' + article_id,
                            processData: false,
                            success: function (res) {
                                if ((res.errors)) {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'sorry try again',
                                        text: 'error',
                                    })
                                } else {

                                    if (res.message) {
                                        Swal.fire({
                                            type: 'error',
                                            title: 'sorry',
                                            text: res.message,
                                        });
                                    } else {
                                        $(".article-" + article_id).remove();
                                        Swal.fire(
                                            'done',
                                            'successful',
                                            'success'
                                        )
                                    }

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
                $("#first-name-edit").val($(this).data('first-name'));
                $("#last-name-edit").val($(this).data('last-name'));
                $("#salary-edit").val($(this).data('salary'));
                $("#phone-edit").val($(this).data('phone'));
                $("#department-edit").val($(this).data('department'));
                $("#email-edit").val($(this).data('email'));
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
                    url: 'employee/' + articleId,
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
                            if (res.message) {
                                Swal.fire({
                                    type: 'error',
                                    title: 'sorry',
                                    text: res.message,
                                });
                            } else {
                                Swal.fire(
                                    'done',
                                    'successful',
                                    'success'
                                );
                                $(".article-" + articleId).replaceWith("<tr class='article-" + data.id + "'>" +
                                    "<th scope='row'>" + data.id + "</th>" +
                                    "<td>" + data.first_name + "</td>" +
                                    "<td>" + data.last_name + "</td>" +
                                    "<td>" + data.full_name + "</td>" +
                                    "<td>" + data.phone + "</td>" +
                                    "<td>" + data.salary + "</td>" +
                                    "<td>" + data.email + "</td>" +
                                    "<td><img src=" + data.image + " width='100px'></td>" +
                                    "<td>" + data.department.name + "</td>" +
                                    "<td>" + data.manager.full_name + "</td>" +
                                    "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-phone='" + data.phone + "'data-email='" + data.email + "'data-salary='" + data.salary + "' data-first-name='" + data.first_name + "' data-last-name='" + data.last_name + "' data-department='" + data.department.id + "' ><i class='far fa-edit'></i> update</button></td>" +
                                    "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                                    "<td><button class='add-task btn btn-success'  data-toggle='modal' data-target='#add-modal-task' data-id='" + data.id + "' ><i class='far fa-edit'></i> add-task</button></td>" +
                                    "</tr>")

                            }
                            $('#edit-article-form').trigger("reset");
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
            /* ------------------- add-task----------------- */
            $(document).on('click', ".add-task", function (e) {
                $('#add-task-form').trigger("reset");
                $("#employee-id").val($(this).data('id'));
            });
            $(document).on("click", "#add-task", function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'task',
                    data: new FormData($("#add-task-form")[0]),
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
                        $('#add-task-form').trigger("reset");

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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syarat\resources\views/admin/pages/employees.blade.php ENDPATH**/ ?>