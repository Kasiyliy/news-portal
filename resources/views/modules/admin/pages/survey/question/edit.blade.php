@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Вопрос</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('survey.question.index',['survey_id' => $survey_id])}}"
                       class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Изменение Вопроса</h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('survey.question.update',['id' => $question->id])}}" method="post" enctype="multipart/form-data">

                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$question_web_form"/>
                        <label class="control-label" for="options[]">Варианты ответа</label>
                        @foreach($question->options as $option)
                            <div class="form-row  required" id="{{$option->id}}">
                                <div class="form-group col-md-10">
                                    <input name="options[{{$option->id}}]" id="options[]" class="form-control"  required="" type="text"  value="{{$option->text}}" placeholder="Вариант ответа">
                                </div>
                                <div class="form-group col-md-2">
{{--                                    <button onclick="removeOption(this.id)" class=" btn  btn-outline-danger btn-sm " id="{{$option->id}}"><i class="ti ti-lock"></i>--}}
{{--                                    </button>--}}
                                </div>
                            </div>

                        @endforeach
                        <div class="form-group" id="optionList">

                        </div>
                        <button onclick="addOption()" class="btn-outline-primary mt-1 mb-4">
                            Добавить вариант
                        </button>

                        {{--                        <div class="form-group" id="questionType">--}}
                        {{--                            Content Content Content--}}
                        {{--                        </div>--}}
                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
     var count ={!! ($question->options->max('id')) !!}

        function addOption() {
            count = count+1;
            $('#optionList'). append(
                "<div class=\"form-row  required\" id=" +count+">\n" +
                "    <div class=\"form-group col-md-10\">\n" +
                "    <input name=\"new_options[]\" id=\"new_options[]\" class=\"form-control\" value=\"\" required=\"\" type=\"text\" placeholder=\"Вариант ответа\">\n" +
                "    </div>\n" +
                "    <div class=\"form-group col-md-2\">\n" +
                "    <button onclick=\"removeOption(this.id)\" class=\" btn  btn-outline-danger btn-lg \" id = "+count+"><i class=\"ti ti-lock\"></i>\n" +
                "                        </button>\n" +
                "                        </div>\n" +
                "    </div>")

        };

        function removeOption(id) {
            $('#'+id).empty();
        }




    </script>
@endsection
