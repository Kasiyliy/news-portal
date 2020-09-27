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
                    <h2 class="h4 card-header-title">Добавление Вопроса</h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('survey.question.store',['survey_id' => $survey_id])}}" method="post" enctype="multipart/form-data">

                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$question_web_form"/>
                        <div class="form-group  required">
                            <label class="control-label" for="options[]">Варианты ответа</label>
                            <input name="options[]" id="options[]" class="form-control"  required="" type="text" placeholder="Вариант ответа">
                        </div>
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
    // if(document.getElementsByClassName('custom-select').value == 1) {
    //     document.getElementById('h1').innerHTML = "Some text to enter";
    //     console.log('Hi');
    //
    // }else{
    //     console.log(document.getElementsByClassName('custom-select').selected);
    //
    // }

    // var e = document.getElementsByClassName("custom-select");
    // console.log(e.value);

    // document.getElementsByClassName("custom-select").onchange = function val(){
    //     var value = document.getElementsByClassName("custom-select").value;
    //     console.log(value);
    // };


    document.getElementById("custom").addEventListener("change", function(){
        //This input has changed
        console.log('This Value is', this.value);

        $('#questionType').empty();

        if(this.value == 1){
            $('#questionType'). append("<div>" + this.value  + "</div>")
        }

    });
    var count = 0;
   function addOption() {
       count = count+1;
        $('#optionList'). append(
            "<div class=\"form-row  required\" id=" +count+">\n" +
            "    <div class=\"form-group col-md-10\">\n" +
            "    <input name=\"options[]\" id=\"options[]\" class=\"form-control\" value=\"\" required=\"\" type=\"text\" placeholder=\"Вариант ответа\">\n" +
            "    </div>\n" +
            "    <div class=\"form-group col-md-2\">\n" +
            "    <button onclick=\"removeOption(this.id)\" class=\" btn  btn-outline-danger btn-lg \" id = "+count+"><i class=\"ti ti-lock\"></i>\n" +
            "                        </button>\n" +
            "                        </div>\n" +
            "    </div>")

    }

    function removeOption(id) {
        $('#'+id).empty();
    }


</script>
@endsection
