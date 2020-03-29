@extends('layouts.template')
@section('title', "Boom's Blog")
@section('content')
<div class="container create-blog">
    <form action="/post/{{$post->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <div class="button-form">
            <button type="submit" class="btn-create-blog">Submit</button>
        </div>
        {{ csrf_field() }}
        <div class="img-add">
            <label class="create-img" for="edittitleimg">
                @if ($post->image == null)
                    <img src="{{asset('img/testimg.jpg')}}" alt="">
                @else
                    <img src="{{asset('/storage/blog-photo')}}/{{$post->image}}">
                @endif
            </label>
            <p>Recommend : 1200 x 627 px</p>
            <input type="file" name="edittitleimg" id="edittitleimg">
        </div>
        <div>
            <input type="text" name="edittitle" id="edittitle" placeholder="Title" value="{{$post->title}}">
        </div>
        <div>
            <input type="text" name="edittag" id="edittag" placeholder="Tag" value="{{$post->tag}}">
        </div>
        <div>
            <textarea name="editcontent" id="editcontent" rows="10" oninput="auto_grow(this)" placeholder="|">{{$post->content}}</textarea>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
    
</script>
@endsection