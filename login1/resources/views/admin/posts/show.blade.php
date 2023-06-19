@extends('layouts.admin')


@section('content')
    <div class="container p-5">
        <h2 class="fs-4 text-secondary my-4 ">
            {{ $post->title }}
            <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success">Modfica</a></td>

        </h2>

        <p>{{ $date_formatted }}</p>
        <p>{!! $post->text !!}</p>
        <div>
            <img width="50%" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
        </div>




    </div>
@endsection
