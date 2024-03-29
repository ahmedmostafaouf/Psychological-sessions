<x-front.master>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/login.css')}}">

    @endpush
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../../front/assets/images/pic2.jpg) no-repeat center center; ">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Sign In to Patient</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" action="{{route('add.patient.login')}}" method="post">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg"  name="email" type="text" required=" " placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="password" type="password" required=" " placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info " type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        No Have account? <a href="{{route('patient.register')}} " class="text-info m-l-5 "><b>Sign Up</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</x-front.master>
