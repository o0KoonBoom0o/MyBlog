@extends('layouts.template')
@section('title', "Boom's Blog")
@section('content')
<div class="container create-blog">
    @foreach ($postdesc as $item)
    <a href="/post/{{$item->id}}">
        <div class="line-card shadow">
            <div class="line-card-body">
            <div>{{$item->title}}</div>
            <div>{{ \Illuminate\Support\Str::limit($item->content, $limit = 100, $end = '...') }}</div>
            </div>
            <div>
                @if ($item->image == null)
                    <img src="{{asset('/img/testimg.jpg')}}" alt=""/>
                @else
                    <img src="{{asset('/storage/blog-photo')}}/{{$item->image}}">
                @endif
            </div>
        </div>
    </a>
    @endforeach
<div>{{$postdesc->links()}}</div>

</div>
@endsection