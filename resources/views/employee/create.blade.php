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
                                    <li class="breadcrumb-item active">Create</li>
                                </ul>
                                <hr class="mb-4" />
                                <div class="card">
                                    <div class="card-header d-flex align-items-center bg-white bg-opacity-15 fw-400">
                                        Create Employee
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Name</label>
                                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Mahmoud Fathy" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Email</label>
                                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Password</label>
                                                <input type="text" class="form-control" name="password" id="exampleFormControlInput1" placeholder="2222522222222" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Phone</label>
                                                <input type="number" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="01000000000" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">National Id</label>
                                                <input type="number" class="form-control" name="nid" id="exampleFormControlInput1" placeholder="2222522222222" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Age</label>
                                                <input type="number" class="form-control" name="age" id="exampleFormControlInput1" placeholder="27" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Address</label>
                                                <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="cairo" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Salary</label>
                                                <input type="text" class="form-control" name="salary" id="exampleFormControlInput1" placeholder="1,000" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Start Date</label>
                                                <input type="date" class="form-control" name="start_date" id="exampleFormControlInput1" placeholder="1/2/2022" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Position</label>
                                                <input type="text" class="form-control" name="position"  id="exampleFormControlInput1" placeholder="manager" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Office</label>
                                                <input type="text" class="form-control" name="office" id="exampleFormControlInput1" placeholder="officer" />
                                            </div>
                                            <div class="form-group">
                                                <label for="Status" class="my-2">Status</label>
                                                <select class="form-select" name="status">
                                                    <option value="1">Available</option>
                                                    <option value="0">Un Available</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Icon" class="my-2">Photo</label>
                                                <input type="file" class="form-control" name="photo" id="categoryImage">
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
