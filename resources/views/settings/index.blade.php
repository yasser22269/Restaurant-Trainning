@extends('layout.master')
@section('title','Settings')

<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
                        @include('layout.alerts.alerts')

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
                        Setting
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings.update', $settings->id) }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="phoneNumber" class="my-2">Phane Number</label>
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Enter Phone Number"
                                    name="phoneNumber" value="{{ $settings->phoneNumber }}">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber2" class="my-2">Second Phane Number</label>
                                <input type="text" class="form-control" id="phoneNumber2" placeholder="Enter Second Phone Number"
                                    name="phoneNumber2" value="{{ $settings->phoneNumber2 }}">
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="my-2">facebook</label>
                                <input type="text" class="form-control" id="facebook" placeholder="Enter facebook"
                                    name="facebook" value="{{ $settings->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="website Name" class="my-2">website Name</label>
                                <input type="text" class="form-control" id="facebook" placeholder="Enter website Name"
                                    name="websiteName" value="{{ $settings->websiteName }}">
                            </div>
                            <div class="form-group">
                                <label for="Address" class="my-2">Address</label>
                                <textarea class="form-control" id="address" placeholder="Enter Address"
                                          name="address">{{ $settings->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="About" class="my-2">About</label>
                                <textarea class="form-control" id="about" placeholder="Enter About"
                                          name="about">{{ $settings->about }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="e-mail" class="my-2">E-mail</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter your Email"
                                    name="email" value="{{ $settings->email }}">
                            </div>
                            <div class="form-group mt-4">
                                <div class="row" style="align-items:center">
                                    <div class="col-md-6">
                                        <label for="file" class="my-2">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-6">
                                                @if($settings->logo != null)
                                                    <p class="lead">Current Logo</p>
                                                    <img class="mt-2" id="logoImage" src="{{$settings->logo}}" alt="" width="150" height="150">
                                                @endif
                                            </div>
                                            <div class="col-6 d-none" id="logodiv">
                                                <p class="lead">Choose Logo</p>
                                                <img class="mt-2" id="chooseLogoImage"
                                                     src="{{$settings->logo}}" alt=""
                                                     width="150" height="150">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <div class="row" style="align-items:center">
                                    <div class="col-md-6">
                                        <label for="file" class="my-2">small Logo</label>
                                        <input type="file" class="form-control" id="" name="small_logo">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-6">
                                                @if($settings->small_logo != null)
                                                    <p class="lead">Current small Logo</p>
                                                    <img class="mt-2" id="smallLogoImage" src="{{$settings->small_logo}}" alt="" width="150" height="150">
                                                @endif
                                            </div>
                                            <div class="col-6 d-none" id="smallLogodiv">
                                                <p class="lead">Choose small Logo</p>
                                                <img class="mt-2" id="choosesmallLogoImage" src="{{$settings->small_logo}}" alt="" width="150" height="150">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-success mt-4 animation-on-hover d-block w-100 text-center" type="submit">Submit</button>

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

@section('js')
    <script>
        logo.onchange = evt => {
            const [file] = logo.files
            if (file) {
                chooseLogoImage.src = URL.createObjectURL(file)
                $("#logodiv").removeClass('d-none')
            }
        }
        smallLogo.onchange = evt => {
            const [file] = smallLogo.files
            if (file) {
                choosesmallLogoImage.src = URL.createObjectURL(file)
                $("#smallLogodiv").removeClass('d-none')
            }
        }
    </script>
@endsection
