@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <h2 class="fs-4 text-secondary my-4">
            Elenco Post
        </h2>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><a href="{{ route('admin.orderby', ['direction' => $direction]) }}">#ID</a></th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        @php
                            $date = date_create($post->date);
                        @endphp
                        <td>{{ date_format($date, 'd/m/Y') }}</td>
                        <td><a href="" class="btn btn-primary">VAI</a></td>
                    </tr>
                @endforeach




            </tbody>
        </table>
        <div>
            {{ $posts->links() }}
        </div>

    </div>
@endsection
