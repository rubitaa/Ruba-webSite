@extends('layouts.app')
@section('title',__('Home Page'))


<style>
    body{
        background-color:#FFF1FD;
    }
    .head{
        background-color: #6C6073;
        color: white;
    }
</style>

@section('content')
    <div class="bg-light p-5 mb-5">
        <h3>{{__('Welcome to ')}} {{config('app.name')}}</h3>
        
        <div>
            <a href="{{route('contact')}}">{{__('contact me')}}</a>

        </div>
        <div>
           <a href="{{route('about')}}"> {{__('about us')}}</a>
        </div>
        
    </div>

    <h4 class="text-gray">{{__( 'Latest Articles')}}</h4>
<div class="row ">
    @forelse($articles as $article)
        @include('articles._article_card')
    @empty
        {{_('No Articles yet')}}
    @endforelse
</div>
    <a class="btn btn-link text-gray" href="{{route('article.index')}}"> {{__('Browse All Articles')
    }} </a>
@endsection