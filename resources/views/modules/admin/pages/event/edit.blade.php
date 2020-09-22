@extends('modules.admin.layouts.app-full')

@section('styles')

    <style>
        .event__images img{
            width:200px;
        }
    </style>
@endsection

@section('content')
    <h1 class="h2 mb-2">Мероприятия</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Мероприятия</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('event.index')}}" class="btn btn-outline-primary mt-1 mb-4"><i
                            class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Мероприятие</h2>
                </header>
                <div class="card-header border-dark event__images">
                    @foreach($events->images as $image)
                        <img src="{{asset($image->image_path)}}">
                    @endforeach
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('event.update', ['id' => $events->id])}}" method="post"
                          enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$event_form"/>
                        <button type="submit"
                                class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>

                <div class="card-header border-dark event__images">
                    <div class="form-group">
                        <label for="inputAddress2">Ұйымдастырушы*</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="" disabled value="{{$events->representative}}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Ұйымдастыратын жері</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="" disabled value="{{$events->place}}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Т.А.Ә*</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="" disabled value="{{$events->fio}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Телефон</label>
                            <input class="form-control" type="tel" value="+7(7__) ___ ____" id="example-tel-input" disabled value="{{$events->phone}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail3" disabled value="{{$events->email}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Сайт</label>
                            <input type="text" class="form-control" id="inputHtml" placeholder="http://www." disabled value="{{$events->website}}">

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
