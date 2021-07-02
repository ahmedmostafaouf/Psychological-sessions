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
                                    <img src="../../assets/images/users/defult.png" class="rounded-circle" width="150" />
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
                                <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                            </li>
                        </ul>
                        <!-- Tabs -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>{{auth('doctor')->user()->name}}</strong>
                                            <br>
                                            <p class="text-muted"> @if(empty(auth('doctor')->user()->main_focus)) Main Focus Here....  @else {{auth('doctor')->user()->main_focus}} @endif</p>
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
                                    <h4 class="font-medium m-t-30">Experiences</h4>

                                    <hr>
                                    @if(empty(auth('doctor')->user()->experiences)) Experiences Here....

                                    @else
                                        {!! auth('doctor')->user()->experiences !!}
                                    @endif
                                        <h4 class="font-medium m-t-30">Certificates</h4>
                                    <hr>
                                    @if(empty(auth('doctor')->user()->certificates)) Certificates Here....

                                    @else
                                        {!! auth('doctor')->user()->certificates !!}
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body wizard-content">

                                                <form action="{{route('doctor.profile.edit')}}"
                                                      class="validation-wizard wizard-circle mt-5"
                                                      enctype="multipart/form-data" method="POST">
                                                @csrf
                                                    <input type="hidden" name="id" value="{{auth('doctor')->user()->id}}">
                                                    <input type="hidden" name="gender" value="{{auth('doctor')->user()->gender}}">
                                                    <input type="hidden" name="is_complete" value="1">
                                                <!-- Step 1 -->
                                                    <h6>Step 1</h6>
                                                    <section>
                                                        <!--Heading -->
                                                        <div class="row">
                                                            <h2> Basic Information</h2>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wfirstName2"> Name : <span class="danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control required" id="wfirstName2"
                                                                           name="name" value="{{auth('doctor')->user()->name}}">
                                                                    @error("name")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wphoneNumber2">Email :</label>
                                                                    <input type="email" name="email" value="{{auth('doctor')->user()->email}}" class="form-control required"
                                                                           id="wphoneNumber2">
                                                                    @error("email")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="row">

                                                            {{--Field--}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wintType1">Field :</label>
                                                                    <select class="custom-select form-control required" id="wintType1"
                                                                            data-placeholder="Type to search cities" name="field_id"
                                                                            onclick="console.log($(this).val())">
                                                                        <option value="">Select your Field.</option>

                                                                        @foreach($fields as $field)
                                                                            <option @if(auth('doctor')->user()->field_id==$field->id) selected @endif value="{{$field->id}}">{{$field->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <small class="form-control-feedback"> Select your Field. </small>
                                                                    @error("field_id")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wdate2">phone :</label>
                                                                    <input type="tel" value= "{{auth('doctor')->user()->phone}}"  name="phone" class="form-control required" id="wdate2">
                                                                    @error("phone")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <h4 class="card-title m-t-20">Language Multiple</h4>
                                                                    <select class="select2 js-programmatic-multiple form-control select2-hidden-accessible" id="programmatic-multiple" multiple="" style="width: 100%;height: 36px;" data-select2-id="programmatic-multiple" tabindex="-1" aria-hidden="true" name="lang[]">
                                                                        <optgroup label="Language" data-select2-id="273">

                                                                            @if(auth('doctor')->user()->lang)


                                                                                    @foreach(auth('doctor')->user()->lang as $index => $lang)
                                                                                        <option selected   value="{!! $lang !!}" data-select2-id="{{$index+1}}"  >
                                                                                            {!! $lang !!}</option>
                                                                                    @endforeach
                                                                            @else
                                                                                <option  value="Arabic" >Arabic</option>
                                                                                <option value="English" >English</option>
                                                                                <option value="French" >French</option>


                                                                            @endif
                                                                        </optgroup>
                                                                    </select>
                                                                    <div class="btn-group btn-group-sm m-t-10" role="group" aria-label="Programmatic setting and clearing Select2 options">
                                                                        <button type="button" class="js-programmatic-multi-set-val btn btn-outline-primary">
                                                                            Set to New Mexico and Utah
                                                                        </button>
                                                                        <button type="button" class="js-programmatic-multi-clear btn btn-outline-primary">
                                                                            Clear
                                                                        </button>
                                                                    </div>
                                                                    @error("lang")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror

                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="wdate2">Session 1 hour Price :</label>
                                                                    <input type="number" value= "{{auth('doctor')->user()->session_price}}"  name="session_price" class="form-control required" id="wdate2">
                                                                    @error("session_price")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </section>


                                                    <!-- Step 2 -->
                                                    <h6>Step 2</h6>
                                                    <section>
                                                        <!--Heading -->
                                                        <div class="row">
                                                            <h2> Cv & Image </h2>
                                                        </div>
                                                        <div class="row">

                                                            {{--cv--}}
                                                            <div class="col-md-6">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="cv" id="cv" placeholder="cv">
                                                                    <label for="exampleInputPassword1" class="custom-file-label form-control">Choose Cv</label>
                                                                    @error("cv")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                                <small class="form-control-feedback text-danger"> pdf or img or word. </small>
                                                            </div>
                                                            {{--Image--}}
                                                            <div class="col-md-6">
                                                                <div class="custom-file">

                                                                    <input type="file" class="custom-file-input" name="doctor_image" id="doctor_image" placeholder="doctor image">

                                                                    <label for="exampleInputPassword1" class="custom-file-label form-control">Choose Image</label>
                                                                    @error("doctor_image")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                                <small class="form-control-feedback text-danger"> jpg or png or jpeg. </small>

                                                            </div>
                                                            {{--main foucs--}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wintType1">Main Focus :</label>
                                                                    <textarea class="form-control" name="main_focus" required> {{auth('doctor')->user()->main_focus}}</textarea>
                                                                    <small class="form-control-feedback"> Select your Main Focus. </small>
                                                                    @error("main_focus")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror

                                                                </div>
                                                            </div>
                                                            {{--specialties--}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wintType1">Specialties :</label>
                                                                    <textarea class="form-control" name="specialties" required>{{auth('doctor')->user()->specialties}}</textarea>
                                                                    <small class="form-control-feedback"> Select your Main specialties. </small>
                                                                    @error("specialties")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <!-- Step 3 -->
                                                    <h6>Step 3</h6>
                                                    <section>
                                                        <!--Heading -->
                                                        <div class="row">
                                                            <h2> Experiments & Education & etc</h2>
                                                        </div>
                                                        <!-- Another Info-->
                                                        <div class="row">
                                                            {{--Field--}}
                                                <div class="content">
                                                                {{--Certificates--}}
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Certificates</h4>
                                                                    <textarea class="summernote" name="certificates">
                                                {!! auth('doctor')->user()->certificates !!}
                                            </textarea>
                                                                    <small class="form-control-feedback"> Select your Certificates. </small>
                                                                    @error("certificates")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                                {{--end --}}

                                                                {{--Experiences--}}
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Experiences</h4>
                                                                    <textarea class="summernote" name="experiences">
                                                                            {!! auth('doctor')->user()->experiences !!}
                                                                    </textarea>
                                                                    <small class="form-control-feedback"> Select your Experiences. </small>
                                                                    @error("experiences")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                                {{-- End Experiences--}}
                                                        </div>
                                                        </div>
                                                    </section>

                                                </form>
                                            </div>
                                        </div>
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
        <!--    wizard scripts    -->


            <!-- This Page JS -->
            <script src="{{asset('assets/libs/summernote/dist/summernote-bs4.min.js')}}"></script>
            <script src="{{asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
            <script src="{{asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>




            <script>
                var form = $(".validation-wizard").show();
                $(".validation-wizard").steps({
                    headerTag: "h6",
                    bodyTag: "section",
                    transitionEffect: "fade",
                    titleTemplate: '<span class="step">#index#</span> #title#',
                    labels: {
                        submit: ".finsh"

                    },
                    onStepChanging: function (event, currentIndex, newIndex) {
                        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                    },
                    onFinishing: function (event, currentIndex) {
                        return form.validate().settings.ignore = ":disabled", form.valid()
                        form.submit();

                    },
                    onFinished: function (event, currentIndex) {
                        form.submit()
                    }
                }), $(".validation-wizard").validate({
                    ignore: "input[type=hidden]",
                    errorClass: "text-danger",
                    successClass: "text-success",
                    highlight: function (element, errorClass) {
                        $(element).removeClass(errorClass)
                    },
                    unhighlight: function (element, errorClass) {
                        $(element).removeClass(errorClass)
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element)
                    },
                    rules: {
                        email: {
                            email: !0
                        }
                    }
                })
            </script>


            <script>
                /************************************/
                //default editor
                /************************************/
                $('.summernote').summernote({
                    height: 300, // set editor height
                    width: 591, // set editor height
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['insert', ['link', 'hr']],
                        ['view', ['fullscreen']],
                    ],
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false // set focus to editable area after initializing summernote
                });

                /************************************/
                //inline-editor
                /************************************/
                $('.inline-editor').summernote({
                    airMode: true
                });

                /************************************/
                //edit and save mode
                /************************************/
                window.edit = function () {
                    $(".click2edit").summernote()
                },
                    window.save = function () {
                        $(".click2edit").summernote('destroy');
                    }

                var edit = function () {
                    $('.click2edit').summernote({focus: true});
                };

                var save = function () {
                    var markup = $('.click2edit').summernote('code');
                    $('.click2edit').summernote('destroy');
                };

                /************************************/
                //airmode editor
                /************************************/
                $('.airmode-summer').summernote({
                    airMode: true
                });
            </script>

        <!--This page JavaScript -->
            <!-- This Page JS -->
            <script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
            <script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
            <script src="{{asset('dist/js/pages/forms/select2/select2.init.js')}}"></script>

    @endpush
</x-dashboard.app>
