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
                                    <td class="d-inline-block">
                                        <a href="{{route('guide.content.edit', ['id' => $content->id])}}" class="btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$content->id}}"><i class="ti ti-trash"></i>
                                        </button>
                                        <div class="modal modal-backdrop" id="delete{{$content->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title w-100" id="myModalLabel">Удаление</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Вы действительно хотите удалить?</p>
                                                        <form method="post" action="{{route('guide.content.delete', ['id' => $content->id])}}">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="btn btn-outline-danger mt-3">Удалить безвозвратно<i class="ti ti-trash"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                                                            <i class="ti ti-close"></i> Закрыть</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
