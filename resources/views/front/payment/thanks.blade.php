<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/payment.css')}}">
    @endpush
        <section id="patient">
            <div class="container">
                <div class="patient-title">
                    <h2>Notes for the Meeting</h2>
                    <p> Knowing these characteristics will change during the meeting</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div align="center">
                            <h4>YOUR Payment  Session HAS BEEN PLACED Please Give Some Operation To Active Meeting </h4>
                            <form name="paymentForm" id="paymentForm" action="{{route('patient.appointment')}}" method="post">
                                @csrf

                                <input type="hidden"  name="id_payment" value="{{$id_payment}}">
                                <input type="hidden"  name="id" value="{{Session::get('appointment')['id']}}">
                                <input type="hidden"  name="doctor_id" value="{{Session::get('appointment')['doctor_id']}}">
                                <input type="hidden"  name="date" value="{{Session::get('appointment')['date']}}">
                                <input type="hidden"  name="total" value="{{Session::get('appointment')['total']}}">
                                <div class="form-group row">

                                </div>
                                    <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="wlastName2"> End At : <span class="danger">*</span> </label>
                                            <input type="text" class="form-control"  readonly name="end_time" value="{{Session::get('appointment')['end_time']}}">
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="wlastName2"> Start At : <span class="danger">*</span></label>
                                                <input type="text" class="form-control" readonly  name="start_time" value="{{Session::get('appointment')['start_time']}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="wlastName2"> Enter Comment To Doctor : <span class="danger">*</span></label>
                                                <textarea  class="form-control" rows="3" cols="6"   name="topic" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="wlastName2"> Do You Need Close Camera when start Meeting : <span class="danger">*</span>
                                                </label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="participant_video" value="false" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">No</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="participant_video" value="true" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Yes</label>
                                                </div>
                                                @error("gender")
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror

                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="wlastName2"> Do You Need Close Microphone when start Meeting : <span class="danger">*</span>
                                            </label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio8" name="mute_upon_entry" value="false" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio8">No</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio11" name="mute_upon_entry" value="true" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio11">Yes</label>
                                            </div>
                                            @error("gender")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror

                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="wlastName2"> Do You Need record Meeting When started : <span class="danger">*</span>
                                            </label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio10" name="auto_recording" value="none" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio10">No</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio20" name="auto_recording" value="true" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio20">Yes</label>
                                            </div>
                                            @error("gender")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror

                                        </div>
                                    </div>


                                </div>

                                <br>
                                <button  type="submit" class="btn btn-primary"  style="color:white;">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>




            </div> <!-- ./container -->
        </section>

</x-front.app>
