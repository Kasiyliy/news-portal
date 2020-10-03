@extends('modules.front.layouts.app-main')
@section('styles')
    <style>
        .card-header.password, .info{
            background-color: #00656D;
            color: #FFFFFF;
        }
        .btn{
            background-color: #F8A555;
            color:#FFFFFF!important;
        }
    </style>
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Профиль</h1>
                <div class="mt-3 mb-3 d-flex justify-content-between">
                    <a href="{{route('welcome')}}">← Главная</a>
                    <form action="{{route('logout')}}" method="post" id="signOutForm">
                        @csrf
                        <a class="btn btn-sm pr-3 pl-3" href="#"
                           onclick="document.getElementById('signOutForm').submit()">
                            Выйти
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card flex-row flex-wrap">
                    <div class="card-header border-dark">
                        <img src="{{auth()->user()->avatar_path}}" width="100">
                    </div>
                    <div class="card-block p-4">
                        <h4 class="card-title">{{auth()->user()->name}}</h4>
                        <p class="card-text">{{auth()->user()->surname}}</p>
                        <p class="card-text">{{auth()->user()->email}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-5">
                <div class="card h-100">
                    <header class="card-header password">
                        <h5 class="h5 card-header-title mb-0">Обновить пароль</h5>
                    </header>
                    <div class="card-body pt-3">
                        <form action="{{route('change.password')}}" method="post">
                            <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$changePasswordForm"/>
                            <button type="submit" class="btn btn-block btn-wide">
                                Поменять пароль
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card h-100">
                    <header class="card-header info">
                        <h5 class="h5 card-header-title mb-0">Поменять информацию профиля</h5>
                    </header>
                    <div class="card-body pt-3">
                        <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
                            <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$updateProfileForm"/>
                            <button type="submit" class="btn btn-block btn-wide">
                                Обновить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
