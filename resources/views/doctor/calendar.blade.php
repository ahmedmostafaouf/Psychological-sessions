<x-dashboard.app>
    @push('css')
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    @endpush
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-12">
                <div class="card">
                    <div class="card-body">

                        {!! $calendar->calendar() !!}
                    </div>
                </div>
                </div>
            </div>
            <x-dashboard.footer></x-dashboard.footer>

        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>>
        {!! $calendar->script() !!}

    @endpush
</x-dashboard.app>
