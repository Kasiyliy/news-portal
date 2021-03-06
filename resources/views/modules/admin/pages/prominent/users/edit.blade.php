@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Люди</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Люди</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('prominent.user.index')}}"
                       class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Редактирование человека</h2>
                </header>
                <div class="card-body pt-0">
                    <div class="card-header border-dark text-center">
                        <img src="{{asset($user->avatar_path)}}" width="200">
                    </div>
                    <form action="{{route('prominent.user.update', ['id' => $user->id])}}" method="post"
                          enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$user_web_form"/>
                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
