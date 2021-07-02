<x-dashboard.app>
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- scroll horizontal & vertical -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="modal-effect btn waves-effect waves-light btn-info " style="position: absolute;top: 10px;right: 10px;" href="{{route('fields.create')}}">Add Field</a>
                            <br>
                            <h4 class="card-title">Field</h4>
                            <h6 class="card-subtitle">In this example you can see DataTables doing both horizontal and vertical scrolling at the same time. Note also that pagination is enabled in this example, and the scrolling accounts for this.</h6>

                            <div class="table-responsive">
                                <table id="scroll_ver_hor" class="table table-striped table-bordered display nowrap" style="width:100%">
                                    <thead class="text-center">
                                    <tr>
                                        <th>ID#</th>
                                        <th>Name</th>
                                        <th>Short Description</th>
                                        <th>Photo</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fields as $field)
                                    <tr>
                                        <td>{{$field->id}}</td>
                                        <td>{{$field->name}}</td>
                                        <td>{{$field->short_description}}</td>
                                        <td>  @if($field->getMedia("photo")->first())
                                                <img class="rounded" src="{{$field->getMedia("photo")->first()->getFullUrl()}}"
                                                     width="50" height="50"></td>
                                        @else
                                            not set yet !
                                        @endif
                                        <td>
                                            <div class="button-group">
                                                <a href="{{route("fields.edit",$field->id)}}"
                                                   class="btn waves-effect waves-light btn-primary">Edit
                                                </a>
                                                <form method="post" action="{{route('fields.destroy',$field->id)}}"
                                                      class="d-inline">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="btn waves-effect waves-light btn-danger">Delete
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
