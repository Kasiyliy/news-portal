@extends('modules.admin.layouts.app-full')
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
                    <h2 class="h4 card-header-title">Обновить данные</h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$event_form"/>
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

    <script>

        $(function(){
            element = document.getElementById("phone");
            element.setAttribute("mask","+7(999) 999-9999");
            $("#phone").mask("+7(999) 999-9999");
        });
    </script>
@endsection
