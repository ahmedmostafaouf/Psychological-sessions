<x-front.app>
    @push('css')
        <link rel="stylesheet" href="{{asset('front/assets/css/Blog-Ask.css')}}">
    @endpush
        <section class="ask" @if($field->getMedia('photo')->first()) style="background:  url({{$field->getMedia('photo')->first()->getFullUrl()}}) center;  width: 100%; height: 700px; background-size: cover;position: relative;" @else style="background: url({{asset('front/assets/images/Blog/no_image.jpeg')}}) center;  width: 100%; height: 700px; background-size: cover;position: relative;" @endif>
            <div class="container">
                <div class="overlay"></div>
                <div class="ask-content">
                    <div class="ask-item">
                        <h2>{{$field->name}}</h2>
                        <p>
                            <span>{{$field->name}}</span>
                            {{$field->short_description}}
                        </p>
                    </div>
                    <form action="{{route('patient.field.question',$field->id)}}" method="post">
                        @csrf
                    <div class="form">
                        <select name="field">
                            @foreach($fields as $f)
                            <option value="{{$f->id}}" @if($f->id ==$field->id) selected @endif >{{$f->name}}</option>
                            @endforeach
                        </select>
                        <textarea rows="5" name="question" placeholder="Ask your question here …"></textarea>
                    </div>

                        <button type="submit" class="btn btn-primary btn-block">Ask Now</button>

                    </form>
                </div> <!-- ./ask-content -->
            </div> <!-- ./container -->
        </section>

        <section class="how-work">
            <div class="container">
                <div class="how-work-content">
                    <div class="how-work-items">
                        <h2>HOW IT WORKS?</h2>
                        <p>
                            <span>E7KY.ME</span>
                            have you covered with easy and user friendly steps to ask your questions.
                        </p>
                    </div>
                    <div class="how-work-items">
                        <div class="how-work-items-img">
                            <img src="{{asset('front/assets/images/ask-blog/select1.svg')}}" alt="logo" draggable="false">
                        </div>
                        <p>1- Select Category</p>
                    </div>
                    <div class="how-work-items">
                        <div class="how-work-items-img">
                            <img src="{{asset('front/assets/images/ask-blog/select2.svg')}}" alt="logo" draggable="false">
                        </div>
                        <p>2- Ask a Question</p>
                    </div>
                    <div class="how-work-items">
                        <div class="how-work-items-img">
                            <img src="{{asset('front/assets/images/ask-blog/select3.svg')}}" alt="logo" draggable="false">
                        </div>
                        <p>3- Interact with Experts</p>
                    </div>
                </div>
            </div> <!-- ./container -->
        </section>

        <section class="FAQ">

            <div class="FAQ-facts-title">
                <div class="FAQ-title">
                    <div style="margin-top: 25px;">
                    <h2 >FAQ</h2>
                    </div>
                </div>
                <div class="facts-title">
                    <div style="margin-top: 25px;">
                    <h2>FACTS</h2>
                    </div>
                </div>
            </div>

            <div class="row-table">
                <div class="FAQ-content">
                    <div class="FAQ-item">
                        <div class="FAQ-desc">
                            {!! $field->description !!}
                        </div>

                    </div> <!-- ./FAQ-item -->

                    <div class="facts">
                        <h3>Marriage and family counseling</h3>
                        <p>Psychologists use the term "prosperous relationship" to describe the relationship between people who are not only happy, but also have a strong relationship that is built on mutual trust, honesty, communication, understanding and compromise. The secret to a prosperous relationship is the constant work that both partners need to put in. Relationships are ongoing hard work yet rewarding.</p>
                    </div>
                </div> <!-- ./FAQ-content -->
            </div> <!-- ./row-table -->
        </section>
</x-front.app>
