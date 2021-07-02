<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/payment.css')}}">
    @endpush
        <section id="patient">
            <div class="container">

                <form class="patient-content" action="{{route('patient.book.master.pay')}}" method="post">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{$schedules->doctor->id}}">
                    <input type="hidden" name="id" value="{{$schedules->id}}">
                    <div class="row">
                        <div class="patient-form col col-12">
                            <div class="row">
                                <div class="col col-6">
                                    <label>Name</label> <br>
                                    <input type="text" name="doctor_name" disabled value="{{$schedules->doctor->name}}" placeholder="e.g. depression,Anxiety disorders">

                                </div>
                                <div class="col col-6">
                                    <label>Phone</label> <br>
                                    <input type="text" name="doctor_phone"  disabled value="{{$schedules->doctor->phone}}" placeholder="e.g. depression,Anxiety disorders">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <label>Session_price</label> <br>
                                    <input type="text"  disabled name="doctor_price" value="{{$schedules->doctor->session_price}}" placeholder="e.g. depression,Anxiety disorders">

                                </div>
                                <div class="col col-6">
                                    <label>Email</label> <br>
                                    <input type="text"   disabled value="{{$schedules->doctor->email}}" placeholder="e.g. depression,Anxiety disorders">
                                </div>

                            </div>
                            <div class="row">

                                <div class="col col-6">
                                    <label>Day</label> <br>
                                    <input type="text" name="day"  disabled value="{{$schedules->day}}" placeholder="e.g. depression,Anxiety disorders">
                                </div>
                                <div class="col col-6">
                                    <label>Date</label> <br>
                                    <input type="text" name="date" readonly value="{{$schedules->date}}" placeholder="e.g. depression,Anxiety disorders">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <label>start Time</label> <br>
                                    <input type="text" name="start_time" readonly value="{{$schedules->start_time}}" placeholder="e.g. depression,Anxiety disorders">
                                </div>
                                <div class="col col-6">
                                    <label>End Time</label> <br>
                                    <input type="text" name="end_time" readonly value="{{$schedules->end_time}}" placeholder="e.g. depression,Anxiety disorders">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <label>Average Consulting Time</label> <br>
                                    <input type="text" name="average_consulting_time" disabled value="{{$schedules->average_consulting_time}} Min" placeholder="e.g. depression,Anxiety disorders">
                                </div>
                                <div class="col col-6">
                                    <label>Total price</label> <br>
                                    <input type="text" name="total" readonly value="@if($schedules->average_consulting_time==60) {{$schedules->doctor->session_price}} @else {{$schedules->doctor->session_price/2}} @endif " placeholder="e.g. depression,Anxiety disorders">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit"> Done</button>
                        </div>

                    </div>
                </form>
            </div> <!-- ./container -->
        </section>

</x-front.app>
