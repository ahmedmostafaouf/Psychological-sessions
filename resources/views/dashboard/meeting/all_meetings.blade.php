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
                            <h4 class="card-title">Doctor Meeting</h4>
                            <h6 class="card-subtitle">In this example you can see DataTables doing both horizontal and vertical scrolling at the same time. Note also that pagination is enabled in this example, and the scrolling accounts for this.</h6>

                            <div class="table-responsive">
                                <table id="scroll_ver_hor" class="table table-striped table-bordered display nowrap" style="width:100%">
                                    <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Comment To Doctor</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Meeting Id</th>
                                        <th scope="col">Meeting Password</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($meetings as $index=> $meeting)
                                        <tr>
                                            <th scope="row">{{$index+1}}</th>
                                            <th >{{$meeting->doctor->name}}</th>
                                            <td>{{$meeting->topic}}</td>
                                            <td>{{$meeting->start_time->format('h:i:A')}}</td>
                                            <td>{{$meeting->start_time->format('Y-M-d')}}</td>
                                            <td>{{$meeting->start_time->format('D')}}</td>
                                            <td>{{$meeting->meeting_id}}</td>
                                            <td>{{$meeting->metting_pass}}</td>


                                        </tr>
                                    @empty
                                        <p> No Meeting Today</p>
                                    @endforelse
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

    <!--This page plugins -->
        <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
        <script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>


    @endpush
</x-dashboard.app>
