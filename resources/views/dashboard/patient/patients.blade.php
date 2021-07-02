<x-dashboard.app>
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- scroll horizontal & vertical -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="modal-effect btn waves-effect waves-light btn-info " style="position: absolute;top: 10px;right: 10px;" href="#addPatient" data-effect="effect-scale" data-toggle="modal">Add Patient</a>
                            <br>
                            <h4 class="card-title">Patients</h4>
                            <h6 class="card-subtitle">In this example you can see DataTables doing both horizontal and vertical scrolling at the same time. Note also that pagination is enabled in this example, and the scrolling accounts for this.</h6>

                            <div class="table-responsive">
                                <table id="scroll_ver_hor" class="table table-striped table-bordered display nowrap" style="width:100%">
                                    <thead class="text-center">
                                    <tr>
                                        <th>ID#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date Of Barth</th>
                                        <th>Image</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patients as $patient)
                                    <tr>
                                        <td>{{$patient->id}}</td>
                                        <td>{{$patient->name}}</td>
                                        <td>{{$patient->email}}</td>
                                        <td>{{$patient->phone}}</td>
                                        <td>{{$patient->dob}}</td>
                                        <td>  @if($patient->getMedia("patient_image")->first())
                                                <img class="rounded" src="{{$patient->getMedia("patient_image")->first()->getFullUrl()}}"
                                                     width="50" height="50"></td>
                                        @else
                                            not set yet !
                                        @endif
                                        <td>{{$patient->gender}}</td>
                                        <td>{{$patient->status}}</td>
                                        <td>
                                            <div class="button-group">
                                                <a href="#editPatient"
                                                   data-effect="effect-scale" data-toggle="modal" data-id="{{$patient->id}}"
                                                   data-dob="{{$patient->dob}}" data-name="{{$patient->name}}" data-address="{{$patient->address}}"
                                                   data-phone="{{$patient->phone}}" data-email="{{$patient->email}}"

                                                   class="btn btn-primary btn-rounded"><i class="fa fa-edit"></i>Edit
                                                </a>
                                                <a href='#deletePatient'  data-toggle="modal"
                                                   data-id="{{$patient->id}}" data-name="{{$patient->name}}" data-email="{{$patient->email}}"
                                                   data-effect="effect-scale" class="btn btn-danger btn-rounded"><i class="fa fa-cpanel"></i> Delete
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- start add patients-->
            <div class="modal" id="addPatient">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add Patient</h6>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('patients.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1"> Name </label>
                                            <input type="text"  class="form-control" name="name">
                                            @error("name")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1">Email</label>
                                            <input type="email"  class="form-control" name="email" value="">
                                            @error("end_time")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1">Date Of Barth</label>
                                            <input type="date"  class="form-control" name="dob" >
                                            @error("dob")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                            <div class="col-6">
                                                    <label for="exampleFormControlTextarea1">Address</label>
                                                    <input type="text"  class="form-control" name="address" >
                                                    @error("address")
                                                    <span class="text-danger">{{$message}} </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="row">
                                       <div class="col-6">
                                           <label for="exampleFormControlTextarea1"> Password </label>
                                           <input type="password"  class="form-control" name="password">
                                           @error("password")
                                           <span class="text-danger">{{$message}} </span>
                                           @enderror
                                       </div>
                                        <div class="col-6">
                                                <label for="exampleFormControlTextarea1"> Password Confirmation </label>
                                                <input type="password"  class="form-control" name="password_confirmation">
                                                @error("password")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1"> phone </label>
                                            <input type="tel"  class="form-control" name="phone">
                                            @error("phone")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1"> Image </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="patient_image" id="patient_image" placeholder="Photo">

                                                <label for="exampleInputPassword1" class="custom-file-label form-control">Choose File</label>
                                            </div>
                                            @error("patient_image")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End add patients -->
            <!-- start edit patients-->
            <div class="modal" id="editPatient">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit Patient</h6>
                        </div>
                        <div class="modal-body">
                            <form action="patients/update" method="POST" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1"> Name </label>
                                            <input type="text"  class="form-control" name="name" id="name">
                                            @error("name")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1">Email</label>
                                            <input type="email"  class="form-control" name="email" id="email">
                                            @error("end_time")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1">Date Of Barth</label>
                                            <input type="date"  class="form-control" name="dob" id="dob">
                                            @error("dob")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1">Address</label>
                                            <input type="text"  class="form-control" name="address" id="address">
                                            @error("address")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1"> phone </label>
                                            <input type="tel"  class="form-control" name="phone" id="phone">
                                            @error("phone")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1"> Image </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="patient_image" id="patient_image" placeholder="Photo">
                                                <label for="exampleInputPassword1" class="custom-file-label form-control">Choose File</label>
                                            </div>
                                            @error("patient_image")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End edit patients -->

            <!-- start delete patients-->
            <div class="modal" id="deletePatient">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit Patient</h6>
                        </div>
                        <div class="modal-body">
                            <form action="patients/destory" method="POST" enctype="multipart/form-data">
                              @method('delete')
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <p class="text-center" style="font-size:20px; font-weight: bold;">Are you sure to delete the Patient?</p><br>                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1"> Name </label>
                                            <input type="text"  class="form-control" name="name" id="name" disabled>
                                            @error("name")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlTextarea1">Email</label>
                                            <input type="email"  class="form-control" name="email" id="email" disabled>
                                            @error("end_time")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End delete patients -->



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
                $('#editPatient').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var dob = button.data('dob')
                    var email = button.data('email')
                    var phone = button.data('phone')
                    var address = button.data('address')
                    var name = button.data('name')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #dob').val(dob);
                    modal.find('.modal-body #email').val(email);
                    modal.find('.modal-body #phone').val(phone);
                    modal.find('.modal-body #address').val(address);
                    modal.find('.modal-body #name').val(name);
                })
            </script>
            <script>
                $('#deletePatient').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var email = button.data('email')
                    var name = button.data('name')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #email').val(email);
                    modal.find('.modal-body #name').val(name);
                })
            </script>
            </body>
    @endpush
</x-dashboard.app>
