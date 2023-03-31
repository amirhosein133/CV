@extends('layout.app')

@section('title')
    <title>درباره ما</title>
@endsection

@section('content')
    <div class="card-body p-lg-17">
        @include('aboutMe.about')
        @include('aboutMe.statistics')
{{--               @include('aboutMe.team')TODO list fixed slideshow--}}
        @include('aboutMe.connection')
        @include('aboutMe.card')
    </div>
@endsection
