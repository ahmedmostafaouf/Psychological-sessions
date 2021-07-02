<!DOCTYPE html>
<html dir="ltr" lang="en">

<x-front.head>
</x-front.head>

<body>

    <x-front.header>
    </x-front.header>


    {{ $slot }}

@include('sweetalert::alert')
<x-front.footer>
</x-front.footer>
<script src="{{asset('front/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('front/assets/js/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
