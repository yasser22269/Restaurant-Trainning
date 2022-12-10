@extends('layout.master')

@section('title', 'Edit Employee Time')

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
                        Edit {{ $timeemp->employee->name }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('timeemp.update', $timeemp->id) }}" method="post">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="select Employee" class="my-2">select Employee</label>
                                <select class="form-select" name="emp_id"  value="{{$timeemp->emp_id}}">
                                    @foreach ($employee as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $employee->id == $timeemp->employee->id ? 'selected' : '' }}>
                                            {{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Start At" class="my-2">start At</label>
                                <input type="time" class="form-control" id="start_at" name="start_at"
                                    value="{{ $timeemp->start_at }}">
                            </div>
                            <div class="form-group">
                                <label for="End At" class="my-2">End At</label>
                                <input type="time" class="form-control" id="end_at" name="end_at"
                                    value="{{ $timeemp->end_at }}"">
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
