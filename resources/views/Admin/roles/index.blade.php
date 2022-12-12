@extends('layout.master')
@section('content')
    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content" class="app-content">
            <!-- BEGIN container -->
            <div class="container">
                @include('layout.alerts.alerts')
                <!-- BEGIN row -->
                <div class="row justify-content-center">
                    <!-- BEGIN col-10 -->
                    <div class="col-xl-12">
                        <!-- BEGIN row -->
                        <div class="row">
                            <!-- BEGIN col-9 -->
                            <div class="col-xl-12">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Role</li>
                                </ul>
                                <hr class="mb-4" />
                                <a href="{{route('admin.roles.create')}}"><button type="button" class="btn btn-outline-theme btn-lg mb-4">Added New Role</button></a>
                                <!-- BEGIN #datatable -->
                                <div id="datatable" class="mb-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <table id="datatableDefault" class="table text-nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Permissions</th>
                                                                <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0 ?>
                                                        @foreach($roles as $role)
                                                            <?php $i++ ?>
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>{{$role->name}}</td>
                                                                <td>
                                                                    @foreach($role->permissions as $key => $item)
                                                                        <span class="badge badge-info text-green">{{ $item->title }}</span>
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-outline-success">show</a>
                                                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-outline-warning">update</a>
                                                                    <button type="button" class="btn btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#modalCoverExample">Delete</button>
                                                                </td>
                                                            </tr>
        {{--                                                    <div class="modal modal-cover fade" id="modalCoverExample">--}}
        {{--                                                        <div class="modal-dialog">--}}
        {{--                                                            <div class="modal-content">--}}
        {{--                                                                <div class="modal-header">--}}
        {{--                                                                    <h3 class="modal-title">Delete {{ $role->name }}</h3>--}}
        {{--                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
        {{--                                                                </div>--}}
        {{--                                                                <div class="modal-body">--}}
        {{--                                                                    <p class="mb-3">Do you want to Delete {{ $role->name }}</p>--}}
        {{--                                                                </div>--}}
        {{--                                                                <div class="pt-3">--}}
        {{--                                                                    <div class="modal-footer">--}}
        {{--                                                                        <button style="width:15%;" type="button" class="btn btn-secondary"--}}
        {{--                                                                                data-bs-dismiss="modal">Close</button>--}}
        {{--                                                                        <form action="{{ route('role.destroy', $role->id ) }}" method="post"--}}
        {{--                                                                              style="display: inline">--}}
        {{--                                                                            {{ method_field('delete') }}--}}
        {{--                                                                            {{ csrf_field() }}--}}
        {{--                                                                            <input type="hidden" name="id" value="{{ $role->id }}"--}}
        {{--                                                                                   id="id">--}}
        {{--                                                                            <button style="width:100%;" class="btn btn-danger">حذف</button>--}}
        {{--                                                                        </form>--}}
        {{--                                                                    </div>--}}
        {{--                                                                </div>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-arrow">
                                            {{-- Pagination --}}
                                            <div class="d-flex justify-content-center">
                                                {!! $roles->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END #datatable -->
                            </div>

                        </div>
                        <!-- END col-9-->
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
