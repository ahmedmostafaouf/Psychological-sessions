<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/ask&answer.css')}}">
    @endpush

    @forelse($asks as $ask)
        <section class="ask-answer">
            <div class="row">
                <i class="fa fa-bookmark-o"></i>
                <h2>{{$ask->text}}?</h2> <div style="position: absolute;right: 60px";> <p> {{$ask ->created_at ->diffForHumans()}}  </p></div><br>
            <p>{{$ask->answer->text}}</p><div style="margin-left: 23px;color:indianred ";>  <span>{{$ask->answer->created_at ->diffForHumans()}}</span>  </div>
            </div>
            @empty
                No Found Answer
        </section>
        @endforelse



</x-front.app>
