<style>
    body{
        background-color:#FFF1FD;
    }
    .head{
        background-color: #6C6073;
        color: white;
    }
</style>
<div class="col-md-4 pb-3">

    <div class="card">
        <h4 class="card-header head">
            <a  class="text-white" href="{{route('article.show',$article->id)}}">
                {{$article->title}}</a></h4>
        <div class="card-body">
            {{$article->content}}
        </div>

        <div class="card-footer">
            {{__('Author')}}:{{$article->user->name}}
        </div>
    </div>
</div>