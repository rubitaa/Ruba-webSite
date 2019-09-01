@extends('layouts.app')
@section('title',$article->title)
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


    <div class="container justify-content-center">
    <div class="card ">
            <h4 class="card-header head">{{$article->title}}</h4>

   <div class="card-body">
       {!! nl2br($article->content) !!}
   </div>


   <div class="card-footer">

    <div ><b>{{__('Author')}}</b> :{{$article->user->name}} </div>

    <div><b>{{__('Created at')}}</b>:{{$article->created_at}} </div>

    <div ><b>{{__('Update at')}}</b>:{{$article->updated_at}} </div>

   </div>

    </div>



  <h3 class="mt-2">{{__('Comments')}}</h3>
<div class="mt-4" id="comments">

    @forelse($article->comments as $comment)

        <div class="card p-3 mb-1">
            {{$comment->content}}
            <p>{{__('Author')}}:{{$comment->user->name}}  </p>
        </div>

        @empty

        {{__('No Comment yet')}}
        @endforelse


</div>


@auth
    <div id="commentForm "class="mt-5">
        <div class="card">
            <h4 class="card-header bg-secondary text-white">{{__('Type your comment here')}}</h4>
            <div class="card-body">

        <form action="{{route('comments.store',$article->id)}}"method="post">
        @csrf
            <div class="form-group">
                <label for="content"> {{__('Content')}}</label>
                <textarea placeholder="" id="content" rows="10" cols="30" class="form-control" name="content">
                </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">{{__('save')}}</button>
            </div>
        </form>
    </div>
        </div>
    </div>
@else
    <p><a href="{{route('login')}}">{{__('Log in to comment')}} </a></p>
    </div>
@endauth
@endsection