@extends('layout.master')
@section('content')
	<!-- BEGIN #app -->
	<div id="app" class="app">
		<!-- BEGIN #content -->
		<div id="content" class="app-content">
			<div class="card">
				<div class="card-body p-0">
					<!-- BEGIN profile -->
					<div class="profile">
						<!-- BEGIN profile-container -->
						<div class="profile-container">
							<!-- BEGIN profile-sidebar -->
							<div class="profile-sidebar">
								<div class="desktop-sticky-top">
									<div class="profile-img">
										<img src="{{asset($employees->photo)}}" alt="" />
									</div>
									<!-- profile info -->
									<h4>{{$employees->name}}</h4>
									<div class="mb-3 text-white text-opacity-50 fw-bold mt-n2">{{$employees->email}}</div>
									<p>
                                        Position : {{$employees->position}}
									</p>
                                    <p>
                                       Office : {{$employees->office}}
                                    </p>
									<div class="mb-1"> Address : {{$employees->address}}
									</div>
                                    <div class="mb-1"> Phone : {{$employees->phone}}
                                    </div>
									<div class="mb-3">
										<i class="fa fa-link fa-fw text-white text-opacity-50"></i> seantheme.com/hud
									</div>
								</div>
							</div>
							<!-- END profile-sidebar -->
                            <div class="profile-content">
                                <ul class="profile-tab nav nav-tabs nav-tabs-v2">
                                    <li class="nav-item">
                                        <a href="#change_info" class="nav-link active" data-bs-toggle="tab">
                                            <div class="nav-field">Change Info</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#change_Password" class="nav-link" data-bs-toggle="tab">
                                            <div class="nav-field">Change Password</div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="profile-content-container">
                                    <div class="row gx-4">
                                        <div class="col-xl-12">
                                            <div class="tab-content p-0">
                                                <!-- BEGIN tab-pane -->
                                                <div class="tab-pane fade show active" id="change_info">
                                                    <div class="card mb-3">
                                                        <div class="card-body">
                                                            <form action="{{ route('employee.update', $employees->id) }}" method="post"
                                                                  enctype="multipart/form-data">
                                                                {{ method_field('patch') }}
                                                                {{ csrf_field() }}
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Name</label>
                                                                    <input type="text" class="form-control" value="{{ $employees->name }}" name="name" id="exampleFormControlInput1" placeholder="Mahmoud Fathy" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Email</label>
                                                                    <input type="email" class="form-control" value="{{ $employees->email }}" name="email" id="exampleFormControlInput1" placeholder="name@example.com" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Phone</label>
                                                                    <input type="number" class="form-control" value="{{ $employees->phone }}" name="phone" id="exampleFormControlInput1" placeholder="01000000000" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">National Id</label>
                                                                    <input type="number" class="form-control" value="{{ $employees->nid }}" name="nid" id="exampleFormControlInput1" placeholder="2222522222222" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Age</label>
                                                                    <input type="number" class="form-control" value="{{ $employees->age }}" name="age" id="exampleFormControlInput1" placeholder="27" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Address</label>
                                                                    <input type="text" class="form-control" value="{{ $employees->address }}" name="address" id="exampleFormControlInput1" placeholder="cairo" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Salary</label>
                                                                    <input type="text" class="form-control" value="{{ $employees->salary }}" name="salary" id="exampleFormControlInput1" placeholder="1,000" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Start Date</label>
                                                                    <input type="date" class="form-control" value="{{ $employees->start_date }}" name="start_date" id="exampleFormControlInput1" placeholder="1/2/2022" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Position</label>
                                                                    <input type="text" class="form-control" value="{{ $employees->position }}" name="position"  id="exampleFormControlInput1" placeholder="manager" />
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="exampleFormControlInput1">Office</label>
                                                                    <input type="text" class="form-control" value="{{ $employees->office }}" name="office" id="exampleFormControlInput1" placeholder="officer" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Status" class="my-2">Status</label>
                                                                    <select class="form-select" name="status" value="{{ $employees->status }}">
                                                                        @if ($employees->status == 1)
                                                                            <option selected value="1">Available</option>
                                                                            <option value="0">Un Available</option>
                                                                        @else
                                                                            @if ($employees->status == 0)
                                                                                <option value="1">Available</option>
                                                                                <option selected value="0">Un Available</option>
                                                                            @endif
                                                                        @endif

                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Icon" class="my-2">Photo</label>
                                                                    <input type="file" class="form-control" name="photo" id="categoryImage" >
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
                                                <!-- END tab-pane -->

                                                <!-- BEGIN tab-pane -->
                                                <div class="tab-pane fade" id="change_Password">
                                                    <div class="list-group">
                                                        <form action="{{ route('employee.changePassword', $employees->id) }}" method="post">
                                                            {{ method_field('patch') }}
                                                            {{ csrf_field() }}

                                                            <label class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg bg-white bg-opacity-5" name="password" required autocomplete="new-password"/>
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                                                <input id="password-confirm" type="password" class="form-control form-control-lg bg-white bg-opacity-5" name="password_confirmation" required autocomplete="new-password"/>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <button class="btn btn-outline-success mt-4 animation-on-hover d-block w-100 text-center" type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- END tab-pane -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
						<!-- END profile-container -->
					</div>
					<!-- END profile -->
				</div>
				<div class="card-arrow">
					<div class="card-arrow-top-left"></div>
					<div class="card-arrow-top-right"></div>
					<div class="card-arrow-bottom-left"></div>
					<div class="card-arrow-bottom-right"></div>
				</div>
			</div>
		</div>
		<!-- END #content -->

		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #app -->
@endsection
