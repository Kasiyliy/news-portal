@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Опрос</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Опрос</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Опросы</h2>
                    <button class="btn btn-outline-primary mt-3" data-toggle="modal"
                            data-target="#addSurvey">Добавить <i class="ti ti-plus"></i></button>
                </header>
                <div class="card-body pt-0">
                    @if($surveys->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Видим</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($surveys as $survey)
                                <tr>
                                    <td>{{$survey->id}}</td>
                                    <td>{{$survey->title}}</td>
                                    <td> @if($survey->is_visible)
                                            <span class="text-success">
                                            Да
                                        </span>
                                        @else
                                            <span class="text-danger">
                                            Нет
                                        </span>
                                        @endif</td>

                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                data-target="#editSurvey{{$survey->id}}"><i class="ti ti-pencil"></i>
                                        </button>
                                        <a href="{{route('survey.question.index', ['survey_id' => $survey->id])}}"
                                           class="btn btn-outline-primary btn-sm"><i class="ti ti-list"></i>
                                        </a>
                                        @if(!$survey->questions->isEmpty())
                                            <form class="d-inline" method="post"
                                                  action="{{route('survey.visible.change', ['id' => $survey->id])}}">
                                                {{csrf_field()}}
                                                @if($survey->is_visible)
                                                    <button class=" btn  btn-outline-danger btn-sm " type="submit">
                                                        <i class="ti ti-eye"></i>
                                                    </button>
                                                @else
                                                    <button class=" btn  btn-outline-success btn-sm " type="submit">
                                                        <i class="ti ti-eye"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        @else
                                        @endif

                                        {{--                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"--}}
                                        {{--                                                data-target="#delete{{$category->id}}"><i class="ti ti-trash"></i>--}}
                                        {{--                                        </button>--}}
                                        {{--                                        <div class="modal modal-backdrop" id="delete{{$category->id}}" tabindex="-1"--}}
                                        {{--                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">--}}
                                        {{--                                            <div class="modal-dialog" role="document">--}}
                                        {{--                                                <div class="modal-content">--}}
                                        {{--                                                    <div class="modal-header">--}}
                                        {{--                                                        <h4 class="modal-title w-100" id="myModalLabel">Удаление</h4>--}}
                                        {{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                        {{--                                                            <span aria-hidden="true">&times;</span>--}}
                                        {{--                                                        </button>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="modal-body">--}}
                                        {{--                                                        <p>Вы действительно хотите удалить?</p>--}}
                                        {{--                                                        <form method="post" action="{{route('business.delete', ['id' => $category->id])}}">--}}
                                        {{--                                                            {{csrf_field()}}--}}
                                        {{--                                                            <button type="submit" class="btn btn-outline-danger mt-3">Удалить безвозвратно<i class="ti ti-trash"></i></button>--}}
                                        {{--                                                        </form>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="modal-footer">--}}
                                        {{--                                                        <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">--}}
                                        {{--                                                            <i class="ti ti-close"></i> Закрыть</button>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </td>
                                </tr>
                                <div class="modal modal-backdrop" id="editSurvey{{$survey->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     data-backdrop="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">Редактировать опрос</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('survey.update', ['id' => $survey->id])}}"
                                                      method="post" enctype="multipart/form-data">
                                                    <x-admin.input-form-group-list
                                                            :errors="$errors"
                                                            :elements="$survey->getBaseForm()"/>
                                                    <button type="submit"
                                                            class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                                                        Сохранить <i class="ti ti-check"></i>
                                                    </button>
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

                            @endforeach
                            </tbody>
                        </table>
                        {{$surveys->links()}}
                    @else <h6>У вас пока нет опросов!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-backdrop" id="addSurvey" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Добавить опрос</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('survey.store')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$survey_web_form"/>
                        <button type="submit"
                                class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                        <i class="ti ti-close"></i> Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
