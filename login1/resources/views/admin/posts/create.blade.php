@extends('layouts.admin')

@section('content')
    <div class="container p-5">

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <h2 class="fs-4 text-secondary my-4 ">
            Creazione nuovo post

        </h2>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid
                @enderror" id="title"
                    placeholder="Titolo">

                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Testo</label>
                <textarea class="form-control post-text" name="text" id="text" cols="30" rows="10">{{ old('title') }}</textarea>
                @error('text')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="reading_time" class="form-label">Immagine</label>
                <input name="image" class="form-control" id="image" type="file">
            </div>

            <div class="mb-3">
                <label for="reading_time" class="form-label">Tempo di lettura</label>
                <input name="reading_time" value="{{ old('reading_time') }}" class="form-control" id="number"
                    placeholder="">
            </div>

            <button type="submit" class="btn btn-dark">Invia</button>





        </form>






    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#text'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
