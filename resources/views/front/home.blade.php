<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/Home.css')}}">
    @endpush
        <section id="home">
            <div class="container">
                <div class="home-content">
                    <P class="home-title">Finding a doctor in <span>Egypt</span> has never been easier</P>
                    <span class="home-book">
                    Book online or call on
                    <i class="fa fa-phone fa-lg"></i>
                    23443
                </span>
               @if(!auth()->check())
                    <a href="{{route('patient.register')}}" ><button class="btn-sign">Sign Up</button></a>
                    <a href="{{route('patient.login')}}" ><button class="btn-log">Log In</button></a>
               @endif
                </div>
            </div>
        </section>

        <section id="about" class="pd-y">
            <div class="container">
                <div class="about-title">
                    <h2>What We Do?</h2>
                    <span class="line"></span>
                </div>

                <div class="about-content">
                    <div class="about-items1">
                        <div class="overlay">
                            <h3>We create healthy minds free of depression and anxiety</h3>
                            <span>Better life decisions</span>
                            <span>Sleep Better</span>
                            <span>More confident</span>
                            <span>Healthier life</span>
                            <button>Get Help</button>
                        </div>
                    </div>
                    <div class="about-items2 tb-effect">
                        <h3>Strengthen Your Personality</h3>
                        <p>Just like any muscle, your personality requires strengthening and your heart, mind and soul deserve specialized care. With Shezlong, you’ll get personalized treatment from a prescriber trained in mental health care. We want you to know that we're here to support you and help you develop your traits and overcome your personal weaknesses.</p>
                    </div>
                    <div class="about-items3 tb-effect">
                        <h3>Sexual Wellness</h3>
                        <p>Therapy helps in many different areas of sexual wellness. Whether you're experiencing sexual pain, intimacy concerns or low desire and could use some guidance; Shezlong's certified professionals are here to guide you through your problems whether they're treated individually or as part of a couple.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="how-book" class="pd-y">
            <div class="container">
                <div class="how-book-title">
                    <h2> How To Book With
                        <p> E<span>7</span>KY
                            <span class="line"></span>
                        </p>
                    </h2>
                </div>
                <div class="how-book-content">
                    <div class="how-book-items">
                        <i class="fa fa-search fa-2x"></i>
                        <span>Search for a doctor</span>
                        <p>By speciality area, doctor name or fees</p>
                    </div>
                    <div class="how-book-items">
                        <i class="fa fa-users fa-2x"></i>
                        <span>Compare & Choose</span>
                        <p>Based on real patient reviwes</p>
                    </div>
                    <div class="how-book-items">
                        <i class="fa fa-calendar fa-2x"></i>
                        <span>Book your appointment</span>
                        <p>With the best doctor in the clincor</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="Service pd-y" id="Service">
            <div class="container">
                <div class="Service-item">
                    <div class="caption">
                        <h2>Why Choose Us</h2>
                        <span class="line"></span>
                    </div>

                    <p>With Us, you’ll get personalized treatment from a prescriber trained in mental health care. We want you to know that we're here to support you and help you develop your traits and overcome your personal weaknesses.</p>
                    <ul class="Service-list">
                        <li>
                            <i class="fa fa-check"></i>
                            <strong>E7KY</strong> is the first online psychotherapy clinic in the Middle East.
                        </li>
                        <li>
                            <i class="fa fa-check"></i>
                            Talk to your therapist online privately anytime anywhere !
                        </li>
                        <li>
                            <i class="fa fa-check"></i>
                            Private and anonymous therapy video Session.
                        </li>
                        <li>
                            <i class="fa fa-check"></i>
                            Number One in online Arabic psychotherapy worldwide.
                        </li>

                    </ul>
                </div>

                <div class="Service-item image">
                    <div class="Service-img">
                        <img src="{{asset('front/assets/images/service.jpg')}}" alt="image">
                    </div>
                    <ul class="Service-boltts">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </section>

        <section id="team">
            <div class="container">
                <div class="team-title">
                    <h3>Doctor Most Popular</h3>
                    <span class="line"></span>
                </div>
                <div class="team-content">
                    @foreach($doctors->take(4) as $doctor)


                    <div class="team-items">
                        @if($doctor->getMedia("doctor_image")->first())
                            <img  alt="doctor" draggable="false" src="{{$doctor->getMedia("doctor_image")->first()->getFullUrl()}}"
                                  width="150"></td>
                        @else
                            <img src="{{asset('front/assets/images/team/team_section_img1.jpg')}}" alt="doctor" draggable="false">
                        @endif
                       <a href="{{route('patient.doctor.profile',$doctor->id)}}"> <span>{{$doctor->name}}</span> </a>
                        <p>{{$doctor->fields->name}}</p>
                        <a href="{{route('patient.doctor.schedule',$doctor->id)}}"><button>Book Now</button></a>
                    </div> <!-- ./team-items -->
                    @endforeach



                </div> <!-- ./team-content -->
            </div> <!-- ./container -->
        </section>

        <div class="testimonial-title">
            <h2>Client Testimonial</h2>
            <span class="line"></span>
        </div>
        <section id="testimonial">
            <div class="overlay">
                <div class="container">
                    <div class="testimonial-content">
                        <div class="testimonial-item">
                            <div class="testimonial-img">
                                <img src="{{asset('front/assets/images/Testimonial/perso1.webp')}}" alt="image" draggable="false">
                                <h4>Jone Doe</h4>
                            </div>
                            <p>Oh thank you so much! You are a true consultant and I will definitely follow your advice, this is not a regular consultancy website, yet it truly made me feel better and facilitated many things. I’m very satisfied, def my go to in all my consultations!</p>
                        </div> <!-- ./testimonial-item -->
                        <div class="testimonial-item">
                            <div class="testimonial-img">
                                <img src="{{asset('front/assets/images/Testimonial/perso1.webp')}}" alt="image" draggable="false">
                                <h4>Jone Doe</h4>
                            </div>
                            <p>Oh thank you so much! You are a true consultant and I will definitely follow your advice, this is not a regular consultancy website, yet it truly made me feel better and facilitated many things. I’m very satisfied, def my go to in all my consultations!</p>
                        </div> <!-- ./testimonial-item -->
                    </div>
                </div> <!-- ./container -->
            </div> <!-- ./overlay -->
        </section>

        <section id="appointment" class="pd-y">
            <div class="container">
                <div class="appointment-content">
                    <div class="appointment-make">
                        <h2>Make An Appointment</h2>
                        <span class="line"></span>
                        <select class="Speciality">
                            <option hidden>Choose Speciality</option>
                            <option>Child disorders</option>
                            <option>Adolescence disorders</option>
                            <option>Anxiety disorders</option>
                            <option>Marriage Counselling</option>
                            <option>Depression</option>
                        </select>
                        <select class="city">
                            <option hidden>Choose City</option>
                            <option>Mansoura</option>
                            <option>Cairo</option>
                            <option>Alexandria</option>
                            <option>Giza</option>
                        </select>
                        <input type="text" placeholder="Your Area">
                        <input type="text" placeholder="Doctor Name">
                        <a href="#"><button>Submit</button></a>
                    </div> <!-- ./appointment-make -->
                    <div class="appointment-call">
                        <h2>Call With A Doctor</h2>
                        <span class="line"></span>
                        <select class="Speciality">
                            <option hidden>Choose Speciality</option>
                            <option>Child disorders</option>
                            <option>Adolescence disorders</option>
                            <option>Anxiety disorders</option>
                            <option>Marriage Counselling</option>
                            <option>Depression</option>
                        </select>
                        <input type="text" placeholder="Doctor Name">
                        <input type="text" placeholder="Your Name">
                        <input type="email" placeholder="Your Email">
                        <a href="#"><button>Submit</button></a>
                    </div> <!-- ./appointment-call -->
                </div>  <!-- ./appointment-content -->
            </div> <!-- ./container -->
        </section>
</x-front.app>
