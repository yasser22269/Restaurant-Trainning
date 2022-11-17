@extends('layout.master')
<!-- BEGIN #app -->
@section('title','Attribute Edit')

@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
            <div class="row">

                <div class="card">
                    <div class="card-header d-flex align-items-center bg-white bg-opacity-15 fw-400">
                        Update attributes {{ $attribute->name }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Attribute.update', $attribute->id) }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden"  name="id"
                                   value="{{ $attribute->id }}">
                            <div class="form-group">
                                <label for="attributes Name" class="my-2">attributes Name</label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Enter attributes Name" name="name"
                                       value="{{ $attribute->name }}">
                                @error('name')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Status" class="my-2">Status</label>
                                <select class="form-select" name="status" value="{{ $attribute->status }}">
                                    <option hidden>Status</option>

                                    @if ($attribute->status == 1)
                                        <option selected value="1">Available</option>
                                        <option value="0">Un Available</option>
                                    @else
                                        @if ($attribute->status == 0)
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
