@extends('layouts.template')
@section('title', "Boom's Blog")
@section('content')
<div class="container create-blog">
    <form action="/post" method="post" enctype="multipart/form-data">
        <div class="button-form">
            <button type="submit" class="btn-create-blog">Submit</button>
        </div>
        {{ csrf_field() }}
        <div class="img-add">
            <label class="create-img" for="posttitleimg">
                <img src="{{asset('img/testimg.jpg')}}" alt="">
            </label>
            <p>Recommend : 1200 x 627 px</p>
            <input type="file" name="posttitleimg" id="posttitleimg">
        </div>
        <input type="hidden" name="postuserid" value="{{Auth::user()->id}}">
        <div>
            <input type="text" name="posttitle" id="posttitle" placeholder="Title">
        </div>
        <div>
            <input type="text" name="posttag" id="posttag" placeholder="Tag">
        </div>
        <div>
            <textarea name="postcontent" id="postcontent" oninput="auto_grow(this)" placeholder="|"></textarea>
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