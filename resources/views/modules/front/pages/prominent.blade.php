@extends('modules.front.layouts.app-main')

@section('content')
    <section class="prominent">
        <div class="container">
            <div class="prominent__inner">
                <h1>100 үздік есім</h1>
                <img src="{{asset('modules/front/assets/img/prominent-img.png')}}" alt="prominent">
                <div class="prominent__content row">
                    <div class="col-12 col-md-3 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <p>Аудан</p>
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Байзақ ауданы
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <p>Бағыты</p>
                                @for($i=0; $i<4; $i++)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Еріктілер
                                        </label>
                                    </div>
                                @endfor
                                <p class="mt-3">Жынысы</p>
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        таңдау
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <p class="mt-3">Жасы</p>
                                <div class="input-group">
                                    <input type="text" aria-label="First name" class="form-control" placeholder="14">
                                    <input type="text" aria-label="Last name" class="form-control" placeholder="29">
                                </div>
                                <div class="prominent__filter-buttons d-flex justify-content-between mt-4"
                                     aria-label="First group">
                                    <button type="button" class="btn">Тастау</button>
                                    <button type="button" class="btn">Көрсету</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 mt-5 prominent__content__media">
                        <ul class="list-unstyled">
                            <li class="media prominent__media my-4">
                                <img src="{{asset('modules/front/assets/img/Elbasy.png')}}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <a class="prominent__name" href="{{route('prominent.detail', 1)}}">
                                        <h5 class="mt-0 mb-1">Ерлан Жүніс Төсбайұлы</h5>
                                    </a>
                                    <h6>Жамбыл облысы, Тараз</h6>
                                    <p>Ақын</p>
                                </div>
                                <div class="popover prominent__popover mr-3">
                                    <a data-container="body"
                                       data-toggle="popover" data-placement="left"
                                       data-content="
                                            <a class='popover__nav-item' href='{{route('prominent.detail', 1)}}'>Өмірбаяны</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', 1)}}'>Атқарған еңбектері</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', 1)}}'>Қосымша ақпараттар</a>">
                                        <i class="fa fa-ellipsis-h "></i>
                                    </a>
                                </div>
                            </li>
                            <li class="media prominent__media my-4">
                                <img src="{{asset('modules/front/assets/img/Elbasy.png')}}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <a class="prominent__name" href="{{route('prominent.detail', 1)}}">
                                        <h5 class="mt-0 mb-1">Ерлан Жүніс Төсбайұлы</h5>
                                    </a>
                                    <h6>Жамбыл облысы, Тараз</h6>
                                    <p>Ақын</p>
                                </div>
                                <div class="popover prominent__popover mr-3">
                                    <a data-container="body"
                                       data-toggle="popover" data-placement="left"
                                       data-content="
                                            <a class='popover__nav-item' href='{{route('prominent.detail', 1)}}'>Өмірбаяны</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', 1)}}'>Атқарған еңбектері</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', 1)}}'>Қосымша ақпараттар</a>">
                                        <i class="fa fa-ellipsis-h "></i>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover({html: true})
        })
    </script>
@endsection

