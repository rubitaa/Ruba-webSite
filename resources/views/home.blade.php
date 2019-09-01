@extends('layouts.app')
@section ('title',__('Home'))
@section('content')



    <a href="{{route('article.create')}}" class="btn btn-lg btn-primary mb-4"> {{__('New Article')}}</a>
{{--    <a href="{{route('content.show',$article->id)}}">--}}
    {{--    <a href="{{route('about.show',$article->id)}}">--}}

    <style>

        .container {
            margin-top:0px !important;
        }

    </style>
<div class="row">


    @forelse($articles as $article)
        <div class="container justify-content-center">
        <div class="col-md-3">
            <div class="mb-2 card " >
                <div class="card-body">
                    <a href="{{route('article.show',$article)}}">{{$article->title}}</a>
                </div>
                <div class="card-footer">
                    <a href="{{route('article.edit',$article)}}" class="btn ">{{__('Edit')}} </a>

                    <form method="post" action="{{route('article.destroy',$article)}}" style="display: inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="btn" onclick="return confirm('{{__('Are you sour ?')}}')"> {{__('Delete')}} </button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    @empty

    <p> {{__('You dont have any articles yet')}} </p>
    @endforelse
</div>

@endsection
