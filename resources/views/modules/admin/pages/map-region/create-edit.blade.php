@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Регионы карты</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Регионы карты</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('map.region.index')}}"
                       class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">
                        {{$mapRegion->id ? 'Изменение региона':  'Добавление региона'}}
                    </h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('map.region.store.update', ['id' => $mapRegion->id])}}" method="post">
                        <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$form"/>
                        <button type="submit"
                                class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            {{$mapRegion->id ? 'Изменить':  'Сохранить'}}
                            <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
