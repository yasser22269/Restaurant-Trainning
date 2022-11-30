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
                                    <li class="breadcrumb-item active">Employee</li>
                                </ul>
                                <hr class="mb-4" />
                                <a href="{{route('employee.create')}}"><button type="button" class="btn btn-outline-theme btn-lg mb-4">Added employee</button></a>
                                <!-- BEGIN #datatable -->
                                <div id="datatable" class="mb-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatableDefault" class="table text-nowrap w-100">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>NID</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>Salary</th>
                                                    <th>Start Date</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Status</th>
                                                    <th>Operation</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 0 ?>
                                                @foreach($employees as $employee)
                                                    <?php $i++ ?>
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$employee->name}}</td>
                                                        <td>{{$employee->email}}</td>
                                                        <td>{{$employee->phone}}</td>
                                                        <td>{{$employee->nid}}</td>
                                                        <td>{{$employee->age}}</td>
                                                        <td>{{$employee->address}}</td>
                                                        <td>{{$employee->salary}}</td>
                                                        <td>{{$employee->start_date}}</td>
                                                        <td>{{$employee->position}}</td>
                                                        <td>{{$employee->office}}</td>
                                                        <td>{{$employee->status}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#modalCoverExample">Delete</button>
                                                            <a href="{{ route('employee.edit', $employee->id) }}"
                                                               class="btn btn-outline-warning">update</a>
                                                            <a href="{{ route('employee.show', $employee->id) }}"
                                                               class="btn btn-outline-success">show</a>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-arrow">
                                            <div class="card-arrow-top-left"></div>
                                            <div class="card-arrow-top-right"></div>
                                            <div class="card-arrow-bottom-left"></div>
                                            <div class="card-arrow-bottom-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END #datatable -->
                            </div>
                            <div class="modal modal-cover fade" id="modalCoverExample">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Delete {{ $employee->name }}</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-3">Do you want to Delete {{ $employee->name }}</p>
                                            </div>
                                            <div class="pt-3">
                                                <div class="modal-footer">
                                                    <button style="width:15%;" type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('employee.destroy', $employee->id ) }}" method="post"
                                                          style="display: inline">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id" value="{{ $employee->id }}"
                                                               id="id">
                                                        <button style="width:100%;" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
