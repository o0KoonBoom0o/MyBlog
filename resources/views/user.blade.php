@extends('layouts.template')
@section('title', "Boom's Blog")
@section('content')
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($postlist as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->content, $limit = 70, $end = '...') }}</td>
                    <td><a href="{{ URL::to('post/' . $item->id . '/edit') }}"><button type="button" class="btn btn-submit">edit</button></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection