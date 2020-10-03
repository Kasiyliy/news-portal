@extends('modules.front.layouts.app-main')
@section('styles')
    <style>
        .card-header{
            background-color: #00656D;
            color: #FFFFFF;
        }
    </style>
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Подтверждение почты</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 mb-5">
                    <div class="card-header">{{ __('Подтвердите почту') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('На ваш адрес электронной почты была отправлена новая ссылка для подтверждения.') }}
                            </div>
                        @endif

                        {{ __('Мы выслали вам сообщение с подтверждением. Проверьте почту. ') }}
                        {{ __('Не пришло сообщение?') }}
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('Отправить снова') }}</button>
                            .
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
