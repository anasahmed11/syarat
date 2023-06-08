<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div>
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
                                <td><?php echo e($row->description); ?></td>
                                <td><?php if( $row->image ): ?><img src="<?php echo e(url("/$row->image")); ?>" width="100px" ><?php endif; ?></td>
                                <td><a href="<?php echo e($row->video); ?>" target="_blank"><?php echo e($row->video); ?></a></td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>"
                                            data-facebook="<?php echo e($row->facebook); ?>" data-instagram="<?php echo e($row->instagram); ?>"
                                            data-twitter="<?php echo e($row->twitter); ?>" data-email="<?php echo e($row->email); ?>"
                                            data-phone="<?php echo e($row->phone); ?>"  data-video="<?php echo e($row->video); ?>"
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
            <div class="modal fade" id="edit-modal-article" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit </h5>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(array('id'=>'edit-article-form','enctype'=>'multipart/form-data'))); ?>

                            <?php echo e(Form::label('facebook', 'facebook ')); ?>

                            <?php echo e(Form::text('facebook','',['class' => 'form-control','id'=>'facebook-edit'])); ?><br>
                            <?php echo e(Form::label('instagram', 'instagram ')); ?>

                            <?php echo e(Form::text('instagram','',['class' => 'form-control','id'=>'instagram-edit'])); ?><br>
                            <?php echo e(Form::label('twitter', 'twitter ')); ?>

                            <?php echo e(Form::text('twitter','',['class' => 'form-control','id'=>'twitter-edit'])); ?><br>
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
            /* -------------------edit article----------------- */
            $(document).on('click', ".edit-article", function (e) {
                $('#edit-article-form').trigger("reset");
                $("#email-edit").val($(this).data('email'));
                $("#facebook-edit").val($(this).data('facebook'));
                $("#instagram-edit").val($(this).data('instagram'));
                $("#twitter-edit").val($(this).data('twitter'));
                $("#description-edit").val($(this).data('description'));
                $("#phone-edit").val($(this).data('phone'));
                $("#video-edit").val($(this).data('video'));
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
                                "<td>" + data.description + "</td>" +
                                "<td><img src='" + path +"/"+ data.image+ "' width='100px'></td>" +
                                "<td><a href='"+data.video+"' target='_blank'>"+data.video+"</a></td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-facebook='" + data.facebook + "' data-instagram='" + data.instagram + "' data-photo='" + data.phone + "' data-description='" + data.description + "' data-twitter='" + data.twitter + "'>update</button></td>" +
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\nagy\resources\views/admin/pages/information.blade.php ENDPATH**/ ?>