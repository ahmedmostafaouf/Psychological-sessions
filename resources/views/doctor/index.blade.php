<x-dashboard.app>
    @push('css')
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    @endpush
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Summery -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- crypto -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card "style="background-color: #393e46">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-2">
                                    <h1 class="mb-0"><i style="color: #0b0b0b" class="fas fa-user"></i></h1></div>
                                <div>
                                    <h6 class="font-12 text-white mb-1 op-7">Total/ Scheduler</h6>
                                    <h6 class="text-white font-medium mb-0">-- {{DB::table('doctor_schedules')->where('doctor_id',auth('doctor')->user()->id)->count()}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="crypto"></div>
                                </div>
                            </div>
                            <div class="row text-center text-white mt-4">

                                <div class="col-12">
                                    <span class="font-14 d-block">Show All</span>
                                    <a href="{{route('schedule.index')}}" class="font-medium"><i class="fas fa-arrow-up"></i>Go--</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- crypto -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card"style="background-color: #29a19c">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-2">
                                    <h1 class="mb-0"><i class="fas fa-user-md" style="color: #1a1a1a"></i></h1></div>
                                <div>
                                    <h6 class="font-12 text-white mb-1 op-7">Total / Answer Patient Question</h6>
                                    <h6 class="text-white font-medium mb-0">-- {{DB::table('answers')->where('doctor_id',auth('doctor')->user()->id)->count()}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="crypto"></div>
                                </div>
                            </div>
                            <div class="row text-center text-white mt-4">
                                <div class="col-12">
                                    <span class="font-14 d-block">Show All</span>
                                    <a href="{{route('doctor.question')}}" class="font-medium"><i class="fas fa-arrow-up"></i>Go--</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- crypto -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card" style="background-color: #222831">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-2">
                                    <h1 class="mb-0"><i class="fas fa-hospital" style="color: #1a1a1a"></i></h1></div>
                                <div>
                                    <h6 class="font-12 text-white mb-1 op-7">Total / Meeting</h6>
                                    <h6 class="text-white font-medium mb-0">-- {{DB::table('mettings')->where('doctor_id',auth('doctor')->user()->id)->count()}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="crypto"></div>
                                </div>
                            </div>
                            <div class="row text-center text-white mt-4">

                                <div class="col-12">
                                    <span class="font-14 d-block">Show All</span>
                                    <a href="{{route('doctor.meeting.all')}}" class="font-medium"><i class="fas fa-arrow-up"></i>Go--</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales Summery -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Meeting</h4>
                                    <h5 class="card-subtitle">Overview of Meetings</h5>
                                </div>
                            </div>
                            <!-- title -->
                            {!! $calendar->calendar() !!}
                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Questions</h4>
                        </div>
                        <div class="comment-widgets scrollable" style="height:560px;">
                          @foreach($questions as $question)
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row mt-0">
                                <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">{{$question->patient->name}}</h6>
                                    <span class="mb-3 d-block">{{$question->text}} </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">{{$question->created_at->diffForHumans()}}</span> <span class="label label-rounded label-primary">{{$question->getStatus()}}</span> <span class="action-icons">
                                                    <a href="javascript:void(0)" title="{{$question->answer->text}}"><i class="ti-eye"></i></a>

                                                </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                              @endforeach

                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Chats</h4>
                            <div class="chat-box scrollable" style="height:475px;">
                                <!--chat Row -->
                                <ul class="chat-list">
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/1.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">James Anderson</h6>
                                            <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                        </div>
                                        <div class="chat-time">10:56 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/2.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Bianca Doe</h6>
                                            <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-time">10:57 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">I would love to join the team.</div>
                                            <br>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                            <br>
                                        </div>
                                        <div class="chat-time">10:59 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/3.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Angelina Rhodes</h6>
                                            <div class="box bg-light-info">Well we have good budget for the project</div>
                                        </div>
                                        <div class="chat-time">11:00 am</div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-field mt-0 mb-0">
                                        <textarea id="textarea1" placeholder="Type and enter" class="form-control border-0"></textarea>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a class="btn-circle btn-lg btn-cyan float-right text-white" href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <x-dashboard.footer></x-dashboard.footer>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>>
        {!! $calendar->script() !!}
    @endpush
</x-dashboard.app>
