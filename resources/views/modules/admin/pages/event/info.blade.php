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
                </header>
                <div class="card-header border-dark event__images">
                    <h3>Информация</h3>
                    <p><b>ФИО:</b> {{$event->fio}}</p>
                    <p><b>Email:</b> {{$event->email}}</p>
                    <p><b>Контактный номер:</b> {{$event->phone}}</p>
                    <p><b>Представитель:</b> {{$event->representative}}</p>
                    <p><b>Место проведения:</b> {{$event->place}}</p>
                    <p><b>Интернет ресурс:</b> {{$event->website}}</p>
                    <p><b>Заголовок:</b> {{$event->title}}</p>
                    <p><b>Описание:</b> {!!$event->description!!}</p>
                    <h3>Фото</h3>
                @foreach($event->images as $image)
                        <img src="{{asset($image->image_path)}}">
                    @endforeach
                </div>
                </div>


            </div>
        </div>
@endsection
