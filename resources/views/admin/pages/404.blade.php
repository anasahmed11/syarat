@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div>

            <div class="row">
                <div class="col-md-12 ">
                    <div class="small-box bg-red ">
                        <div class="inner ">
                            <h2>Sorry !! </h2> <br>
                            <h3>you dont have permission to visit this page</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-close"></i>
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


        })
    </script>
@endsection
