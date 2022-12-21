@extends('layout.master')
@section('title', 'Logs Index')

<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->

            <div class="row">
                <table id="datatableDefault" class="table text-nowrap w-100">
                    <thead>
                        <tr>
                            <td> # </td>
                            <td> Employee Name </td>
                            <td> Title </td>
                            <td> created at </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($log as $log)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $log->emp->name }}</td>
                                <td>{{ $log->title }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
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
