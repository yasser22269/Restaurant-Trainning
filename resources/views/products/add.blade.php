@extends('layout.master')

@section('title','Product Add')

<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
            <div class="row">
                <div class="card">
                    <div class="card-header d-flex align-items-center bg-white bg-opacity-15 fw-400">
                        Create Product
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Product.store') }}" method="post"enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Product Name" class="my-2">Product picture</label>
                                <input type="file" class="form-control"
                                       id="picture" placeholder="Enter Product picture"
                                    name="picture" >
{{--                                required--}}
                                @error('picture')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Product Name" class="my-2">Product Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Product Name"
                                       name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="my-2">category Name</label>
                                <select name="category_id" class="form-select">
                                        @if($categories && $categories -> count() > 0)
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id }}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                </select>
                                @error('category_id')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Product Name" class="my-2">Product Description</label>
                                <textarea class="summernote form-control"
                                          id="description" placeholder="Enter Product description"
                                          name="description" rows="12">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Product Name" class="my-2">Product Price</label>
                                <input type="text" class="form-control" id="price"
                                       placeholder="Enter Product price"
                                       name="price" value="{{ old('price') }}">
                                @error('price')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Status" class="my-2">Status</label>
                                <select class="form-select" name="status">
                                    <option value="1" selected>Available</option>
                                    <option value="0">Un Available</option>
                                </select>
                            </div>
                            <div class="card mt-4" >
                                <div class="card-header d-flex align-items-center
                                 bg-white bg-opacity-15 fw-400">
                                    Options
                                </div>
                                @if($attributes)
                                <div class="card-body">
                                    <div class="row mb-3 fw-bold text-white">
                                        <div class="col-4">Attribute name</div>
                                        <div class="col-4">Option name</div>
                                        <div class="col-4">Option Price</div>
                                    </div>
                                    <div id="RemoveColoum0" class="row mb-3 gx-3">
                                        <div class="col-4">
                                            <select class="form-select"
                                                    name="option[0][attribute_id]">
                                                @if($attributes && $attributes -> count() > 0)
                                                    @foreach($attributes as $attribute)
                                                        <option
                                                            value="{{$attribute->id }}">
                                                            {{$attribute->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <input type="text"
                                                   class="form-control"
                                                   name="option[0][name]" required>
                                            @error('option.0.name')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <input type="number"
                                                   class="form-control"
                                                   name="option[0][price]"
                                                   value="0" required>
                                            @error('option.0.price')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <button onclick="RemoveOption(0)" type='button'
                                                    class="btn btn-outline-secondary d-block">
                                                <i class="bi bi-x-lg"></i></button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-4
                                     animation-on-hover d-block w-100 text-center AddOption"
                                            onclick="AddOption()">Add Option</button>
                                </div>
                                @else
                                  <p class="d-block w-100 text-center"> Not Found Attributes To Add Options</p>
                                @endif
                                <div class="card-arrow">
                                    <div class="card-arrow-top-left"></div>
                                    <div class="card-arrow-top-right"></div>
                                    <div class="card-arrow-bottom-left"></div>
                                    <div class="card-arrow-bottom-right"></div>
                                </div>
                            </div>
                            <button class="btn btn-outline-success mt-4
                             animation-on-hover d-block w-100 text-center"
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

@section('js')
<script>
    let i = 0;
    function AddOption(){
        i++;
        $(".AddOption").before(`
        <div class="row mb-3 gx-3" id='RemoveColoum${i}'>
            <div class="col-4">
                <select class="form-select"
                name="option[${i}][attribute_id]">
                @if($attributes && $attributes -> count() > 0)
                @foreach($attributes as $attribute)
                <option
                value="{{$attribute->id }}">
                        {{$attribute->name}}</option>
                @endforeach
                @endif
                </select>
                </div>
                <div class="col-4">
                <input type="text"
                class="form-control"
                name="option[${i}][name]"required>

                </div>
                <div class="col-3">
                    <input type="number"
                           class="form-control"
                           name="option[${i}][price]"
                           value="0" required>
                </div>
                <div class="col-1">
                     <button onclick="RemoveOption(${i})" type='button'  class="btn btn-outline-secondary d-block"><i class="bi bi-x-lg"></i></button>
                </div>
            </div>
    `);


    }
    function RemoveOption(num){
        $('#RemoveColoum'+num).remove();
        i--;
    }

</script>
@endsection

