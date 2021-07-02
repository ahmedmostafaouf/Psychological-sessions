<x-front.master>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/register.css')}}">
        <!-- Styles -->
    @endpush
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../../front/assets/images/pic1.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Sign In to Patient</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" action="{{route('add.patient')}}" method="post">
                                @csrf
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="name" type="text" required=" " placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg"  name="email" type="text" required=" " placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="phone" type="tel" required=" " placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="password" type="password" required=" " placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="password_confirmation" type="password" required=" " placeholder="Confirm Password">
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control form-control-lg" name="address" type="text" required=" " placeholder="Enter Your Address ">
                                    </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wlastName2"> Gender : <span class="danger">*</span>
                                        </label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="gender" value="0" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">Female</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="gender" value="1" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadi o2">Male</label>
                                        </div>
                                        @error("gender")
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror

                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wlastName2"> Date Of Birth : <span class="danger">*</span>
                                            </label>
                                                <input type="date"  name="dob"  class="form-control" >
                                            @error("gender")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info " type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="authentication-login1.html " class="text-info m-l-5 "><b>Sign In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</x-front.master>
