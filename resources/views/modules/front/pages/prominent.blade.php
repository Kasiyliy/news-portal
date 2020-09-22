@extends('modules.front.layouts.app-main')

@section('content')
    <section class="prominent">
        <div class="container">
            <div class="prominent__inner">
                <h1>100 үздік есім</h1>
                <a href="{{route('welcome')}}">← Қайта оралу </a>
                <img src="{{asset('modules/front/assets/img/prominent-img.png')}}" alt="prominent">
                <div class="prominent__content row">
                    <div class="col-12 col-md-3 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-control-plaintext">Аудан</label>
                                <select class="form-control search" name="area">
                                    <option value="">таңдау</option>
                                    @foreach($areas as $area)
                                        <option
                                            value="{{$area->id}}" {{$selectedArea == $area->id ? 'selected' : ''}}>{{$area->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-control-plaintext">Бағыты</label>
                                @foreach($directions as $direction)
                                    <div class="form-check">
                                        <input class="form-check-input search" name="directions[]"
                                               type="checkbox" value="{{$direction->id}}"
                                               id="defaultCheck1"
                                            {{$selectedDirections ? in_array($direction->id, $selectedDirections) ? 'checked' : '' : ''}}>
                                        <label class="form-check-label" for="defaultCheck1">
                                            {{$direction->name}}
                                        </label>
                                    </div>
                                @endforeach
                                <label class="form-control-plaintext">Жынысы</label>
                                <select class="form-control search" name="sex">
                                    <option value="" {{!$selectedSex ? 'selected' : ''}}>таңдау</option>
                                    <option value="2" {{$selectedSex == 2 ? 'selected' : ''}}>Ер</option>
                                    <option value="1" {{$selectedSex == 1 ? 'selected' : ''}}>Әйел</option>
                                </select>
                                <label class="form-control-plaintext">Жасы</label>
                                <div class="input-group">
                                    <input type="number" aria-label="" value="{{$minAge}}"
                                           class="form-control search" name="minAge" placeholder="14">
                                    <input type="number" aria-label="" value="{{$maxAge}}"
                                           class="form-control search" name="maxAge" placeholder="29">
                                </div>
                                <div class="prominent__filter-buttons d-flex justify-content-between mt-4"
                                     aria-label="First group">
                                    <button type="button" class="btn" onclick="reload()">Тастау</button>
                                    <button type="button" class="btn" onclick="search();">Көрсету</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 mt-5 prominent__content__media">
                        @if($users->items())
                            <ul class="list-unstyled">
                                <div class="infinite-scroll">
                                    @foreach($users as $user)
                                        <li class="media prominent__media my-4">
                                            <img src="{{asset($user->avatar_path)}}" class="mr-3"
                                                 alt="...">
                                            <div class="media-body">
                                                <a class="prominent__name"
                                                   href="{{route('prominent.detail', $user->id)}}">
                                                    <h5 class="mt-0 mb-1">{{$user->fullName()}}</h5>
                                                </a>
                                                <h6>Жамбыл облысы, {{$user->area->name}}</h6>
                                                @foreach($user->directions as $direction)
                                                    <p>{{$direction->direction->name}}</p>
                                                @endforeach
                                            </div>
                                            <div class="popover prominent__popover mr-3">
                                                <a data-container="body"
                                                   data-toggle="popover" data-placement="left"
                                                   data-content="
                                            <a class='popover__nav-item' href='{{route('prominent.detail', $user->id)}}'>Өмірбаяны</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', $user->id)}}'>Атқарған еңбектері</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', $user->id)}}'>Қосымша ақпараттар</a>">
                                                    <i class="fa fa-ellipsis-h "></i>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{$users->links()}}
                                </div>
                            </ul>
                        @else
                            <div class="text-center">
                                <h7 class="text-center">Бұл сұраныс бойынша үздік есімдер табылған жоқ!</h7>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/jquery.jscroll.min.js')}}"></script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover({html: true})
        });

        $('ul.pagination').hide();
        $(function () {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                padding: 0,
                margin: 0,
                loadingHtml: '<img class="center-block d-block" style="margin-left: auto; margin-right: auto;" ' +
                    'src="{{asset('modules/front/assets/img/loading.gif')}}" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function () {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
    <script type="text/javascript">
        function search() {
            let query = '{{route('prominent')}}';
            var inputs = document.querySelectorAll('.search');
            var count = 0;
            var char = '&';
            var array = [];
            inputs.forEach(e => {
                if (e.value !== '' && e.name !== 'directions[]') {
                    char = '&';
                    if (count == 0) char = '?';
                    query += char + e.name + '=' + e.value;
                    count++;
                }
                if (e.name === 'directions[]') {
                    if (e.checked) {
                        array.push(e.value);
                    }
                }
            });
            console.log(count);
            if (array.length > 0) {
                char = '&';
                if (count == 0) char = '?';
                query += char + 'directions=' + array;
            }
            window.location.href = query;
        }

        function reload() {
            window.location.href = '{{route('prominent')}}';
        }
    </script>
@endsection

