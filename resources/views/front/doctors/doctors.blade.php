<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/ourExperts.css')}}">
    @endpush
        <div class="container">
            <div class="expert-title">
                <h2>OUR EXPERTS</h2>
                <h5>E7Ky.me connects you with certified experts in all fields that interest you.</h5>
            </div>
        </div> <!-- ./container -->

        <section class="filter">
            <div class="container">
                <input type="text" placeholder="Therapist Name">
                <i class="fa fa-search fa-lg"></i>

                <select>
                    <option hidden>All Specialization</option>
                    @foreach($fields as $field)
                        <option value="{{$field->id}}">{{$field->name}}</option>
                    @endforeach

                </select>
                <select>
                    <option hidden>Sort by:</option>
                    <option>Fees (Low To High)</option>
                    <option>Fees (High To Low)</option>
                    <option>Top Rated</option>
                </select>
            </div> <!-- ./container -->
        </section>

        <section class="doctors">
            <div class="container">
                <div class="doctors-items">
                    @foreach($doctors as $doctor)
                    <div class="doctors-content">
                        @if($doctor->getMedia('doctor_image')->first())
                        <img src="{{$doctor->getMedia('doctor_image')->first()->getFullUrl()}}" alt="the_doctor">
                        @else
                            <img src="{{asset('front/assets/images/default.png')}}" alt="the_doctor">

                        @endif
                        <h3>{{$doctor->name}}</h3>
                        <span>{{$doctor->fields->name}}</span>
                        <div class="doctors-star">
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <i class="active fa fa-star fa-sm"></i>
                            <span>4.91 (275 rev)</span>
                        </div>
                        <p>Specialized in:@if($doctor->specialties) {{$doctor->specialties}} @else Not Complete Profile @endif</p>
                        <div class="doctor-price">
                            <span><i class="icon fa fa-dollar fa-sm"></i>EGP {{$doctor->session_price}}</span>
                            <span><i class="fa fa-quote-right fa-sm"></i>{{$doctor->meetings->count()}} Sessions</span>
                        </div>
                        <a href="{{route('patient.doctor.schedule',$doctor->id)}}"><button class="btn">Book Now</button></a>
                        <a href="{{route('patient.doctor.profile',$doctor->id)}}"><button>View Profile</button></a>
                    </div> <!-- ./doctors-content -->
                    @endforeach


                </div> <!-- ./doctors-items -->
            </div> <!-- ./container -->
        </section>



</x-front.app>
