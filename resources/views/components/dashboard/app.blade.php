<!DOCTYPE html>
<html dir="ltr" lang="en">

<x-dashboard.head>
</x-dashboard.head>

<body>
<div id="main-wrapper" data-theme="light" data-navbarbg="skin2">
    <x-dashboard.preload></x-dashboard.preload>

    <x-dashboard.header>
    </x-dashboard.header>
    <x-dashboard.sidebar></x-dashboard.sidebar>


    {{ $slot }}
</div>
<x-dashboard.script></x-dashboard.script>
@include('sweetalert::alert')

</body>
</html>
