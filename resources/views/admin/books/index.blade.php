@extends('admin.layouts.base')

@section('mainContent')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr data-id="{{ $book->id }}">
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->description }}</td>
                <td>
                    <a href="{{ route('admin.books.show', ['book' => $book]) }}" class="btn btn-primary">View</a>
                </td>
                {{-- @if(Auth::id() == $book->user->user_id) --}}

                <td>
                    <a href="{{ route('admin.books.edit', ['book' => $book]) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('admin.books.destroy', ['book' => $book]) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger"  type="submit">Delete</button>
                    </form>
                </td>
                {{-- @endif --}}

            </tr>
        @endforeach
    </tbody>
</table>

{{ $books->links() }}

@endsection
