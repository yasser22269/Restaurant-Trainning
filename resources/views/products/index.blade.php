@extends('layout.master')
@section('title','products Index')
<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
            @include('layout.alerts.alerts')

            <div class="row">

                <a href="{{ route('Product.create') }}" class="btn btn-outline-primary create">Create Product</a>
                <table id="datatableDefault" class="table text-nowrap w-100">
                    <thead>
                        <tr>
                            <td> # </td>
                            <td> Picture </td>
                            <td> Name </td>
                            <td> cartegory Name </td>
                            <td> Price </td>
                            <td> Status </td>
                            <td> Operation </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="w-50px h-50px bg-white
                                        bg-opacity-25 d-flex align-items-center
                                         justify-content-center">
                                            <img class="mw-100 mh-100"
                                                 src="{{$product->picture}}"
                                                 alt=""> </div>
                                    </div>

                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                @if ($product->status == 1)
                                    <td>Avaliable</td>
                                @else
                                    <td>Unavaliable</td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleterecord">Delete</button>
                                    <a href="{{ route('Product.edit', $product->id) }}"
                                        class="btn btn-outline-warning">update</a>
                                </td>
                            </tr>
                            <div class="modal fade modal-cover" id="deleterecord" tabindex="-1" role="dialog"
                                aria-labelledby="deleterecordLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="deleterecordLabel">Delete {{ $product->name }}</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">
                                                <i class="tim-icons icon-simple-remove"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 style="color:#000;">Do you want to Delete {{ $product->name }}</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button style="width:40%;" type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('Product.destroy',$product->id) }}" method="post"
                                                style="display: inline">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $product->id }}"
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
