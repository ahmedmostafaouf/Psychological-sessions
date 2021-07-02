<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/style-profile.css')}}">
    @endpush
        <section class="profile">
            <div class="container">
                <div class="col-lg-12 col-xlg-12 col-md-12">

                <div class="profile-content">

                    <div class="profile-title">
                        @if($doctor->getMedia('doctor_image')->first())
                        <img src="{{$doctor->getMedia('doctor_image')->first()->getFullUrl()}}" alt="the_doctor">
                        @else
                            <img src="{{asset('front/assets/images/default.png')}}" alt="the_doctor">

                        @endif
                        <h3 class="prfile-name">{{$doctor->name}}</h3>
                        <p>{{$doctor->fields->name}}</p>
                        <div class="profile-star">
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <span>4.91 (275 rev)</span>
                        </div> <!-- ./profile-star -->
                        <span class="profile-session"><i class="fa fa-quote-right fa-sm"></i>1000+ Sessions</span>
                    </div> <!-- ./profile-title -->
                    <div class="profile-info">
                        <div class="profile-info-caption"> <span>Basic Info</span> </div>
                        <div class="profile-info-desc"> <span>Language :</span> English And Arabic</div>
                        <div class="profile-info-desc"> <span>Country of Residence :</span> Egypt</div>
                        <div class="profile-info-desc"> <span>Joining Date :</span> {{$doctor->created_at->diffForHumans()}}</div>
                        <div class="profile-info-desc"> <span>Main focus :</span> @if($doctor->main_focus) {{$doctor->main_focus}}@else Not Complete profile @endif</div>
                        <div class="profile-info-desc"> <span>Specialties :</span> @if($doctor->specialties) {{$doctor->specialties}}@else Not Complete profile @endif</div>
                        <a href="{{route('patient.doctor.schedule',$doctor->id)}}"><button>Book Now</button></a>
                    </div> <!-- ./profile-info -->
                </div> <!-- ./profile-content -->
                </div>
            </div> <!-- ./container -->
        </section>

        <section class="profile-review">
            <div class="container">
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <!-- Tabs -->
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active"  id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Review</a>
                            </li>
                        </ul>
                        <!-- Tabs -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="card-body">
                                    <div class="profiletimeline m-t-0">

                                        <div class="profile-review-cv">
                                            <h4>Experience</h4>
                                            @if($doctor->experiences)
                                                {!! $doctor->experiences !!}
                                            @else
                                                Not Complete profile
                                            @endif

                                        <!-- Education -->
                                            <h4>Certificates</h4>
                                            @if($doctor->certificates)
                                                {!! $doctor->certificates !!}
                                            @else
                                                Not Complete profile
                                        @endif


                                        <!-- Links -->
                                            <h4>Links</h4>
                                            <div class="profile-review-links">
                                                <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                                <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                                <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                            </div>
                                        </div> <!-- ./profile-review-cv -->
                                    </div>
                                </div>
                            </div>
                            <!--  review tab        -->
                            <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                <div class="card-body">
                                    <div class="profiletimeline m-t-0">



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- ./container -->
        </section>
</x-front.app>
