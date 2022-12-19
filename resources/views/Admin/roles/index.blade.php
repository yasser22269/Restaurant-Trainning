@extends('layout.master')
@section('content')
    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content" class="app-content">
            <!-- BEGIN container -->
            <div class="container">
                @include('layout.alerts.alerts')
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
                                    <li class="breadcrumb-item active">Role</li>
                                </ul>
                                <hr class="mb-4" />
                                <a href="{{route('admin.roles.create')}}"><button type="button" class="btn btn-outline-theme btn-lg mb-4">Added New Role</button></a>
                                <!-- BEGIN #datatable -->
                                <div id="datatable" class="mb-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <table id="datatableDefault" class="table text-nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                @can('isAdmin')
                                                                <th>Name</th>
                                                                @endcan
                                                                <th>Permissions</th>
                                                                <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0 ?>
                                                        @foreach($roles as $role)
                                                            <?php $i++ ?>
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                @can('isAdmin')
                                                                <td>{{$role->name}}</td>
                                                                @endcan
                                                                <td>
                                                                    @foreach($role->permissions as $key => $item)
                                                                        <span class="badge badge-info text-green">{{ $item->title }}</span>
                                                                    @endforeach
                                                                </td>
                                                                @if(!$role->is_system)
                                                                <td>
                                                                    <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-outline-success">show</a>
                                                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-outline-warning">update</a>
                                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-role" data-role="{{$role}}" data-route="{{route('admin.roles.destroy' , $role->id)}}">Delete</button>
                                                                </td>
                                                                    @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-arrow">
                                            {{-- Pagination --}}
                                            <div class="d-flex justify-content-center">
                                                {!! $roles->links() !!}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BEGIN #delete-role -->
                                    <div class="modal fade" id="delete-role" tabindex="-1" role="dialog" aria-labelledby="delete-roleLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete-roleLabel">New message</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger text-bold"> </p>
                                                    <form method="post" action="#" id="delete-role-formData">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" class="form-control" id="role_id">
                                                    </form>
                                                    <input type="hidden" class="form-control" id="route">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-outline-danger delete-role-form" id="delete-role-form">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END #delete-role -->

                                </div>
                                <!-- END #datatable -->
                            </div>

                        </div>
                        <!-- END col-9-->
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
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#delete-role').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('role'); // Extract info from data-* attributes
                var route = button.data('route'); // Extract info from data-* attributes

                var modal = $(this);
                modal.find('.modal-title').text('Do You Want To Delete  ' + recipient.name);
                modal.find('.modal-body p').text('You are about to delete ' + recipient.name);
                modal.find('.modal-body #role_id').val(recipient.id);
                modal.find('.modal-body #route').val(route);
            })

            $('.delete-role-form').on('click', function() {

                var form = document.querySelector('#delete-role-formData');
                var formData = new FormData(form);
                var route = $("#route").val();

                $.ajax({
                    url: route,
                    method: "post",
                    data: formData,

                    processData: false,
                    contentType: false,
                    enctype: "multipart/form-data",
                    success: function(dataResult){
                        $('#delete-role').modal('hide');
                        location.reload();
                    },
                    error: function(reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, val) {
                            return confirm(val);
                            $('#delete-role').modal('hide');
                        })
                    }
                });

            });
        });
    </script>
@endsection

