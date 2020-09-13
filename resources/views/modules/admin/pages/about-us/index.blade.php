@extends('modules.admin.layouts.app-full')
@section('content')
    <form action="{{route('about_us.update')}}" method="post">
        <x-admin.input-form-group-list
            :errors="$errors"
            :elements="$about_us_form"/>
        <button type="submit" class="btn btn-block btn-wide btn-primary text-uppercase">
            Сохранить
        </button>
    </form>
@endsection
