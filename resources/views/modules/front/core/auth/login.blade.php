@extends('modules.front.layouts.app-main')
@section('styles')
    <style>

        .card {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 10px;
        }

        .card-header {
            background-color: #00656D;
            border-radius: 10px 10px 0px 0px !important;
            border: 2px solid rgba(0, 0, 0, .125);
            color: white;
            padding: 20px 0;
        }

        .enter-btn {
            color: #050606;
            border-color: #F8A555;
            background: #F8A555;
            border-radius: 5px;
            color: #FFFFFF;
        }

        .enter-btn:hover {
            color: #FFFFFF;
        }

        .info__card {
            margin: 0 auto;
        }

        .form span {
            color: red;
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
                <form action="{{route('login.post')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate >
                    {{csrf_field()}}
                    <div class="info__card col-12 col-lg-10 col-md-2 mt-5 ">
                        <div class="card col-8 p-0 mb-5">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="form mb-3">
                                    <label for="email">Логин <span>*</span></label>
                                    <input type="text" class="form-control {{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                                           placeholder="Пошта:" name="email" required>
                                    @if(isset($errors) && $errors->has('email'))
                                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                    @endif
                                </div>

                                <div class="form mb-3">
                                    <label for="password">Құпия сөз <span>*</span></label>
                                    <input type="password" class="form-control {{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}" id="password" placeholder="Құпия сөз:"
                                           name="password" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="enter-btn btn pr-5 pl-5">Кіру</button>
                                </div>
                                <p class="text-center mb-0">
                                    Нет аккаунта?
                                    <a class="font-weight-semi-bold" href="{{route('register')}}">Регистрация</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
