@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Гид категории</h1>
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
                    <h2 class="h4 card-header-title">Гид категории</h2>
                    <button class="btn btn-outline-primary mt-3" data-toggle="modal"
                            data-target="#addCategory">Добавить <i class="ti ti-plus"></i></button>
                </header>
                <div class="card-body pt-0">
                    @if($categories->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Создан</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td class="d-inline">
                                        <button class="btn btn-outline-primary" data-toggle="modal"
                                                         data-target="#editCategory{{$category->id}}"><i class="ti ti-pencil"></i>
                                        </button>
                                        <a href="{{route('guide.content.index', ['category_id' => $category->id])}}"
                                            class="btn btn-outline-primary"><i class="ti ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal modal-backdrop" id="editCategory{{$category->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">Редактировать категорию</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('guide.update', ['id' => $category->id])}}" method="post">
                                                    <x-admin.input-form-group-list
                                                        :errors="$errors"
                                                        :elements="\App\Http\Forms\Web\V1\System\Content\GuiderCategoryWebForm::inputGroups($category)"/>
                                                    <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                                                        Сохранить <i class="ti ti-check"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                                                    <i class="ti ti-close"></i> Закрыть</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    @else <h6>У вас пока нет категории!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-backdrop" id="addCategory" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Добавить категорию</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('guide.store')}}" method="post">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$category_web_form"/>
                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                        <i class="ti ti-close"></i> Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection