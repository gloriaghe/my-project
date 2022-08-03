@extends('admin.layouts.base')

@section('mainContent')
<h1>Crea un nuovo post:</h1>

<form action="{{route('admin.books.update', ['book' => $book])}}" method="post" novalidate>
    @method('PUT')

    {{-- con novalidate non abbiamo la validazione front-end --}}
    @csrf
    <div class="mb-3">
        <label class="form-label" for="title">Title</label>
        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $book->title ) }}">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

        <div class="mb-3">
            <label class="form-label" for="author">Author</label>
            <textarea class="form-control @error('author') is-invalid @enderror" name="author" id="author">{{ old('author', $book->author) }}</textarea>
            @error('author')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


    <div class="mb-3">
        <label class="form-label" for="image">Image</label>
        <input class="form-control @error('image') is-invalid @enderror" type="url" name="image" id="image" value="{{ old('image', $book->image) }}">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description', $book->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva Post</button>
</form>


@endsection
