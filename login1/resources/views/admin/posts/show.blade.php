@extends('layouts.admin')


@section('content')
    <div class="container p-5">
        <h2 class="fs-4 text-secondary my-4 ">
            {{ $post->title }}
        </h2>

        <p>{{ $date_formatted }}</p>
        <p>{!! $post->text !!}</p>



    </div>
@endsection
