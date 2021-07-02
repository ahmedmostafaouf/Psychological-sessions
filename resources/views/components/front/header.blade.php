<button id="topBtn" class="btnTop"><i class="fa fa-arrow-up fa-lg"></i></button>
<header>
    <div class="container">
        <div class="navigation">
            <h1 class="logo">E<span>7</span>KY</h1>
            <ul>
                <li><a class="active" href="{{route('patient.home')}}">HOME</a></li>
                <li><a href="/patient/home#about">ABOUT</a></li>
                <li><a href="/patient/home#how-book">SERVICES</a></li>
                <li><a href="/patient/home#team">TEAM</a></li>
                <li><a href="{{route('patient.doctor.show')}}">OUR EXPERTS</a></li>
                <li><a href="{{route('patient.field')}}">Fields</a></li>
                <li><a href="Contact.html">CONTACT US</a></li>
               @auth('web')
                <li class="dropdowner">
                    <span>more</span>
                    <ul class="dropdown-menuer">
                        <li>
                           <a href="{{route('patient.meeting')}}">Meeting</a></li>

                        <li><a href="{{route('patient.ask_answer')}}">Answers</a></li>
                        <li><a href="{{route('patient.out')}}">LogOut</a></li>

                    </ul>
                </li>
                @endauth
            </ul>
            <label id="icon">
                <i class="fa fa-bars"></i>
            </label>
        </div>
    </div>
</header>


