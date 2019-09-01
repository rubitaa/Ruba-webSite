@extends('layouts.app')
@section('title',__('Created Article'))
@section('content')


    <style>
        body{
            background-color:#FFF1FD;
        }
        .head{
            background-color: #6C6073;
            color: white;
        }
    </style>
    <div class="row">
    @forelse($articles as $article)
        @include('articles._article_card')
        @empty
        {{_('No article yet')}}
    @endforelse
    </div>
@endsection