<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div>
            <form>
                <div class="row">

                    <div class="col-md-2">
                        <input type="text" name="title" class="form-control" placeholder="title">
                        <br>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="employee_name" class="form-control" placeholder="employee_name">
                        <br>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> search</button>
                        <button class="btn btn-danger "><a href="<?php echo e(route('tasks')); ?>" style="color: white"><i
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
                            <th>status</th>
                            <th>employee name</th>
                            <th>update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="article-<?php echo e($row->id); ?>">
                                <th scope="row"><?php echo e($row->id); ?></th>
                                <td><?php echo e($row->title); ?></td>
                                <td><?php echo e($row->description); ?></td>
                                <td><?php echo e($row->status); ?></td>
                                <td><?php echo e($row->employee?$row->employee->full_name:''); ?></td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>"
                                            data-status="<?php echo e($row->status); ?>" data-description="<?php echo e($row->description); ?>"
                                            data-title="<?php echo e($row->title); ?>">update
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($data->links()); ?>

                        </tbody>
                    </table>
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
                            <?php echo e(Form::open(array('id'=>'edit-data-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('title', 'title ')); ?>

                            <?php echo e(Form::text('title','',['class' => 'form-control','id'=>'title-edit'])); ?><br>
                            <?php echo e(Form::label('description', 'description ')); ?>

                            <?php echo e(Form::text('description','',['class' => 'form-control','id'=>'description-edit'])); ?><br>
                            <?php echo e(Form::label('status', 'status ')); ?>

                            <?php echo e(Form::select('status',['new'=>'new','progress'=>'progress','completed'=>'completed'],'',['class' => 'form-control','id'=>'status-edit'])); ?>

                            <br><br>
                            <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-data'])); ?>

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
    <script>
        $(document).ready(function () {
            /* -------------------edit article----------------- */
            $(document).on('click', ".edit-article", function (e) {
                $('#edit-data-form').trigger("reset");
                $("#title-edit").val($(this).data('title'));
                $("#description-edit").val($(this).data('description'));
                $("#status-edit").val($(this).data('status'));
                dataId = $(this).data('id');
            });
            $(document).on('click', "#edit-data", function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'task/' + dataId,
                    data: new FormData($("#edit-data-form")[0]),
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
                            $(".article-" + dataId).replaceWith("<tr class='article-" + data.id + "'>" +
                                "<th scope='row'>" + data.id + "</th>" +
                                "<td>" + data.title + "</td>" +
                                "<td>" + data.description + "</td>" +
                                "<td>" + data.status + "</td>" +
                                "<td>" + data.employee.full_name + "</td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-title='" + data.title + "' data-description='" + data.description + "' data-status='" + data.status + "'  >update</button></td>" +
                                "</tr>")

                        }
                        $('#edit-data-form').trigger("reset");
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syarat\resources\views/admin/pages/tasks.blade.php ENDPATH**/ ?>