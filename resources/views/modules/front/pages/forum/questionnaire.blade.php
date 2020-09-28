@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .question__title span {
            color: red;
        }
    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Сауалнама</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('forum.questionnaire.list')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>
    <section class="questionnaire">
        <div class="container justify-content-center my-4">
            @foreach($questions as $question)
                <div class="card w-100 mb-4">
                    <h5 class="card-header border-info question__title">{{$question->title}}
                        <span>{{$question->required ? '*' : ''}}</span></h5>
                    <div class="card-body">
                        @foreach($question->options as $option)
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="{{$question->type->id == 1 ? 'radio' : 'checkbox'}}" name="exampleRadios"
                                       id="radio{{$option->id}}"
                                       value="option1">
                                <label class="form-check-label" for="radio{{$option->id}}">
                                    {{$option->text}}
                                </label>
                                @if($loop->last && $question->need_custom_answer)
                                    <input type="text" class="form-control form-control-sm"
                                           aria-label="Text input with checkbox" placeholder="Озімнің жауабым">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
