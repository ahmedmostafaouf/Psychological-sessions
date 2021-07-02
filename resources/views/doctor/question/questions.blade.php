<x-dashboard.app>
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">

                            <center class="m-t-30">   @if(auth('doctor')->user()->getMedia("doctor_image")->first())
                                    <img class="rounded-circle" width="150" height="120" src="{{auth('doctor')->user()->getMedia("doctor_image")->first()->getFullUrl()}}"></td>
                                @else
                                    <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle" width="150" />
                                @endif
                                <h4 class="card-title m-t-10">{{ auth('doctor')->user()->name}}</h4>
                                <h6 class="card-subtitle">{{ auth('doctor')->user()->main_focus}}</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                </div>
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{ auth('doctor')->user()->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>{{ auth('doctor')->user()->phone}}</h6> <small class="text-muted p-t-30 db">Address</small>
                            <h6>{{ auth('doctor')->user()->address}}</h6>
                            <div class="map-box">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div> <small class="text-muted p-t-30 db">Social Profile</small>
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
                                <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Questions</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Answers</a>
                            </li>
                        </ul>
                        <!-- Tabs -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="card-body">
                                    <div class="profiletimeline m-t-0">

                                         @forelse($asks as $ask)
                                            <form action="{{route('doctor.answer')}}" method="post" >
                                            @csrf
                                                <input type="hidden" name="id" value="{{$ask->id}}">

                                        <div class="sl-item">
                                            <div class="sl-left"> @if($ask->patient->getMedia("patient_image")->first())
                                                    <img class="rounded-circle" src="{{$ask->patient->getMedia("patient_image")->first()->getFullUrl()}}"></td>
                                                @else
                                                    <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle" />
                                                @endif </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">{{$ask->patient->name}}</a> <span class="sl-date">5 minutes ago</span>
                                                    <p class="m-t-10">{{$ask->text}}</p>
                                                </div>
                                                <div class="like-comm m-t-20"> <textarea name="answer" href="javascript:void(0)" class="form-control" placeholder="Answer Here...."></textarea> <br>
                                                    <button type="submit" class="btn btn-primary form-control"><i class="fa fa-comment text-danger"></i>Ans</button> </div>
                                            </div>
                                        </div>
                                        <hr>
                                            </form>
                                        @empty
                                              Not Questions
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                                      <!--  Answer tab        -->
                            <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                <div class="card-body">
                                    <div class="profiletimeline m-t-0">

                                        @forelse($answers as $answer)

                                                <input type="hidden" name="id" value="{{$answer->ask->patient_id}}">

                                                <div class="sl-item">
                                                    <div class="sl-left">
                                                        @if($answer->ask->patient->getMedia("patient_image")->first())
                                                            <img class="rounded-circle" src="{{$answer->ask->patient->getMedia("patient_image")->first()->getFullUrl()}}"></td>
                                                        @else
                                                            <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle" />
                                                        @endif
                                                    </div>
                                                </div>
                                                    <div class="sl-right">

                                                        <div><a href="javascript:void(0)" class="link">{{$answer->ask->patient->name}}</a> <span class="sl-date">5 minutes ago</span>
                                                            <p class="m-t-10">{{$answer->ask->text}}</p>
                                                        </div>
                                                        <div class="like-comm m-t-20"> <textarea name="answer" href="javascript:void(0)" class="form-control" readonly disabled placeholder="Answer Here....">{{$answer->text}}</textarea> <br>
                                                    </div>
                                                </div>
                                                <hr>
                                        @empty
                                            No Answers
                                        @endforelse
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
        <!--This page JavaScript -->
            <script src="../../assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
            <script src="../../assets/extra-libs/jquery.repeater/repeater-init.js"></script>
            <script src="../../assets/extra-libs/jquery.repeater/dff.js"></script>
            <!--This page plugins -->
            <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
            <script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>

            <script>
                $('#modaldemo9').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var field = button.data('field')
                    var doctor = button.data('doctor')
                    var text = button.data('text')
                    var patient = button.data('patient')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #field').val(field);
                    modal.find('.modal-body #doctor').val(doctor);
                    modal.find('.modal-body #text').val(text);
                    modal.find('.modal-body #patient').val(patient);
                })
            </script>

            </body>
    @endpush
</x-dashboard.app>
