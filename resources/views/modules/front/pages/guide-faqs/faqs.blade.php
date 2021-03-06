@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>FAQ</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('guide.faq')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <ul class="list-group bs-4">
                        @foreach($categories as $category)
                            <a href="{{route('faq', ['category_id' => $category->id])}}">
                                <li class="list-group-item cursor d-flex justify-content-between
                                    {{$currentCategory->id == $category->id ? 'bg-sj-gray' : ''}}"
                                    data-content="{{$i}} ВСТАВИШЬ ОПИСАНИЕ СЮДА">
                                    <span>{{$category->name}}</span><b>></b>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="accordion card p-3" id="accordionExample">
                        <ul>
                            @if($currentCategory->questions->isEmpty())
                                Сұрақтар жоқ!
                            @else
                                @foreach($currentCategory->questions as $question)
                                    <li>
                                        <h2 class="mb-0 d-flex justify-content-between">
                                <span style="font-size: 20px">
                                    {{$question->question}}
                                </span>
                                            <span data-toggle="collapse"
                                                  style="font-size: 25px"
                                                  class="cursor"
                                                  data-value="X"
                                                  onclick="changeContent(this)"
                                                  data-target="#collapse{{$question->id}}" aria-expanded="true"
                                                  aria-controls="collapse{{$question->id}}">
                                        +
                                    </span>
                                        </h2>

                                        <div id="collapse{{$question->id}}" class="collapse"
                                             aria-labelledby="headingOne"
                                             data-parent="#accordionExample">
                                            <div>
                                                {!! $question->answer !!}
                                            </div>
                                            {{--                                        <h7>{{$question->updated_at}} жанартылды</h7>--}}
                                        </div>
                                        <hr>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function changeContent(el) {
            const newVal = el.dataset.value;
            el.dataset.value = el.innerText;
            el.innerText = newVal;
        }
    </script>
@endsection
