@extends('layout.master')
@section('content')
    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content" class="app-content">
            <div class="card">
                <div class="card-body p-0">
                    <!-- BEGIN profile -->
                    <div class="profile">
                        <!-- BEGIN profile-container -->
                        <div class="profile-container">

                            <!-- BEGIN profile-sidebar -->

                            <div class="profile-sidebar text-center">
                                <div class="desktop-sticky-top">

                                    <!-- profile info -->
                                    <h4>{{$role->name}}</h4>
                                    <div class="mb-3 text-white text-opacity-50 fw-bold mt-n2">{{$role->name}}</div>
                                </div>
                                <a href="{{route('admin.roles.index')}}" class="btn btn-info float-md-right text-center"> Back </a>

                            </div>
                            <!-- END profile-sidebar -->

                            <div class="profile-content">

                                <ul class="profile-tab nav nav-tabs nav-tabs-v2 justify-content-center">
                                 <h1> Info </h1>
                                </ul>

                                <div class="profile-content-container">
                                    <table class="table table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">{{$role->id}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">{{$role->name}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Permissions</th>
                                            <th scope="col">
                                                @foreach($role->permissions as $key => $item)
                                                    <h5 class="text-green"> {{ $item->title }} </h5>
                                                @endforeach
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Created At</th>
                                            <th scope="col">{{$role->created_at}}</th>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- END profile-container -->
                    </div>
                    <!-- END profile -->
                </div>
                <div class="card-arrow">
                    <div class="card-arrow-top-left"></div>
                    <div class="card-arrow-top-right"></div>
                    <div class="card-arrow-bottom-left"></div>
                    <div class="card-arrow-bottom-right"></div>
                </div>
            </div>
        </div>
        <!-- END #content -->

        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->
    </div>
    <!-- END #app -->
@endsection
