@extends('layout.master')
@section('content')
    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content" class="app-content">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row justify-content-center">
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
                    <!-- BEGIN col-10 -->
                    <div class="col-xl-12">
                        <!-- BEGIN row -->
                        <div class="row">
                            <!-- BEGIN col-9 -->
                            <div class="col-xl-12">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Roles</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ul>
                                <a href="{{route('admin.roles.index')}}" class="btn btn-lg btn-info justify-content-end"> Back </a>

                                <hr class="mb-4" />
                                <div class="card">
                                    <div class="card-header d-flex align-items-center bg-white bg-opacity-15 fw-400">
                                        Create Role
                                    </div>
                                    <form method="post" class="row justify-content-center" action="{{route('admin.roles.update' , $role->id) }}">
                                        <div class="container">
                                            <div class="col-md-12 text-center">
                                                @csrf
                                                @method('PUT')
                                                @include('Admin.roles.partials.form' ,['create' => false])
                                                <button type="submit" class="btn btn-primary m-5"> Update </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- END row -->

                    </div>
                    <!-- END col-10 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #content -->

        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->
    </div>
    <!-- END #app -->
@endsection
