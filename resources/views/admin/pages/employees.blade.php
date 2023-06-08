@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
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
                        <button class="btn btn-danger "><a href="{{route('employees')}}" style="color: white"><i
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
                        @foreach($data as $row)
                            <tr class="article-{{$row->id}}">
                                <th scope="row">{{$row->id}}</th>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->last_name}}</td>
                                <td>{{$row->full_name}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->salary}}</td>
                                <td>{{$row->email}}</td>
                                <td>@if( $row->image )<img src="{{ $row->image }}"
                                                           width="100px">@endif</td>
                                <td>{{$row->department?$row->department->name:''}}</td>
                                <td>{{$row->manager?$row->manager->full_name:''}}</td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-email="{{ $row->email}}"
                                            data-salary="{{ $row->salary }}" data-phone="{{ $row->phone }}"
                                            data-id="{{ $row->id }}" data-first-name="{{ $row->first_name }}"
                                            data-last-name="{{ $row->last_name }}"
                                            data-department="{{ $row->department->id }}"
                                    ><i class='far fa-edit'></i> update
                                    </button>
                                </td>
                                <td>
                                    <button class="delete-article btn btn-danger" data-id="{{$row->id}}"><i
                                            class='far fa-trash-alt'></i> delete
                                    </button>
                                </td>
                                <td>
                                    <button class="add-task btn btn-success" data-toggle="modal"
                                            data-target="#add-modal-task" data-id="{{$row->id}}"><i
                                            class='far fa-edit'></i> add-task
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        {{ $data->links() }}
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
                            {{Form::open(array('id'=>'add-article-form','enctype'=>'multipart/form-data'))}}
                            {{Form::label('first_name', 'first_name ')}}
                            {{Form::text('first_name','',['class' => 'form-control'])}}<br>
                            {{Form::label('last_name', 'last_name ')}}
                            {{Form::text('last_name','',['class' => 'form-control'])}}<br>
                            {{Form::label('phone', 'phone ')}}
                            {{Form::text('phone','',['class' => 'form-control'])}}<br>
                            <div class="input-group mb-3">
                                <input type="password" name="password"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       placeholder="{{ __('adminlte::adminlte.password') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- Confirm password field --}}
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation"
                                       class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                       placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                            {{Form::label('salary', 'salary ')}}
                            {{Form::number('salary','',['class' => 'form-control','min'=>1])}}<br>
                            {{Form::label('email', 'email ')}}
                            {{Form::email('email','',['class' => 'form-control'])}}<br>
                            {{Form::label('department', 'department')}}
                            {{Form::select('department_id', $departments,null, array('class' => 'form-control'))}}<br>
                            {{Form::label('image', 'image ')}}
                            {{Form::file('image',['class'=>'form-control-file'])}}<br><br>
                            {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-article'])}}
                            {{ Form::close() }}
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
                            {{Form::open(array('id'=>'edit-article-form','enctype'=>'multipart/form-data'))}}
                            {{Form::label('first_name', 'first_name ')}}
                            {{Form::text('first_name','',['class' => 'form-control','id'=>'first-name-edit'])}}<br>
                            {{Form::label('last_name', 'last_name ')}}
                            {{Form::text('last_name','',['class' => 'form-control','id'=>'last-name-edit'])}}<br>
                            {{Form::label('phone', 'phone ')}}
                            {{Form::text('phone','',['class' => 'form-control','id'=>'phone-edit'])}}<br>
                            {{Form::label('salary', 'salary ')}}
                            {{Form::number('salary','',['class' => 'form-control','id'=>'salary-edit'])}}<br>
                            {{Form::label('email', 'email ')}}
                            {{Form::email('email','',['class' => 'form-control' ,'id'=>'email-edit'])}}<br>
                            {{Form::label('department', 'department')}}
                            {{Form::select('department_id', $departments,null, array('class' => 'form-control','id'=>'department-edit'))}}
                            <br>
                            {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-article'])}}
                            {{ Form::close() }}
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
                            {{Form::open(array('id'=>'add-task-form','enctype'=>'multipart/form-data'))}}
                            {{Form::label('title', 'title ')}}
                            {{Form::text('title','',['class' => 'form-control'])}}<br>
                            {{Form::label('description', 'description ')}}
                            {{Form::textArea('description','',['class' => 'form-control'])}}<br>
                            {{Form::hidden('employee_id','',['class' => 'form-control','id'=>'employee-id'])}}
                            <br>
                            {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-task'])}}
                            {{ Form::close() }}
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
@endsection
@section('script')
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
                var path = {!! json_encode(url('/')) !!};
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
@endsection
