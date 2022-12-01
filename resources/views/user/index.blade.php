@extends('layout.master')
@section('title','users Index')
<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
            @include('layout.alerts.alerts')

            <div class="row">

                <a href="{{ route('user.create') }}" class="btn btn-outline-primary create">
                    Create User</a>
                <table id="datatableDefault" class="table text-nowrap w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; ?>
                    @foreach ($users as $user)
                        <?php $i++ ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleterecord">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade modal-cover" id="deleterecord" tabindex="-1" role="dialog"
                             aria-labelledby="deleterecordLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleterecordLabel">Delete {{ $user->name }}</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">
                                            <i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 style="color:#000;">Do you want to Delete {{ $user->name }}</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button style="width:40%;" type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('user.destroy',$user->id) }}" method="post"
                                              style="display: inline">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $user->id }}"
                                                   id="id">
                                            <button style="width:40%;" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END row -->
        </div>
        <!-- END #content -->
    </div>
    <!-- END #app -->
@endsection
