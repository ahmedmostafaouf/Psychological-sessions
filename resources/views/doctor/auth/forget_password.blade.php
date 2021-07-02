<x-dashboard.app>
@push('css')
    <!-- This Page CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
        <link href="{{asset('assets/libs/jquery-steps/jquery.steps.css')}}" rel="stylesheet">
        <link href="{{asset('assets/libs/jquery-steps/steps.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/summernote/dist/summernote-bs4.css')}}">

    @endpush
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- scroll horizontal & vertical -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30">
                                @if(auth('doctor')->user()->getMedia("doctor_image")->first())
                                    <img class="rounded-circle" src="{{auth('doctor')->user()->getMedia("doctor_image")->first()->getFullUrl()}}"
                                         width="150"></td>
                                @else
                                    <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                                @endif


                                <h4 class="card-title m-t-10">{{auth('doctor')->user()->name}}</h4>
                                <h6 class="card-subtitle">{{auth('doctor')->user()->main_focus}}</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                </div>
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{auth('doctor')->user()->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>{{auth('doctor')->user()->phone}}</h6> <small class="text-muted p-t-30 db">Address</small>
                            <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>

                            <br/>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Tabs -->
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Change Password</a>
                            </li>
                        </ul>
                        <!-- Tabs -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>{{auth('doctor')->user()->name}}</strong>
                                            <br>
                                            <p class="text-muted">{{auth('doctor')->user()->main_focus}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted">{{auth('doctor')->user()->phone}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{auth('doctor')->user()->email}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                            <br>
                                            <p class="text-muted">Egypt</p>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Change Password</h4>
                                                        <h6 class="card-subtitle"> All with bootstrap element classies </h6>
                                                        <form class="mt-4" action="{{route('doctor.change.password')}}" method="post" >
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Old Password</label>
                                                                <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Old Password">
                                                                @error("old_password")
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                                <small id="emailHelp" class="form-text text-muted">Enter Old Password Please.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">New Password</label>
                                                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter New Password">
                                                                @error("password")
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                                <small id="emailHelp" class="form-text text-muted">Enter New Password Please.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Confirm Password</label>
                                                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
                                                                @error("password")
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                                <small id="emailHelp" class="form-text text-muted">Enter Confirm Password Please.</small>
                                                            </div>
                                                          <button class="btn btn-primary btn-block "> Change </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->


            <x-dashboard.footer></x-dashboard.footer>
        </div>
    </div>
    @push('scripts')

    @endpush
</x-dashboard.app>
