@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Бизнес</h1>
                <a href="{{route('business')}}">← Бизнесқа өту </a>
                <div class="news__detail__inner-header">
                    <h2>{{$business_content->title}}</h2>
                </div>
                <div class="news__detail__inner-content my-5">
                    <img src="{{asset($business_content->image_path)}}" alt="businessdetail" width="539" height="1004">
                    <p>
                    <div>
                        {!! $business_content->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
