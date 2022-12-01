@extends('layout.master')
@section('title','zone Edit')

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
                        Update zones {{ $zones->name }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('zone.update', $zones->id) }}" method="post">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="zones Name" class="my-2">zones Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter zones Name"
                                    name="name" value="{{ $zones->name }}">
                            </div>
                            <div class="form-group">
                                <label for="Zone Price" class="my-2">zones price</label>
                                <input type="text" class="form-control" id="zone_price"
                                    placeholder="Enter zones Price" name="price"
                                    value="{{ $zones->price }}">
                            </div>
                            <div class="form-group">
                                <label for="Status" class="my-2">Status</label>
                                <select class="form-select" name="status" value="{{$zones->status}}">
                                    @if ($zones->status==1)
                                    <option selected value="1">Available</option>
                                    <option value="0">Un Available</option>
                                    @else
                                        @if ($zones->status==0)
                                            <option value="1">Available</option>
                                            <option selected value="0">Un Available</option>

                                        @endif
                            @endif

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
