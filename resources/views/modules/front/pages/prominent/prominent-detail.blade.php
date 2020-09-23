@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>100 үздік есім</h1>
            </div>
        </div>
    </section>
    <section class="min__content my-5">

        <div class="container">
            <div class="news__detail__inner mt-3 mb-3">
                <a href="{{URL::previous()}}">← Қайта оралу </a>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{asset($user->avatar_path)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$user->fullName()}}</h5>

                                <p>
                                    Елді мекен:
                                    <span class="text-muted d-block">Жамбыл облысы, {{$user->area->name}}</span>
                                </p>
                                <p>
                                    Бағыттар:
                                    @foreach($user->directions as $direction)
                                        <span class="text-muted d-block">{{$direction->direction->name}}</span>
                                    @endforeach
                                </p>
                                <p>
                                    Жасы:
                                    <span class="text-muted d-block">{{$user->age}}</span>
                                </p>
                                <p>
                                    Жынысы:
                                    <span class="text-muted d-block">
                                        {{$user->sex == \App\Models\Entities\Content\Prominent\ProminentUser::WOMAN ?
                                        'Әйел' : 'Ер'}}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">Өмірбаяны</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile" aria-selected="false">Атқарған еңбектері</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab"
                                       aria-controls="info" aria-selected="false">Қосымша ақпараттар</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                {!! $user->biography !!}
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                               {!! $user->works !!}
                            </div>
                            <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                {!! $user->extra_information !!}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
