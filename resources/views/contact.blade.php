@extends('layouts.app')
@section('title',__('Contact us'))
@section('content')

    @include('_partials._alart_massge')
    @auth
    <p> Hello {{$user->name}}</p>
        @if($errors->any())

        <ul>
            @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
            @endforeach
        </ul>
    @endif
    @endauth

    @guest
        <h2> Wellcome </h2>
    @endguest

    @if(date('D')!='Mon')
    <h6> {{$massage}}  </h6>
    @else
        <h6>{{'sorry we not work today'}}</h6>
    @endif

    <form action=""method="post">
        @csrf
    <div class="form-group">
        <input class="form-control"input type="text"name="user_name" placeholder="Enter your name ">
    </div>
        @if(count($options))
    <div class="form-group">

        <select class="form-control" name="@option" id="option">
            @foreach($options as $key =>$option)
                <option value ='{{$key}}'>
                    {{$option}}
                </option>
            @endforeach
        </select>
    </div>
        @endif

   <div class="form-group">
            <textarea class="form-control" name="descrbtion" id="" cols="20" rows="10" placeholder="your massage"></textarea>
    </div>

    <div>
    <button class="btn btn-primary btn-block" type="submit">send! </button>
    </div>

</form>


@endsection
