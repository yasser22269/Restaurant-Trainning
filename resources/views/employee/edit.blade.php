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
                    <!-- BEGIN col-10 -->
                    <div class="col-xl-12">
                        <!-- BEGIN row -->
                        <div class="row">
                            <!-- BEGIN col-9 -->
                            <div class="col-xl-12">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ul>
                                <hr class="mb-4" />
                                <div class="card">
                                    <div class="card-header d-flex align-items-center bg-white bg-opacity-15 fw-400">
                                        Create Employee
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('employee.update', $employee->id) }}" method="post"
                                              enctype="multipart/form-data">
                                            {{ method_field('patch') }}
                                            {{ csrf_field() }}
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Name</label>
                                                <input type="text" class="form-control" value="{{ $employee->name }}" name="name" id="exampleFormControlInput1" placeholder="Mahmoud Fathy" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Email</label>
                                                <input type="email" class="form-control" value="{{ $employee->email }}" name="email" id="exampleFormControlInput1" placeholder="name@example.com" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Phone</label>
                                                <input type="number" class="form-control" value="{{ $employee->phone }}" name="phone" id="exampleFormControlInput1" placeholder="01000000000" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">National Id</label>
                                                <input type="number" class="form-control" value="{{ $employee->nid }}" name="nid" id="exampleFormControlInput1" placeholder="2222522222222" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Age</label>
                                                <input type="number" class="form-control" value="{{ $employee->age }}" name="age" id="exampleFormControlInput1" placeholder="27" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Address</label>
                                                <input type="text" class="form-control" value="{{ $employee->address }}" name="address" id="exampleFormControlInput1" placeholder="cairo" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Salary</label>
                                                <input type="text" class="form-control" value="{{ $employee->salary }}" name="salary" id="exampleFormControlInput1" placeholder="1,000" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Start Date</label>
                                                <input type="date" class="form-control" value="{{ $employee->start_date }}" name="start_date" id="exampleFormControlInput1" placeholder="1/2/2022" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Position</label>
                                                <input type="text" class="form-control" value="{{ $employee->position }}" name="position"  id="exampleFormControlInput1" placeholder="manager" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Office</label>
                                                <input type="text" class="form-control" value="{{ $employee->office }}" name="office" id="exampleFormControlInput1" placeholder="officer" />
                                            </div>
                                            <div class="form-group">
                                                <label for="Status" class="my-2">Status</label>
                                                <select class="form-select" name="status" value="{{ $employee->status }}">
                                                    @if ($employee->status == 1)
                                                        <option selected value="1">Available</option>
                                                        <option value="0">Un Available</option>
                                                    @else
                                                        @if ($employee->status == 0)
                                                            <option value="1">Available</option>
                                                            <option selected value="0">Un Available</option>
                                                        @endif
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Icon" class="my-2">Photo</label>
                                                <input type="file" class="form-control" name="photo" id="categoryImage" >
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
