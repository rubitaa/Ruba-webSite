@csrf

<div class="form-group">
    <label for="title"> {{__('Title')}}</label>
    <input type="text" class="form-control" name="title" @isset($article) value=" {{$article->title}}" @endisset>
</div>

 <div class="form-group">
     <label for="category"> {{__('categories')}}</label>

        @foreach($categories as $id => $title)

            <label for= "category_{{$id}}">{{$title}}</label>
            <input type="checkbox"  id="{{$id}}" name="categories[]" value="{{$id}}" @if( isset ($article) && in_array($id,$artCategories))checked @endif>

        @endforeach

</div>

<div>
    <label for="content"> {{__('Content')}}</label>
    <textarea id="content" rows="10" cols="30" class="form-control" name="content"> @isset($article) {{$article->content}} @endisset</textarea>

</div>

<div class="form-group">
    <button class="btn btn-success">{{$submit}}</button>
</div>