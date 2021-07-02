<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/schedule.css')}}">
    @endpush
        <section class="session-caption">
            <div class="session-caption-content">
                <div class="Session-caption-img">
                    @if($doctor->getMedia('doctor_image')->first())

                    <img src="{{$doctor->getMedia('doctor_image')->first()->getFullUrl()}}" alt="the_doctor" draggable="false">
                    @else
                        <img src="{{asset('front/assets/images/default.png')}}" alt="the_doctor" draggable="false">

                    @endif
                </div> <!-- ./Session-caption-img -->
                <div class="session-caption-title">
                    <h2>{{$doctor->name}}</h2>
                    <h3>{{$doctor->fields->name}}</h3>
                </div> <!-- ./Session-caption-title -->
            </div> <!-- ./Session-caption-content -->
        </section>

        <section class="session-appiontment">
            <div class="container">
                <div class="session-appiontment-title">
                    <h2>Sessions Appointments</h2>
                    <h3><strong>30 Minutes :</strong> {{$doctor->session_price /2 }} EGP</h3>
                    <h4><strong>60 Minutes :</strong> {{$doctor->session_price}} EGP</h4>
                </div> <!-- ./session-appiontment-title -->
                <div class="session-appiontment-time">
                    <a href="#" class="active">This Week</a>
                </div> <!-- ./session-appiontment-time -->
                <div class="session-appiontment-time-table">
                    @php
                         $time=\Carbon\Carbon::now();
                    @endphp
                    @foreach($doctor->schedules as $schedule)
                            @csrf
                        <div class="session-appiontment-time-table-items">
                        <p>{{$schedule->day}} | {{$schedule->date}}</p>
                        <span>{{ date_format($schedule->start_time,'g:i A')}} <b>To</b> {{ date_format($schedule->end_time,'g:i A')}} <strong>{{$schedule->average_consulting_time}} Minutes</strong> </span>
                        <br>
                            @if($schedule->start_time >= $time)
                            <a style="margin-top: 20px" class="btn btn-primary btn-block" href="{{route('patient.book.master',$schedule->id)}}">Book</a>
                        @else
                            <a style="margin-top: 20px" class="btn btn-primary btn-block" disabled>Time Disable </a>
                        @endif

                    </div>

                    @endforeach
                </div>
            </div> <!-- ./container -->
        </section>
</x-front.app>
