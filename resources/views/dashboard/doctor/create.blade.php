<x-dashboard.app>
@push('css')
    <!-- This Page CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/summernote/dist/summernote-bs4.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
        <link href="{{asset('assets/libs/jquery-steps/jquery.steps.css')}}" rel="stylesheet">
        <link href="{{asset('assets/libs/jquery-steps/steps.css')}}" rel="stylesheet">
    @endpush
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <div class="row">
                <h2> Create Doctor </h2>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body wizard-content">

                            <form action="{{route('doctors.store')}}"
                                  class="validation-wizard wizard-circle mt-5"
                                  enctype="multipart/form-data" method="POST">
                            @csrf
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
                                                       name="name">
                                                @error("name")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wphoneNumber2">Email :</label>
                                                <input type="email" name="email" class="form-control required"
                                                       id="wphoneNumber2">
                                                @error("email")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wfirstName2"> Password : <span class="danger">*</span>
                                                </label>
                                                <input type="password" class="form-control required" id="wfirstName3"
                                                       name="password">
                                                @error("password")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wdate2">Confirm Password :</label>
                                                    <input type="password" name="password_confirmation" class="form-control required" id="wdate1">
                                                    @error("password")
                                                    <span class="text-danger">{{$message}} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wdate2">phone :</label>
                                                <input type="tel" name="phone" class="form-control required" id="wdate2">
                                                @error("phone")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wlastName2"> Gender : <span class="danger">*</span>
                                                </label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="gender" value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Female</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="gender" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Male</label>
                                                </div>
                                                @error("gender")
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
                                        <h2> Cv & Image & Language</h2>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="card-title m-t-20">Language Multiple</h4>
                                                    <select class="select2 js-programmatic-multiple form-control select2-hidden-accessible" id="programmatic-multiple" multiple="" style="width: 100%;height: 36px;" data-select2-id="programmatic-multiple" tabindex="-1" aria-hidden="true" name="lang[]">
                                                        <optgroup label="Language" data-select2-id="273">
                                                            <option value="Ar" data-select2-id="274">Arabic</option>
                                                            <option value="En" data-select2-id="275">English</option>
                                                            <option value="Fr" data-select2-id="276">French</option>
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
                                                <textarea class="form-control" name="main_focus" required></textarea>
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
                                                <textarea class="form-control" name="specialties" required></textarea>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="wintType1">Field :</label>
                                                <select class="custom-select form-control required" id="wintType1"
                                                        data-placeholder="Type to search cities" name="field_id"
                                                        onclick="console.log($(this).val())">
                                                    <option value="">Select your Field.</option>

                                                    @foreach($fields as $field)
                                                        <option value="{{$field->id}}">{{$field->name}}</option>
                                                    @endforeach
                                                </select>
                                                <small class="form-control-feedback"> Select your Field. </small>
                                                @error("field_id")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        {{--Certificates--}}
                                            <div class="form-group">
                                                <h4 class="card-title">Certificates</h4>
                                                <textarea class="summernote" name="certificates">
                                                Default Summernote
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
                                                Default Summernote
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
                <!-- row -->
            </div>
            <x-dashboard.footer></x-dashboard.footer>
        </div>
    </div>

    @push('scripts')

    <!--    wizard scripts    -->
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


    <!-- This Page JS -->
        <script src="{{asset('assets/libs/summernote/dist/summernote-bs4.min.js')}}"></script>
        <script>
            /************************************/
            //default editor
            /************************************/
            $('.summernote').summernote({
                height: 350, // set editor height
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

        <!-- This Page JS -->
        <script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
        <script src="{{asset('dist/js/pages/forms/select2/select2.init.js')}}"></script>




    @endpush
</x-dashboard.app>
