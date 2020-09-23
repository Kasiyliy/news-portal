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
                    <h2 class="h4 card-header-title">Мероприятия</h2>
                    <a href="{{route('event.create')}}" class="btn btn-outline-primary mt-3">Добавить <i
                            class="ti ti-plus"></i></a>
                </header>
                <div class="card-body pt-0">
                    @if($event->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Дата</th>
                                <th>Видимо</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($event as $e)
                                <tr>
                                    <td>{{$e->id}}</td>
                                    <td>{{$e->title}}</td>
                                    <td>{{$e->date}}</td>
                                    <td> @if($e->is_accepted)
                                            <span class="text-success">
                                            Да
                                        </span>
                                        @else
                                            <span class="text-danger">
                                            Нет
                                        </span>
                                        @endif</td>
                                    <td>
                                        <a href="{{route('event.edit', ['id' => $e->id])}}"
                                           class="btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i>
                                        </a>
                                        <form class="d-inline" method="post"
                                              action="{{route('event.accept', ['id' => $e->id])}}">
                                            {{csrf_field()}}
                                            @if($e->is_accepted)
                                                <button class=" btn  btn-outline-danger btn-sm " type="submit">
                                                    <i class="ti ti-lock"></i>
                                                </button>
                                            @else
                                                <button class=" btn  btn-outline-success btn-sm " type="submit">
                                                    <i class="ti ti-check"></i>
                                                </button>
                                            @endif
                                        </form>

                                        @if($e->representative)
                                            <a href="{{route('event.info', ['id' => $e->id])}}"
                                               class="btn btn-outline-primary btn-sm"><i class="ti ti-eye"></i>
                                            </a>
                                        @else
                                        @endif


                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$e->id}}"><i class="ti ti-trash"></i>
                                        </button>
                                        <div class="modal modal-backdrop" id="delete{{$e->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                             data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title w-100" id="myModalLabel">Удаление</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Вы действительно хотите удалить?</p>
                                                        <form method="post"
                                                              action="{{route('event.delete', ['id' => $e->id])}}">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="btn btn-outline-danger mt-3">
                                                                Удалить безвозвратно<i class="ti ti-trash"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger-soft btn-sm"
                                                                data-dismiss="modal">
                                                            <i class="ti ti-close"></i> Закрыть
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$event->links()}}

                    @else<h6>Вы не добавили ни одного мероприятия!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
