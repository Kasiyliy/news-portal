@extends('modules.admin.layouts.app-full')
@section('content')

    <h1 class="h2 mb-2">Гид контент</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Гид</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('guide.index')}}" class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>

                    <h2 class="h4 card-header-title">Гид контент</h2>
                    <a href="{{route('guide.content.create', ['category_id' => $category_id])}}" class="btn btn-outline-primary mt-3">Добавить <i class="ti ti-plus"></i></a>
                </header>
                <div class="card-body pt-0">
                    @if($contents->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Создан</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td>{{$content->title}}</td>
                                    <td>{{$content->created_at}}</td>
                                    <td><button class="btn btn-outline-primary mt-3"><i class="ti ti-pencil"></i></button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$contents->links()}}
                    @else <h6>У вас пока нет контента!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
