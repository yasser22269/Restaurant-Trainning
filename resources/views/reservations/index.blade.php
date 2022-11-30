@extends('layout.master')
@section('title','Reservations Index')



<!-- BEGIN #app -->
@section('content')
    <div id="content" class="app-content p-1 ps-xl-4 pe-xl-4 pt-xl-3 pb-xl-3">
        @include('layout.alerts.alerts')
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
        <div class="pos pos-vertical card" id="pos">

            <div class="pos-container card-body">

                <div class="pos-header">
                    <div class="logo">
                            <div class="logo-img ">
                                <i class="bi bi-x-diamond" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="logo-text m-2">Reservations</div>
                    </div>
                    <div class="time clock" id="time"> <?php $currentTime = getdate();   ?></div>
                    <div class="nav">
                        <div class="nav-item">
                            <a href="#AddReservation"
                               data-bs-toggle="modal" class="btn btn-outline-default">
                                <i class="bi bi-plus nav-icon"></i>
                                Add Reservation
                            </a>
                        </div>

                    </div>
                </div>
                    <div class="pos-content-container h-100 p-4 ps ps--active-y" >
                        <div class="d-md-flex align-items-center mb-4">
                            <div class="flex-1">
                                <div class="fs-24px mb-1">Count Table ({{$tables->count()}})</div>
                                <div class="mb-2 mb-md-0 d-flex">
                                    <div class="d-flex align-items-center me-3">
                                        <i class="fa fa-circle fa-fw text-white text-opacity-25 fs-9px me-1"></i> Completed
                                    </div>
                                    <div class="d-flex align-items-center me-3">
                                        <i class="fa fa-circle fa-fw text-success fs-9px me-1"></i> Reservation
                                    </div>
                                </div>
                            </div>
                            <div>
                                <form action="{{ route('Reservations.index') }}" method="get">
                                    <div class="input-group date mb-0">
                                        <input type="text" class="form-control fw-bold"
                                               placeholder="Name Or Phone" name="search">
                                        <input class="form-control" name="scheduleDate"
                                               type="date">

                                        <button type="submit" class="input-group-text input-group-addon">
                                           Search
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="row gx-4">
                            @foreach($tables as $table)
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <a href="#" data-bs-toggle="modal"
                                   class="pos-table-booking card">
                                    <div class="card-body p-1">
                                        <div class="pos-table-booking-container">
                                            <div class="pos-table-booking-header">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-1">
                                                        <div class="title">TABLE</div>
                                                        <div class="no">{{$table->name}}</div>
                                                        <div class="desc">max {{$table->number_of_chairs}} pax</div>
                                                    </div>
                                                    <div class="text-white text-opacity-25">
                                                        <i class="bi bi-dash-circle fa-3x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pos-table-booking-body">
                                                @foreach($table->Reservations as $Reservation)
                                                <div class="booking">
                                                    <div class="time"s>{{$Reservation->startTime}} -- {{$Reservation->endTime}}</div>
                                                    <div class="info">
                                                        {{$Reservation->customer_name}}
                                                        -- {{$Reservation->customer_phone}}
                                                    </div>
                                                    @if($Reservation->status == 'active')
                                                        <div class="status in-progress">
                                                            <i class="fa fa-circle"></i></div>
                                                    @elseif($Reservation->status == 'Completed')
                                                        <div class="status completed">
                                                            <i class="fa fa-circle"></i></div>
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                </a>
                            </div>


                            @endforeach
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 779px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 229px;"></div></div></div>
            </div>


            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>

        </div>

        @if($search != null && $search->count() >0)
            <div class="row mr-2 ml-2 mt-2" >
                <h2>
                    Search
                </h2>
                <table id="datatableDefault" class="table text-nowrap w-100">
                    <thead>
                    <tr>
                        <td> # </td>
                        <td> Customer Name </td>
                        <td> Customer Phone </td>
                        <td> schedule Date -- Start Time  </td>
                        <td> status  </td>
                        <td> Operation  </td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; ?>
                    @foreach ($search as $Reservation)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $Reservation->customer_name }}</td>
                            <td>{{ $Reservation->customer_phone }}</td>
                            <td>{{ $Reservation->scheduleDate }} -- {{ $Reservation->startTime }}</td>
                            <td>{{ $Reservation->status }}</td>
                            <td>
                                @if( $Reservation->status == 'active')
                                <form class="form" method="POST"
                                      action="{{ route('Reservations.update',$Reservation->id) }}">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-primary btn-sm  round  box-shadow-2
                                            px-1"type="submit" >
                                        Completed Reservation
                                    </button>

                                </form>
                                @else
                                    --
                                @endif
                            </td>
                        </tr>
                    @endforeach
                     {{$search->links()}}
                    </tbody>
                </table>

            </div>

        @elseif($search != null && $search->count() ==0)
            <div class="row mr-2 ml-2 mt-2" >
                <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                        id="type-error">Not Result Search
                </button>
            </div>
        @endif
    </div>



    <div class="modal fade" id="AddReservation" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Reservation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('Reservations.store') }}"method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row row-space-10">
                                    <div class="col-6">
                                        <label class="form-label">Customer Name</label>
                                        <input class="form-control" name="customer_name"
                                               placeholder="Customer Name" value="{{old('customer_name')}}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Customer Phone</label>
                                        <input class="form-control" name="customer_phone"
                                               placeholder="Customer Phone(01...)" value="{{old('customer_phone')}}">
                                    </div>

                                    <div class="col-6 mt-2">
                                        <label class="form-label">schedule Date</label>
                                        <input class="form-control" name="scheduleDate"
                                               placeholder="schedule Date" type="date" value="{{old('scheduleDate')}}">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">Start Time</label>
                                                <input class="form-control" name="startTime"
                                                       placeholder="start Time" type="time" value="{{old('startTime')}}">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">End Time</label>
                                                <input class="form-control" name="endTime"
                                                       placeholder="End Time" type="time" value="{{old('endTime')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Table</label>
                                        <select name="table_id" class="form-select">
                                            @if($tables && $tables -> count() > 0)
                                                @foreach($tables as $table)
                                                    <option
                                                        value="{{$table->id }}">
                                                        {{$table->name}} -- {{$table->number_of_chairs}} Chairs</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('table_id')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                            </div>

                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-theme">Save</button>
                        </div>
                    </form>

                </div>
            </div>
    </div>


@endsection



@section('js')
            <script>
                var date = new Date(<?php echo $currentTime['year'] .",".
                    $currentTime['mon'] .",".
                    $currentTime['mday'] .",".
                    $currentTime['hours'] .",".
                    $currentTime['minutes'] .",".
                    $currentTime['seconds']; ?>);
                setInterval(function() {
                    date.setSeconds(date.getSeconds() + 1);
                    $('.clock').html((date.getHours() +':' + date.getMinutes() + ':' + date.getSeconds() ));
                    {{-- console.log((date.getHours() +':' + date.getMinutes() + ':' + date.getSeconds() )); --}}
                }, 1000);
            </script>



@endsection
