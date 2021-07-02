<x-dashboard.app>
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- scroll horizontal & vertical -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <h4 class="card-title">Question</h4>
                            <h6 class="card-subtitle">In this example you can see DataTables doing both horizontal and vertical scrolling at the same time. Note also that pagination is enabled in this example, and the scrolling accounts for this.</h6>

                            <div class="table-responsive">
                                <table id="scroll_ver_hor" class="table table-striped table-bordered display nowrap" style="width:100%">
                                    <thead class="text-center">
                                    <tr>
                                        <th>ID#</th>
                                        <th>Text</th>
                                        <th>Answer</th>
                                        <th>Show Answer</th>
                                        <th>field</th>
                                        <th>Patient</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $question)
                                    <tr>
                                        <td>{{$question->id}}</td>
                                        <td>{{$question->text}}</td>
                                        <td>{{$question->getStatus()}}</td>
                                        @forelse($question->answer as $ans)
                                        <td>{{$ans->text}}</td>
                                        @empty
                                            <td> Not Found Answer</td>
                                        @endforelse
                                        <td>{{$question->field->name}}</td>
                                        <td >{{$question->patient->name}}</td>
                                        <td>
                                            <div class="button-group">
                                                @if($question->status==0)
                                                    <a href="{{route('change.status',$question->id)}}"
                                                       class="btn btn-light btn-rounded"><i class="fa fa-check"></i> Active
                                                    </a>
                                                @else
                                                    <a href="{{route('change.status',$question->id)}}"
                                                       class="btn btn-warning btn-rounded"><i class="fa fa-window-close"></i> In Active
                                                    </a>
                                                @endif
                                                    <a href="{{route('questions.destroy',$question->id)}}" class="btn waves-effect waves-light btn-danger">Delete
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
