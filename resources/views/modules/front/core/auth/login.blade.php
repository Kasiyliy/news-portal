@extends('modules.front.layouts.app-main')
@section('styles')
    <style>


        .card-header {
            background-color: #00656D;
            border-radius: 10px 10px 0px 0px!important;
            width: 100%;
            color:white;
            padding: 20px 0;

        }

        .info__card__content {
            background-color: white;
            padding: 20px;
            width: 100%;
            border: 1px solid #a1a7b9;
            border-radius: 0px 0px 15px 15px;
            margin-bottom: 40px;

        }
        .btn-primary {
            color: #050606;
            border-color: #F8A555;
            background: #F8A555;
            border-radius: 5px;
            /*margin-left: 630px;*/
        }

        .btn-primary:hover{
            border-color: #F8A555;
            background: #F8A555;
        }

        .info__card{
            margin:0 auto;

        }


        /*form {*/
        /*    display: block;*/
        /*    margin-top: 50px;*/
        /*    width: 100%;*/


        /*}*/

        /*.form-control {*/
        /*    display: block;*/
        /*    width: 60%;*/
        /*    height: calc(1.5em + .75rem + 2px);*/
        /*    margin: 0 auto;*/
        /*    !*float: none;*!*/
        /*    padding: .375rem .75rem;*/
        /*    font-size: 1rem;*/
        /*    font-weight: 400;*/
        /*    line-height: 1.5;*/
        /*    color: #495057;*/
        /*    background-clip: padding-box;*/
        /*    border: 1px solid #F8A555;*/
        /*    border-radius: .25rem;*/
        /*    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;*/
        /*}*/
        .control-label{
            /*margin-left: 173px;*/

        }
        .reset_pass{
            /*margin-left: 173px;*/
        }


    </style>
@endsection
@section('content')
    <section class="news__block">
        <div class="container">
            <div class="news__block__inner">
                <h1>Авторизация</h1>
                <div class="mt-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>
                <div class="info__card col-12 col-lg-10 col-md-2 mt-4 " >
{{--                    <div class="info__card__head">--}}
{{--                    </div>--}}
{{--                    <div class="info__card__content">--}}

{{--                    </div>--}}

                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="form">
                                <label for="email">Логин <span>*</span></label>
                                <input type="text" class="form-control" id="email" placeholder="ЖСН немесе электронды пошта жазу:" name="title" required >
                            </div>
                            <div class="form">
                                <label for="password">Құпия сөз <span>*</span></label>
                                <input type="text" class="form-control" id="password" placeholder="" value="" name="title" required >
                            </div>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
