<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<aside class="left-sidebar" data-sidebarbg="skin4">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic">
                            @if(auth('doctor')->user()->getMedia("doctor_image")->first())
                                <img class="rounded-circle" src="{{auth('doctor')->user()->getMedia("doctor_image")->first()->getFullUrl()}}"
                                     width="40"></td>
                            @else
                                <img src="../../assets/images/users/defult.png" class="rounded-circle" width="50" />
                            @endif

                        </div>
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium"> {{auth('doctor')->user()->name}}
                                    <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email">{{auth('doctor')->user()->email}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="{{route('doctor.profile')}}"><i
                                        class="ti-user mr-1 ml-1"></i> My Profile</a>
                                <a class="dropdown-item" href="{{url('doctor/profile#previous-month')}}"><i
                                        class="ti-wallet mr-1 ml-1"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('doctor.forget.password')}}"><i
                                        class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}"><i
                                        class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
               @doctor
                <!--dashboard-->
                <li class="nav-small-cap">
                    
                    <span class="hide-menu">Dashboard</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href='{{route('doctor.dashboard')}}' aria-expanded="false">
                        <i class="mdi mdi-view-dashboard">
                        </i><span class="hide-menu">Dashboard</span></a>
                </li>

                <!--end dashboard-->
                <li class="nav-small-cap"> <span
                        class="hide-menu">Doctors</span></li>

                    <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                                href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-calendar"></i><span class="hide-menu">My Schedule </span></a>
                        {{-- start Field tree--}}
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{route('doctor.scheduler.calender')}}" class="sidebar-link"><i class="ti-calendar"></i><span class="hide-menu">
                                    FullCalender Schedules </span></a></li>
                            <li class="sidebar-item"><a href="{{route('schedule.index')}}" class="sidebar-link"><i class="ti-alarm-clock"></i><span class="hide-menu">
                                    All Schedules </span></a></li>
                            <li class="sidebar-item"><a href="{{route('doctor.day.schedule')}}" class="sidebar-link"><i class="ti-new-window"></i><span class="hide-menu">
                                    This Day Schedules </span></a></li>
                            <li class="sidebar-item"><a href="{{route('doctor.weak.schedule')}}" class="sidebar-link"><i class="ti-calendar"></i><span class="hide-menu">
                                    This Weak Schedules </span></a></li>
                            <li class="sidebar-item"><a href="{{route('doctor.after.week.schedule')}}" class="sidebar-link"><i class="ti-agenda"></i><span class="hide-menu">
                                    After Week Schedules </span></a></li>
                        </ul>
                    {{-- end Field tree--}}
                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-comment-question-outline"></i><span class="hide-menu">Questions & Answer </span></a>
                    {{-- start question tree--}}
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('doctor.question')}}"
                                                    class="sidebar-link"><i class="ti-info"></i><span class="hide-menu">
                                    Question information </span></a></li>
                    </ul>
                    {{-- end question tree--}}
                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-seal"></i><span class="hide-menu"> Meeting </span></a>
                    {{-- start meeting tree--}}
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('doctor.meeting.all')}}"
                                                    class="sidebar-link"><i class="ti-alarm-clock"></i><span class="hide-menu"> All Meeting </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('doctor.meeting')}}"
                                                    class="sidebar-link"><i class="ti-new-window"></i><span class="hide-menu"> Meeting Now </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('doctor.meeting.tomorrow')}}"
                                                    class="sidebar-link"><i class="ti-agenda"></i><span class="hide-menu"> Meeting Tomorrow </span></a>
                        </li>
                    </ul>
                {{-- end meeting tree--}}

                {{-- end Doctor--}}

                <li class="nav-small-cap"> <span
                        class="hide-menu">Settings</span></li>

                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-face-profile"></i><span class="hide-menu">Profile </span></a>
                    {{-- start Profile tree--}}
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('doctor.profile')}}"
                                                    class="sidebar-link"><i class="ti-user"></i><span class="hide-menu"> Show Profile </span></a>
                        </li>
                    </ul>
                    {{-- end profile tree--}}

                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-settings"></i><span class="hide-menu"> Settings </span></a>
                    {{-- start Profile tree--}}
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('doctor.forget.password')}}"
                                                    class="sidebar-link"><i class="mdi mdi-account-settings"></i><span class="hide-menu"> Change Password </span></a>
                        </li>
                    </ul>
                    {{-- end profile tree--}}


                        @enddoctor

                                <!--  Admin Sidebar    -->
                        @admin
                <!--dashboard-->
                <li class="nav-small-cap">
                   
                    <span class="hide-menu">Dashboard</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href='{{route('admin.dashboard')}}' aria-expanded="false">
                        <i class="mdi mdi-view-dashboard">
                        </i><span class="hide-menu">Dashboard</span></a>
                </li>

                <!--end dashboard-->

                <li class="nav-small-cap">
                   
                    <span class="hide-menu">Users</span></li>
                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-certificate"></i><span class="hide-menu">Fields </span></a>
                    {{-- start Field tree--}}
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('fields.create')}}"
                                                    class="sidebar-link"><i class="ti-plus"></i><span class="hide-menu"> Create Field </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('fields.index')}}"

                                                    class="sidebar-link"><i class="ti-list"></i><span class="hide-menu">
                                    Fields information </span></a></li>
                    </ul>
                {{-- end Field tree--}}


                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-account-card-details"></i><span class="hide-menu">Patients </span></a>
                    {{-- start patient tree--}}
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('patients.index')}}"
                                                    class="sidebar-link"><i class="ti-plus"></i><span class="hide-menu"> Create Patients </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('patients.index')}}"

                                                    class="sidebar-link"><i class="ti-list"></i><span class="hide-menu">
                                    Patient information </span></a></li>
                    </ul>
                {{-- end patient tree--}}

                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="fas fa-user-md"></i><span class="hide-menu">Doctors </span></a>
                    {{-- start doctors tree--}}
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('doctors.create')}}"
                                                    class="sidebar-link"><i class="ti-plus"></i><span class="hide-menu"> Create Doctor </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('doctors.index')}}"

                                                    class="sidebar-link"><i class="ti-list"></i><span class="hide-menu">
                                    Doctors information </span></a></li>
                    </ul>
                {{-- end doctor tree--}}



                <li class="nav-small-cap">

                    <span class="hide-menu">Appointment</span></li>
                <!-- start Schedule tree -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                       href="javascript:void(0)"
                       aria-expanded="false">
                        <i class="fa fa-calendar"></i><span class="hide-menu">Schedule Doctor </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <li class="sidebar-item"><a href="{{route('schedules.index')}}"

                                                    class="sidebar-link"><i class="ti-list"></i><span class="hide-menu">
                                    Schedule information </span></a></li>
                    </ul>
                    <!-- end Universities tree -->

                    <!-- start Meeting tree -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                       href="javascript:void(0)"
                       aria-expanded="false">
                        <i class="fas fa-handshake"></i><span class="hide-menu">Meeting </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('admin.meeting.all')}}" class="sidebar-link"><i class="mdi mdi-video"></i><span class="hide-menu">
                                    Show All Meeting </span></a></li>

                        <li class="sidebar-item"><a href="{{route('admin.meeting')}}" class="sidebar-link"><i class="mdi mdi-video"></i><span class="hide-menu">
                                    Show Today Meeting </span></a></li>
                        <li class="sidebar-item"><a href="{{route('admin.meeting.tomorrow')}}" class="sidebar-link"><i class="mdi mdi-video"></i><span class="hide-menu">
                                    Show Tomorrow Meeting </span></a></li>

                    </ul>
                    <!-- end Meeting tree -->


                    <!-- start Questions tree -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                       href="javascript:void(0)"
                       aria-expanded="false">
                        <i class="fas fa-question-circle"></i><span class="hide-menu">Questions </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('questions.show')}}"
                                                    class="sidebar-link"><i class="fas fa-question"></i><span class="hide-menu">
                                All Questions  </span></a></li>
                    </ul>
                    <!-- end Department tree -->
                    @endadmin


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
