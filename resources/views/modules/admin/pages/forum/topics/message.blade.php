@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Форум сообщения: {{$topic->name}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Форум</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('forum.topic.index',['category_id'=>$topic->forum_category_id])}}" class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Форум темы: {{$topic->name}}</h2>
                </header>
                <div class="card-body pt-0">
                    @if($messages->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Сообщение</th>
                                <th>Автор</th>
                                <th>Время</th>
                                <th><i class="ti ti-hand-point-up"></i></th>
                                <th><i class="ti ti-hand-point-down"></i></th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->id}}</td>
                                    <td>{{$message->text}}</td>
                                    <td>{{$message->author->name}}</td>
                                    <td>{{$message->created_at}}</td>
                                    <td>{{$message->likes->count()}}</td>
                                    <td>{{$message->dislikes->count()}}</td>
                                    <td>
                                                                                <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                                                        data-target="#delete{{$message->id}}"><i class="ti ti-trash"></i>
                                                                                </button>
                                                                                <div class="modal modal-backdrop" id="delete{{$message->id}}" tabindex="-1"
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
                                                                                                <form method="post" action="{{route('forum.message.delete', ['id' => $message->id])}}">
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
                        {{$messages->links()}}
                    @else <h6>На данную тему нет сообщений!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
