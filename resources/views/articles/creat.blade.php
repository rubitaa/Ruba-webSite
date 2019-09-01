@extends('layouts.app')
@section('title',__(' Create Article '))
@section('content')
<h2> {{__(' Create Article ')}} </h2>

<form action="{{route('article.store')}}" method="post">
    @include('articles._form',['submit'=>__('save')])
</form>
@endsection