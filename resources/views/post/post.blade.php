@extends('layouts.template')
@section('title', "Boom's Blog")
@section('content')
<div class="content-container">
    @if ($post->image == null)
        <img src="{{asset('/img/testimg.jpg')}}" alt=""/>
    @else
        <img src="{{asset('/storage/blog-photo')}}/{{$post->image}}">
    @endif
    <div class="content-body">
        <h1>{{$post->title}}</h1>
        <p>{{$post->content}}</p>
    </div>
</div>     
@endsection