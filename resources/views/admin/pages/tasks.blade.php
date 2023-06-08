@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
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
                        <button class="btn btn-danger "><a href="{{route('tasks')}}" style="color: white"><i
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
                        @foreach($data as $row)
                            <tr class="article-{{$row->id}}">
                                <th scope="row">{{$row->id}}</th>
                                <td>{{$row->title}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{$row->employee?$row->employee->full_name:''}}</td>
                                <td>
                                    <button class="edit-article btn btn-info" data-toggle="modal"
                                            data-target="#edit-modal-article" data-id="{{ $row->id }}"
                                            data-status="{{$row->status}}" data-description="{{$row->description}}"
                                            data-title="{{$row->title}}">update
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        {{ $data->links() }}
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
                            {{Form::open(array('id'=>'edit-data-form','enctype'=>'multipart/form-data'))}}
                            {{Form::label('title', 'title ')}}
                            {{Form::text('title','',['class' => 'form-control','id'=>'title-edit'])}}<br>
                            {{Form::label('description', 'description ')}}
                            {{Form::text('description','',['class' => 'form-control','id'=>'description-edit'])}}<br>
                            {{Form::label('status', 'status ')}}
                            {{Form::select('status',['new'=>'new','progress'=>'progress','completed'=>'completed'],'',['class' => 'form-control','id'=>'status-edit'])}}
                            <br><br>
                            {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-data'])}}
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
@endsection
