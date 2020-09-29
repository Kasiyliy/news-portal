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
{{--            <form action="{{route('forum.questionnaire.post', ['survey_id' => $survey_id])}}" method="post"--}}
{{--                  enctype="multipart/form-data" class="needs-validation" novalidate>--}}
                {{csrf_field()}}
                @foreach($questions as $question)
                    <div class="card w-100 mb-4">
                        <h5 class="card-header border-info question__title">{{$question->title}}
                            <span>{{$question->required ? '*' : ''}}</span></h5>
                        <div class="card-body">
                            @foreach($question->options as $option)
                                <div class="form-check">
                                    <input class="form-check-input survey__input"
                                           type="{{$question->type->id == 1 ? 'radio' : 'checkbox'}}"
                                           name="options{{$question->id}}"
                                           id="{{$option->id}}"
                                           value="{{$option->text}}">
                                    <label class="form-check-label" for="options[{{$question->id}}]" name="options[]">
                                        {{$option->text}}
                                    </label>
                                    @if($loop->last && $question->need_custom_answer)
                                        <input type="text" class="form-control form-control-sm survey__input"
                                               aria-label="Text input with checkbox" placeholder="Озімнің жауабым" name="optional-input"
                                               id="{{$question->id}}">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary" onclick="getOptions()">send</button>
{{--            </form>--}}
        </div>
    </section>
@endsection

@section('scripts')
    <script>

        const getOptions = () => {
            let inputs = document.getElementsByClassName('survey__input');
            let arr = [];
            let optional = [];
            for(let i=0; i<inputs.length; i++){
                if(inputs[i].checked){
                    arr.push(inputs[i].id);
                }
                if(inputs[i].name === 'optional-input' && inputs[i].value != ''){
                    optional.push(
                        {
                            'id': inputs[i].id,
                            'value': inputs[i].value
                        }
                    )
                }
            }

            $(function () {
                $.ajax({
                    method: "get",
                    url: "{{route('forum.questionnaire.post')}}",
                    data: {
                        options: JSON.stringify(arr),
                        optional: JSON.stringify(optional),
                        survey_id:'{{$survey_id}}'
                    },
                    success: function (response) {
                        window.location.href = response;
                    }
                });
            });
        }
    </script>
@endsection
