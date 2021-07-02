<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/Blog.css')}}">
    @endpush
        <section id="blog">
                <div class="blog-caption">
                    <div class="container">
                        <h2>OUR FIELDS</h2>
                        <p>E7KY.me covers all aspects of life. Check our fields and enjoy proper consultation</p>
                    </div>
            </div>
            <div class="container">
                <div class="blog-content">
                    @foreach($fields as $field)
                    <div class="blog-item">
                        <div class="blog-item-img">
                            @if($field->getMedia('photo')->first())
                            <img src="{{$field->getMedia('photo')->first()->getFullUrl()}}" width="348" height="373" alt="image">
                            @else
                                <img src="{{asset('front/assets/images/Blog/no_image.jpeg')}}" width="348" height="373" alt="image">
                            @endif
                        </div>
                        <div class="blog-item-desc">
                            <span>{{$field->name}}</span>
                            <p>{{$field->short_description}} ...</p>
                            <button><a href="{{route('patient.field.show',$field->id)}}">Ask</a></button>
                        </div>
                    </div> <!-- ./blog-item -->
                    @endforeach

                </div> <!-- ./blog-content -->
            </div> <!-- ./container -->
        </section>
</x-front.app>
