<x-dashboard.app>
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- scroll horizontal & vertical -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="modal-effect btn waves-effect waves-light btn-info " style="position: absolute;top: 10px;right: 10px;" href="{{route('doctors.create')}}">Add Doctor</a>
                            <br>
                            <h4 class="card-title">Field</h4>
                            <h6 class="card-subtitle">In this example you can see DataTables doing both horizontal and vertical scrolling at the same time. Note also that pagination is enabled in this example, and the scrolling accounts for this.</h6>

                            <div class="table-responsive">
                                <table id="scroll_ver_hor" class="table table-striped table-bordered display nowrap" style="width:100%">
                                    <thead class="text-center">
                                    <tr>
                                        <th>ID#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>phone</th>
                                        <th>Field</th>
                                        <th>More Details</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{{$doctor->id}}</td>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->phone}}</td>
                                        <td>{{$doctor->Fields->name}}</td>
                                        <td><a href="{{route('doctors.show',$doctor->id)}}" class="btn btn-info btn-rounded"><i class="fa fa-eye"></i> Show</a>
                                        </td>
                                        <td>{{$doctor->getGender()}}</td>
                                        <td>{{$doctor->getStatus()}}</td>
                                        <td>
                                            <div class="button-group">
                                                <a href="{{route("doctors.edit",$doctor->id)}}"
                                                   class="btn btn-primary btn-rounded"><i class="fa fa-edit"></i>Edit
                                                </a>
                                                @if($doctor->status==0)
                                                <a href="{{route('change.status',$doctor->id)}}"
                                                   class="btn btn-light btn-rounded"><i class="fa fa-check"></i> Active
                                                </a>
                                                @else
                                                    <a href="{{route('change.status',$doctor->id)}}"
                                                       class="btn btn-warning btn-rounded"><i class="fa fa-window-close"></i> In Active
                                                    </a>
                                                    @endif
                                                <form method="post" action="{{route('doctors.destroy',$doctor->id)}}"
                                                      class="d-inline">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit"class="btn btn-danger btn-rounded"><i class="fa fa-cpanel"></i> Delete
                                                    </button>
                                                </form>
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
            </body>
    @endpush
</x-dashboard.app>
