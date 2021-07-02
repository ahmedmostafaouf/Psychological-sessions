<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/payment.css')}}">
    @endpush
        <section id="patient">
            <div class="container">
                <div class="patient-title">
                    <h2>Notes for the doctor</h2>
                    <p>Let the doctor  a little about yourself and your health problem</p>
                </div>
                <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$res->id}}"></script>
                <form action="{{route('patient.thanks')}}"  class="paymentWidgets" data-brands="VISA MASTER AMEX">
                    @csrf

                    <div class="form-row">

                    </div>
                </form>

            </div> <!-- ./container -->
        </section>

</x-front.app>
