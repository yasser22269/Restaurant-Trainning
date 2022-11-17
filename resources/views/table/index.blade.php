@extends('layout.master')
@section('title','Table Index')

<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->
            @include('layout.alerts.alerts')

            <div class="row">

                <a href="{{ url('/table/create') }}" class="btn btn-outline-primary create">Create Table</a>
                <table id="datatableDefault" class="table text-nowrap w-100">
                    <thead>
                        <tr>
                            <td> # </td>
                            <td> Table Number </td>
                            <td> Table Status </td>
                            <td> Number Of Chair </td>
                            <td> Operation </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($tables as $tables)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $tables->name }}</td>
                                @if ($tables->status == 1)
                                    <td>Avaliable</td>
                                @else
                                    <td>Unavaliable</td>
                                @endif
                                <td>{{ $tables->number_of_chairs }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleterecord">Delete</button>
                                    <a href="{{ route('table.edit', $tables->id) }}"
                                        class="btn btn-outline-warning">update</a>
                                </td>
                            </tr>
                            <div class="modal fade modal-cover" id="deleterecord" tabindex="-1" role="dialog"
                                aria-labelledby="deleterecordLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleterecordLabel">Delete {{ $tables->name }}</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">
                                                <i class="tim-icons icon-simple-remove"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 style="color:#000;">Do you want to Delete {{ $tables->name }}</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button style="width:40%;" type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('table.destroy', $tables->id ) }}" method="post"
                                                style="display: inline">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $tables->id }}"
                                                    id="id">
                                                <button style="width:40%;" class="btn btn-danger">حذف</button>
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

        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->
    </div>
    <!-- END #app -->
@endsection
