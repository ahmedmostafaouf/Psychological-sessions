<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/style-profile.css')}}">
    @endpush
    <section class="profile">
        <div class="container">
            <div class="col-lg-12 col-xlg-12 col-md-12">

                <div class="profile-content">

                    <div class="profile-title">
                        @if(auth('web')->user()->getMedia('patient_image')->first())
                            <img src="{{auth('web')->user()->getMedia('patient_image')->first()->getFullUrl()}}" alt="the_doctor">
                        @else
                        @endif
                        <h3 class="prfile-name">{{auth('web')->user()->name}}</h3>
                        <p>{{auth('web')->user()->phone}}</p>
                        <span class="profile-session"><i class="fa fa-quote-right fa-sm"></i>{{auth('web')->user()->dob}}</span>
                    </div> <!-- ./profile-title -->
                    <div class="profile-info">
                        <div class="profile-info-caption"> <span>Basic Info</span> </div>
                        <div class="profile-info-desc"> <span>Language :</span> English And Arabic</div>
                        <div class="profile-info-desc"> <span>Country of Residence :</span> Egypt</div>
                        <div class="profile-info-desc"> <span>Joining Date :</span> 9 months ago</div>
                        <div class="profile-info-desc"> <span>Email :</span>  {{auth('web')->user()->email}}</div>
                        <div class="profile-info-desc"> <span>Address :</span> {{auth('web')->user()->address}}</div>
                    </div> <!-- ./profile-info -->
                </div> <!-- ./profile-content -->
            </div>
        </div> <!-- ./container -->
    </section>

    <section class="profile-review">
        <div class="container">

            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="alert alert-info">
                        <h4> Meeting This Today </h4>
                    </div>
                    <br>
                    <div class="table-responsive-lg">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Comment To Doctor</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">Date</th>
                                <th scope="col">Meeting Id</th>
                                <th scope="col">Meeting Password</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($meetingsToday as $index=> $meeting)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <th >{{$meeting->doctor->name}}</th>
                                    <td>{{$meeting->topic}}</td>
                                    <td>{{$meeting->start_time->format('h:i:A')}}</td>
                                    <td>{{$meeting->start_time->format('D')}}</td>
                                    <td>{{$meeting->meeting_id}}</td>
                                    <td>{{$meeting->metting_pass}}</td>
                                </tr>
                            @empty
                                No Meeting Now
                            @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="alert alert-info">
                        <h4> Meeting This Now Enroll Please </h4>
                    </div>
                    <br>
                    <div class="table-responsive-lg">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Comment To Doctor</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Date</th>
                            <th scope="col">Meeting Id</th>
                            <th scope="col">Meeting Password</th>
                            <th scope="col">Meeting Url</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($meetings as $index=> $meeting)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <th >{{$meeting->doctor->name}}</th>
                            <td>{{$meeting->topic}}</td>
                            <td>{{$meeting->start_time->format('h:i:A')}}</td>
                            <td>{{$meeting->start_time->format('D')}}</td>
                            <td>{{$meeting->meeting_id}}</td>
                            <td>{{$meeting->metting_pass}}</td>
                            <td>
                                @if($meeting->start_time <= Carbon\Carbon::now()) <a  href="{{$meeting->join_url}}" class="btn btn-primary" target="_blank"> Start </a>
                                @else
                                    <a class="btn btn-danger" disabled target="_blank"> Disabled </a>
                                @endif

                            </td>

                        </tr>

                        </tbody>
                        @empty
                            <p> No Meeting Now</p>
                        @endforelse
                    </table>
                    </div>
                </div>
                <div class="card">
                    <div class="alert alert-info">
                        <h4> Meeting Tomorrow </h4>
                    </div>
                    <br>
                    <div class="table-responsive-lg">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Comment To Doctor</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">Date</th>
                                <th scope="col">Meeting Id</th>
                                <th scope="col">Meeting Password</th>
                                <th scope="col">Meeting Url</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($meetingsTomorrow as $index=> $meeting)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <th >{{$meeting->doctor->name}}</th>
                                    <td>{{$meeting->topic}}</td>
                                    <td>{{$meeting->start_time->format('h:i:A')}}</td>
                                    <td>{{$meeting->start_time->format('D')}}</td>
                                    <td>{{$meeting->meeting_id}}</td>
                                    <td>{{$meeting->metting_pass}}</td>
                                    <td>
                                        @if($meeting->start_time <= Carbon\Carbon::now()) <a  href="{{$meeting->join_url}}" class="btn btn-primary" target="_blank"> Start </a>
                                        @else
                                            <a class="btn btn-danger" disabled target="_blank"> Disabled </a>
                                        @endif

                                    </td>

                                </tr>
                            @empty
                                <p> No Meeting Today</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- ./container -->
    </section>
</x-front.app>

