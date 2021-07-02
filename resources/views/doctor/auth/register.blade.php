
<x-dashboard.master>
<!-- Login box.scss -->
<!-- ============================================================== -->


<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../../assets/images/big/auth-bg.jpg) no-repeat center center;">
    <div class="auth-box">
        <div id="loginform">
            <div class="logo">
                <h5 class="font-medium m-b-20">Sign In to Or Doctor</h5>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal m-t-20" action="{{route('add.register')}}" method="post">
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
                                <select class="custom-select form-control required" id="wintType1"
                                        data-placeholder="Type to search cities" name="field_id"
                                        onclick="console.log($(this).val())">
                                    <option value="">Select your Field.</option>

                                    @foreach($fields as $field)
                                        <option  value="{{$field->id}}">{{$field->name}}</option>
                                    @endforeach
                                </select>                            </div>
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

<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
</x-dashboard.master>
