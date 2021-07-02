<x-dashboard.app>
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- scroll horizontal & vertical -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="modal-effect btn waves-effect waves-light btn-info " style="position: absolute;top: 10px;right: 10px;" href="#modaldemo8" data-effect="effect-scale" data-toggle="modal">Add Schedule</a>
                            <br>
                            <h4 class="card-title">Doctor Schedules</h4>
                            <h6 class="card-subtitle">In this example you can see DataTables doing both horizontal and vertical scrolling at the same time. Note also that pagination is enabled in this example, and the scrolling accounts for this.</h6>

                            <div class="table-responsive">
                                <table id="scroll_ver_hor" class="table table-striped table-bordered display nowrap" style="width:100%">
                                    <thead class="text-center">
                                    <tr>
                                        <th>ID#</th>
                                        <th>Doctor Name</th>
                                        <th>Date</th>
                                        <th>Days</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($doctors_schedules as $schedule)
                                    <tr>
                                        <td>{{$schedule->id}}</td>
                                        <td>{{$schedule->doctor->name}}</td>
                                        <td>{{$schedule->date}}</td>
                                        <td>{{$schedule->day}}</td>
                                        <td>{{date_format($schedule->start_time,'h:i A')}}</td>
                                        <td>{{date_format($schedule->end_time,'h:i A')}}</td>
                                        <td>@if($schedule->status==0) <span class="badge badge-pill badge-danger">{{$schedule->getStatus()}}</span> @else <span class="badge badge-pill badge-success">{{$schedule->getStatus()}}</span> @endif</td>
                                        <td>
                                            <div class="button-group">
                                                <a href="#modaldemo9"
                                                   data-effect="effect-scale" data-toggle="modal" data-id="{{$schedule->id}}"
                                                   data-date="{{$schedule->date}}" data-start_time="{{date_format($schedule->start_time,'h:i')}}" data-end_time="{{date_format($schedule->end_time,'h:i')}}"
                                                   data-doctor_id="{{$schedule->doctor->name}}" data-day="{{$schedule->day}}" data-average_consulting_time="{{$schedule->average_consulting_time}}"

                                                   class="btn btn-primary btn-rounded"><i class="fa fa-edit"></i>Edit
                                                </a>
                                                @if($schedule->status==0)
                                                <a href="{{route('change.schedule.status',$schedule->id)}}"
                                                   class="btn btn-light btn-rounded"><i class="fa fa-check"></i> Active
                                                </a>
                                                @else
                                                    <a href=""
                                                       class="btn btn-warning btn-rounded"><i class="fa fa-window-close"></i> In Active
                                                    </a>
                                                    @endif
                                                    @php
                                                    $start_time=date_format($schedule->start_time,'h:i');
                                                    $end_time=date_format($schedule->end_time,'h:i');
                                                    @endphp
                                                    <a href='#delete'  data-toggle="modal" data-id="{{$schedule->id}}" data-date="{{$schedule->date}}"
                                                       data-start_time="{{$start_time}}" data-end_time="{{$end_time}}"
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
            <!-- start add Schedule-->
            <div class="modal" id="modaldemo8">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add schedule</h6>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('schedule.store') }}" method="post">
                                @csrf
                             <input type="hidden" name="day">
                             <input type="hidden" name="doctor_id" value="{{auth('doctor')->user()->id}}">

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Schedule Date</label>
                                    <input type="date"  class="form-control" name="date" value="{{date('Y-m-d')}}">
                                    @error("date")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Start Time</label>
                                    <input type="datetime-local"  class="form-control" name="start_time" >
                                    @error("start_time")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">End Time</label>
                                    <input type="datetime-local"  class="form-control" name="end_time">
                                    @error("end_time")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wintType1">Average Consulting Time :</label>
                                    <select class="custom-select form-control required" id="wintType1"
                                            data-placeholder="Type to search average_consulting_time" name="average_consulting_time"
                                            onclick="console.log($(this).val())">
                                        <option value="">Select your Field.</option>
                                            <option value="30">30 Minute</option>
                                            <option value="60">60 Minute</option>
                                    </select>
                                    <small class="form-control-feedback"> Select your Docter. </small>
                                    @error("doctor_id")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
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
            <!-- End add Schedule -->


            <!-- start edit Schedule-->
            <div class="modal" id="modaldemo9">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit schedule</h6>
                        </div>
                        <div class="modal-body">
                            <form action="schedule/update" method="post">
                                {{ method_field('patch') }}
                                @csrf
                                <input type="hidden" name="day" id="day">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="doctor_id" value="{{auth('doctor')->user()->id}}">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Schedule Date</label>
                                    <input type="date"  class="form-control" name="date" id="date" >
                                    @error("date")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Start Time</label>
                                    <input type="datetime-local"  class="form-control" name="start_time" id="start_time" >
                                    @error("start_time")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">End Time</label>
                                    <input type="datetime-local"  class="form-control" name="end_time" id="end_time">
                                    @error("end_time")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wintType1">Average Consulting Time :</label>
                                    <select class="custom-select form-control required" id="average_consulting_time"
                                            data-placeholder="Type to search average_consulting_time" name="average_consulting_time"
                                            onclick="console.log($(this).val())">
                                        <option value="10">10 Minute</option>
                                        <option value="20">20 Minute</option>
                                        <option value="30">30 Minute</option>
                                        <option value="40">40 Minute</option>
                                        <option value="50">50 Minute</option>
                                        <option value="60">60 Minute</option>
                                    </select>
                                    <small class="form-control-feedback"> Select your Docter. </small>
                                    @error("doctor_id")
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror
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
            <!-- End edit Schedule -->


            <!-- start delete Schedule-->
            <div class="modal" id="delete">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Delete schedule</h6>
                        </div>
                        <div class="modal-body">
                            <form action="schedule/destroy" method="post">
                               @method('delete')
                                @csrf
                                <p class="text-center" style="font-size:20px; font-weight: bold;">Are you sure to delete the schedule?</p><br>
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Schedule Date</label>
                                    <input type="date"  class="form-control" name="date" id="date" disabled >
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-6">
                                        <label for="exampleFormControlTextarea1">Start Time</label>
                                        <input type="time"  class="form-control" name="start_time" id="start_time"  disabled>

                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlTextarea1">End Time</label>
                                        <input type="time"  class="form-control" name="end_time" id="end_time" disabled>
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
            <!-- End delete Schedule -->


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
                    var date = button.data('date')
                    var doctor_id = button.data('doctor_id')
                    var start_time = button.data('start_time')
                    var end_time = button.data('end_time')
                    var day = button.data('day')
                    var average_consulting_time = button.data('average_consulting_time')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #date').val(date);
                    modal.find('.modal-body #doctor_id').val(doctor_id);
                    modal.find('.modal-body #start_time').val(start_time);
                    modal.find('.modal-body #end_time').val(end_time);
                    modal.find('.modal-body #day').val(day);
                    modal.find('.modal-body #average_consulting_time').val(average_consulting_time);
                })
            </script>
            <script>
                $('#delete').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var date = button.data('date')
                    var start_time = button.data('start_time')
                    var end_time = button.data('end_time')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #date').val(date);
                    modal.find('.modal-body #start_time').val(start_time);
                    modal.find('.modal-body #end_time').val(end_time);
                })
            </script>
            </body>
    @endpush
</x-dashboard.app>
