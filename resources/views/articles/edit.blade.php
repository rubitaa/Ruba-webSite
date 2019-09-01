@extends('layouts.app')
@section('title',__(' Edit Article '))
@section('content')
    <h2> {{__(' Edit Article ')}}:{{$article->title}} </h2>

    <form action="{{route('article.update',$article)}}" method="post">
{{--    <form action="{{route('Article.store')}}" method="post">--}}
        @method('PATCH')
        @include('articles._form',['submit'=>__('UpDate')])
    </form>
@endsection