<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <form>
                <div class="row">

                    <div class="col-md-2">
                        <?php echo e(Form::select('category_id', $categories,null, array('class' => 'form-control'))); ?>

                        <br>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> search</button>
                        <button class="btn btn-danger "><a href="<?php echo e(route('contacts')); ?>" style="color: white"><i
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
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>message</th>
                                <th>attachment</th>
                                <th>category</th>
                                <th>date</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="article-<?php echo e($row->id); ?>">
                                    <th scope="row"><?php echo e($row->id); ?></th>
                                    <td><?php echo e($row->name); ?></td>
                                    <td><?php echo e($row->email); ?></td>
                                    <td><?php echo e($row->phone); ?></td>
                                    <td><?php echo e($row->message); ?></td>
                                    <td>
                                        <?php if($row->attachment): ?>
                                            <a href='<?php echo e(url("/$row->attachment")); ?>' target="_blank" class="btn btn-success">download</a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($row->category?$row->category->name:''); ?></td>
                                    <td><?php echo e($row->created_at); ?></td>
                                    <td><button class="delete-article btn btn-danger" data-id="<?php echo e($row->id); ?>">delete</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($articles->links()); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script>
        $( document ).ready(function() {
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
                            url: 'contact/' + article_id,
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
        })


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\far7a\resources\views/admin/pages/contacts.blade.php ENDPATH**/ ?>