@extends('layout.master')
<!-- BEGIN #app -->
@section('title','products Edit')

@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
            <div class="row">

                <div class="card">
                    <div class="card-header d-flex align-items-center bg-white bg-opacity-15 fw-400">
                        Update Product {{ $product->name }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Product.update', $product->id) }}"
                              method="post"enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden"  name="id"
                                   value="{{ $product->id }}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="Products Name" class="my-2">Product picture</label>
                                        <input type="file" class="form-control"
                                               id="picture" placeholder="Enter Product picture"
                                               name="picture" value="{{$product->picture}}">
                                    </div>
                                    <div class="col-md-2">
                                        <img width="100%" height="100" src="{{$product->picture}}" alt="">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="Product Name" class="my-2">Product Name</label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Enter Product Name" name="name"
                                       value="{{ $product->name }}">
                                @error('name')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Products Name" class="my-2">Product Description</label>
                                <textarea class="summernote form-control"
                                          id="description" placeholder="Enter Product description"
                                          name="description" rows="12">{{ $product->description }}</textarea>

                                @error('description')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Products Name" class="my-2">Product Price</label>
                                <input type="text" class="form-control" id="price"
                                       placeholder="Enter Product price"
                                       name="price" value="{{ $product->price }}">
                                @error('price')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="my-2">category Name</label>
                                <select name="category_id" class="form-select">
                                    @if($categories && $categories -> count() > 0)
                                        @foreach($categories as $category)
                                            <option  {{ ($category->id == $product->category_id) ? "selected" : ''}}
                                                value="{{$category->id }}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('category_id')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Status" class="my-2">Status</label>
                                <select class="form-select" name="status" value="{{ $product->status }}">
                                    <option hidden>Status</option>

                                    @if ($product->status == 1)
                                        <option selected value="1">Available</option>
                                        <option value="0">Un Available</option>
                                    @else
                                    @if ($product->status == 0)
                                        <option value="1">Available</option>
                                        <option selected value="0">Un Available</option>
                                    @endif
                                    @endif

                                </select>
                                <div class="card mt-4">
                                    <div class="card-header d-flex align-items-center
                                 bg-white bg-opacity-15 fw-400">
                                        Options
                                    </div>

                                    @if($options && $options -> count() > 0)
                                            <div class="card-body">
                                        <div class="row mb-3 fw-bold text-white">
                                            <div class="col-3">Attribute name</div>
                                            <div class="col-3">Option name</div>
                                            <div class="col-3">Option Price</div>
                                            <div class="col-3">Option Status</div>
                                        </div>
                                        @foreach($options as $index =>$option)
                                                    <input type="hidden"
                                                           class="form-control"
                                                           name="option[{{$index}}][id]"
                                                           value="{{$option->id}}">
                                            <div class="row mb-3 gx-3">
                                                <div class="col-3">
                                                    <select class="form-select"
                                                            name="option[{{$index}}][attribute_id]">
                                                        @if($attributes && $attributes -> count() > 0)
                                                            @foreach($attributes as $attribute)
                                                                <option  {{ ($attribute->id == $option->attribute->id) ? "selected" : ''}}
                                                                    value="{{$attribute->id }}">
                                                                    {{$attribute->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"
                                                           class="form-control"
                                                           name="option[{{$index}}][name]"
                                                           value="{{$option->name}}">
                                                    @error('option.'. $index .'.name')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <input type="number"
                                                           class="form-control"
                                                           name="option[{{$index}}][price]"
                                                             value="{{$option->price}}">
                                                    @error('option.'. $index .'.price')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <select class="form-select" name="option[{{$index}}][status]" >
                                                        <option hidden>Status</option>

                                                        @if ($option->status == 1)
                                                            <option selected value="1">Available</option>
                                                            <option value="0">Un Available</option>
                                                        @else
                                                            @if ($option->status == 0)
                                                                <option value="1">Available</option>
                                                                <option selected value="0">Un Available</option>
                                                            @endif
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach

                                                <button type="button" class="btn btn-primary mt-4
                                 animation-on-hover d-block w-100 text-center AddOption"
                                                onclick="AddOption()">Add Option</button>
                                    </div>
                                    @else
                                        <button type="button" class="btn btn-primary mt-4 mb-4
                                 animation-on-hover d-block  text-center AddOption"
                                                onclick="AddOption()">Add Option</button>
                                    @endif
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                </div>

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
@section('js')
    <script>
        let i = {{$options->count()}};
        function AddOption(){
            $(".AddOption").before(`
        <div class="row mb-3 gx-3 mt-4" id='RemoveColoum${i}'>
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

            i++;

        }
        function RemoveOption(num){
            $('#RemoveColoum'+num).remove();
            i--;
        }

    </script>
@endsection
