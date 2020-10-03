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
                <h1>Тіркелу</h1>
                <div class="mt-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>
                <form action="{{route('register.post')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{csrf_field()}}
                    <div class="info__card col-12 mt-5 ">
                        <div class="card col-8 p-0 mb-5">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="form mb-3">
                                    <label for="login">ИИН <span>*</span></label>
                                    <input type="text" class="form-control {{ isset($errors) && $errors->has('iin') ? ' is-invalid' : '' }}" id="login"
                                           placeholder="Введите ваш ИИН:" name="iin" required value="{{old('iin')}}">
                                    @if(isset($errors) && $errors->has('iin'))
                                        <div class="invalid-feedback">{{$errors->first('iin')}}</div>
                                    @endif
                                </div>
                                <div class="form mb-3">
                                    <label for="email">Email <span>*</span></label>
                                    <input type="text" class="form-control {{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Введите ваш email:"
                                           name="email" required value="{{old('email')}}">
                                    @if(isset($errors) && $errors->has('email'))
                                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                    @endif
                                </div>
                                <div class="form mb-3">
                                    <label for="password">Пароль <span>*</span></label>
                                    <input type="password" class="form-control {{ isset($errors) && $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                                           placeholder="Введите пароль:"
                                           name="password" required>
                                    @if(isset($errors) && $errors->has('password'))
                                        <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                    @endif
                                </div>
                                <div class="form mb-3">
                                    <label for="password_confirmation">Подтвердите пароль <span>*</span></label>
                                    <input type="password" class="form-control {{ isset($errors) && $errors->has('password') ? ' is-invalid' : '' }}" id="password_confirmation"
                                           placeholder="Подтвердите пароль:"
                                           name="password_confirmation" required>
                                    @if(isset($errors) && $errors->has('password'))
                                        <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="enter-btn btn pr-5 pl-5">Регистрация</button>
                                </div>
                                <p class="text-center mb-0">
                                    Уже есть аккаунт?
                                    <a class="font-weight-semi-bold" href="{{route('user.login')}}">Вход здесь</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


