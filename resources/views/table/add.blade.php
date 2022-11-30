@extends('layout.master')

@section('title','Table ADD')

<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>خطا</strong>
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex align-items-center bg-white bg-opacity-15 fw-400">
                        Create Table
                    </div>
                    <div class="card-body">
                        <form action="{{ route('table.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Table Name" class="my-2">Table Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Table Name"
                                    name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="Number of Chair" class="my-2">Number of Chair</label>
                                <input type="text" class="form-control" id="number_of_chairs"
                                    placeholder="Enter Number of Chair" name="number_of_chairs"
                                    value="{{ old('number_of_chairs') }}">
                            </div>
                            <div class="form-group">
                                <label for="Status" class="my-2">Status</label>
                                <select class="form-select" name="status">
                                    <option value="1">Available</option>
                                    <option value="0">Un Available</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-success mt-4 animation-on-hover d-block w-100 text-center"
                                type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>

                </div>
            </div>
            <!-- END row -->
        </div>
        <!-- END #content -->

        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->
    </div>
    <!-- END #app -->
@endsection
