@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Профиль</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Форма</li>
        </ol>
    </nav>


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
                <header class="card-header">
                    <h2 class="h4 card-header-title">Обновить пароль</h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('change.password')}}" method="post">
                        <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$changePasswordForm"/>
                        <button type="submit" class="btn btn-block btn-wide btn-primary text-uppercase">
                            Поменять пароль
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Поменять информацию профиля</h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$updateProfileForm"/>
                        <button type="submit" class="btn btn-block btn-wide btn-primary text-uppercase">
                            Обновить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
